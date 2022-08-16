<button class='btn btn-primary' onclick="javascript:history.go(-1)">
    <i class="fa fa-arrow-left"></i> Kembali
</button>
<button class='btn btn-success' onclick="unlockEdit()" id="unlockedit">
    <i class="fa fa-unlock"></i> Edit
</button>
<button class='btn btn-danger' onclick="lockEdit()" id="lockedit">
    <i class="fa fa-lock"></i> Edit
</button>
<br><br>
<?= form_open_multipart('Transaksi/Pendanaan/editPendanaan/') ?>
<div class="card mb-3">
    
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <a data-toggle="collapse" href="#data-table" role="button">
                Detail Pendanaan
            </a>
        </div>
    </div>
    
    <div class="card-body table-responsive res-pad">
        <!-- <p>Data Per Tanggal : <?= convertRegularDate($tanggal) ?></p> -->        
        <div class="row">            
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">Nomor Perjanjian Kontrak</label>
                <div id='input-nomor_perjanjian_kontrak'>
                <?php 
                    foreach($header_pendanaan as $row) {                         
                ?>
                    <input type="text" class="form-control" id="nomor_perjanjian_kontrak" name="nomor_perjanjian_kontrak" value="<?php echo $row->nomor_perjanjian_kontrak; ?>" required> 
                <?php 
                } 
                ?>
                </div>
            </div>
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">Tanggal Perjanjian Kontrak</label>
                <div id='input-tanggal_perjanjian_kontrak'>
                <?php 
                    foreach($header_pendanaan as $row) {                         
                ?>
                    <!-- <input type="date" class="form-control" id="tanggal_perjanjian_kontrak" name="tanggal_perjanjian_kontrak" value="<?php echo $row->tanggal_perjanjian_kontrak?>">  -->
                    <input type="date" class="tm form-control" id="tanggal_perjanjian_kontrak" data-date="" data-date-format="DD/MM/YYYY" placeholder="dd/mm/yyyy" name="tanggal_perjanjian_kontrak" value="<?php echo $row->tanggal_perjanjian_kontrak?>" required>
                <?php 
                } 
                ?>
                </div>
            </div>
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">Bank</label>
                <div id='input-id_bank'>
                <!-- <?php 
                    foreach($header_pendanaan as $row) {                                                 
                ?>                                                    
                    <select class="form-control" id='id_bank' name="id_bank">         
                        <?php if ($row->id_bank == 'mandiri') {                         
                        ?>
                            <option value="mandiri" <?php echo set_select('id_bank', 'mandiri', (!empty($data) && $data == "mandiri" ? TRUE : FALSE)); ?> selected="selected">Mandiri</option>                            
                            <option value="bri">BRI</option>
                        <?php
                        } else if ($row->id_bank == 'bri') {
                        ?>
                            <option value="Mandiri">Mandiri</option>
                            <option value="bri" <?php echo set_select('id_bank', 'bri', (!empty($data) && $data == "bri" ? TRUE : FALSE)); ?> selected="selected">BRI</option>
                        <?php 
                        }
                        ?>
                    </select>
                <?php 
                }
                ?> -->
                <select class="form-control" id='id_bank' name="id_bank" required>         
                    <?php
                    echo '<option value="">PILIH BANK</option>';
                    foreach ($bank as $rowc) {
                        if ($rowc->id_bank == $row->id_bank) {
                            echo "<option selected value='" . $rowc->id_bank . "' " . set_select('id_bank', $rowc->id_bank, (!empty($data) && $data == $rowc->id_currency ? TRUE : FALSE)) . ">" . $rowc->kode_bank . " - " . $rowc->nama_bank . "</option>";
                        } else {
                            echo '<option value="' . $rowc->id_bank . '">' . $rowc->kode_bank . ' - ' . $rowc->nama_bank . '</option>';
                        }
                    }
                    ?>
                </select>
                </div>
            </div>
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">Tanggal Jatuh Tempo</label>
                <div id='input-tanggal_jatuh_tempo'>
                <?php 
                    foreach($header_pendanaan as $row) {                         
                ?>
                    <!-- <input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" value="<?php echo $row->tanggal_jatuh_tempo; ?>">  -->
                    <input type="date" class="tm form-control" id="tanggal_jatuh_tempo" data-date="" data-date-format="DD/MM/YYYY" placeholder="dd/mm/yyyy" name="tanggal_jatuh_tempo" value="<?php echo $row->tanggal_jatuh_tempo; ?>" required>
                <?php 
                }
                ?>
                </div>
            </div>
            <div class="form-group col-md-6 modal-input">
                <label class="col-form-label">File <?= ucwords($menu) ?> <i>maks (10mb)</i></label>        
                <a id="edit_link" href="#" onclick="showPDF();return false;"><i class="fa fa-paperclip"></i> Edit</a>
                <iframe src=" <?php echo base_url()?>assets/upload/trx_pendanaan/file_lampiran/<?php echo $row->file; ?>" width="470" height="300" id="file_preview"></iframe>
                <input class='form-control' type="file" name='berkas' accept="application/pdf" id="berkas"/>
            </div>    
            <div class="form-group col-md-6 modal-input">           
                <label class="col-form-label" id="nama_file">Nama File</label>             
                <input type="text" class="form-control" id="berkas_edit" name="berkas_edit" value="<?php echo $row->file; ?>" readonly/>
            </div>         
            <div class="form-group col-md-6 modal-input">                        
            <?php 
                foreach ($total_project as $key) {
            ?>
                <input type="hidden" class="form-control" id="total_row" name="total_row" value="<?php echo $key->jumlah_baris; ?>"/>
            <?php 
            }
            ?>
            </div>                    
            <div class="form-group col-md-6 modal-input">                        
                <input type="hidden" class="form-control" id="jumlah_project" name="jumlah_project" value="<?php echo count($detail_pendanaan); ?>"/>
            </div> 
            <div class="form-group col-md-6 modal-input">                        
                <input type="hidden" class="form-control" id="uid" name="uid" value="<?php echo $row->uid; ?>"/>
            </div> 
        </div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <table class="table table-bordered table-hover" id="tab_logic">
    
                    <thead>
                        <tr >
                            <th class="text-center">No</th>
                            <th class="text-center">Plafon</th>
                            <th class="text-center">Nama Project</th>
                            <th class="text-center">Currency</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Evidence</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $id = 0;
                    $no = 1;
                    foreach ($detail_pendanaan as $row) {   
                        ?>
                        <tr id='<?php echo 'detail_pendanaan'. $id; ?>'>
                            <td><?php echo $no; ?></td>
                            <td>
                                <select class="form-control" name="<?php echo 'plafon' . $id; ?>" id="<?php echo 'plafon' . $id; ?>" required>         
                                    <?php
                                    echo '<option value="">---Pilih Plafon---</option>';
                                    foreach ($jenis_pendanaan as $rowc) {
                                        if ($rowc->id_jenis_pendanaan == $row->id_jenis_pendanaan) {
                                            echo "<option selected value='" . $rowc->id_jenis_pendanaan . "' " . set_select('id_jenis_pendanaan' . $id, $rowc->id_jenis_pendanaan, (!empty($data) && $data == $rowc->id_jenis_pendanaan ? TRUE : FALSE)) . ">" . $rowc->nama_jenis_pendanaan . "</option>";
                                        } else {
                                            echo '<option value="' . $rowc->id_jenis_pendanaan . '">' . $rowc->nama_jenis_pendanaan . ' </option>';
                                        }
                                    }
                                    ?>  
                                </select>
                            </td>                            
                            <td><input type="text" name='<?php echo 'nama_project'. $id; ?>' id='<?php echo 'nama_project'. $id; ?>' placeholder='Nama Project' class="form-control" value="<?php echo $row->nama_project; ?>" required/></td>                                                        
                            <td><select class="form-control" name='<?php echo 'currency'. $id; ?>' id='<?php echo 'currency'. $id; ?>' required>
                                    <?php
                                    echo '<option value="">---Pilih Currency---</option>';
                                    foreach ($currency as $rowc) {
                                        if ($rowc->id_currency == $row->id_currency) {
                                            echo "<option selected value='" . $rowc->id_currency . "' " . set_select('currency' . $id, $rowc->id_currency, (!empty($data) && $data == $rowc->id_currency ? TRUE : FALSE)) . ">" . $rowc->kode_currency . " - " . $rowc->nama_currency . "</option>";
                                        } else {
                                            echo '<option value="' . $rowc->id_currency . '">' . $rowc->kode_currency . ' - ' . $rowc->nama_currency . '</option>';
                                        }
                                    }
                                    ?>
                                </select></td>
                            <td><input type="number" name='<?php echo 'nilai'. $id; ?>' id='<?php echo 'nilai'. $id; ?>' min="0" placeholder='Nilai' class="form-control" value="<?php echo $row->nilai; ?>" required/></td>
                            <td>                            
                            <input type="text" name='<?php echo 'evidence'. $id; ?>' id="<?php echo 'evidence'. $id; ?>" placeholder='Evidence' class="form-control" value="<?php echo $row->evidence; ?>" style="border:none;" readonly/>
                                <a id="<?php echo 'showpdf'. $id; ?>" href='<?php echo base_URL()."assets/upload/trx_pendanaan/evidence/".$row->evidence; ?>'' target='_blank' ><i class="fa fa-search"></i></a>                            
                                <a id="<?php echo 'edit_links'. $id; ?>" href="#" onclick="showEvidence(<?php echo 'evidence'. $id; ?>);return false;" ><i class="fa fa-paperclip"></i> Edit</a>                                
                                <input type="file" class='form-control'  name="<?php echo 'berkas_evidence'. $id; ?>" id="<?php echo 'berkas_evidence'. $id; ?>" accept="application/pdf" style="display:none;"/></td>
                            <input type="hidden" name='<?php echo 'id_project'. $id; ?>' class="form-control" value="<?php echo $row->id_project; ?>"/></td>
                        </tr>
                        <tr id='<?php echo 'detail_pendanaan'. $no; ?>'></tr>
                    <?php                    
                    $id++;
                    $no++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>        
        <a type="button" id="tambah_data" class="pull-left btn btn-success" style="color:white">Tambah Data</a>
        <a type="button" id='hapus_data' class="pull-right btn btn-danger" style="color:white">Hapus Data</a>
    </div>
</div>
    <div class="row">
        <div class="form-group col-md-6">
        <?php if ($hak_akses->can_create === 't') : ?>
            <button type="submit" id="submit_edit" class="btn btn-primary">Simpan</button>
        <?php endif; ?>
        </div>
    </div>
</form> 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2<input type="file" name="file" />
</script> -->
<style type="text/css">
    .tm {
        position: relative;
        width: 100%; 
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        color: white;
    }

    .tm:before {
        position: absolute;
        top: 3px; left: 3px;
        content: attr(data-date);
        display: inline-block;
        color: black;
    }

    .tm::-webkit-datetime-edit, .tm::-webkit-inner-spin-button, .tm::-webkit-clear-button {
        display: none;
    }

    .tm::-webkit-calendar-picker-indicator {
        position: absolute;
        top: 3px;
        right: 0;
        color: black;
        opacity: 1;
    }
</style>
<script>
    $(document).ready(function() {        
        $('#berkas').hide();                   
        document.getElementById("nomor_perjanjian_kontrak").disabled = true;
        document.getElementById("tanggal_perjanjian_kontrak").disabled = true;
        document.getElementById("id_bank").disabled = true;
        document.getElementById("tanggal_jatuh_tempo").disabled = true;
        $('#edit_link').hide();               
        $('#tambah_data').hide();       
        $('#hapus_data').hide();               
        $('#submit_edit').hide();       
        $('#lockedit').hide();     
        $('#unlockedit').show();          
        for (let index = 0; index < $('#jumlah_project').val(); index++) {            
            document.getElementById("plafon"+index).disabled = true;
            document.getElementById("nama_project"+index).disabled = true;
            document.getElementById("currency"+index).disabled = true;
            document.getElementById("nilai"+index).disabled = true;
            // $('#showpdf'+index).hide();               
            $('#edit_links'+index).hide();               
        }
    });
    function showPDF() {
        document.getElementById('file_preview').style.display = "none";
        $('#berkas').show();    
        // $('#berkas_edit').hide();
        $('#berkas_edit').val('').hide();
        $('#nama_file').hide();
    }
    function showEvidence(x) {                    
        $('#'+x.id).val('').hide();
        $('#showpdf'+x.id.substring(8, 9)).hide();
        $('#berkas_'+x.id).show();        
        for (let index = 0; index < $('#jumlah_project').val(); index++) {            
            document.getElementById("berkas_"+x.id).required = true;
        }   
    }
    function unlockEdit() {
        document.getElementById("nomor_perjanjian_kontrak").disabled = false;
        document.getElementById("tanggal_perjanjian_kontrak").disabled = false;
        document.getElementById("id_bank").disabled = false;
        document.getElementById("tanggal_jatuh_tempo").disabled = false;
        $('#edit_link').show();             
        $('#tambah_data').show();       
        $('#hapus_data').show();                        
        $('#submit_edit').show();     
        $('#lockedit').show();     
        $('#unlockedit').hide();  
        for (let index = 0; index < $('#jumlah_project').val(); index++) {            
            document.getElementById("plafon"+index).disabled = false;
            document.getElementById("nama_project"+index).disabled = false;
            document.getElementById("currency"+index).disabled = false;
            document.getElementById("nilai"+index).disabled = false;
            // $('#showpdf'+index).show();               
            $('#edit_links'+index).show();               
        }   
    }
    function lockEdit() {
        document.getElementById("nomor_perjanjian_kontrak").disabled = true;
        document.getElementById("tanggal_perjanjian_kontrak").disabled = true;
        document.getElementById("id_bank").disabled = true;
        document.getElementById("tanggal_jatuh_tempo").disabled = true;
        $('#edit_link').hide();       
        $('#tambah_data').hide();       
        $('#hapus_data').hide();       
        $('#edit_links').hide();               
        $('#submit_edit').hide();       
        $('#lockedit').hide();     
        $('#unlockedit').show();     
        for (let index = 0; index < $('#jumlah_project').val(); index++) {      
            document.getElementById("plafon"+index).disabled = true;
            document.getElementById("nama_project"+index).disabled = true;
            document.getElementById("currency"+index).disabled = true;
            document.getElementById("nilai"+index).disabled = true;      
            // $('#showpdf'+index).hide();               
            $('#edit_links'+index).hide();               
        }
    }
</script>