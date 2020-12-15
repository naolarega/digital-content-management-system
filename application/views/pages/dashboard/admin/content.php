<div class="col-lg-9">
	<div class="well">
		<div class="row">
			<?php
				$this->db->select('user_name,user_id');
				$this->db->where('type', '2');
				$creators = $this->db->get('user')->result();
			?>
			<div class="col-lg-12">
				<?php echo form_open(''); ?>
					<div class="form-group col-lg-3">
						<label for="content-type">content type:</label>
						<select class="form-control" name="content-type-filter" id="content-type">
						<option value="content-type-all">all content type</option>
						<option value="video">video</option>
						<option value="music">music</option>
						<option value="image">image</option>
						<option value="book">book</option>
						<option value="app">app</option>
						</select>
					</div>
					<div class="form-group col-lg-3">
						<label for="creator">creator:</label>
						<select class="form-control" name="creator-filter" id="creator">
						<option value="creator-all">all creators</option>
						<?php
							foreach($creators as $creator){
								echo '<option value="'.$creator->user_id.'">'.$creator->user_name.'</option>';
							}
						?>
						</select>
					</div>
					<div class="form-group col-lg-3">
						<br/>
						<button name="filter-content" value="filter-content" type="submit" class="btn btn-default"><span class="	glyphicon glyphicon-filter"></span>filter</button>
					</div>
				</form>
				<?php
					echo form_open('/admin/content/approval');
				?>
				<table class="table table-striped">
					<tr>
						<th></th>
						<th>Content</th>
						<th>Type</th>
						<th>User</th>
						<th>date uploaded</th>
						<th>approved</th>
					</tr>
					
					<?php 
					//to traverse through contents for the admin
					foreach($queries->result() as $content): ?>
					<tr>
						<td>
							<input name="<?php echo $content->content_id; ?>" type="checkbox" value="<?php echo $content->content_id; ?>" />
						</td>
						<td>
							<span><a href="<?php echo '/'.$content->type.'/view/'.$content->content_id; ?>">
							<?php echo $content->content_name?></a></span>
						</td>
						<td>
							<span><?php echo $content->type; ?></span>
						</td>
						<td>
							<span>
							<?php
							$creator = $this->db->get_where('user', array('user_id' => $content->user_id));
							$creator = $creator->result()[0]->user_name;
							echo $creator;
							?>
							</span>
						</td>
						<td>
							<?php echo $content->release_date; ?>
						</td>
						<td>
							<?php 
								if($content->approved == 1)
									echo 'yes';
								else
									echo 'no';
							?>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<div class="col-lg-1">
				<button name="approve" type="submit" value="approve" class="btn btn-default">approve</button>
			</div>
			<div class="col-lg-2">
				<button name="disapprove" type="submit" value="disapprove" class="btn btn-default btn-block">disapprove</button>
			</div>
			</form>
		</div>
	</div>
</div>
</div>