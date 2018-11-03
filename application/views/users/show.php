<?= $head; ?>
<div class="page-content">
	<div class="row">

		<div class="col-md-12">
			<div class="heading-large mb10">ユーザー情報</div>
		</div>

		<div class="col-md-12 mb80">
			<div class="content-box mb10">

				<div class="login-id-area show-user-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3 mt20">
							<label>ログインID</label>
						</div>
						<div class="col-md-3 mt20">
							<?= $user['user_id']; ?>
						</div>
					</div>
				</div>

				<div class="name-area show-user-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3">
							<label>名前</label>
						</div>
						<div class="col-md-3">
							<?= $user['user_name']; ?>
						</div>
					</div>
				</div>

				<div class="user-type-area show-user-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3">
							<label>ユーザー種別</label>
						</div>
						<div class="col-md-3">
							<?= $user['user_type_name']; ?>
						</div>
					</div>
				</div>

				<div class="company-area show-user-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3">
							<label>所属法人</label>
						</div>
						<div class="col-md-3">
							<?= $user['company_name']; ?>
						</div>
					</div>
				</div>					

				<div class="mail-address-area show-user-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3">
							<label>メールアドレス</label>
						</div>
						<div class="col-md-3">
							<?= $user['mail_address']; ?>
						</div>
					</div>
				</div>
				
				<div class="start-date-area show-user-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3">
							<label>研修開始日</label>
						</div>
						<div class="col-md-3">
							<?= $user['start_date']; ?>
						</div>
					</div>
				</div>

				<div class="end-date-area show-user-component">
					<div class="row">
						<div class="col-md-offset-3 col-md-3 mb30">
							<label>研修終了日</label>
						</div>
						<div class="col-md-3">
							<?= $user['end_date']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>