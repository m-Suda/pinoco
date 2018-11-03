<?= $head; ?>
<div class="page-content">
	<div class="row">
		<div class="col-md-12">
			<div class="heading-large mb10">法人管理</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mb80">
			<div class="content-box mb10 table-responsive">
				<table class="table table-striped table-bordered table-hover" style="table-layout:fixed;">
					<thead class="th-color">
						<tr>
							<th class="w80"	>ID</th>
							<th class=""	>法人名</th>
							<th class="w110">電話番号</th>
							<th class=""	>メールアドレス</th>
							<th class="w60"	><!-- 編集ボタン --></th>
							<th class="w60"	><!-- 削除ボタン --></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($company_list as $company) : ?>
						<tr>
							<td class="vcenter">
								<?= $company['company_id']; ?>
							</td>
							<td class="vcenter">
								<?= $company['company_name']; ?>
							</td>
							<td class="vcenter">
								<?= $company['tel']; ?>
							</td>
							<td class="vcenter">
								<?= $company['mail_address']; ?>
							</td>
							<td class="vcenter" align="center">
								<span class="edit-btn" data-id="<?= $company['company_id'] ?>"><i class="far fa-edit fa-lg"></i></span>
							</td>
							<td class="vcenter" align="center">
								<span class="delete-btn" data-id="<?= $company['company_id'] ?>" data-toggle="modal" data-target="#delete-entry-modal"><i class="far fa-trash-alt fa-lg"></i></span>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="float-div">
	<div class="container">
		<div class="text-right pb10">
			<span class="create-btn" id="create-user">新規作成</span>
		</div>
	</div>
</div>

<!-- 削除確認モーダル -->
<div class="modal fade" id="delete-entry-modal" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				削除しますか？
			</div>
			<input type="hidden" id="delete-company-id" value="">
			<div class="modal-footer">
				<span class="cancel-btn" data-dismiss="modal">キャンセル</span>
				<span class="delete-btn" id="start-delete">削除する</span>
			</div>
		</div>
	</div>
</div>

<!-- 削除成功モーダル -->
<div class="modal fade" id="delete-success-modal" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				削除しました。
			</div>
			<div class="modal-footer">
				<span class="cancel-btn" data-dismiss="modal">閉じる</span>
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