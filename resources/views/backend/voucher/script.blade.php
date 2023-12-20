<script>
    $(document).ready(function() {
        preViewImage($('.parent-thumbnail'), $('.old_thumbnail'));

        $('.select2-common').select2({
      theme: 'bootstrap4'
    })
        var getplaceSelect = $(this).data("placeholder");
        $('.select2-common-multiple').select2({
            placeholder: getplaceSelect,
            allowClear: true,
            theme: 'bootstrap4',
            liveSearch: true
        });

        new Cleave($('[name="reduced_amount"]'), {
            numeral: true,
            delimiter: '.',
            numeralDecimalMark: ',',
            numeralThousandsGroupStyle: 'thousand',
            numeralPositiveOnly: true,
            numeralDecimalScale: 0,
            numeralIntegerScale: 18
        });
        new Cleave($('[name="min_purchase"]'), {
            numeral: true,
            delimiter: '.',
            numeralDecimalMark: ',',
            numeralThousandsGroupStyle: 'thousand',
            numeralPositiveOnly: true,
            numeralDecimalScale: 0,
            numeralIntegerScale: 18
        });
    });
</script>
