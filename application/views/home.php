<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include("css.php"); ?>
	<style>
		#modal
		{
			background-color: rgba(0,0,0,0.7);
			height: 100%;
			width: 100%;
			position: fixed;
			top: 0px;
			left: 0px;
			display: none;
		}
		#modal-form
		{
			background-color: white;
			width: 30%;
			height: auto;
			margin-left: 30%;
			margin-top: 100px;
			border-radius: 8px;
			padding: 10px;
			position: absolute;
		}
		#close-btn
		{
			background-color: red;
			color: white;
			width: 30px;
			height: 30px;
			position: absolute;
			top: -15px;
			right: -15px;
			text-align: center;
			border-radius: 8px;
			cursor: pointer;
		}
	</style>
</head>
<body>
<div class="container">
	<h2>Home Page...</h2>
	<form id="insertform" enctype="multipart/form-data">
		<div class="row">
			<div class="col-xl-4">
				<div class="form-group">
					<label>Name : </label>
					<input type="text" name="name" id="name" class="form-control">
					<span id="name_err"></span>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="form-group">
					<label>Email : </label>
					<input type="text" name="email" id="email" class="form-control">
					<span id="email_err"></span>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="form-group">
					<label>Password : </label>
					<input type="text" name="password" id="password" class="form-control">
					<span id="password_err"></span>
				</div>
			</div>
		</div><!-- end first row -->
		<div class="row">
			<div class="col-xl-4">
				<div class="form-group">
					<label>Mobile : </label>
					<input type="text" name="mobile" id="mobile" class="form-control">
					<span id="mobile_err"></span>
				</div>
			</div>
			<div class="col-xl-4">
				<div class="form-group">
					<label>Gender : </label><br>
					<input type="radio" name="gender" id="gender" class="form-control-inline" value="Male"> Male
					<input type="radio" name="gender" id="gender" class="form-control-inline" value="Female"> Female
				</div>
			</div>
			<div class="col-xl-4">
				<div class="form-group">
					<label>Image : </label>
					<input type="file" name="pic" id="pic" class="form-control">
					<span id="pic_err"></span>
				</div>
			</div>
		</div><!-- end second row -->
		<div class="row">
			<div class="col-xl-4">
				<div class="form-group">
					<label>DOB : </label>
					<input type="date" name="date" id="date" class="form-control">
					<!-- <span id="date_err"></span> -->
				</div>
			</div>
			<div class="col-xl-4">
				<div class="form-group">
					<label>Qualification : </label><br>
					<input type="checkbox" name="qualification[]" id="qualification" value="MCA">MCA
					<input type="checkbox" name="qualification[]" id="qualification" value="BCA">BCA
					<input type="checkbox" name="qualification[]" id="qualification" value="B.Tech">B.Tech
				</div>
			</div>
			
		</div><!-- end Third row -->

		<input type="submit" name="submit" class="btn btn-info" id="insert">
		<span id="success"></span>
	</form>


	<!-- for all record show -->
	<button id="display" class="btn btn-warning float-right">Display</button>
	<table class="table" id="record"></table>
</div>

<div id="modal">
	<div id="modal-form">
		<form id="updateform">
			<input type="hidden" name="id" id="id">
			<div class="form-group">
				<label>Name : </label>
				<input type="text" name="name" id="e_name" class="form-control">
			</div>
			<div class="form-group">
				<label>Email : </label>
				<input type="text" name="email" id="e_email" class="form-control">
			</div>
			<div class="form-group">
				<label>Image : </label>
				<input type="file" name="new_pic" id="new_pic" class="form-control">
				<input type="hidden" name="old_pic" id="e_pic" class="form-control">
				<span id="img"></span>
			</div>

			<input type="submit" name="submit" value="Update" class="btn btn-info" id="update">
		</form>
	</div>
</div>

</body>
</html>