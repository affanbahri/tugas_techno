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
            <input type="hidden" name="id" value="<?= $user['id_user'];?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'];?>">
                    <small class="form-text text-danger"><?= form_error('username'); ?></small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $user['fullname'];?>">
                    <small class="form-text text-danger"><?= form_error('fullname'); ?></small>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="password" name="password" value="<?= $user['password'];?>">
                    <small class="form-text text-danger"><?= form_error('password'); ?></small>
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label" >Is Active</label>

                  <div class="col-sm-10">
                    <select name="is_active" id="is_active">
                    <option  value="Aktif" <?= ($user['is_active']=='Aktif')?'selected':'';?>>Aktif</option>
                    <option  value="Tidak Aktif" <?= ($user['is_active']=='Tidak Aktif')?'selected':'';?>>Tidak Aktif</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <a type="submit" href="<?= base_url('user');?>" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        
        
    </div>
            </div>
    </section>
    
</div>