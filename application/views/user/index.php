<?php $i = 0 ?>


<!--flash message-->
<?php $this->load->view('_partial/flash_message') ?>

<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>USER</h2>
                    </div>

                </div>

            </div>
            <div class="body">
                <div class="body table-responsive">
                <?php if ($users) : ?>
                    <table id="tabel_kelas" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>No Induk</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>

                            <td><?= ++$i ?></td>
                            <td><?= $user->username ?></td>
                            <td><?= $user->level ?></td>
                            <td><?= $user->no_induk ?></td>
                            <td><?= $user->nama ?></td>
                            <td><?= $user->nama_kelas ?></td>
                            <td><?= $user->is_verified == 'n' ? '<span class="label label-danger">Belum Terverifikasi' : '<span class="label label-success">Terverifikasi' ?></td>
                            <td><?= anchor("user/edit/$user->id_user",'<i class="material-icons">edit</i>',['class' => 'btn btn-warning waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Edit']) ?></td>
                            <td>
                                <?= form_open("user/delete/$user->id_user") ?>
                                <?= form_hidden('id_user', $user->id_user)?>
                                <?= form_button(['type' => 'submit', 'content' => '<i class="material-icons">delete</i>','class' => 'btn btn-danger waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Delete','onclick' => "return confirm('Anda yakin akan menghapus?')"]) ?>
                                <?= form_close() ?>
                            </td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>


                    </table>
                <?php else: ?>
                    <p>Tidak ada data user</p>
                <?php endif ?>
                <div class="row">
                    <!--    Button Create-->
                    <div class="col-xs-12">
                        <?= anchor("user/create",'Tambah User',['class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Tambah User']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>