$(function() {

});

// BASE_URLの取得
const BASE_URL = $('#base-url').data('base-url');

// company_idをURLから取得
const COMPANY_ID = location.pathname.split('/')[4];

// エラーメッセージ要素を格納
var $error_elements = {
    'company_name': $('#error-company-name'),
    'company_name_kana': $('#error-company-name-kana'),
    'tel': $('#error-tel'),
    'mail_address': $('#error-mail-address'),
    'zip': $('#error-zip'),
    'address': $('#error-address')
};

// 戻るボタン押下時
$('.backpage-btn').click(function() {
	window.location.href = BASE_URL + 'company/index';
});

$('#start-create').click(function() {
	var formData = new FormData($('#company_form_data').get(0));

	formData.append("company_id", COMPANY_ID);

    // モーダル表示時にbody自動的に付与されるクラスを削除する
    $('body').removeClass('modal-open');
    // モーダル表示時の背景を元に戻す
    $('.modal-backdrop').remove();
    // モーダルを閉じる
    $('#create-entry-modal').modal('hide');

	// ajaxでpost
	$.ajax({
		url: BASE_URL + 'company/modify',
		type: 'POST',
		dataType: 'json',
		data: formData,
		processData: false,
		contentType: false

	// ajax成功時の処理
	}).done(function(data) {

        // バリデーションエラーの時の処理
        if (data.hasOwnProperty('errors')) {
            $('body, html').animate({scrollTop: 0}, 300, 'swing');
            set_errors(data.errors);
        }

        if (data.result) {
            location.href = BASE_URL + 'company';
        }

	// ajax失敗時の処理
	}).fail(function(reason) {
        console.log(reason);
	});

});

// エラーメッセージ
function set_errors(errors) {

    $.each($error_elements, function (property_name, $element) {
        $element.text('');
        $element.css('display', 'none');

        if (errors.hasOwnProperty(property_name)) {

            // エラーがあれば表示する
            $element.css('display', 'block');
            $element.text(errors[property_name]);

        }
    });
}
