		<div class="col-lg-12 footer">
			<div class="footer-box well">
				<div class="row">
					<div class="col-lg-4 col-lg-offset-4 dashboard-link-container">
						<h5><strong class="dashboard-link">dashboard</strong></h5>
						<?php
							if(get_cookie('dcms_type') != null){
								if(get_cookie('dcms_type') == 1){
									echo '<div><a class="foot-links user-dashboard-link" href="/user">user</a></div>';
								}
								else if(get_cookie('dcms_type') == 2){
									echo '<div><a class="foot-links creator-dashboard-link" href="/creator">creator</a></div>';
								}
								else if(get_cookie('dcms_type') == 3){
									echo '<div><a class="foot-links admin-dashboard-link" href="/admin">admin</a></div>';
								}
							}
							else{
								echo '<div><a class="foot-links admin-dashboard-link" href="/log_in">log in</a></div>';
							}
						?>
					</div>
					<div class="col-lg-4">
						<h5><strong class="foot-links dashboard-link">miscellaneous</strong></h5>
						<div><a class="foot-links about-link" href="/about">about</a></div>
					</div>
				</div>
				<div class="copyright-container">
					<div><strong class="copyright-text">copyright 2020 - digital content managment all right reserved</strong></div>
				</div>
			</div>
		</div>
	</body>
</html>