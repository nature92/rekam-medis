


<a href="<?= base_url() ?>transaksi/penerimaan_kas/" class='btn btn-primary'>
    <i class="fa fa-arrow-left"></i> Kembali
</a>
<br><br>
<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button">
                Laporan Arus Kas Konsolidasi
            </a>
        </div>
    </div>
    <div class="card-body table-responsive collapse show" id='data-table'>
        <div class="row">
            <form class="d-flex mb-3 col-12 col-md-6 col-lg-4" id="form-search-laporan_penerimaan_kas" action="<?= base_url() ?>transaksi/penerimaan_kas/laporan">
                <div class="input-group input-group-sm mr-2">
                    <input type="month" class='form-control' id="search-laporan_penerimaan_kas" name="search-laporan_penerimaan_kas" <?php if (!empty($search)) : ?> value="<?= $search['search-laporan_penerimaan_kas'] ?>" <?php else : ?> value="<?= date('Y') . '-' . date('m') ?>" <?php endif; ?> required>
                </div>

                <!-- Reset Search -->
                <?php if (!empty($search) && $search['search-laporan_penerimaan_kas'] != date('Y') . '-' . date('m')) : ?>
                    <a class="btn btn-light btn-sm" href="<?= base_url() ?>transaksi/penerimaan_kas/laporan">
                        Reset
                    </a>
                <?php endif; ?>

            </form>
        </div>

        <div style="overflow-x: scroll">
            <table style="font-size: 12px" id="tabel_laporan_penerimaan_kas" class="table nowrap table-striped table-bordered table-sm" width="100%">

                <thead>
                    <th>Jenis Transaksi</th>
                    <th>Total</th>
                    <th class="divisi-popover px-2" data-toggle="popover" data-content="KANTOR PUSAT"><span class="popover-label">KP</span></th>
                    <?php foreach ($divisi as $d) : ?>
                        <th class="divisi-popover px-2" data-toggle="popover" data-content="<?= $d->nama_unit ?>">
                            <span class="popover-label"><?= $d->singkatan_unit ?></span>
                        </th>
                    <?php endforeach; ?>
                    
                </thead>

                <?php
                foreach ($jenis_arus_kas as $j_arus_kas) :

                    // Filter Jenis Transaksi Berdasarkan Jenis Arus Kas
                    $jenis_transaksi_arus_kas_berdasarkan_jenis = array_filter($jenis_transaksi_arus_kas, function ($item) use ($j_arus_kas) {
                        return $item->nama_jenis_arus_kas == $j_arus_kas;
                    });

                ?>

                    <!-- Header Jenis Arus Kas -->
                    <thead class="thead-accent-primary">
                        <th class="text-left" colspan="<?= count($divisi) + 3 ?>">
                            <span class="ml-2"><?= $j_arus_kas ?></span>
                        </th>
                    </thead>

                    <!-- Data Transaksi -->
                    <tbody>
                        <?php
                        foreach ($jenis_transaksi_arus_kas_berdasarkan_jenis as $j_transaksi_arus_kas) :

                            //Filter Transaksi Berdasarkan Jenis Transaksi
                            $transaksi_berdasarkan_jenis = array_filter($data_laporan_arus_kas, function ($item) use ($j_transaksi_arus_kas) {
                                return $item->nama_jenis_transaksi_arus_kas == $j_transaksi_arus_kas->nama_jenis_transaksi_arus_kas;
                            });

                            //Ambil Total Nominal Semua Divisi
                            $total_per_jenis_transaksi = array_values(array_filter($transaksi_berdasarkan_jenis, function ($item) {
                                return $item->id_divisi == 0;
                            }));
                            $total_per_jenis_transaksi = count($total_per_jenis_transaksi) > 0 ? $total_per_jenis_transaksi[0]->nominal_penerimaan_kas : 0;

                        ?>
                            <tr>
                                <td><?= $j_transaksi_arus_kas->nama_jenis_transaksi_arus_kas ?></td>
                                <td><span style="float: right"><?= separateNumber($total_per_jenis_transaksi) ?></span></td>
                                 


<?php 
                                $total_transaksi_div_produksi = 0;
                                foreach ($divisi as $d) :

                                    // Ambil Transaksi Berdasarkan Divisi
                                    $transaksi_berdasarkan_divisi = array_values(array_filter($transaksi_berdasarkan_jenis, function ($item) use ($d) {
                                        return $item->id_divisi == $d->kode_unit;
                                    }));

                                    //Ambil Nominal Dari Transaksi Terpilih
                                    $nominal = isset($transaksi_berdasarkan_divisi[0]) ? $transaksi_berdasarkan_divisi[0]->nominal_penerimaan_kas : 0;
                                    $data[] = $nominal;
                                    $total_transaksi_div_produksi += $nominal;
                                ?>
                                    
                                <?php endforeach; ?>
<td class="text-right"><?= separateNumber($total_per_jenis_transaksi - $total_transaksi_div_produksi) ?></td>                                 



<!-- Awal -->
<?php
$total_transaksi_div_produksi = 0;
                                foreach ($divisi as $d) :

                                    // Ambil Transaksi Berdasarkan Divisi
                                    $transaksi_berdasarkan_divisi = array_values(array_filter($transaksi_berdasarkan_jenis, function ($item) use ($d) {
                                        return $item->id_divisi == $d->kode_unit;
                                    }));

                                    //Ambil Nominal Dari Transaksi Terpilih
                                    $nominal = isset($transaksi_berdasarkan_divisi[0]) ? $transaksi_berdasarkan_divisi[0]->nominal_penerimaan_kas : 0;
                                    $data[] = $nominal;
                                    $total_transaksi_div_produksi += $nominal;
                                ?>
                                    <td class="text-right"><?= separateNumber($nominal) ?></td>
                                <?php endforeach; ?>

