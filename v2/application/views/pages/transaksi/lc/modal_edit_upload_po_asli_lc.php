<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Dokumen PO ASLI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/addPoAsliLC2"  method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		  <div class="modal-body">
				<?php foreach($header_lc as $row) { ?>
					<input type="hidden" class="form-control" id="id_lc_edit" name="id_lc_edit" placeholder="id LC/SKBDN" value="<?php echo $row->id_lc; ?>"> 
					<input type="hidden" class="form-control" id="lc_atau_skbdn_edit" name="lc_atau_skbdn_edit" placeholder="LC/SKBDN" value="<?php echo $row->lc_skbdn; ?>"> 
					<input type="hidden" class="form-control" id="uid_edit" name="uid_edit" placeholder="UID" value="<?php echo $row->uid; ?>"> 
					<input type="hidden" class="form-control" id="nomor_surat_edit" name="nomor_surat_edit" placeholder="nomor surat" value="<?php echo $row->nomor_surat; ?>"> 
					<input type="hidden" class="form-control" id="nomor_kontrak_edit" name="nomor_kontrak_edit" placeholder="nomor kontrak" value="<?php echo $row->nomor_kontrak; ?>"> 
					<input type="hidden" class="form-control" id="nomor_po_edit" name="nomor_po_edit" placeholder="nomor po" value="<?php echo $row->nomor_po; ?>"> 
				<?php } ?>
				<div class="form-group col-md-12 modal-input">
					<div id='input-dok_kelengkapan_po_asli-add'>
						<table class="table table-bordered table-hover" id="tab_logic_doc_po_asli_modal">
							<tbody>
								<tr id='dokPoAsliModal0'>
									<td>
										<input class='form-control' type="file" id='dok_kelengkapan_po_asli_modal0' name='dok_kelengkapan_po_asli_modal0' accept="application/pdf">
									</td>
								</tr>
								<tr id='dokPoAsliModal1'></tr>
							</tbody>
						</table>
						<a id="add_row_doc_po_asli_modal" class="pull-left btn btn-success " style="color:white">Tambah Dokumen</a>
						<a id='delete_row_doc_po_asli_modal' class="pull-right btn btn-danger" style="color:white">Hapus Dokumen</a>
						<input type="hidden" class="form-control" id="total_doc_po_asli_modal" name="total_doc_po_asli_modal" value="<?php echo set_value('total_doc_po_asli_modal'); ?>"/>
						<input type="hidden" class="form-control" id="total_detail_doc_po_asli_sdh_upload" name="total_detail_doc_po_asli_sdh_upload" value="<?php echo count($detail_po_asli); ?>"/>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		  </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalJamlak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelJamlak" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelJamlak">Upload Dokumen JAMLAK ASLI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/addJamlakAsliLC2"  method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		  <div class="modal-body">
				<?php foreach($header_lc as $row) { ?>
					<input type="hidden" class="form-control" id="id_lc_edit" name="id_lc_edit" placeholder="id LC/SKBDN" value="<?php echo $row->id_lc; ?>"> 
					<input type="hidden" class="form-control" id="lc_atau_skbdn_edit" name="lc_atau_skbdn_edit" placeholder="LC/SKBDN" value="<?php echo $row->lc_skbdn; ?>"> 
					<input type="hidden" class="form-control" id="uid_edit" name="uid_edit" placeholder="UID" value="<?php echo $row->uid; ?>"> 
					<input type="hidden" class="form-control" id="nomor_surat_edit" name="nomor_surat_edit" placeholder="nomor surat" value="<?php echo $row->nomor_surat; ?>"> 
					<input type="hidden" class="form-control" id="nomor_kontrak_edit" name="nomor_kontrak_edit" placeholder="nomor kontrak" value="<?php echo $row->nomor_kontrak; ?>"> 
					<input type="hidden" class="form-control" id="nomor_po_edit" name="nomor_po_edit" placeholder="nomor po" value="<?php echo $row->nomor_po; ?>"> 
				<?php } ?>
				<div class="form-group col-md-12 modal-input">
					<div id='input-dok_kelengkapan_jamlak_asli-add'>
						<table class="table table-bordered table-hover" id="tab_logic_doc_jamlak_asli_modal">
							<tbody>
								<tr id='dokJamlakAsliModal0'>
									<td>
										<input class='form-control' type="file" id='dok_kelengkapan_jamlak_asli_modal0' name='dok_kelengkapan_jamlak_asli_modal0' accept="application/pdf">
									</td>
								</tr>
								<tr id='dokJamlakAsliModal1'></tr>
							</tbody>
						</table>
						<a id="add_row_doc_jamlak_asli_modal" class="pull-left btn btn-success " style="color:white">Tambah Dokumen</a>
						<a id='delete_row_doc_jamlak_asli_modal' class="pull-right btn btn-danger" style="color:white">Hapus Dokumen</a>
						<input type="hidden" class="form-control" id="total_doc_jamlak_asli_modal" name="total_doc_jamlak_asli_modal" value="<?php echo set_value('total_doc_jamlak_asli_modal'); ?>"/>
						<input type="hidden" class="form-control" id="total_detail_doc_jamlak_asli_sdh_upload" name="total_detail_doc_jamlak_asli_sdh_upload" value="<?php echo count($detail_jamlak_asli); ?>"/>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		  </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalKontrak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelKontrakAsli" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelKontrakAsli">Upload Dokumen KONTRAK ASLI</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/addKontrakAsliLC2"  method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		  <div class="modal-body">
				<?php foreach($header_lc as $row) { ?>
					<input type="hidden" class="form-control" id="id_lc_edit" name="id_lc_edit" placeholder="id LC/SKBDN" value="<?php echo $row->id_lc; ?>"> 
					<input type="hidden" class="form-control" id="lc_atau_skbdn_edit" name="lc_atau_skbdn_edit" placeholder="LC/SKBDN" value="<?php echo $row->lc_skbdn; ?>"> 
					<input type="hidden" class="form-control" id="uid_edit" name="uid_edit" placeholder="UID" value="<?php echo $row->uid; ?>"> 
					<input type="hidden" class="form-control" id="nomor_surat_edit" name="nomor_surat_edit" placeholder="nomor surat" value="<?php echo $row->nomor_surat; ?>"> 
					<input type="hidden" class="form-control" id="nomor_kontrak_edit" name="nomor_kontrak_edit" placeholder="nomor kontrak" value="<?php echo $row->nomor_kontrak; ?>"> 
					<input type="hidden" class="form-control" id="nomor_po_edit" name="nomor_po_edit" placeholder="nomor po" value="<?php echo $row->nomor_po; ?>"> 
				<?php } ?>
				<div class="form-group col-md-12 modal-input">
					<div id='input-dok_kelengkapan_kontrak_asli-add'>
						<table class="table table-bordered table-hover" id="tab_logic_doc_kontrak_asli_modal">
							<tbody>
								<tr id='dokKontrakAsliModal0'>
									<td>
										<input class='form-control' type="file" id='dok_kelengkapan_kontrak_asli_modal0' name='dok_kelengkapan_kontrak_asli_modal0' accept="application/pdf">
									</td>
								</tr>
								<tr id='dokKontrakAsliModal1'></tr>
							</tbody>
						</table>
						<a id="add_row_doc_kontrak_asli_modal" class="pull-left btn btn-success " style="color:white">Tambah Dokumen</a>
						<a id='delete_row_doc_kontrak_asli_modal' class="pull-right btn btn-danger" style="color:white">Hapus Dokumen</a>
						<input type="hidden" class="form-control" id="total_doc_kontrak_asli_modal" name="total_doc_kontrak_asli_modal" value="<?php echo set_value('total_doc_kontrak_asli_modal'); ?>"/>
						<input type="hidden" class="form-control" id="total_detail_doc_kontrak_asli_sdh_upload" name="total_detail_doc_kontrak_asli_sdh_upload" value="<?php echo count($detail_kontrak_asli); ?>"/>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		  </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalKontrakJualSO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelKontrakJualSo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelKontrakJualSo">Upload Dokumen KONTRAK JUAL (SO)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/addKontrakJualSoLC2"  method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		  <div class="modal-body">
				<?php foreach($header_lc as $row) { ?>
					<input type="hidden" class="form-control" id="id_lc_edit" name="id_lc_edit" placeholder="id LC/SKBDN" value="<?php echo $row->id_lc; ?>"> 
					<input type="hidden" class="form-control" id="lc_atau_skbdn_edit" name="lc_atau_skbdn_edit" placeholder="LC/SKBDN" value="<?php echo $row->lc_skbdn; ?>"> 
					<input type="hidden" class="form-control" id="uid_edit" name="uid_edit" placeholder="UID" value="<?php echo $row->uid; ?>"> 
					<input type="hidden" class="form-control" id="nomor_surat_edit" name="nomor_surat_edit" placeholder="nomor surat" value="<?php echo $row->nomor_surat; ?>"> 
					<input type="hidden" class="form-control" id="nomor_kontrak_edit" name="nomor_kontrak_edit" placeholder="nomor kontrak" value="<?php echo $row->nomor_kontrak; ?>"> 
					<input type="hidden" class="form-control" id="nomor_po_edit" name="nomor_po_edit" placeholder="nomor po" value="<?php echo $row->nomor_po; ?>"> 
				<?php } ?>
				<div class="form-group col-md-12 modal-input">
					<div id='input-dok_kelengkapan_kontrak_asli-add'>
						<table class="table table-bordered table-hover" id="tab_logic_doc_kontrak_jual_so_modal">
							<tbody>
								<tr id='dokKontrakJualSoModal0'>
									<td>
										<input class='form-control' type="file" id='dok_kelengkapan_kontrak_jual_so_modal0' name='dok_kelengkapan_kontrak_jual_so_modal0' accept="application/pdf">
									</td>
								</tr>
								<tr id='dokKontrakJualSoModal1'></tr>
							</tbody>
						</table>
						<a id="add_row_doc_kontrak_jual_so_modal" class="pull-left btn btn-success " style="color:white">Tambah Dokumen</a>
						<a id='delete_row_doc_kontrak_jual_so_modal' class="pull-right btn btn-danger" style="color:white">Hapus Dokumen</a>
						<input type="hidden" class="form-control" id="total_doc_kontrak_jual_so_modal" name="total_doc_kontrak_jual_so_modal" value="<?php echo set_value('total_doc_kontrak_jual_so_modal'); ?>"/>
						<input type="hidden" class="form-control" id="total_detail_doc_kontrak_jual_so_sdh_upload" name="total_detail_doc_kontrak_jual_so_sdh_upload" value="<?php echo count($detail_kontrak_jual_so); ?>"/>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		  </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalEditPenerbitan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelPenerbitan" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelPenerbitan">Upload Dokumen Penerbitan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/addKelengkapanPenerbitanLC2"  method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		  <div class="modal-body">
				<?php foreach($penerbitan_lc as $row) { ?>
					<input type="hidden" class="form-control" id="id_lc_edit2" name="id_lc_edit2" placeholder="id LC/SKBDN" value="<?php echo $row->id_lc; ?>"> 
					<input type="hidden" class="form-control" id="lc_atau_skbdn_edit2" name="lc_atau_skbdn_edit2" placeholder="LC/SKBDN" value="<?php echo $row->lc_skbdn; ?>"> 
					<input type="hidden" class="form-control" id="uid_edit2" name="uid_edit2" placeholder="UID" value="<?php echo $row->uid; ?>"> 
					<input type="hidden" class="form-control" id="nomor_surat_edit2" name="nomor_surat_edit2" placeholder="nomor surat" value="<?php echo $row->nomor_surat; ?>"> 
					<input type="hidden" class="form-control" id="nomor_kontrak_edit2" name="nomor_kontrak_edit2" placeholder="nomor kontrak" value="<?php echo $row->nomor_kontrak; ?>"> 
					<input type="hidden" class="form-control" id="nomor_po_edit2" name="nomor_po_edit2" placeholder="nomor po" value="<?php echo $row->nomor_po; ?>"> 
				<?php } ?>
				<div class="form-group col-md-12 modal-input">
					<div id='input-dok_kelengkapan_penerbitan-add'>
						<table class="table table-bordered table-hover" id="tab_logic_doc_kelengkapan_penerbitan_modal">
							<tbody>
								<tr id='dokKelengkapanPenerbitanModal0'>
									<td>
										<input class='form-control' type="file" id='dok_kelengkapan_penerbitan_modal0' name='dok_kelengkapan_penerbitan_modal0' accept="application/pdf">
									</td>
								</tr>
								<tr id='dokKelengkapanPenerbitanModal1'></tr>
							</tbody>
						</table>
						<a id="add_row_doc_kelengkapan_penerbitan_modal" class="pull-left btn btn-success " style="color:white">Tambah Dokumen</a>
						<a id='delete_row_doc_kelengkapan_penerbitan_modal' class="pull-right btn btn-danger" style="color:white">Hapus Dokumen</a>
						<input type="hidden" class="form-control" id="total_doc_kelengkapan_penerbitan_modal" name="total_doc_kelengkapan_penerbitan_modal" value="<?php echo set_value('total_doc_kelengkapan_penerbitan_modal'); ?>"/>
						<input type="hidden" class="form-control" id="total_detail_doc_kelengkapan_penerbitan_sdh_upload" name="total_detail_doc_kelengkapan_penerbitan_sdh_upload" value="<?php echo count($detail_penerbitan); ?>"/>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		  </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalEditRelease" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelRelease" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelRelease">Upload Dokumen Release</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/addKelengkapanReleaseLC2"  method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		  <div class="modal-body">
				<?php foreach($release_lc as $row) { ?>
					<input type="hidden" class="form-control" id="id_lc_edit3" name="id_lc_edit3" placeholder="id LC/SKBDN" value="<?php echo $row->id_lc; ?>"> 
					<input type="hidden" class="form-control" id="lc_atau_skbdn_edit3" name="lc_atau_skbdn_edit3" placeholder="LC/SKBDN" value="<?php echo $row->lc_skbdn; ?>"> 
					<input type="hidden" class="form-control" id="uid_edit3" name="uid_edit3" placeholder="UID" value="<?php echo $row->uid; ?>"> 
					<input type="hidden" class="form-control" id="nomor_surat_edit3" name="nomor_surat_edit3" placeholder="nomor surat" value="<?php echo $row->nomor_surat; ?>"> 
					<input type="hidden" class="form-control" id="nomor_kontrak_edit3" name="nomor_kontrak_edit3" placeholder="nomor kontrak" value="<?php echo $row->nomor_kontrak; ?>"> 
					<input type="hidden" class="form-control" id="nomor_po_edit3" name="nomor_po_edit3" placeholder="nomor po" value="<?php echo $row->nomor_po; ?>"> 
				<?php } ?>
				<div class="form-group col-md-12 modal-input">
					<div id='input-dok_kelengkapan_release-add'>
						<table class="table table-bordered table-hover" id="tab_logic_doc_kelengkapan_release_modal">
							<tbody>
								<tr id='dokKelengkapanReleaseModal0'>
									<td>
										<input class='form-control' type="file" id='dok_kelengkapan_release_modal0' name='dok_kelengkapan_release_modal0' accept="application/pdf">
									</td>
								</tr>
								<tr id='dokKelengkapanReleaseModal1'></tr>
							</tbody>
						</table>
						<a id="add_row_doc_kelengkapan_release_modal" class="pull-left btn btn-success " style="color:white">Tambah Dokumen</a>
						<a id='delete_row_doc_kelengkapan_release_modal' class="pull-right btn btn-danger" style="color:white">Hapus Dokumen</a>
						<input type="hidden" class="form-control" id="total_doc_kelengkapan_release_modal" name="total_doc_kelengkapan_release_modal" value="<?php echo set_value('total_doc_kelengkapan_release_modal'); ?>"/>
						<input type="hidden" class="form-control" id="total_detail_doc_kelengkapan_release_sdh_upload" name="total_detail_doc_kelengkapan_release_sdh_upload" value="<?php echo count($detail_doc_release); ?>"/>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		  </div>
	  </form>
    </div>
  </div>
