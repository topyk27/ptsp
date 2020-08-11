<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTSP</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/cpr.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/loader.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/cursor.css') ?>">
</head>
<body id="wrap">
    <div class="logo-pa"></div>
    <div class="container">
        <!-- <h1 class="setelan">SILAHKAN AMBIL NOMOR ANTRIAN</h1> -->
        <div class="card">
            <div class="circle">
                <h2>Pengaduan<br>dan<br>Informasi</h2>
            </div>
            <div class="content">
                <ul>
                    <li>Informasi Perkara</li>
                    <li>Informasi Pendaftaran</li>
                </ul>
                <div class="button">
                    <a href="#" onclick="ambil_antrian('pengaduan');">Ambil Antrian</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="circle">
                <h2>Pengambilan Produk</h2>
            </div>
            <div class="content">
                <ul>
                    <li>Pengambilan Akta Cerai</li>
                    <li>Pengambilan Salinan Putusan</li>
                    <li>Pengambilan Salinan Penetapan</li>
                </ul>
                <div class="button">
                    <a href="#" onclick="ambil_antrian('pengambilan');">Ambil Antrian</a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="circle">
                <h2>Pojok<br>E-Court</h2>
            </div>
            <div class="content">
                <ul>
                    <li>Informasi E-Court</li>
                    <li>Pendaftaran E-Court</li>
                </ul>
                <div class="button">
                    <a href="#" onclick="ambil_antrian('ecourt');">Ambil Antrian</a>
                </div>
            </div>
        </div>
        <!-- <div class="cpr">
            <ul class="c-rainbow">
                <li class="c-rainbow__layer c-rainbow__layer--white">Copyright &copy; Supir & Tukang Sapu 2020</li>
                <li class="c-rainbow__layer c-rainbow__layer--orange">Copyright &copy; Supir & Tukang Sapu 2020</li>
                <li class="c-rainbow__layer c-rainbow__layer--red">Copyright &copy; Supir & Tukang Sapu 2020</li>
                <li class="c-rainbow__layer c-rainbow__layer--violet">Copyright &copy; Supir & Tukang Sapu 2020</li>
                <li class="c-rainbow__layer c-rainbow__layer--blue">Copyright &copy; Supir & Tukang Sapu 2020</li>
                <li class="c-rainbow__layer c-rainbow__layer--green">Copyright &copy; Supir & Tukang Sapu 2020</li>
                <li class="c-rainbow__layer c-rainbow__layer--yellow">Copyright &copy; Supir & Tukang Sapu 2020</li>
            </ul>
        </div> -->
        <!-- modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalTitle"></h3>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                    <div class="modal-body">
                        <h5>Silahkan ambil struk nomor antrian anda.</h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->
    </div>
    <div class="loading" style="display: none;"></div>
    <div class="loader2" style="display:none;">
        <div class="scene" style="--hue: 260; --saturation: 53; --lightness: 67">
            <div class="word">
                <div class="letter__wrap" style="--index: 0">
                    <div class="letter" data-letter="L"><span class="letter__panel" aria-hidden="true">L</span><span class="letter__panel" aria-hidden="true">W</span><span class="letter__panel" aria-hidden="true">L</span><span class="letter__panel" aria-hidden="true">W</span><span class="letter__panel"></span></div>
                </div>
                <div class="letter__wrap" style="--index: 1">
                    <div class="letter" data-letter="o"><span class="letter__panel" aria-hidden="true">o</span><span class="letter__panel" aria-hidden="true">a</span><span class="letter__panel" aria-hidden="true">o</span><span class="letter__panel" aria-hidden="true">a</span><span class="letter__panel"></span></div>
                </div>
                <div class="letter__wrap" style="--index: 2">
                    <div class="letter" data-letter="a"><span class="letter__panel" aria-hidden="true">a</span><span class="letter__panel" aria-hidden="true">i</span><span class="letter__panel" aria-hidden="true">a</span><span class="letter__panel" aria-hidden="true">i</span><span class="letter__panel"></span></div>
                </div>
                <div class="letter__wrap" style="--index: 3">
                    <div class="letter" data-letter="d"><span class="letter__panel" aria-hidden="true">d</span><span class="letter__panel" aria-hidden="true">t</span><span class="letter__panel" aria-hidden="true">d</span><span class="letter__panel" aria-hidden="true">t</span><span class="letter__panel"></span></div>
                </div>
                <div class="letter__wrap" style="--index: 4">
                    <div class="letter" data-letter="i"><span class="letter__panel" aria-hidden="true">i</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel" aria-hidden="true">i</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel"></span></div>
                </div>
                <div class="letter__wrap" style="--index: 5">
                    <div class="letter" data-letter="n"><span class="letter__panel" aria-hidden="true">n</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel" aria-hidden="true">n</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel"></span></div>
                </div>
                <div class="letter__wrap" style="--index: 6">
                    <div class="letter" data-letter="g"><span class="letter__panel" aria-hidden="true">g</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel" aria-hidden="true">g</span><span class="letter__panel" aria-hidden="true">.</span><span class="letter__panel"></span></div>
                </div>
            </div>
        </div>
    </div>
    <!-- cursor -->
    <!-- <div id="wrap">
  <p>move the cursor around the screen</p>
    </div> -->
    <!-- end cursor -->
    <script src="<?php echo base_url('asset/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js') ?>"></script>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=6UoEN13s"></script>
    <script src="<?php echo base_url('asset/DataTables/datatables.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/js/antrian.js') ?>"></script>
    <script src="<?php echo base_url('asset/js/cursor.js') ?>"></script>
</body>
</html>