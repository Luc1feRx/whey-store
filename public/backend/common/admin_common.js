function destroy(id, model, url, title = 'Bạn chắc chắn không?', text, current_page = false, data_thumbnail) {
    Swal.fire({
        title: title,
        text: text,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Ok",
        cancelButtonText: "Cancel",
        preConfirm: function () {
            return new Promise(function (resolve) {
                setTimeout(function () {
                    jQuery.ajax({
                        headers: {
                            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: url,
                        data: {
                            id: id,
                            model: model,
                            thumbnail: data_thumbnail,
                            _method: 'delete',
                            current_page: current_page
                        },
                        dataType: 'json',
                        success: function (data) {
                            if (data.status) {
                                Swal.fire(data.msg, '', 'success');
                                location.reload();
                            }else{
                                Swal.fire(data.msg, '', 'error');
                                location.reload();
                            }
                        }
                    });
                }, 1000);
            });
        }
    });
}

function destroyAll(model, url, title = 'Bạn chắc chắn không?', text, current_page = false) {
    var id = selectedRows().join();
    if (id) {
        Swal.fire({
            title: title,
            text: text,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            closeOnConfirm: false,
            confirmButtonText: "Ok",
            showLoaderOnConfirm: false,
            cancelButtonText: "Cancel",
            preConfirm: function () {
                return new Promise(function (resolve) {
                    setTimeout(function () {
                        $.ajax({
                            method: 'post',
                            url: url,
                            data: {
                                _method: 'delete',
                                id: id,
                                model: model,
                                checkAll: true,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            success: function (data) {
                                if (data.status) {
                                    Swal.fire(data.msg, '','success');
                                    location.reload();
                                }
                            }
                        });
                    }, 2000);
                });
            }
        }).then(function (data) {
            Swal.fire(data.msg, '', 'error');
        });
    } else {
        Swal.fire({
            type: 'error',
            title: 'Unknown',
            text: 'Please choose record!',
        });
    }
}

function preViewImage(parent, old) {
    parent.find(".preview_image").click(function (e) {
        parent.find('.btn_gallery').attr('value', '');
        parent.find(".btn_gallery").trigger('click');
    });
    parent.find('.btn_gallery').change(function (e) {
        let file = e.target.files[0];
        if (file && file.type.startsWith("image/")) {
            parent.find('.preview_image').attr('src', URL.createObjectURL(e.target.files[0]));
        } else {
            parent.find('.btn_gallery').val('');
            old.val('');
        }
    });
    parent.find('.btn_remove_image').click(function (e) {
        parent.find('.btn_gallery').val('');
        old.val('');
    })
}

$(document).on("click", ".btn_remove_image", function (e) {
    e.preventDefault();
    $('input[name="file"]').val('');
    let defaultImg = '/backend/dist/img/placeholder.png';
    $(this).parent().find('.preview_image').attr('src',defaultImg)
    $(this).parents(".image-box").find(".image-data").val("");
    $(this).parents(".image-box").find(".preview-image-wrapper").show();
});