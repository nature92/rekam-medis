<?php
function toTitle($str)
{
    return ucwords(str_replace('_', ' ', $str));
}

function idNameToText($str){
    return preg_replace_callback_array([
        "/_/" => function ($m) {
            return " ";
        },
        "/^[a-z]| [a-z]/" => function ($m) {
            return strtoupper($m[0]);
        },
    ], $str);
}

function filterNumber($number)
{
    $strNum = strval($number);

    if (strlen($strNum) < 4) {
        $result = ['angka' => $number, 'satuan' => ''];
    } else if ($number  < pow(10, 6)) {
        $result = ['angka' => floatval($number / 1000), 'satuan' => 'Ribu '];
    } else if ($number  < pow(10, 9)) {
        $result = ['angka' => floatval($number / 1000000), 'satuan' => 'Juta '];
    } else if ($number  < pow(10, 12)) {
        $result = ['angka' => floatval($number / 1000000000), 'satuan' => 'Miliar '];
    } else if ($number  >= pow(10, 12)) {
        $result = ['angka' => floatval($number / 1000000000000), 'satuan' => 'Triliun '];
    }
    $result['angka'] = number_format($result['angka'], 2, ',', '.');


    return ($result);
}

function separateNumber($number)
{
    if (is_numeric($number)) {
        if (preg_match('/\./', $number)) {
            return number_format($number, 2, ',', '.');
        } else {
            return number_format($number, 0, ',', '.');
        }
    } else {
        return $number;
    }
}

function parseNumberLocaleId($str){
    return preg_replace(['/\./', '/\,/'], ['', '.'], $str);
}

function filterCurrency($currency)
{
    switch ($currency) {
        case 'IDR':
            return 'Rp.';
        case 'USD':
            return '$';
        case 'AUD':
            return 'A$';
        case 'SGD':
            return 'S$';
        case 'EUR':
            return '€';
        case 'GBP':
            return '£';
        case 'WON':
            return '₩';
        case 'YEN':
            return '￥';
        case 'CNY':
            return 'C￥';



        default:
            return $currency;
    }
}

function listBulan(){
    $bulan = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
    ];

    return $bulan;
}

function translateBulan($date)
{
    preg_match("/(?=([a-zA-Z]+))(?=[^WIB])/", $date, $month);
    $current = $month[1];

    if (preg_match("/^\w+(r|l)y$/", $current)) {
        $translated = preg_replace("/y/", 'i', $current);
    } else if (preg_match("/^\w+ch$/", $current)) {
        $translated = preg_replace("/ch/", 'et', $current);
    } else if (preg_match("/^\w+ay$/", $current)) {
        $translated = preg_replace("/ay/", 'ei', $current);
    } else if (preg_match("/^\w+e$/", $current)) {
        $translated = preg_replace("/e/", 'i', $current);
    } else if (preg_match("/^\w+ugust$/", $current)) {
        $translated = preg_replace("/ugust/", 'gustus', $current);
    } else if (preg_match("/^oc\w+$/i", $current)) {
        $translated = preg_replace("/c/", 'k', $current);
    } else if (preg_match("/^dec\w+$/i", $current)) {
        $translated = preg_replace("/c/", 's', $current);
    } else {
        $translated = $current;
    }

    $newdate = preg_replace("/$current/", $translated, $date);
    return $newdate;
}

function filterAllDataTable($data)
{
    $array = get_object_vars($data);
    foreach (array_keys($array) as $key) {
        $data->$key = filterDataTable($data->$key, 'input');
    }
    return $data;
}

function filterDateRange($date)
{
    if (DateTime::createFromFormat('Y-m-d H:i:s', $date) || DateTime::createFromFormat('Y-m-d H:i:s.u', $date) || DateTime::createFromFormat('Y-m-d', $date)) {
        return date("d/m/Y", strtotime($date));
    }
}

function filterDataTable($data, $type = '')
{

    if ($data === 't') return 'Aktif';
    else if ($data === 'f') return 'Tidak Aktif';
    else if ($data === 'Aktif') return 'true';
    else if ($data === 'Tidak Aktif') return 'false';
    else if ($type === 'input' && (DateTime::createFromFormat('Y-m-d H:i:s', $data) || DateTime::createFromFormat('Y-m-d H:i:s.u', $data))) return date("Y-m-d", strtotime($data)) . "T" . date("H:i", strtotime($data));
    else if ($type === 'date-only') return date("d/m/Y", strtotime($data));
    else if (DateTime::createFromFormat('Y-m-d H:i:s', $data) || DateTime::createFromFormat('Y-m-d H:i:s.u', $data)) return date("d/m/Y H:i", strtotime($data));
    else if (DateTime::createFromFormat('Y-m-d', $data)) return date("d/m/Y", strtotime($data));
    else if ($type === 'table' && strpos($data, 'rgb(') !== False) return "<div class='label-box m-1' style='background-color:" . $data . "'></div>" . $data;
    else return ($data);
}

