function dispLoading(place){

    var dispMsg = "<div class='loadingMsg'></div>";

    // ローディング画像が表示されていない場合のみ表示
    if($("#loading").size() == 0){
        $("#"+place).append("<div id='loading'>"+ dispMsg +"</div>");

    }
}

// Loadingイメージ削除関数
function removeLoading(){
	$("#loading").remove();
}

function addComma() {
	var num;
	$(".num-class").map(function(){
		num = removeComma($(this).val());
		while(num != (num = num.replace(/^(-?\d+)(\d{3})/, "$1,$2")));
		$(this).val(num);
		return;
	});
}
//カンマ除去
function removeComma(val) {
	return new String(val).replace(/,/g, "");
}


//値を追加(代入先のID,代入する値,連結文字(デフォルト値：))
function addValue(place,value,pre) {
	var str = $('#'+place).val();
	if(!pre){
		pre = '';
	}
	if(!str){
		$('#'+place).val(value);
	} else {
		if(str.slice(-1) == pre || str.slice(-1) =='\n'){
			str = str + value;
		} else {
			str = str + pre +value;
		}
		$('#'+place).val(str);
	}
};

$(function() {
	$(".tool-tip").tooltip({});

	$('.date').datepicker({
				locale: 'ja',
				format : 'YYYY/MM/DD',
				useCurrent:false,
				showClear:true,
				showTodayButton:true
	});

	//radio_checkボタン外せるようにする
	$(".radio-class").click(function () {

		var value = $(this).children().prop("checked");

		if(value) {

			$(this).children().prop('checked',false);
			$(this).removeClass("active");
			event.preventDefault();
			event.stopPropagation();

			return;
		}
	});

	//郵便番号ハイフン自動付与
	$(".postal-class").blur(function () {
		var value = $(this).val();

		if(value) {
			if( (value.match(/^\d{3}-?\d{4}$/)) ){
				if (value.match(/^\d{7}$/)){
					value = value.slice(0,3) + '-' + value.slice(3);
					$(this).val(value);
				}
			}
			return;
		}
	});

	//カンマ自動付与
	$(".num-class").blur(function () {
		var num = removeComma($(this).val());
		while(num != (num = num.replace(/^(-?\d+)(\d{3})/, "$1,$2")));
		$(this).val(num);
	});

	$(document).keydown(function(event){
		// クリックされたキーのコード
		var keyCode = event.keyCode;
		// Ctrlキーがクリックされたか (true or false)
		var ctrlClick = event.ctrlKey;
		// Altキーがクリックされたか (true or false)
		var altClick = event.altKey;
		// キーイベントが発生した対象のオブジェクト
		var obj = event.target;

			// バックスペースキーを制御する
			if(keyCode == 8){
				// テキストボックス／テキストエリアを制御する
				if(obj.tagName == "INPUT" || obj.tagName == "TEXTAREA"){
					return true;

				}
				return false;
			}

			// Alt + ←→を制御する
			if(altClick && (keyCode == 37 || keyCode == 39)){
				return false;
		}
	});
	
	//まだ使用不可のボタン
	$('.yet').click(function(){
		$(this).addClass("tada animated").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			$(this).removeClass("tada animated");
		});
	});
});