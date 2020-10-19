<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<div class="col-lg-12">
				<table class="table table-striped">
					<tr>
						<th></th>
						<th>User name</th>
						<th>Full name</th>
						<th>Phone number</th>
					</tr>
					<?php foreach($queries->result() as $user): ?>
					<tr>
						<td>
							<input type="checkbox" value="<?php echo $user->user_id; ?>" /></label>
						</td>
						<td>
							<span><?php echo $user->user_name; ?></span>
						</td>
						<td>
							<span><?php echo $user->first_name.' '.$user->last_name; ?></span>
						</td>
						<td>
							<span><?php echo $user->phone_number; ?></span>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<div class="col-lg-1">
				<button class="btn btn-default">ban user</button>
			</div>
			<div class="col-lg-offset-1 col-lg-1">
				<button class="btn btn-default">warn user</button>
			</div>
			<div class="col-lg-offset-1 col-lg-1">
				<button class="btn btn-default">remove user</button>
			</div>
		</div>
	</div>
</div>
</div>