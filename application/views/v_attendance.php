<!DOCTYPE html>
<html>
		<head>
				<title>勤怠登録</title>
				<?= $head; ?>
				<?= $js; ?>
		</head>

		<body>
				<?= $menu; ?>
				<div class="page-content">
						<div class="row">
								<div class="col-md-12">
										<div class="heading-large mb10">勤怠登録</div>
								</div>
						</div>
				</div>
				<h5>今日は<?= $attend_record['today'] ?></h5><br>
				<?php if (empty($attend_record['arrival_time'])) : ?>
					<h6>出勤時間　：　-</h6>
				<?php else : ?>
					<h6>出勤時間　：　<?= $attend_record['arrival_time'] ?></h6>
				<?php endif;?>
				<?php if (empty($attend_record['leave_time'])) : ?>
					<h6>退勤時間　：　-</h6>
				<?php else : ?>
					<h6>退勤時間　：　<?= $attend_record['leave_time'] ?></h6>
				<?php endif;?>
				<?php if (empty($attend_record['arrival_time']) && empty($attend_record['leave_time'])) : ?>
					<a class="btn btn-info" href="attendance/arrival" role="button"><i class="fa fa-check-circle" aria-hidden="true"></i>　出勤　</a>
				<?php elseif (!empty($attend_record['arrival_time']) && empty($attend_record['leave_time'])) : ?>
					<a class="btn btn-primary" href="attendance/leaving" role="button"><i class="fa fa-check-circle" aria-hidden="true"></i>　退勤　</a>
				<?php elseif (!empty($attend_record['leave_time'])) : ?>
				<button type="button" class="btn btn-success yet"  id=""><i class="fa fa-check-circle" aria-hidden="true"></i>　お疲れ様でした　</button>
				<?php endif;?>
				<div class="float-div">
						<div class="container">
								<div class="text-right pb10">
								<button type="button" class="btn btn-info"  id=""><i class="fa fa-check-circle" aria-hidden="true"></i> 特にない</button>
								</div>
						</div>
				</div>

		<script type="text/javascript">
		</script>
		</body>
</html>

