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
						<h5><?= $current_month; ?></h5>
					</div>					
					<thead class="th-color">
						<tr>
							<th class="w80">日付</th>
							<th class="">出勤時間</th>
							<th class="">勤怠時間</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($show_attend_list as $day => $attendance) : ?>
							<tr data-toggle="tooltip" title="<?=$attendance['day_report']; ?>">
								<td class="vcenter">
									<?= $day; ?>
								</td>
								<td class="vcenter">
									<?= $attendance['arrival_time']; ?>
								</td>
								<td class="vcenter">
									<?= $attendance['leave_time']; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>