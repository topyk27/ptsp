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
            height: 70vh;
        }

        .modal-full {
            min-width: 100%;
            margin: 0;
            cursor: none;
        }

        .modal-full .modal-content {
            min-height: 100vh;
        }
        .modal-body {
            position: initial !important;
        }
        
    </style>

    <style>
        .hello {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-name: wave;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;
            font-family: "Righteous", cursive;
            -webkit-text-stroke-width: 3px;
            -webkit-text-stroke-color: black;
        }

        .hello:nth-of-type(1) {
            animation-duration: 2s;
            animation-delay: 0.55s;
        }

        .hello:nth-of-type(2) {
            animation-duration: 2s;
            animation-delay: 0.3s;
        }

        .hello:nth-of-type(3) {
            animation-duration: 2s;
            animation-delay: 0.05s;
        }

        .hello:nth-of-type(4) {
            animation-duration: 2s;
            animation-delay: -0.2s;
        }

        .nomor {
            font-size: 25vw;
        }

        .pengumuman {
            font-size: 10vw;
        }

        @keyframes wave {

            40%,
            50% {
                transform: translate(-50%, -65%) scale(1.05);
            }

            0%,
            90%,
            100% {
                transform: translate(-50%, -45%) scale(0.95);
            }
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
    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="hello" style="color: #7c4dff">27</div>
                    <div class="hello" style="color: #0091ea">27</div>
                    <div class="hello" style="color: #ff9100">27</div>
                    <div class="hello" style="color: #ff1744">27</div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('asset/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('asset/DataTables/datatables.min.js') ?>"></script>
    <script>
    function cek_panggilan()
    {
        let hello = $(".hello");
        let mdl = $('#myModal');
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('c_antrian/monitor_panggilan') ?>",
            dataType: "json",
            success: function(data)
            {
                if(data.length == 0)
                {
                    mdl.modal('hide');
                    console.log('pukung');
                }
                else
                {
                    hello.empty();
                    if(data[0]['layanan']=='pengumuman')
                    {
                        hello.append("PENGUMUMAN");
                        hello.removeClass("nomor").addClass("pengumuman");
                    }
                    else
                    {
                        hello.append(data[0]['no']);
                        hello.removeClass("pengumuman").addClass("nomor");
                    }
                    mdl.modal('show');
                    console.log('kejaba');
                }
            },
            error: function(err)
            {
                console.log(err);
            },
            complete: function()
            {
                setTimeout(() => {
                    cek_panggilan();
                }, 10000);
            }
        });
    }
    cek_panggilan();
    // $(".hello").append("wasu");
    // $(".hello").empty();
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