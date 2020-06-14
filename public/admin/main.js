
var content = $('meta[name="content"]').attr('content');
var token = $('meta[name="csrf-token"]').attr('content');
var url = $('meta[name="parameter"]').attr('content');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': token
    }
});

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

$('#store-modal').click(function () {
    $('#dataForm').trigger("reset");
    $('img[name="image"]').attr('src', 'https://lh3.googleusercontent.com/proxy/BLOE7BuXhfFokxX0TML64dYh1iZcnkZAvYEoUoIvvt9E6d2RALYSy2FkacW5cWjeBa1OekT_0X_BBT6jTVY_WRnp39x_GQUw4X12LYE_q8BmGCCytm3h');
    $('input:checkbox').removeAttr('checked');
    $('#formModal').modal('show');
});

// Save Button (untuk form tidak ada file input)
$('#saveBtn').click(function (e) {
    e.preventDefault();
    $.ajax({
        data: $('#dataForm').serialize(),
        url: url,
        type: "POST",
        dataType: 'json',
        success: function (data) {
            $('#dataForm').trigger("reset");
            $('#formModal').modal('hide');
            ajaxSuccess(data);
        },
        error: function (data) {
            ajaxError(data);
        }
    });
});

// Save Button (jika ada file input)
$('#file-submit').click(function (e) {
    e.preventDefault();
    if($('#content').length){
        tinyMCE.triggerSave();
    }
    form = new FormData($('#dataForm')[0]);
    // console.log(form);
    $.ajax({
        data: form,
        url: url,
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('#dataForm').trigger("reset");
            $('#formModal').modal('hide');
            ajaxSuccess(data);
        },
        error: function (data) {
            ajaxError(data);
        }
    });
});

$('body').on('click', '.editRole', function () {
    var id = $(this).data('id');
    $.get(url+'/' + id +'/edit', function (data) {
        $('#dataForm').trigger("reset");
        $.each(data, (i, v) => {
            $('select[name="' + i + '"]').val(v).trigger('change.select2');
            if (i != "image" && i != 'img') {
                $('input[name="' + i + '"]').val(v);
            }
            $('img[name="' + i + '"]').attr('src', '/uploads/articles/'+v);
            $('textarea[name="' + i + '"]').val(v);
            $('#'+i).attr('checked', true);
            if(i == 'body'){
                tinyMCE.activeEditor.setContent(v);
            }
        });

        $('#formModal').modal('show');
    });
});

$('body').on('click', '.deleteRole', function () {
    var id = $(this).data("id");
    if ( confirm("Are You sure want to delete?") ){
        $.ajax({
            type: "DELETE",
            url: url+'/'+id,
            success: function (data) {
                ajaxSuccess(data);
            },
            error: function (data) {
                ajaxError(data);
            }
        });
    } else {

    }
});

$('#refresh-datatable').click(function () {
    table.ajax.reload();
});

function ajaxSuccess(x) {
    if (table) {
        table.draw();
    }
    Toast.fire({
        icon: 'success',
        title: 'Successfully'
    });
}

function ajaxError(x) {
    lastClick = null;
    let h = JSON.parse(x.responseText);
    if (h.errors) {
        let error = '';
        $.each(h.errors, (i, v) => {
            error += v + '<br>';
        });
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: h.message,
            footer: error
        });
    } else if (h.message) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: x.responseJSON.message
        });
    } else {
        Swal.fire("Oops, An error occurred, please try again later", "", "error");
    }
}
