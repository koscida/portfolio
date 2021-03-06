<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Brittany Kos ~ DM 2</title>
	<link href="dm2style.css" rel="stylesheet" type="text/css">
	<style type="text/css"> 
		#contentthing .block{
			width:450px; /* 480px */
			margin:0px 10px;
			display:inline-block;
			float:left;
			overflow:hidden;
			border:0px solid red;
		}
		.ele{
			width:100px;
			margin:5px;
			display:inline-block;
		}
		.ele img{
			height:100px;
			width:100px;
		}
		.ele h4{
			text-align:center;
			font-size:14px;
			color:black;
			line-height:0px;
		}
	</style> 
	
	<script src="dm2script.js" type="text/javascript"></script>
	<script src="labscript.js" type="text/javascript"></script>
	<script type="text/javascript">
	</script>
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
			<h1>Lab 9 - Mar 1, 2011: &nbsp;&nbsp;&nbsp;</h1>
			<h2> PHP and HTML Forms: Output </h2><br/>
			
		<!-- HTML -->
		<div class="block">
			<p>Part 1</p>
			<br/>
				<?php
					if(isset($_POST['textField'])){echo "This was the text you entered: <b>".$_POST['textField'].'</b>';}
				?>
				
				<div class="spacer"></div>
				
				<a href="lab9.php">Back to Lab 9</a>
			
			<div class="spacer"></div>
			
			<p>Part 2</p>
			
				<?php
					/*
					$shape = 'circle';
					$color = 'orange';
					*/
					$single = false;
					$many = false;
					
					if(isset($_POST['single']))
					{
						$single = true;
						$shape = 'circle';
						$color = 'orange';
					}
					if(isset($_POST['many']))
					{
						$many = true;
						$shape = 'circle';
						$color = 'orange';
					}
					if(isset($_POST['imgShape']))
					{
						$shape = $_POST['imgShape'];
					}
					if(isset($_POST['imgColor']))
					{
						$color = $_POST['imgColor'];
					}
					
					if($many)
						echo '<div class="ele"><img src="image/'.$color.'_many_'.$shape.'.jpg" /></div>';
					if($single)
						echo '<div class="ele"><img src="image/'.$color.'_single_'.$shape.'.jpg" /></div>';
				?>
				<br/>
				<a href="lab9.php">Back to Lab 9</a>
				
		</div>
		
		<!-- PHP -->
		<div class="block">
			<h3>Code</h3>
			
			
		</div>
			
		<div class="spacer"></div>
			
		<h5><a href="lab9b.txt">Text File Output</a></h5>
		<h5><a href="lab9.txt">Text File Input</a></h5>
			
		</div>
    </div>
	
	
	
<!-- footer -->
	<script type="text/javascript">
		footer();
	</script>
	
</body>
</html>
