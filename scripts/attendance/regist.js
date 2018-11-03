// BASE_URLの取得
const BASE_URL = $('#base-url').data('base-url');

// エラーメッセージ要素を格納
var $error_elements = {
    'day_report': $('#error-day-report')
};

$('[data-toggle="popover"]').popover();

// 時計を1秒ごとに描画する
$(function() {
	showDate();
	setInterval(clockDigital, 1000);
	setInterval(clock, 1000);
})

// 本日の日付を表示する
function showDate() {
	var now = new Date();
	var year = now.getFullYear();
	var month = joinZero(now.getMonth() + 1);
	var date = joinZero(now.getDate());
	// var day = '(' + getDay(now.getDay()) + ')';
	var day = getDay(now.getDay());

	var today = year + '-' + month + '-' + date + ' ' + day;

	$('#today').html(today);
}

// 曜日を返却する
function getDay(day) {
	return ['Sun.', 'Mon.', 'Tue.', 'Wed.', 'Thurs.', 'Fri.', 'Sat.'][day];
}

// デジタル時計を変化させる
function clockDigital() {
	var date = new Date();
	var h = joinZero(date.getHours());
	var m = joinZero(date.getMinutes());
	var s = joinZero(date.getSeconds());

	var time = h + ':' + m + ':' + s;

	$('#clock-digital').html(time);
}

// 1桁の場合は0を先頭に入れて返却する
function joinZero(x) {
	return (x < 10) ? '0' + x : x;
}

// アナログ時計を描画する
// 参考サイト：[https://qiita.com/okuchan/items/3c6908c5c90e5a70deab]
function clock() {
	
		// 円のスタイルを定義する
		var circle = {
			outer: {
				radius: 0.9
			  , color: "#66ff99"
			},
			inner: {
				radius: 0.87
			  , color: "#99ff99"
			}
		};

		// 針のスタイルを設定する
		var hands = {
			hour: {
				length  : 0.5
			  , width   : 9
			  , cap     : "round"
			  , color   : "#fffafa"
			  , ratio   : 0.2				
			},
			minute: {
				length  : 0.8
			  , width   : 6
			  , cap     : "round"
			  , color   : "#fffafa"
			  , ratio   : 0.2
			},
			second: {
				length  : 0.8
			  , width   : 2
			  , cap     : "round"
			  , color   : "#fffafa"
			  , ratio   : 0.2
			}
		}
	
		// キャンバスを設定する
		var canvas = document.getElementById('clock-id');
		canvas.width = 400;
		canvas.height = 400;
		var ctx = canvas.getContext('2d');
		var center = {
			x: canvas.width / 2
		  , y: canvas.height / 2
		};
		var radius = center.x;
		var angle;
		var len;

		// 円を描画する
		ctx.beginPath();
		ctx.fillStyle = circle.outer.color;
		ctx.arc(center.x, center.y, radius * circle.outer.radius, 0, Math.PI * 2, false);
		ctx.fill();
		ctx.beginPath();
		ctx.fillStyle = circle.inner.color;
		ctx.arc(center.x, center.y, radius * circle.inner.radius, 0, Math.PI * 2, false);
		ctx.fill();

		// 現在時刻を取得する
		var date = new Date();
		var h = date.getHours() % 12;
		var m = date.getMinutes();
		var s = date.getSeconds();

		// 時針を描画する
		angle = Math.PI * (h + m / 60) / 6;
		len = radius * hands.hour.length;
		ctx.beginPath();
		ctx.lineWidth = hands.hour.width;
		ctx.lineCap = hands.hour.cap;
		ctx.strokeStyle = hands.hour.color;
		ctx.moveTo(center.x - Math.sin(angle) * len * hands.hour.ratio, center.y + Math.cos(angle) * len * hands.hour.ratio);
		ctx.lineTo(center.x + Math.sin(angle) * len, center.y - Math.cos(angle) * len);
		ctx.stroke();

		// 分針を描画する
		angle = Math.PI * (m + s / 60) / 30;
		len = radius * hands.minute.length;
		ctx.beginPath();
		ctx.lineWidth = hands.minute.width;
		ctx.lineCap = hands.minute.cap;
		ctx.strokeStyle = hands.minute.color;
		ctx.moveTo(center.x - Math.sin(angle) * len * hands.minute.ratio, center.y + Math.cos(angle) * len * hands.minute.ratio);
		ctx.lineTo(center.x + Math.sin(angle) * len, center.y - Math.cos(angle) * len);
		ctx.stroke();

		// 秒針を描画する
		angle = Math.PI * s / 30;
		len = radius * hands.second.length;
		ctx.beginPath();
		ctx.lineWidth = hands.second.width;
		ctx.lineCap = hands.second.cap;
		ctx.strokeStyle = hands.second.color;
		ctx.moveTo(center.x - Math.sin(angle) * len * hands.second.ratio, center.y + Math.cos(angle) * len * hands.second.ratio);
		ctx.lineTo(center.x + Math.sin(angle) * len, center.y - Math.cos(angle) * len);
		ctx.stroke();
}

