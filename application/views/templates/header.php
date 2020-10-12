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
				<div class="col-lg-4">
					<input type="text" class="form-control" />
				</div>
				<div class="col-lg-2">
					<button type="button" class="btn btn-default btn-block">search</button>
				</div>
				<div class="col-lg-offset-1 col-lg-1">
					
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#sign-up-modal">
						<span class="glyphicon glyphicon-plus-sign"></span>
						sign up</button>
				</div>
				<div class="col-lg-1">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#log-in-modal">
						<span class="glyphicon glyphicon-log-in"></span>
						log in</button>
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
		<div id="sign-up-modal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">please enter the required information</h5>
			  </div>
			  <div class="modal-body">
				<form action="#">
				<button class="btn btn-link">
					<span class="glyphicon glyphicon-user"></span>
					insert profile image
				</button>
				<div class="form-group">
				<input type="text" class="form-control" placeholder="user name"/>
				</div>
				<div class="form-group">
				<input type="text" class="form-control" placeholder="full name"/>
				</div>
				<div class="form-group">
				<input type="text" class="form-control" placeholder="e-mail"/>
				</div>
				<div class="form-group">
				<input type="text" class="form-control" placeholder="preference"/>
				</div>
				<div class="form-group">
				<input type="text" class="form-control" placeholder="password"/>
				</div>
				<div class="form-group">
				<input type="text" class="form-control" placeholder="confirm password"/>
				</div>
				<div class="row">
				<div class="col-lg-offset-4 col-lg-4">
				<button type="button" class="btn btn-default btn-block">sign up</button>
				</div>
				</div>
				</form>
			  </div>
			</div>
		  </div>
		</div>
		<div id="log-in-modal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Log in</h4>
			  </div>
			  <div class="modal-body">
				<form action="#">
				<span class="glyphicon glyphicon-user"></span>
				<div class="form-group">
				<input type="text" class="form-control" placeholder="user name"/>
				</div>
				<div class="form-group">
				<input type="text" class="form-control" placeholder="password"/>
				</div>
				<div class="row">
				<div class="col-lg-offset-4 col-lg-4">
				<button type="button" class="btn btn-default btn-block">log in</button>
				</div>
				</form>
				</div>
			  </div>
			  <div class="modal-footer">
				<a href="#" class="btn btn-link pull-left" data-toggle="modal" data-dismiss="modal" data-target="#reset-password-modal">forgot password</a>
				<a href="#" class="btn btn-link pull-right" data-toggle="modal" data-dismiss="modal" data-target="#sign-up-modal">
					<span class="glyphicon glyphicon-plus-sign"></span>
					sign up
				</a>
			  </div>
			</div>
		  </div>
		</div>
		<div id="reset-password-modal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Reset password</h4>
			  </div>
			  <div class="modal-body">
				<form action="#">
				<div class="form-group">
				<input type="text" class="form-control" placeholder="enter your email here"/>
				</div>
				<div class="form-group ">
				<h5>code have been sent to your email</h5>
				<input type="text" class="form-control" placeholder="enter the code here"/>
				</div>
				<div class="form-group">
				<input type="text" class="form-control" placeholder="enter the new password"/>
				</div>
				<div class="form-group">
				<input type="text" class="form-control" placeholder="re-enter the password"/>
				</div>
				<div class="row">
				<div class="col-lg-offset-4 col-lg-4">
				<button type="button" class="btn btn-default btn-block">save</button>
				</div>
				</form>
				</div>
			  </div>
			</div>
		  </div>
		</div>