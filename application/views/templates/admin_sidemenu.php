<div class="row dashboard-middle-body">
	<div class="col-lg-3">
		<div class="side-well well">
			<ul class="nav nav-pills nav-stacked">
				<?php 
					if($access_level['user']){
						if($page =='user'){
							echo '<li class="active">';
						}	
						else{
							echo '<li>';
						}
						echo '<a class="content-link" href="/admin/user" class="text-center">';
						echo '<span class="glyphicon glyphicon-user"></span> user</a></li>';
					}
				?>
				<?php
					if($access_level['comment']){
						if($page =='comment'){
							echo '<li class="active">';
						}
						else{
							echo '<li>';
						}
						echo '<a class="content-link" href="/admin/comment" class="text-center">';
						echo '<span class="glyphicon glyphicon-comment"></span> comment</a></li>';
					}
				?>
				<?php
					if($access_level['content']){
						if($page =='content'){
							echo '<li class="active">';
						}
						else{
							echo '<li>';
						}
						echo '<a class="content-link" href="/admin/content" class="text-center">';
						echo '<span class="glyphicon glyphicon-file"></span> content</a></li>';
					}
				?>
				<li class="divider"></li>
				<?php if($page =='setting')echo '<li class="active">';
						else echo '<li>'?><a class="content-link" href="/admin/setting" class="text-center">
						<span class="glyphicon glyphicon-cog"></span> setting</a></li> 
			</ul>
		</div>
	</div>