<?php

include "GetDivisi.php";
include "GetCurrency.php";
include "GetAccReceivable.php";

pg_query($conn, "INSERT INTO trx_scheduler (tgl_scheduler) VALUES ('" . date('Y-m-d H:i') . "')");

if (php_sapi_name() === 'cli') {
    sleep(60);
}
