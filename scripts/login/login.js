var login_controller = {
    // 画面のデータ
	data: {
		base_url: null
	},
    // 画面のUIエレメント
	ui_elements: {
		login_button: null,
		errors: {
			user_id_error: null,
			password_error: null,
            authentication_error: null
		}
	},
    // コンストラクタ
	init: function(config) {

		this.data.base_url = config.data.base_url;
		this.ui_elements.login_button = $('#login-btn');
		this.ui_elements.errors.user_id_error = $('#user_id-error-area');
		this.ui_elements.errors.password_error = $('#password-error-area');
		this.ui_elements.errors.authentication_error = $('#authentication-error-area');

		// イベントの紐づけ
		this.wireEvents();
	},
    // エラー文言を非表示にする処理
    close_error_area: function() {

	    this.ui_elements.errors.user_id_error.text('');
	    this.ui_elements.errors.password_error.text('');
	    this.ui_elements.errors.authentication_error.hide();
    },
    // ログイン成功処理
    login_success: function(body) {

        // レスポンスによって遷移先を振り分ける必要がある
        // 暫定管理者権限のユーザー管理ページへ遷移
        // location.href = this.data.base_url + 'users/index';
        console.log(body.auth);
        alert('ログイン成功！')
    },
    // 入力値チェックや認証に引っかかった時の処理
    login_failure: function(body) {

	    // エラー文言を表示する処理
        $.each(body.errors, function(key, value) {

            let id = '#' + key + '-error-area';
            $(id).text(value);
            $(id).css('display', 'block');
        });
    },
    // サーバー側で何らかのエラーが起こった時の処理
    server_error: function() {

	    alert('予期せぬエラーが発生しました。時間を空けて再度お試しください。');
    },
    // ログイン処理
	sign_in: function() {

		var form_data = new FormData($('#login-form').get(0));

		for (data of form_data) console.log(data);

		// ajax処理
		var ajax = new Ajax_form();
		ajax.set_url(this.data.base_url + 'login/authentication');
		ajax.set_data(form_data);
		ajax.set_func_when_ajax_success(login_controller.login_success);
		ajax.set_func_when_ajax_success_error(login_controller.login_failure);
		ajax.set_func_when_ajax_failure(login_controller.server_error);
        ajax.execute();
		
	},
    // イベントを紐づける
	wireEvents: function() {

		var that = this;

		this.ui_elements.login_button.on('click', function() {

		    // ログインボタンが押されるたびにエラー文言を非表示にする。
		    that.close_error_area();

		    // ログイン処理
			that.sign_in();
		});
	}
};

$(function() {

    // 画面読み込み完了後に画面コントローラー初期化
    login_controller.init(config);
});