function addDaysToDate($date, $days, $fromFormat = "Y-m-d H:i:s", $toFormat = "d/m/Y")
{
    $newDate = date_create_from_format($fromFormat, $date);
    $addDate = date_add($newDate, date_interval_create_from_date_string("$days days"));
    return date_format($addDate, $toFormat);
}

function convertRegularDate($date)
{
    return date("d/m/Y - H:i", strtotime($date));
}

function dateTimeToDate($str)
{
    return preg_replace('/(.+)\s(.+)/', '$1', $str);
}

function filterColorOpacity($str, $opacity)
{
    return preg_replace('/(rgb)\((\d+),(\d+),(\d+)\)/', "$1a($2,$3,$4,$opacity)", $str);
}

function generatePass($npp, $time)
{
    $alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
    $str1 = strrev($npp);

    $sec1 = '';
    $str2 = '';
    for ($i = 0; $i < strlen($str1); $i++) {
        $digit = substr($str1, $i, 1);
        $digit2 = substr($time, $i, 1);
        $sec1 .= substr_replace($digit, $alphabet[$digit], 0, 1);
        $str2 .= substr_replace($digit2, $alphabet[$digit2], 0, 1);
    }

    $str2 = strrev($str2);

    $sec2 = substr($npp, 3, 1);

    $sec3 = substr($str2, 1, 1);

    $sec4 = substr($npp, 4, 1);

    $sec5 = substr_replace($str2, '', 1, 1);

    $generate = $sec1 . $sec2 . $sec3 . $sec4 . $sec5;
    return $generate;
}

function konversiKurs($mst_kurs, $num, $from, $to)
{
    $from_kurs = 1;
    $to_kurs = 1;

    foreach ($mst_kurs as $kurs) {
        if ($from === $kurs->kode_currency) $from_kurs = $kurs->rasio_kurs;
        if ($to === $kurs->kode_currency) $to_kurs = $kurs->rasio_kurs;
    }

    $konversi = $num * $from_kurs / $to_kurs;
    return $konversi;
}

function filterDiffDate($date)
{
    $now = date("Y-m-d H:i:s", strtotime('today'));
    $str = '';
    if (DateTime::createFromFormat('Y-m-d H:i:s', $date)) {
        $checkDate = date_diff(date_create($now), date_create($date))->format('%r%a');
        $checkHour = date_diff(date_create($now), date_create($date))->format('%r%h');

        // $checkDate += ($checkHour / 24);
        $checkHour < 0 && $checkDate += (floor($checkHour  / 24));
        $checkHour > 24 && $checkDate += (ceil($checkHour  / 24));

        if (($checkDate == 0 || $checkDate === '-0')) $str = 'Hari Ini';
        else if ($checkDate == -1) $str = 'Kemarin';
        else if ($checkDate == 1) $str = 'Besok';

        else if (-7 < $checkDate && $checkDate < -1) $str = $checkDate . ' Hari Yang Lalu';
        else if (-30 < $checkDate && $checkDate <= -7) $str = ceil($checkDate / 7) . ' Minggu Yang Lalu';
        else if (-365 < $checkDate && $checkDate <= -30) $str = ceil($checkDate / 30) . ' Bulan Yang Lalu';
        else if ($checkDate <= -365) $str = ceil($checkDate / 365) . ' Tahun Yang Lalu';
    } else {
        return $date;
    }
    return preg_replace('/-/', '', $str);
}

function filterColumnOrder($column, $menu)
{
    function changeOrder($column, $a, $b)
    {
        $arr = [];
        foreach (array_keys($column) as $i) {
            if ($i === $a) array_push($arr, $column[$b]);
            else if ($i === $b) array_push($arr, $column[$a]);
            else array_push($arr, $column[$i]);
        }
        return $arr;
    }

    switch ($menu) {
        case 'user':
            return changeOrder($column, 1, 3);
            break;

        case 'rekening':
            return changeOrder($column, 2, 4);
            break;

        default:
            return $column;
            break;
    }
}

function filterColumn($column)
{
    $index = 0;
    foreach ($column as $col) {
        if (
            ($index == 0 && strpos($col->name, 'id_') !== False) ||
            $col->name === 'created_date' ||
            $col->name === 'created_by' ||
            $col->name === 'last_modified_date' ||
            $col->name === 'last_modified_by' ||
            $col->name === 'password' ||
            $col->name === 'tgl_pembukaan' ||
            $col->name === 'tgl_penutupan' ||
            $col->name === 'cabang' ||
            $col->name === 'keterangan'
        ) {
            unset($column[$index]);
        }
        $index++;
    }

    return $column;
}

