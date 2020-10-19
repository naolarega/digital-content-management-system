<div class="row dashboard-middle-body">
	<div class="col-lg-3">
		<div class="well">
			<ul class="nav nav-pills nav-stacked">
				<?php if($page =='video')echo '<li class="active">';
						else echo '<li>'?><a href="/creator/video" class="text-center">video</a></li> 
				<?php if($page =='music')echo '<li class="active">';
						else echo '<li>'?><a href="/creator/music" class="text-center">music</a></li> 
				<?php if($page =='image')echo '<li class="active">';
						else echo '<li>'?><a href="/creator/image" class="text-center">image</a></li> 
				<?php if($page =='app')echo '<li class="active">';
						else echo '<li>'?><a href="/creator/app" class="text-center">app</a></li> 
				<?php if($page =='book')echo '<li class="active">';
						else echo '<li>'?><a href="/creator/book" class="text-center">book</a></li>  
				<li class="divider"></li>
				<?php if($page =='setting')echo '<li class="active">';
						else echo '<li>'?><a href="/creator/setting" class="text-center">setting</a></li> 
			</ul>
			<?php
			if(isset($error)){
				if($error == 'uploaded successfuly'){
					echo '<div class="alert alert-success">
					<strong>Success!</strong> '.$page.' uploaded successfuly.
					</div>';
				}
			}
			?>
		</div>
	</div>