</div>

<div class="modal fade" id="tambahDataBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelRelease" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelRelease">Tambah Detail Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="file_cv" action="<?php echo base_url(); ?>transaksi/lc/editBarangModal"  method="post" class="form-horizontal form-validate-signup" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		  <div class="modal-body">
				<?php foreach($header_lc as $row) { ?>
					<input type="hidden" class="form-control" id="id_lc_edit3" name="id_lc_edit3" placeholder="id LC/SKBDN" value="<?php echo $row->id_lc; ?>"> 
					<input type="hidden" class="form-control" id="uid_edit3" name="uid_edit3" placeholder="UID" value="<?php echo $row->uid; ?>"> 
					<input type="hidden" class="form-control" id="lc_atau_skbdn_edit3" name="lc_atau_skbdn_edit3" placeholder="LC/SKBDN" value="<?php echo $row->lc_skbdn; ?>">
					<input type="hidden" class="form-control" id="nomor_surat_edit3" name="nomor_surat_edit3" placeholder="nomor surat" value="<?php echo $row->nomor_surat; ?>"> 
					<input type="hidden" class="form-control" id="nomor_kontrak_edit3" name="nomor_kontrak_edit3" placeholder="nomor kontrak" value="<?php echo $row->nomor_kontrak; ?>"> 
					<input type="hidden" class="form-control" id="nomor_po_edit3" name="nomor_po_edit3" placeholder="nomor po" value="<?php echo $row->nomor_po; ?>"> 
				<?php } ?>
				<div class="form-group col-md-12 modal-input">
					<div id='input-dok_kelengkapan_release-add'>
						<table class="table table-bordered table-hover" id="tab_logic_doc_kelengkapan_release_modal1">
							<thead>
								<tr >
									<th class="text-center">Nama Barang</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Satuan</th>
									<th class="text-center">Tanggal Pengiriman</th>
									<th class="text-center">Tolerance</th>
								</tr>
							</thead>
							<!--<tbody>
								<tr id='dokKelengkapanReleaseMod0'>
									<td>
										<input class='form-control' type="file" id='dok_kelengkapan_release_mod0' name='dok_kelengkapan_release_mod0' accept="application/pdf">
									</td>
								</tr>
								<tr id='dokKelengkapanReleaseMod1'></tr>
							</tbody>-->
							<tbody>
								<tr id='dokKelengkapanReleaseMod0'>
									<td><input type="text" name='nama_barang_modal_edit0' placeholder='Nama Barang' class="form-control" required /></td>
									<td><input type="text" name='quantity_barang_modal_edit0' placeholder='Quantity' class="form-control input-number number-separator" required /></td>
									<td><input type="text" name='satuan_barang_modal_edit0' placeholder='Satuan' class="form-control" required /></td>
									<td><input type="date" name='tanggal_pengiriman_modal_edit0' placeholder='Tanggal Pengiriman' class="form-control" required /></td>
									<td><input type="text" name='tolerance_modal_edit0' placeholder='Tolerance' class="form-control" required /></td>
								</tr>
								<tr id='dokKelengkapanReleaseMod1'></tr>
							</tbody>
						</table>
						<a id="add_row_doc_kelengkapan_release_modal1" class="pull-left btn btn-success " style="color:white">Tambah Barang</a>
						<a id='delete_row_doc_kelengkapan_release_modal1' class="pull-right btn btn-danger" style="color:white">Hapus Barang</a>
						<input type="hidden" class="form-control" id="total_doc_kelengkapan_release_modal1" name="total_doc_kelengkapan_release_modal1" value="<?php echo set_value('total_doc_kelengkapan_release_modal1'); ?>"/>
						<!--<input type="hidden" class="form-control" id="total_detail_doc_kelengkapan_release_sdh_upload" name="total_detail_doc_kelengkapan_release_sdh_upload" value="<?php echo count($detail_doc_release); ?>"/> -->
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		  </div>
	  </form>
    </div>
  </div>
