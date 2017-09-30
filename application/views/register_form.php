<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Aplikasi Perpustakaan | SMA Negeri 2 Cileungsi</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url();?>/adminbsb/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url();?>adminbsb/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url();?>adminbsb/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url();?>adminbsb/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url();?>adminbsb/css/style.css" rel="stylesheet">
    <link href="<?= base_url();?>adminbsb/css/smandu.css" rel="stylesheet">
</head>

<body class="signup-page">
<div class="signup-box">
    <div class="logo">
        <a href="<?= base_url() ?>">Aplikasi <b>Perpustakaan</b></a>
        <img src="<?= base_url();?>adminbsb/images/logo.jpg" class="img-circle center-block" height="110px">
    </div>
    <div class="card">
        <div class="body">

                <div class="msg">Register a new membership</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <?= form_open('register/create') ?>
                        <?= isset($input->id_user) ? form_hidden('id_user', $input->id_user) : '' ?>
                        <?= form_input('username',$input->username, ['class' => 'form-control','placeholder' => 'Username', 'required autofocus']) ?>
                    </div>
                    <?= form_error('username') ?>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <?= form_password('password',$input->password, ['class' => 'form-control','placeholder' => 'Password', 'required autofocus']) ?>
                    </div>
                    <?= form_error('password') ?>
                </div>
            <?= form_hidden('level','anggota', ['class' => 'form-control','placeholder' => 'Level', 'required autofocus']) ?>
            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">format_list_numbered</i>
                        </span>
                <div class="form-line">
                    <?= form_input('no_induk',$input->no_induk, ['class' => 'form-control','placeholder' => 'No Induk', 'required autofocus']) ?>
                </div>
                <?= form_error('no_induk') ?>
            </div>
            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">perm_identity</i>
                        </span>
                <div class="form-line">
                    <?= form_input('nama',$input->nama, ['class' => 'form-control','placeholder' => 'Nama', 'required autofocus']) ?>
                </div>
                <?= form_error('nama') ?>
            </div>
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
                <br>
                <br>
                <?= form_error('jenis_kelamin') ?>
            </div>
            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">screen_lock_portrait</i>
                        </span>
                <div class="form-line">
                    <?= form_input('no_hp',$input->no_hp, ['class' => 'form-control','placeholder' => 'No Handphone', 'required autofocus']) ?>
                </div>
                <?= form_error('no_hp') ?>
            </div>
            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">account_balance</i>
                        </span>
                <div class="form-line">
                    <?= form_dropdown('id_kelas', getDropdownList('kelas',['id_kelas','nama_kelas']),$input->id_kelas, ['class' => 'form-control','id' => 'kelas']) ?>
                </div>
                <?= form_error('id_kelas') ?>
            </div>


            <?= form_button(['type' => 'submit','content' => 'Register','class' => 'btn btn-block btn-lg bg-pink waves-effect']) ?>
            <?= form_close() ?>

                <div class="m-t-25 m-b--5 align-center">
                    <a href="<?= base_url();?>login">You already have a membership?</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?= base_url();?>adminbsb/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url();?>adminbsb/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/node-waves/waves.js"></script>

<!-- Validation Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="<?= base_url();?>adminbsb/js/admin.js"></script>
<script src="<?= base_url();?>adminbsb/js/pages/examples/sign-up.js"></script>
</body>

</html>