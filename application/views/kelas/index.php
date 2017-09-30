<?php $i = 0 ?>


<!--flash message-->
<?php $this->load->view('_partial/flash_message') ?>

<div class="row clearfix">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="card">
        <div class="header">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-6">
                    <h2>KELAS</h2>
                </div>

            </div>

        </div>
        <div class="body">
            <div class="body table-responsive">
            <?php if ($kelass) : ?>
                <table id="tabel_biasa" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>KELAS</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($kelass as $kelas): ?>

                        <td><?= ++$i ?></td>
                        <td><?= $kelas->nama_kelas ?></td>
                        <td><?= anchor("kelas/edit/$kelas->id_kelas",'<i class="material-icons">edit</i>', ['class' => 'btn btn-warning waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Edit']) ?></td>
                        <td>
                            <?= form_open("kelas/delete/$kelas->id_kelas") ?>
                            <?= form_hidden('id_kelas',$kelas->id_kelas) ?>
                            <?= form_button(['type' => 'submit','content' => '<i class="material-icons">delete</i>', 'class' => 'btn btn-danger waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Delete','onclick' => "return confirm('Anda yakin akan menghapus kelas ini?')"]) ?>
                            <?= form_close() ?>
                        </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>


                </table>
            <?php else: ?>
                <p>Tidak ada data kelas.</p>
            <?php endif ?>
            <div class="row">
                <!--    Button Create-->
                <div class="col-xs-12">
                    <?= anchor("kelas/create",'Tambah Kelas',['class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'right' ,'title' => 'Tambah Kelas']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


