<?= $head; ?>
<div class="page-content">
	<div class="row">
		<div class="col-md-1">
			<div class="heading-large mb10">勤怠管理</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mb80">
			<div class="content-box mb10 table-responsive">
				<table class="table table-striped table-bordered table-hover" style="table-layout:fixed;">
					<thead class="th-color">
						<tr>
							<th class="w80"	>ID</th>
							<th class="w110">ユーザー種別</th>
							<th class=""	>ユーザー名</th>
							<th class="w80"><!-- 勤怠閲覧ボタン --></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($users as $user) : ?>
						<tr>
							<td class="vcenter">
								<?= $user['user_id']; ?>
							</td>
							<td class="vcenter">
								<?= $user['user_type_name']; ?>
							</td>
							<td class="vcenter">
								<?= $user['user_name']; ?>
							</td>
							<td class="vcenter" align="center">
								<span class="edit-attendance-btn" data-id="<?= $user['user_id'] ?>"><i class="far fa-calendar-alt fa-lg"></i></span>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
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