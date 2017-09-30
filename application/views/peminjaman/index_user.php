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
                        <h2>PEMINJAMAN</h2>
                    </div>

                </div>

            </div>
            <div class="body">
                <div class="body table-responsive">
                    <?php if ($peminjaman) : ?>
                        <table id="tabel_kelas" class="table table-bordered table-striped table-hover tabel-pin dataTable">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jadwal Kembali</th>
                                <th>Kode Peminjaman</th>
                                <th>No Induk</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Kode Buku</th>
                                <th>Judul</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($peminjaman as $pinjam): ?>

                                <td><?= date('d-m-Y', strtotime($pinjam->tanggal_pinjam )) ?></td>
                                <td><?= date('d-m-Y', strtotime($pinjam->kembali)) ?></td>
                                <td><?= $pinjam->kode_pinjam ?></td>
                                <td><?= $pinjam->no_induk ?></td>
                                <td><?= $pinjam->nama ?></td>
                                <td><?= $pinjam->nama_kelas ?></td>
                                <td><?= $pinjam->kode_buku ?></td>
                                <td><?= $pinjam->judul_buku ?></td>
                                <td><?= $pinjam->status == '1' ? '<span class="label label-danger">Pengajuan Peminjaman' : ($pinjam->status == '2' ? '<span class="label label-info">Berhasil Meminjam': ($pinjam->status == '3' ? '<span class="label label-warning">Pengajuan Pengembalian':  '<span class="label label-success">Berhasil Dikembalikan')) ?></td> <!--http://jagowebdev.com/cara-penulisan-if-else-pada-php/-->
                                </tr>
                            <?php endforeach ?>
                            </tbody>


                        </table>
                    <?php else: ?>
                        <p>Tidak ada data peminjaman</p>
                    <?php endif ?>
                    <div class="row">
                        <!--    Button Create-->
                        <div class="col-xs-12">
                            <?= anchor("peminjaman-user-create",'Tambah',['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>