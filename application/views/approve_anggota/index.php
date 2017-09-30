<?php
//Login?
$is_login = $this->session->userdata('is_login');
$i = 0;

?>

<!--flash message-->
<?php $this->load->view('_partial/flash_message') ?>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>APPROVE ANGGOTA</h2>
                    </div>

                </div>

            </div>
            <div class="body">
                <div class="body table-responsive">
                    <?php if ($approve_anggota) : ?>
                        <table id="tabel_kelas" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>No Induk</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>No Handphone</th>
                                <th>Kelas</th>
                                <th>Approve</th>
                                <th>Reject</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($approve_anggota as $anggota): ?>

                                <td><?= $anggota->username ?></td>
                                <td><?= $anggota->no_induk ?></td>
                                <td><?= $anggota->nama ?></td>
                                <td><?= $anggota->jenis_kelamin == 'p' ? 'Perempuan' : 'Laki - Laki'  ?></td>
                                <td><?= $anggota->no_hp ?></td>
                                <td><?= $anggota->nama_kelas ?></td>
                                <td><?= form_open("approve_anggota/approve/$anggota->id_user") ?>
                                    <?= form_hidden('id_user',$anggota->id_user) ?>
                                    <?= form_button(['type' => 'submit','content' => '<i class="material-icons">send</i>', 'class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Approve','onclick' => "return confirm('Anda yakin ?')"]) ?>
                                    <?= form_close() ?></td>
                                <td><?= form_open("approve_anggota/reject/$anggota->id_user") ?>
                                    <?= form_hidden('id_user',$anggota->id_user) ?>
                                    <?= form_button(['type' => 'submit','content' => '<i class="material-icons">clear</i>', 'class' => 'btn btn-danger waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Reject','onclick' => "return confirm('Anda yakin ?')"]) ?>
                                    <?= form_close() ?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>


                        </table>
                    <?php else: ?>
                        <p>Tidak ada data calon anggota baru</p>
                    <?php endif ?>
