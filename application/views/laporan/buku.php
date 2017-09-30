<?php $i = 0 ?>


<!--flash message-->
<?php $this->load->view('_partial/flash_message') ?>

<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>LAPORAN BUKU</h2>
                    </div>

                </div>

            </div>
            <div class="body">
                <div class="body table-responsive">
                    <?php if ($bukus) : ?>
                        <table id="tabel_biasa" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr><th>No</th>
                                <th>ISBN</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Jumlah</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($bukus as $judul): ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $judul->isbn ?></td>
                                    <td><?= $judul->judul_buku ?></td>
                                    <td><?= $judul->penulis ?></td>
                                    <td><?= $judul->penerbit ?></td>
                                    <td><?= $judul->jumlah ?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>


                        </table>
                    <?php else: ?>
                        <p>Tidak ada data Buku</p>
                    <?php endif ?>
                    <div class="row">
                        <!--    Button Create-->
                        <div class="col-xs-12">
                            <?= anchor("cetak-laporan-buku",'Cetak',['class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Cetak','target' => '_blank']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


