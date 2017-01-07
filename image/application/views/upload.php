<html>
	<head>
		<title>Upload Form</title>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
	</head>
	<body>
		<div class="container row" style="margin-top: 30vh;">
			<div class="col m6">
			    <?php echo $error; ?>
			    <?php echo form_open_multipart('upload/do_upload'); ?>
				<div class="file-field input-field">
					<div class="btn"> <span>File</span> <input type="file" name="userfile"> </div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					</div>
				</div>

				<div class="row">
					<div class="col m4">
						<p>
							<input type="checkbox" name="todo[compression][checked]" value="true" id="compression" checked="checked" />
							<label for="compression">File compression</label>
						</p>
					</div>
					<div class="col m8">
						<p class="range-field">
							<input type="range" name="todo[compression][value]" id="test5" min="0" max="100" />
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col m4">
						<p>
							<input type="checkbox" name="todo[size][checked]" value="true" id="size" />
							<label for="size">File size</label>
						</p>
					</div>
					<div class="col m4">
						<input value="" name="todo[size][value]" id="first_name2" type="text" class="validate"/>
					</div>
					<div class="col m4">
						<select name='todo[size][type]'>
							<option value="kb">kb</option>
							<option value="mb">mb</option>
						</select>
					</div>
				</div>
				<div class="row">
					<button class="btn waves-effect waves-light" type="submit" >Submit
						<i class="material-icons right"></i>
					</button>
				</div>
			</div>
			<div class="col m6">
				<div class="row">
					<article style="margin: 40px 20px 0 20px">
						<p> This aplication lets you to compress jpg, png files just like Kraken but for free so if you are a polish cebula this website is defenitly for you! </p>
						<p>
							After chosing what you want to do with your file script will
							generate link that let you download file.
						</p>
					</article>
				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $('select').material_select();
    });
</script>