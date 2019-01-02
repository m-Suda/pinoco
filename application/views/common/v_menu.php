<div class="h40">
		<nav class="navbar navbar-default navbar-fixed-top">

				<div class="container-fluid">
						<div class="navbar-header" style="margin-right:20px;">
								<button type="button" class="navbar-toggle collapsed"data-toggle="collapse"data-target="#navbarEexample10">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="<?= base_url();?>logout/">Pinoco</a>
						</div>
						<?php $user_data = $this->session->userdata('user'); ?>
						<div class="collapse navbar-collapse minw1000" id="navbarEexample10">
								<ul class="nav navbar-nav">
									<!-- ユーザー種別：管理者 -->
									<?php if($user_data['user_auth'] === (string)User_constants::ADMINISTRATOR) {?>
										<li class="link">
											<a href="<?= base_url();?>users/" class="" data-toggle="" role="button" aria-expanded="false">ユーザー管理</a>
										</li>
										<li class="link">
											<a href="<?= base_url();?>company/" class="" data-toggle="" role="button" aria-expanded="false">法人管理</a>
										</li>
										<li class="link">
											<a href="<?= base_url();?>attendance/" class="" data-toggle="" role="button" aria-expanded="false">勤怠管理</a>
										</li>
										
									<!-- ユーザー種別：job社員 -->
									<?php } else if($user_data['user_auth'] === (string)User_constants::EMPLOYEE) {?>
										<li class="link">
											<a href="<?= base_url();?>attendance/regist" class="" data-toggle="" role="button" aria-expanded="false">勤怠登録</a>
										</li>
										<li class="link">
											<a href="<?= base_url();?>attendance/show" class="" data-toggle="" role="button" aria-expanded="false">勤怠確認</a>
										</li>
										<li class="link">
											<a href="<?= base_url();?>users/show" class="" data-toggle="" role="button" aria-expanded="false">ユーザー情報</a>
										</li>

									<!-- ユーザー種別：研修生 -->
									<?php } else if($user_data['user_auth'] === (string)User_constants::TRAINEE) {?>
										<li class="link">
											<a href="<?= base_url();?>attendance/regist" class="" data-toggle="" role="button" aria-expanded="false">勤怠登録</a>
										</li>
										<li class="link">
											<a href="<?= base_url();?>attendance/show" class="" data-toggle="" role="button" aria-expanded="false">勤怠確認</a>
										</li>
										<li class="link">
											<a href="<?= base_url();?>users/show" class="" data-toggle="" role="button" aria-expanded="false">研修生情報</a>
										</li>
										<li class="link">
											<a href="<?= base_url();?>company/show" class="" data-toggle="" role="button" aria-expanded="false">法人情報</a>
										</li>
									<?php } ?>
								</ul>
								<div class="tool-tip mr20" data-title="Log Out" data-tooltip-options='{"direction":"right","follow":"true"}'><p class="navbar-text navbar-right">
									<a href="<?= base_url();?>logout/" class="pointer" style="color:white;">Welcome, <b><?= $user_data['user_name']; ?></b>　<i class="fa fa-sign-out" aria-hidden="true"></i></a></p>
								</div>
						</div>
				</div>
		</nav>
</div>