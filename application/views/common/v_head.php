<!DOCTYPE html>
<html lang="ja">

	<head>

		<meta charset="utf-8">

		<title><?= $title; ?></title>

		<?php $this->load->model('common/string_util', '', TRUE);?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- ブラウザ互換表示設定(IE8以上から使用可能) -->
		<meta http-equiv="x-ua-compatible" content="IE=edge" >

		<link href="<?= base_url();?>css/bootstrap.css?date=<?php $this->string_util->cacheBuster('css/bootstrap.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/bootstrapValidator.css?date=<?php $this->string_util->cacheBuster('css/bootstrapValidator.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/bootflat.min.css?date=<?php $this->string_util->cacheBuster('css/bootflat.min.css'); ?>" rel="stylesheet">
		<link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" rel="stylesheet">
		<link href="<?= base_url();?>css/system.css?date=<?php $this->string_util->cacheBuster('css/system.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/common.css?date=<?php $this->string_util->cacheBuster('css/common.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/jquery-ui.css?date=<?php $this->string_util->cacheBuster('css/jquery-ui.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/jquery-ui.theme.css?date=<?php $this->string_util->cacheBuster('css/jquery-ui.theme.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/tooltip.css?date=<?php $this->string_util->cacheBuster('css/tooltip.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/simplePagination.css?date=<?php $this->string_util->cacheBuster('css/simplePagination.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/bootstrap-datetimepicker.min.css?date=<?php $this->string_util->cacheBuster('css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/lity.css?date=<?php $this->string_util->cacheBuster('css/lity.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/select2.css?date=<?php $this->string_util->cacheBuster('css/select2.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/select2.min.css?date=<?php $this->string_util->cacheBuster('css/select2.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/classic.css?date=<?php $this->string_util->cacheBuster('css/classic.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/animate.css?date=<?php $this->string_util->cacheBuster('css/animate.css'); ?>" rel="stylesheet">
		<link href="<?= base_url();?>css/styles.css?date=<?php $this->string_util->cacheBuster('css/styles.css'); ?>" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Monda:700" rel="stylesheet">

		<script src="<?= base_url();?>js/jquery.js?date=<?php $this->string_util->cacheBuster('js/jquery.js'); ?>"></script>
		<script src="<?= base_url();?>js/jquery-ui.js?date=<?php $this->string_util->cacheBuster('js/jquery-ui.js'); ?>"></script>
		<script src="<?= base_url();?>js/bootstrap.min.js?date=<?php $this->string_util->cacheBuster('js/bootstrap.min.js'); ?>"></script>
		<script src="<?= base_url();?>js/bootstrapValidator.js?date=<?php $this->string_util->cacheBuster('js/bootstrapValidator.js'); ?>"></script>
		<script src="<?= base_url();?>js/address.js?date=<?php $this->string_util->cacheBuster('js/address.js'); ?>"></script>
		<script src="<?= base_url();?>js/moment.js?date=<?php $this->string_util->cacheBuster('js/moment.js'); ?>"></script>
		<script src="<?= base_url();?>js/bootstrap-datetimepicker.min.js?date=<?php $this->string_util->cacheBuster('js/bootstrap-datetimepicker.min.js'); ?>"></script>
		<script src="<?= base_url();?>js/common.js?date=<?php $this->string_util->cacheBuster('js/common.js'); ?>"></script>
		<script src="<?= base_url();?>js/core.js?date=<?php $this->string_util->cacheBuster('js/core.js'); ?>"></script>
		<script src="<?= base_url();?>js/tooltip.js?date=<?php $this->string_util->cacheBuster('js/tooltip.js'); ?>"></script>
		<script src="<?= base_url();?>js/simplePagination.js?date=<?php $this->string_util->cacheBuster('js/simplePagination.js'); ?>"></script>
		<script src="<?= base_url();?>js/table.js?date=<?php $this->string_util->cacheBuster('js/table.js'); ?>"></script>
		<script src="<?= base_url();?>js/lity.js?date=<?php $this->string_util->cacheBuster('js/lity.js'); ?>"></script>
		<script src="<?= base_url();?>js/select2.js?date=<?php $this->string_util->cacheBuster('js/select2.js'); ?>"></script>
		<script src="<?= base_url();?>js/select2.min.js?date=<?php $this->string_util->cacheBuster('js/select2.min.js'); ?>"></script>
		<script src="<?= base_url();?>js/jquery.columns.min.js?date=<?php $this->string_util->cacheBuster('js/jquery.columns.min.js'); ?>"></script>
		<script src="<?= base_url();?>js/html5shiv.js?date=<?php $this->string_util->cacheBuster('js/html5shiv.js'); ?>"></script>
		<script src="<?= base_url();?>js/respond.min.js?date=<?php $this->string_util->cacheBuster('js/respond.min.js'); ?>"></script>
		<script src="<?= base_url();?>js/site.min.js?date=<?php $this->string_util->cacheBuster('js/site.min.js'); ?>"></script>
		<script src="<?= base_url();?>js/application.js?date=<?php $this->string_util->cacheBuster('js/application.js'); ?>"></script>