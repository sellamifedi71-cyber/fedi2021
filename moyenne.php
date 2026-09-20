<?php
$cnx=mysqli_connect("localhost","root","","bac2021");
$st=$_POST["st"];
if(isset($_POST["t"]))
{
	$d="t";}
if(isset($_POST["t1"]))
{$d="p";}
if(isset($_POST["t"])&&isset($_POST["t1"]))
{
	$d="t et p";
}

$req="select * from station where '$st'=idstation";
$res=mysqli_query($cnx,$req);
if(mysqli_num_rows($res)=0)
{
	echo("non enregistree");
}
$req1="select * from mesure m,station s where m.idstation=s.idstation and anee=year(now()) ";
$res=mysqli_query($cnx,$req1);
if(mysqli_num_rows($res)=0)
{
	echo("aucune mesure ");
}
else{
	$req3="select * from mesure where '$st'=idstation and anee=year(now())";
	$res3=mysqli_query($cnx,$req3);
echo("<table><th>moyenne temperature")
if($d=="t")
{
	
}

}

