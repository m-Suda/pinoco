// BASE_URLの取得
const BASE_URL = $('#base-url').data('base-url');

// 編集ボタン押下時
$('.edit-attendance-btn').click(function() {

	var id = $(this).data('id');

	window.location.href = BASE_URL + 'attendance/edit/' + id;
});