<?= $head; ?>
<div class="page-content">
	<div class="row">

		<div class="col-md-12">
			<div class="heading-large mb10">法人編集</div>
		</div>

		<div class="col-md-12 mb80">
			<div class="content-box mb10">
				<div class="company-name-area show-company-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3">
							<label>法人名</label>
						</div>
						<div class="col-md-5">
							<?= $company['company_name']; ?>
						</div>
					</div>
				</div>

				<div class="company-name-kana-area show-company-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3">
							<label>法人名(カナ)</label>
						</div>
						<div class="col-md-5">
							<?= $company['company_name_kana']; ?>
						</div>
					</div>
				</div>

				<div class="tel-area show-company-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3">
							<label>電話番号</label>
						</div>
						<div class="col-md-5">
							<?= $company['tel']; ?>
						</div>
					</div>
				</div>

				<div class="mail-address-area show-company-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3">
							<label>メールアドレス</label>
						</div>
						<div class="col-md-5">
							<?= $company['mail_address']; ?>
						</div>
					</div>
				</div>
				
				<div class="zip-area show-company-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3">
							<label>郵便番号</label>
						</div>
						<div class="col-md-5">
							<?= $company['zip']; ?>
						</div>
					</div>
				</div>

				<div class="show-company-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3 mb50">
							<label>住所</label>
						</div>
						<div class="col-md-5">
							<?= $company['address']; ?>
						</div>
					</div>
				</div>					
			</div>
		</div>
	</div>
</div>