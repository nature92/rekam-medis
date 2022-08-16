<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail <?= ucwords($menu) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart("Transaksi/Pendanaan/addPendanaan/") ?>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6 modal-input">
                        <label class="col-form-label">Nomor Perjanjian Kontrak</label>
                        <div id='input-nomor_perjanjian_kontrak'>
                            <input type="text" class="form-control" id="nomor_perjanjian_kontrak" name="nomor_perjanjian_kontrak" required> 
                        </div>
                    </div>
                    <div class="form-group col-md-6 modal-input">
                        <label class="col-form-label">Tanggal Perjanjian Kontrak</label>
                        <div id='input-tanggal_perjanjian_kontrak'>                            
                            <input type="date" class="tm form-control" id="tanggal_perjanjian_kontrak" data-date="" data-date-format="DD/MM/YYYY" placeholder="dd/mm/yyyy" name="tanggal_perjanjian_kontrak" value="<?php echo date("Y-m-d");?>" required>
                        </div>
                    </div>                    
                    <div class="form-group col-md-6 modal-input">
                        <label class="col-form-label">Bank</label>
                        <div id='input-id_bank'>
                            <select class="form-control" id='id_bank' name="id_bank" required>                            
                            <?php
                            echo '<option value="">PILIH BANK</option>';
                            foreach ($bank as $row) {
                                // if ($rowp->npp == $row->npp) {
                                    // echo "<option selected value='" . $rowp->npp . "' " . set_select('npp' . $id, $rowp->npp, (!empty($data) && $data == $rowp->npp ? TRUE : FALSE)) . ">" . $rowp->npp . " - " . $rowp->nama_lengkap . "</option>";
                                // } else {
                                    echo '<option value="' . $row->id_bank . '">' . $row->kode_bank . ' - ' . $row->nama_bank . '</option>';
                                // }
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6 modal-input">
                        <label class="col-form-label">Tanggal Jatuh Tempo</label>
                        <div id='input-tanggal_jatuh_tempo'>                            
                            <input type="date" class="tm form-control" id="tanggal_jatuh_tempo" data-date="" data-date-format="DD/MM/YYYY" placeholder="dd/mm/yyyy" name="tanggal_jatuh_tempo" value="<?php echo date("Y-m-d");?>" required>
                        </div>
                    </div>
                    <div class="form-group col-md-6 modal-input">
                        <label class="col-form-label">Upload File <?= ucwords($menu) ?> <i>maks (10mb)</i></label>                        
                        <input class='form-control' type="file" name='berkas' accept="application/pdf" required>
                    </div>
                    <div class="form-group col-md-6 modal-input">                        
                        <input type="hidden" class="form-control" id="total_project" name="total_project" value="<?php echo set_value('total_project'); ?>"/>
                    </div>
                    <div class="form-group col-md-6 modal-input">                        
                        <input type="text" class="form-control" id="uid" name="uid" value="<?php echo uniqid() ?>"/>
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
                                <tr id='pendanaan0'>
                                    <td>1</td>
                                    <td><select class="form-control" name="plafon0" required>                                                                       
                                            <?php
                                            echo '<option value="">---Pilih Plafon---</option>';
                                            foreach ($jenis_pendanaan as $row) {
                                                echo '<option value="' . $row->id_jenis_pendanaan . '">' . $row->nama_jenis_pendanaan . '</option>';
                                                
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><input type="text" name='nama_project0' placeholder='Nama Project' class="form-control" required/></td>
                                    <td><select class="form-control" name="currency0" required>
                                            <?php
                                            echo '<option value="">---Pilih Currency---</option>';
                                            foreach ($currency as $row) {
                                                echo '<option value="' . $row->id_currency . '">' . $row->kode_currency . ' - ' . $row->nama_currency . '</option>';
                                            }
                                            ?>
                                        </select></td>                                   
                                    <td><input type="number" name='nilai0' placeholder='Nilai' class="form-control" min="0" required/></td>
                                    <td>
                                        <input type="file" name='evidence0' placeholder='Evidence' class='form-control' accept="application/pdf" required>
                                        <input type="hidden" name='id_project_uid0' class="form-control"/> </td>                                                                     
                                </tr>
                                <tr id='pendanaan1'></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a id="add_row" class="pull-left btn btn-success " style="color:white">Tambah Data</a>
                <a id='delete_row' class="pull-right btn btn-danger" style="color:white">Hapus Data</a>
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

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script> -->
<script>
    
    $(".tm").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD").format( this.getAttribute("data-date-format") )
    )
    }).trigger("change")


