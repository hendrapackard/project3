<?php $i = 0 ?>


<!--flash message-->
<?php $this->load->view('_partial/flash_message') ?>

<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>LAPORAN ANGGOTA</h2>
                    </div>

                </div>

            </div>
            <div class="body">
                <div class="body table-responsive">
                    <?php if ($anggotas) : ?>
                        <table id="tabel_biasa" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr><th>No</th>
                                <th>Nama</th>
                                <th>No Induk</th>
                                <th>Jenis Kelamin</th>
                                <th>No Handphone</th>
                                <th>Kelas</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($anggotas as $anggota): ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $anggota->nama ?></td>
                                    <td><?= $anggota->no_induk ?></td>
                                    <td><?= $anggota->jenis_kelamin == 'p' ? 'Perempuan' : 'Laki - Laki' ?></td>
                                    <td><?= $anggota->no_hp ?></td>
                                    <td><?= $anggota->nama_kelas ?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>


                        </table>
                    <?php else: ?>
                        <p>Tidak ada data Anggota</p>
                    <?php endif ?>
                    <div class="row">
                        <!--    Button Create-->
                        <div class="col-xs-12">
                            <?= anchor("cetak-laporan-anggota",'Cetak',['class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Cetak','target' => '_blank']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


