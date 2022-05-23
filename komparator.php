
<?php
 
 session_start();
 

	if(isset($_POST['amd']))
{



	$wszystko_OK=true;

 
	$amd = $_POST['amd'];
	$intel = $_POST['intel'];
	$nvidia = $_POST['nvidia'];
	$amdgrafika = $_POST['amdgrafika'];
	$plyta = $_POST['plyta'];
	$ram = $_POST['ram'];

//sprawdzanie istnienia amd
if ((strlen($amd)<3) || (strlen($amd)>30))
{
   $wszystko_OK=false;
   $_SESSION['e_amd']="Podaj nazwe procesora!";
}

//sprawdzanie istnienia intel
if ((strlen($intel)<3) || (strlen($intel)>30))
{
   $wszystko_OK=false;
   $_SESSION['e_intel']="Podaj nazwe procesora!";
}

//sprawdzanie istnienia nvidia
if ((strlen($nvidia)<3) || (strlen($nvidia)>30))
{
   $wszystko_OK=false;
   $_SESSION['e_nvidia']="Podaj nazwe karty graficzenej!";
}

//sprawdzanie istnienia amdgrafika
if ((strlen($amdgrafika)<3) || (strlen($amdgrafika)>30))
{
   $wszystko_OK=false;
   $_SESSION['e_amdgrafika']="Podaj nazwe karty graficznej!";
}

//sprawdzanie istnienia plyta
if ((strlen($plyta)<3) || (strlen($plyta)>30))
{
   $wszystko_OK=false;
   $_SESSION['e_plyta']="Podaj nazwe płyty głównej!";
}

//sprawdzanie istnienia ram
if ((strlen($ram)<3) || (strlen($ram)>30))
{
   $wszystko_OK=false;
   $_SESSION['e_ram']="Podaj nazwe ramu!";
}






		//zapamietanie wprowadzonych danych
		$_SESSION['fr_amd'] = $amd;
		$_SESSION['fr_intel'] = $intel;
		$_SESSION['fr_nvidia'] = $nvidia;
		$_SESSION['fr_amdgrafika'] = $amdgrafika;
		$_SESSION['fr_plyta'] = $plyta;
		$_SESSION['fr_ram'] = $ram;
		if (isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;



require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

   try 
   {
	   $baza = new mysqli($host, $db_user, $db_password, $db_name);
	   if ($baza->connect_errno!=0)
	   {
		   throw new Exception(mysqli_connect_errno());
	   }
	   else
	   {


	//Czy amd już istnieje
		$rezultat = $baza->query("SELECT * FROM podzespoly WHERE amd='$amd'");
			
	if (!$rezultat) throw new Exception($baza->error);
			
	$ile_amd = $rezultat->num_rows;
		if($ile_amd>0)
		{
			$wszystko_OK=false;
			$_SESSION['e_amd']="Procesor już istnieje w bazie podaj inny!";
		}	
		   
	//Czy intel już istnieje
		$rezultat = $baza->query("SELECT * FROM podzespoly WHERE amd='$intel'");
			
	if (!$rezultat) throw new Exception($baza->error);
						
	$ile_intel = $rezultat->num_rows;
		if($ile_intel>0)
		{
			$wszystko_OK=false;
			$_SESSION['e_intel']="Procesor już istnieje w bazie podaj inny!";
		}

	//Czy nvidia już istnieje
		$rezultat = $baza->query("SELECT * FROM podzespoly WHERE amd='$nvidia'");
			
	if (!$rezultat) throw new Exception($baza->error);
						
	$ile_nvidia = $rezultat->num_rows;
		if($ile_nvidia>0)
		{
			$wszystko_OK=false;
			$_SESSION['e_nvidia']="Karta graficzna już istnieje w bazie podaj inną!";
		}

	//Czy amdgrafika już istnieje
		$rezultat = $baza->query("SELECT * FROM podzespoly WHERE amd='$amdgrafika'");
			
	if (!$rezultat) throw new Exception($baza->error);
						
	$ile_amdgrafika = $rezultat->num_rows;
		if($ile_amdgrafika>0)
		{
			$wszystko_OK=false;
			$_SESSION['e_amdgrafika']="Karta graficzna już istnieje w bazie podaj inną!";
		}

	//Czy plyta już istnieje
		$rezultat = $baza->query("SELECT * FROM podzespoly WHERE amd='$plyta'");
			
	if (!$rezultat) throw new Exception($baza->error);
						
	$ile_plyta = $rezultat->num_rows;
	if($ile_plyta>0)
		{
			$wszystko_OK=false;
			$_SESSION['e_plyta']="Płyta główna już istnieje w bazie podaj inną!";
		}

	//Czy ram już istnieje
		$rezultat = $baza->query("SELECT * FROM podzespoly WHERE amd='$ram'");
			
	if (!$rezultat) throw new Exception($baza->error);
						
	$ile_ram = $rezultat->num_rows;
		if($ile_ram>0)
		{
			$wszystko_OK=false;
			$_SESSION['e_ram']="Ramy już istnieją w bazie podaj inne!";
		}

		
		   
		 
		   
		   if ($wszystko_OK==true)
		   {

			   
			   if ($baza->query("INSERT INTO podzespoly VALUES ('$intel', '$amd', '$nvidia', '$amdgrafika', '$plyta', '$ram' )"))
			   {
				   $_SESSION['udanyinsert']=true;
			   }
			   else
			   {
				   throw new Exception($baza->error);
			   }
			   
		   }
		   
		   
		   $baza->close();
	   }
	   
   }
   catch(Exception $e)
   {
	   echo '<span style="color:red;">Błąd serwera! </span>';
	 
   }









}

 ?>
 <html>
    <head>
</head>
<body>
<BR><BR><BR>
<form>

AMD

<select name="amd">
<option value="aaa" >aaa</option>
</select>



INTEL

<select name="intel">
<option value="aaa" >aaa</option>
</select>
	
	

NVIDIA
	
<select name="nvidia">
<option value="aaa" >aaa</option>
</select>

		

AMD GRAFIKA
		
<select name="amdgrafika">
<option value="aaa" >aaa</option>
</select>

		

PŁYTA GŁOWNA
			
<select name="plyta">
<option value="aaa" >aaa</option>
</select>

			

RAM
					
<select name="ram">
<option value="aaa" >aaa</option>
</select>


<BR>
<button type="submit" >Dalej</button>
</form>

<form  method="POST">

    <br><br><br><br><br>

<center>
AMD: <br> <input type="text" value="
        <?php
			if (isset($_SESSION['fr_amd']))
			{

				unset($_SESSION['fr_amd']);
			}
		?>" name="amd" /> <br>
        		
            <?php
			    if (isset($_SESSION['e_amd']))
			    {
			    	echo '<div class="error" style="color:red">'.$_SESSION['e_amd'].'</div>';
			    	unset($_SESSION['e_amd']);
		    	}
		    ?>

INTEL: <br> <input type="text"value="
        <?php
			if (isset($_SESSION['fr_intel']))
			{

				unset($_SESSION['fr_intel']);
			}
		?>" name="intel" /> <br>

		            <?php
			    if (isset($_SESSION['e_intel']))
			    {
			    	echo '<div class="error" style="color:red">'.$_SESSION['e_intel'].'</div>';
			    	unset($_SESSION['e_intel']);
		    	}
		    ?>

NVIDIA: <br> <input type="text"value="
        <?php
			if (isset($_SESSION['fr_nvidia']))
			{

				unset($_SESSION['fr_nvidia']);
			}
		?>" name="nvidia" /> <br>

<?php
			    if (isset($_SESSION['e_nvidia']))
			    {
			    	echo '<div class="error" style="color:red">'.$_SESSION['e_nvidia'].'</div>';
			    	unset($_SESSION['e_nvidia']);
		    	}
		    ?>

AMD GRAFIKA: <br> <input type="text"value="
        <?php
			if (isset($_SESSION['fr_amdgrafika']))
			{

				unset($_SESSION['fr_amdgrafika']);
			}
		?>" name="amdgrafika" /> <br>

<?php
			    if (isset($_SESSION['e_amdgrafika']))
			    {
			    	echo '<div class="error" style="color:red">'.$_SESSION['e_amdgrafika'].'</div>';
			    	unset($_SESSION['e_amdgrafika']);
		    	}
		    ?>

PŁYTA GŁOWNA: <br> <input type="text"value="
        <?php
			if (isset($_SESSION['fr_plyta']))
			{

				unset($_SESSION['fr_plyta']);
			}
		?>" name="plyta" /><br>

<?php
			    if (isset($_SESSION['e_plyta']))
			    {
			    	echo '<div class="error" style="color:red">'.$_SESSION['e_plyta'].'</div>';
			    	unset($_SESSION['e_plyta']);
		    	}
		    ?>

RAM: <br> <input type="text"value="
        <?php
			if (isset($_SESSION['fr_ram']))
			{

				unset($_SESSION['fr_ram']);
			}
		?>"
         name="ram" /><br>

		 <?php
			    if (isset($_SESSION['e_ram']))
			    {
			    	echo '<div class="error" style="color:red">'.$_SESSION['e_ram'].'</div>';
			    	unset($_SESSION['e_ram']);
		    	}
		    ?>

         <br><br>
         <button type="submit" >Prześlij</button>
		 
</center>
</form>

</body>
</html>