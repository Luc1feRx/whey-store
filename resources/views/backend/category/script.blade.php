<script>
    $(document).ready(function() {
        $('.select2-data-category').select2({
            theme: 'bootstrap4',
            delay: 250,
        });

        $('#imageInput').change(function(e) {
            var file = e.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result);
                    $('#imagePreview').css('display', 'block'); // Show the image
                };

                reader.readAsDataURL(file);
            } else {
                $('#imagePreview').attr('src', '');
                $('#imagePreview').css('display', 'none'); // Hide the image
            }
        });

    });
</script>
