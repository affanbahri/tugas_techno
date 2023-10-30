<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
            <div class="box box-info">
            <div class="box-header with-border">
              <h2 class="box-title">Edit Data</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
                
              <div class="box-body">
              <input type="hidden" name="id" value="<?= $jns['id_jenis_obat'];?>">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis obat</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_jenis_obat" name="nama_jenis_obat" value="<?= $jns['nama_jenis_obat'];?>">
                    <small class="form-text text-danger"><?= form_error('nama_jenis_obat'); ?></small>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <a type="submit" href="<?= base_url('jenis_obat');?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        
        
    </div>
            </div>
    </section>
    
</div>