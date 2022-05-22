<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian PTSP</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/style.css') ?>">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/monitorcpr.css') ?>"> -->
    <style>
        .wrapper {
            display: flex;
            perspective: 900px;
        }

        span {
            display: inline-block;
            position: relative;
            font-size: 3vw;
            font-family: "Fredoka One", cursive;
            color: #f6ff6b;
            transition: all 0.5s;
            animation: rotate 10s ease-in infinite;
            animation-direction: alternate;
            letter-spacing: 0.5vw;
            -webkit-text-stroke: 1.5px #00AEEF;
        }

        @keyframes rotate {
            0% {
                transform: rotateY(90deg);
                text-shadow: 0 0 0 #963B60;
            }

            100% {
                transform: rotateY(0deg);
                text-shadow: 0.1em 0.1em 0.05em #F2E349;
            }
        }
    </style>
    <style>
        table.dataTable td {
            font-size: 2em;
            text-align: center;
        }

        table.dataTable thead th {
            text-align: center;
            font-size: 2em;
            color: white;
        }

        .container .card {
            width: 285px;
        }
    </style>
</head>

<body>
    <div class="logo-pa"></div>
    <div class="container monitor">
        <div class="card">
            <table id="dt_pengaduan" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="circle">Pengaduan dan Informasi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="card">
            <table id="dt_produk" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="circle">Pengambilan Produk</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="card">
            <table id="dt_ecourt" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="circle">Pojok<br>E-Court</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="card">
            <table id="dt_posbakum" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="circle">Posbakum<br>&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>        
    </div>
    <script src="<?php echo base_url('asset/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/DataTables/datatables.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            var dt_pengaduan;
            var dt_produk;
            var dt_ecourt;
            var dt_posbakum;
            dt_pengaduan = $("#dt_pengaduan").DataTable({
                ajax: {
                    url: "<?php echo base_url('c_antrian/antrian/pengaduan') ?>",
                    dataSrc: ""
                },
                columns: [{
                    data: "no"
                }],
                paging: false,
                ordering: false,
                info: false,
                searching: false,
                language: {
                    emptyTable: "Tidak ada antrian"
                }
            });
            dt_produk = $("#dt_produk").DataTable({
                ajax: {
                    url: "<?php echo base_url('c_antrian/antrian/pengambilan') ?>",
                    dataSrc: ""
                },
                columns: [{
                    data: "no"
                }],
                paging: false,
                ordering: false,
                info: false,
                searching: false,
                language: {
                    emptyTable: "Tidak ada antrian"
                }
            });
            dt_ecourt = $("#dt_ecourt").DataTable({
                ajax: {
                    url: "<?php echo base_url('c_antrian/antrian/ecourt') ?>",
                    dataSrc: ""
                },
                columns: [{
                    data: "no"
                }],
                paging: false,
                ordering: false,
                info: false,
                searching: false,
                language: {
                    emptyTable: "Tidak ada antrian"
                }
            });
            dt_posbakum = $("#dt_posbakum").DataTable({
                ajax: {
                    url: "<?php echo base_url('c_antrian/antrian/posbakum') ?>",
                    dataSrc: ""
                },
                columns: [{
                    data: "no"
                }],
                paging: false,
                ordering: false,
                info: false,
                searching: false,
                language: {
                    emptyTable: "Tidak ada antrian"
                }
            });
            setInterval(() => {
                dt_pengaduan.ajax.reload();
                dt_produk.ajax.reload();
                dt_ecourt.ajax.reload();
                dt_posbakum.ajax.reload();
            }, 10000);
        });
    </script>
</body>

</html>