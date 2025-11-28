<?php
session_start();

if (!empty($_SESSION['username'])) { 
    require '../config/koneksi.php';
    require 'pesan_kilat.php'; 
    require 'anti_injection.php'; 

    // --- LOGIKA 1: EDIT JABATAN (Dipicu jika ada GET 'jabatan' dan POST 'id') ---
    if (!empty($_GET['jabatan']) && !empty($_POST['id'])) { 
        $id = anti_injection($koneksi, $_POST['id']);
        $jabatan = anti_injection($koneksi, $_POST['jabatan']);
        $keterangan = anti_injection($koneksi, $_POST['keterangan']);

        $query ="UPDATE jabatan SET jabatan = '$jabatan', keterangan = '$keterangan' WHERE id = '$id'";

        if (pg_query($koneksi, $query)) {
            pesan('success', "Jabatan telah diubah.");
        } else {
            pesan('danger', "Mengubah jabatan gagal karena: " . pg_last_error($koneksi));
        }
        
        header("Location: ../index.php?page=jabatan");
        exit();

    } 
    
    // --- LOGIKA 2: EDIT ANGGOTA
    elseif (!empty($_GET['anggota']) && !empty($_POST['id'])) {

        $user_id        = anti_injection($koneksi, $_POST['id']);
        $nama           = anti_injection($koneksi, $_POST['nama']);
        $jabatan_id     = anti_injection($koneksi, $_POST['jabatan']);
        $jenis_kelamin  = anti_injection($koneksi, $_POST['jenis_kelamin']);
        $alamat         = anti_injection($koneksi, $_POST['alamat']);
        $no_telp        = anti_injection($koneksi, $_POST['no_telp']);
        $username       = anti_injection($koneksi, $_POST['username']);
        $password       = anti_injection($koneksi, $_POST['password']);

        $query_anggota = "UPDATE anggota SET 
                            nama = '$nama', 
                            jenis_kelamin = '$jenis_kelamin', 
                            alamat = '$alamat', 
                            no_telp = '$no_telp', 
                            jabatan_id = '$jabatan_id' 
                          WHERE user_id = '$user_id'";
        
        if (pg_query($koneksi, $query_anggota)) {
            if (!empty($password)) {
                $salt = bin2hex(random_bytes(16));
                $combined_password = $salt . $password;
                $hashed_password = password_hash($combined_password, PASSWORD_BCRYPT);
                
                $query_user = "UPDATE \"user\" SET 
                                username = '$username', 
                                password = '$hashed_password', 
                                salt = '$salt' 
                               WHERE id = '$user_id'";
                
                if (pg_query($koneksi, $query_user)) {
                    pesan('success', "Anggota Telah Diubah.");
                } else {
                    pesan('warning', "Data Anggota Berhasil Diubah, Tetapi Password Gagal Diubah Karena: " . pg_last_error($koneksi));
                }

            } 
            
            else {
                $query_user = "UPDATE \"user\" SET 
                                username = '$username' 
                               WHERE id = '$user_id'";
                
                if (pg_query($koneksi, $query_user)) {
                    pesan('success', "Anggota Telah Diubah.");
                } else {
                    pesan('warning', "Data Anggota Berhasil Diubah, Tetapi Username Gagal Diubah Karena: " . pg_last_error($koneksi));
                }
            }
            
        } 
        else {
            pesan('danger', "Mengubah Anggota Gagal Karena: " . pg_last_error($koneksi));
        }
        header("Location: ../index.php?page=anggota");
        exit(); 

    }
    else {
        header("Location: ../index.php");
        exit(); 
    }
    
} else {
    header("Location: ../login.php");
    exit(); 
}
?>