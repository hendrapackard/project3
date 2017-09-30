<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>BUKU</h2>
                    </div>

                </div>

            </div>
            <div class="body">
                <h2 class="card-inside-title">Anda akan menambahkan buku :</h2>
                <div class="row clearfix">
                    <div class="col-sm-10">
                    <div class="col-sm-2">
                        ISBN
                    </div>
                    <div class="col-sm-10">
                       : <?= $judul->isbn ?>
                    </div>

                    <div class="col-sm-2">
                        Judul
                    </div>
                    <div class="col-sm-10">
                       : <?= $judul->judul_buku ?>
                    </div>
                    <div class="col-sm-2">
                        Penulis
                    </div>
                    <div class="col-sm-10">
                       : <?= $judul->penulis ?>
                    </div>
                    <div class="col-sm-2">
                        Penerbit
                    </div>
                    <div class="col-sm-10">
                       : <?= $judul->penerbit ?>
                    </div>
                    <div class="col-sm-2">
                        Letak
                    </div>
                    <div class="col-sm-10">
                       : <?= $judul->letak ?>
                    </div>
                    <div class="col-sm-2">
                        Kategori
                    </div>
                    <div class="col-sm-10">
                       : <?= $judul->kategori == '959' ? 'Pembelajaran' : ($judul->kategori == '912' ? 'Atlas': ($judul->kategori == '923' ? 'Teknologi':  ($judul->kategori == '090' ? 'Kamus':  'Ilmiah'))) ?>
                    </div>
                </div>
                    <div class="col-sm-2">
                        <?php if (!empty($judul->cover)): ?>
                            <img src="<?= site_url("cover/$judul->cover") ?>" alt="<?= $judul->judul_buku ?>">
                        <?php else: ?>
                            <img src="<?= site_url("cover/no_cover.jpg") ?>" alt="<?= $judul->judul_buku ?>">
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="footer">

                <?= form_open($form_action) ?>

                <?= isset($input->id_judul) ? form_hidden('id_judul',$input->id_judul) : ''?>
                <div class="row clearfix">
                    <div class="col-sm-10">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">book</i>
                                 </span>
                                <div class="form-line">
                                    <?= form_input('kode_buku',isset($input->kode_buku) ? $input->kode_buku : $judul->kategori.'.'.'529'.substr($judul->penulis,0,3).substr($judul->judul_buku,0,1), ['class' => 'form-control key','placeholder' => 'Kode Buku', 'required autofocus','readonly'=>'true']) ?>
                                </div>
                            </div>
                            <?= form_error('kode_buku') ?>
                        </div>
                        <?= form_button(['type' => 'submit','content' => 'Simpan','class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'top' ,'title' => 'Simpan']) ?>
                        &nbsp;
                        <?= anchor("judul",'Batal', ['class' => 'btn btn-default waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'top' ,'title' => 'Batal']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

