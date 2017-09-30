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
                <h2 class="card-inside-title">Tambah Judul Buku</h2>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">branding_watermark</i>
                                 </span>
                            <?= form_open_multipart($form_action) ?>
                            <?= isset($input->id_judul) ? form_hidden('id_judul', $input->id_judul) : '' ?>
                            <div class="form-line">
                                <?= form_input('isbn',$input->isbn, ['class' => 'form-control','placeholder' => 'ISBN', 'required autofocus']) ?>
                            </div>
                        </div>
                        <?= form_error('isbn') ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">title</i>
                                 </span>
                            <div class="form-line">
                                <?= form_input('judul_buku',$input->judul_buku, ['class' => 'form-control','placeholder' => 'Judul Buku', 'required autofocus']) ?>
                            </div>
                        </div>
                        <?= form_error('judul_buku') ?>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">perm_identity</i>
                                 </span>
                            <div class="form-line">
                                <?= form_input('penulis',$input->penulis, ['class' => 'form-control','placeholder' => 'Penulis', 'required autofocus']) ?>
                            </div>
                        </div>
                        <?= form_error('penulis') ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">publish</i>
                                 </span>
                            <div class="form-line">
                                <?= form_input('penerbit',$input->penerbit, ['class' => 'form-control','placeholder' => 'Penerbit', 'required autofocus']) ?>
                            </div>
                        </div>
                        <?= form_error('penerbit') ?>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">library_books</i>
                                 </span>
                            <div class="form-line">
                                <?= form_dropdown('kategori',  ['' => '-- Pilih Kategori --','959' => 'Pembelajaran','912' => 'Atlas','923' => 'Teknologi','090' => 'Kamus','910' => 'Ilmiah'],$input->kategori , ['class' => 'form-control','placeholder' => 'Kategori', 'required autofocus']) ?>
                            </div>
                        </div>
                        <?= form_error('kategori') ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">add_location</i>
                                 </span>
                            <div class="form-line">
                                <?= form_input('letak',$input->letak, ['class' => 'form-control','placeholder' => 'Letak', 'required autofocus']) ?>
                            </div>
                        </div>
                        <?= form_error('letak') ?>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6 right">
                        <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">file_upload</i>
                                 </span>
                            <div class="form-line">
                                <?= form_upload('cover') ?>
                            </div>
                        </div>
                        <?= fileFormError('cover','<p class="form-error">', '</p>'); ?>
                    </div>
                    <?php if (!empty($input->cover)): ?>
                        <div class="col-sm-6 right">
                            <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons"></i>
                                 </span>
                                <div class="form-line">
                                    <img src="<?= site_url("/cover/$input->cover") ?>" alt="<?= $input->judul_buku ?>">
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <div class="footer">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <?= form_button(['type' => 'submit','content' => 'Simpan','class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'top' ,'title' => 'Simpan']) ?>
                            &nbsp;
                            <?= anchor("judul",'Batal', ['class' => 'btn btn-default waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'top' ,'title' => 'Batal']) ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close() ?>
