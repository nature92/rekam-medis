<div class="card mb-3">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" class='trigger-collapse' data-target='data-table' href="#" role="button">
                Tabel <?= ucwords(str_replace('_', ' ', $menu))  ?>
            </a>
        </div>
        <?php if ($hak_akses->can_create === 't') : ?>
            <div class="btn-actions-pane-right">
                <div class="nav">
                    <button class='btn btn-success' data-toggle="modal" data-target="#modalAdd">+ Tambah <?= toTitle($menu) ?></button>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="card-body table-responsive collapse show" id='data-table'>
        <table id="<?= $menu ?>" class="table nowrap table-striped table-bordered table-sm" width="100%">
            <thead>
                <tr>
                    <th width='10px'>No.</th>
                    <th>No. Perjanjian Kontrak</th>
                    <th>Tanggal PK</th>
                    <th>Tanggal Jatuh Tempo</th>
                    <th>Bank</th>
                    <th>File</th>
                    <th style='width:100px'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                ?>
                <?php foreach($pendanaan as $data){
                    echo"<tr>
                            <td><center>".$i."</center></td>
                            <td class='d-flex' style='flex-direction:row;justify-content:center'>".$data['nomor_perjanjian_kontrak']."</td>
                            <td><center>".date("m-d-Y", strtotime($data['tanggal_perjanjian_kontrak']))."</center></td>
                            <td><center>".date("m-d-Y", strtotime($data['tanggal_jatuh_tempo']))."</center></td>
                            <td><center>".$data['id_bank']."</center></td>                        
                            <td><center>
                                <a href=".base_URL()."assets/upload/trx_pendanaan/file_lampiran/".$data['file']." target='_blank'>".$data['file']."</a>
                                </center>
                            </td>
                            <td class='d-flex' style='flex-direction:row;justify-content:center'>                                
                                <a href='" . base_url() . "transaksi/Pendanaan/detail/".  ($data['uid']) . "' class='btn btn-sm btn-primary'>Detail</a>&nbsp;
                            </td>
                         </tr>";
                         $i++;
                } ?>
            </tbody>
            <!-- <button type='button' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#modalDetailPendanaan' onclick='showDetail(\"".$data['nomor_perjanjian_kontrak']."\")'>Detail</button>&nbsp; -->
        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#<?= $menu ?>').DataTable({
            scrollX: true,
            scrollCollapse: true,
            fixedColumns: {
                leftColumns: 1,
            },
        });
    });
</script>