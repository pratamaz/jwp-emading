<?php
include('template/header.php');
include('config_query.php');

$db = new database();
$data_artikel = $db->tampil_data();


?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-8 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <h5 class="card-title text-primary">Selamat Datang Admin 🎉</h5>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="assets/admin/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="assets/admin/assets/illustrations/man-with-laptop-dark.png" data-app-light-img="assets/admin/assets/illustrations/man-with-laptop-light.png" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="py-3 mb-4"><span class="text-muted fw-light">Manajemen /</span> Artikel</h4>
      <!-- Responsive Table -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            <div class="row">
              <div class="col-lg-6">
                <h5>Daftar Artikel</h5>
              </div>
              <div class="col-lg-6">
                <div class="float-end">
                  <a href="tambah_data.php" class="btn btn-primary">
                    <i class="bx bx-plus"></i>
                    Tambah Data
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr class="text-nowrap">
                  <th class="text-center bg-primary text-white">No</th>
                  <th class="text-center bg-primary text-white">Gambar Header</th>
                  <th class="text-center bg-primary text-white">Judul Artikel</th>
                  <th class="text-center bg-primary text-white">Status Publish</th>
                  <th class="text-center bg-primary text-white">Tanggal Update</th>
                  <th class="text-center bg-primary text-white">Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <?php
                if($data_artikel == '0'){
                  echo '<tr><td>Data Tidak Tersedia</td></tr>';
                } else {
                  $no = 1;
                  foreach ($data_artikel as $row) {
                  ?>
                    <tr>
                      <th><?= $no++; ?></th>
                      <td><?= $row['header']; ?></td>
                      <td><?= $row['judul_artikel']; ?></td>
                      <td><?= $row['status_publish']; ?></td>
                      <td><?= $row['updated_at']; ?></td>
                      <td>
                        <a href="edit.php" class="btn btn-sm btn-warning">Ubah</a>
                        <a href="hapus.php" class="btn btn-sm btn-danger">Hapus</a>
                      </td>
                    </tr>
                  <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- / Content -->
    <?php
    include('template/footer.php');
    ?>