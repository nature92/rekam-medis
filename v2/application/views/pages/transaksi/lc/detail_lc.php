<!--<button class='btn btn-primary' onclick="javascript:history.go(-1)"> <i class="fa fa-arrow-left"></i> Kembali </button>-->
<a href="<?= base_url() ?>transaksi/lc" class='btn btn-primary'><i class="fa fa-arrow-left"></i> Kembali</a>
<button class='btn btn-success' onclick="unlockEdit()" id="unlockedit"> <i class="fa fa-unlock"></i> Edit </button>
<button class='btn btn-danger' onclick="lockEdit()" id="lockedit"> <i class="fa fa-lock"></i> Edit </button>
<?php  foreach($header_lc as $row) { ?>
<a href="<?php echo base_url(); ?>transaksi/lc/hapusLcSkbdn/<?php echo $row->uid; ?>" class="btn btn-danger" onclick="javascript: return confirm('Yakin hapus transaksi LC/SKBDN ?')" href="#"><i class='fa fa-trash'></i> Hapus</a>
<?php  } ?>
<br><br>
<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" href="#data-table" role="button"> Detail LC/SKBDN </a>
        </div>
    </div>
<form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/editLC"  method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="card-body table-responsive res-pad">
		<div class="row">
			<div class="form-group col-md-3 modal-input">
                <label class="col-form-label">LC/SKBDN</label>
                <div id='input-divisi-add'>
                    <div class="custom-control custom-radio mb-3">
					<?php  foreach($header_lc as $row) {
							if($row->lc_skbdn == 'LC'){ ?>
								<input type="radio" id="customRadio1Edit" name="customRadio" class="custom-control-input" value="LC" checked="checked" >
					<?php  }else{  ?>
								<input type="radio" id="customRadio1Edit" name="customRadio" class="custom-control-input" value="LC" >
					<?php  }
						}  
					?>
						<label class="custom-control-label" for="customRadio1Edit">LC</label>
					</div>
                </div>
            </div>
			<div class="form-group col-md-3 modal-input">
                <label class="col-form-label"> &nbsp </label>
                <div id='input-divisi-add'>
                    <div class="custom-control custom-radio">
					<?php foreach($header_lc as $row) {
							if($row->lc_skbdn == 'SKBDN'){ ?>
								<input type="radio" id="customRadio2Edit" name="customRadio" class="custom-control-input" value="SKBDN" checked="checked">
					<?php  }else{  ?>
								<input type="radio" id="customRadio2Edit" name="customRadio" class="custom-control-input" value="SKBDN" >
					<?php  }
						}  
					?>
						<label class="custom-control-label" for="customRadio2Edit">SKBDN</label>
					</div>
                </div>
            </div>
			<div class="form-group col-md-3 modal-input">
                <label class="col-form-label"> &nbsp </label>
                <div id='input-divisi-add'>
                    <div class="custom-control custom-radio mb-3">
					<?php foreach($header_lc as $row) {
							if($row->lc_skbdn == 'LC_PMN'){ ?>
								<input type="radio" id="customRadio3Edit" name="customRadio" class="custom-control-input" value="LC_PMN" checked="checked">
					<?php  }else{  ?>
								<input type="radio" id="customRadio3Edit" name="customRadio" class="custom-control-input" value="LC_PMN" >
					<?php  }
						}  
					?>
						<label class="custom-control-label" for="customRadio3Edit">LC PMN</label>
					</div>
                </div>
            </div>
			<div class="form-group col-md-3 modal-input">
                <label class="col-form-label"> &nbsp </label>
                <div id='input-divisi-add'>
                    <div class="custom-control custom-radio">
					<?php foreach($header_lc as $row) {
							if($row->lc_skbdn == 'SKBDN_PMN'){
					?>
								<input type="radio" id="customRadio4Edit" name="customRadio" class="custom-control-input" value="SKBDN_PMN" checked="checked">
					<?php  }else{  ?>
								<input type="radio" id="customRadio4Edit" name="customRadio" class="custom-control-input" value="SKBDN_PMN">
					<?php  }
						}  
					?>
						<label class="custom-control-label" for="customRadio4Edit">SKBDN PMN</label>
					</div>
                </div>
            </div>
			
			<hr class="col-11 hr-input-modal" />
			<input type="hidden" class="form-control" id="uid_edit" name="uid_edit" placeholder="Uid" value="<?php echo $row->uid; ?>">
			<input type="hidden" class="form-control" id="id_lc_edit" name="id_lc_edit" placeholder="id_lc" value="<?php echo $row->id_lc; ?>">
			<input type="hidden" id="lc_atau_skbdn_edit" name="lc_atau_skbdn_edit" class="form-control" value="<?php echo $row->lc_skbdn; ?>">
			
			<!-- TAHAPAN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">TAHAPAN</label>
                <div id='input-nomor_surat-edit'>					
					<select class="form-control" id='tahapan_edit' name="tahapan_edit" required>         
						<!--<option value="" selected>Pilih Tahapan</option>-->
						<option value="ALL" <?php if($row->tahapan=='ALL') echo 'selected' ?> >SEKALIGUS</option>
						<option value="1" <?php if($row->tahapan=='1') echo 'selected' ?> >1</option>
						<option value="2" <?php if($row->tahapan=='2') echo 'selected' ?> >2</option>
						<option value="3" <?php if($row->tahapan=='3') echo 'selected' ?> >3</option>
						<option value="4" <?php if($row->tahapan=='4') echo 'selected' ?> >4</option>
						<option value="5" <?php if($row->tahapan=='5') echo 'selected' ?> >5</option>
						<option value="6" <?php if($row->tahapan=='6') echo 'selected' ?> >6</option>
						<option value="7" <?php if($row->tahapan=='7') echo 'selected' ?> >7</option>
						<option value="8" <?php if($row->tahapan=='8') echo 'selected' ?> >8</option>
						<option value="9" <?php if($row->tahapan=='9') echo 'selected' ?> >9</option>
						<option value="10" <?php if($row->tahapan=='10') echo 'selected' ?> >10</option>
						<option value="11" <?php if($row->tahapan=='11') echo 'selected' ?> >11</option>
						<option value="12" <?php if($row->tahapan=='12') echo 'selected' ?> >12</option>
						<option value="13" <?php if($row->tahapan=='13') echo 'selected' ?> >13</option>
						<option value="14" <?php if($row->tahapan=='14') echo 'selected' ?> >14</option>
						<option value="15" <?php if($row->tahapan=='15') echo 'selected' ?> >15</option>
						<option value="16" <?php if($row->tahapan=='16') echo 'selected' ?> >16</option>
						<option value="17" <?php if($row->tahapan=='17') echo 'selected' ?> >17</option>
						<option value="18" <?php if($row->tahapan=='18') echo 'selected' ?> >18</option>
						<option value="19" <?php if($row->tahapan=='19') echo 'selected' ?> >19</option>
						<option value="20" <?php if($row->tahapan=='20') echo 'selected' ?> >20</option>
						<option value="21" <?php if($row->tahapan=='21') echo 'selected' ?> >21</option>
						<option value="22" <?php if($row->tahapan=='22') echo 'selected' ?> >22</option>
						<option value="23" <?php if($row->tahapan=='23') echo 'selected' ?> >23</option>
						<option value="24" <?php if($row->tahapan=='24') echo 'selected' ?> >24</option>
						<option value="25" <?php if($row->tahapan=='25') echo 'selected' ?> >25</option>
						<option value="26" <?php if($row->tahapan=='26') echo 'selected' ?> >26</option>
						<option value="27" <?php if($row->tahapan=='27') echo 'selected' ?> >27</option>
						<option value="28" <?php if($row->tahapan=='28') echo 'selected' ?> >28</option>
						<option value="29" <?php if($row->tahapan=='29') echo 'selected' ?> >29</option>
						<option value="30" <?php if($row->tahapan=='30') echo 'selected' ?> >30</option>
					</select>
                </div>
            </div>
			
			<!-- NOMOR SURAT -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">NOMOR SURAT</label>
                <div id='input-nomor_surat-edit'>
				<?php //foreach($header_lc as $row) { ?>
                    <input type="text" class="form-control" id="nomor_surat_edit" name="nomor_surat_edit" placeholder="Nomor Surat" value="<?php echo $row->nomor_surat; ?>"> 
				<?php //} ?>
                </div>
            </div>
			
			<!-- TANGGAL SURAT AJUAN ISC -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">TANGGAL SURAT AJUAN ISC</label>
                <div id='input-tanggal_surat_ajuan_isc-edit'>
                    <input type="date" class="form-control" id="tanggal_surat_ajuan_isc_edit" name="tanggal_surat_ajuan_isc_edit" value="<?php echo $row->tanggal_surat_ajuan_isc; ?>"> 
                </div>
            </div>
			
			<!-- Nomor PO -->
            <div class="form-group col-md-3 modal-input">
                <label class="col-form-label">NO PO</label>
                <div id='input-nomor_po-edit'>
                    <input type="text" class="form-control" id="nomor_po_edit" name="nomor_po_edit" placeholder="Nomor PO" value="<?php echo $row->nomor_po; ?>"> 
                </div>
            </div>
			
			<!-- Nomor PO -->
            <div class="form-group col-md-3 modal-input">
                <label class="col-form-label">NOMINAL PEMBUKAAN</label>
                <div id='input-nominal_pembukaan-edit'>
                    <input type="text" class="form-control input-number number-separator" id="nominal_pembukaan_edit" name="nominal_pembukaan_edit" onkeyup="functionKeyUpEditPembukaan()" placeholder="Nominal Pembukaan" value="<?php echo number_format($row->nominal_pembukaan); ?>"> 
                    <input type="hidden" class="form-control" id="nominal_pembukaan_edit1" name="nominal_pembukaan_edit1" placeholder="Nominal Pembukaan" value="<?php echo $row->nominal_pembukaan; ?>"> 
                </div>
            </div>
			
			<!-- NO KONTRAK -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">NO KONTRAK</label>
                <div id='input-nomor_kontrak-edit'>
                    <input type="text" class="form-control" id="nomor_kontrak_edit" name="nomor_kontrak_edit" placeholder="No Kontrak" value="<?php echo $row->nomor_kontrak; ?>"> 
                </div>
            </div>
			
			<!-- TANGGAL SJAN -->
            <div class="form-group col-md-3 modal-input">
                <label class="col-form-label">TANGGAL SJAN</label>
                <div id='input-tanggal_sjan-edit'>
                    <input type="date" class="form-control" id="tanggal_sjan_edit" name="tanggal_sjan_edit" value="<?php echo $row->tanggal_sjan; ?>"> 
                </div>
            </div>
			
			<!-- WAKTU PENGIRIMAN BARANG -->
			<div class="form-group col-md-3 modal-input">
                <label class="col-form-label">WAKTU PENGIRIMAN BARANG</label>
                <div id='input-kirim_barang-edit'>
                    <input type="date" class="form-control" id="kirim_barang" name="kirim_barang" value="<?php echo $row->waktu_pengiriman_barang; ?>"> 
                </div>
            </div>
            <!--<div class="form-group col-md-3 modal-input">
                <label class="col-form-label">WAKTU PENGIRIMAN BARANG2</label>
                <div id='input-waktu_pengiriman_barang-edit'>
                    <input type="date" class="form-control" id="waktu_pengiriman_barang-edit" name="diwaktu_pengiriman_barang_edit" placeholder="WAKTU PENGIRIMAN BARANG" value="<?php echo $row->waktu_pengiriman_barang; ?>">
                </div>
            </div>-->
			
			<!-- Divisi -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">DIVISI</label>
                <div id='input-divisi-edit'>
                    <select id="divisi-edit" name="divisi_edit" required> 
                        <option value="" disabled selected>Pilih Divisi</option>
                        <?php foreach($header_lc as $row) : 
							foreach ($divisi as $div): ?>
                            <option value="<?= $div->kode_unit ?>" <?php if($div->kode_unit == $row->divisi) echo 'selected' ?>><?= $div->nama_unit ?></option>
                        <?php endforeach; endforeach; ?>
                    </select>
                </div>
            </div>
			
			<!-- VENDOR -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">VENDOR</label>
                <div id='input-vendor-add'>
                    <input type="text" class="form-control" id="vendor_edit" name="vendor_edit" placeholder="Vendor" value="<?php echo $row->vendor; ?>"> 
                </div>
            </div>
			
			<!-- ALAMAT VENDOR -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">ALAMAT VENDOR</label>
                <div id='input-alamat_vendor-add'>
                    <textarea class="form-control" id="alamat_vendor_edit" name="alamat_vendor_edit" placeholder="Alamat Vendor"><?php echo $row->alamat_vendor; ?></textarea> 
                </div>
            </div>
			
			<!-- NAMA BARANG -->
			<div class="form-group col-md-12 modal-input">
				<table class="table table-bordered table-hover" id="tab_logic_edit">
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
                    <?php
                    $id = 0;
                    $no = 1;
                    foreach ($detail_barang as $row) {   
                    ?>
                        <tr id='<?php echo 'detail_barang'. $id; ?>'>
                            <td><input type="text" name='<?php echo 'nama_barang_edit'. $id; ?>' id='<?php echo 'nama_barang_edit'. $id; ?>' placeholder='Nama Barang' class="form-control" value="<?php echo $row->nama_barang; ?>" required /></td>                            
                            <td><input type="text" name='<?php echo 'quantity_barang_edit'. $id; ?>' id='<?php echo 'quantity_barang_edit'. $id; ?>' placeholder='Quantity Barang' class="form-control input-number number-separator" value="<?php echo number_format($row->quantity); ?>" required /></td>                                                                                   
                            <td><input type="text" name='<?php echo 'satuan_barang_edit'. $id; ?>' id='<?php echo 'satuan_barang_edit'. $id; ?>' min="0" placeholder='Satuan Barang' class="form-control" value="<?php echo $row->satuan; ?>" required /></td>
                            <td><input type="date" name='<?php echo 'tanggal_pengiriman_edit'. $id; ?>' id='<?php echo 'tanggal_pengiriman_edit'. $id; ?>' min="0" placeholder='Tanggal Pengiriman' class="form-control" value="<?php echo $row->tanggal_pengiriman; ?>" required /></td>
                            <td><input type="text" name='<?php echo 'tolerance_barang_edit'. $id; ?>' id='<?php echo 'tolerance_barang_edit'. $id; ?>' min="0" placeholder='Tolerance Barang' class="form-control" value="<?php echo $row->tolerance_barang; ?>" required /></td>
                        </tr>
                        <tr id='<?php echo 'detail_barang'. $no; ?>'></tr>
                    <?php
                    $id++;
                    $no++;
                    }
                    ?>
                    </tbody>
				</table>
				<a id="add_row_edit" class="pull-left btn btn-success " style="color:white">Tambah Data</a>
				<a id="add_row_edit1" type="button" class="pull-left btn btn-success" data-toggle="modal" style="color:white" data-target="#tambahDataBarang">Tambah Data</a>
				<a id='delete_row_edit' class="pull-right btn btn-danger" style="color:white">Hapus Data</a>
				<input type="hidden" class="form-control" id="total_barang_edit" name="total_barang_edit" value="<?php echo count($jumlah_barang); ?>"/>
			</div>
			
			<!-- NILAI KONTRAK SEBELUM PPN -->
            <div class="form-group col-md-2 modal-input">
                <label class="col-form-label">Nilai Kontrak Sbl PPN</label>
                <div id='input-mata_uang-edit'>
					<select id="mata_uang-edit" name="mata_uang_edit" onchange="getMataUang(0, this.value);" required> 
                        <option value="" disabled>Pilih Mata Uang</option>
                        <?php foreach($header_lc as $row) :
							foreach ($matauang as $uang): 
								 ?>
									<option value="<?= $uang->kode_currency?>" <?php if($uang->kode_currency == $row->mata_uang) echo 'selected' ?> > <?= $uang->kode_currency ?> - <?= $uang->nama_currency ?></option>
                        <?php  endforeach;
							endforeach; ?>
                    </select>
                </div>
            </div>
			<div class="form-group col-md-2 modal-input">
                <label class="col-form-label" id="label_nilai_kurs-edit"> Nilai Kurs </label>
                <div id='input-nilai_kurs-edit'>
				<?php foreach($header_lc as $row) { ?>
                    <input type="text" class="form-control input-number number-separator" id="nilai_kurs-edit" name="nilai_kurs_diedit" placeholder="Nilai Kurs" onkeyup="functionKeyUp()" value="<?php echo number_format($row->nilai_kurs); ?>">
                    <input type="hidden" class="form-control" id="nilai_kurs-edit1" name="nilai_kurs_edit1" placeholder="Nilai Kurs" value="<?php echo $row->nilai_kurs; ?>">
				<?php } ?>
                </div>
            </div>
			<div class="form-group col-md-2 modal-input">
                <label class="col-form-label"> Nominal Kontrak </label>
                <div id='input-nominal_kontrak-edit'>
				<?php foreach($header_lc as $row) { ?>
					<input type="text" class="form-control input-number number-separator" id="nilai_kontrak-edit" name="nilai_kontrak_diedit" placeholder="Nominal Kontrak" onkeyup="functionKeyUpEdit()" value="<?php echo number_format($row->nominal_kontrak); ?>"> 
					<input type="hidden" class="form-control" id="nominal_kontrak-edit1" name="nominal_kontrak_edit1" placeholder="Nominal Kontrak" value="<?php echo $row->nominal_kontrak; ?>"> 
                <?php } ?>
				</div>
            </div>
			
			<!-- NAMA BARANG -->
			<div class="form-group col-md-6 modal-input">
				<table class="table table-bordered table-hover" id="tab_logic_additional_cost_edit">
					<thead>
						<tr >
							<th class="text-center">Additional Cost</th>
							<th class="text-center">Nilai</th>
						</tr>
					</thead>
					<tbody>
                    <?php
                    $id = 0;
                    $no = 1;
                    foreach ($detail_additional_cost as $row) {   
                    ?>
                        <tr id='<?php echo 'detail_additional_cost'. $id; ?>'>
                            <td><input type="text" name='<?php echo 'additional_cost_editing'. $id; ?>' id='<?php echo 'additional_cost_editing'. $id; ?>' placeholder='Additional Cost' class="form-control" value="<?php echo $row->additional_cost; ?>" /></td> 
							<!--<td><input type="hidden" name='<?php echo 'nilai_edit_tampil'. $id; ?>' id='<?php echo 'nilai_edit_tampil'. $id; ?>' min="0" placeholder='Nilai' class="form-control input-number number-separator" value="<?php echo number_format($row->nilai); ?>" /></td>-->
                            <td><input type="text" name='<?php echo 'nilai_edit'. $id; ?>' id='<?php echo 'nilai_edit'. $id; ?>' min="0" placeholder='Nilai' class="form-control input-number number-separator" value="<?php echo $row->nilai; ?>" /></td>
                        </tr>
                        <tr id='<?php echo 'detail_additional_cost'. $no; ?>'></tr>
                    <?php
                    $id++;
                    $no++;
                    }
                    ?>
                    </tbody>
				</table>
				<a id="add_row_additional_cost_edit" class="pull-left btn btn-success " style="color:white">Tambah Data</a>
				<a id='delete_row_additional_cost_edit' class="pull-right btn btn-danger" style="color:white">Hapus Data</a>
				<input type="hidden" class="form-control" id="total_additional_cost_edit" name="total_additional_cost_edit" value="<?php echo count($jumlah_additional_cost); ?>"/>
			</div>
			
			<hr class="col-11 hr-input-modal" />
			
			<!-- PROSENTASE PPN (%) -->
            <div id='input-prosentase_ppn-edit' class="form-group col-md-3 modal-input">
                <label class="col-form-label">PROSENTASE PPN (%)</label>
                <div>
				<?php foreach($header_lc as $row) { ?>
                    <input type="text" class="form-control input-number number-separator" id="prosentase_ppn-edit" name="prosentase_ppn_edit" placeholder="PROSENTASE PPN (%)" onkeyup="getProsetasePPNEdit();"  value="<?php echo number_format($row->prosentase_ppn); ?>">
                    <input type="hidden" class="form-control" id="prosentase_ppn-edit1" name="prosentase_ppn_edit1" placeholder="PROSENTASE PPN (%)" value="<?php echo $row->prosentase_ppn; ?>">
                <?php } ?>
				</div>
            </div>
			
			<!-- PPN (10%) -->
            <div id='input-ppn_10_persen-edit' class="form-group col-md-3 modal-input">
                <label class="col-form-label">PPN</label>
                <div>
				<?php foreach($header_lc as $row) { ?>
                    <input type="text" class="form-control input-number number-separator" id="ppn_10_persen-edit" name="ppn_10_persen_edit" placeholder="PPN (10%)" onkeyup="functionKeyUp()" value="<?php echo number_format($row->ppn_10_persen); ?>">
                    <input type="hidden" class="form-control" id="ppn_10_persen-edit1" name="ppn_10_persen_edit1" placeholder="PPN (10%)" value="<?php echo $row->ppn_10_persen; ?>">
                <?php } ?>
				</div>
            </div>
			
			<!-- PPH 22 -->
            <div id='input-pph_22-edit' class="form-group col-md-3 modal-input">
                <label class="col-form-label">PPH 22</label>
                <div>
                    <input type="text" class="form-control input-number number-separator" id="pph_22-edit" name="pph_22_edit" placeholder="PPH 22" onkeyup="functionKeyUpEditPPH22()" value="<?php echo number_format($row->pph22); ?>">
                    <input type="hidden" class="form-control" id="pph_22-edit1" name="pph_22_edit1" placeholder="PPH 22" value="<?php echo $row->pph22; ?>">
                </div>
            </div>
			
			<!-- PPH 23 -->
            <div id='input-pph_23-edit' class="form-group col-md-3 modal-input">
                <label class="col-form-label">PPH 23</label>
                <div>
                    <input type="text" class="form-control input-number number-separator" id="pph_23-edit" name="pph_23_edit" placeholder="PPH 23" onkeyup="functionKeyUpEditPPH23()" value="<?php echo number_format($row->pph23); ?>">
                    <input type="hidden" class="form-control" id="pph_23-edit1" name="pph_23_edit1" placeholder="PPH 23" value="<?php echo $row->pph23; ?>">
                </div>
            </div>
			
			<!-- PPH 4(2) -->
            <div id='input-pph_4_2-edit' class="form-group col-md-4 modal-input">
                <label class="col-form-label">PPH 4(2)</label>
                <div>
                    <input type="text" class="form-control input-number number-separator" id="pph_4_2-edit" name="pph_4_2_edit" placeholder="PPH 4(2)" onkeyup="functionKeyUpEditPPH42()" value="<?php echo number_format($row->pph_4_2); ?>">
                    <input type="hidden" class="form-control" id="pph_4_2-edit1" name="pph_4_2_edit1" placeholder="PPH 4(2)" value="<?php echo $row->pph_4_2; ?>">
                </div>
            </div>
			
			<!-- SWASTA/BUMN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">SWASTA/BUMN</label>
                <div id='input-divisi-edit'>
                    <select id="swasta_atau_bumn_edit" name="swasta_atau_bumn_edit" onchange="getPilihanSwastaBumn(0, this.value);" required> 
                        <option value="" disabled selected>Pilih SWASTA/BUMN</option>
						<option value="BUMN" <?php if($row->swasta_atau_bumn=='BUMN') echo 'selected' ?> >BUMN</option>
						<option value="SWASTA" <?php if($row->swasta_atau_bumn=='SWASTA') echo 'selected' ?> >SWASTA</option>
                    </select>
                </div>
            </div>
			
			<!-- NILAI LC/SKBDN -->
            <div class="form-group col-md-4 modal-input">
                <label class="col-form-label">NILAI LC/SKBDN</label>
                <div id='input-nilai_lc_atau_skbdn-edit'>
                    <input type="text" class="form-control" id="nilai_lc_atau_skbdn-edit" name="nilai_lc_atau_skbdn_edit" readonly placeholder="NILAI LC/SKBDN" value="<?php echo number_format($row->nilai_lc_atau_skbdn); ?>">
                    <input type="hidden" class="form-control" id="nilai_lc_atau_skbdn-add1" name="nilai_lc_atau_skbdn1" readonly placeholder="NILAI LC/SKBDN" value="<?php echo $row->nilai_lc_atau_skbdn; ?>">
                </div>
            </div>
			
			<hr class="col-11 hr-input-modal" />
			
			<div class="form-group col-md-3 modal-input">
                <label class="col-form-label">KELENGKAPAN <i>Upload File Maks 60mb</i></label>
                <div id='input-divisi-edit'>
                    <div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="customCheckEdit1" name="customCheckEdit1" value="1" onclick="myFunctionEdit()" <?php if(count($detail_po_asli) > 0) echo 'checked' ?> >
						<label class="custom-control-label" for="customCheckEdit1">PO ASLI</label>
					</div>
                </div>
            </div>
			
			<div class="form-group col-md-9 modal-input">
                <label class="col-form-label"> &nbsp </label>
                <div id='input-dok_kelengkapan_po_asli-edit'>
					<table class="table table-bordered table-hover" id="tab_logic_doc_po_asli_edit">
						<tbody>
							<?php
								$id1 = 0;
								$no1 = 1;
							if($detail_po_asli){
								foreach ($detail_po_asli as $row1) {
							?>
							<tr id='<?php echo 'dokPoAsliEdit'. $id1; ?>'>
								<td>
									<!--<input class='form-control' type="file" id='<?php echo 'dok_kelengkapan_po_asli_edit'. $id1; ?>' name='<?php echo 'dok_kelengkapan_po_asli_edit'. $id1; ?>' accept="application/pdf" value="<?php echo $row1->dokumen_lc;?>.pdf"> --> File hasil upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/po_asli/".$row1->dokumen_lc.".pdf' target='_blank'>".$row1->dokumen_lc; ?>
								</td>                                                                
							</tr>
							<tr id='<?php echo 'dokPoAsliEdit'. $no1; ?>'></tr>
							<?php
								$id1++;
								$no1++;
								}
							}else{ ?>
							<tr id='dokPoAsliEdit0'>
								<td>
									<!--<input class='form-control' type="file" id='dok_kelengkapan_po_asli_edit0' name='dok_kelengkapan_po_asli_edit0' accept="application/pdf">-->
								</td>   
							</tr>
							<tr id='dokPoAsliEdit1'></tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a id="add_row_doc_po_asli_edit" class="pull-left btn btn-success" style="color:white">Tambah Upload</a>
					<a id="add_row_doc_po_asli_edit1" type="button" class="btn btn-success" data-toggle="modal" style="color:white" data-target="#exampleModal">Upload File Pendukung</a>
					<a id='delete_row_doc_po_asli_edit' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
					<input type="hidden" class="form-control" id="total_doc_po_asli_edit" name="total_doc_po_asli_edit" value="<?php echo count($detail_po_asli); ?>"/>
                </div>
            </div>
			
			<div class="form-group col-md-3 modal-input">
                <label class="col-form-label"> &nbsp </label>
                <div id='input-divisi-edit'>
                    <div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="customCheckEdit2" name="customCheckEdit2" value="2" onclick="myFunctionEdit()" <?php if(count($detail_jamlak_asli) > 0) echo 'checked' ?>>
						<label class="custom-control-label" for="customCheckEdit2">JAMLAK ASLI</label>
					</div>
                </div>
            </div>
			
			<div class="form-group col-md-9 modal-input">
                <label class="col-form-label"> &nbsp </label>
                <div id='input-dok_kelengkapan_jamlak_asli-edit'>				
					<table class="table table-bordered table-hover" id="tab_logic_doc_jamlak_asli_edit">
						<tbody>
							<?php
								$id2 = 0;
								$no2 = 1;
							if($detail_jamlak_asli){
								foreach ($detail_jamlak_asli as $row2) {
							?>
							<tr id='<?php echo 'dokJamlakAsliEdit'. $id2; ?>'>
								<td>
									<!--<input class='form-control' type="file" id='<?php echo 'dok_kelengkapan_jamlak_asli_edit'. $id2; ?>' name='<?php echo 'dok_kelengkapan_jamlak_asli_edit'. $id2; ?>' accept="application/pdf">--> File hasil upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/jamlak_asli/".$row2->dokumen_lc.".pdf' target='_blank'>".$row2->dokumen_lc; ?> 
								</td>                                                                 
							</tr>
							<tr id='<?php echo 'dokJamlakAsliEdit'. $no2; ?>'></tr>
							<?php
								$id2++;
								$no2++;
								}
							}else{ ?>
							<tr id='dokJamlakAsliEdit0'>
								<td>
									<!--<input class='form-control' type="file" id='dok_kelengkapan_jamlak_asli_edit0' name='dok_kelengkapan_jamlak_asli_edit0' accept="application/pdf">-->
								</td>   
							</tr>
							<tr id='dokJamlakAsliEdit1'></tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a id="add_row_doc_jamlak_asli_edit" class="pull-left btn btn-success " style="color:white">Tambah Upload</a>
					<a id="add_row_doc_jamlak_asli_edit1" type="button" class="btn btn-success" data-toggle="modal" style="color:white" data-target="#exampleModalJamlak">Upload File Pendukung</a>
					<a id='delete_row_doc_jamlak_asli_edit' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
					<input type="hidden" class="form-control" id="total_doc_jamlak_asli_edit" name="total_doc_jamlak_asli_edit" value="<?php echo count($detail_jamlak_asli); ?>"/>
                </div>
            </div>
			
			<div class="form-group col-md-3 modal-input">
                <label class="col-form-label"> &nbsp </label>
                <div id='input-divisi-edit'>
                    <div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="customCheckEdit3" name="customCheckEdit3" value="3" onclick="myFunctionEdit()" <?php if(count($detail_kontrak_asli) > 0) echo 'checked' ?>>
						<label class="custom-control-label" for="customCheckEdit3">KONTRAK ASLI</label>
					</div>
                </div>
            </div>
			
			<div class="form-group col-md-9 modal-input">
                <label class="col-form-label"> &nbsp </label>
                <div id='input-dok_kelengkapan_kontrak_asli-edit'>					
					<table class="table table-bordered table-hover" id="tab_logic_doc_kontrak_asli_edit">
						<tbody>
							<?php
								$id3 = 0;
								$no3 = 1;
							if($detail_kontrak_asli){
								foreach ($detail_kontrak_asli as $row3) {
							?>
							<tr id='<?php echo 'dokKontrakAsliEdit'. $id3; ?>'>
								<td>
									<!--<input class='form-control' type="file" id='<?php echo 'dok_kelengkapan_kontrak_asli_edit'. $id3; ?>' name='<?php echo 'dok_kelengkapan_kontrak_asli_edit'. $id3; ?>' accept="application/pdf">-->File hasil upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/kontrak_asli/".$row3->dokumen_lc.".pdf' target='_blank'>".$row3->dokumen_lc; ?>
								</td>
							</tr>
							<tr id='<?php echo 'dokKontrakAsliEdit'. $no3; ?>'></tr>
							<?php
								$id3++;
								$no3++;
								}
							}else{ ?>
							<tr id='dokKontrakAsliEdit0'>
								<td>
									<!--<input class='form-control' type="file" id='dok_kelengkapan_kontrak_asli_edit0' name='dok_kelengkapan_kontrak_asli_edit0' accept="application/pdf">-->
								</td>   
							</tr>
							<tr id='dokKontrakAsliEdit1'></tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a id="add_row_doc_kontrak_asli_edit" class="pull-left btn btn-success " style="color:white">Tambah Upload</a>
					<a id="add_row_doc_kontrak_asli_edit1" type="button" class="btn btn-success" data-toggle="modal" style="color:white" data-target="#exampleModalKontrak">Upload File Pendukung</a>
					<a id='delete_row_doc_kontrak_asli_edit' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
					<input type="hidden" class="form-control" id="total_doc_kontrak_asli_edit" name="total_doc_kontrak_asli_edit" value="<?php echo count($detail_kontrak_asli); ?>"/>
                </div>
            </div>
			
			<!-- MASA BERLAKU JAMLAK -->
            <div class="form-group col-md-3 modal-input">
                <label class="col-form-label">MASA BERLAKU JAMLAK</label>
                <div id='input-masa_berlaku_jamlak-edit'>
                    <input type="date" class="form-control" id="masa_berlaku_jamlak-edit" name="masa_berlaku_jamlak_edit" value="<?php echo $row->masa_berlaku_jamlak; ?>"> 
                </div>
            </div>
			
			<hr class="col-11 hr-input-modal" />
			
			<!-- SURAT KONFIRMASI KEABSAHAN BANK GARANSI -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label" id="label_surat_konfirmasi_keabsahan_bank_garansi-edit">SURAT KONFIRMASI KEABSAHAN BANK GARANSI</label>
                <div id='input-surat_konfirmasi_keabsahan_bank_garansi-edit' class="input-group">
                    <input type="text" class="form-control" id="surat_konfirmasi_keabsahan_bank_garansi-edit" name="surat_konfirmasi_keabsahan_bank_garansi_edit" placeholder="SURAT KONFIRMASI KEABSAHAN BANK GARANSI" onkeyup="functionKeyUpValidasi()" value="<?php echo $row->surat_konfirmasi_keabsahan_bank_garansi; ?>">
				</div>
            </div>
			
			<div class="form-group col-md-6 modal-input">
                <label class="col-form-label" id="label_berkas_surat_konfirmasi_keabsahan_bank_garansi_edit"> &nbsp </label>
                <div id='input-berkas_surat_konfirmasi_keabsahan_bank_garansi-edit'>
				<?php
				if($konfirmasi_keabsahan_bank_garansi){
					foreach ($konfirmasi_keabsahan_bank_garansi as $row4) {
				?>
					<input class='form-control' type="file" id='berkas_surat_konfirmasi_keabsahan_bank_garansi_edit' name='berkas_surat_konfirmasi_keabsahan_bank_garansi_edit' accept="application/pdf">File hasil upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/keabsahan_bank_garansi/".$row4->dokumen_lc.".pdf' target='_blank'>".$row4->dokumen_lc; ?></a>
                <?php
					}
				}else{ ?>
					<input class='form-control' type="file" id='berkas_surat_konfirmasi_keabsahan_bank_garansi_edit' name='berkas_surat_konfirmasi_keabsahan_bank_garansi_edit' accept="application/pdf">
				<?php } ?>
				</div>
            </div>
			
			<!-- KEABSAHAN BANK GARANSI -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label" id="label_keabsahan_bank_garansi-edit">KEABSAHAN BANK GARANSI</label>
                <div id='input-keabsahan_bank_garansi-edit' class="input-group">
				<?php foreach($header_lc as $row) { ?>
                    <input type="text" class="form-control" id="keabsahan_bank_garansi-edit" name="keabsahan_bank_garansi_edit" placeholder="KEABSAHAN BANK GARANSI" onkeyup="functionKeyUpValidasi()" value="<?php echo $row->keabsahan_bank_garansi; ?>">
				<?php } ?>
				</div>
            </div>
			
			<div class="form-group col-md-6 modal-input">
                <label class="col-form-label" id="label_berkas_keabsahan_bank_garansi-edit"> &nbsp </label>
                <div id='input-berkas_keabsahan_bank_garansi-edit'>
				<?php
				if($keabsahan_bank_garansi){
					foreach ($keabsahan_bank_garansi as $row5) {
				?>
					<input class='form-control' type="file" id='berkas_keabsahan_bank_garansi_edit' name='berkas_keabsahan_bank_garansi_edit' accept="application/pdf">File hasil upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/keabsahan_bank_garansi/".$row5->dokumen_lc.".pdf' target='_blank'>".$row5->dokumen_lc; ?></a>
                <?php
					} 
				}else{ ?>
					<input class='form-control' type="file" id='berkas_keabsahan_bank_garansi_edit' name='berkas_keabsahan_bank_garansi_edit' accept="application/pdf">
				<?php } ?>
				</div>
            </div>
			
			<!-- NO. SURAT KEABSAHAN -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label" id="label_no_surat_keabsahan-edit">NO. SURAT KEABSAHAN</label>
                <div id='input-no_surat_keabsahan-edit' class="input-group">
				<?php foreach($header_lc as $row) { ?>
                    <input type="text" class="form-control" id="no_surat_keabsahan-edit" name="no_surat_keabsahan_edit" placeholder="NO. SURAT KEABSAHAN" value="<?php echo $row->nomor_surat_keabsahan; ?>">
				<?php } ?>
				</div>
            </div>
			
			<!-- TANGGAL SURAT KEABSAHAN -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label" id="label_tanggal_surat_keabsahan-edit">TANGGAL SURAT KEABSAHAN</label>
                <div id='input-tanggal_surat_keabsahan-edit'>
                    <input type="date" class="form-control" id="tanggal_surat_keabsahan-edit" name="tanggal_surat_keabsahan_edit" value="<?php echo $row->tanggal_surat_keabsahan; ?>"> 
                </div>
            </div>
			
			<!-- KETERANGAN/ALASAN BELUM RELEASE -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">KETERANGAN/ALASAN BELUM RELEASE</label>
                <div id='input-keterangan_atau_alasan_belum_release-edit'>
                    <input type="text" class="form-control" id="keterangan_atau_alasan_belum_release-edit" name="keterangan_atau_alasan_belum_release_edit" placeholder="KETERANGAN/ALASAN BELUM RELEASE" value="<?php echo $row->keterangan_atau_alasan_belum_release; ?>">
                </div>
            </div>
			
            <hr class="col-11 hr-input-modal" />
			
			<div class="form-group col-md-12 modal-input">
				<label class="col-form-label"><b>Nama & Alamat Bank (Advising Bank)</b></label>
			</div>
			
			<!-- SWIFT NUMBER -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">SWIFT NUMBER</label>
                <div id='input-swift_number-edit'>
                    <input type="text" class="form-control" id="swift_number-edit" name="swift_number_edit" placeholder="SWIFT NUMBER" value="<?php echo $row->swift_number; ?>">
                </div>
            </div>
			
			<!-- ADVISING BANK -->
			<div class="form-group col-md-6 modal-input">
                 <label class="col-form-label">ADVISING BANK</label>
                 <div id='input-advising_bank-edit'>
                     <select class="form-control" id="advising_bank-edit" name="advising_bank_edit">
						 <?php foreach($header_lc as $row):
							foreach ($master_bank as $bank): 
								 ?>
									<option value="<?= $bank->nama_bank?>" <?php if($bank->nama_bank == $row->advising_bank) echo 'selected' ?> ><?= $bank->kode_bank ?> - <?= $bank->nama_bank ?></option>
								 <?php  endforeach;
							endforeach; ?>
                     </select>
                 </div>
             </div>
			
			<!-- ACCOUNT NO -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">ACCOUNT NO</label>
                <div id='input-account_no-edit'>
                    <input type="text" class="form-control" id="account_no-edit" name="account_no_edit" placeholder="ACCOUNT NO" value="<?php echo $row->account_no; ?>">
                </div>
            </div>
			
			<hr class="col-11 hr-input-modal" />
			
			<div class="form-group col-md-12 modal-input">
				<label class="col-form-label"><b>Kontrak Penjualan</b></label>
			</div>
			
			<!-- KODE PROYEK -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">KODE PROYEK</label>
                <div id='input-kode_proyek-edit'>
                    <input type="text" class="form-control" id="kode_proyek-edit" name="kode_proyek_edit" placeholder="KODE PROYEK" value="<?php echo $row->kode_proyek; ?>">
                </div>
            </div>
			
			<!-- NAMA PROYEK -->
			<div class="form-group col-md-6 modal-input">
				<label class="col-form-label">NAMA PROYEK</label>
                <div id='input-nama_proyek-edit'>
                    <input type="text" class="form-control" id="nama_proyek-edit" name="nama_proyek_edit" placeholder="NAMA PROYEK" value="<?php echo $row->nama_proyek; ?>">
                </div>
            </div>
			
			<!-- NOMOR KONTRAK JUAL (SO) -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">NOMOR KONTRAK JUAL (SO)</label>
                <div id='input-nomor_kontrak_jual_so-edit'>
                    <input type="text" class="form-control" id="nomor_kontrak_jual_so-edit" name="nomor_kontrak_jual_so_edit" placeholder="NOMOR KONTRAK JUAL (SO)" value="<?php echo $row->nomor_kontrak_jual_so; ?>">
                </div>
            </div>
			
			<div class="form-group col-md-6 modal-input">
                <label class="col-form-label"> &nbsp </label>
                <div id='input-berkas_nomor_kontrak_jual_so-edit'>
					<!--<input class='form-control' type="file" id='berkas_nomor_kontrak_jual_so-add' name='berkas_nomor_kontrak_jual_so' accept="application/pdf" required> -->
					<table class="table table-bordered table-hover" id="tab_logic_doc_kontrak_jual_so_edit">
						<tbody>
							<?php
								$id4 = 0;
								$no4 = 1;
							if($detail_kontrak_jual_so){
								foreach ($detail_kontrak_jual_so as $row6) { 
							?>
							<tr id='<?php echo 'dokKontrakJualSoEdit'. $id4; ?>'>
								<td>
									<!--<input class='form-control' type="file" id='<?php echo 'berkas_nomor_kontrak_jual_so_edit'. $id4; ?>' name='<?php echo 'berkas_nomor_kontrak_jual_so_edit'. $id4; ?>' accept="application/pdf">--> File hasil upload : <?php echo "<a href='".base_URL()."assets/upload/trx_lc_skbdn/total_doc_kontrak_jual_so/".$row6->dokumen_kontrak_jual_lc.".pdf' target='_blank'>".$row6->dokumen_kontrak_jual_lc; ?> 
								</td>                                                                 
							</tr>
							<tr id='<?php echo 'dokKontrakJualSoEdit'. $no4; ?>'></tr>
							<?php
								$id4++;
								$no4++;
								}
							}else{ ?>
							<tr id='dokKontrakJualSoEdit0'>
								<td>
									<!--<input class='form-control' type="file" id='berkas_nomor_kontrak_jual_so_edit0' name='berkas_nomor_kontrak_jual_so_edit0' accept="application/pdf"> -->
								</td>   
							</tr>
							<tr id='dokKontrakJualSoEdit1'></tr>
							<?php
							}
							?>
						</tbody>
					</table>
					<a id="add_row_doc_kontrak_jual_so_edit" class="pull-left btn btn-success " style="color:white">Tambah Upload</a>
					<a id="add_row_doc_kontrak_jual_so_edit1" type="button" class="btn btn-success" data-toggle="modal" style="color:white" data-target="#exampleModalKontrakJualSO">Upload File Pendukung</a>
					<a id='delete_row_doc_kontrak_jual_so_edit' class="pull-right btn btn-danger" style="color:white">Hapus Upload</a>
					<input type="hidden" class="form-control" id="total_doc_kontrak_jual_so_edit" name="total_doc_kontrak_jual_so_edit" value="<?php echo count($detail_kontrak_jual_so); ?>"/>
                </div>
            </div>
			
			<!-- NILAI -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">NILAI</label>
                <div id='input-kontrak_nilai-edit'>
                    <input type="text" class="form-control" id="kontrak_nilai-edit" name="kontrak_nilai_edit" placeholder="NILAI" onkeyup="functionKeyUp()" value="<?php echo $row->nilai; ?>">
                    <input type="hidden" class="form-control" id="nilai-edit1" name="nilaiedit1" placeholder="NILAI">
                </div>
            </div>
			
			<!-- PRODUK YANG DI JUAL -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">PRODUK YANG DI JUAL</label>
                <div id='input-produk_yang_dijual-edit'>
                    <input type="text" class="form-control" id="produk_yang_dijual-edit" name="produk_yang_dijual_edit" placeholder="PRODUK YANG DI JUAL" value="<?php echo $row->produk_yang_dijual; ?>">
                </div>
            </div>
			
			<!-- CUSTOMER -->
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">CUSTOMER</label>
                <div id='input-customer-edit'>
                    <input type="text" class="form-control" id="customer-edit" name="customer_edit" placeholder="CUSTOMER" value="<?php echo $row->customer; ?>">
                </div>
            </div>
			
            <hr class="col-11 hr-input-modal" />
			
			<!-- STATUS PENERBITAN -->
             <div class="form-group col-md-12 modal-input">
                 <label class="col-form-label">STATUS PENERBITAN</label>
                 <div id='input-status_penerbitan-edit'>
                     <select class="form-control" id="status_penerbitan-edit" name="status_penerbitan_edit"> 
                         <option value="X" >-PILIH STATUS PENERBITAN (abaikan jk status sudah release/jatuh tempo)-</option>
                         <option value="CR" <?php if($row->status_transaksi_lc_skbdn=='CR') echo 'selected' ?> >MENUNGGU</option>
                         <option value="AJ" <?php if($row->status_transaksi_lc_skbdn=='AJ') echo 'selected' ?> >SUDAH DIAJUKAN KE BANK</option>
                     </select>
                 </div>
             </div>
			
		</div>
	</div>
</div>
<div class="row">
    <div class="form-group col-md-6">
    <?php if ($hak_akses->can_create === 't') : ?>
        <button type="submit" id="submit_edit" class="btn btn-primary">Simpan Perubahan</button>
    <?php endif; ?>
    </div>
</div>
</form>
<script>
    $(document).ready(function() {
		$('#lockedit').hide();
        $('#unlockedit').show();
		$('#submit_edit').hide();
		$('input[name=customRadio]').attr("disabled",true);
		document.getElementById("tahapan_edit").disabled = true;
		document.getElementById("nomor_surat_edit").disabled = true;
		document.getElementById("tanggal_surat_ajuan_isc_edit").disabled = true;
		document.getElementById("nomor_po_edit").disabled = true;
		document.getElementById("nominal_pembukaan_edit").disabled = true;
		document.getElementById("nomor_kontrak_edit").disabled = true;
		document.getElementById("tanggal_sjan_edit").disabled = true;
		document.getElementById("vendor_edit").disabled = true;	
		document.getElementById("alamat_vendor_edit").disabled = true;
		for (let index = 0; index < $('#total_barang_edit').val(); index++) {
            document.getElementById("nama_barang_edit"+index).disabled = true;
            document.getElementById("quantity_barang_edit"+index).disabled = true;
            document.getElementById("satuan_barang_edit"+index).disabled = true;
            document.getElementById("tanggal_pengiriman_edit"+index).disabled = true;
            document.getElementById("tolerance_barang_edit"+index).disabled = true;
        }
		// var lc_or_skbdn = $("input[name='lc_atau_skbdn_edit']").val();
		// if($lc_atau_skbdn_edit=='LC' or $lc_atau_skbdn_edit=='LC_PMN'){
			// $('#additional_cost_edit0').prop('required',true);
		// }else{
			// $('#additional_cost_edit0').prop('required',false);
		// }		
		$('#add_row_edit').hide();
		$('#add_row_edit1').hide();
		$('#delete_row_edit').hide();
		$('#add_row_doc_po_asli_edit').hide();
		$('#add_row_doc_po_asli_edit1').hide();
		$('#delete_row_doc_po_asli_edit').hide();
		$('#add_row_doc_jamlak_asli_edit').hide();
		$('#add_row_doc_jamlak_asli_edit1').hide();
		$('#delete_row_doc_jamlak_asli_edit').hide();
		$('#add_row_doc_kontrak_asli_edit').hide();
		$('#add_row_doc_kontrak_asli_edit1').hide();
		$('#delete_row_doc_kontrak_asli_edit').hide();
		$('#add_row_doc_kontrak_jual_so_edit').hide();
		$('#add_row_doc_kontrak_jual_so_edit1').hide();
		$('#delete_row_doc_kontrak_jual_so_edit').hide();
		$('#add_row_additional_cost_edit').hide();
		$('#delete_row_additional_cost_edit').hide();
		document.getElementById("nilai_kurs-edit").disabled = true;
		document.getElementById("nilai_kontrak-edit").disabled = true;
		document.getElementById("ppn_10_persen-edit").disabled = true;
		document.getElementById("prosentase_ppn-edit").disabled = true;
		document.getElementById("pph_22-edit").disabled = true;
		document.getElementById("pph_23-edit").disabled = true;
		document.getElementById("pph_4_2-edit").disabled = true;
		document.getElementById("masa_berlaku_jamlak-edit").disabled = true;
		document.getElementById("surat_konfirmasi_keabsahan_bank_garansi-edit").disabled = true;
		document.getElementById("keabsahan_bank_garansi-edit").disabled = true;
		document.getElementById("no_surat_keabsahan-edit").disabled = true;
		document.getElementById("tanggal_surat_keabsahan-edit").disabled = true;
		document.getElementById("keterangan_atau_alasan_belum_release-edit").disabled = true;
		document.getElementById("swift_number-edit").disabled = true;
		// document.getElementById("swasta_atau_bumn_edit").disabled = true;
		document.getElementById("advising_bank-edit").disabled = true;
		document.getElementById("account_no-edit").disabled = true;
		document.getElementById("waktu_pengiriman_barang-edit").disabled = true;
		document.getElementById("kode_proyek-edit").disabled = true;
		document.getElementById("nama_proyek-edit").disabled = true;
		document.getElementById("nomor_kontrak_jual_so-edit").disabled = true;
		document.getElementById("nilai-edit").disabled = true;
		document.getElementById("produk_yang_dijual-edit").disabled = true;
		document.getElementById("customer-edit").disabled = true;
		
		var barang = $("input[name='total_barang_edit']").val();
		var ii = parseFloat(barang);
		$("#add_row_edit").click(function(){
            $('#detail_barang'+ii).html(
									"<td><input name='nama_barang_edit"+ii+"' type='text' placeholder='Nama Barang' class='form-control input-md' required></td>"+
									"<td><input name='quantity_barang_edit"+ii+"' type='text' placeholder='Quantity' class='form-control input-md input-number number-separator' required></td>"+
									"<td><input name='satuan_barang_edit"+ii+"' type='text' placeholder='Satuan' class='form-control input-md' required></td>"+
									"<td><input name='tanggal_pengiriman_edit"+ii+"' type='date' placeholder='Tanggal' class='form-control input-md' required></td>"+
									"<td><input name='tolerance_barang_edit"+ii+"' type='text' placeholder='Tolerance' class='form-control input-md' required></td>"
								);           
            $('#tab_logic_edit').append('<tr id="detail_barang'+(ii+1)+'"></tr>');
            $("input[name='total_barang_edit']").val(ii + 1);
            ii++; 
        });
		$("#delete_row_edit").click(function(){
            if(ii>1){
				$("#detail_barang"+(ii-1)).html('');
				$("input[name='total_barang_edit']").val($("input[name='total_barang_edit']").val() - 1);
				ii--;
            }
        });
		
		var cost = $("input[name='total_additional_cost_edit']").val();
		var n = parseFloat(cost);
		$("#add_row_additional_cost_edit").click(function(){
            $('#detail_additional_cost'+n).html(
									"<td><input name='additional_cost_editing"+n+"' type='text' placeholder='Additional Cost' class='form-control input-md' required></td>"+
									"<td><input name='nilai_edit"+n+"' type='text' placeholder='Nilai' class='form-control input-md input-number number-separator' required></td>"
								);           
            $('#tab_logic_additional_cost_edit').append('<tr id="detail_additional_cost'+(n+1)+'"></tr>');
            $("input[name='total_additional_cost_edit']").val(n + 1);
            n++; 
        });
		$("#delete_row_additional_cost_edit").click(function(){
            if(n>1){
				$("#detail_additional_cost"+(n-1)).html('');
				$("input[name='total_additional_cost_edit']").val($("input[name='total_additional_cost_edit']").val() - 1);
				n--;
            }
        });
		
		for (let index1 = 0; index1 < $('#total_doc_po_asli_edit').val(); index1++) {
            document.getElementById("dok_kelengkapan_po_asli_edit"+index1).disabled = true;
			$('#edit_links'+index1).hide();
			$('#kolom'+index1).hide();
        }
		var poasli = $("input[name='total_doc_po_asli_edit']").val();
		var j = parseFloat(poasli);
		$("#add_row_doc_po_asli_edit").click(function(){
            $('#dokPoAsliEdit'+j).html(
									"<td><input id='dok_kelengkapan_po_asli_edit"+j+"' name='dok_kelengkapan_po_asli_edit"+j+"' type='file' placeholder='Nama Po Asli' class='form-control input-md' accept='application/pdf'></td>"
								);           
            $('#tab_logic_doc_po_asli_edit').append('<tr id="dokPoAsliEdit'+(j+1)+'"></tr>');
            $("input[name='total_doc_po_asli_edit']").val(j + 1);
            j++; 
        });
		$("#delete_row_doc_po_asli_edit").click(function(){
            if(j>1){
				$("#dokPoAsliEdit"+(j-1)).html('');
				$("input[name='total_doc_po_asli_edit']").val($("input[name='total_doc_po_asli_edit']").val() - 1);
				j--;
            }
        });
		
		for (let index2 = 0; index2 < $('#total_doc_jamlak_asli_edit').val(); index2++) {
            document.getElementById("dok_kelengkapan_jamlak_asli_edit"+index2).disabled = true;
        }
		var jamlakasli = $("input[name='total_doc_jamlak_asli_edit']").val();
		var k = parseFloat(jamlakasli);
		$("#add_row_doc_jamlak_asli_edit").click(function(){
            $('#dokJamlakAsliEdit'+k).html(
									"<td><input id='dok_kelengkapan_jamlak_asli_edit"+k+"' name='dok_kelengkapan_jamlak_asli_edit"+k+"' type='file' placeholder='Nama Jamlak Asli' class='form-control input-md' accept='application/pdf'></td>"
								);           
            $('#tab_logic_doc_jamlak_asli_edit').append('<tr id="dokJamlakAsliEdit'+(k+1)+'"></tr>');
            $("input[name='total_doc_jamlak_asli_edit']").val(k + 1);
            k++; 
        });
		$("#delete_row_doc_jamlak_asli_edit").click(function(){
            if(k>1){
				$("#dokJamlakAsliEdit"+(k-1)).html('');
				$("input[name='total_doc_jamlak_asli_edit']").val($("input[name='total_doc_jamlak_asli_edit']").val() - 1);
				k--;
            }
        });
		
		for (let index3 = 0; index3 < $('#total_doc_kontrak_asli_edit').val(); index3++) {
            document.getElementById("dok_kelengkapan_kontrak_asli_edit"+index3).disabled = true;
        }
		var kontrakasli = $("input[name='total_doc_kontrak_asli_edit']").val();
		var l = parseFloat(kontrakasli);
		if(l==0){l=l+1}else{l=parseFloat(kontrakasli)}
		$("#add_row_doc_kontrak_asli_edit").click(function(){
            $('#dokKontrakAsliEdit'+l).html(
									"<td><input id='dok_kelengkapan_kontrak_asli_edit"+l+"' name='dok_kelengkapan_kontrak_asli_edit"+l+"' type='file' placeholder='Nama Kontrak Asli' class='form-control input-md' accept='application/pdf'></td>"
								);           
            $('#tab_logic_doc_kontrak_asli_edit').append('<tr id="dokKontrakAsliEdit'+(l+1)+'"></tr>');
            $("input[name='total_doc_kontrak_asli_edit']").val(l + 1);
            l++; 
        });
		$("#delete_row_doc_kontrak_asli_edit").click(function(){
            if(l>1){
				$("#dokKontrakAsliEdit"+(l-1)).html('');
				$("input[name='total_doc_kontrak_asli_edit']").val($("input[name='total_doc_kontrak_asli_edit']").val() - 1);
				l--;
            }
        });
		
		document.getElementById("berkas_surat_konfirmasi_keabsahan_bank_garansi_edit").disabled = true;
		document.getElementById("berkas_keabsahan_bank_garansi_edit").disabled = true;
		
		for (let index4 = 0; index4 < $('#total_doc_kontrak_jual_so_edit').val(); index4++) {
            document.getElementById("berkas_nomor_kontrak_jual_so_edit"+index4).disabled = true;
        }
		var kontrakjualso = $("input[name='total_doc_kontrak_jual_so_edit']").val();
		var m = parseFloat(kontrakjualso);
		if(m==0){m=m+1}else{m=parseFloat(kontrakjualso)}
		$("#add_row_doc_kontrak_jual_so_edit").click(function(){
            $('#dokKontrakJualSoEdit'+m).html(
									"<td><input id='berkas_nomor_kontrak_jual_so_edit"+m+"' name='berkas_nomor_kontrak_jual_so_edit"+m+"' type='file' placeholder='Nama Kontrak Jual So' class='form-control input-md' accept='application/pdf'></td>"
								);           
            $('#tab_logic_doc_kontrak_asli_edit').append('<tr id="dokKontrakJualSoEdit'+(m+1)+'"></tr>');
            $("input[name='total_doc_kontrak_jual_so_edit']").val(m + 1);
            m++; 
        });
		$("#delete_row_doc_kontrak_jual_so_edit").click(function(){
            if(m>1){
				$("#dokKontrakJualSoEdit"+(m-1)).html('');
				$("input[name='total_doc_kontrak_jual_so_edit']").val($("input[name='total_doc_kontrak_jual_so_edit']").val() - 1);
				m--;
            }
        });
		
		$("#customRadio1Edit").click(function(){
			$('#input-ppn_10_persen-add').hide();
			$('#input-pph_22-add').hide();
			$('#input-pph_23-add').hide();
			$('#input-pph_4_2-add').hide();
			$('#lc_atau_skbdn_edit').val('LC');
		});
		$("#customRadio2Edit").click(function(){
			$('#input-ppn_10_persen-add').show();
			$('#input-pph_22-add').show();
			$('#input-pph_23-add').show();
			$('#input-pph_4_2-add').show();
			$('#lc_atau_skbdn_edit').val('SKBDN');
		});
		$("#customRadio3Edit").click(function(){
			$('#input-ppn_10_persen-add').hide();
			$('#input-pph_22-add').hide();
			$('#input-pph_23-add').hide();
			$('#input-pph_4_2-add').hide();
			$('#lc_atau_skbdn_edit').val('LC_PMN');
		});
		$("#customRadio4Edit").click(function(){
			$('#input-ppn_10_persen-add').show();
			$('#input-pph_22-add').show();
			$('#input-pph_23-add').show();
			$('#input-pph_4_2-add').show();
			$('#lc_atau_skbdn_edit').val('SKBDN_PMN');
		});	
		
    });
	
	function functionKeyUpEditPembukaan() {
		var buka 						= $("input[name='nominal_pembukaan_edit']").val();
		var pembuka		 				= buka.replace(".", "");
		var pembukaan			 		= pembuka.replace(".", "");
		var nom_pembukaan 				= pembukaan.replace(".", "");
		var nomin_pembukaan				= nom_pembukaan.replace(".", "");
		$("input[name='nominal_pembukaan_edit1']").val(nomin_pembukaan);
	}
	
	function functionKeyUpEdit() {
		var nominal_kontrak 			= $("input[name='nilai_kontrak_diedit']").val();
		var replace_nominal		 		= nominal_kontrak.replace(".", "");
		var replace_nilai_kontrak 		= replace_nominal.replace(".", "");
		var replace_ulang_nilai_kontrak = replace_nilai_kontrak.replace(".", "");
		var hasil_kontrak				= replace_ulang_nilai_kontrak.replace(".", ".");
		$("input[name='nominal_kontrak_edit1']").val(hasil_kontrak);
		
		// var pph_4_2						= $("input[name='pph_4_2']").val();
		// var replace_pph_4			 	= pph_4_2.replace(".", "");
		// var replace_pph_4_2				= replace_pph_4.replace(".", "");
		// var replace_ulang_pph_4_2		= replace_pph_4_2.replace(".", "");
		// var hasil_pph_4_2				= replace_ulang_pph_4_2.replace(",", ".");
		// $("input[name='pph_4_21']").val(hasil_pph_4_2);
		
		// var nilai						= $("input[name='nilai']").val();
		// var replace_nilai			 	= nilai.replace(".", "");
		// var replace_nilai_kontrak		= replace_nilai.replace(".", "");
		// var replace_unilai_kontrak_ulang= replace_nilai_kontrak.replace(".", "");
		// var hasil_nilai					= replace_unilai_kontrak_ulang.replace(",", ".");
		// $("input[name='nilai1']").val(hasil_nilai);
	}
	
	function functionKeyUpEditPPH22() {
		var pph_22 						= $("input[name='pph_22_edit']").val();
		var replace_pph			 		= pph_22.replace(".", "");
		var replace_pph22 				= replace_pph.replace(".", "");
		var replace_ulang_pph			= replace_pph22.replace(".", "");
		var replace_ulang_pph22			= replace_ulang_pph.replace(".", "");
		var hasil_pph_22				= replace_ulang_pph22.replace(",", ".");
		$("input[name='pph_22_edit1']").val(hasil_pph_22);
	}
	
	function functionKeyUpEditPPH23() {
		var pph_23 						= $("input[name='pph_23_edit']").val();
		var replace_pph2			 	= pph_23.replace(".", "");
		var replace_pph23 				= replace_pph2.replace(".", "");
		var replace_ulang_pph23			= replace_pph23.replace(".", "");
		var hasil_pph_23				= replace_ulang_pph23.replace(",", ".");
		$("input[name='pph_23_edit1']").val(hasil_pph_23);
	}
	
	function functionKeyUpEditPPH42() {
		var pph_23 						= $("input[name='pph_4_2_edit']").val();
		var replace_pph2			 	= pph_23.replace(".", "");
		var replace_pph23 				= replace_pph2.replace(".", "");
		var replace_ulang_pph23			= replace_pph23.replace(".", "");
		var hasil_pph_23				= replace_ulang_pph23.replace(",", ".");
		$("input[name='pph_4_2_edit1']").val(hasil_pph_23);
	}
	
	function getProsetasePPNEdit() {
		var prosentase_ppnedit			= $("input[name='prosentase_ppn_edit']").val();
		var prosentase_ppn_edit	 		= prosentase_ppnedit.replace(".", "");
		$("input[name='prosentase_ppn_edit1']").val(prosentase_ppn_edit);
		
		var nominal_kontrak 			= $("input[name='nilai_kontrak_diedit']").val();
		var replace_nom		 			= nominal_kontrak.replace(",", "");
		var replace_nominal		 		= replace_nom.replace(",", "");
		var replace_nilai_kontrak 		= replace_nominal.replace(",", "");
		var replace_ulang_nilai			= replace_nilai_kontrak.replace(",", "");
		var replace_ulang_nilai_kontrak = replace_ulang_nilai.replace(",", "");
		// var hasil_kontrak				= replace_ulang_nilai_kontrak.replace(",", ",");
		// $("input[name='nominal_kontrak1']").val(hasil_kontrak);
		var float_replace_ulang_nilai_kontrak 	= parseFloat(replace_ulang_nilai_kontrak);
		var prosentaseppn 						= prosentase_ppn_edit / 100 * float_replace_ulang_nilai_kontrak;  // perubahan
		var prosentaseppn_fixed2 				= prosentaseppn.toFixed(2);
		var hasilprosentaseppn_fixed2 			= addCommas(prosentaseppn_fixed2);
		$("input[name='ppn_10_persen_edit']").val(hasilprosentaseppn_fixed2);
		
		var ppn_10_persen 				= $("input[name='ppn_10_persen_edit']").val();
		var replace_ppn			 		= ppn_10_persen.replace(",", "");
		var replace_ppn10persen 		= replace_ppn.replace(",", "");
		var replace_ulang_ppn10			= replace_ppn10persen.replace(",", "");
		var replace_ulang_ppn10persen	= replace_ulang_ppn10.replace(",", "");
		var hasil_ppn_10_persen			= replace_ulang_ppn10persen.replace(".", ".");
		$("input[name='ppn_10_persen_edit1']").val(hasil_ppn_10_persen);
    }
	
	function getPilihanSwastaBumn(no, npp) {
		var nilai0 = $("input[name='nilai_edit0']").val();
		if (nilai0 === '' || nilai0 === 'NaN' ||  nilai0 === undefined || nilai0 === null){
			var nilai0_4 = 0;
		}else{
			var nilai0_1			 	= nilai0.replace(".", "");
			var nilai0_2				= nilai0_1.replace(".", "");
			var nilai0_3				= nilai0_2.replace(".", "");
			var nilai0_4				= nilai0_3.replace(".", "");
		}
		var nilai0_float = parseFloat(nilai0_4);
		
		var nilai1 = $("input[name='nilai_edit1']").val();
		if (nilai1 === '' || nilai1 === 'NaN' ||  nilai1 === undefined || nilai1 === null){
			var nilai1_4 = 0;
		}else{
			var nilai1_1			 	= nilai1.replace(".", "");
			var nilai1_2				= nilai1_1.replace(".", "");
			var nilai1_3				= nilai1_2.replace(".", "");
			var nilai1_4				= nilai1_3.replace(".", "");
		}
		var nilai1_float = parseFloat(nilai1_4);
		
		var nilai2 = $("input[name='nilai_edit2']").val();
		if (nilai2 === '' || nilai2 === 'NaN' || nilai2 === undefined || nilai2 === null){
			var nilai2_4 = 0;
		}else{
			var nilai2_1			 	= nilai2.replace(".", "");
			var nilai2_2				= nilai2_1.replace(".", "");
			var nilai2_3				= nilai2_2.replace(".", "");
			var nilai2_4				= nilai2_3.replace(".", "");
		}
		var nilai2_float = parseFloat(nilai2_4);
		
		var nilai3 = $("input[name='nilai_edit3']").val();
		if (nilai3 === '' || nilai3 === 'NaN' || nilai3 === undefined || nilai3 === null){
			var nilai3_4 = 0;
		}else{
			var nilai3_1			 	= nilai3.replace(".", "");
			var nilai3_2				= nilai3_1.replace(".", "");
			var nilai3_3				= nilai3_2.replace(".", "");
			var nilai3_4				= nilai3_3.replace(".", "");
		}
		var nilai3_float = parseFloat(nilai3_4);
		
		var nilai4 = $("input[name='nilai_edit4']").val();
		if (nilai4 === '' || nilai4 === 'NaN' || nilai4 === undefined || nilai4 === null){
			var nilai4_4 = 0;
		}else{
			var nilai4_1			 	= nilai4.replace(".", "");
			var nilai4_2				= nilai4_1.replace(".", "");
			var nilai4_3				= nilai4_2.replace(".", "");
			var nilai4_4				= nilai4_3.replace(".", "");
		}
		var nilai4_float = parseFloat(nilai4_4);
		
		var nilai5 = $("input[name='nilai_edit5']").val();
		if (nilai5 === '' || nilai5 === 'NaN' || nilai5 === undefined || nilai5 === null){
			var nilai5_4 = 0;
		}else{
			var nilai5_1			 	= nilai5.replace(".", "");
			var nilai5_2				= nilai5_1.replace(".", "");
			var nilai5_3				= nilai5_2.replace(".", "");
			var nilai5_4				= nilai5_3.replace(".", "");
		}
		var nilai5_float = parseFloat(nilai5_4);
		
		var nilai6 = $("input[name='nilai_edit6']").val();
		if (nilai6 === '' || nilai6 === 'NaN' || nilai6 === undefined || nilai6 === null){
			var nilai6_4 = 0;
		}else{
			var nilai6_1			 	= nilai6.replace(".", "");
			var nilai6_2				= nilai6_1.replace(".", "");
			var nilai6_3				= nilai6_2.replace(".", "");
			var nilai6_4				= nilai6_3.replace(".", "");
		}
		var nilai6_float = parseFloat(nilai6_4);
		
		var nilai7 = $("input[name='nilai_edit7']").val();
		if (nilai7 === '' || nilai7 === 'NaN' || nilai7 === undefined || nilai7 === null){
			var nilai7_4 = 0;
		}else{
			var nilai7_1			 	= nilai7.replace(".", "");
			var nilai7_2				= nilai7_1.replace(".", "");
			var nilai7_3				= nilai7_2.replace(".", "");
			var nilai7_4				= nilai7_3.replace(".", "");
		}
		var nilai7_float = parseFloat(nilai7_4);
		
		var nilai8 = $("input[name='nilai_edit8']").val();
		if (nilai8 === '' || nilai8 === 'NaN' || nilai8 === undefined || nilai8 === null){
			var nilai8_4 = 0;
		}else{
			var nilai8_1			 	= nilai8.replace(".", "");
			var nilai8_2				= nilai8_1.replace(".", "");
			var nilai8_3				= nilai8_2.replace(".", "");
			var nilai8_4				= nilai8_3.replace(".", "");
		}
		var nilai8_float = parseFloat(nilai8_4);
		
		var nilai9 = $("input[name='nilai_edit9']").val();
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
		
        var swasta_atau_bumn = $("select[name='swasta_atau_bumn_edit']").val();  //status perusahaan
		var nilai_kontrak = $("input[name='nominal_kontrak_edit1']").val();
		var nilai_kontrak_float = parseFloat(nilai_kontrak);
		var ppn_10_persen = $("input[name='ppn_10_persen_edit1']").val();
		var ppn_10_persen_float = parseFloat(ppn_10_persen);
		var pph_22 = $("input[name='pph_22_edit1']").val();
		var pph_23 = $("input[name='pph_23_edit1']").val();
		var pph_4_2 = $("input[name='pph_4_2_edit1']").val();
		var lc_atau_skbdn = $("input[name='lc_atau_skbdn_edit']").val(); //variabel lc atau skbdn
		// if(swasta_atau_bumn == 'BUMN'){
		if((lc_atau_skbdn === 'LC' && swasta_atau_bumn === 'SWASTA') || (lc_atau_skbdn === 'LC' && swasta_atau_bumn === 'BUMN') || (lc_atau_skbdn === 'LC_PMN' && swasta_atau_bumn === 'SWASTA') || (lc_atau_skbdn === 'LC_PMN' && swasta_atau_bumn === 'BUMN')){			
		   // var hasil0 = nilai_kontrak_float; //asli
		   var hasil0 = nilai_kontrak_float + total_nilai_float;
		   var numhasil0 = addCommas(hasil0);
		   $("input[name='nilai_lc_atau_skbdn_edit']").val(numhasil0);
		   $("input[name='nilai_lc_atau_skbdn1']").val(hasil0);
		} else if ((lc_atau_skbdn === 'SKBDN' && swasta_atau_bumn === 'SWASTA') || (lc_atau_skbdn === 'SKBDN_PMN' && swasta_atau_bumn === 'SWASTA')){
			var hasil2 = nilai_kontrak_float - pph_22 - pph_23 - pph_4_2;
			var numhasil2 = addCommas(hasil2);
			$("input[name='nilai_lc_atau_skbdn_edit']").val(numhasil2);
			$("input[name='nilai_lc_atau_skbdn1']").val(hasil2);
		} else if ((lc_atau_skbdn === 'SKBDN' && swasta_atau_bumn === 'BUMN') || (lc_atau_skbdn === 'SKBDN_PMN' && swasta_atau_bumn === 'BUMN')){
			var hasil = (nilai_kontrak_float + ppn_10_persen_float) - pph_22 - pph_23 - pph_4_2;
			var numhasil = addCommas(hasil);
			$("input[name='nilai_lc_atau_skbdn_edit']").val(numhasil);
			$("input[name='nilai_lc_atau_skbdn1']").val(hasil);
		} else {
			$("input[name='nilai_lc_atau_skbdn1']").val(0);
		}
    }
	
	function unlockEdit() {
		$('#lockedit').show();
        $('#unlockedit').hide();
		$('#submit_edit').show();
		$('input[name=customRadio]').attr("disabled",false);
		document.getElementById("tahapan_edit").disabled = false;
		document.getElementById("nomor_surat_edit").disabled = false;
		document.getElementById("tanggal_surat_ajuan_isc_edit").disabled = false;
		document.getElementById("nomor_po_edit").disabled = false;
		document.getElementById("nominal_pembukaan_edit").disabled = false;
		document.getElementById("nomor_kontrak_edit").disabled = false;
		document.getElementById("tanggal_sjan_edit").disabled = false;
		document.getElementById("vendor_edit").disabled = false;
		document.getElementById("alamat_vendor_edit").disabled = false;
		for (let index = 0; index < $('#total_barang_edit').val(); index++) {
            document.getElementById("nama_barang_edit"+index).disabled = false;
            document.getElementById("quantity_barang_edit"+index).disabled = false;
            document.getElementById("satuan_barang_edit"+index).disabled = false;
			document.getElementById("tanggal_pengiriman_edit"+index).disabled = false;
            document.getElementById("tolerance_barang_edit"+index).disabled = false;
        }
		$('#add_row_edit').hide();
		$('#add_row_edit1').show();
		$('#delete_row_edit').hide();
		$('#add_row_doc_po_asli_edit').hide();
		$('#add_row_doc_po_asli_edit1').show();
		$('#delete_row_doc_po_asli_edit').hide();
		$('#add_row_doc_jamlak_asli_edit1').show();
		$('#add_row_doc_jamlak_asli_edit').hide();
		$('#delete_row_doc_jamlak_asli_edit').hide();
		$('#add_row_doc_kontrak_asli_edit').hide();
		$('#add_row_doc_kontrak_asli_edit1').show();
		$('#delete_row_doc_kontrak_asli_edit').hide();
		$('#add_row_doc_kontrak_jual_so_edit').hide();
		$('#add_row_doc_kontrak_jual_so_edit1').show();
		$('#delete_row_doc_kontrak_jual_so_edit').hide();
		$('#add_row_additional_cost_edit').hide();
		$('#delete_row_additional_cost_edit').hide();
        // document.getElementById("mata_uang-edit").disabled = false;
		document.getElementById("nilai_kurs-edit").disabled = true;
		document.getElementById("nilai_kontrak-edit").disabled = true;
		document.getElementById("ppn_10_persen-edit").disabled = true;
		document.getElementById("prosentase_ppn-edit").disabled = false;
		document.getElementById("pph_22-edit").disabled = false;
		document.getElementById("pph_23-edit").disabled = false;
		document.getElementById("pph_4_2-edit").disabled = false;
		document.getElementById("masa_berlaku_jamlak-edit").disabled = false;
		document.getElementById("surat_konfirmasi_keabsahan_bank_garansi-edit").disabled = false;
		document.getElementById("keabsahan_bank_garansi-edit").disabled = false;
		document.getElementById("no_surat_keabsahan-edit").disabled = false;
		document.getElementById("tanggal_surat_keabsahan-edit").disabled = false;
		document.getElementById("keterangan_atau_alasan_belum_release-edit").disabled = false;
		document.getElementById("swift_number-edit").disabled = false;
		// document.getElementById("swasta_atau_bumn_edit").disabled = false;
		document.getElementById("advising_bank-edit").disabled = false;
		document.getElementById("account_no-edit").disabled = false;
		document.getElementById("waktu_pengiriman_barang-edit").disabled = false;
		document.getElementById("kode_proyek-edit").disabled = false;
		document.getElementById("nama_proyek-edit").disabled = false;
		document.getElementById("nomor_kontrak_jual_so-edit").disabled = false;
		document.getElementById("nilai-edit").disabled = false;
		document.getElementById("produk_yang_dijual-edit").disabled = false;
		document.getElementById("customer-edit").disabled = false;
		for (let index1 = 0; index1 < $('#total_doc_po_asli_edit').val(); index1++) {
            document.getElementById("dok_kelengkapan_po_asli_edit"+index1).disabled = true;
			$('#edit_links'+index1).show();
			$('#kolom'+index1).show();
        }
		for (let index2 = 0; index2 < $('#total_doc_jamlak_asli_edit').val(); index2++) {
            document.getElementById("dok_kelengkapan_jamlak_asli_edit"+index2).disabled = true;
        }
		for (let index3 = 0; index3 < $('#total_doc_kontrak_asli_edit').val(); index3++) {
            document.getElementById("dok_kelengkapan_kontrak_asli_edit"+index3).disabled = true;
        }
		document.getElementById("berkas_surat_konfirmasi_keabsahan_bank_garansi_edit").disabled = false;
		document.getElementById("berkas_keabsahan_bank_garansi_edit").disabled = false;
		for (let index4 = 0; index4 < $('#total_doc_kontrak_jual_so_edit').val(); index4++) {
            document.getElementById("berkas_nomor_kontrak_jual_so_edit"+index4).disabled = true;
        }
    }
	
	function lockEdit() {
		$('#lockedit').hide();
        $('#unlockedit').show();
		$('#submit_edit').hide();
		$('input[name=customRadio]').attr("disabled",true);
		document.getElementById("tahapan_edit").disabled = true;
		document.getElementById("nomor_surat_edit").disabled = true;
		document.getElementById("tanggal_surat_ajuan_isc_edit").disabled = true;
		document.getElementById("nomor_po_edit").disabled = true;
		document.getElementById("nominal_pembukaan_edit").disabled = true;
		document.getElementById("nomor_kontrak_edit").disabled = true;
		document.getElementById("tanggal_sjan_edit").disabled = true;
		document.getElementById("vendor_edit").disabled = true;
		document.getElementById("alamat_vendor_edit").disabled = true;
		for (let index = 0; index < $('#total_barang_edit').val(); index++) {
            document.getElementById("nama_barang_edit"+index).disabled = true;
            document.getElementById("quantity_barang_edit"+index).disabled = true;
            document.getElementById("satuan_barang_edit"+index).disabled = true;
			document.getElementById("tanggal_pengiriman_edit"+index).disabled = true;
            document.getElementById("tolerance_barang_edit"+index).disabled = true;
        }
		$('#add_row_edit').hide();
		$('#add_row_edit1').hide();
		$('#delete_row_edit').hide();
		$('#add_row_doc_po_asli_edit').hide();
		$('#add_row_doc_po_asli_edit1').hide();
		$('#delete_row_doc_po_asli_edit').hide();
		$('#add_row_doc_jamlak_asli_edit').hide();
		$('#delete_row_doc_jamlak_asli_edit').hide();
		$('#add_row_doc_kontrak_asli_edit').hide();
		$('#add_row_doc_kontrak_asli_edit1').hide();
		$('#delete_row_doc_kontrak_asli_edit').hide();
		$('#add_row_doc_kontrak_jual_so_edit').hide();
		$('#add_row_doc_kontrak_jual_so_edit1').hide();
		$('#delete_row_doc_kontrak_jual_so_edit').hide();
		$('#add_row_additional_cost_edit').hide();
		$('#delete_row_additional_cost_edit').hide();
        // document.getElementById("mata_uang-edit").disabled = true;
		document.getElementById("nilai_kurs-edit").disabled = true;
		document.getElementById("nominal_kontrak-edit").disabled = true;
		document.getElementById("ppn_10_persen-edit").disabled = true;
		document.getElementById("prosentase_ppn-edit").disabled = true;
		document.getElementById("pph_22-edit").disabled = true;
		document.getElementById("pph_23-edit").disabled = true;
		document.getElementById("pph_4_2-edit").disabled = true;
		document.getElementById("masa_berlaku_jamlak-edit").disabled = true;
		document.getElementById("surat_konfirmasi_keabsahan_bank_garansi-edit").disabled = true;
		document.getElementById("keabsahan_bank_garansi-edit").disabled = true;
		document.getElementById("no_surat_keabsahan-edit").disabled = true;
		document.getElementById("tanggal_surat_keabsahan-edit").disabled = true;
		document.getElementById("keterangan_atau_alasan_belum_release-edit").disabled = true;
		document.getElementById("swift_number-edit").disabled = true;
		// document.getElementById("swasta_atau_bumn_edit").disabled = true;
		document.getElementById("advising_bank-edit").disabled = true;
		document.getElementById("account_no-edit").disabled = true;
		document.getElementById("waktu_pengiriman_barang-edit").disabled = true;
		document.getElementById("kode_proyek-edit").disabled = true;
		document.getElementById("nama_proyek-edit").disabled = true;
		document.getElementById("nomor_kontrak_jual_so-edit").disabled = true;
		document.getElementById("nilai-edit").disabled = true;
		document.getElementById("produk_yang_dijual-edit").disabled = true;
		document.getElementById("customer-edit").disabled = true;
		for (let index1 = 0; index1 < $('#total_doc_po_asli_edit').val(); index1++) {
            document.getElementById("dok_kelengkapan_po_asli_edit"+index1).disabled = true;
			$('#edit_links'+index1).hide();
			$('#kolom'+index1).hide();
        }
		for (let index2 = 0; index2 < $('#total_doc_jamlak_asli_edit').val(); index2++) {
            document.getElementById("dok_kelengkapan_jamlak_asli_edit"+index2).disabled = true;
        }
		for (let index3 = 0; index3 < $('#total_doc_kontrak_asli_edit').val(); index3++) {
            document.getElementById("dok_kelengkapan_kontrak_asli_edit"+index3).disabled = true;
        }
		document.getElementById("berkas_surat_konfirmasi_keabsahan_bank_garansi_edit").disabled = true;
		document.getElementById("berkas_keabsahan_bank_garansi_edit").disabled = true;
		for (let index4 = 0; index4 < $('#total_doc_kontrak_jual_so_edit').val(); index4++) {
            document.getElementById("berkas_nomor_kontrak_jual_so_edit"+index4).disabled = true;
        }
    }
	
	function myFunctionEdit() {
		var customCheckEdit1 = document.getElementById("customCheckEdit1");
		var customCheckEdit2 = document.getElementById("customCheckEdit2");
		var customCheckEdit3 = document.getElementById("customCheckEdit3");
		// var text = document.getElementById("text");
		if (customCheckEdit2.checked == true){
			// $('#surat_konfirmasi_keabsahan_bank_garansi-add').show();
			// $('#label_surat_konfirmasi_keabsahan_bank_garansi-add').show();
			// $('#berkas_surat_konfirmasi_keabsahan_bank_garansi').show();
			// $('#label_berkas_surat_konfirmasi_keabsahan_bank_garansi').show();
			// $('#keabsahan_bank_garansi-add').show();
			// $('#label_keabsahan_bank_garansi-add').show();
			// $('#berkas_keabsahan_bank_garansi').show();
			// $('#label_berkas_keabsahan_bank_garansi').show();
			// $('#no_surat_keabsahan-add').show();
			// $('#label_no_surat_keabsahan-add').show();
			// $('#tanggal_surat_keabsahan-add').show();
			// $('#label_tanggal_surat_keabsahan-add').show();			
			$('#dok_kelengkapan_jamlak_asli_edit0').prop('required',true);
		} else {
			// $('#surat_konfirmasi_keabsahan_bank_garansi-add').hide();
			// $('#label_surat_konfirmasi_keabsahan_bank_garansi-add').hide();
			// $('#berkas_surat_konfirmasi_keabsahan_bank_garansi').hide();
			// $('#label_berkas_surat_konfirmasi_keabsahan_bank_garansi').hide();
			// $('#keabsahan_bank_garansi-add').hide();
			// $('#label_keabsahan_bank_garansi-add').hide();
			// $('#berkas_keabsahan_bank_garansi').hide();
			// $('#label_berkas_keabsahan_bank_garansi').hide();
			// $('#no_surat_keabsahan-add').hide();
			// $('#label_no_surat_keabsahan-add').hide();
			// $('#tanggal_surat_keabsahan-add').hide();
			// $('#label_tanggal_surat_keabsahan-add').hide();
			$('#dok_kelengkapan_jamlak_asli_edit0').prop('required',false);
		}
		
		if (customCheckEdit1.checked == true){
			$('#dok_kelengkapan_po_asli_edit0').prop('required',true);
		}else{
			$('#dok_kelengkapan_po_asli_edit0').prop('required',false);
		}
		if (customCheckEdit3.checked == true){
			$('#dok_kelengkapan_kontrak_asli_edit0').prop('required',true);
		}else{
			$('#dok_kelengkapan_kontrak_asli_edit0').prop('required',false);
		}
	}
	
	$(document).ready(function() {
		$('#divisi-edit').selectize({});
		
		$('#mata_uang-edit').selectize({});
		
		$('#swasta_atau_bumn_edit').selectize({
            sortField: 'text'
        });
	});
</script>