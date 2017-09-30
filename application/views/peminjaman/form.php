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
                <h2 class="card-inside-title">Tambah Peminjaman</h2>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">&nbsp;&nbsp;&nbsp;</i>
                                 </span>
                            <?= form_open($form_action,['id' => 'form-peminjaman','autocomplete' => 'off']) ?>
                            <?= isset($input->id_pinjam) ? form_hidden('id_pinjam', $input->id_pinjam) : '' ?>
                            <div class="form-line">
                                <br>
                                <?= form_label('Kode Peminjaman' ,'kode_pinjam') ?>
                                <?= form_input('kode_pinjam',date('YmdHis'), ['class' => 'form-control','placeholder' => 'Kode Pinjam', 'required autofocus', 'readonly'=>'true']) ?>
                            </div>
                        </div>
                        <?= form_error('kode_pinjam') ?>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">date_range</i>
                                 </span>

                            <div class="form-line">
                                <?= form_input('tanggal_pinjam',$input->tanggal_pinjam, ['class' => 'datepicker form-control','placeholder' => 'Tanggal Peminjaman', 'required autofocus']) ?>
                            </div>
                        </div>
                        <?= form_error('tanggal_pinjam') ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">person</i>
                                 </span>
                            <div class="form-line">
                                <?= form_input('search_user',$input->search_user,['class' => 'form-control', 'onkeyup' => 'userAutoComplete()','placeholder' => 'Masukkan No Induk atau Nama','required autofocus','id' => 'search_user']) ?>
                                <ul id="user_list" class="live-search-list"></ul>
                            </div>
                        </div>
                        <?= form_error('search_user') ?>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="input-group">
                                <span class="input-group-addon">
                                 <i class="material-icons">book</i>
                                 </span>
                            <div class="form-line">
                                <?= form_input('search_buku',$input->search_buku,['class' => 'form-control', 'onkeyup' => 'bukuAutoComplete()','placeholder' => 'Masukkan Judul buku','required autofocus','id' => 'search_buku']) ?>
                                <?= form_hidden('status','2') ?>
                                <ul id="buku_list" class="live-search-list"></ul>
                            </div>
                        </div>
                        <?= form_error('search_buku') ?>
                    </div>
                </div>
                <div class="footer">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <?= form_button(['type' => 'submit','content' => 'Simpan','class' => 'btn btn-primary waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'top' ,'title' => 'Simpan']) ?>
                            &nbsp;
                            <?= anchor("peminjaman",'Batal', ['class' => 'btn btn-default waves-effect','data-toggle' => 'tooltip', 'data-placement' => 'top' ,'title' => 'Batal']) ?>
                        </div>

                    </div>

                </div>

                <?= form_close() ?>
