<script>
    $(document).ready(function() {
        $('.select2-data-post').select2({
            theme: 'bootstrap4',
            delay: 250,
        });
        preViewImage($('.parent-thumbnail'), $('.old_thumbnail'));

        $('.form-product').validate({
                rules: {
                    name: 'required',
                    slug: 'required',
                    short_description: 'required',
                    weight: 'required',
                    serving_size: 'required',
                    price: 'required',
                    percent: {
                        required: true,
                        number: true,
                        min: 1,
                        max: 100
                    },
                    score: 'required',
                    origin: 'required',
                    main_ingredient: 'required',
                    brand_id: 'required',
                    category_id: 'required',
                    flavor_id: 'required',
                    status: 'required',
                },
                messages: {
                    name: 'Vui lòng nhập tên sản phẩm',
                    slug: 'Vui lòng nhập slug sản phẩm',
                    short_description: 'Vui lòng nhập mô tả',
                    weight: 'Vui lòng nhập trọng lượng',
                    serving_size: 'Vui lòng nhập khẩu phần',
                    price: 'Vui lòng nhập giá gốc',
                    percent: {
                        required: 'Vui lòng nhập phần trăm khuyến mãi',
                        number: 'Phần trăm khuyến mãi phải là số',
                        min: 'Phần trăm khuyến mãi tối thiểu là 1',
                        max: 'Phần trăm khuyến mãi tối đa là 100'
                    },
                    score: 'Vui lòng nhập điểm bình chọn',
                    origin: 'Vui lòng nhập xuất xứ',
                    main_ingredient: 'Vui lòng nhập thành phần chính',
                    brand_id: 'Vui lòng chọn thương hiệu',
                    category_id: 'Vui lòng chọn danh mục',
                    flavor_id: 'Vui lòng chọn loại vị',
                    status: 'Vui lòng chọn trạng thái',
                },
                submitHandler: function (form) {
                    // Xử lý form khi dữ liệu hợp lệ
                    form.submit();
                }
            });
    });
</script>
