jQuery(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    // Slide Toggle Filters
    $('.btn-show-table-options').click(function (t) {
        t.preventDefault(),
            $(this).closest(".dataTables_wrapper").find(".table-configuration-wrap").slideToggle(500)
    });
    $('.btn-show-table-import').click(function (t) {
        t.preventDefault(),
            $(this).closest(".dataTables_wrapper").find(".table-configuration-import-wrap").slideToggle(500)
    });
    //iCheck for checkbox and radio inputs
    $('.category-checkbox').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_minimal-blue'
    }).on('ifChanged', function () {
        if (this.checked) {
            $(this).closest('tr').css('background-color', '#ffffd5');
        } else {
            $(this).closest('tr').css('background-color', '');
        }
    });
    $('.checkbox-toggle').iCheck({checkboxClass: 'icheckbox_flat-blue', radioClass: 'iradio_flat-blue'});
    $('.checkbox-toggle').on('ifChanged', function (event) {
        if (this.checked) {
            $('.grid-row-checkbox').iCheck('check');
        } else {
            $('.grid-row-checkbox').iCheck('uncheck');
        }
    });
    $('.grid-row-checkbox').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    }).on('ifChanged', function () {
        if (this.checked) {
            $(this).closest('tr').css('background-color', '#ffffd5');
        } else {
            $(this).closest('tr').css('background-color', '');
        }
    });
    $('#lfm').click(function (t) {
        t.preventDefault();
        $(this).parents('.image-box').find('.btn_remove_image').closest(".image-box").find(".preview-image-wrapper").show();
        // $('.btn_remove_image').closest(".image-box").find(".preview-image-wrapper").show();
    });
    $('.lfm').click(function (t) {
        t.preventDefault();
        $(this).parents('.image-box').find('.btn_remove_image').closest(".image-box").find(".preview-image-wrapper").show();
    });
    $(document).on("click", ".btn_remove_image", function (e) {
        e.preventDefault();
        $(this).parents(".image-box").find(".preview-image-wrapper").hide();
        $(this).parents(".image-box").find(".image-data").val("")
    });
    $('.date-picker').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('.lfm').click(function () {
        $("#" + $(this).data('input')).click();
    });
    $(".image-data").change(function () {
        readURL(this);
    });
    $(document).on("click", ".btn_remove_image", function (e) {
        e.preventDefault();
        $('input[name="avatar"]').val('');
        $('input[name="file"]').val('');
        var url = '/admin/images/placeholder.png';
        $(this).parents(".image-box").find(".preview_image").attr('src' , url );
        $(this).parents(".image-box").find(".image-data").val("");
        $(this).parents(".image-box").find(".preview-image-wrapper").show();
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#" + $(input).attr('data-preview')).attr('src', e.target.result);
                $('input[name=image_base64]').val(e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            $('input.input-file').css('display', 'none');
        }
    }
});

var selectedRows = function () {
    var selected = [];
    $('.grid-row-checkbox:checked').each(function () {
        selected.push($(this).data('id'));
    });
    return selected;
}

function destroy(id, model, url, title = 'Bạn chắc chắn không?', text, current_page = false) {
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
                            _method: 'delete',
                            current_page: current_page
                        },
                        dataType: 'json',
                        success: function (data) {
                            if (data.status) {
                                Swal.fire(data.msg, '', 'success');
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

function approval( url, title = 'Bạn chắc chắn duyệt lịch làm việc này không?', text, current_page = false) {
    Swal.fire({
        title: title,
        text: text,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Đồng ý",
        cancelButtonText: "Trở về",
        preConfirm: function () {
            return new Promise(function (resolve) {
                setTimeout(function () {
                    $.ajax({
                        method: 'get',
                        url: url,
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        success: function (data) {
                            if (data.status) {
                                Swal.fire(data.msg,'' ,'success');
                                location.reload();
                            }
                        },          
                    });
                }, 1000);
            });
        }
    });
}