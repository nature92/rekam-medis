<div class="modal fade" id="modalDetailBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Barang Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
					<div class="form-group col-md-12 modal-input">
						<table id="tabel_barang" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Nama Barang</th>
									<th>Quantity</th>
									<th>Satuan</th>
									<th>Tanggal Pengiriman</th>
									<th>Tolerance Barang</th>
								</tr>
							</thead>
							<tbody id="detail_barang"></tbody>
						</table>
					</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
var detailBarangTable;
	function showBarang(e) {
		 $.post("<?php echo site_url('Transaksi/Lc/getDataDetailBarang'); ?>", {'uid': e})
            .done(function (data) {
                var body = "";
                data = JSON.parse(data);				
                for (var k in data) {
					quantity = data[k]['quantity'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
					satuan = data[k]['satuan'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                    body += "<tr><td>" + data[k]['nama_barang'] + "</td><td>" + quantity + "</td><td>" + satuan + "</td><td>" + data[k]['tanggal_pengiriman'] + "</td><td>" + data[k]['tolerance_barang'] + "</td></tr>";
                }
                if (detailBarangTable) {
                    detailBarangTable.destroy();
                }
                $('#detail_barang').html(body);
                detailBarangTable = $("#tabel_barang").DataTable({});
            });
        $('#modalDetailBarang').modal({backdrop: 'static', keyboard: false});
    }
</script>