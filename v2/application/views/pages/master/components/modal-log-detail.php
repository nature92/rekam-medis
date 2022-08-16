<div class="modal fade" id="modalLog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Log</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-sm">
                    <tr>
                        <th>User</th>
                        <th>IP Adress</th>
                        <th>Aksi</th>
                        <th>Waktu</th>
                    </tr>
                    <tr style='text-align:center'>
                        <td id='nama_user'></td>
                        <td id='ip_adress'></td>
                        <td id='mod_type'></td>
                        <td id='mod_date'></td>
                    </tr>
                </table>
                <div class='table-responsive'>
                    <table class="table table-striped table-bordered table-sm" id='table-log'>
                        <tr>
                            <th>NAMA KOLOM</th>
                            <th>OLD</th>
                            <th>NEW</th>
                        </tr>
                    </table>
                </div>
                <div class="modal-loader text-center" hidden='hidden'>
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    filterDateTime = (date) => {
        if (date === '-' || date === '') return date;
        const d = new Date(Date.parse(date));
        return d.getFullYear() + '-' + (d.getMonth() < 10 ? '0' : '') + d.getMonth() + '-' + (d.getDate() < 10 ? '0' : '') + d.getDate() + ' ' + (d.getHours() < 10 ? '0' : '') + d.getHours() + ':' + (d.getMinutes() < 10 ? '0' : '') + d.getMinutes();
    }

    filterData = (col, data) => {
        if (col === 'status') {
            return (data === 't' || data === 'true') ? 'Aktif' : "Tidak Aktif";
        } else if (col.includes('_date') || col.includes('tgl_')) {
            return data !== '-' && filterDateTime(data);
        } else {
            return data;
        }
    }

    $('#modalLog').on('show.bs.modal', function(event) {
        startLoader();
    })

    $('#modalLog').on('shown.bs.modal', function(event) {


        const button = $(event.relatedTarget)
        const modal = $(this)

        const id_data = button.data('main-id');
        const nama_user = button.data('nama-user');

        const logXml = new XMLHttpRequest();
        logXml.open('GET', '<?= base_url() ?>master/getDetail/log/' + id_data, false);
        logXml.send();

        const dataLog = JSON.parse(logXml.response);
        let foreign = [];

        <?php
        if (isset($foreign)) foreach (array_keys(($foreign)) as $fk) {
        ?>
            foreign['<?= $fk ?>'] = <?php
                                    echo '{';
                                    // print_r($foreign[$fk]);
                                    foreach ($foreign[$fk] as $item) {
                                        echo $item->id . " : '" . ($item->name) . "',";
                                    }
                                    echo '}';
                                    ?>;
        <?php
        }
        ?>

        // const thead = [];
        // const tdataOld = [];
        // const tdataNew = [];

        const tdataRow = [];
        const old_values = JSON.parse(dataLog.old_values);
        const new_values = JSON.parse(dataLog.new_values);

        // thead.push("<th>&nbsp</th>");
        // tdataOld.push("<th>Old</th>");
        // tdataNew.push("<th>New</th>");

        tdataRow.push($('#table-log').html());

        const oldCol = Object.keys(old_values);
        const oldVal = Object.values(old_values);
        const newCol = Object.keys(new_values);
        const newVal = Object.values(new_values);


        const datamap = oldCol[0] ? oldCol : newCol;

        datamap.map((col, i) => {
            if (
                !(i === 0 && dataLog.mod_type !== 'create') &&
                col !== 'password' &&
                !col.includes('created_') &&
                !col.includes('last_')
            ) {
                newVal[i] = (newVal[i] === null) || (newVal[i] === undefined) ? '-' : filterData(col, newVal[i]);
                oldVal[i] = (oldVal[i] === null) || (oldVal[i] === undefined) ? '-' : filterData(col, oldVal[i]);

                if (col.includes('id_') && foreign) {

                    if (oldVal[i] !== '-') {
                        const fk_table = col.replace('id_', '');
                        oldVal[i] = foreign[fk_table][oldVal[i]];
                    }

                    if (newVal[i] !== '-') {
                        const fk_table = col.replace('id_', '');
                        newVal[i] = foreign[fk_table][newVal[i]];
                    }
                }


                col = col.includes('id') ? col.replace('id', '') : col;
                col = col.includes('_') ? col.replace('_', ' ') : col;

                // thead.push("<th>" + col.replace('_', ' ').toUpperCase() + "</th>");
                // tdataOld.push("<td>" + oldVal[i] + "</td>");
                // tdataNew.push("<td>" + newVal[i] + "</td>");

                tdataRow.push("<tr> <th>" + col.replace('_', ' ').toUpperCase() + "</th> <td>" + oldVal[i] + "</td> <td>" + newVal[i] + "</td> </tr>")
            }
        });


        modal.find('#nama_user').html(nama_user.toUpperCase());
        modal.find('#ip_adress').html(dataLog.ip_address);
        modal.find('#mod_type').html(dataLog.mod_type.toUpperCase());
        modal.find('#mod_date').html(filterDateTime(dataLog.mod_date));

        // modal.find('#row-head').html(thead.join(''));
        // modal.find('#row-old').html(tdataOld.join(''));
        // modal.find('#row-new').html(tdataNew.join(''));

        modal.find('#table-log').html(tdataRow.join(''));

        finishLoader();

    });

    $('#modalLog').on('hidden.bs.modal', function(event) {
        $('#table-log').html(` <tr>
                            <th>NAMA KOLOM</th>
                            <th>OLD</th>
                            <th>NEW</th>
                        </tr>`);

    });
</script>