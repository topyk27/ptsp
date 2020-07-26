<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo SITE_NAME . ": " . ucfirst($this->uri->segment(1)) . " - " . ucfirst($this->uri->segment(2)); ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.min.css') ?>">
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/fontawesome-free-5.8.1-web/css/all.css') ?>"> -->
</head>
<body>
    <div class="container">
        <h2>Tambah User</h2>
        <div class="container-fluid">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group form-inline">
                    <label for="nama" class="col-md-2">Nama</label>
                    <input class="form-control col-md-12 <?php echo form_error('nama') ? 'is-invalid':'' ?>" type="text" name="nama" placeholder="Nama" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('no_antrian') ?>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label for="username" class="col-md-2">Username</label>
                    <input class="form-control col-md-12 <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username" placeholder="Username" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('username') ?>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label for="password" class="col-md-2">Password</label>
                    <input class="form-control col-md-12 <?php echo form_error('password') ? 'is-invalid':'' ?>" type="password" name="password" placeholder="Password" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('password') ?>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label for="layanan" class="col-md-2">Layanan</label>
                    <select name="layanan"class="custom-select <?php echo form_error('username') ? 'is-invalid':'' ?>">
                        <option value="A">Pengaduan</option>
                        <option value="B">Pendaftaran</option>
                        <option value="C">Pengambilan Produk</option>
                        <option value="D">Pendaftaran E-Court</option>
                        <option value="E">Kasir</option>
                        <option value="F">POSBAKUM</option>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo form_error('layanan') ?>
                    </div>
                </div>
                <div class="kanan">
                    <input type="submit" class="btn btn-success mr-1" value="Submit">
                    <input type="button" class="btn btn-danger mr-1" value="Batal" onclick="location.href='<?php echo site_url('c_jadwal/'); ?>'">
                </div>
            </form>
        </div>
    </div>
</body>
</html>