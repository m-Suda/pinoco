// BASE_URLの取得
const BASE_URL = $('#base-url').data('base-url');

// エラーメッセージ要素を格納
var $error_elements = {
    'attendance_time': $('#error-attendance-time')
};

$('[data-toggle="tooltip"]').tooltip();

// 表示月変更イベント
$('#date-list').change(function() {
	var date = $(this).val();
	var user_id = $('#user_id').data('id');

	window.location.href = BASE_URL + 'attendance/edit/' + user_id + '/' + date;
});

// 勤怠情報編集クリックイベント
$('.show-attendance-btn').on('click', function () {

    $('#error-attendance-time').css('display', 'none');

    // 押された行のデータを取得
    var day = this.dataset.day;
    var arrivalTime = this.dataset.arrivalTime;
    var leaveTime = this.dataset.leaveTime;
    var dayReport = this.dataset.dayReport;

    // モーダルにデータを渡す
    var modal = $('#attendance-detail-modal');
    modal.find('#day').val(day);
    modal.find('#arrival-time').val(arrivalTime);
    modal.find('#leaving-time').val(leaveTime);
    modal.find('#day-report').val(dayReport);

    $('#attendance-detail-modal').modal();

});

/**
 * 勤怠詳細モーダル内の保存するボタン押下時
 */
$('#start-update').on('click', function() {

    // 勤怠時間情報を取得
    // 語尾に':00'をつけないと、xx:xxという形式で表示されてしまう
    // 毎回語尾に':00'をつけると、xx:xx:00:00となってしまうことがあるので指定要素数以下の場合のみ付与する
    var arrivalTime = $(this).parents().find('#arrival-time').val();
    if (arrivalTime.split(':').length < 3) {
        arrivalTime += ':00';
    }
    var leaveTime = $(this).parents().find('#leaving-time').val();
    if (leaveTime.split(':').length < 3) {
        leaveTime += ':00';
    }

    // ユーザーIDを取得する
    var userId = $('#user_id').data('id');

    // 修正対象の日付を取得する
    var selectMonth = $('#date-list').val();
    selectMonth += $(this).parents().find('#day').val().split('/')[1];

    // 勤怠時間更新処理
    $.ajax({
        url: BASE_URL + 'attendance/modify'
        , type: 'POST'
        , dataType: 'json'
        , data: {
            'user_id': userId
          , 'date':selectMonth
          , 'arrival_time': arrivalTime
          , 'leave_time': leaveTime
        }
    }).done(function(data) {

        if (data.hasOwnProperty('errors')) {
            set_errors(data.errors);
        }

        if (data.result) {

            // モーダル表示時にbody自動的に付与されるクラスを削除する
            $('body').removeClass('modal-open');
            // モーダル表示時の背景を元に戻す
            $('.modal-backdrop').remove();
            // モーダルを閉じる
            $('#attendance-detail-modal').modal('hide');

            $('#save-success-modal').modal();
        }

    }).fail(function(reason) {

        // モーダル表示時にbody自動的に付与されるクラスを削除する
        $('body').removeClass('modal-open');
        // モーダル表示時の背景を元に戻す
        $('.modal-backdrop').remove();
        // モーダルを閉じる
        $('#attendance-detail-modal').modal('hide');

        console.error(reason);
        $('#save-error-modal').modal();
    });

});

/**
 * 更新成功モーダルを閉じたとき画面の更新を走らせる
 */
$('#save-success-modal').on('hidden.bs.modal', function() {
    location.reload();
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