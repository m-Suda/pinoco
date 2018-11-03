<?= $head; ?>
<div class="page-content">
	<div class="row">
		<div class="col-md-12">
			<div class="heading-large mb10">勤怠一覧</div>
		</div>
		<div class="col-md-12 mb80">
			<div class="content-box table-responsive">
				<div class="col-md-offset-8 col-md-4 mt20 mb20">
					<select class="form-control" id="date-list" data-toggle="tooltip" data-placement="bottom" title="変更するとその月の勤怠一覧を表示します。">
						<?php foreach ($date_list as $date): ?>
							<option value="<?= $date ?>" <?= ($date === $show_month ? 'selected' : ''); ?>><?= $date ?></option>
						<?php endforeach; ?>
					</select>
				</div>

				<table class="table table-striped table-bordered table-hover" style="table-layout:fixed;">
					<div class="text-center">
						<h5><?= $user_name; ?> <?= $current_month; ?></h5>
					</div>					
					<thead class="th-color">
						<tr>
							<th class="w80">日付</th>
							<th class="">出勤時間</th>
							<th class="">勤怠時間</th>
							<th class="w80"	><!-- 編集ボタン --></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($show_attend_list as $day => $attendance) : ?>
							<tr>
								<td class="vcenter">
									<?= $day; ?>
								</td>
								<td class="vcenter">
									<?= $attendance['arrival_time']; ?>
								</td>
								<td class="vcenter">
									<?= $attendance['leave_time']; ?>
								</td>
								<td class="vcenter" align="center">
									<span class="show-attendance-btn"
                                          data-day="<?= $day; ?>"
                                          data-arrival-time="<?= $attendance['arrival_time']; ?>"
                                          data-leave-time="<?= $attendance['leave_time']; ?>"
                                          data-day-report="<?= $attendance['day_report'] ?>"><i class="fas fa-list"></i></span>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="user_id" data-id="<?= $user_id ?>"></input>

<!-- 勤怠詳細確認モーダル -->
<div class="modal fade" id="attendance-detail-modal" tabindex="-1">
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
                                <input type="time" class="form-control" id="arrival-time">
                            </div>
                            <div class="col-md-2 mb40">
                                <input type="time" class="form-control" id="leaving-time">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt10">
                                <div class="alert alert-danger" id="error-attendance-time" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>日報</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb30">
                                <textarea id="day-report" cols="70" rows="10" style="resize: vertical; border-radius: 5px;" readonly></textarea>
                            </div>
                        </div>
                    </form>
                    <input type="hidden" id="day">
                </div>
			</div>
			<div class="modal-footer">
				<span class="cancel-btn" data-dismiss="modal">キャンセル</span>
				<span class="save-btn" id="start-update">保存する</span>
			</div>
		</div>
	</div>
</div>

<!-- 保存成功モーダル -->
<div class="modal fade" id="save-success-modal" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				保存しました。
			</div>
			<div class="modal-footer">
				<span class="cancel-btn" data-dismiss="modal">閉じる</span>
			</div>
		</div>
	</div>
</div>

<!-- エラーモーダル -->
<div class="modal fade" id="save-error-modal" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                更新に失敗しました。
            </div>
            <div class="modal-footer">
                <span class="cancel-btn" data-dismiss="modal">閉じる</span>
            </div>
        </div>
    </div>
</div>