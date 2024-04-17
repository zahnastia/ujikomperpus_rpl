<?php include '../app/views/templates/header.php'; $no = 1; ?>
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-secondary">
                <a href="<?= urlTo('/buku/cetakbuku'); ?>" class="btn btn-success float-left">Cetak Laporan</a>
                <a href="<?= urlTo('/buku/create'); ?>" class="btn btn-primary float-right">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body bg-teal">
                <table id="example1" class="table table-bordered table-striped bg-white">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($data as $buku): ?>
                  	<tr>
                  		<td><?= $no; ?></td>
                  		<td><?= $buku['NamaKategori']; ?></td>
                  		<td><?= $buku['Judul']; ?></td>
                  		<td><?= $buku['Penulis']; ?></td>
                      <td>
                        <a 
                          href="<?= urlTo('/buku/'.$buku['BukuID'].'/edit') ?>"
                          class="btn btn-warning
                          ">
                          Edit
                        </a>
                        
                        <a 
                          href="<?= urlTo('/buku/'.$buku['BukuID'].'/delete') ?>"
                          class="btn btn-danger
                          ">
                          Delete
                        </a>
                        
                        <a 
                          href="<?= urlTo('/buku/'.$buku['BukuID'].'/ulasan') ?>"
                          class="btn btn-info
                          ">
                          Lihat Ulasan
                        </a>
                      </td>
                  	</tr>
                  	<?php $no++; ?>
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