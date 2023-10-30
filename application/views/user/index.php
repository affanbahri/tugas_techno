<div class="content-wrapper">
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Data User</h3>
              
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
            <!-- <?= $this->session->flashdata('message');?> -->
            <a href="<?= base_url('user/add');?>" class="btn btn-primary " style="margin-bottom: 10px;">Tambah Data</a>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id User</th>
                        <th>Username</th>
                        <th>Fullname</th>
                        <th>Password</th>
                        <th>Is Active</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php foreach($usr as $u):?>
                    <tr>
                       <td><?= $u['id_user'];?></td>
                       <td><?= $u['username'];?></td>
                       <td><?= $u['fullname'];?></td>
                       <td><?= $u['password'];?></td>
                       <td style="text-align: center;"><?= $u['is_active'];?></td>
                        <td>
                        <a href="#" 
                          data-delete-url="<?= base_url();?>user/hapus/<?= $u['id_user'];?>" 
                          class="btn btn-danger"
                          onclick="deleteConfirm(this)">Delete</a>
                            <a href="<?= base_url();?>user/edit/<?= $u['id_user'];?>" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		function deleteConfirm(event){
			Swal.fire({
				title: 'Delete Confirmation!',
				text: 'Apakah anda yakin menghapus data ini ?',
				icon: 'warning',
				showCancelButton: true,
				cancelButtonText: 'No',
				confirmButtonText: 'Yes Delete',
				confirmButtonColor: 'red'
			}).then(dialog => {
				if(dialog.isConfirmed){
					window.location.assign(event.dataset.deleteUrl);
				}
			});
		}
	</script>

	<?php if($this->session->flashdata('message')): ?>
		<script>
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: '<?= $this->session->flashdata('message') ?>'
			})
		</script>
	<?php endif ?>