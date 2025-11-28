<?php
// FILE: fungsi/anti_injection.php
// Digunakan untuk koneksi PG_CONNECT()

function anti_injection($koneksi, $data) {
    $filter_sql = trim($data);
    $filter_sql = stripslashes($filter_sql);
    $filter_sql = htmlspecialchars($filter_sql);

    if (function_exists('pg_escape_string')) {
        $filter_sql = pg_escape_string($koneksi, $filter_sql);
    }
    
    return $filter_sql;
}
?>