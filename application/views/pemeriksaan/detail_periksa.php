
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
    
 
               <form action="<?= base_url('pemeriksaan/tambah_aksi'); ?>" method="post">
                <?php foreach ($pasien as $u) { ?>
              
                 <?php } ?>
       
        </form>
      </div>

              </div>
              <div class="box box-success">
           <div class="box-header">
              <h3 class="box-title">Data Pemeriksaan</h3>
            </div>
           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped ">
                     <thead>
                    <tr>
                      <th>No.</th>
                      <th>Tanggal</th>
                      <th>Kode Pemeriksaan</th>
                      <th>Diagnosa</th>
                      <th>Keluhan</th>
                      <th>Tindakan</th>                   
                     <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                          $no_rm = 1;
                          foreach($pemeriksaan as $r) {
                     ?> 
                     <tr>
                      <td><?= $no_rm ++ ?></td>
                      <td><?= $r->tanggal ?></td>
                      <td><?= $r->id_periksa ?></td>
                      <td><?= $r->diagnosa ?></td> 
                      <td><?= $r->keluhan ?></td>
                      <td><?= $r->tindakan ?></td>

                      <td>
                        
                        <a href="<?= base_url('pemeriksaan/hapus/'.$r->id_periksa) ?>" class="btn btn-danger float-right" onclick="return confirm('yakin dok, mau dihapus?');">Hapus</a>  
            
                      </td>
                      
                        
                      
                    
                    </tr> 
                     <?php } ?>
                  </tbody>
                                      
                </table>
            </div>
        </div>
    </div>
          	 
				
            	</div>
            	
            </div>
        </div>
    </div>
</div>
