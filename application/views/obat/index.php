<div class="content-wrapper">
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Data Obat</h3>
              
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
                <!-- <?= $this->session->flashdata('message');?> -->
            <a href="<?= base_url('obat/add');?>" class="btn btn-primary " style="margin-bottom: 10px;">Tambah Data</a>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id Obat</th>
                        <th>Jenis Obat</th>
                        <th>Nama Obat</th>
                        <th>satuan</th>
                        <th>Harga</th>
                        <th>Stok </th>
                        <th>Tanggal Expired</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($Obt as $o):?>
                    <tr>
                        <td><?= $o['id_obat'];?></td>
                        <td><?= $o['nama_jenis_obat'];?></td>
                        <td><?= $o['nama_obat'];?></td>
                        <td><?= $o['satuan'];?></td>
                        <td>Rp. <?= number_format($o['harga']);?></td>
                        <td><?= $o['stok'];?></td>
                        <td><?= $o['tanggal_expired'];?></td>
                        <td>
                        <a href="#" 
                          data-delete-url="<?= base_url();?>obat/hapus/<?= $o['id_obat'];?>" 
                          class="btn btn-danger"
                          onclick="deleteConfirm(this)">Delete</a>
                            <a href="<?= base_url();?>obat/edit/<?= $o['id_obat'];?>" class="btn btn-primary">Edit</a>
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