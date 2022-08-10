<div class="modal fade" id="modalDetailPendanaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah <?= ucwords($menu) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('Action/editDetail/' . $menu . '/' . $user['id_user']) ?>
            <?= form_open_multipart("Transaksi/Pendanaan/addPendanaan/") ?>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6 modal-input">
                        <label class="col-form-label">Nomor Perjanjian Kontrak</label>
                        <div id='input-nomor_perjanjian_kontrak'>
                            <input type="text" class="form-control" id="nomor_perjanjian_kontrak" name="nomor_perjanjian_kontrak"> 
                        </div>
                    </div>
                    <div class="form-group col-md-6 modal-input">
                        <label class="col-form-label">Tanggal Perjanjian Kontrak</label>
                        <div id='input-tanggal_perjanjian_kontrak'>
                            <input type="date" class="form-control" id="tanggal_perjanjian_kontrak" name="tanggal_perjanjian_kontrak"> 
                        </div>
                    </div>
                    <div class="form-group col-md-6 modal-input">
                        <label class="col-form-label">Bank</label>
                        <div id='input-id_bank'>
                            <select class="form-control" id='id_bank' name="id_bank">                            
                                <option value="mandiri">Mandiri</option>
                                <option value="bri">BRI</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6 modal-input">
                        <label class="col-form-label">Tanggal Jatuh Tempo</label>
                        <div id='input-tanggal_jatuh_tempo'>
                            <input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo"> 
                        </div>
                    </div>
                    <div class="form-group col-md-6 modal-input">
                        <label class="col-form-label">Upload File <?= ucwords($menu) ?> (Opsional)</label>                        
                        <input class='form-control' type="file" name='file-pdf' accept="application/pdf"'>
                    </div>
                    <div class="form-group col-md-6 modal-input">                        
                        <input type="hidden" class="form-control" id="total_project" name="total_project" value="<?php echo set_value('total_project'); ?>"/>
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
                            <tbody id="detail_pendanaan">
                            </tbody>
                            <!-- <tbody>
                                <tr id='addr0'>
                                    <td>1</td>
                                    <td><select class="form-control" name="plafon0">                            
                                            <option value="kmk">KMK</option>
                                            <option value="lcskbdn">NCL (LC/SKBDN)</option>
                                            <option value="bg">NCL (BG)</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name='nama_project0' placeholder='Nama Project' class="form-control"/></td>
                                    <td><input type="text" name='currency0' placeholder='Currency' class="form-control"/></td>
                                    <td><input type="text" name='nilai0' placeholder='Nilai' class="form-control"/></td>
                                    <td><input type="text" name='evidence0' placeholder='Evidence' class="form-control"/></td>
                                </tr>
                                <tr id='addr1'></tr>
                            </tbody> -->
                        </table>
                    </div>
                </div>
                <a id="add_row" class="btn btn-default pull-left">Tambah Data</a><a id='delete_row' class="pull-right btn btn-default">Hapus Data</a>
            </div>
            <div class="modal-footer">

                <?php if ($hak_akses->can_update === 't') : ?>
                    <button type="button" class="btn btn-success" id='edit' onclick='handleDisabled()'>Edit</button>
                    <button type="submit" class="btn btn-success" id='simpan' hidden>Simpan</button>
                <?php endif; ?>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>

