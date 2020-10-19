<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Digital content management system</title>
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/assets/css/custom.css" />
		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/assets/js/popper.min.js"></script>
	</head>
	<body>
		<div class="header">
			<div class="row">
				<div class="col-lg-3 brand">
					<span class="glyphicon glyphicon-globe"></span>
					<a class="home-link" href="/video" >digital content distribution</a>
				</div>
				<?php echo validation_errors(); ?>
				<?php echo form_open($page.'/search'); ?>
				<div class="col-lg-4">
					<input name="search" type="text" class="form-control" />
				</div>
				<div class="col-lg-2">
					<button type="submit" class="btn btn-default btn-block">search</button>
				</div>
				<div class="col-lg-offset-2 col-lg-1">
				</form>
				<?php
					if($page == 'sign_up' and $is_loged_in == false){
					echo '
					<a class="btn btn-default" href="/log_in">
						<span class="glyphicon glyphicon-log-in"></span>
						log in
					</a>';
					}
					else if($page == 'log_in' and $is_loged_in == false){
					echo '
					<a class="btn btn-default" data-toggle="modal" data-target="#sign_up_option_modal">
						<span class="glyphicon glyphicon-plus-sign"></span>
						sign up
					</a>';
					}
					else if($is_loged_in == true){
					echo '
					<a class="btn btn-default" href="/log_out">
						<span class="glyphicon glyphicon-log-out"></span>
						log out
					</a>';
					}
					else{
					echo '
					<a class="btn btn-default" href="/log_in">
						<span class="glyphicon glyphicon-log-in"></span>
						log in
					</a>';
					}
				?>
				</div>
			</div>
		</div>
		<div class="content-tabs">
			<ul class="nav nav-pills nav-justified">
				<?php if($page =='video')echo '<li class="active">';
						else echo '<li>'?><a class="content-link" href="/video">videos</a></li>
				<?php if($page =='music')echo '<li class="active">';
						else echo '<li>'?><a class="content-link" href="/music">musics</a></li>
				<?php if($page =='image')echo '<li class="active">';
						else echo '<li>'?><a class="content-link" href="/image">images</a></li>
				<?php if($page =='app')echo '<li class="active">';
						else echo '<li>'?><a class="content-link" href="/app">apps</a></li>
				<?php if($page =='book')echo '<li class="active">';
						else echo '<li>'?><a class="content-link" href="/book">books</a></li>
			</ul>
		</div>