//グローバル変数(モーダル中に住所検索モーダルを開くとき用)
var modal_in_flg = 0;
var modal_status =0;


//郵便番号から検索
function ZipSearchInit(){
	var zip;
	if(modal_status == 1){
		zip = $("#designer_zip").val();
	} else if(modal_status == 2) {
		zip = $("#builder_zip").val();
	} else if(modal_status == 3) {
		zip = $("#equip_zip").val();
	} else {
		zip = $("#zip").val();
	}
	search_zip(zip);
}

//郵便番号から検索
function search_zip(zip){
	$.ajax({
			type : 'post'
			,url: "address/search_zip"
			, data: { q: zip}
			, dataType: "json"
			,cache : false
	}).done(function (data) {
		if (modal_status == 1) {
			$('#designer_prefectures').val(data.prefectures_id);
			$('#designer_city').val(data.city);
			$('#designer_street').val(data.address);
		} else if(modal_status == 2) {
			$('#builder_prefectures').val(data.prefectures_id);
			$('#builder_city').val(data.city);
			$('#builder_street').val(data.address);
		} else if(modal_status == 3) {
			$('#equip_prefectures').val(data.prefectures_id);
			$('#equip_city').val(data.city);
			$('#equip_street').val(data.address);
		} else {
			$('#prefectures').val(data.prefectures_id);
			$('#city').val(data.city);
			$('#street').val(data.address);
		}
		$('.address_close').click();
	}).fail(function (jqXHR, textStatus, errorThrown) {
		alert("faile...");
	});
}

//モーダルから行の選択後、値を代入.
function zipInput(post_cd,prefectures_id,city,address) {

	if (modal_status == 1) {
		$('#designer_zip').val(post_cd);
		$('#designer_prefectures').val(prefectures_id);
		$('#designer_city').val(city);
		$('#designer_street').val(address);
	} else if(modal_status == 2) {
		$('#builder_zip').val(post_cd);
		$('#builder_prefectures').val(prefectures_id);
		$('#builder_city').val(city);
		$('#builder_street').val(address);
	} else if(modal_status == 3) {
		$('#equip_zip').val(post_cd);
		$('#equip_prefectures').val(prefectures_id);
		$('#equip_city').val(city);
		$('#equip_street').val(address);
	} else {
		$('#zip').val(post_cd);
		$('#prefectures').val(prefectures_id);
		$('#city').val(city);
		$('#street').val(address);
	}
	$('.address_close').click();
}



$(function () {
	$(document).on("click",'.address-modal-btn',function() {
		$('#address-area').css('display','none');
		$('#tbody-address').children().remove();
		$('.count_msg').text('');
	});

	$(document).on("click",'#addressToZip-btn',function() {
		$('#address-area').css('display','none');
		$('#tbody-address').children().remove();
		$('.count_msg').text('');
		 dispLoading('modal-body');
		$.ajax({
			type : 'post'
			,url: "address/search_address"
			, data: { q: $('#txt_AddressToZip').val()}
			, dataType: "json"
			,cache : false
		}).done(function (data) {
			var msg = data.total_count.toString() + "件";
			$('.count_msg').text((data.total_count > 10) ? msg + "中10件表示" : msg);
			removeLoading();
			if (data.total_count==0) {
				$('#address-area').css('display','none');
			} else {
				$('#address-area').css('display','block');
			}
			var result = $.map(data.address_list, function (item) {
				$('#tbody-address').append('<tr onClick="zipInput(\''+item.post_cd+'\',\''+item.prefectures_id+'\',\''+item.city+'\',\''+item.address+'\');"><td>'+item.post_cd+'</td><td>'+item.all_address+'</td></tr>');
			});
		}).fail(function (jqXHR, textStatus, errorThrown) {
			alert("faile...");
		});
	});

	//郵便番号検索画面を閉じた場合(下記の内容は、モーダル開いている際に、郵便番号検索のモーダル開かれた用)
	$(document).on("click",'.address_close',function() {
		$('.modal-backdrop').css('z-index',1040);
		$('#address-modal').modal('hide');
	});

	//モーダル閉じる際に、二重でモーダルを開いていたとき用の調整.
	$(document).on('hidden.bs.modal', function () {
		if(modal_in_flg == 1) {
			$(document.body).addClass('modal-open');
			modal_in_flg = 0;
		}
	});

});