</script>
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
    // function previewGambarTambah(input) {
    //     const reader = new FileReader();
    //     reader.onload = (e) => {
    //         $('#gambar-tambah').attr('src', e.target.result)
    //     }

    //     reader.readAsDataURL(input.files[0]);
    // }
    $(document).ready(function(){
        
        var i=1;  
        $("input[name='id_project_uid0']").val(Math.random().toString(36).substring(2,7))
        $("input[name='total_project']").val(1);
        $("#add_row").click(function(){
            $('#pendanaan'+i).html("<td>"+ (i+1) +"</td>"+
                                            "<td><select class='form-control' name='plafon" + i + "' required><?php echo "<option value=''>---Pilih Plafon---</option>";
                                                    foreach ($jenis_pendanaan as $row) {
                                                        echo "<option value='" . $row->id_jenis_pendanaan . "'>" . $row->nama_jenis_pendanaan . " </option>";
                                                    }
                                                    ?> </select></td>"+
                                            "<td><input  name='nama_project"+i+"' type='text' placeholder='Nama Project'  class='form-control input-md' required></td>"+
                                            "<td><select class='form-control' name='currency" + i +"' required><?php echo "<option value=''>---Pilih Currency---</option>";
                                                    foreach ($currency as $row) {
                                                            echo "<option value='" . $row->id_currency . "'>" . $row->kode_currency . " - " . $row->nama_currency . "</option>";                                                       
                                                    }
                                                    ?></select></td>"+
                                            "<td><input  name='nilai"+i+"' type='number' min='0' placeholder='Nilai'  class='form-control input-md' required></td>"+
                                            // "<td><input  name='evidence"+i+"' type='text' placeholder='Evidence'  class='form-control input-md'>"+
                                            "<td>"+
                                                "<input type='file' name='evidence"+i+"' placeholder='Evidence' class='form-control' accept='application/pdf' required/>"+
                                            
                                                "<input  name='id_project_uid"+i+"' type='hidden' class='form-control input-md' value='"+Math.random().toString(36).substring(2,7)+"'></td>");
            // $('#pendanaan'+i).html("<td>"+ (i+1) +"</td><td><select class='form-control' name='plafon"+i+"'><option value='kmk'>KMK</option><option value='lcskbdn'>NCL (LC/SKBDN)</option><option value='bg'>NCL (BG)</option></select></td><td><input  name='nama_project"+i+"' type='text' placeholder='Nama Project'  class='form-control input-md'></td><td><input  name='currency"+i+"' type='text' placeholder='Currency'  class='form-control input-md'></td><td><input  name='nilai"+i+"' type='text' placeholder='Nilai'  class='form-control input-md'></td><td><input  name='evidence"+i+"' type='text' placeholder='Evidence'  class='form-control input-md'><input  name='id_project"+i+"' type='hidden' class='form-control input-md' value='"+Math.random().toString(36).substring(2,7)+"'></td>");            
            $('#tab_logic').append('<tr id="pendanaan'+(i+1)+'"></tr>');
            $("input[name='total_project']").val(i + 1);
            i++; 
        });
        $("#delete_row").click(function(){
            if(i>1){
            $("#pendanaan"+(i-1)).html('');
            $("input[name='total_project']").val($("input[name='total_project']").val() - 1);
            i--;
            }
        });


        var q=$("input[name='total_row']").val();         
         
        $("#tambah_data").click(function(){
            $('#detail_pendanaan'+parseInt(q)).html("<td>"+ (parseInt(q)+1) +"</td>"+
                                                                             "<td><select class='form-control' name='plafon" + parseInt(q) + "' required><?php echo "<option value=''>---Pilih Plafon---</option>";
                                                                                    foreach ($jenis_pendanaan as $row) {
                                                                                        echo "<option value='" . $row->id_jenis_pendanaan . "'>" . $row->nama_jenis_pendanaan . " </option>";
                                                                                    }
                                                                                    ?> </select></td>"+
                                                                             "<td><input  name='nama_project"+parseInt(q)+"' type='text' placeholder='Nama Project'  class='form-control input-md' required></td>"+
                                                                             "<td><select class='form-control' name='currency" + parseInt(q) +"' required><?php echo "<option value=''>---Pilih Currency---</option>";
                                                                                    foreach ($currency as $row) {
                                                                                            echo "<option value='" . $row->id_currency . "'>" . $row->kode_currency . " - " . $row->nama_currency . "</option>";                                                       
                                                                                    }
                                                                                    ?></select></td>"+
                                                                             "<td><input  name='nilai"+parseInt(q)+"' type='number' min='0' placeholder='Nilai'  class='form-control input-md' required></td>"+
                                                                             "<td>"+
                                                                                    "<input type='hidden' name='evidence"+parseInt(q)+"' id='evidence"+parseInt(q)+"' placeholder='Evidence' class='form-control'readonly/>"+
                                                                                    "<input type='file' name='berkas_evidence"+parseInt(q)+"' placeholder='Evidence' class='form-control' accept='application/pdf' required/>"+
                                                                                    
                                                                              "<input  name='id_project"+parseInt(q)+"' type='hidden' class='form-control input-md' value='"+Math.random().toString(36).substring(2,7)+"'></td>");
            
            $('#tab_logic').append('<tr id="detail_pendanaan'+(parseInt(q)+1)+'"></tr>');
            $("input[name='total_row']").val(parseInt(q) + 1);
            
            q++; 
        });
        $("#hapus_data").click(function(){
            if ($("input[name='total_row']").val() > $("input[name='jumlah_project']").val()) {
                if(parseInt(q)>1){
                    $("#detail_pendanaan"+(parseInt(q)-1)).html('');
                    $("input[name='total_row']").val($("input[name='total_row']").val() - 1);
                    q--;
                }
            } 
        });

    });

    $('.datepicker-single').daterangepicker({
        singleDatePicker: true,
        locale: {
            format: 'Y-MM-DD'
        }
    }).val('');
