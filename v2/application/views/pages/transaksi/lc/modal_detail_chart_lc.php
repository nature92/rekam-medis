<div class="modal fade" style="z-index:2000" id="modalDetailChart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Chart SCF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="row">

                        <!-- Judul: Bulan - Tahun -->
                        <div class="col-12">
                            <div class="card mb-3 widget-content d-flex justify-content-center p-2">
                                <span style="font-size: 16px">Detail: <span id="detailBulanTahun"></span></span>
                            </div>
                        </div>

                        <!-- Main Card -->
                        <?php foreach(array('Nilai Pokok', 'Biaya SCF Pindad') as $label): ?>
                        <div class="col-lg-6">
                            <div class="card mb-3 widget-content">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading"><?= $label ?></div>
                                        <div class="widget-numbers text-primary">
                                            Rp. <span id="total<?= preg_replace_callback(
                                                        '/\s/',
                                                        function($m){ return ''; },
                                                        $label) ?>"></span>
                                        </div>
                                    </div>
                                    <div class="widget-content-right d-none d-xl-block">
                                        <div class="icon-card primary">
                                            <i class="fa fa-dollar-sign"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        <!-- Tabel Detail Nilai Pokok -->
                        <div class="mb-3 col-md-12">
                            <table class="table table-bordered res-fsize">
                                <thead class='thead-accent-primary'>
                                    <th colspan="7">Nilai Pokok</th>
                                </thead>
                                <thead class='thead-light'>
                                    <th>No.</th>
                                    <th>No. Bukti Kas</th>
                                    <th>No. PO</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Supplier</th>
                                    <th>Tanggal Jatuh Tempo</th>
                                    <th>Nilai Pokok</th>
                                </thead>

                                <tbody id="detailNilaiPokok"></tbody>
                            </table>
                        </div>
                        
                        <!-- Tabel Detail Biaya SCF Pindad -->
                        <div class="col-md-12">
                            <table class="table table-bordered res-fsize">
                                <thead class='thead-accent-primary'>
                                    <th colspan="7">Biaya SCF Pindad</th>
                                </thead>
                                <thead class='thead-light'>
                                    <th>No.</th>
                                    <th>No. Bukti Kas</th>
                                    <th>No. PO</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Supplier</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Biaya SCF Pindad</th>
                                </thead>

                                <tbody id="detailBiayaSCFPindad"></tbody>
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
    //Ajax Detail Chart
    const getAjaxDetailChart = (indexMonth) => {
        const year = $('#year-scf-chart').val()
        const month = getMonthNameByIndex(indexMonth - 1);

        //Get Detail Chart
        const xml = new XMLHttpRequest();
        xml.open('GET', `<?= base_url() ?>transaksi/scf/getDetailChartSCF/${year}/${indexMonth}`);
        xml.send();

        xml.onreadystatechange = () => {
            if (xml.readyState == 4 && xml.status == 200) {
                const detailChartSCF = JSON.parse(xml.response);

                //Mapping Bulan & Tahun
                $("#detailBulanTahun").html(`${month} ${year}`);

                //Total Nilai Pokok & Biaya SCF Pindad
                const totalNilaiPokok = detailChartSCF.nilaiPokok.length
                    ? detailChartSCF.nilaiPokok.map(data => +data.nilai_pokok).reduce((a,b) => a+b)
                    : 0;
                const totalBiayaSCFPindad = detailChartSCF.biayaSCFPindad.length
                    ? detailChartSCF.biayaSCFPindad.map(data => +data.biaya_scf_pindad).reduce((a,b) => a+b)
                    : 0;

                //Mapping Data Total
                $('#totalNilaiPokok').html(separateNumber(toStringLocaleId(totalNilaiPokok)));
                $('#totalBiayaSCFPindad').html(separateNumber(toStringLocaleId(totalBiayaSCFPindad)));

                //Mapping Data Nilai Pokok
                $('#detailNilaiPokok').html(detailChartSCF.nilaiPokok.length
                    ? detailChartSCF.nilaiPokok.map((data, i) => `
                        <tr>
                            <td class="text-center">${i+1}</td>
                            <td>${data.nomor_bukti_kas}</td>
                            <td>${data.nomor_po}</td>
                            <td>${data.nama_barang}</td>
                            <td>${data.nama_supplier}</td>
                            <td class="text-center">${dateToString(new Date(data.tanggal_jatuh_tempo_scf))}</td>
                            <td style="background-color: #ecf2ffa0;">Rp. <span style="float: right">${separateNumber(data.nilai_pokok)}</span></td>
                        </tr>
                    `).join('')
                    : `<tr><td class="text-center" colspan="7">Data Kosong</td></tr>`
                );

                //Mapping Data Biaya SCF Pindad
                $('#detailBiayaSCFPindad').html(detailChartSCF.biayaSCFPindad.length
                    ? detailChartSCF.biayaSCFPindad.map((data, i) => `
                        <tr>
                            <td class="text-center">${i+1}</td>
                            <td>${data.nomor_bukti_kas}</td>
                            <td>${data.nomor_po}</td>
                            <td>${data.nama_barang}</td>
                            <td>${data.nama_supplier}</td>
                            <td class="text-center">${dateToString(new Date(data.tanggal_mulai_scf))}</td>
                            <td style="background-color: #ecf2ffa0;">Rp. <span style="float: right">${separateNumber(data.biaya_scf_pindad)}</span></td>
                        </tr>
                    `).join('')
                    : `<tr><td class="text-center" colspan="7">Data Kosong</td></tr>`
                );

                //Show Modal
                $('#modalDetailChart').modal('show');
            }
        }
    }
</script>