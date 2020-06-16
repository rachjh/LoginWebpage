<!-- http://localhost:8888/LoginProject/LoginForm.php -->

<!DOCTYPE>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
	
	 <?php
		$Count= 0;
		$setUsernames = array("sara", "lara", "cara", "tara", "dara");
		$setPasswords = array("s1234", "l1234", "c1234", "t1234", "d1234");
		$correctUsername = false;
		$correctPassword = false;
		$uValue = "";
		$pValue = "";
		
		if(isset($_POST['Submit'])) #this knows if the submit was pressed from the post
		{
			$Count= $_POST['Hidden']; #resets count to the number from the hidden form
			
			
			if ($Count < 3)
			{
				$USERusername= stripslashes(str_replace(' ', '', $_POST['username']));
				$USERpassword= stripslashes(str_replace(' ', '', $_POST['password']));
				
			
				################ CHECK THE USERNAME ################
				foreach ($setUsernames as $setUsername)
				{
					if ($setUsername == $USERusername)
					{
						$correctUsername = true;
						$uValue = $USERusername;
					}
				}
			
				################ CHECK THE PASSWORD ################
				foreach ($setPasswords as $setPassword)
				{
					if ($setPassword == $USERpassword)
						{
							$correctPassword = true;
							$pValue = $USERpassword;
						}
				}
			
				################ BOTH GOOD ################
				if ($correctUsername && $correctPassword)
				{
					//if((array_search($correctUsername, $setUsernames, true)) == (array_search($correctPassword, $setPasswords, true)))
					if((array_search($USERusername, $setUsernames, true)) == (array_search($USERpassword, $setPasswords, true)))
					{
						header("Location: Congrats.html");
					}
					else
					{
						echo "<p>Your username and password do not match.</p>";
						$Count++;
					}
				}
			
				########## USERNAME GOOD, PASSWORD BAD ################
				elseif ($correctUsername == true && $correctPassword == false)
				{
					echo "</br><p>Your username is correct, please try entering your password again.</p>";
					$Count++;
				}
			
				################ PASSWORD GOOD, USERNAME BAD ################
				elseif ($correctPassword == true && $correctUsername == false)
				{
					echo "</br><p>Your password is correct, please try entering your username again.</p>";
					$Count++;
				}
			
				################ BOTH BAD ################
				else
				{
					echo "</br><p>Your username and password were both incorrect. Please try again.</p>";
					$Count++;
				
				}
				
			}#end of less than 3
			echo "</br>"."Try Number: ". ($Count) ."</br>";
			
			if ($Count == 2)
			{
				echo "<p>"."This is your last try: </p>";
			}
			
			elseif ($Count == 3)
			{
				header("Location: Sorry.html");
			}
		}#end if submit	
		?>
				<form name="LoginForm" method="post" action="LoginForm.php">
					<p> Username: <input type="text" name="username" value="<?php echo $uValue;?>"/> <p> <!-- value? -->
					<p> Password: <input type="password" name="password" value="<?php echo $pValue;?>"/> <p> <!--value="<?php echo $Number;?>" -->
					<input type="hidden" name="Hidden" value="<?php echo $Count;?>" />
					<p>  <input type="reset" value="Clear Form"/> &nbsp; &nbsp;
					<input type="submit" name="Submit" value="Login"/> </p>
				</form>

</body>
</html>