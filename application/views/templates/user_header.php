<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Digital content management system</title>
		<link rel="icon" href="/assets/favicon.ico">
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/assets/css/custom.css" />
		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/assets/js/popper.min.js"></script>
		<script type="text/javascript" src="/assets/js/custom.js"></script>
	</head>
	<body>
		<div class="header">
			<div class="row">
				<div class="col-lg-3 brand">
					<span class="glyphicon glyphicon-dashboard"></span>
					<a class="home-link" href="/" >digital content distribution</a>
				</div>
				<?php
					$col_lg = 'col-lg-offset-6 col-lg-3';
					if(get_cookie('dcms_type') != null){
						if(get_cookie('dcms_type') != 1){
							$col_lg = 'col-lg-offset-7 col-lg-2';
						}
					}
				?>
				<div class="<?php echo $col_lg;?>">
					<?php
						if(get_cookie('dcms_username') != null){
							$user = $this->db->get_where('user', array('user_name' => get_cookie('dcms_username')))->result()[0];
							if(get_cookie('dcms_type') == "1"){
								echo '<div class="dropdown" style="display: inline">';
								echo '<button class="btn btn-link dropdown-toggle" type="button" data-toggle="dropdown">
										<span class="badge">'.count($notification).'</span></button>';
								echo '<ul class="dropdown-menu">';
								if(count($notification) > 0)foreach($notification as $notify){
									echo '<li><a href="/'.$notify['content_type'].'/view/'.$notify['content_id'].'">
											<span class="glyphicon glyphicon-chevron-left"></span>'.$notify['content_name'].'</a></li>';
								}
								else  echo '<li><a href="#">no notification</a></li>';
								echo '</ul></div>';
							}
							echo '<span class="name-text">'.get_cookie('dcms_username').'</span>';
							echo '<img width="40" height="40" src="/cdn/images/user-profile/'.$user->profile_image.'" class="img-circle profile-img" />';
						}
					?>
					<div class="dropdown" style="display: inline">
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
							<li><a href="/delete_account"><span class="glyphicon glyphicon-remove"></span> delete account</a></li>
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