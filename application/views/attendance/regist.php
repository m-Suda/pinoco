<?= $head; ?>
<div class="page-content">
	<div class="row">
		<div class="col-md-12">
			<div class="heading-large mb10">勤怠登録</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-5 ml60">
			<canvas id="clock-id"></canvas>
		</div>
		<div class="col-md-offset-1 col-md-5 mt120">
			<h5 id="today"></h5>
			<h5 id="clock-digital"></h5>
		</div>
	</div>
	<div class="row mt60 mb50 btn-position">
		<span class="square_btn" id="arrival-btn" data-toggle="popover" title="Notice" data-content="" data-placement="top"> <i class="fas fa-sign-in-alt"></i> 出勤 </span>
		<span class="square_btn" id="leave-btn" data-toggle="popover" title="Notice" data-content="" data-placement="top"> <i class="fas fa-sign-out-alt"></i> 退勤 </span>
		<span class="square_btn" id="confirm-btn"> <i class="far fa-clock"></i> 確認 </span>
	</div>
</div>

<!-- 勤怠詳細確認モーダル -->
<div class="modal fade" id="day-report-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form>
                        <div class="row">
                            <div class="col-md-2 mt40">
                                <label>日報</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb30">
                                <textarea id="day-report" cols="70" rows="10" style="resize: vertical; border-radius: 5px;"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt10">
                                <div class="alert alert-danger" id="error-day-report" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <span class="cancel-btn" data-dismiss="modal">キャンセル</span>
                <span class="save-btn" id="start-update">保存する</span>
            </div>
        </div>
    </div>
</div>


<!-- 勤怠詳細確認モーダル -->
<div class="modal fade" id="attendance-confirm-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form>
                        <div class="row">
                            <div class="col-md-2 mt40">
                                <label>出勤時間</label>
                            </div>
                            <div class="col-md-2 mt40">
                                <label>退勤時間</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 mb40">
                                <input type="text" class="form-control" id="arrival-time" readonly>
                            </div>
                            <div class="col-md-2 mb40">
                                <input type="text" class="form-control" id="leave-time" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>日報</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb30">
                                <textarea id="day-report-confirm" cols="70" rows="10" style="resize: vertical; border-radius: 5px;" disabled></textarea>
                            </div>
                        </div>
                    </form>
                    <input type="hidden" id="day">
                </div>
            </div>
            <div class="modal-footer">
                <span class="cancel-btn" data-dismiss="modal">戻る</span>
            </div>
        </div>
    </div>
</div>
