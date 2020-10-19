<div class="row dashboard-middle-body">
	<div class="col-lg-3">
		<div class="well">
			<ul class="nav nav-pills nav-stacked">
				<?php if($page =='user')echo '<li class="active">';
						else echo '<li>'?><a href="/admin/user" class="text-center">user</a></li> 
				<?php if($page =='comment')echo '<li class="active">';
						else echo '<li>'?><a href="/admin/comment" class="text-center">comment</a></li> 
				<?php if($page =='content')echo '<li class="active">';
						else echo '<li>'?><a href="/admin/content" class="text-center">content</a></li>
				<li class="divider"></li>
				<?php if($page =='setting')echo '<li class="active">';
						else echo '<li>'?><a href="/admin/setting" class="text-center">setting</a></li> 
			</ul>
		</div>
	</div>