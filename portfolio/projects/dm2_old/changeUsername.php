<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Brittany Kos ~ DM 2</title>
	
	<link href="dm2style.css" rel="stylesheet" type="text/css">
	<link href="databasestyle.css" rel="stylesheet" type="text/css">
	<style type="text/css"> 
	</style> 
	
	<script src="dm2script.js" type="text/javascript"></script>
	<script src="databasescript.js" type="text/javascript"></script>
	<script type="text/javascript">
		
	</script>
	<?php
		function _router($a = null)
		{
			if(empty($a))
				$action = ( empty($_POST['action'])?'':$_POST['action'] );
			else $action = $a;
			switch($action)
			{
				case 'change':
					if(!empty($_POST['newUsername']))
						change($_POST['newUsername']);
					index();
					break;
				default:
					index();
			}
		}
		function change($name)
		{
			$sessionID = $_POST['sessionID'];
			//$name = $_POST['newUsername'];
			
			$DB = @mysqli_connect ("localhost", "kosba", "Test123!", "kosbadb") OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
	
			$sql = "update casino_session set NAME = '".$name."' where ID = '".$sessionID."'";
			$result = mysqli_query($DB, $sql);
			
			mysqli_close($DB);
		}
		function getUsername($sessionID)
		{
			$DB = @mysqli_connect ("localhost", "kosba", "Test123!", "kosbadb") OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
			
			$sql = "select NAME from casino_session where ID = $sessionID";
			$result = mysqli_query($DB, $sql);
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
				$name = $row['NAME'];
			mysqli_free_result($result);
			mysqli_close($DB);
			
			return $name;
		}
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
			_router();
			//echo $_POST['sessionID'];
		?>
		
		
		<?php
		function index()
		{
			$sessionID = $_POST['sessionID'];
			$username = getUsername($sessionID);
		?>
			<h2>Casino Game:&nbsp;</h2><h1>Change Username</h1><br/>
			
			<form  name="changeusername" action="" method="post" style="display:inline-block;">
				<input type="hidden" name="action" value="change" />
				<input type="hidden" name="sessionID" value="<?php echo $sessionID; ?>" />
				
				<div style="float:left; margin-right:20px;">
					<p class="changeUsername"><?php echo "Old Username: $username"; ?></p>
				
					<p class="changeUsername"><label for="newname">New Username: </label>
					<input type="text" name="newUsername" id="newname" /></p>
				</div>
				
				<div style="float:right;padding-top:35px;">
					<label for="changeusername" ><span class="changeButton" id="ch" onMouseOver="changeClass('ch', 'changeButtonHover')" onMouseOut="changeClass('ch', 'changeButton')"> Change </span></label>
					<input type="submit" id="changeusername" style="display:none;" />
				</div>
			</form>
			
			<br/>
			<br/>
			<br/>
			
			<form  name="playslots" action="slots.php" method="post" style="display:inline-block;">
				<input type="hidden" name="action" value="" />
				<input type="hidden" name="sessionID" value="<?php echo $sessionID; ?>" />
				<label for="slots" ><span class="userNav" id="s" onMouseOver="changeClass('s', 'userNavHover')" onMouseOut="changeClass('s', 'userNav')"> Slots </span></label>
				<input type="submit" id="slots" style="display:none;" />
			</form>
			
			<form name="topslot" action="topslots.php" method="post" style="display:inline-block;">
				<input type="hidden" name="action" value="" />
				<input type="hidden" name="sessionID" value="<?php echo $sessionID; ?>" />
				<label for="topslot"><span class="userNav" id="ts" onmouseover="changeClass('ts', 'userNavHover')" onmouseout="changeClass('ts', 'userNav')"> Top Slots </span></label>
				<input type="submit" id="topslot" style="display:none;" />
			</form>
		<?php
		}
		?>
		
		</div>
	</div>
	
<!-- footer -->
	<script type="text/javascript">
		footer();
	</script>
	

</body>
</html>