<div class="row dashboard-middle-body">
	<div class="col-lg-3">
		<div class="well">
			<?php
			$creator = $creator_info->result()[0];
			?>
			<h4><?php echo $creator->user_name; ?></h4>
			<img width="150" height="150" src="/cdn/images/user-profile/<?php echo $creator->profile_image; ?>" class="img-circle" /><br />
			<a href="#" class="btn btn-default">
				<span class="glyphicon glyphicon-chevron-left"></span>
				Leave
			</a>
		</div>
	</div>