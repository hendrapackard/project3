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
                <h2 class="card-inside-title">Tambah User</h2>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">person</i>
                                 </span>
                                    <?= form_open($form_action) ?>
                                    <?= isset($input->id_user) ? form_hidden('id_user', $input->id_user) : '' ?>
                                <div class="form-line">
                                    <?= form_input('username',$input->username, ['class' => 'form-control','placeholder' => 'Username', 'required autofocus']) ?>
                            </div>
                        </div>
                            <?= form_error('username') ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">lock</i>
                                 </span>
                                <div class="form-line">
                                    <?= form_password('password',$input->password, ['class' => 'form-control','placeholder' => 'Password', 'required autofocus']) ?>
                                </div>
                            </div>
                            <?= form_error('password') ?>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">security</i>
                                 </span>

                                <div class="form-line">
                                    <?= form_radio('level','admin',
                                        isset($input->level) && ($input->level == 'admin') ? true : false,['id' => 'admin','class'=>'with-gap'])
                                    ?>
                                    <?= form_label('Administrator','admin') ?>

                                    <?= form_radio('level','anggota',
                                        isset($input->level) && ($input->level == 'anggota') ? true : false,['id' => 'anggota','class'=>'with-gap'])
                                    ?>
                                    <?= form_label('Anggota','anggota') ?>

                                </div>
                        </div>
                            <?= form_error('level') ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">security</i>
                                 </span>

                                <div class="form-line">
                                    <?= form_radio('is_verified','y',
                                        isset($input->is_verified) && ($input->is_verified == 'y') ? true : false,['id' => 'y','class'=>'with-gap'])
                                    ?>
                                    <?= form_label('Terverifikasi','y') ?>

                                    <?= form_radio('is_verified','n',
                                        isset($input->is_verified) && ($input->is_verified == 'n') ? true : false,['id' => 'n','class'=>'with-gap'])
                                    ?>
                                    <?= form_label('Tidak Terverifikasi','n') ?>

                                </div>
                        </div>
                            <?= form_error('is_verified') ?>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">format_list_numbered</i>
                                 </span>
                                <div class="form-line">
                                    <?= form_input('no_induk',$input->no_induk, ['class' => 'form-control','placeholder' => 'No Induk', 'required autofocus']) ?>
                                </div>
                            </div>
                            <?= form_error('no_induk') ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">perm_identity</i>
                                 </span>
                                <div class="form-line">
                                    <?= form_input('nama',$input->nama, ['class' => 'form-control','placeholder' => 'Nama', 'required autofocus']) ?>
                            </div>
                        </div>
                            <?= form_error('nama') ?>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">accessibility</i>
                                 </span>
                                <div class="form-line">
                                    <?= form_radio('jenis_kelamin','l',isset($input->jenis_kelamin) && ($input->jenis_kelamin == 'l') ? true : false,['id' => 'l','class' => 'with-gap']) ?>
                                    <?= form_label('Laki - Laki','l') ?>
                                    <?= form_radio('jenis_kelamin','p',isset($input->jenis_kelamin) && ($input->jenis_kelamin == 'p') ? true : false,['id' => 'p','class' => 'with-gap']) ?>
                                    <?= form_label('Perempuan','p') ?>
                                </div>
                            </div>
                            <?= form_error('jenis_kelamin') ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">screen_lock_portrait</i>
                                 </span>
                                <div class="form-line">
                                    <?= form_input('no_hp',$input->no_hp, ['class' => 'form-control','placeholder' => 'No Handphone', 'required autofocus']) ?>
                            </div>
                        </div>
                            <?= form_error('no_hp') ?>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">account_balance</i>
                                 </span>
                                <div class="form-line">
                                    <?= form_dropdown('id_kelas', getDropdownList('kelas',['id_kelas','nama_kelas']),$input->id_kelas, ['class' => 'form-control','id' => 'kelas']) ?>
                                </div>
                            </div>
                            <?= form_error('id_kelas') ?>
                        </div>
                    </div>
                <div class="footer">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <?= form_button(['type' => 'submit','content' => 'Simpan','class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'top' ,'title' => 'Simpan']) ?>
                            &nbsp;
                            <?= anchor("user",'Batal', ['class' => 'btn btn-default waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'top' ,'title' => 'Batal']) ?>
                        </div>

                    </div>

                </div>

                <?= form_close() ?>
