<?php
$host = "localhost";
$port = "5432";
$dbname = "prakwebdb";
$user = "postgres";
$pass = "mery";

$koneksi = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");

if (!$koneksi) {
    die("Koneksi ke PostgreSQL gagal.");
}