<?php
declare(strict_types=1); require __DIR__.'/config.php';
$error=''; $success=false;
if ($_SERVER['REQUEST_METHOD']==='POST') {
 check_token();
 $station=filter_var($_POST['station']??null,FILTER_VALIDATE_INT);
 $year=filter_var($_POST['year']??null,FILTER_VALIDATE_INT);
 $season=(string)($_POST['season']??'');
 $temp=filter_var($_POST['temperature']??null,FILTER_VALIDATE_FLOAT);
 $rain=filter_var($_POST['rain']??null,FILTER_VALIDATE_INT);
 if (!$station || !$year || $year<1900 || $year>(int)date('Y') || !in_array($season,['hiver','printemps','ete','automne'],true) || $temp===false || $temp < -50 || $temp > 60 || $rain===false || $rain<0 || $rain>10000) $error='Vérifiez la station, l’année, la saison, la température (-50 à 60 °C) et les précipitations (0 à 10 000 mm).';
 else {
  $st=$db->prepare('SELECT Idstation FROM station WHERE Idstation=?'); $st->bind_param('i',$station); $st->execute();
  if (!$st->get_result()->fetch_assoc()) $error='Station inconnue.';
  else {
   try { $ins=$db->prepare('INSERT INTO mesure (idstation, annee, saison, temperature, pluie) VALUES (?, ?, ?, ?, ?)'); $ins->bind_param('iisdi',$station,$year,$season,$temp,$rain); $ins->execute(); $success=true; }
   catch(mysqli_sql_exception $e) { if ((int)$e->getCode()===1062) $error='Une mesure existe déjà pour cette station, cette année et cette saison.'; else throw $e; }
  }
 }
}
$stations=$db->query('SELECT Idstation, Nom, Ville FROM station ORDER BY Ville, Nom');
?><!doctype html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Ajouter une mesure — Fedi Climat</title><link rel="stylesheet" href="fedi.css"></head><body><header><a class="brand" href="index.php"><span>F</span> Fedi Climat</a><nav><a href="index.php">Accueil</a><a href="consultation.php">Consulter</a><a href="moyenne.php">Moyennes</a></nav></header><main class="content"><p class="eyebrow">Nouveau relevé</p><h1>Ajouter une mesure</h1><?php if($error):?><p class="alert"><?=h($error)?></p><?php endif;?><?php if($success):?><p class="success">Mesure enregistrée avec succès.</p><?php endif;?><form method="post"><input type="hidden" name="csrf" value="<?=h(token())?>"><label for="station">Station</label><select id="station" name="station" required><option value="">Choisir une station</option><?php while($s=$stations->fetch_assoc()):?><option value="<?=(int)$s['Idstation']?>"><?=h($s['Nom'].' — '.$s['Ville'])?></option><?php endwhile;?></select><label for="year">Année</label><input id="year" name="year" type="number" min="1900" max="<?= (int)date('Y') ?>" required><label for="season">Saison</label><select id="season" name="season" required><option value="">Choisir</option><option value="hiver">Hiver</option><option value="printemps">Printemps</option><option value="ete">Été</option><option value="automne">Automne</option></select><label for="temperature">Température moyenne (°C)</label><input id="temperature" name="temperature" type="number" min="-50" max="60" step="0.01" required><label for="rain">Précipitations (mm)</label><input id="rain" name="rain" type="number" min="0" max="10000" step="1" required><button class="button">Enregistrer</button></form></main><footer>Fedi Climat</footer></body></html>