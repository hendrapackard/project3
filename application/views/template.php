<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Aplikasi Perpustakaan | SMA Negeri 2 Cileungsi</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url();?>/adminbsb/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url();?>adminbsb/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url();?>adminbsb/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url();?>adminbsb/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?= base_url();?>adminbsb/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url();?>adminbsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?= base_url();?>adminbsb/css/style.css" rel="stylesheet">

    <link href="<?= base_url();?>adminbsb/css/smandu.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url();?>adminbsb/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-teal">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>-
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?= base_url() ?>">Perpustakaan SMAN 2 Cileungsi</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <?php $this->load->view('sidebar') ?>
    <!-- #END# Left Sidebar -->

</section>

<section class="content">
    <?php $this->load->view($main_view) ?>
</section>

<!-- Jquery Core Js -->
<script src="<?= base_url();?>adminbsb/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url();?>adminbsb/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Input Mask Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/node-waves/waves.js"></script>

<!-- Autosize Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url();?>adminbsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url();?>adminbsb/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?= base_url();?>adminbsb/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?= base_url();?>adminbsb/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?= base_url();?>adminbsb/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?= base_url();?>adminbsb/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?= base_url();?>adminbsb/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?= base_url();?>adminbsb/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<script src="<?= base_url();?>adminbsb/plugins/hightcharts/code/highcharts.js"></script>

<!-- Custom Js -->
<script src="<?= base_url();?>adminbsb/js/admin.js"></script>

<!-- Demo Js -->
<script src="<?= base_url();?>adminbsb/js/demo.js"></script>
<script src="<?= base_url();?>adminbsb/js/pages/ui/tooltips-popovers.js"></script>
<script src="<?= base_url();?>adminbsb/js/smandu.js"></script>

<script type="text/javascript">
    $(function () {
        $('#graf').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Data Kelas Yang Meminjam Buku'
            },
            subtitle: {
                text: 'Tahun <?php echo date('Y') ?>'
            },

            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Persentase Peminjaman',
                data: [
                    <?php
                    // data yang diambil dari database
                    if(count($grafiks)>0)
                    {
                        foreach ($grafiks as $grafik) {
                            echo "['" .$grafik->kelas . "'," . $grafik->jumlah ."],\n";
                        }
                    }
                    ?>
                ]
            }]
        });

        //Diagram batang
        var chart = Highcharts.chart('graf2', {

            title: {
                text: 'Top 10 Judul Buku Yang Dipinjam '
            },

            subtitle: {
                text: 'Tahun <?php echo date('Y') ?>'
            },

            xAxis: {
                categories: [<?php
                    // data yang diambil dari database
                    if(count($grafik2)>0)
                    {
                        foreach ($grafik2 as $grafik) {
                            echo "['" .$grafik->judul ."'],\n";
                        }
                    }
                    ?>]
            },
            yAxis: {

                title: {
                    text: 'Jumlah'
                }
            },

            series: [{
                type: 'column',
                name: 'Jumlah',
                colorByPoint: true,
                data: [<?php
                    // data yang diambil dari database
                    if(count($grafik2)>0)
                    {
                        foreach ($grafik2 as $grafik) {
                            echo "['" .$grafik->judul . "'," . $grafik->jumlah ."],\n";
                        }
                    }
                    ?>],
                showInLegend: false
            }]

        });



    });

</script>
</body>

</html>