</div>
<script>
var j1=1;
$("input[name='total_doc_po_asli_modal']").val(1);
$("#add_row_doc_po_asli_modal").click(function(){
    $('#dokPoAsliModal'+j1).html(
								"<td><input class='form-control' type='file' id='dok_kelengkapan_po_asli_modal"+j1+"' name='dok_kelengkapan_po_asli_modal"+j1+"' accept='application/pdf'> </td>" 
						   );           
    $('#tab_logic_doc_po_asli_modal').append('<tr id="dokPoAsliModal'+(j1+1)+'"></tr>');
    $("input[name='total_doc_po_asli_modal']").val(j1 + 1);
    j1++; 
});
$("#delete_row_doc_po_asli_modal").click(function(){
    if(j1>1){
		$("#dokPoAsliModal"+(j1-1)).html('');
		$("input[name='total_doc_po_asli_modal']").val($("input[name='total_doc_po_asli_modal']").val() - 1);
		j1--;
    }
});

var j2=1;
$("input[name='total_doc_jamlak_asli_modal']").val(1);
$("#add_row_doc_jamlak_asli_modal").click(function(){
    $('#dokJamlakAsliModal'+j2).html(
								"<td><input class='form-control' type='file' id='dok_kelengkapan_jamlak_asli_modal"+j2+"' name='dok_kelengkapan_jamlak_asli_modal"+j2+"' accept='application/pdf'> </td>" 
						   );           
    $('#tab_logic_doc_jamlak_asli_modal').append('<tr id="dokJamlakAsliModal'+(j2+1)+'"></tr>');
    $("input[name='total_doc_jamlak_asli_modal']").val(j2 + 1);
    j2++; 
});
$("#delete_row_doc_jamlak_asli_modal").click(function(){
    if(j2>1){
		$("#dokJamlakAsliModal"+(j2-1)).html('');
		$("input[name='total_doc_jamlak_asli_modal']").val($("input[name='total_doc_jamlak_asli_modal']").val() - 1);
		j2--;
    }
});	

