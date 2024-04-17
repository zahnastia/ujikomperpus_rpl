<?php include '../app/views/templates/header.php'; $no = 1; ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card  bg-secondary">
              <div class="card-body">
              <a href="<?= urlTo('/peminjam/cetakpeminjam'); ?>" class="btn btn-success float-left">Cetak Peminjam</a>
                <table id="example1" class="table table-bordered table-striped bg-white">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Peminjam</th>
                    <th>Alamat Peminjam</th>
                    <th>Buku Yang di Pinjam</th>
                    <th>Tanggal di Kembalikan</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data as $k): ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $k['NamaLengkap']; ?></td>
                      <td><?= $k['Alamat']; ?></td>
                      <td><?= $k['Judul']; ?></td>
                      <td><?= $k['TanggalPengembalian']; ?></td>
                      <td><?= $k['StatusPeminjaman']; ?></td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
<?php include '../app/views/templates/footer.php'; ?>