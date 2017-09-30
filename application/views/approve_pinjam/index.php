<?php
//Login?
$is_login = $this->session->userdata('is_login');
$i = 0;
$keywords = $this->input->get('keywords');

?>

<!--flash message-->
<?php $this->load->view('_partial/flash_message') ?>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>APPROVE PEMINJAMAN</h2>
                    </div>

                </div>

            </div>
            <div class="body">
                <div class="body table-responsive">
                    <?php if ($approve_pinjam) : ?>
                        <table id="tabel_kelas" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Kode Peminjaman</th>
                                <th>No Induk</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Kode Buku</th>
                                <th>Judul</th>
                                <th>Approve</th>
                                <th>Reject</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($approve_pinjam as $pinjam): ?>

                                <td><?= date('d-m-Y', strtotime($pinjam->tanggal_pinjam )) ?></td>
                                <td><?= $pinjam->kode_pinjam ?></td>
                                <td><?= $pinjam->no_induk ?></td>
                                <td><?= $pinjam->nama ?></td>
                                <td><?= $pinjam->nama_kelas ?></td>
                                <td><?= $pinjam->kode_buku ?></td>
                                <td><?= $pinjam->judul_buku ?></td>
                                <td><?= form_open("approve_pinjam/approve/$pinjam->id_pinjam") ?>
                                    <?= form_hidden('id_pinjam',$pinjam->id_pinjam) ?>
                                    <?= form_button(['type' => 'submit','content' => '<i class="material-icons">send</i>', 'class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Approve','onclick' => "return confirm('Anda yakin ?')"]) ?>
                                    <?= form_close() ?></td>
                                <td><?= form_open("approve_pinjam/reject/$pinjam->id_pinjam") ?>
                                    <?= form_hidden('id_pinjam',$pinjam->id_pinjam) ?>
                                    <?= form_button(['type' => 'submit','content' => '<i class="material-icons">clear</i>', 'class' => 'btn btn-danger waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Reject','onclick' => "return confirm('Anda yakin ?')"]) ?>
                                    <?= form_close() ?></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>


                        </table>
                    <?php else: ?>
                        <p>Tidak ada data peminjaman</p>
                    <?php endif ?>