<!-- Akhir -->























                            </tr>

                        <?php endforeach; ?>

                        <!-- Total Per Jenis Arus Kas -->
                        <?php

                        //Transaksi Total
                        $transaksi_total_per_jenis = array_values(array_filter($data_laporan_arus_kas, function ($item) use ($j_arus_kas) {
                            return $item->id_divisi == 0 && $item->nama_jenis_arus_kas == $j_arus_kas;
                        }));

                        //Total Per Jenis Arus Kas
                        $total_per_jenis_arus_kas = array_sum(array_column($transaksi_total_per_jenis, "nominal_penerimaan_kas"));

                        ?>
                        <tr>
                            <td><b>Total dari <?= $j_arus_kas ?></b></td>
                            <td><b><span style="float: right"><?= separateNumber($total_per_jenis_arus_kas) ?></span></b></td>
                            
                            <?php
                             $total_transaksi_div_produksi = 0;
                            foreach ($divisi as $d) :

                                // Ambil Transaksi Berdasarkan Divisi & Jenis Arus Kas
                                $transaksi_berdasarkan_divisi = array_values(array_filter($data_laporan_arus_kas, function ($item) use ($d, $j_arus_kas) {
                                    return $item->id_divisi == $d->kode_unit && $item->nama_jenis_arus_kas == $j_arus_kas;
                                }));

                                //Ambil Nominal Dari Transaksi Terpilih
                                $nominal = array_sum(array_column($transaksi_berdasarkan_divisi, "nominal_penerimaan_kas"));

                                $total_transaksi_div_produksi += $nominal;
                            ?>
                                
                                
                            <?php endforeach; ?>
                            <td class="text-right"><b><?= separateNumber($total_per_jenis_arus_kas - $total_transaksi_div_produksi) ?></b></td>



<!-- Awal -->
<?php 
$total_transaksi_div_produksi = 0;
                            foreach ($divisi as $d) :

                                // Ambil Transaksi Berdasarkan Divisi & Jenis Arus Kas
                                $transaksi_berdasarkan_divisi = array_values(array_filter($data_laporan_arus_kas, function ($item) use ($d, $j_arus_kas) {
                                    return $item->id_divisi == $d->kode_unit && $item->nama_jenis_arus_kas == $j_arus_kas;
                                }));

                                //Ambil Nominal Dari Transaksi Terpilih
                                $nominal = array_sum(array_column($transaksi_berdasarkan_divisi, "nominal_penerimaan_kas"));

                                $total_transaksi_div_produksi += $nominal;
                            ?>
                                
                                <td class="text-right"><b><?= separateNumber($nominal) ?></b></td>
                            <?php endforeach; ?>

<!-- Akhir -->









                        </tr>

                        <!-- Break Line -->
                        <tr>
                            <td colspan="<?= count($divisi) + 3 ?>">&nbsp;</td>
                        </tr>
                    </tbody>

                <?php endforeach; ?>

                <!-- Header Total Transaksi -->
                <thead class="thead-accent-primary">
                    <th class="text-left" colspan="<?= count($divisi) + 3 ?>">
                        <span class="ml-2">Total dari Semua Jenis Arus Kas</span>
                    </th>
                </thead>

                <tbody>
                    <tr>
                        <?php
                        //Transaksi Total
                        $transaksi_total = array_values(array_filter($data_laporan_arus_kas, function ($item) use ($j_arus_kas) {
                            return $item->id_divisi == 0;
                        }));

                        //Total
                        $total_nominal = array_sum(array_column($transaksi_total, "nominal_penerimaan_kas"));
                        ?>
                        <td><b>Total dari Semua Jenis Arus Kas</b></td>
                        
                        <td class="text-right"><b><?= separateNumber($total_nominal) ?></b></td>
                        <?php
                         $total_transaksi_div_produksi = 0;
                        foreach ($divisi as $d) :

                            // Ambil Transaksi Berdasarkan Divisi
                            $transaksi_berdasarkan_divisi = array_values(array_filter($data_laporan_arus_kas, function ($item) use ($d) {
                                return $item->id_divisi == $d->kode_unit;
                            }));

                            //Ambil Nominal Dari Transaksi Terpilih
                            $nominal = array_sum(array_column($transaksi_berdasarkan_divisi, "nominal_penerimaan_kas"));

                            $total_transaksi_div_produksi += $nominal;
                        ?>
                            
                        <?php endforeach; ?>
                        <td class="text-right"><b><?= separateNumber($total_nominal - $total_transaksi_div_produksi) ?></b></td>

<!-- Awal -->
<?php 
$total_transaksi_div_produksi = 0;
                        foreach ($divisi as $d) :

                            // Ambil Transaksi Berdasarkan Divisi
                            $transaksi_berdasarkan_divisi = array_values(array_filter($data_laporan_arus_kas, function ($item) use ($d) {
                                return $item->id_divisi == $d->kode_unit;
                            }));

                            //Ambil Nominal Dari Transaksi Terpilih
                            $nominal = array_sum(array_column($transaksi_berdasarkan_divisi, "nominal_penerimaan_kas"));

                            $total_transaksi_div_produksi += $nominal;
                        ?>
                            <td class="text-right"><b><?= separateNumber($nominal) ?></b></td>
                        <?php endforeach; ?>
                        



<!-- Akhir -->




                    </tr>
                </tbody>

            </table>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $('#search-laporan_penerimaan_kas').on('change', function(e) {
            $('#form-search-laporan_penerimaan_kas').submit();
        })

        $('.divisi-popover').popover({
            trigger: 'hover',
        })
    });
</script>
