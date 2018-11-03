// BASE_URLの取得
const BASE_URL = $('#base-url').data('base-url');

/**
 * 新規作成ボタン押下時
 */
$('#create-user').click(function() {
	window.location.href = BASE_URL + "users/new";
});

/**
 * 編集ボタン押下時
 */
$('.edit-btn').click(function() {

	var id = $(this).data('id');

	window.location.href = BASE_URL + "users/edit/" + id;
});

/**
 * 削除確認モーダル表示時のイベント
 */
$('#delete-entry-modal').on('show.bs.modal', function(event) {

	// 直前に押された削除ボタンのイベントを取得
	var button = $(event.relatedTarget);

	// 押された削除ボタンのdata属性を取得
	var id = button.data('id');

	// モーダルにidを渡す
	$(this).find('#delete-user-id').val(id);
});


/**
 * 削除確認モーダル内の削除するボタン押下時のイベント
 */
$('#start-delete').click(function() {

	var id = $(this).parents().find('#delete-user-id').val();

	// モーダル表示時にbody自動的に付与されるクラスを削除する
	$('body').removeClass('modal-open');
	// モーダル表示時の背景を元に戻す
	$('.modal-backdrop').remove();
	// モーダルを閉じる
	$('#delete-entry-modal').modal('hide');		
	
	// 削除処理
	$.ajax({
		url: BASE_URL + 'users/delete',
	  	type: 'POST',
	  	data: {
		  'user_id': id
	  	}
	}).done(function(data) {
		$('#delete-success-modal').modal();
	}).fail(function(reason) {
		console.error(reason);
		$('#error-modal').modal();
	});
});

/**
 * 削除確認モーダルを閉じたとき画面の更新を走らせる
 */
$('#delete-success-modal').on('hidden.bs.modal', function() {
	location.reload();
});