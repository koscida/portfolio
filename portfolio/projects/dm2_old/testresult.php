<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Brittany Kos ~ DM 2</title>
	<link href="dm2style.css" rel="stylesheet" type="text/css">
	<link href="formstyle.css" rel="stylesheet" type="text/css">
	<style type="text/css"> 
	</style> 
	
	<script src="dm2script.js" type="text/javascript"></script>
	<script type="text/javascript">
	</script>
	
	<?php
	//$DB = @mysqli_connect ("localhost", "kosba", "Test123!", "kosbadb") OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
	
	include("questions.php");
	?>
	
</head>

<body>
<!-- header -->
	<div id="header" type="text/javascript">
		<script>
			header('header');
		</script>
	</div>
		
<!-- content -->
	<div id="content">
	<div id="contentthing">


	<?php
	results();
	?>
	
		
	</div>
	</div>

	
<!-- footer -->
	<script type="text/javascript">
		footer();
	</script>
	
</body>
</html>
