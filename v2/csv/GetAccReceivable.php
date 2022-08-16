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
$filename = "Acc_Receivable.csv";
$handle = fopen("$path/csv/$filename", "r");
$filedate = filemtime("$path/csv/$filename");

fgetcsv($handle);
$now = date('Y-m-d H:i:s', $filedate);

$list_divisi = [];

$tanggal = pg_fetch_row(pg_query($conn, "SELECT tgl_piutang FROM trx_acc_receivable WHERE tgl_piutang = '$now'"));
if (!isset($tanggal[0]) && fgetcsv($handle)) {
    while (($column = fgetcsv($handle, 1000000, ";")) !== FALSE) {

        $GSBER   = $column[0];
        $DMBTRX   = floatval(str_replace('.', '', $column[1]));

        $divisi = pg_fetch_row(pg_query($conn, "SELECT id_divisi FROM mst_divisi WHERE kode_divisi = '$GSBER'"));
        array_push($list_divisi, "'" . $divisi[0] . "'");

        echo '| ' . $GSBER . ' | ' . $DMBTRX . "<br>";

        $query = pg_query($conn, "INSERT INTO trx_acc_receivable (id_divisi, piutang_divisi, tgl_piutang)
                            VALUES ('$divisi[0]', '$DMBTRX', '$now')");
    }

    $sisadivisi = pg_fetch_all_columns(pg_query("SELECT id_divisi FROM mst_divisi WHERE id_divisi NOT IN (" . implode(',', $list_divisi) . ") ORDER BY id_divisi ASC"));

    foreach ($sisadivisi as $id_div) {
        pg_query($conn, "INSERT INTO trx_acc_receivable (id_divisi, piutang_divisi, tgl_piutang)
                               VALUES ('$id_div', '0', '$now')");
    }
    fclose($handle);
    copy("$path/csv/$filename", "$path/backup/$filename");

    echo " [Selesai]<br>";
} else if (!fgetcsv($handle)) {
    echo 'file incorrect';
}
