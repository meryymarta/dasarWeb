<?php
session_start();

if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require 'pesan_kilat.php';
    require 'anti_injection.php';

    // --- LOGIKA 1: HAPUS JABATAN (Dipicu jika ada parameter GET 'id') ---
    // Logika ini harus berada di dalam blok IF pertama (karena ia mengecek ID)
    if (!empty($_GET['id']) && empty($_GET['anggota'])) { // Cek ID dan pastikan bukan aksi Anggota
        
        $id = anti_injection($koneksi, $_GET['id']);
        
        // Query DELETE FROM
        $query = "DELETE FROM jabatan WHERE id = '$id'";
        
        if (pg_query($koneksi, $query)) {
            pesan('success', "Jabatan Telah Terhapus.");
        } else {
            // Jika gagal karena Foreign Key (misalnya, ada Anggota yang masih memiliki Jabatan ini)
            pesan('danger', "Jabatan Tidak Terhapus Karena: " . pg_last_error($koneksi));
        }
        
        header("Location: ../index.php?page=jabatan");
    } 
    
    // --- LOGIKA 2: HAPUS ANGGOTA (Dipicu jika ada parameter GET 'anggota') ---
    elseif (!empty($_GET['anggota'])) {

        $id = anti_injection($koneksi, $_GET['id']);
        
        // LANGKAH 1: Hapus data dari tabel 'anggota' (Tabel Anak, Wajib Duluan)
        $query1 = "DELETE FROM anggota WHERE user_id = '$id'";

        if (pg_query($koneksi, $query1)) {
            
            // LANGKAH 2: Hapus data dari tabel 'user' (Tabel Induk)
            $query2 = "DELETE FROM \"user\" WHERE id = '$id'";
            
            if (pg_query($koneksi, $query2)) {
                pesan('success', "Anggota Telah Terhapus.");
            } else {
                pesan('warning', "Data Anggota Terhapus Tetapi Data Login TIDAK Terhapus Karena: " . pg_last_error($koneksi));
            }
            
        } else {
            pesan('danger', "Anggota Tidak Terhapus Karena: " . pg_last_error($koneksi));
        }
        
        header("Location: ../index.php?page=anggota");
    }
    
    else {
        header("Location: ../index.php"); 
    }
    
} else {
    header("Location: ../login.php");
}
?>