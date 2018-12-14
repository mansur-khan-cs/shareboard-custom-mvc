<?php echo 'views/main.php <br />'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Shareboard</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <nav class="navbar navbar-default">
    	<div class="container">
		  <div class="navbar-header">
			<a class="navbar-brand" href="#">Shareboard</a>	  	
		  	<ul class="nav navbar-nav">
		  		<li><a href="<?php echo ROOT_URL;?>">Home</a></li>
		  		<li><a href="<?php echo ROOT_URL;?>shares">Shares</a></li>
		  	</ul>
		  	<ul class="nav navbar-nav navbar-right">
		  		<?php if(isset($_SESSION['is_logged_in'])) : ?>
		  		<li><a href="<?php echo ROOT_URL;?>">Welcome <?php echo $_SESSION['user_data']['name']; ?></a></li>
		  		<li><a href="<?php echo ROOT_URL;?>users/logout">Logout</a></li>
		  		<?php else : ?>
		  		<li><a href="<?php echo ROOT_URL;?>users/login">Login</a></li>
		  		<li><a href="<?php echo ROOT_URL;?>users/register">Register</a></li>
		  	<?php endif; ?>
		  	</ul>				
		  </div>  	  	   		
    	</div>
    </nav>

    <div class="container">
    	<div class="row">
    		<?php Messages::display(); ?>
    		<?php require($view); ?>
    	</div>
    </div><!-- /.container -->	
</body>
</html>