var j3=1;
$("input[name='total_doc_kontrak_asli_modal']").val(1);
$("#add_row_doc_kontrak_asli_modal").click(function(){
    $('#dokKontrakAsliModal'+j3).html(
								"<td><input class='form-control' type='file' id='dok_kelengkapan_kontrak_asli_modal"+j3+"' name='dok_kelengkapan_kontrak_asli_modal"+j3+"' accept='application/pdf'> </td>" 
						   );           
    $('#tab_logic_doc_kontrak_asli_modal').append('<tr id="dokKontrakAsliModal'+(j3+1)+'"></tr>');
    $("input[name='total_doc_kontrak_asli_modal']").val(j3 + 1);
    j3++; 
});
$("#delete_row_doc_kontrak_asli_modal").click(function(){
    if(j3>1){
		$("#dokKontrakAsliModal"+(j3-1)).html('');
		$("input[name='total_doc_kontrak_asli_modal']").val($("input[name='total_doc_kontrak_asli_modal']").val() - 1);
		j3--;
    }
});

var j4=1;
$("input[name='total_doc_kontrak_jual_so_modal']").val(1);
$("#add_row_doc_kontrak_jual_so_modal").click(function(){
    $('#dokKontrakJualSoModal'+j4).html(
								"<td><input class='form-control' type='file' id='dok_kelengkapan_kontrak_jual_so_modal"+j4+"' name='dok_kelengkapan_kontrak_jual_so_modal"+j4+"' accept='application/pdf'> </td>" 
						   );           
    $('#tab_logic_doc_kontrak_jual_so_modal').append('<tr id="dokKontrakJualSoModal'+(j4+1)+'"></tr>');
    $("input[name='total_doc_kontrak_jual_so_modal']").val(j4 + 1);
    j4++; 
});
$("#delete_row_doc_kontrak_jual_so_modal").click(function(){
    if(j4>1){
		$("#dokKontrakJualSoModal"+(j4-1)).html('');
		$("input[name='total_doc_kontrak_jual_so_modal']").val($("input[name='total_doc_kontrak_jual_so_modal']").val() - 1);
		j4--;
    }
});

