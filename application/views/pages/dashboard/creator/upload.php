<div class="col-lg-offset-3 col-lg-6 middle-body">
	<div class="well">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<?php
					echo isset($error) ? $error : '';
					echo validation_errors();
					echo form_open_multipart('/creator/'.$page.'/upload');
				?>
				<div><span class="label label-default">upload <?php echo $page; ?></span></div>
				<div class="form-group">
					<label for="input_file"><?php echo $page;?> file</label>
					<input name="file" type="file" class="form-control" id="input_file" placeholder="<?php echo $page;?> file">
				</div>
				<div class="form-group">
					<label for="thumbnail">thumbnail</label>
					<input name="thumbnail" type="file" class="form-control" id="thumbnail" placeholder="thumbnail">
				</div>
				<div class="form-group">
				<input name="title" type="text" class="form-control" id="title" placeholder="title">
				</div>
				<?php
				if($page == 'book'){
					echo '
					<div class="form-group">
					<input name="author" type="text" class="form-control" id="author" placeholder="author">
					</div>';
				}?>
				<div class="form-group">
				<textarea name="description" class="form-control" rows="5" id="description" placeholder="description"></textarea>
				</div>
				<div class="form-group">
				<select name="tags" class="form-control" id="tags">
					<option value="general">general</option>
					<option value="education">education</option>
					<option value="entertainment">entertainment</option>
				</select>
				</div>
				<div class="form-group">
				<input name="price" type="number" class="form-control" id="price" placeholder="price" value="0">
				</div>
				<div class="form-group">
				<button type="submit" class="btn btn-default">publish</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>