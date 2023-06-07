<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/app.js"></script>

<script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="assets/js/pages/simple-datatables.js"></script>
<script src="assets/extensions/tinymce/tinymce.min.js"></script>
<script src="assets/js/pages/tinymce.js"></script>
<script src="assets/js/pages/dashboard.js"></script>
<script src="assets/extensions/chart.js/Chart.min.js"></script>
<script src="assets/js/pages/ui-chartjs.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
		$('.form-select-2').select2();
	});
</script>

<script>
	$('#select-field,#select-field2,#select-field3, #select-siswa').select2({
		theme: 'bootstrap-5'
	});
</script>


<script type="text/javascript">
	var myModal = new bootstrap.Modal(document.getElementById("message"), {});
	document.onreadystatechange = function() {
		myModal.show();
	};
</script>