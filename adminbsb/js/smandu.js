
$(function () {
    //Textare auto growth
    autosize($('textarea.auto-growth'));

    //Datetimepicker plugin
    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        weekStart: 1
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        // format: 'dddd DD MMMM YYYY',
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });

    $('.timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });
});
//script untuk membuat menu yang  dengan jquery situs:http://gawibowo.com/menandai-highlight-halaman-aktif-di-menu-menggunakan-jquery.htm

$(function() {
    $('.ml-menu a[href~="' + location.href + '"]').parents('li').addClass('active');
});
$(function() {
    $(".klik").click(function () {
        $(this)
    }).addClass("toggled");
});

$(function() {
    $('.ml-menu a[href~="' + location.href + '"]').parents('ul').css({display:"block"});
});



$(function () {


    $('.biasa').DataTable({
        responsive: true,
        pageLength:5,
        searching: false,
        "lengthChange": false
    });
    $('.js-basic-example').DataTable({
        responsive: true,
        pageLength:5,
        "lengthMenu": [ [5, 10, 25, -1], [5, 10, 25, "All"] ],"pageLength": 5
    });
    $('.judul').DataTable({
        responsive: true,
        pageLength:5,
        "lengthMenu": [ [2, 10, 25, -1], [2, 10, 25, "All"] ],"pageLength": 2
    });
    $('.tabel-pin').DataTable({
        responsive: true,
        pageLength:5,
        "lengthMenu": [ [5, 10, 25, -1], [5, 10, 25, "All"] ],"pageLength": 5,
        sorting:false
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});


//userAutocomplete (Ajax)
function userAutoComplete() {
    var base_url = window.location.origin;
    var min_length = 0;//min caracters display autocomplete
    var keywords = $('#search_user').val();
    if (keywords.length >= min_length) {
        $.ajax({
            url:'/peminjaman/user_auto_complete',
            type: 'POST',
            data:{keywords:keywords},
            success:function (data) {
                $('#user_list').show();
                $('#user_list').html(data);
            }
        });
    }else {
        $('#user_list').hide();
    }
}

//userAutocomplete (Ajax)
function userAutoComplete2() {
    var min_length = 0;//min caracters display autocomplete
    var keywords = $('#search_user').val();
    if (keywords.length >= min_length) {
        $.ajax({
            url:'/peminjaman_user/user_auto_complete',
            type: 'POST',
            data:{keywords:keywords},
            success:function (data) {
                $('#user_list').show();
                $('#user_list').html(data);
            }
        });
    }else {
        $('#user_list').hide();
    }
}

//bukuAutocomplete (Ajax)
function bukuAutoComplete() {
    var min_length = 0;//min caracters display autocomplete
    var keywords = $('#search_buku').val();
    if (keywords.length >= min_length) {
        $.ajax({
            url:'/peminjaman/buku_auto_complete',
            type: 'POST',
            data: {keywords:keywords},
            success:function (data) {
                $('#buku_list').show();
                $('#buku_list').html(data);
            }
        });
    } else {
        $('#buku_list').hide();
    }
}

//bukuAutocomplete (Ajax)
function bukuAutoComplete2() {
    var min_length = 0;//min caracters display autocomplete
    var keywords = $('#search_buku').val();
    if (keywords.length >= min_length) {
        $.ajax({
            url:'/peminjaman_user/buku_auto_complete',
            type: 'POST',
            data: {keywords:keywords},
            success:function (data) {
                $('#buku_list').show();
                $('#buku_list').html(data);
            }
        });
    } else {
        $('#buku_list').hide();
    }
}


// setItem : Change the value of input when "clicked"
function setItemUser(item) {
    //change input value
    $('#search_user').val(item);
    $('#user_list').hide();
}

function setItemBuku(item) {
    //change input value
    $('#search_buku').val(item);
    $('#buku_list').hide();
}

// Create input "id_user" if not exist
function makeHiddenIdUser(nilai) {
    if ($("#id_user").length > 0) {
        $("#id_user").attr('value',nilai);
    } else {
        str = '<input type="hidden" id="id-user" name="id_user" value="'+nilai+'" />';
        $("#form-peminjaman").append(str);
    }
}

//Create input "id_buku" if not exist
function makeHiddenIdBuku(nilai) {
    if ($("#id-buku").length > 0) {
        $("#id-buku").attr('value',nilai);
    } else {
        str = '<input type="hidden" id="id-buku" name="id_buku" value="'+nilai+'" />';
        $("#form-peminjaman").append(str);
    }
}

var $demoMaskedInput = $('.demo-masked-input');

//Date
$demoMaskedInput.find('.kelas').inputmask('*** **', { placeholder: '____-____-____-____' });