function filterInputColumn($column, $menu = '', $tipe = '')
{
    $index = 0;
    foreach ($column as $col) {
        if (
            $index == 0 ||
            $col->name === 'created_date' ||
            $col->name === 'created_by' ||
            $col->name === 'last_modified_date' ||
            $col->name === 'last_modified_by' ||
            $col->name === 'last_login'
        ) {
            unset($column[$index]);
        }

        if (
            $menu !== 'user' &&
            $tipe !== 'add' &&
            $col->name === 'password'
        ) {
            unset($column[$index]);
        }
        $index++;
    }

    return $column;
}

function filterInput($inputName, $foreign = [], $type, $browser = '', $enumValue = '')
{
    if ($foreign) {
?>
        <select class="form-control" id="<?= str_replace('nama_', 'id_', $inputName) . '-' . $type ?>" name='<?= str_replace('nama_', 'id_', $inputName) ?>'>
            <?php
            foreach ($foreign as $fk) {
                if ($fk->status === 't') {

            ?>
                    <option value='<?= $fk->id ?>' <?php if ($fk->status !== 't') echo 'disabled'; ?>><?= $fk->name ?></option>
            <?php
                }
            }
            ?>
        </select>
    <?php
    } else if (!is_null($enumValue)) {
        $enum = explode(",", $enumValue);
    ?>
        <select class="form-control" id="<?= $inputName . '-' . $type ?>" name='<?= $inputName ?>'>
            <?php foreach ($enum as $e) : ?>
                <option value='<?= $e ?>'><?= $e ?></option>
            <?php endforeach; ?>
        </select>
    <?php
    } else if ($inputName === 'status') {
    ?>
        <select class="form-control" id="<?= $inputName . '-' . $type ?>" name='<?= $inputName ?>'>
            <option value='Aktif'>Aktif</option>
            <option value='Tidak Aktif'>Tidak Aktif</option>
        </select>
    <?php
    } else if (strpos($inputName, 'tgl_') !== False) {
        $datepicker = $browser === 'Firefox' ? 'datepicker-single' : '';
    ?>
        <div id='input-<?= $inputName ?>'>
            <input type="date" class="form-control" id="<?= $inputName . '-' . $type ?>" name='<?= $inputName ?>' onkeyup="validation(this)">
        </div>
    <?php

    } else if ($inputName === 'keterangan') {
    ?>
        <div id='input-<?= $inputName ?>'>
            <textarea class="form-control" id="<?= $inputName . '-' . $type ?>" name='<?= $inputName ?>' onkeyup="validation(this)" placeholder="Keterangan"></textarea>
        </div>
    <?php
    } else if ($inputName === 'npp') {
    ?>
        <div id='input-<?= $inputName ?>'>
            <input type="number" class="form-control" id="<?= $inputName . '-' . $type ?>" name='<?= $inputName ?>' onkeyup="getPersonil(this.value); validation(this)">
            <div class="d-flex" style='justify-content:flex-end;margin-top:-28px;right:50px;position:absolute'>
                <div class='spinner-border spinner-border-sm text-secondary' id='npp-spinner' role='status' hidden></div>
            </div>
        </div>
    <?php
    } else if ($inputName === 'password') {
    ?>
        <div id='input-<?= $inputName ?>'>
            <input type="password" class="form-control" id="<?= $inputName . '-' . $type ?>" name='<?= $inputName ?>' onkeyup="validation(this)">
        </div>
    <?php
    } else if (strpos($inputName, 'warna') !== False) {
    ?>
        <div id='input-<?= $inputName ?>'>
            <input data-jscolor="" value='rgb(<?= rand(0, 255) ?>,<?= rand(0, 255) ?>,<?= rand(0, 255) ?>)' class="form-control" id="<?= $inputName . '-' . $type ?>" name='<?= $inputName ?>'>
        </div>
    <?php
    } else if ($inputName === 'nama_user') {
    ?>
        <div id='input-<?= $inputName ?>'>
            <input type="text" class="form-control" id="<?= $inputName . '-' . $type ?>" name='<?= $inputName ?>' onkeyup="getUser(this.value); validation(this)">
        </div>

    <?php
    } else {
    ?>
        <div id='input-<?= $inputName ?>'>
            <input type="text" class="form-control" id="<?= $inputName . '-' . $type ?>" name='<?= $inputName ?>' onkeyup="validation(this)" placeholder="<?= idNameToText($inputName) ?>">
        </div>
<?php
    }
}