<script>
    var detailTable;
    function showDetail(e) {
        // mainTable.destroy();                  
        $.post("<?php echo site_url('Transaksi/Pendanaan/getPendanaanDetail'); ?>", {'nomor_perjanjian_kontrak': e})
            .done(function (data) {
                var body = "";
                data = JSON.parse(data);
                var g = 1;
                var h = 0;
                $('#nomor_perjanjian_kontrak').html(data[0].nomor_perjanjian_kontrak);
                for (var k in data) {
                    body += "<tr><td>" + g
                        +"</td><td><select class='form-control' name='plafon"+h+"'><option value='" + data[k]['plafon']+ "'>" + data[k]['plafon'] + "</option></select>"  
                        +"</td><td><input type='text' id='nama_project"+h+"' name='nama_project"+h+"' class='form-control' value='"+data[k]['nama_project']+"'/>"
                        +"</td><td><input type='text' id='currency"+h+"' name='currency"+h+"' class='form-control' value='"+data[k]['currency']+"'/>"
                        +"</td><td><input type='text' id='nilai"+h+"' name='nilai"+h+"' class='form-control' value='"+data[k]['nilai']+"'/>"
                        +"</td><td><input type='text' id='evidence"+h+"' name='evidence"+h+"' class='form-control' value='"+data[k]['evidence']+"'/>" 
                        +"</td></tr>";
                        g++;
                        h++;
                }
                //                    console.log(body);
                // if (detailTable) {
                //     detailTable.destroy();
                // }
                $('#detail_pendanaan').html(body);
                // $('#myModal').modal('show');
                // detailTable = $("#pendanaan").DataTable({});
                $("#<?= $menu ?>").DataTable({});
            });
        // $.post("<?php echo site_url('Transaksi/Pendanaan/transaksiLembur/getLampiranDasarSPKL'); ?>", {'id_transaksi': e})
        //     .done(function (data) {
        //         // alert(data);
        //         data = JSON.parse(data);
        //         $('#dasar_modal').html(data['dasar_spkl']);
        //         $('#lampiran_modal').html(data['lampiran']);
        //         // $('#id_trsk_modal').html(data['id_transaksi']);
        //         $('#id_trsk_modal').val(data['id_transaksi']);
        //         $('#no_trsk_modal').html(data['no_transaksi']);
        //         $('#tgl_trsk_modal').html(data['tanggal_transaksi']);
        //         var delegasi = $('select[name="delegasi"]').val();
        //         $('#print_lpkl').attr('onclick', 'location.href = \'<?php echo base_url(); ?>index.php/Transaksi/Pendanaan/transaksiLembur/cetakLPKLExcel/' + data['id_transaksi'] + '/' + delegasi + '\'');
        //         // $('#myModal').modal('show');
        //     });
        // $('#myModal').modal({backdrop: 'static', keyboard: false});
        // mainTable = $("#tabel_pengajuan").DataTable({"order": [[0, "desc"]]});
    }
        
    
    function handleDisabled() {
        $('#modalDetail input, #modalDetail select, #modalDetail textarea').removeAttr('disabled');
        $('#modalDetail #simpan').removeAttr('hidden');
        $('#modalDetail #edit').attr('hidden', 'hidden');

        //Exception
        const except = ['npp'];

        except.map((col) => {
            $('#' + col + '-ubah').attr('disabled', 'disabled');
        })
    }

    $('#modalDetail').on('hidden.bs.modal', function(event) {
        $('#modalDetail input, #modalDetail select, #modalDetail textarea').attr('disabled', 'disabled');
        $('#modalDetail #simpan').attr('hidden', 'hidden');
        $('#modalDetail #edit').removeAttr('hidden');

        $('#modalDetail .input-error').html('');
    })

    let id = '';
    $('#modalDetail input, #modalDetail select, #modalDetail textarea').attr('disabled', 'disabled');
    $('#modalDetail').on('show.bs.modal', function(event) {

        const xml = new XMLHttpRequest();
        const button = $(event.relatedTarget);
        const modal = $(this);

        id = button.data('main-id');

        xml.open('GET', '<?= base_url() ?>master/getDetail/<?= $menu ?>/' + id, false);
        xml.send();

        const data = JSON.parse(xml.response);

        Object.keys(data).map((col, index) => {
            const browser = "<?= $this->agent->browser() ?>";
            let value = data[col];
            modal.find('#' + col + '-ubah').val(value);

            // Color Picker
            col.includes('warna') && modal.find('#' + col + '-ubah').css('background', "linear-gradient(to right, " + value + " 0%, " + value + " 30px, rgba(0, 0, 0, 0) 31px, rgba(0, 0, 0, 0) 100%)");

            // Datepicker
            value && value.match(/T\d{2}:\d{2}/) && (value = value.replace(/T\d{2}:\d{2}/, '')) && modal.find('#' + col + '-ubah').val(value);

        })
        modal.find('#id').val(data['id_<?= $menu ?>']);


        i = 0;
        modal.find('#gambar-ubah').attr('src', '<?= base_url() ?>assets/upload/mst_<?= $menu ?>/img/' + id + '.' + allowed[i] + '?now=<?= date('YmdHis') ?>');

    })

    const allowed = ['png'];
    let i = 0;

    function changeImg() {
        if (i < allowed.length) {
            $('#gambar-ubah').attr('src', '<?= base_url() ?>assets/upload/mst_<?= $menu ?>/img/' + id + '.' + allowed[i] + '?now=<?= date('YmdHis') ?>');
            i++;
        }
    }

    function previewGambarUbah(input) {
        const reader = new FileReader();
        reader.onload = (e) => {
            $('#gambar-ubah').attr('src', e.target.result)
        }

        reader.readAsDataURL(input.files[0]);
    }
</script>