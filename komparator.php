
<?php
 
 session_start();
 
     require_once "connect.php";
     mysqli_report(MYSQLI_REPORT_STRICT);
 
     $baza=mysqli_connect($host, $db_user, $db_password, $db_name);
 
 if (mysqli_connect_errno())
 
 {echo "Wystąpił błąd połączenia z bazą";}
 
 $wynik = mysqli_query($baza,"SELECT * FROM podzespoly");
 
 while($row = mysqli_fetch_array($wynik))
 
 {echo $row['intel'] . "&nbsp&nbsp&nbsp&nbsp |&nbsp&nbsp&nbsp&nbsp" . $row['amd']. "&nbsp&nbsp&nbsp&nbsp |&nbsp&nbsp&nbsp&nbsp" . $row['nvidia'] . "&nbsp&nbsp&nbsp&nbsp |&nbsp&nbsp&nbsp&nbsp" . $row['amdgrafika']. "&nbsp&nbsp&nbsp&nbsp |&nbsp&nbsp&nbsp&nbsp" . $row['plyta']. "&nbsp&nbsp&nbsp&nbsp |&nbsp&nbsp&nbsp&nbsp" . $row['ram']; echo "<br>"; }
 
 mysqli_close($baza);
 
 $wszystko_OK=true;
 if(isset($_POST['amd']))
 {
    $amd = $_POST['amd'];
    $intel = $_POST['intel'];
    $nvidia = $_POST['nvidia'];
    $amdgrafika = $_POST['amdgrafika'];
 }

   

 ?>
 <html>
    <head>
</head>
<body>

<from  method="POST">
    <br><br><br><br><br>

<center>
AMD: <br/> <input type="text" value="
        <?php
			if (isset($_SESSION['amd']))
			{
				echo $_SESSION['amd'];
				unset($_SESSION['amd']);
			}
		?>" name="amd" /> <br/>
        		
            <?php
			    if (isset($_SESSION['e_amd']))
			    {
			    	echo '<div class="error" style="color:red">'.$_SESSION['e_amd'].'</div>';
			    	unset($_SESSION['e_amd']);
		    	}
		    ?>

INTEL: <br/> <input type="text"value="
        <?php
			if (isset($_SESSION['fr_intel']))
			{
				echo $_SESSION['fr_intel'];
				unset($_SESSION['fr_intel']);
			}
		?>" name="intel" /> <br/>

NVIDIA: <br/> <input type="text"value="
        <?php
			if (isset($_SESSION['fr_nvidia']))
			{
				echo $_SESSION['fr_nvidia'];
				unset($_SESSION['fr_nvidia']);
			}
		?>" name="nvidia" /> <br/>

AMD GRAFIKA: <br/> <input type="text"value="
        <?php
			if (isset($_SESSION['fr_amdgrafika']))
			{
				echo $_SESSION['fr_amdgrafika'];
				unset($_SESSION['fr_amdgrafika']);
			}
		?>" name="amdgrafika" /> <br/>

PŁYTA GŁOWNA: <br/> <input type="text"value="
        <?php
			if (isset($_SESSION['fr_plyta']))
			{
				echo $_SESSION['fr_plyta'];
				unset($_SESSION['fr_plyta']);
			}
		?>" name="plyta" /> <br/>

RAM: <br/> <input type="text"value="
        <?php
			if (isset($_SESSION['fr_ram']))
			{
				echo $_SESSION['fr_ram'];
				unset($_SESSION['fr_ram']);
			}
		?>"
         name="ram" /> <br/>
         <br><br>
         <button type="submit" >Prześlij</button>
        </center>
</from>

</body>
</html>