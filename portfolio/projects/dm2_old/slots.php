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
				case 'handle':
					if(empty($_POST['bet']))
						index();
					else
					{
						if(is_numeric($_POST['bet']))
							goRound();
						else
							index();
					}
					break;
				case 'begin':
					index();
					break;
				default:
					index();
					break;
			}
		}
		function getMoney($sessionID)
		{
			$DB = @mysqli_connect ("localhost", "kosba", "Test123!", "kosbadb") OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
		
			$sql = "select MONEY from casino_session where ID = $sessionID";
			$result = mysqli_query($DB, $sql);
			$money = 0;
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
				$money = $row['MONEY'];
			mysqli_free_result($result);
			mysqli_close($DB);
			return $money;
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
			//$sessionID = 100199;
			$money = getMoney($sessionID);
			$username = getUsername($sessionID);
		?>
			<h2>Casino Game:&nbsp;</h2><h1>Slots</h1><br/>
			<div class="machine">
				<form method="post" action="" name="handle">
					<input type="hidden" name="sessionID" value="<?php echo $sessionID ?>" />
					<input type="hidden" name="action" value="handle" />
				
					<div class="slot"></div>
					<div class="slot"></div>
					<div class="slot"></div>
					
					<div class="handleSpace">  
						<label for="play" ><span class="handle" id="h" onmouseover="changeClass('h', 'handleHover')" onmouseout="changeClass('h', 'handle')"><br/>Go!</span></label>
						<input type="submit" id="play" value="" style="display:none;" />
						<div class="bar"></div>
					</div>
				
					<br/>
				
					<div class="score">
						<label for="bet">Bet: </label>
						<input type="text" name="bet" id="bet"/>
					</div>
				
				</form>
				
				<br/>
				
				<div class="money">
					<?php echo "You have $money in your account"; ?>
				</div>
			</div>
			
			<span class="username"><?php echo $username; ?></span>
			
			<form  name="changeusername" action="changeUsername.php" method="post" style="display:inline-block;">
				<input type="hidden" name="action" value="changeUsername" />
				<input type="hidden" name="sessionID" value="<?php echo $sessionID; ?>" />
				<label for="changeusername" ><span class="userNav" id="c" onMouseOver="changeClass('c', 'userNavHover')" onMouseOut="changeClass('c', 'userNav')"> Change Username </span></label>
				<input type="submit" id="changeusername" style="display:none;" />
			</form>
			
			<form name="topslot" action="topslots.php" method="post" style="display:inline-block;">
				<input type="hidden" name="action" value="topSlots" />
				<input type="hidden" name="sessionID" value="<?php echo $sessionID; ?>" />
				<label for="topslot"><span class="userNav" id="ts" onmouseover="changeClass('ts', 'userNavHover')" onmouseout="changeClass('ts', 'userNav')"> Top Slots </span></label>
				<input type="submit" id="topslot" style="display:none;" />
			</form>
			
		<?php
		}
		?>
		
		<?php
		function goRound()
		{
			$rand1 = rand(0,9);
			$rand2 = rand(0,9);
			$rand3 = rand(0,9);
			
			if( ($rand1 == $rand2) == $rand3){$mult = 100;}
			if( ($rand1==$rand2) || ($rand1==$rand3) || ($rand2==$rand3) ){$mult = 50;}
			//if( ($rand1 || $rand2 || $rand3) == 7){$mult = 2;}
			else {$mult = 0;}
			
			$sessionID = $_POST['sessionID'];
			$bet = $_POST['bet'];
			
			$DB = @mysqli_connect ("localhost", "kosba", "Test123!", "kosbadb") OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
	
			$sql = "insert into casino_slots values ('".$sessionID."', '".$bet."', '".$mult."')";
			$result = mysqli_query($DB, $sql);
			
			$won = $bet*$mult;
			if($won == 0){$won = (-1 * $bet);}
			$sql  = "update casino_session set money = (money + $won) where ID = '".$sessionID."'";
			$result = mysqli_query($DB, $sql);
			
			$money = getMoney($sessionID);
			$username = getUsername($sessionID);
			
			mysqli_close($DB);			
	
		?>
			<h2>Casino Game:&nbsp;</h2><h1>Slots</h1><br/>
			<div class="machine">			
				<form method="post" action="" name="handle">
					<input type="hidden" name="sessionID" value="<?php echo $sessionID ?>" />
					<input type="hidden" name="action" value="handle" />
				
					<div class="slot"><?php echo '<img src="image/black_'.$rand1.'.png">'; ?></div>
					<div class="slot"><?php echo '<img src="image/black_'.$rand2.'.png">'; ?></div>
					<div class="slot"><?php echo '<img src="image/black_'.$rand3.'.png">'; ?></div>
					
					<div class="handleSpace">  
						<label for="aga" ><span class="handle" id="h2" onmouseover="changeClass('h2', 'handleHover')" onmouseout="changeClass('h2', 'handle')"><br/>Play<br/>Again</span></label>
						<input type="submit" id="aga" value="" style="display:none;" />
						<div class="bar"></div>
					</div>
					
					<br/>
					
					<div class="score">
						<label></label>
						<?php echo "You multiplied your $bet bet by $mult"; ?>
					</div>
				</form>
		
				<br/>
				
				<div class="money">
					<?php echo "You now have $money in your account"; ?>
				</div>
			</div>
			
			<span class="username"><?php echo $username; ?></span>
			
			<form  name="changeusername" action="changeUsername.php" method="post" style="display:inline-block;">
				<input type="hidden" name="action" value="changeUsername" />
				<input type="hidden" name="sessionID" value="<?php echo $sessionID; ?>" />
				<label for="changeusername" ><span class="userNav" id="c" onMouseOver="changeClass('c', 'userNavHover')" onMouseOut="changeClass('c', 'userNav')"> Change Username </span></label>
				<input type="submit" id="changeusername" style="display:none;" />
			</form>
			
			<form name="topslot" action="topslots.php" method="post" style="display:inline-block;">
				<input type="hidden" name="action" value="topSlots" />
				<input type="hidden" name="sessionID" value="<?php echo $sessionID; ?>" />
				<label for="topslot"><span class="userNav" id="ts" onmouseover="changeClass('ts', 'userNavHover')" onmouseout="changeClass('ts', 'userNav')"> Top Slots </span></label>
				<input type="submit" id="topslot" style="display:none;" />
			</form>
			
			
		<?php
		} ?>
		
		
		
		</div>
	</div>
	
<!-- footer -->
	<script type="text/javascript">
		footer();
	</script>
	
</body>
</html>