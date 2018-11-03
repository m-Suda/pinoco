<?= $head; ?>
<div class="page-content">
	<div class="row">

		<div class="col-md-12">
			<div class="heading-large mb10">法人編集</div>
		</div>

		<div class="col-md-12 mb80">
			<div class="content-box mb10">

				<form id="company_form_data">
					<div class="company-name-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>法人名</label>
							</div>
							<div class="col-md-5">
								<input type="text" class="form-control" name="company_name" placeholder="法人名" value="<?= $company['company_name']; ?>">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-company-name" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>

					<div class="company-name-kana-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>法人名(カナ)</label>
							</div>
							<div class="col-md-5">
								<input type="text" class="form-control" name="company_name_kana" placeholder="法人名(カナ)" value="<?= $company['company_name_kana']; ?>">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-company-name-kana" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>

					<div class="tel-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>電話番号</label>
							</div>
							<div class="col-md-5">
								<input type="text" class="form-control" name="tel" placeholder="00011112222" value="<?= $company['tel']; ?>">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-tel" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>

					<div class="mail-address-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>メールアドレス</label>
							</div>
							<div class="col-md-5">
								<input type="text" class="form-control" name="mail_address" placeholder="mail@example.com" value="<?= $company['mail_address']; ?>">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-mail-address" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="zip-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>郵便番号</label>
							</div>
							<div class="col-md-5">
								<input type="text" class="form-control" name="zip" placeholder="0001111" value="<?= $company['zip']; ?>">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-zip" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>

					<div class="address-area new-input-component">
						<div class="row">
							<div class="col-md-offset-3 col-md-3">
								<label>住所</label>
							</div>
							<div class="col-md-5">
								<input type="text" class="form-control" name="address" placeholder="住所" value="<?= $company['address']; ?>">
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6 mt10">
                                <div class="alert alert-danger" id="error-address" role="alert" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="row new-page-button">
						<div class="col-md-6 text-center">
							<span class="backpage-btn">戻る</span>
						</div>
						<div class="col-md-6 text-center">
							<span class="save-btn" data-toggle="modal" data-target="#create-entry-modal">保存する</span>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<!-- 保存確認モーダル -->
<div class="modal fade" id="create-entry-modal" tabindex="-1">
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
				<span class="save-btn" id="start-create">保存する</span>
			</div>
		</div>
	</div>
</div>