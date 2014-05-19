<!DOCTYPE html>
<html>
	<head>
  		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>needs variable</title>
		<link rel="stylesheet" href="css/styles.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	</head>
	<body>

		<?php
		// load navigation
		require_once getcwd(). '/views/navigation_view.php';

		// $helper->loadView(lcfirst($view_name), $data);

		// debug stuff
		if(DEBUG == true){
			echo '<div class="container well container" style="margin-top:20px;">';
				echo '<h5><b>$_REQUEST DATADUMP</b></h5><pre>';
				var_dump($_REQUEST);
		  	echo '</pre></div>';
			echo '<div class="container well container">';
				echo '<h5><b>$_SESSION DATADUMP</b></h5><pre>';
		  		var_dump($_SESSION);
		  	echo '</pre></div>';
		  	echo '<div class="container well container">';
		  		echo '<h5><b>$data DATADUMP</b></h5><pre>';
		  		var_dump($data);
		  	echo '</pre></div>';
		}
		?>

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/summernote.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>