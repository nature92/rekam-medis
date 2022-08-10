function validation(input) {
  //Menu---------------------------------
  input.name === "judul_menu" && validate(input, [require, [min_length, 4]]);
  input.name === "url_menu" && validate(input, [require, [min_length, 4]]);
  input.name === "nama_menu" && validate(input, [require, [min_length, 3]]);

  //Kategori Menu------------------------
  input.name === "nama_kategori_menu" && validate(input, [require, [min_length, 4]]);
  input.name === "url_kategori_menu" && validate(input, [require, [min_length, 4]]);

  //Role----------------------------------------
  input.name === "nama_role" && validate(input, [require, alpha_space, [min_length, 4]]);

  //User----------------------------------------
  input.name === "npp" && validate(input, [require, num, [min_length, 4]]);
  input.name === "nama_user" && validate(input, [require, custom_name, [min_length, 3]]);
  input.name === "password" && validate(input, [password, [min_length, 6]]);

  //Bank----------------------------------------
  input.name === "kode_bank" && validate(input, [require, num, [min_length, 3]]);
  input.name === "nama_bank" && validate(input, [require, alpha_num_space, [min_length, 3]]);

  //Currency----------------------------------------
  input.name === "kode_currency" && validate(input, [require, alpha_num, [min_length, 3]]);
  input.name === "nama_currency" && validate(input, [require, alpha_space, [min_length, 3]]);

  //Jenis Rekening----------------------------------------
  input.name === "nama_jenis_rekening" && validate(input, [require, alpha_num_space, [min_length, 3]]);

  //Rekening----------------------------------------
  input.name === "no_rekening" && validate(input, [require, num, [min_length, 5]]);
  input.name === "tgl_pembukaan" && validate(input, [require]);
  // input.name === "tgl_penutupan" && validate(input, [require, date]);
  input.name === "cabang" && validate(input, [require, alpha_space, [min_length, 3]]);
  input.name === "peruntukkan" && validate(input, [require, [min_length, 4]]);
  input.name === "keterangan" && validate(input, [[min_length, 5]]);

  //Pendanaan----------------------------------------
  input.name === "nama_jenis_pendanaan" && validate(input, [require]);

  //Arus Kas----------------------------------------
  input.name === "nama_jenis_arus_kas" && validate(input, [require]);
  input.name === "nama_jenis_transaksi_arus_kas" && validate(input, [require]);
}
