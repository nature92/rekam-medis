<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah LC/SKBDN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
			<!--<?= form_open_multipart("transaksi/lc/addLC2/") ?> -->
			<form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/addLC2" method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <!--<form method='post' action='<?= base_url() ?>transaksi/lc/addlc'> -->
                <div class="modal-body">
                    <div class="row">	<input type="hidden" class="form-control" id="uid" name="uid" value="<?php echo uniqid() ?>"/>
						<div class="form-group col-md-3 modal-input">
                            <label class="col-form-label">LC/SKBDN</label>
                            <div id='input-lc-add'>
                                <div class="custom-control custom-radio mb-3">
									<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="LC" checked="checked" >
									<label class="custom-control-label" for="customRadio1">LC</label>
								</div>
                            </div>
                        </div>
						<div class="form-group col-md-3 modal-input">
                            <label class="col-form-label"> &nbsp </label>
                            <div id='input-skbdn-add'>
                                <div class="custom-control custom-radio"> 
									<input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="SKBDN" >
									<label class="custom-control-label" for="customRadio2">SKBDN</label>
								</div>
                            </div>
                        </div>
						<div class="form-group col-md-3 modal-input">
                            <label class="col-form-label"> &nbsp </label>
                            <div id='input-lc_pmn-add'>
                                <div class="custom-control custom-radio mb-3">
									<input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" value="LC_PMN" >
									<label class="custom-control-label" for="customRadio3">LC PMN</label>
								</div>
                            </div>
                        </div>
						<div class="form-group col-md-3 modal-input">
                            <label class="col-form-label"> &nbsp </label>
                            <div id='input-skbdn_pmn-add'>
                                <div class="custom-control custom-radio">
									<input type="radio" id="customRadio4" name="customRadio" class="custom-control-input" value="SKBDN_PMN">
									<label class="custom-control-label" for="customRadio4">SKBDN PMN</label>
								</div>
                            </div>
                        </div>
						<input type="hidden" id="lc_atau_skbdn" name="lc_atau_skbdn" class="form-control" value="LC">
						<hr class="col-11 hr-input-modal" />

                        <!-- TAHAPAN -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">TAHAPAN</label>
                            <div id='input-nomor_surat-add'>
                                <select id="tahapan" name="tahapan" required> 
                                    <option value="" disabled selected>Pilih Tahapan</option>
									<option value="ALL">Sekaligus</option>
									<option value="1" >1</option>
									<option value="2" >2</option>
									<option value="3" >3</option>
									<option value="4" >4</option>
									<option value="5" >5</option>
									<option value="6" >6</option>
									<option value="7" >7</option>
									<option value="8" >8</option>
									<option value="9" >9</option>
									<option value="10" >10</option>
									<option value="11" >11</option>
									<option value="12" >12</option>
									<option value="13" >13</option>
									<option value="14" >14</option>
									<option value="15" >15</option>
									<option value="16" >16</option>
									<option value="17" >17</option>
									<option value="18" >18</option>
									<option value="19" >19</option>
									<option value="20" >20</option>
									<option value="21" >21</option>
									<option value="22" >22</option>
									<option value="23" >23</option>
									<option value="24" >24</option>
									<option value="25" >25</option>
									<option value="26" >26</option>
									<option value="27" >27</option>
									<option value="28" >28</option>
									<option value="29" >29</option>
									<option value="30" >30</option>
                                </select>
                            </div>
                        </div>
						
						<!-- NOMOR SURAT -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">NOMOR SURAT</label>
                            <div id='input-nomor_surat-add'>
                                <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat" > 
                            </div>
                        </div>
						
						<!-- TANGGAL SURAT AJUAN ISC -->
                        <div class="form-group col-md-4 modal-input">
                            <label class="col-form-label">TANGGAL SURAT AJUAN ISC</label>
                            <div id='input-tanggal_surat_ajuan_isc-add'>
                                <input type="date" class="form-control" id="tanggal_surat_ajuan_isc-add" name="tanggal_surat_ajuan_isc" value="<?= date("Y-m-d") ?>"> 
                            </div>
                        </div>

                        <!-- Nomor PO -->
                        <div class="form-group col-md-3 modal-input">
                            <label class="col-form-label">NO PO</label>
                            <div id='input-nomor_po-add'>
                                <input type="text" class="form-control" id="nomor_po-add" name="nomor_po" placeholder="Nomor PO"> 
                            </div>
                        </div>
						
						<!-- Nominal Pembukaan -->
                        <div class="form-group col-md-3 modal-input">
                            <!--<label class="col-form-label">NOMINAL PEMBUKAAN</label>-->
                            <label class="col-form-label"><div id="label_nominal" class="pull-right"></div></label>
                            <div id='input-nominal_pembukaan-add'>
                                <input type="text" class="form-control input-number number-separator" id="nominal_pembukaan-add" name="nominal_pembukaan" placeholder="Nominal PO" required onkeyup="functionKeyUpNominalPembukaan()" > 
                                <input type="hidden" class="form-control input-number number-separator" id="nominal_pembukaan-add1" name="nominal_pembukaan1" placeholder="Nominal PO" required > 
                            </div>
                        </div>

                        <!-- NO KONTRAK -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">NO KONTRAK PENGADAAN</label>
                            <div id='input-nomor_kontrak-add'>
                                <input type="text" class="form-control" id="nomor_kontrak-add" name="nomor_kontrak" placeholder="No Kontrak Pengadaan"> 
                            </div>
                        </div>
						
						<!-- TANGGAL SJAN -->
                        <div class="form-group col-md-3 modal-input">
                            <label class="col-form-label">TANGGAL SJAN</label>
                            <div id='input-tanggal_sjan-add'>
                                <input type="date" class="form-control" id="tanggal_sjan-add" name="tanggal_sjan" value="<?= date("Y-m-d") ?>"> 
                            </div>
                        </div>
						
						<!-- WAKTU PENGIRIMAN BARANG -->
                        <div class="form-group col-md-3 modal-input">
                            <label class="col-form-label">WAKTU PENGIRIMAN BARANG</label>
                            <div id='input-waktu_pengiriman_barang-add'>
                                <input type="date" class="form-control" id="waktu_pengiriman_barang-add" name="waktu_pengiriman_barang" placeholder="WAKTU PENGIRIMAN BARANG" value="<?= date("Y-m-d") ?>">
                            </div>
                        </div>
						
						<!-- Divisi -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">DIVISI</label>
                            <div id='input-divisi-add'>
                                <select id="divisi-add" name="divisi" required> 
                                    <option value="" disabled selected>Pilih Divisi</option>
                                    <?php foreach ($divisi as $div): ?>
                                        <option value="<?= $div->kode_unit ?>"><?= $div->nama_unit ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- VENDOR -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">VENDOR</label>
                            <div id='input-vendor-add'>
                                <!--<input type="text" class="form-control" id="vendor-add" name="vendor" placeholder="Vendor" >  -->
								<select id="vendor-add" name="id_vendor" required> 
                                    <option value="" disabled selected>Pilih Vendor</option>
                                    <?php foreach ($vendor as $ven): ?>
                                        <option value="<?= $ven->id_vendor ?>"><?= $ven->nama_vendor ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
	
						<!-- ALAMAT VENDOR -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">ALAMAT VENDOR</label>
                            <div id='input-alamat_vendor-add'>
                                <textarea class="form-control" id="alamat_vendor-add" name="alamat_vendor" placeholder="Alamat Vendor"></textarea> 
                            </div>
                        </div>

						<!-- NAMA BARANG -->
                        <!--<div class="form-group col-md-2 modal-input">
                            <label class="col-form-label">NAMA BARANG</label>
                            <div id='input-nama_barang-add'>
                                <input type="text" class="form-control input-number" id="nama_barang-add" name="nama_barang" placeholder="Nama Barang" >
                            </div>
                        </div>
						<div class="form-group col-md-2 modal-input">
                            <label class="col-form-label"> &nbsp </label>
                            <div id='input-quantity_barang-add'>
                                <input type="text" class="form-control number-separator" id="quantity_barang-add" name="quantity_barang" placeholder="Quantity" >
                            </div>
                        </div>
						<div class="form-group col-md-2 modal-input">
                            <label class="col-form-label"> &nbsp </label>
                            <div id='input-satuan_barang-add'>
								<input type="text" class="form-control number-separator" id="satuan_barang-add" name="satuan_barang" placeholder="Satuan" > 
                            </div>
                        </div> -->
						<div class="form-group col-md-12 modal-input">
							<table class="table table-bordered table-hover" id="tab_logic">
								<thead>
									<tr >
										<th class="text-center">Nama Barang</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Satuan</th>
										<th class="text-center">Tanggal Pengiriman</th>
										<th class="text-center">Tolerance</th>
									</tr>
								</thead>
								<tbody>
									<tr id='barang0'>
										<td><input type="text" name='nama_barang0' placeholder='Nama Barang' class="form-control" required /></td>
										<td><input type="text" name='quantity_barang0' placeholder='Quantity' class="form-control input-number number-separator" required /></td>
										<td><input type="text" name='satuan_barang0' placeholder='Satuan' class="form-control" required /></td>
										<td><input type="date" name='tanggal_pengiriman0' placeholder='Tanggal Pengiriman' class="form-control" required /></td>
										<td><input type="text" name='tolerance0' placeholder='Tolerance' class="form-control" required /></td>
									</tr>
									<tr id='barang1'></tr>
								</tbody>
							</table>
							<a id="add_row" class="pull-left btn btn-success " style="color:white">Tambah Data</a>
							<a id='delete_row' class="pull-right btn btn-danger" style="color:white">Hapus Data</a>
							<input type="hidden" class="form-control" id="total_barang" name="total_barang" value="<?php echo set_value('total_barang'); ?>"/>
						</div>
                
						<!-- NILAI KONTRAK SEBELUM PPN -->
                        <div class="form-group col-md-2 modal-input">
                            <label class="col-form-label">Nilai Kontrak Sblm PPN</label>
                            <div id='input-mata_uang-add'>
                                <!--<input type="text" class="form-control" id="mata_uang-add" name="mata_uang_add" placeholder="Mata Uang" > -->
								<select id="mata_uang-add" name="mata_uang_add" onchange="getMataUang(0, this.value);" required> 
                                    <option value="" disabled selected>Pilih Mata Uang</option>
                                    <?php foreach ($matauang as $uang): ?>
                                        <option value="<?= $uang->kode_currency ?>"><?= $uang->kode_currency ?> - <?= $uang->nama_currency ?></option>
                                    <?php endforeach; ?>
                                </select>
								<input type="hidden" class="form-control input-number number-separator" id="nama_mata_uang-add" name="nama_mata_uang" placeholder="Mata Uang">
                            </div>
                        </div>
						<div class="form-group col-md-2 modal-input">
                            <label class="col-form-label" id="label_nilai_kurs-add"> Nilai Kurs </label>
                            <div id='input-nilai_kurs-add'>
                                <!--<input type="text" class="form-control" id="nilai_kurs-add" name="nilai_kurs" placeholder="Nilai Kurs" value="0">-->
                                <input type="text" class="form-control input-number number-separator" id="nilai_kurs-add" name="nilai_kurs" placeholder="Nilai Kurs" onkeyup="functionKeyUpNilaiKurs()">
                                <input type="hidden" class="form-control" id="nilai_kurs-add1" name="nilai_kurs1add" placeholder="Nilai Kurs">
                            </div>
                        </div>
						<div class="form-group col-md-2 modal-input">
                            <!--<label class="col-form-label"> Nominal Kontrak </label> -->
                            <label class="col-form-label"> Nominal Pembukaan </label>
                            <div id='input-nominal_kontrak-add'>
								<input type="text" class="form-control input-number number-separator" id="nominal_kontrak-add" name="nominal_kontrak" placeholder="Nominal Pembukaan" onkeyup="functionKeyUp()"> 
								<input type="hidden" class="form-control" id="nominal_kontrak-add1" name="nominal_kontrak1" placeholder="Nominal Kontrak"> 
                            </div>
                        </div>
						
						<div class="form-group col-md-6 modal-input" id="additional_cost_table">
							<table class="table table-bordered table-hover" id="tab_logic_additional_cost">
								<thead>
									<tr >
										<th class="text-center">Additional Cost</th>
										<th class="text-center">Nilai</th>
									</tr>
								</thead>
								<tbody>
									<tr id='additional_cost0'>
										<td><input type="text" name='additional_cost0' placeholder='Additional Cost' class="form-control" /></td>
										<td><input type="text" name='nilai_additional0' placeholder='Nilai' class="form-control input-number number-separator" /></td>
									</tr>
									<tr id='additional_cost1'></tr>
								</tbody>
							</table>
							<a id="add_row_additional_cost" class="pull-left btn btn-success " style="color:white">Tambah Data</a>
							<a id='delete_row_additional_cost' class="pull-right btn btn-danger" style="color:white">Hapus Data</a>
							<input type="hidden" class="form-control" id="total_additional_cost" name="total_additional_cost" value="<?php echo set_value('total_additional_cost'); ?>"/>
						</div>

                        <hr class="col-11 hr-input-modal" />
						
						<!-- Hitung Pajak Otomatis -->
						<div id='hitung_otomatis_pajak' class="form-group col-md-12 modal-input">
                            <div id='input-customHitungOtomatis-add'>
                                <div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customHitungOtomatis" name="customHitungOtomatis" value="1" onclick="myFunctionHitungOtomatis()">
									<label class="custom-control-label" id="labelCustomHitungOtomatis" for="customHitungOtomatis">Hitung Pajak Otomatis</label>
								</div>
                            </div>
                        </div>
						
						<!-- PROSENTASE PPN -->
                        <div id='input-prosentase_ppn-add' class="form-group col-md-2 modal-input">
                            <label class="col-form-label">PROSENTASE PPN (%)</label>
                            <div id='input-prosentase_ppn-add'>
                                <input type="text" class="form-control input-number number-separator" id="prosentase_ppn-add" name="prosentase_ppn_add" onkeyup="getProsetasePPN();" placeholder="Prosentase PPN (%)" required >
								<input type="hidden" class="form-control input-number number-separator" id="nilai_prosentase_ppn-add" name="nilai_prosentase_ppn_add" placeholder="Prosentase PPN">
                            </div>
                        </div>
						
						<!-- PPN -->
                        <div id='input-ppn_10_persen-add' class="form-group col-md-4 modal-input">
                            <label class="col-form-label">NILAI PPN</label>
                            <div>
                                <!--<input type="text" class="form-control" id="ppn_10_persen-add" name="ppn_10_persen" placeholder="PPN (10%)" value="0">-->
                                <input type="text" class="form-control input-number number-separator" id="ppn_10_persen-add" name="ppn_10_persen" placeholder="NILAI PPN" onkeyup="functionKeyUp()">
                                <input type="hidden" class="form-control" id="ppn_10_persen-add1" name="ppn_10_persen1" placeholder="PPN (10%)">
                            </div>
                        </div>
						
						<!-- PPH 22 -->
                        <div id='input-pph_22-add' class="form-group col-md-6 modal-input">
                            <label class="col-form-label">PPH 22</label>
                            <div>
                                <input type="text" class="form-control input-number number-separator" id="pph_22-add" name="pph_22" placeholder="PPH 22" onkeyup="functionKeyUpPPH22()">
                                <input type="hidden" class="form-control" id="pph_22-add1" name="pph_221" placeholder="PPH 22">
                            </div>
                        </div>
						
						<!-- PPH 23 -->
                        <div id='input-pph_23-add' class="form-group col-md-6 modal-input">
                            <label class="col-form-label">PPH 23</label>
                            <div>
                                <input type="text" class="form-control input-number number-separator" id="pph_23-add" name="pph_23" placeholder="PPH 23" onkeyup="functionKeyUpPPH23()">
                                <input type="hidden" class="form-control" id="pph_23-add1" name="pph_231" placeholder="PPH 23">
                            </div>
                        </div>
						
						<!-- PPH 4(2) -->
                        <div id='input-pph_4_2-add' class="form-group col-md-6 modal-input">
                            <label class="col-form-label">PPH 4(2)</label>
                            <div>
                                <input type="text" class="form-control input-number number-separator" id="pph_4_2-add" name="pph_4_2" placeholder="PPH 4(2)" onkeyup="functionKeyUpPPH42()">
                                <input type="hidden" class="form-control" id="pph_4_2-add1" name="pph_4_21" placeholder="PPH 4(2)">
                            </div>
                        </div>
						
						<!-- SWASTA/BUMN -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">SWASTA/BUMN</label>
                            <div id='input-swasta_atau_bumn-add'>
                                <select id="swasta_atau_bumn" name="swasta_atau_bumn" onchange="getPilihan(0, this.value);" required> 
                                    <option value="" disabled selected>Pilih SWASTA/BUMN</option>
									<option value="BUMN" >BUMN</option>
									<option value="SWASTA" >SWASTA</option>
                                </select>
                            </div>
                        </div>
						
						<!-- NILAI LC/SKBDN -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">NILAI LC/SKBDN</label>
                            <div id='input-nilai_lc_atau_skbdn-add'>
                                <input type="text" class="form-control" id="nilai_lc_atau_skbdn-add" name="nilai_lc_atau_skbdn" readonly placeholder="NILAI LC/SKBDN" >
                                <input type="hidden" class="form-control" id="nilai_lc_atau_skbdn-add1" name="nilai_lc_atau_skbdn1" readonly placeholder="NILAI LC/SKBDN" >
                            </div>
                        </div>
						
						<hr class="col-11 hr-input-modal" />
						
						<!-- KELENGKAPAN -->
						<div class="form-group col-md-3 modal-input">
                            <label class="col-form-label">KELENGKAPAN <i>Upload File Maks 60mb</i></label>
                            <div id='input-po_asli-add'>
                                <div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck1" name="customCheck1" value="1" onclick="myFunction()">
									<label class="custom-control-label" for="customCheck1">PO ASLI</label>
								</div>
                            </div>
                        </div>
						
						<div class="form-group col-md-9 modal-input">
                            <label class="col-form-label"> &nbsp </label>
                            <div id='input-dok_kelengkapan_po_asli-add'>
								<!--<input class='form-control' type="file" id='dok_kelengkapan_po_asli' name='dok_kelengkapan_po_asli' accept="application/pdf">-->
								<table class="table table-bordered table-hover" id="tab_logic_doc_po_asli">
									<tbody>
										<tr id='dokPoAsli0'>
											<td>
												<input class='form-control' type="file" id='dok_kelengkapan_po_asli0' name='dok_kelengkapan_po_asli0' accept="application/pdf">
											</td>                                                                 
										</tr>
										<tr id='dokPoAsli1'></tr>
									</tbody>
								</table>
								<a id="add_row_doc_po_asli" class="pull-left btn btn-success " style="color:white">Tambah Upload</a>
								<a id='delete_row_doc_po_asli' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
								<input type="hidden" class="form-control" id="total_doc_po_asli" name="total_doc_po_asli" value="<?php echo set_value('total_doc_po_asli'); ?>"/>
                            </div>
                        </div>
						
						<div class="form-group col-md-3 modal-input">
                            <label class="col-form-label"> &nbsp </label>
                            <div id='input-jamlak_asli-add'>
                                <div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck2" name="customCheck2" value="2" onclick="myFunction()">
									<label class="custom-control-label" for="customCheck2">JAMLAK ASLI</label>
								</div>
                            </div>
                        </div>
						
						<div class="form-group col-md-9 modal-input">
                            <label class="col-form-label"> &nbsp </label>
                            <div id='input-dok_kelengkapan_jamlak_asli-add'>
								<!--<input class='form-control' type="file" id='dok_kelengkapan_jamlak_asli' name='dok_kelengkapan_jamlak_asli' accept="application/pdf"> -->
								<table class="table table-bordered table-hover" id="tab_logic_doc_jamlak_asli">
									<tbody>
										<tr id='dokjamlakAsli0'>
											<td>
												<input class='form-control' type="file" id='dok_kelengkapan_jamlak_asli0' name='dok_kelengkapan_jamlak_asli0' accept="application/pdf">
											</td>                                                                 
										</tr>
										<tr id='dokjamlakAsli1'></tr>
									</tbody>
								</table>
								<a id="add_row_doc_jamlak_asli" class="pull-left btn btn-success " style="color:white">Tambah Upload</a>
								<a id='delete_row_doc_jamlak_asli' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
								<input type="hidden" class="form-control" id="total_doc_jamlak_asli" name="total_doc_jamlak_asli" value="<?php echo set_value('total_doc_jamlak_asli'); ?>"/>
                            </div>
                        </div>
						
						<div class="form-group col-md-3 modal-input">
                            <label class="col-form-label"> &nbsp </label>
                            <div id='input-kontrak_asli-add'>
                                <div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customCheck3" name="customCheck3" value="3" onclick="myFunction()">
									<label class="custom-control-label" for="customCheck3">KONTRAK ASLI</label>
								</div>
                            </div>
                        </div>
						
						<div class="form-group col-md-9 modal-input">
                            <label class="col-form-label"> &nbsp </label>
                            <div id='input-dok_kelengkapan_kontrak_asli-add'>
								<!--<input class='form-control' type="file" id='dok_kelengkapan_kontrak_asli' name='dok_kelengkapan_kontrak_asli' accept="application/pdf"> -->
								<table class="table table-bordered table-hover" id="tab_logic_doc_kontrak_asli">
									<tbody>
										<tr id='dokkontrakAsli0'>
											<td>
												<input class='form-control' type="file" id='dok_kelengkapan_kontrak_asli0' name='dok_kelengkapan_kontrak_asli0' accept="application/pdf">
											</td>                                                                 
										</tr>
										<tr id='dokkontrakAsli1'></tr>
									</tbody>
								</table>
								<a id="add_row_doc_kontrak_asli" class="pull-left btn btn-success " style="color:white">Tambah Upload</a>
								<a id='delete_row_doc_kontrak_asli' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
								<input type="hidden" class="form-control" id="total_doc_kontrak_asli" name="total_doc_kontrak_asli" value="<?php echo set_value('total_doc_kontrak_asli'); ?>"/>
                            </div>
                        </div>
						
						<!-- MASA BERLAKU JAMLAK -->
                        <div class="form-group col-md-3 modal-input">
                            <label class="col-form-label" id="label_masa_berlaku_jamlak-add">MASA BERLAKU JAMLAK</label>
                            <div id='input-masa_berlaku_jamlak-add'>
                                <input type="date" class="form-control" id="masa_berlaku_jamlak-add" name="masa_berlaku_jamlak" value="<?= date("Y-m-d") ?>"> 
                            </div>
                        </div>
						
						<hr class="col-11 hr-input-modal" />
						
						<!-- SURAT KONFIRMASI KEABSAHAN BANK GARANSI -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label" id="label_surat_konfirmasi_keabsahan_bank_garansi-add">SURAT KONFIRMASI KEABSAHAN BANK GARANSI</label>
                            <div id='input-surat_konfirmasi_keabsahan_bank_garansi-add' class="input-group">
                                <input type="text" class="form-control" id="surat_konfirmasi_keabsahan_bank_garansi-add" name="surat_konfirmasi_keabsahan_bank_garansi" placeholder="SURAT KONFIRMASI KEABSAHAN BANK GARANSI" onkeyup="functionKeyUpValidasi()">
							</div>
                        </div>
						
						<div class="form-group col-md-6 modal-input">
                            <label class="col-form-label" id="label_berkas_surat_konfirmasi_keabsahan_bank_garansi"> &nbsp </label>
                            <div id='input-berkas_surat_konfirmasi_keabsahan_bank_garansi-add'>
								<input class='form-control' type="file" id='berkas_surat_konfirmasi_keabsahan_bank_garansi' name='berkas_surat_konfirmasi_keabsahan_bank_garansi' accept="application/pdf">
                            </div>
                        </div>
						
						<!-- KEABSAHAN BANK GARANSI -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label" id="label_keabsahan_bank_garansi-add">KEABSAHAN BANK GARANSI</label>
                            <div id='input-keabsahan_bank_garansi-add' class="input-group">
                                <input type="text" class="form-control" id="keabsahan_bank_garansi-add" name="keabsahan_bank_garansi" placeholder="KEABSAHAN BANK GARANSI" onkeyup="functionKeyUpValidasi()">
							</div>
                        </div>
						
						<div class="form-group col-md-6 modal-input">
                            <label class="col-form-label" id="label_berkas_keabsahan_bank_garansi"> &nbsp </label>
                            <div id='input-keabsahan_bank_garansi-add'>
								<input class='form-control' type="file" id='berkas_keabsahan_bank_garansi' name='berkas_keabsahan_bank_garansi' accept="application/pdf">
                            </div>
                        </div>
						
						<!-- NO. SURAT KEABSAHAN -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label" id="label_no_surat_keabsahan-add">NO. SURAT KEABSAHAN</label>
                            <div id='input-no_surat_keabsahan-add' class="input-group">
                                <input type="text" class="form-control" id="no_surat_keabsahan-add" name="no_surat_keabsahan" placeholder="NO. SURAT KEABSAHAN" >
							</div>
                        </div>
						
						<!-- TANGGAL SURAT KEABSAHAN -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label" id="label_tanggal_surat_keabsahan-add">TANGGAL SURAT KEABSAHAN</label>
                            <div id='input-tanggal_surat_keabsahan-add'>
                                <input type="date" class="form-control" id="tanggal_surat_keabsahan-add" name="tanggal_surat_keabsahan" value="<?= date("Y-m-d") ?>"> 
                            </div>
                        </div>
						
						<!-- KETERANGAN/ALASAN BELUM RELEASE -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">KETERANGAN/ALASAN BELUM RELEASE</label>
                            <div id='input-keterangan_atau_alasan_belum_release-add'>
                                <input type="text" class="form-control" id="keterangan_atau_alasan_belum_release-add" name="keterangan_atau_alasan_belum_release" placeholder="KETERANGAN/ALASAN BELUM RELEASE" >
                            </div>
                        </div>
						
                        <hr class="col-11 hr-input-modal" />
						
						<div class="form-group col-md-12 modal-input">
							<label class="col-form-label"><b>Nama & Alamat Bank (Advising Bank)</b></label>
						</div>
						
						<!-- SWIFT NUMBER -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">SWIFT NUMBER</label>
                            <div id='input-swift_number-add'>
                                <input type="text" class="form-control" id="swift_number-add" name="swift_number" placeholder="SWIFT NUMBER" >
                            </div>
                        </div>
						
						<!-- ADVISING BANK -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">ADVISING BANK</label>
							<!--<div id='input-advising_bank-add'>
                                <select class="form-control" id="advising_bank-add" name="advising_bank"> 
                                    <option value="BRI" selected>BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                    <option value="BJB">BJB</option>
                                </select>
                            </div>-->
                            <div id='input-advising_bank-add'>
                                <input type="text" class="form-control" id="advising_bank-add" name="advising_bank" placeholder="ADVISING BANK" >
                            </div>
                        </div>
						
						<!-- ACCOUNT NO -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">ACCOUNT NO</label>
                            <div id='input-account_no-add'>
                                <input type="text" class="form-control" id="account_no-add" name="account_no" placeholder="ACCOUNT NO" >
                            </div>
                        </div>
						
						<!-- ALAMAT BANK -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">ALAMAT BANK</label>
                            <div id='input-alamat_bank-add'>
                                <input type="text" class="form-control" id="alamat_bank-add" name="alamat_bank" placeholder="ALAMAT BANK" >
                            </div>
                        </div>
						
						<hr class="col-11 hr-input-modal" />
						
						<div class="form-group col-md-12 modal-input">
							<label class="col-form-label"><b>Kontrak Penjualan</b></label>
						</div>
						
						<!-- KODE PROYEK -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">KODE PROYEK</label>
                            <div id='input-kode_proyek-add'>
                                <input type="text" class="form-control" id="kode_proyek-add" name="kode_proyek" placeholder="KODE PROYEK" >
                            </div>
                        </div>
						
						<!-- NAMA PROYEK -->
						<div class="form-group col-md-6 modal-input">
							<label class="col-form-label">NAMA PROYEK</label>
                            <div id='input-nama_proyek-add'>
                                <input type="text" class="form-control" id="nama_proyek-add" name="nama_proyek" placeholder="NAMA PROYEK" >
                            </div>
                        </div>
						
						<!-- NOMOR KONTRAK JUAL (SO) -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">NOMOR KONTRAK JUAL (SO)</label>
                            <div id='input-nomor_kontrak_jual_so-add'>
                                <input type="text" class="form-control" id="nomor_kontrak_jual_so-add" name="nomor_kontrak_jual_so" placeholder="NOMOR KONTRAK JUAL (SO)" >
                            </div>
                        </div>
						
						<div class="form-group col-md-6 modal-input">
                            <label class="col-form-label"> &nbsp </label>
                            <div id='input-berkas_nomor_kontrak_jual_so-add'>
								<!--<input class='form-control' type="file" id='berkas_nomor_kontrak_jual_so-add' name='berkas_nomor_kontrak_jual_so' accept="application/pdf" required> -->
								<table class="table table-bordered table-hover" id="tab_logic_doc_kontrak_jual_so">
									<tbody>
										<tr id='dokkontrakjualso0'>
											<td>
												<input class='form-control' type="file" id='berkas_nomor_kontrak_jual_so0' name='berkas_nomor_kontrak_jual_so0' accept="application/pdf">
											</td>                                                                 
										</tr>
										<tr id='dokkontrakjualso1'></tr>
									</tbody>
								</table>
								<a id="add_row_doc_kontrak_jual_so" class="pull-left btn btn-success " style="color:white">Tambah Upload</a>
								<a id='delete_row_doc_kontrak_jual_so' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
								<input type="hidden" class="form-control" id="total_doc_kontrak_jual_so" name="total_doc_kontrak_jual_so" value="<?php echo set_value('total_doc_kontrak_jual_so'); ?>"/>
                            </div>
                        </div>
						
						<!-- NILAI -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">NILAI</label>
                            <div id='input-nilai-add'>
                                <input type="text" class="form-control" id="nilai-add" name="nilailc" placeholder="NILAI" onkeyup="functionKeyUpNilaiLc()">
                                <input type="hidden" class="form-control" id="nilai-add1" name="nilailc1" placeholder="NILAI">
                            </div>
                        </div>
						
						<!-- PRODUK YANG DI JUAL -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">PRODUK YANG DI JUAL</label>
                            <div id='input-produk_yang_dijual-add'>
                                <input type="text" class="form-control" id="produk_yang_dijual-add" name="produk_yang_dijual" placeholder="PRODUK YANG DI JUAL" >
                            </div>
                        </div>
						
						<!-- CUSTOMER -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">CUSTOMER</label>
                            <div id='input-customer-add'>
                                <input type="text" class="form-control" id="customer-add" name="customer" placeholder="CUSTOMER" >
                            </div>
                        </div>
						
                        <hr class="col-11 hr-input-modal" />

                        <!-- STATUS PENERBITAN -->
                        <div class="form-group col-md-6 modal-input">
                            <label class="col-form-label">STATUS PENERBITAN</label>
                            <div id='input-status_penerbitan-add'>
                                <select class="form-control" id="status_penerbitan-add" name="status_penerbitan"> 
                                    <option value="CR" selected>MENUNGGU</option>
                                    <option value="AJ">SUDAH DIAJUKAN KE BANK</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <?php if ($hak_akses->can_create === 't') : ?>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
	$(document).ready(function() {
		$('#hitung_otomatis_pajak').hide();
		$('#input-ppn_10_persen-add').hide();
		$('#input-prosentase_ppn-add').hide();
		$('#input-pph_22-add').hide();
		$('#input-pph_23-add').hide();
		$('#input-pph_4_2-add').hide();
		$('#additional_cost_table').show();
		$('#pph_22-add').prop('required',false);
		$('#pph_23-add').prop('required',false);
		$('#pph_4_2-add').prop('required',false);
		$('#nilai_kurs-add').hide(); //tambahan : muncul saat mata uang dipilih valas
		$('#label_nilai_kurs-add').hide(); //tambahan : muncul saat mata uang dipilih valas
		$('#masa_berlaku_jamlak-add').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#surat_konfirmasi_keabsahan_bank_garansi-add').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#label_masa_berlaku_jamlak-add').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#label_surat_konfirmasi_keabsahan_bank_garansi-add').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#berkas_surat_konfirmasi_keabsahan_bank_garansi').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#label_berkas_surat_konfirmasi_keabsahan_bank_garansi').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#keabsahan_bank_garansi-add').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#label_keabsahan_bank_garansi-add').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#berkas_keabsahan_bank_garansi').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#label_berkas_keabsahan_bank_garansi').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#no_surat_keabsahan-add').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#label_no_surat_keabsahan-add').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#tanggal_surat_keabsahan-add').hide(); //tambahan : muncul saat jamlak dichecklist
		$('#label_tanggal_surat_keabsahan-add').hide(); //tambahan : muncul saat jamlak dichecklist
		document.getElementById('label_nominal').innerHTML = 'NOMINAL PO';
		$("#customRadio2").click(function(){
			$('#hitung_otomatis_pajak').show();
			$('#input-ppn_10_persen-add').show();
			$('#input-prosentase_ppn-add').show();
			$('#input-pph_22-add').show();
			$('#input-pph_23-add').show();
			$('#input-pph_4_2-add').show();
			$('#additional_cost_table').hide();
			$('#lc_atau_skbdn').val('SKBDN');
			$('#pph_22-add').prop('required',true);
			$('#pph_23-add').prop('required',true);
			$('#pph_4_2-add').prop('required',true);
			document.getElementById('label_nominal').innerHTML = 'NOMINAL PO (DPP)';
		});
		$("#customRadio1").click(function(){
			$('#hitung_otomatis_pajak').hide();
			$('#input-ppn_10_persen-add').hide();
			$('#input-prosentase_ppn-add').hide();
			$('#input-pph_22-add').hide();
			$('#input-pph_23-add').hide();
			$('#input-pph_4_2-add').hide();
			$('#additional_cost_table').show();
			$('#lc_atau_skbdn').val('LC');
			$('#pph_22-add').prop('required',false);
			$('#pph_23-add').prop('required',false);
			$('#pph_4_2-add').prop('required',false);
			document.getElementById('label_nominal').innerHTML = 'NOMINAL PO';
		});
		$("#customRadio3").click(function(){
			$('#hitung_otomatis_pajak').hide();
			$('#input-ppn_10_persen-add').hide();
			$('#input-prosentase_ppn-add').hide();
			$('#input-pph_22-add').hide();
			$('#input-pph_23-add').hide();
			$('#input-pph_4_2-add').hide();
			$('#additional_cost_table').show();
			$('#lc_atau_skbdn').val('LC_PMN');
			$('#pph_22-add').prop('required',false);
			$('#pph_23-add').prop('required',false);
			$('#pph_4_2-add').prop('required',false);
			document.getElementById('label_nominal').innerHTML = 'NOMINAL PO';
		});
		$("#customRadio4").click(function(){
			$('#hitung_otomatis_pajak').show();
			$('#input-ppn_10_persen-add').show();
			$('#input-prosentase_ppn-add').show();
			$('#input-pph_22-add').show();
			$('#input-pph_23-add').show();
			$('#input-pph_4_2-add').show();
			$('#additional_cost_table').hide();
			$('#lc_atau_skbdn').val('SKBDN_PMN');
			$('#pph_22-add').prop('required',true);
			$('#pph_23-add').prop('required',true);
			$('#pph_4_2-add').prop('required',true);
			document.getElementById('label_nominal').innerHTML = 'NOMINAL PO (DPP)';
		});		
		
		var i=1;
		$("input[name='total_barang']").val(1);
		$("#add_row").click(function(){
            $('#barang'+i).html(
									"<td><input name='nama_barang"+i+"' type='text' placeholder='Nama Barang' class='form-control input-md' required></td>"+
									"<td><input name='quantity_barang"+i+"' type='text' placeholder='Quantity' class='form-control input-md input-number number-separator' required></td>"+
									"<td><input name='satuan_barang"+i+"' type='text' placeholder='Satuan' class='form-control input-md' required></td>"+
									"<td><input name='tanggal_pengiriman"+i+"' type='date' placeholder='Tanggal Pengiriman' class='form-control input-md' required></td>"+
									"<td><input name='tolerance"+i+"' type='text' placeholder='Tolerance' class='form-control input-md' required></td>"
								);           
            $('#tab_logic').append('<tr id="barang'+(i+1)+'"></tr>');
            $("input[name='total_barang']").val(i + 1);
            i++; 
        });
		$("#delete_row").click(function(){
            if(i>1){
				$("#barang"+(i-1)).html('');
				$("input[name='total_barang']").val($("input[name='total_barang']").val() - 1);
				i--;
            }
        });
		
		var n1=1;
		$("input[name='total_additional_cost']").val(1);
		$("#add_row_additional_cost").click(function(){
            $('#additional_cost'+n1).html(
									"<td><input name='additional_cost"+n1+"' type='text' placeholder='Additional Cost' class='form-control' required></td>"+
									"<td><input name='nilai_additional"+n1+"' type='text' placeholder='Nilai' class='form-control input-md input-number number-separator' required></td>"
								);           
            $('#tab_logic_additional_cost').append('<tr id="additional_cost'+(n1+1)+'"></tr>');
            $("input[name='total_additional_cost']").val(n1 + 1);
            n1++; 
        });
		$("#delete_row_additional_cost").click(function(){
            if(n1>1){
				$("#additional_cost"+(n1-1)).html('');
				$("input[name='total_additional_cost']").val($("input[name='total_additional_cost']").val() - 1);
				n1--;
            }
        });

		var j=1;
		$("input[name='total_doc_po_asli']").val(1);
		$("#add_row_doc_po_asli").click(function(){
            $('#dokPoAsli'+j).html(
										"<td><input class='form-control' type='file' id='dok_kelengkapan_po_asli"+j+"' name='dok_kelengkapan_po_asli"+j+"' accept='application/pdf'>       </td>" 
								   );           
            $('#tab_logic_doc_po_asli').append('<tr id="dokPoAsli'+(j+1)+'"></tr>');
            $("input[name='total_doc_po_asli']").val(j + 1);
            j++; 
        });
		$("#delete_row_doc_po_asli").click(function(){
            if(j>1){
				$("#dokPoAsli"+(j-1)).html('');
				$("input[name='total_doc_po_asli']").val($("input[name='total_doc_po_asli']").val() - 1);
				j--;
            }
        });	
		
		var k=1;
		$("input[name='total_doc_jamlak_asli']").val(1);
		$("#add_row_doc_jamlak_asli").click(function(){
            $('#dokjamlakAsli'+k).html(
											"<td><input class='form-control' type='file' id='dok_kelengkapan_jamlak_asli"+k+"' name='dok_kelengkapan_jamlak_asli"+k+"' accept='application/pdf'>       </td>" 
									);
            $('#tab_logic_doc_jamlak_asli').append('<tr id="dokjamlakAsli'+(k+1)+'"></tr>');
            $("input[name='total_doc_jamlak_asli']").val(k + 1);
            k++; 
        });
		$("#delete_row_doc_jamlak_asli").click(function(){
            if(k>1){
            $("#dokjamlakAsli"+(k-1)).html('');
            $("input[name='total_doc_jamlak_asli']").val($("input[name='total_doc_jamlak_asli']").val() - 1);
            k--;
            }
        });	
		
		var l=1;
		$("input[name='total_doc_kontrak_asli']").val(1);
		$("#add_row_doc_kontrak_asli").click(function(){
            $('#dokkontrakAsli'+l).html(
											"<td><input class='form-control' type='file' id='dok_kelengkapan_kontrak_asli"+l+"' name='dok_kelengkapan_kontrak_asli"+l+"' accept='application/pdf'>       </td>" 
									   );
            $('#tab_logic_doc_kontrak_asli').append('<tr id="dokkontrakAsli'+(l+1)+'"></tr>');
            $("input[name='total_doc_kontrak_asli']").val(l + 1);
            l++; 
        });
		$("#delete_row_doc_kontrak_asli").click(function(){
            if(l>1){
				$("#dokkontrakAsli"+(l-1)).html('');
				$("input[name='total_doc_kontrak_asli']").val($("input[name='total_doc_kontrak_asli']").val() - 1);
				l--;
            }
        });	
		
		var m=1;
		$("input[name='total_doc_kontrak_jual_so']").val(1);
		$("#add_row_doc_kontrak_jual_so").click(function(){
            $('#dokkontrakjualso'+m).html(
											"<td><input class='form-control' type='file' id='berkas_nomor_kontrak_jual_so"+m+"' name='berkas_nomor_kontrak_jual_so"+m+"' accept='application/pdf'>       </td>" 
										   );
            $('#tab_logic_doc_kontrak_jual_so').append('<tr id="dokkontrakjualso'+(m+1)+'"></tr>');
            $("input[name='total_doc_kontrak_jual_so']").val(m + 1);
            m++; 
        });
		$("#delete_row_doc_kontrak_jual_so").click(function(){
            if(m>1){
				$("#dokkontrakjualso"+(m-1)).html('');
				$("input[name='total_doc_kontrak_jual_so']").val($("input[name='total_doc_kontrak_jual_so']").val() - 1);
				m--;
            }
        });	
	});	
	
	function getMataUang(no, mata_uang_add) {
		// alert(mata_uang_add);
		$("input[name='nama_mata_uang']").val(mata_uang_add);
        var mata_uang_add = $("select[name='mata_uang_add']").val();
		if(mata_uang_add == 'IDR'){
			$('#nilai_kurs-add').hide();
			$('#label_nilai_kurs-add').hide();
			// $('#nilai_kurs-add').prop('required',false);
			$("input[name='nilai_kurs']").val(0);
		}else{
			$('#nilai_kurs-add').show();
			$('#label_nilai_kurs-add').show();
			$('#nilai_kurs-add').prop('required',true);
		}
    }
	
	function getProsetasePPN() {
		// var prosentase_ppn_add 			= $("select[name='prosentase_ppn_add']").val();
		var prosentase_ppn_add 			= $("input[name='prosentase_ppn_add']").val();
		$("input[name='nilai_prosentase_ppn_add']").val(prosentase_ppn_add);
		
		var nominal_kontrak 			= $("input[name='nominal_kontrak']").val();
		var replace_nominal		 		= nominal_kontrak.replace(".", "");
		var replace_nilai_kontrak 		= replace_nominal.replace(".", "");
		var replace_ulang_nilai			= replace_nilai_kontrak.replace(".", "");
		var replace_ulang_nilai_kontrak = replace_ulang_nilai.replace(".", "");
		var hasil_kontrak				= replace_ulang_nilai_kontrak.replace(",", ",");
		$("input[name='nominal_kontrak1']").val(hasil_kontrak);
		var float_replace_ulang_nilai_kontrak 	= parseFloat(replace_ulang_nilai_kontrak);
		var prosentaseppn 						= prosentase_ppn_add / 100 * float_replace_ulang_nilai_kontrak;  // perubahan
		var prosentaseppn_fixed2 				= prosentaseppn.toFixed(2);
		var hasilprosentaseppn_fixed2 			= addCommas(prosentaseppn_fixed2);
		$("input[name='ppn_10_persen']").val(hasilprosentaseppn_fixed2);
		
		var ppn_10_persen 				= $("input[name='ppn_10_persen']").val();
		var replace_ppn			 		= ppn_10_persen.replace(",", "");
		var replace_ppn10persen 		= replace_ppn.replace(",", "");
		var replace_ulang_ppn10			= replace_ppn10persen.replace(",", "");
		var replace_ulang_ppn10persen	= replace_ulang_ppn10.replace(",", "");
		var hasil_ppn_10_persen			= replace_ulang_ppn10persen.replace(".", ".");
		$("input[name='ppn_10_persen1']").val(hasil_ppn_10_persen);
    }
	
	function functionKeyUpNilaiKurs() {
		var nilai_kurs 					= $("input[name='nilai_kurs']").val();
		var replace_kurs				= nilai_kurs.replace(".", "");
		var replace_nilai_kurs 			= replace_kurs.replace(".", "");
		var replace_ulang_nilai 		= replace_nilai_kurs.replace(".", "");
		var replace_ulang_nilai_kurs 	= replace_ulang_nilai.replace(".", "");
		var hasil_kurs 					= replace_ulang_nilai_kurs.replace(",", ".");
		$("input[name='nilai_kurs1add']").val(hasil_kurs);
	}	
	
	function functionKeyUpNominalPembukaan() {
		var buka 						= $("input[name='nominal_pembukaan']").val();
		var pembuka		 				= buka.replace(".", "");
		var pembukaan			 		= pembuka.replace(".", "");
		var nom_pembuka 				= pembukaan.replace(".", "");
		var nom_pembukaan 				= nom_pembuka.replace(".", "");
		var nomin_pembukaan				= nom_pembukaan.replace(",", ".");
		$("input[name='nominal_pembukaan1']").val(nomin_pembukaan);
	}
	
	function functionKeyUp() {
		var nominal_kontrak 			= $("input[name='nominal_kontrak']").val();
		var replace_nominal		 		= nominal_kontrak.replace(".", "");
		var replace_nilai_kontrak 		= replace_nominal.replace(".", "");
		var replace_ulang_nilai			= replace_nilai_kontrak.replace(".", "");
		var replace_ulang_nilai_kontrak = replace_ulang_nilai.replace(".", "");
		var hasil_kontrak				= replace_ulang_nilai_kontrak.replace(",", ",");
		$("input[name='nominal_kontrak1']").val(hasil_kontrak);
		var float_replace_ulang_nilai_kontrak = parseFloat(replace_ulang_nilai_kontrak);
		// var prosentaseppn = 11 / 100 * float_replace_ulang_nilai_kontrak; // asli
		var prosentaseppn = 0 / 100 * float_replace_ulang_nilai_kontrak;
		var prosentaseppn_fixed2 = prosentaseppn.toFixed(2);
		var hasilprosentaseppn_fixed2 = addCommas(prosentaseppn_fixed2);
		// $("input[name='ppn_10_persen']").val(prosentaseppn.toFixed(2));
		$("input[name='ppn_10_persen']").val(hasilprosentaseppn_fixed2);
		
		var ppn_10_persen 				= $("input[name='ppn_10_persen']").val();
		var replace_ppn			 		= ppn_10_persen.replace(",", "");
		var replace_ppn10persen 		= replace_ppn.replace(",", "");
		var replace_ulang_ppn10			= replace_ppn10persen.replace(",", "");
		var replace_ulang_ppn10persen	= replace_ulang_ppn10.replace(",", "");
		var hasil_ppn_10_persen			= replace_ulang_ppn10persen.replace(".", ".");
		$("input[name='ppn_10_persen1']").val(hasil_ppn_10_persen);
	}
	
	function functionKeyUpNilaiLc() {
		var nilai						= $("input[name='nilailc']").val();
		var replace_nilai			 	= nilai.replace(".", "");
		var replace_nilai_kontrak		= replace_nilai.replace(".", "");
		var replace_unilai_kontrak		= replace_nilai_kontrak.replace(".", "");
		var replace_unilai_kontrak_ulang= replace_unilai_kontrak.replace(".", "");
		var hasil_nilai					= replace_unilai_kontrak_ulang.replace(",", ".");
		$("input[name='nilailc1']").val(nilai);
	}
	
	function functionKeyUpPPH22() {
		var pph_22 						= $("input[name='pph_22']").val();
		var replace_pph			 		= pph_22.replace(".", "");
		var replace_pph22 				= replace_pph.replace(".", "");
		var replace_ulang_pph			= replace_pph22.replace(".", "");
		var replace_ulang_pph22			= replace_ulang_pph.replace(".", "");
		var hasil_pph_22				= replace_ulang_pph22.replace(",", ".");
		$("input[name='pph_221']").val(hasil_pph_22);
	}
	
	function functionKeyUpPPH23() {
		var pph_23 						= $("input[name='pph_23']").val();
		var replace_pph2			 	= pph_23.replace(".", "");
		var replace_pph23 				= replace_pph2.replace(".", "");
		var replace_ulang_pph3			= replace_pph23.replace(".", "");
		var replace_ulang_pph23			= replace_ulang_pph3.replace(".", "");
		var hasil_pph_23				= replace_ulang_pph23.replace(",", ".");
		$("input[name='pph_231']").val(hasil_pph_23);
	}
	
	function functionKeyUpPPH42() {
		var pph_4_2						= $("input[name='pph_4_2']").val();
		var replace_pph_4			 	= pph_4_2.replace(".", "");
		var replace_pph_4_2				= replace_pph_4.replace(".", "");
		var replace_ulang_pph_4			= replace_pph_4_2.replace(".", "");
		var replace_ulang_pph_4_2		= replace_ulang_pph_4.replace(".", "");
		var hasil_pph_4_2				= replace_ulang_pph_4_2.replace(",", ".");
		$("input[name='pph_4_21']").val(hasil_pph_4_2);
	}
	
	function functionKeyUpValidasi() {
		var cek = $("input[name='surat_konfirmasi_keabsahan_bank_garansi']").val();
		var cek2 = $("input[name='keabsahan_bank_garansi']").val();
		if (cek != null){
			// $('#berkas_surat_konfirmasi_keabsahan_bank_garansi').prop('required',true); //asli
			$('#berkas_surat_konfirmasi_keabsahan_bank_garansi').prop('required',false);
		}else{
			$('#berkas_surat_konfirmasi_keabsahan_bank_garansi').prop('required',false);
		}
		if (cek2 != null){
			// $('#berkas_keabsahan_bank_garansi').prop('required',true); //asli
			$('#berkas_keabsahan_bank_garansi').prop('required',false);
		}else{
			$('#berkas_keabsahan_bank_garansi').prop('required',false);
		}
	}
	
	function myFunctionHitungOtomatis() {
		var customHitungOtomatis = document.getElementById("customHitungOtomatis");
		if (customHitungOtomatis.checked == true){
			var nominal_kontraks = $("input[name='nominal_kontrak1']").val();
			var float_nominal_kontraks = parseFloat(nominal_kontraks);
			var prosentasepph22 = 1.5 / 100 * float_nominal_kontraks;
			var prosentasepph22_fixed2 = prosentasepph22.toFixed(2);
			var hasil_prosentasepph22_fixed2 = addCommas(prosentasepph22_fixed2);
			$("input[name='pph_22']").val(hasil_prosentasepph22_fixed2.replace(".", "."));
			$("input[name='pph_221']").val(prosentasepph22_fixed2.replace(".", "."));
			
			var prosentasepph23 = 2 / 100 * float_nominal_kontraks;
			var prosentasepph23_fixed2 = prosentasepph23.toFixed(2);
			var hasil_prosentasepph23_fixed2 = addCommas(prosentasepph23_fixed2);
			$("input[name='pph_23']").val(hasil_prosentasepph23_fixed2.replace(".", "."));
			$("input[name='pph_231']").val(prosentasepph23_fixed2.replace(".", "."));
			
			var prosentasepph4_2 = 3 / 100 * float_nominal_kontraks;
			var prosentasepph4_2_fixed2 = prosentasepph4_2.toFixed(2);
			var hasil_prosentasepph4_2_fixed2 = addCommas(prosentasepph4_2_fixed2);
			$("input[name='pph_4_2']").val(hasil_prosentasepph4_2_fixed2.replace(".", "."));
			$("input[name='pph_4_21']").val(prosentasepph4_2_fixed2.replace(".", "."));
		}
	}
	
	function getPilihan(no, npp) {
		var nilai0 = $("input[name='nilai_additional0']").val();
		if (nilai0 === '' || nilai0 === 'NaN' ||  nilai0 === undefined || nilai0 === null){
			var nilai0_4 = 0;
		}else{
			var nilai0_1			 	= nilai0.replace(".", "");
			var nilai0_2				= nilai0_1.replace(".", "");
			var nilai0_3				= nilai0_2.replace(".", "");
			var nilai0_4				= nilai0_3.replace(".", "");
		}
		var nilai0_float = parseFloat(nilai0_4);
		
		var nilai1 = $("input[name='nilai_additional1']").val();
		if (nilai1 === '' || nilai1 === 'NaN' ||  nilai1 === undefined || nilai1 === null){
			var nilai1_4 = 0;
		}else{
			var nilai1_1			 	= nilai1.replace(".", "");
			var nilai1_2				= nilai1_1.replace(".", "");
			var nilai1_3				= nilai1_2.replace(".", "");
			var nilai1_4				= nilai1_3.replace(".", "");
		}
		var nilai1_float = parseFloat(nilai1_4);
		
		var nilai2 = $("input[name='nilai_additional2']").val();
		if (nilai2 === '' || nilai2 === 'NaN' || nilai2 === undefined || nilai2 === null){
			var nilai2_4 = 0;
		}else{
			var nilai2_1			 	= nilai2.replace(".", "");
			var nilai2_2				= nilai2_1.replace(".", "");
			var nilai2_3				= nilai2_2.replace(".", "");
			var nilai2_4				= nilai2_3.replace(".", "");
		}
		var nilai2_float = parseFloat(nilai2_4);
		
		var nilai3 = $("input[name='nilai_additional3']").val();
		if (nilai3 === '' || nilai3 === 'NaN' || nilai3 === undefined || nilai3 === null){
			var nilai3_4 = 0;
		}else{
			var nilai3_1			 	= nilai3.replace(".", "");
			var nilai3_2				= nilai3_1.replace(".", "");
			var nilai3_3				= nilai3_2.replace(".", "");
			var nilai3_4				= nilai3_3.replace(".", "");
		}
		var nilai3_float = parseFloat(nilai3_4);
		
		var nilai4 = $("input[name='nilai_additional4']").val();
		if (nilai4 === '' || nilai4 === 'NaN' || nilai4 === undefined || nilai4 === null){
			var nilai4_4 = 0;
		}else{
			var nilai4_1			 	= nilai4.replace(".", "");
			var nilai4_2				= nilai4_1.replace(".", "");
			var nilai4_3				= nilai4_2.replace(".", "");
			var nilai4_4				= nilai4_3.replace(".", "");
		}
		var nilai4_float = parseFloat(nilai4_4);
		
		var nilai5 = $("input[name='nilai_additional5']").val();
		if (nilai5 === '' || nilai5 === 'NaN' || nilai5 === undefined || nilai5 === null){
			var nilai5_4 = 0;
		}else{
			var nilai5_1			 	= nilai5.replace(".", "");
			var nilai5_2				= nilai5_1.replace(".", "");
			var nilai5_3				= nilai5_2.replace(".", "");
			var nilai5_4				= nilai5_3.replace(".", "");
		}
		var nilai5_float = parseFloat(nilai5_4);
		
		var nilai6 = $("input[name='nilai_additional6']").val();
		if (nilai6 === '' || nilai6 === 'NaN' || nilai6 === undefined || nilai6 === null){
			var nilai6_4 = 0;
		}else{
			var nilai6_1			 	= nilai6.replace(".", "");
			var nilai6_2				= nilai6_1.replace(".", "");
			var nilai6_3				= nilai6_2.replace(".", "");
			var nilai6_4				= nilai6_3.replace(".", "");
		}
		var nilai6_float = parseFloat(nilai6_4);
		
		var nilai7 = $("input[name='nilai_additional7']").val();
		if (nilai7 === '' || nilai7 === 'NaN' || nilai7 === undefined || nilai7 === null){
			var nilai7_4 = 0;
		}else{
			var nilai7_1			 	= nilai7.replace(".", "");
			var nilai7_2				= nilai7_1.replace(".", "");
			var nilai7_3				= nilai7_2.replace(".", "");
			var nilai7_4				= nilai7_3.replace(".", "");
		}
		var nilai7_float = parseFloat(nilai7_4);
		
		var nilai8 = $("input[name='nilai_additional8']").val();
		if (nilai8 === '' || nilai8 === 'NaN' || nilai8 === undefined || nilai8 === null){
			var nilai8_4 = 0;
		}else{
			var nilai8_1			 	= nilai8.replace(".", "");
			var nilai8_2				= nilai8_1.replace(".", "");
			var nilai8_3				= nilai8_2.replace(".", "");
			var nilai8_4				= nilai8_3.replace(".", "");
		}
		var nilai8_float = parseFloat(nilai8_4);
		
		var nilai9 = $("input[name='nilai_additional9']").val();
		if (nilai9 === '' || nilai9 === 'NaN' || nilai9 === undefined || nilai9 === null){
			var nilai9_4 = 0;
		}else{
			var nilai9_1			 	= nilai9.replace(".", "");
			var nilai9_2				= nilai9_1.replace(".", "");
			var nilai9_3				= nilai9_2.replace(".", "");
			var nilai9_4				= nilai9_3.replace(".", "");
		}
		var nilai9_float = parseFloat(nilai9_4);
		
		var total_nilai_float = nilai0_float + nilai1_float + nilai2_float + nilai3_float + nilai4_float + nilai5_float + nilai6_float + nilai7_float + nilai8_float + nilai9_float;
		
        var swasta_atau_bumn = $("select[name='swasta_atau_bumn']").val();  //status perusahaan
		var nilai_kontrak = $("input[name='nominal_kontrak1']").val();
		var nilai_kontrak_float = parseFloat(nilai_kontrak);
		var ppn_10_persen = $("input[name='ppn_10_persen1']").val();
		var ppn_10_persen_float = parseFloat(ppn_10_persen);
		var pph_22 = $("input[name='pph_221']").val();
		var pph_23 = $("input[name='pph_231']").val();
		var pph_4_2 = $("input[name='pph_4_21']").val();
		var lc_atau_skbdn = $("input[name='lc_atau_skbdn']").val(); //variabel lc atau skbdn
		// if(swasta_atau_bumn == 'BUMN'){
		if((lc_atau_skbdn === 'LC' && swasta_atau_bumn === 'SWASTA') || (lc_atau_skbdn === 'LC' && swasta_atau_bumn === 'BUMN') || (lc_atau_skbdn === 'LC_PMN' && swasta_atau_bumn === 'SWASTA') || (lc_atau_skbdn === 'LC_PMN' && swasta_atau_bumn === 'BUMN')){			
		   // var hasil0 = nilai_kontrak_float; //asli
		   var hasil0 = nilai_kontrak_float + total_nilai_float;
		   var numhasil0 = addCommas(hasil0);
		   $("input[name='nilai_lc_atau_skbdn']").val(numhasil0);
		   $("input[name='nilai_lc_atau_skbdn1']").val(hasil0);
		} else if ((lc_atau_skbdn === 'SKBDN' && swasta_atau_bumn === 'SWASTA') || (lc_atau_skbdn === 'SKBDN_PMN' && swasta_atau_bumn === 'SWASTA')){
			var hasil2 = nilai_kontrak_float - pph_22 - pph_23 - pph_4_2;
			var numhasil2 = addCommas(hasil2);
			$("input[name='nilai_lc_atau_skbdn']").val(numhasil2);
			$("input[name='nilai_lc_atau_skbdn1']").val(hasil2);
		} else if ((lc_atau_skbdn === 'SKBDN' && swasta_atau_bumn === 'BUMN') || (lc_atau_skbdn === 'SKBDN_PMN' && swasta_atau_bumn === 'BUMN')){
			var hasil = (nilai_kontrak_float + ppn_10_persen_float) - pph_22 - pph_23 - pph_4_2;
			var numhasil = addCommas(hasil);
			$("input[name='nilai_lc_atau_skbdn']").val(numhasil);
			$("input[name='nilai_lc_atau_skbdn1']").val(hasil);
		} else {
			$("input[name='nilai_lc_atau_skbdn1']").val(0);
		}
    }
	
	function addCommas(nStr) {
		nStr += '';
		x = nStr.split('.');
		x1 = x[0];
		x2 = x.length > 1 ? '.' + x[1] : '';
		var rgx = /(\d+)(\d{3})/;
		while (rgx.test(x1)) {
			x1 = x1.replace(rgx, '$1' + ',' + '$2');
		}
		return x1 + x2;
	}
	
	function myFunction() {
		var customCheck1 = document.getElementById("customCheck1");
		var customCheck2 = document.getElementById("customCheck2");
		var customCheck3 = document.getElementById("customCheck3");
		var text = document.getElementById("text");
		if (customCheck2.checked == true){
			$('#masa_berlaku_jamlak-add').show();
			$('#surat_konfirmasi_keabsahan_bank_garansi-add').show();
			$('#label_masa_berlaku_jamlak-add').show();
			$('#label_surat_konfirmasi_keabsahan_bank_garansi-add').show();
			$('#berkas_surat_konfirmasi_keabsahan_bank_garansi').show();
			$('#label_berkas_surat_konfirmasi_keabsahan_bank_garansi').show();
			$('#keabsahan_bank_garansi-add').show();
			$('#label_keabsahan_bank_garansi-add').show();
			$('#berkas_keabsahan_bank_garansi').show();
			$('#label_berkas_keabsahan_bank_garansi').show();
			$('#no_surat_keabsahan-add').show();
			$('#label_no_surat_keabsahan-add').show();
			$('#tanggal_surat_keabsahan-add').show();
			$('#label_tanggal_surat_keabsahan-add').show();			
			$('#dok_kelengkapan_jamlak_asli0').prop('required',true);
		} else {
			$('#masa_berlaku_jamlak-add').hide();
			$('#surat_konfirmasi_keabsahan_bank_garansi-add').hide();
			$('#label_masa_berlaku_jamlak-add').hide();
			$('#label_surat_konfirmasi_keabsahan_bank_garansi-add').hide();
			$('#berkas_surat_konfirmasi_keabsahan_bank_garansi').hide();
			$('#label_berkas_surat_konfirmasi_keabsahan_bank_garansi').hide();
			$('#keabsahan_bank_garansi-add').hide();
			$('#label_keabsahan_bank_garansi-add').hide();
			$('#berkas_keabsahan_bank_garansi').hide();
			$('#label_berkas_keabsahan_bank_garansi').hide();
			$('#no_surat_keabsahan-add').hide();
			$('#label_no_surat_keabsahan-add').hide();
			$('#tanggal_surat_keabsahan-add').hide();
			$('#label_tanggal_surat_keabsahan-add').hide();
			$('#dok_kelengkapan_jamlak_asli0').prop('required',false);
		}
		
		if (customCheck1.checked == true){
			$('#dok_kelengkapan_po_asli0').prop('required',true);
		}else{
			$('#dok_kelengkapan_po_asli0').prop('required',false);
		}
		if (customCheck3.checked == true){
			$('#dok_kelengkapan_kontrak_asli0').prop('required',true);
		}else{
			$('#dok_kelengkapan_kontrak_asli0').prop('required',false);
		}
	}
	
    $(document).ready(function() {
        //Divisi Select Searchable ------------------------------------------
        $('#divisi-add').selectize({
            sortField: 'text'
        });
		
		$('#vendor-add').selectize({
            sortField: 'text'
        });
		
		$('#mata_uang-add').selectize({
            sortField: 'text'
        });
		
		$('#lc_skbdn').selectize({
            sortField: 'text'
        });
		
		$('#swasta_atau_bumn').selectize({
            sortField: 'text'
        });

		$('#tahapan').selectize({
            // sortField: 'text'
        });
		
    })
</script>