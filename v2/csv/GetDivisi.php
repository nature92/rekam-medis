<?php
//DB details

$dbHost     = '192.168.11.55';
$dbUsername = 'luthfihizb';
$dbPassword = 'admin';
$dbName     = 'corfin-dev_db';

$conn_str = "host = $dbHost port = 5432 dbname = $dbName user = $dbUsername password = $dbPassword";

$conn = pg_connect($conn_str);

if (!$conn) {
    die("Koneksi gagal: " . pg_errormessage($conn));
}

$path = "/home/ds-ftp/ftp/files";
$filename = "Divisi.csv";
$handle = fopen("$path/csv/$filename", "r");

if (fgetcsv($handle)) {
    while (($column = fgetcsv($handle, 1000000, ";")) !== FALSE) {

        $GSBER   = $column[0];
        $GTEXT   = $column[1];


        $exist = pg_fetch_row(pg_query($conn, "SELECT * FROM mst_divisi WHERE kode_divisi = '$GSBER'"));

        echo '| ' . $GSBER . ' | ' . $GTEXT . "<br>";

        if (!$exist && intval($GSBER, 10) >= 1000 && intval($GSBER, 10) <= 5000) {
            pg_query($conn, "INSERT INTO mst_divisi (kode_divisi, nama_divisi, id_kategori_produksi)
                            VALUES ('$GSBER', '$GTEXT', '1')");
        } else if ($exist[1] === $GSBER && $exist[2] !== $GTEXT) {
            pg_query($conn, "UPDATE mst_divisi SET nama_divisi = '$GTEXT' WHERE kode_divisi = '$GSBER'");
        }
    }
    fclose($handle);
    copy("$path/csv/$filename", "$path/backup/$filename");

    echo " [Selesai]<br>";
} else {
    'Path incorrect!';
}
