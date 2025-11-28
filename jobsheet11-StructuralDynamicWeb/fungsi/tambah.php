<?php
session_start();

if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require 'pesan_kilat.php';
    require 'anti_injection.php';

    // --- LOGIKA 1: TAMBAH JABATAN ---
    if (!empty($_POST['jabatan']) && empty($_POST['username'])) {
        
        $jabatan     = anti_injection($koneksi, $_POST['jabatan']);
        $keterangan  = anti_injection($koneksi, $_POST['keterangan']);

        $query = "INSERT INTO jabatan (jabatan, keterangan) VALUES ('$jabatan', '$keterangan')";

        if (pg_query($koneksi, $query)) {
            pesan('success', "Jabatan Baru Ditambahkan.");
        } else {
            pesan('danger', "Menambahkan Jabatan Gagal: " . pg_last_error($koneksi));
        }
        
        header("Location: ../index.php?page=jabatan");

    } 
    
    // --- LOGIKA 2: TAMBAH ANGGOTA ---
    elseif (!empty($_POST['username'])) { 
        
        // Pengambilan dan Sanitasi Input
        $username       = anti_injection($koneksi, $_POST['username']);
        $password       = anti_injection($koneksi, $_POST['password']);
        $level          = anti_injection($koneksi, $_POST['level']);
        $jabatan        = anti_injection($koneksi, $_POST['jabatan']); 
        $nama           = anti_injection($koneksi, $_POST['nama']);
        $jenis_kelamin  = anti_injection($koneksi, $_POST['jenis_kelamin']);
        $alamat         = anti_injection($koneksi, $_POST['alamat']);
        $no_telp        = anti_injection($koneksi, $_POST['no_telp']);

        // Tambahkan validasi dasar untuk Jabatan ID
        if (empty($jabatan) || !is_numeric($jabatan)) {
            pesan('danger', "Gagal Menambahkan Anggota: Jabatan harus dipilih.");
            header("Location: ../index.php?page=anggota");
            exit();
        }
        $salt = bin2hex(random_bytes(16));
        $combined_password = $salt . $password;
        $hashed_password = password_hash($combined_password, PASSWORD_BCRYPT);
        
        // --- INSERT KE TABEL USER (MENGGUNAKAN RETURNING ID) ---
        // INI SOLUSI UNTUK MENGAMBIL ID SERIAL YANG PASTI DI POSTGRESQL
        $query = "INSERT INTO \"user\" (username, password, salt, level) 
                  VALUES ('$username', '$hashed_password', '$salt', '$level') 
                  RETURNING id";
        
        if ($result_user = pg_query($koneksi, $query)) {
            
            // Mengambil ID yang baru dibuat dari klausa RETURNING
            $row_user = pg_fetch_assoc($result_user);
            $last_id = $row_user['id']; 

            // --- INSERT KE TABEL ANGGOTA ---
            $query2 = "INSERT INTO anggota (nama, jenis_kelamin, alamat, no_telp, user_id, jabatan_id) 
                       VALUES ('$nama', '$jenis_kelamin', '$alamat', '$no_telp', '$last_id', '$jabatan')";
            
            if (pg_query($koneksi, $query2)) {
                pesan('success', "Anggota Baru Ditambahkan.");
            } else {
                // LOGIKA ROLLBACK: Hapus user yang sudah tersimpan jika gagal insert anggota
                pg_query($koneksi, "DELETE FROM \"user\" WHERE id = '$last_id'"); 
                pesan('danger', "Gagal Menambahkan Anggota. Data Login Dibatalkan. Error: " . pg_last_error($koneksi));
            }
            
        } else {
            pesan('danger', "Menambahkan Anggota Gagal Karena: " . pg_last_error($koneksi));
        }
        
        header("Location: ../index.php?page=anggota");
    }
   
    else {
        header("Location: ../index.php?page=anggota");
    }

} else {
    header("Location: ../login.php");
}
?>