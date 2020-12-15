<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
				<div class="dropdown pull-right">
					<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
						<span class="glyphicon glyphicon-sort"></span>
						Sort by
						<span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a href="/book/sort/alphabet"><span class="glyphicon glyphicon-sort-by-alphabet"></span>alphabet</a></li>
						<li><a href="/book/sort/rate"><span class="glyphicon glyphicon-star"></span>user rate</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row digital-contents">
			<?php
				foreach($contents->result() as $book){
					if ($book->approved == 1){
					echo '<a href="/book/view/'.$book->content_id.'"><div class="col-lg-4"><div class="book-list well">';
					echo '<div><img width="250" width="250" src="/cdn/images/content-thumbnail/'.$book->thumbnail.'" /></div>';
					echo '<span class="name-text">'.$book->content_name.'</span><br/>';
					echo '<a class="btn btn-default btn-sm" href="/view_creator/'.$book->user_id.'">';
					echo '<span class="glyphicon glyphicon-chevron-left"></span>creator</a>';
					for($i=0; $i<5; $i++){
						if($book->rating > $i){
							echo '<span class="glyphicon glyphicon-star"></span>';
						}
						else{
							echo '<span class="glyphicon glyphicon-star-empty"></span>';
						}
					}
					if($book->price > 0){
						echo '<br/><span class="price-text">'.$book->price.'</span>';
					}
					else{
						echo '<br/><span class="price-text">free</span>';
					}
					echo '</div></div></a>';
					}
				}
			?>
		</div>
	</div>
</div>
</div>