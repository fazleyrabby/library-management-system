
<footer>
		<?=date('Y')?> &copy; Fazley Rabbi
</footer>


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/DataTables/datatables.js"></script>
<script src="assets/datepicker/js/bootstrap-datepicker.js"></script>

<script>
    $(document).ready(function() {
        $('.display').DataTable();
    });
</script>

<script>
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    todayBtn	:false,
	todayHighlight	:true,
	defaultViewDate	:'today'

});
</script>