/**
 * 出勤ボタン押下時の処理
 */
$('#arrival-btn').on('click', function() {

	// popoverをイベントのみで表示させたいためクリックでは表示させない
    $('#arrival-btn').popover('hide');

	$.ajax({
		url: BASE_URL + 'attendance/attend_data_check/arrival'
	  , type: 'POST'
	  , dataType: 'json'
	}).done(function(data) {

		if (data.result) {
			// 勤怠登録処理
			arrival_registration();

            $('#arrival-btn').attr('data-content', '出勤しました!今日も1日頑張りましょう！');
            $('#arrival-btn').popover('show');
            setTimeout(function(){
                $('#arrival-btn').popover('hide');
            }, 3000);

			return;
		}

		// 出勤されていた場合はポップオーバーを表示し、3秒後に閉じる
        $('#arrival-btn').attr('data-content', '既に出勤しています。');
        $('#arrival-btn').popover('show');
		setTimeout(function(){
            $('#arrival-btn').popover('hide');
		}, 3000);

	}).fail(function(error) {

	});
});

/**
 * 退勤ボタン押下時の処理
 */
$('#leave-btn').on('click', function() {

    // popoverをイベントのみで表示させたいためクリックでは表示させない
    $('#leave-btn').popover('hide');

    $.ajax({
        url: BASE_URL + 'attendance/attend_data_check/leave'
        , type: 'POST'
        , dataType: 'json'
    }).done(function(data) {

		if (data.result == 'notYet') {
            $('#leave-btn').attr('data-content', '出勤ボタンが押されていません。');
            $('#leave-btn').popover('show');
            setTimeout(function(){
                $('#leave-btn').popover('hide');
            }, 3000);

            return;
		}

		if (data.result == 'already') {
            $('#leave-btn').attr('data-content', '既に退勤されています。');
            $('#leave-btn').popover('show');
            setTimeout(function(){
                $('#leave-btn').popover('hide');
            }, 3000);

            return;
		}

		// 日報入力モーダルのエラーメッセージを消す
        $('#error-day-report').css('display', 'none');
        // 退勤処理を継続できるなら、日報入力のモーダルを表示する
		$('#day-report-modal').modal();

    }).fail(function(reason) {

    	console.error(reason);

    });
});

/**
 * 出勤処理
 */
function arrival_registration() {

    $.ajax({
        url: BASE_URL + 'attendance/attendance_registration'
        , type: 'POST'
    }).done(function(data) {
		console.log('出勤処理に成功しました！');
    }).fail(function(error) {
		console.log('出勤処理に失敗しました。');
    });

}

/**
 * 退勤処理
 */
$('#start-update').on('click', function() {

    $.ajax({
        url: BASE_URL + 'attendance/leaving_registration'
        , type: 'POST'
		, dataType: 'json'
		, data: {
        	'day_report': $('#day-report').val()
		}
    }).done(function(data) {

        if (data.hasOwnProperty('errors')) {
            set_errors(data.errors);
            return;
        }

        if (!data.result) {
        	return;
		}

		// モーダル表示時にbody自動的に付与されるクラスを削除する
		$('body').removeClass('modal-open');
		// モーダル表示時の背景を元に戻す
		$('.modal-backdrop').remove();
		// モーダルを閉じる
		$('#day-report-modal').modal('hide');

		$('#leave-btn').attr('data-content', '退勤しました！');
		$('#leave-btn').popover('show');
		setTimeout(function(){
			$('#leave-btn').popover('hide');
		}, 3000);

    }).fail(function(reason) {
        console.error(reason);
    });

});

// 勤怠確認ボタン押下処理
$('#confirm-btn').on('click', function() {

    $.ajax({
        url: BASE_URL + 'attendance/fetch_attend_for_confirm'
        , type: 'POST'
		, dataType: 'json'
    }).done(function(data) {

		$('#arrival-time').val(data.arrival_time);
        $('#leave-time').val(data.leave_time);
        $('#day-report-confirm').val(data.day_report);

        $('#attendance-confirm-modal').modal();

    }).fail(function(reason) {
        console.error(reason);
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