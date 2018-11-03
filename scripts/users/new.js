$(function() {

    // BASE_URLの取得
    const BASE_URL = $('#base-url').data('base-url');

	// エラーメッセージ要素を格納
    var $error_elements = {
        'user_id': $('#error-user-id'),
        'user_name': $('#error-user-name'),
        'user_type': $('#error-user-type'),
        'company_id': $('#error-company-id'),
        'mail_address': $('#error-mail-address'),
        'start_date': $('#error-start-date'),
        'end_date': $('#error-end-date'),
        'password': $('#error-password'),
        'confirm_password': $('#error-confirm-password')
    };

	// 戻るボタン押下時
    $('.backpage-btn').on('click', function() {
        window.location.href = BASE_URL + 'users/index';
    });

	// 保存するボタンクリックイベント
    $('#start-create').on('click', function() {

        var formData = new FormData($('#user_form_data').get(0));

        // モーダル表示時にbody自動的に付与されるクラスを削除する
        $('body').removeClass('modal-open');
        // モーダル表示時の背景を元に戻す
        $('.modal-backdrop').remove();
        // モーダルを閉じる
        $('#create-entry-modal').modal('hide');

        // 登録処理
        execute_post(
            BASE_URL + 'users/create',
            formData,
            successCreate
        );
    });

	// post成功後の処理 ※登録処理用
    function successCreate(body) {
        // バリデーションエラーの時の処理
        if (body.hasOwnProperty('errors')) {
            $('body, html').animate({scrollTop: 0}, 300, 'swing');
            set_errors(body.errors);
            return;
        }

        if (body.result) {
            location.href = BASE_URL + 'users';
        }
    }

	// post処理
    function execute_post(url, formData, func = null) {
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false
        }).done(function (body) {

            if (func) {
                func(body);
            }

        }).fail(function (reason) {
            console.error(reason);
        });
    }

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

});