var j5=1;
$("input[name='total_doc_kelengkapan_penerbitan_modal']").val(1);
$("#add_row_doc_kelengkapan_penerbitan_modal").click(function(){
    $('#dokKelengkapanPenerbitanModal'+j5).html(
								"<td><input class='form-control' type='file' id='dok_kelengkapan_penerbitan_modal"+j5+"' name='dok_kelengkapan_penerbitan_modal"+j5+"' accept='application/pdf'> </td>" 
						   );           
    $('#tab_logic_doc_kelengkapan_penerbitan_modal').append('<tr id="dokKelengkapanPenerbitanModal'+(j5+1)+'"></tr>');
    $("input[name='total_doc_kelengkapan_penerbitan_modal']").val(j5 + 1);
    j5++; 
});
$("#delete_row_doc_kelengkapan_penerbitan_modal").click(function(){
    if(j5>1){
		$("#dokKelengkapanPenerbitanModal"+(j5-1)).html('');
		$("input[name='total_doc_kelengkapan_penerbitan_modal']").val($("input[name='total_doc_kelengkapan_penerbitan_modal']").val() - 1);
		j5--;
    }
});

var j6=1;
$("input[name='total_doc_kelengkapan_release_modal']").val(1);
$("#add_row_doc_kelengkapan_release_modal").click(function(){
    $('#dokKelengkapanReleaseModal'+j6).html(
								"<td><input class='form-control' type='file' id='dok_kelengkapan_release_modal"+j6+"' name='dok_kelengkapan_release_modal"+j6+"' accept='application/pdf'> </td>" 
						   );           
    $('#tab_logic_doc_kelengkapan_release_modal').append('<tr id="dokKelengkapanReleaseModal'+(j6+1)+'"></tr>');
    $("input[name='total_doc_kelengkapan_release_modal']").val(j6 + 1);
    j6++; 
});
$("#delete_row_doc_kelengkapan_release_modal").click(function(){
    if(j6>1){
		$("#dokKelengkapanReleaseModal"+(j6-1)).html('');
		$("input[name='total_doc_kelengkapan_release_modal']").val($("input[name='total_doc_kelengkapan_release_modal']").val() - 1);
		j6--;
    }
});

