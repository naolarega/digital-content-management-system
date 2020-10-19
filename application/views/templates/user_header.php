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
					<a class="home-link" href="/" >digital content distribution</a>
				</div>
				<div class="col-lg-offset-7 col-lg-2">
					<div class="dropdown">
						<?php
							if(get_cookie('dcms_username') != null){
								echo 
								'<span class="badge">0</span>
								<span>';
								echo get_cookie('dcms_username').'</span>';
							}
						?>
						<?php
						if(get_cookie('dcms_username') != null){
						echo '
						<button type="button" class="btn btn-default pull-right" data-toggle="dropdown">
							<span class="glyphicon glyphicon-user"></span>
							profile
						</button>
						<ul class="dropdown-menu">';
						}	
						if($type == 'admin' and get_cookie('dcms_username') != null){
							echo '<li><a href="/sign_up/admin"><span class="glyphicon glyphicon-plus"></span> add admin</a></li>
							';
						}
						if(get_cookie('dcms_username') != null){
						echo '
							<li><a href="/'.$type.'/setting"><span class="glyphicon glyphicon-edit"></span> update</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-remove"></span> delete account</a></li>
							<li><a href="/log_out"><span class="glyphicon glyphicon-log-out"></span> log out</a></li>
						</ul>';
						}
						if(get_cookie('dcms_username') == null){
						echo '
						<a class="btn btn-default pull-right" href="/log_in">
							<span class="glyphicon glyphicon-log-in"></span>
							log in
						</a>';
						}
						?>
					</div>
				</div>
			</div>
		</div>