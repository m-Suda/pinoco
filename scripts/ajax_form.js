/**
 * AjaxでFormDataを使用する関数オブジェクトを宣言します。
 * @constructor
 */
var Ajax_form = function() {

    this.url = null;
    this.data = null;

    this.ajax_success_func = null;
    this.ajax_success_error_func = null;
    this.ajax_failure_func = null;
}

/**
 * AjaxオブジェクトにURLをセットします。
 * @param url
 */
Ajax_form.prototype.set_url = function(url) {
    this.url = url;
}

/**
 * AjaxオブジェクトにDataをセットします。
 * @param data
 */
Ajax_form.prototype.set_data = function(data) {
    this.data = data;
}

/**
 * Ajax処理に成功したときに行う処理をセットします。
 * @param func
 */
Ajax_form.prototype.set_func_when_ajax_success = function(func) {
    this.ajax_success_func = func;
}

/**
 * Ajax処理に成功しますが、エラーだった場合に行う処理をセットします。
 * @param func
 */
Ajax_form.prototype.set_func_when_ajax_success_error = function(func) {
    this.ajax_success_error_func = func;
}

/**
 * Ajax処理に失敗したときに行う処理をセットします。
 * @param func
 */
Ajax_form.prototype.set_func_when_ajax_failure = function(func) {
    this.ajax_failure_func = func;
}

/**
 * Ajaxを実行します。
 * @param url
 * @param data
 */
Ajax_form.prototype.execute = function() {

    // ajax後のthisはXHLのオブジェクトに変わってしまうためajaxインスタンス自体は退避
    var that = this;

    $.ajax({

        type: 'POST',
        url: that.url,
        data: that.data,
        dataType: 'json',
        cache: false,
        processData: false,
        contentType: false
    }).done(function(body) {

        if (body.hasOwnProperty('errors')) {
            that.ajax_success_error_func(body);
            return;
        }

        that.ajax_success_func(body);

    }).fail(function(reason) {

        console.error(reason);
        that.ajax_failure_func();
    });
}
