<?php

// nothing to change here 
// don't move this file

?>

<style>

body {background-color: DDDDDD;}

p {font-family: Tahoma; font-size: 12px;}
td {font-family: Tahoma; font-size: 12px;}

</style>


<centeR>

<table border="0" width="70%">
<tr>
<td valign="top" width="50%">

<?php

	echo "
		<table>
		<tr>
		<td>
			<a href=$PHP_SELF>Accueil</a>
			
			<form name='stat' action=$PHP_SELF method='post'>
				<select name='pageName'>
					<option>--";
						
				if ($handle = opendir('.'))
					while ($file = readdir($handle))
					{
						$filename  = substr($file,  0, -4); // filename without extension
						$extension = substr($file, -3,  3); // extension of the file
						
						if ($extension == "txt")
						{
							echo "<option>$filename";
						}
					}
					
				
	echo "
					</select>
				<input type='submit' name='submitPage' value='Show'>
			</form>";
	
	if (isset($submitPage))
	{
		$lines = file($pageName.'.txt');
		$count = count($lines);   // counts the number of lines
		echo "<p align='center' class='text'>
				<b>$pageName.php</b> a été chargée <b>$count</b> fois.</p>";
			
		echo "
			</td>
			</tr>
			<tr><td height='50'><hr></td></tr>
			<tr>
			<td>";
	
		// Chargements par jour -----------------------------------------------------
		
		echo "<b>chargements par jour</b><br><br>";
		
		$flag = false;
		$countDay = 1;
		$k = 1;
		$strPreviousDate = '00.00.0000';
		$strStatArr = array();
		
		for ($i = 1; ($i <= $count) && (list($key, $val) = each($lines)); $i++)
		{
			$strDate  = substr($val, 14, 11);
			$strDay   = substr($val, 14, 2);
			$strMonth = substr($val, 17, 2);
			$strYear  = substr($val, 20, 4);
	
			if ($strDate == $strPreviousDate)
			{
				$countDay++;
				$flag = true;
			}
			else if ($strDate != $strPreviousDate && $flag == true)
			{
				$strStatArr = array($k => ("<b>".$strPreviousDate."</b>".": ".$countDay));
				echo "$strStatArr[$k]<br>";
				$k++;
				$countDay = 1;
			}
			
			if ($i == $count)
			{
				$strStatArr = array($k => ("<b>".$strPreviousDate."</b>".": ".$countDay));
				echo "$strStatArr[$k]<br>";
				$k++;
				$countDay = 1;			
			}
	
			$strPreviousDate = $strDate;
		}

		echo "
			</td>
			</tr>
			<tr><td height='50'><hr></td></tr>
			<tr>
			<td>";
	
		// Nombre de IP uniques -----------------------------------------------------------
		
		echo "<b>nombre de visiteurs uniques</b><br><br>";
		
		$lines = file($pageName.'.txt');
		$count = count($lines);   // counts the number of lines
		$strIPArr = array();
	
		for ($i = 1; ($i <= $count) && (list($key, $val) = each($lines)); $i++)
		{
			$strIPArr[] = substr($val, 39);
		}
		
		$unique = array_unique($strIPArr);
		$uniqueIP = count($unique);
		echo "$uniqueIP<br>";

		echo "
			</td>
			</tr>
			</table>";
			
	echo "
		</td>
		<td bgcolor='EEEEEE'>";
		
		// Fréquences par heure ----------------------------------------------------------
		
		echo "<b>fréquence de chargements par heure</b><br><br>";
		
		$lines = file($pageName.'.txt');
		$count = count($lines);   // counts the number of lines
		$strIPArr = array();
		$strFreq  = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

		for ($i = 1; ($i <= $count) && (list($key, $val) = each($lines)); $i++)
		{
			$strIPArr = substr($val, 27, 2);
			
			if ($strIPArr == '00')
				$strFreq[0]++;
			else if ($strIPArr == '01')
				$strFreq[1]++;
			else if ($strIPArr == '02')
				$strFreq[2]++;
			else if ($strIPArr == '03')
				$strFreq[3]++;
			else if ($strIPArr == '04')
				$strFreq[4]++;
			else if ($strIPArr == '05')
				$strFreq[5]++;
			else if ($strIPArr == '06')
				$strFreq[6]++;
			else if ($strIPArr == '07')
				$strFreq[7]++;
			else if ($strIPArr == '08')
				$strFreq[8]++;
			else if ($strIPArr == '09')
				$strFreq[9]++;
				
			for ($t = 10; $t < 24; $t++)
			{
				if ($strIPArr == $t)
					$strFreq[$t]++;
			}
		}
		
		echo "<table border='0' width='100%'>";
		
		for ($i = 0; $i < 24; $i++)
		{
			$strStar  = '*';
			$strStars = '*';
			$stars = round($strFreq[$i] / 10);
			//echo "$stars";
			
			for ($j = 0; $j < $stars; $j++)
			{
				$strStars = $strStars.$strStar;
			}
			
			echo "<tr>";
			if ($i < 10)
			{
				echo "
					<td width='40%' align='center'> 0$i:00 </td>
					<td width='15%' align='center'> $strFreq[$i] </td>
					<td> $strStars </td>";
			}
			else
			{
				echo "
					<td width='40%' align='center'> $i:00 </td>
					<td width='15%' align='center'> $strFreq[$i] </td>
					<td> $strStars </td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
		
?>

</td>
</tr>
</table>

</center>