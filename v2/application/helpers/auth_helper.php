<?php

function getAdmin()
{
    $adminIp = [
        "::1",
        "192.168.17.214",
        "192.168.1.170",
        "192.168.17.165",
        "192.168.3.186",
        "192.168.1.115",
        "192.168.17.166",
        "192.168.3.230"
    ];
    return $adminIp;
}

function getPass()
{
    $pass = 'Corfin-IS2020';
    return $pass;
}

function auth($session)
{
    if (!$session->userdata('admin_session')) redirect('login');
    else {
        $user = get_object_vars($session->userdata('admin_session'));
        if (!checkToken($user['token'])) redirect('logout');
    }
}

function generateToken()
{
    $pass = getPass();
    return password_hash($pass, PASSWORD_BCRYPT);
}

function checkToken($hash)
{
    $pass = getPass();
    $check = password_verify($pass, $hash);
    return $check;
}

function authSetting($setting, $ip)
{
    $now = date("Y-m-d");
    if (!in_array($ip, getAdmin())) {
        foreach ($setting as $set) {
            $checkDate = date_diff(date_create($now), date_create($set->expired_date))->format('%r%a');

            if ($set->nama_pengaturan === 'maintenance' && $set->status === 't' && $checkDate > 0) {
                redirect('maintenance');
            }
        }
    }
}
