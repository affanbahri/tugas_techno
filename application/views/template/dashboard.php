
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?= $this->session->flashdata('message');?>
      <!-- Small boxes (Stat box) -->
      
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            
            <div class="inner">
            <center>
              <h3><?= $jns?></h3>

              <p>Jumlah Jenis Obat</p>
              </center>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('jenis_obat')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <center>
              <h3><?= $obt?></h3>

              <p>Jumlah Obat</p>
              </center>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('obat')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <center>
              <h3><?= $expired?></h3>

              <p>Jumlah Obat Expired</p>
              </center>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('obat')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <center>
              <h3><?= $no_expired?></h3>

              <p>Jumlah Obat Belum Expired</p>
              </center>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('obat')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <center>
              <h3><?= $user?></h3>

              <p>Jumlah User</p>
              </center>
            </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
            <a href="<?= base_url('user')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <center>
              <h3><?= $active?></h3>

              <p>Jumlah User Aktif</p>
              </center>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?= base_url('user')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            
            <div class="inner">
            <center>
              <h3><?= $no_active?></h3>

              <p>Jumlah User Belum Aktif</p>
              </center>
            </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
            <a href="<?= base_url('user')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      <!-- /.row -->
      <!-- Main row -->
      </div>
     
      <section class="contents">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <!-- <div class="box-header">
                    <h3 class="box-title"> Data Jenis Obat</h3>
                    
                  </div> -->
                  
                  <!-- /.box-header -->
                  <div class="box-body">
                  <!-- <a href="<?= base_url('jenis_obat/add') ?>" class="btn btn-primary ml-3">Tambah Data</a> -->
                    <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Jumlah Harga</th>
                            <th>Tanggal Expired</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($Obt as $o): ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $o['nama_obat']; ?></td>
                                <td><?= $o['satuan']; ?></td>
                                <td><?= $o['harga']; ?></td>
                                <td><?= $o['stok']; ?></td>
                                <td class="jumlahHarga"></td> <!-- Kolom "Jumlah Harga" diberi kelas CSS -->
                                <td><?= $o['tanggal_expired']; ?></td>
                            </tr>
                            <?php $i++; endforeach; ?>
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
          <script>
              // Fungsi untuk menghitung jumlah harga
            function hitungJumlahHarga() {
                const rows = document.querySelectorAll("#example2 tbody tr");
                rows.forEach(row => {
                    const harga = parseFloat(row.cells[3].textContent);
                    const stok = parseInt(row.cells[4].textContent);
                    const jumlahHarga = harga * stok;
                    row.querySelector(".jumlahHarga").textContent = Number.isInteger(jumlahHarga) ? jumlahHarga : jumlahHarga.toFixed(2);
                });
            }

            // Fungsi untuk mengurutkan berdasarkan tanggal expired
            function urutkanBerdasarkanExpired() {
                const tbody = document.querySelector("#example2 tbody");
                const rows = Array.from(tbody.rows);

                rows.sort((a, b) => {
                    const tanggalA = new Date(a.cells[6].textContent);
                    const tanggalB = new Date(b.cells[6].textContent);
                    return tanggalA - tanggalB;
                });

                // Hapus semua baris dari tbody
                while (tbody.firstChild) {
                    tbody.removeChild(tbody.firstChild);
                }

                // Tambahkan kembali baris-baris yang sudah diurutkan
                rows.forEach(row => tbody.appendChild(row));

                // Perbarui nomor urut setelah pengurutan
                let nomorUrut = 1;
                rows.forEach(row => {
                    row.cells[0].textContent = nomorUrut;
                    nomorUrut++;
                });
            }

            // Panggil fungsi hitungJumlahHarga saat halaman dimuat
            hitungJumlahHarga();

            // Panggil fungsi urutkanBerdasarkanExpired untuk mengurutkan saat halaman dimuat
            urutkanBerdasarkanExpired();
          </script>
       
      <!-- /.row (main row) -->

    </section>
    <!-- <div class="row">
        <div class="col-md-12">
          <ul class="timeline">
          <li>
              <i class="fa fa-video-camera bg-maroon"></i>

              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 5 days ago</span>

                <h3 class="timeline-header"><a href="#">Mr. Doe</a> shared a video</h3> -->

                <!-- <div class="timeline-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/plnfIj7dkJE?si=n_JWMfY6-mqJQVGy" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                  </div>
                </div> -->
                <!-- <div class="timeline-footer">
                  <a href="#" class="btn btn-xs bg-maroon">See comments</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div> -->
    <!-- /.content -->
  </div>
  