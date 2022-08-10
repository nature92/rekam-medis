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
$filename = "Currency.csv";
$handle = fopen("$path/csv/$filename", "r");


$list_divisi = [];

if (fgetcsv($handle)) {
    while (($column = fgetcsv($handle, 1000000, ";")) !== FALSE) {

        $GDATU   = date('Y-m-d', strtotime(99999999 - $column[0]));
        $FCURR = $column[1];
        $TCURR = $column[2];
        $UKURS = (float)str_replace(',', '.', $column[3]) * 1000;


        $query = pg_query($conn, "INSERT INTO mst_kurs
                                        (kode_currency, rasio_kurs, tgl_kurs)
                                    VALUES
                                        ('$FCURR', '$UKURS', '$GDATU')
                                    ON CONFLICT (kode_currency)
                                    DO
                                    UPDATE SET rasio_kurs = '$UKURS', tgl_kurs = '$GDATU'");


        echo '| ' . $GDATU . ' | ' . $FCURR . ' | ' . $TCURR . ' | ' . $UKURS . ' | <br>';
    }
    fclose($handle);
    copy("$path/csv/$filename", "$path/backup/$filename");

    echo " [Selesai]<br>";
} else {
    'Path incorrect!';
}
