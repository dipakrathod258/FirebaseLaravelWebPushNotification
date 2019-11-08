<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<div class="row">
		<form action="<?php echo e(url('/createBooking')); ?>" method="POST">
			<?php echo e(csrf_field()); ?>

		  <div class="form-group">
		    <label for="email">Email address:</label>
		    <input type="email" class="form-control" id="email" name="email">
		  </div>
		  <div class="form-group">
		    <label for="pwd">Password:</label>
		    <input type="password" class="form-control" id="pwd" name="password">
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>		
	</div>
</div>


</body>
</html>