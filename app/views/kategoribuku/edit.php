<?php include '../app/views/templates/header.php'; ?>
<div class="col-md-6">
  <div class="card card-primary">
    <div class="card-body  bg-teal">
      <form action="<?= urlTo('/kategoribuku/'.$data['KategoriID'].'/update'); ?>" method="post">
        <div class="form-group">
          <label for="NamaKategori">Nama Kategori</label>
          <input type="text" id="NamaKategori" 
          name="NamaKategori" 
          class="form-control" 
          value="<?= $data['NamaKategori']; ?>"
          required>
        </div>

        <div class="form-group">
          <a href="<?= urlTo('/kategoribuku'); ?>" class="btn btn-danger">Batal</a>
          <button type="submit" class="btn btn-primary float-right">Edit Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include '../app/views/templates/footer.php'; ?>