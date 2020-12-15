<div class="row dashboard-middle-body">
	<div class="col-lg-3">
		<div class="side-well well">
			<ul class="nav nav-pills nav-stacked">
				<?php if($page =='download')echo '<li class="active">';
						else echo '<li>'?><a class="content-link" href="/user/download" class="text-center">
						<span class="glyphicon glyphicon-download"></span> Downloads</a></li> 
				<?php if($page =='subscription')echo '<li class="active">';
						else echo '<li>'?><a class="content-link" href="/user/subscription" class="text-center">
						<span class="glyphicon glyphicon-user"></span> Subscription</a></li> 
				<?php if($page =='favorite')echo '<li class="active">';
						else echo '<li>'?><a class="content-link" href="/user/favorite" class="text-center">
						<span class="glyphicon glyphicon-thumbs-up"></span> favorite</a></li> 
				<?php if($page =='wishlist')echo '<li class="active">';
						else echo '<li>'?><a class="content-link" href="/user/wishlist" class="text-center">
						<span class="glyphicon glyphicon-shopping-cart"></span> wish list</a></li>  
				<li class="divider"></li>
				<?php if($page =='setting')echo '<li class="active">';
						else echo '<li>'?><a class="content-link" href="/user/setting" class="text-center">
						<span class="glyphicon glyphicon-cog"></span> setting</a></li> 
			</ul>
		</div>
	</div>