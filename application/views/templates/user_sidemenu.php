<div class="row">
	<div class="col-lg-3">
		<div class="well">
			<ul class="nav nav-pills nav-stacked">
				<?php if($page =='download')echo '<li class="active">';
						else echo '<li>'?><a href="/user/download" class="text-center">Downloads</a></li> 
				<?php if($page =='subscription')echo '<li class="active">';
						else echo '<li>'?><a href="/user/subscription" class="text-center">Subscription</a></li> 
				<?php if($page =='favorite')echo '<li class="active">';
						else echo '<li>'?><a href="/user/favorite" class="text-center">favorite</a></li> 
				<?php if($page =='wishlist')echo '<li class="active">';
						else echo '<li>'?><a href="/user/wishlist" class="text-center">wish list</a></li>  
				<li class="divider"></li>
				<?php if($page =='setting')echo '<li class="active">';
						else echo '<li>'?><a href="/user/setting" class="text-center">setting</a></li> 
			</ul>
		</div>
	</div>