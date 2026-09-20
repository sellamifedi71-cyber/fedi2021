<?php
$cnx=mysqli_connect("localhost","root","","bac2021");
$st=$_POST["st"];
$sa=$_POST["sa"];
$a=$_POST["a"];
$t=$_POST["t"];
$p=$_POST["p"];
$req="select* from mesure where idstation='$st',anne='$a',sasion='$sa'";
$res=mysqli_query($cnx,$req);
if(mysqli_num_rows($res)>0)
{echo("mesure deja enregistrees");}
else
{
	$req1="insert into mesure values('$st','$a','$sa','$t','$p')";
	$res1=mysqli_query($cnx,$req1);
	if(mysqli_affected_rows($cnx)>0)
	{echo("ajout avec succes");}
}
mysqli_close($cnx)