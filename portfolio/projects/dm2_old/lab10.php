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
			<h1>Lab 10 - Mar 3, 2011: &nbsp;&nbsp;&nbsp;</h1>
			<h2> PHP and HTML Form Validation </h2><br/>
			
		<!-- HTML -->
		<div class="block">
			<h3>Output</h3>
			
			<p>Requirements: Add form validation to your PHP script.</p>
			<p>Requirements: Combine your HTML file and PHP script into one new PHP script.</p>
			<p>Requirements: Make at least one of your HTML form elements sticky.</p>
			
			
				<?php if(isset($_POST['action']))
				{
					$name = isset($_POST['name'])?$_POST['name']:"";
					$email = isset($_POST['email'])?$_POST['email']:"";
					$phone =isset($_POST['phone'])?$_POST['phone']:"";
					
					$email = ( preg_match('/[.+a-zA-Z0-9_-]+@[a-zA-Z0-9-]+.[a-zA-Z]{3,4}/', $email) )?$email:"invalid";
					$phone = ( preg_match('/[0-9]{10,}/', preg_replace('/[-(),[:space:]]+/',"",$phone)) )?$phone:"invalid";
					
					echo empty($name)?"Error: no name was entered<br/>":"Name: ".$name."<br/>";
					echo empty($email)?"Error: no email was entered<br/>":( ($email == "invalid")?"Error: invalid email entered.<br/>":"Email: ".$email."<br/>" );
					echo empty($phone)?"Error: no phone was entered<br/>":( ($phone == "invalid")?"Error: invalid phone entered.<br/>":"Phone: ".$phone."<br/>" );
					
					//header( "Location: ".$_SERVER['PHP_SELF'] ) ;
				}
				//else
				//{
				?>
					<p>Information Form: </p>
					<form action="" method="post" name="information" />
						Name: <input type="text" name="name" size="20" value="<?php echo isset($_POST['name'])?$_POST['name']:""; ?>" /><br/>
						Email: <input type="text" name="email" size="20" value="<?php echo isset($_POST['email'])?$_POST['email']:""; ?>" /><br/>
						Phone: <input type="text" name="phone" size="20" value="<?php echo isset($_POST['phone'])?$_POST['phone']:""; ?>" /><br/>
						<input type="hidden" name="action" value="setInformation" />
						<input type="submit" value="Submit" />
					</form>
				<?php
				//}
				?>
			
			
			<div class="spacer"></div>
			
		
			
		</div>
		
		<!-- PHP -->
		<div class="block">
			<h3>Code</h3>
			
			
		</div>
			
		<div class="spacer"></div>
			
		<h5><a href="lab10.txt">Text File</a></h5>
			
		</div>
    </div>
	
	
	
<!-- footer -->
	<script type="text/javascript">
		footer();
	</script>
	
</body>
</html>
