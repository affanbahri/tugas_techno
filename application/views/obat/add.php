<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
            <div class="box box-info">
            <div class="box-header with-border">
              <h2 class="box-title">Tambah Data</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Jenis obat</label>

                  <div class="col-sm-10">
                    <select class="form-control" id="id_jenis_obat" name="id_jenis_obat" >
                        <option value=""></option>
                        <?php foreach($jns as $j): ?>
                            <option value="<?= $j['id_jenis_obat'];?>"><?= $j['nama_jenis_obat'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('id_jenis_obat'); ?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" required>nama obat</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_obat" name="nama_obat" >
                    <small class="form-text text-danger"><?= form_error('nama_obat'); ?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">satuan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="satuan" name="satuan" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Harga obat</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="harga" name="harga" >
                    <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Stok</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="stok" name="stok" >
                    <small class="form-text text-danger"><?= form_error('stok'); ?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Expired</label>

                  <div class="col-sm-10">
                    <input type="date" class="form-control-datepicker" id="tanggal_expired" name="tanggal_expired" >
                    <small class="form-text text-danger"><?= form_error('tanggal_expired'); ?></small>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <a type="submit" href="<?= base_url('obat');?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        
        
    </div>
            </div>
    </section>
    
</div>