</script>

<?php if ($menu === 'user') { ?>
    <script>
        function getPersonil(npp) {
            npp.length == 0 && $('#nama_user-tambah').val('');
            const xml = new XMLHttpRequest();
            $('#npp-spinner').removeAttr('hidden');
            $('#password-tambah').removeAttr('disabled');
            $('#password-tambah').val('');
            $('#password-tambah').attr('type', 'password');

            if (npp.length > 0) {
                xml.open('GET', '<?= base_url() ?>master/getPersonil/' + npp);
                xml.send();
            }

            xml.onreadystatechange = () => {
                if (xml.readyState == 4 && xml.status == 200) {
                    const dataPersonil = JSON.parse(xml.response);

                    $('#npp-spinner').attr('hidden', 'hidden');
                    dataPersonil && $('#nama_user-tambah').val(dataPersonil.nama_lengkap);
                    dataPersonil.password === 'ada' && $('#password-tambah').attr('disabled', 'disabled') && $('#password-tambah').val('Password otomatis') && $('#password-tambah').attr('type', 'text');

                    $('#nama_user-tambah').keyup();
                    $('#password-tambah').keyup();
                }
            }
        }

        let nama_user_array = [];
        let npp_array = [];

        function getUser(nama_user) {
            if (!nama_user) return null;
            // if ($('.autocomplete-items').length) $('.autocomplete-items').remove();

            const xml = new XMLHttpRequest();
            xml.open('GET', '<?= base_url() ?>master/getNamaPersonil/' + encodeURI(nama_user));
            xml.send();

            nama_user_array = [];
            npp_array = [];
            xml.onreadystatechange = () => {
                if (xml.readyState == 4 && xml.status == 200) {

                    const dataPersonil = JSON.parse(xml.response);
                    dataPersonil.map(personil => {
                        nama_user_array.push(personil.nama_lengkap + (personil.div ? ' - ' + personil.div : ''));
                        npp_array.push(personil.npp);
                    })

                    autocomplete(document.getElementById("nama_user-tambah"), nama_user_array, npp_array);
                }
            }
        }
    </script>
<?php
}
?>