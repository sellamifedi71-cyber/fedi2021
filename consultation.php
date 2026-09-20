<?php
$cnx=mysqli_connect("localhost","root","","bac2021");
$st=$_POST["st"];
$d=$_POST["d"];
$req="select * from station where idstation='$st'";
$res=mysqli_query($cnx,$res);
$t=mysql_fetch_array($res);
echo("station $t[0]");
$req1="select * from mesure where '$st'=idstation";
$res1=mysqli_query($cnx,$req1);
echo("<table>
		<tr>
			<th>saison</th>
			<th>annee</th>
			<th>mesure enregistre</th>
		</tr>");

if($d="temperature")
{
	$i=3;
}
else{$i=4;}
while($t=mysqli_fetch_array($res1))
{
	echo("<td>$t[1]</td>
	<td>$t[2]</td>
	<td>$t[$i]</td></table>");
}
mysqli_close($cnx);