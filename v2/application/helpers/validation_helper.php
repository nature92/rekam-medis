<?php

function validate($postArrays, $verify)
{
    //Validasi Login
    if (isset($postArrays['username'])) $verify->set_rules('username', 'NPP', 'numeric|required');

    //Validasi Ganti Password
    if (isset($postArrays['old_pass'])) $verify->set_rules('old_pass', 'Password Lama', 'required');
    if (isset($postArrays['new_pass'])) $verify->set_rules('new_pass', 'Password Baru', 'min_length[6]|max_length[50]|required');
    if (isset($postArrays['conf_pass'])) $verify->set_rules('conf_pass', 'Konfirmasi Password', 'matches[new_pass]|required');

    //Validasi Menu
    if (isset($postArrays['judul_menu'])) $verify->set_rules('judul_menu', 'Judul Menu', 'min_length[4]|required');
    if (isset($postArrays['url_menu'])) $verify->set_rules('url_menu', 'Url Menu', 'min_length[4]|required');
    if (isset($postArrays['nama_menu'])) $verify->set_rules('nama_menu', 'Nama Menu', 'min_length[3]|required');

    //Validasi Kategori Menu
    if (isset($postArrays['nama_kategori_menu'])) $verify->set_rules('nama_kategori_menu', 'Nama Kategori Menu', 'min_length[4]|required');
    if (isset($postArrays['url_kategori_menu'])) $verify->set_rules('url_kategori_menu', 'Url Kategori Menu', 'min_length[4]|required');

    //Validasi Role
    if (isset($postArrays['nama_role'])) $verify->set_rules('nama_role', 'Nama Role', 'min_length[4]|max_length[50]|alpha_numeric_spaces|required');

    //Validasi User
    if (isset($postArrays['npp'])) $verify->set_rules('npp', 'NPP', 'min_length[5]|max_length[10]|numeric|required');
    if (isset($postArrays['nama_user'])) $verify->set_rules('nama_user', 'Nama Role', 'min_length[5]|max_length[50]|required');
    if (isset($postArrays['password'])) $verify->set_rules('password', 'Password', 'min_length[6]|max_length[50]|required');

    //Validasi Bank
    if (isset($postArrays['kode_bank'])) $verify->set_rules('kode_bank', 'Kode Bank', 'min_length[2]|max_length[10]|numeric|required');
    if (isset($postArrays['nama_bank'])) $verify->set_rules('nama_bank', 'Nama Bank', 'min_length[2]|max_length[50]|alpha_numeric_spaces|required');

    //Validasi Currency
    if (isset($postArrays['kode_currency'])) $verify->set_rules('kode_currency', 'Kode Currency', 'min_length[2]|max_length[10]|alpha_numeric|required');
    if (isset($postArrays['nama_currency'])) $verify->set_rules('nama_currency', 'Nama Currency', 'min_length[3]|max_length[50]|alpha_numeric_spaces|required');

    //Validasi Jenis Rekening
    if (isset($postArrays['nama_jenis_rekening'])) $verify->set_rules('nama_jenis_rekening', 'Nama Jenis Rekening', 'min_length[3]|max_length[50]|alpha_numeric_spaces|required');

    //Validasi Rekening
    if (isset($postArrays['no_rekening'])) $verify->set_rules('no_rekening', 'No. Rekening', 'min_length[3]|max_length[50]|numeric|required');
    if (isset($postArrays['tgl_pembukaan'])) $verify->set_rules('tgl_pembukaan', 'Tgl Pembukaan', 'regex_match[/\d{4}-\d{2}-\d{2}T\d{2}:\d{2}|\d{4}-\d{2}-\d{2}/]|required');
    // if (isset($postArrays['tgl_penutupan'])) $verify->set_rules('tgl_penutupan', 'Tgl Penutupan', 'regex_match[/\d{4}-\d{2}-\d{2}T\d{2}:\d{2}/]|required');
    if (isset($postArrays['cabang'])) $verify->set_rules('cabang', 'Cabang', 'min_length[3]|max_length[50]|alpha_numeric_spaces|required');
    if (isset($postArrays['peruntukkan'])) $verify->set_rules('peruntukkan', 'Peruntukkan', 'required');
    if (isset($postArrays['keterangan'])) $verify->set_rules('keterangan', 'Keterangan', 'min_length[3]|max_length[100]');

    //Validasi Jenis Pendanaan
    if (isset($postArrays['nama_jenis_pendanaan'])) $verify->set_rules('nama_jenis_pendanaan', 'Nama Jenis Pendanaan', 'required');

    //Validasi Arus Kas
    if (isset($postArrays['nama_jenis_arus_kas'])) $verify->set_rules('nama_jenis_arus_kas', 'Nama Jenis Arus Kas', 'required');
    if (isset($postArrays['nama_jenis_transaksi_arus_kas'])) $verify->set_rules('nama_jenis_transaksi_arus_kas', 'Nama Jenis Transaksi Arus Kas', 'required');

    //Global
    if (isset($postArrays['status'])) $verify->set_rules('status', 'Status', 'required');

    //Error Message
    $verify->set_message('required', '%s harus diisi.');
    $verify->set_message('min_length', '{field} tidak boleh kurang dari {param} huruf/digit.');
    $verify->set_message('max_length', '{field} tidak boleh lebih dari {param} huruf/digit.');
    $verify->set_message('numeric', '%s hanya boleh diisi dengan angka.');
    $verify->set_message('alpha', '%s hanya boleh diisi dengan huruf.');
    $verify->set_message('alpha_numeric', '%s hanya boleh diisi dengan huruf atau angka.');
    $verify->set_message('matches', '{field} tidak cocok.');
    $verify->set_message('regex_match', '%s yang anda masukkan salah.');
}
