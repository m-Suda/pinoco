// BASE_URLの取得
const BASE_URL = $('#base-url').data('base-url');

$('[data-toggle="tooltip"]').tooltip();

$('#date-list').change(function() {
	var date = $(this).val();

	window.location.href = BASE_URL + 'attendance/show/' + date;
});