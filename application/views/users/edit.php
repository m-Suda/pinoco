<?= $head; ?>
<div class="page-content">
	<div class="row">

		<div class="col-md-12">
			<div class="heading-large mb10">ユーザー編集</div>
		</div>

		<div class="col-md-12 mb80">
			<div class="content-box mb10">

				<form id="user_form_data">
					<div class="login-id-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>ユーザーID</label>
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" name="user_id" placeholder="ユーザーID" value="<?= $user['user_id']; ?>" readonly>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-user-id" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>

					<div class="name-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>名前</label>
                                <label style="color: red"> <必須></label>
                            </div>
							<div class="col-md-3">
								<input type="text" class="form-control" name="user_name" placeholder="名前" value="<?= $user['user_name']; ?>">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-user-name" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>

					<div class="user-type-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>ユーザー種別</label>
                                <label style="color: red"> <必須></label>
                            </div>
							<div class="col-md-3">
								<select class="form-control" name="user_type">
									<option value="0">-----</option>
									<?php foreach($user_type_list as $key => $value) :?>
										<option value="<?= $key; ?>" <?= ((string)$key === $user['user_type']) ? 'selected' : ''; ?>><?= $value ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-user-type" role="alert" style="display: none;"></div>
                            </div>
                        </div>


                    </div>

					<div class="company-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>所属法人</label>
                                <label style="color: red"> <必須></label>
                            </div>
							<div class="col-md-3">
								<select class="form-control" name="company_id">
									<option value="0">-----</option>
									<?php foreach($company_list as  $value) :?>
										<option value="<?= $value['company_id']; ?>" <?= ($user['company_id'] === $value['company_id']) ? 'selected' : ''; ?>><?= $value['company_name'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-company-id" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>

					<div class="mail-address-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>メールアドレス</label>
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" name="mail_address" placeholder="mail@example.com" value="<?= $user['mail_address']; ?>">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-mail-address" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="start-date-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>研修開始日</label>
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" name="start_date" placeholder="20xx0101" value="<?= $user['start_date']; ?>">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-start-date" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>

					<div class="end-date-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>研修終了日</label>
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" name="end_date" placeholder="20xx0101" value="<?= $user['end_date']; ?>">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-end-date" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>

					<div class="password-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>パスワード</label>
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" name="password" placeholder="パスワード">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-password" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>

					<div class="confirm-password-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>パスワード(確認)</label>
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" name="confirm_password" placeholder="パスワード(確認)">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-confirm-password" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="row new-page-button">
						<div class="col-md-6 text-center">
							<span class="backpage-btn">戻る</span>
						</div>
						<div class="col-md-6 text-center">
							<span class="save-btn" data-toggle="modal" data-target="#update-entry-modal">保存する</span>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<!-- 保存確認モーダル -->
<div class="modal fade" id="update-entry-modal" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				保存しますか？
			</div>
			<div class="modal-footer">
				<span class="cancel-btn" data-dismiss="modal">キャンセル</span>
				<span class="save-btn" id="start-update">保存する</span>
			</div>
		</div>
	</div>
</div>