var j7=1;
$("input[name='total_doc_kelengkapan_release_modal1']").val(1);
$("#add_row_doc_kelengkapan_release_modal1").click(function(){
    // $('#dokKelengkapanReleaseMod'+j7).html(
								// "<td><input class='form-control' type='file' id='dok_kelengkapan_release_mod"+j7+"' name='dok_kelengkapan_release_mod"+j7+"' accept='application/pdf'> </td>" 
						   // ); 
	$('#dokKelengkapanReleaseMod'+j7).html(
											"<td><input name='nama_barang_modal_edit"+j7+"' type='text' placeholder='Nama Barang' class='form-control input-md' required></td>"+
											"<td><input name='quantity_barang_modal_edit"+j7+"' type='text' placeholder='Quantity' class='form-control input-md input-number number-separator' required></td>"+
											"<td><input name='satuan_barang_modal_edit"+j7+"' type='text' placeholder='Satuan' class='form-control input-md' required></td>"+
											"<td><input name='tanggal_pengiriman_modal_edit"+j7+"' type='date' placeholder='Tanggal Pengiriman' class='form-control input-md' required></td>"+
											"<td><input name='tolerance_modal_edit"+j7+"' type='text' placeholder='Tolerance' class='form-control input-md' required></td>"
										);           
    $('#tab_logic_doc_kelengkapan_release_modal1').append('<tr id="dokKelengkapanReleaseMod'+(j7+1)+'"></tr>');
    $("input[name='total_doc_kelengkapan_release_modal1']").val(j7 + 1);
    j7++; 
});
$("#delete_row_doc_kelengkapan_release_modal1").click(function(){
    if(j7>1){
		$("#dokKelengkapanReleaseMod"+(j7-1)).html('');
		$("input[name='total_doc_kelengkapan_release_modal1']").val($("input[name='total_doc_kelengkapan_release_modal1']").val() - 1);
		j7--;
    }
});
</script>