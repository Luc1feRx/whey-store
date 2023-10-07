<script type="text/javascript">
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": false,
	  "progressBar": true,
	  "positionClass": "toast-bottom-right",
	  "preventDuplicates": false,
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "3000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	};
    @if (session('success'))
        Command: toastr["success"]("{{ session('success') }}")
    @elseif(session('error'))
        Command: toastr["error"]("{{ session('error') }}")
    @elseif(session('warning'))
        Command: toastr["warning"]("{{ session('warning') }}")
    @elseif(session('info'))
        Command: toastr["info"]("{{ session('info') }}")
    @else
    @endif
	// toastr.clear();
</script>
