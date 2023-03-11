<form action=".php" method="post">
  <input type="text" name="hakusana">
  <input type="submit" value="Hae">
</form>

<?php

// Otetaan vastaan hakusana lomakkeelta
$hakusana = $_POST['hakusana'];

// Tehdään SQL-kysely hakusanalla
$kysely = "SELECT * FROM projects WHERE name LIKE '%" . $hakusana . "%'";

// Suoritetaan kysely
$tulokset = mysqli_query($yhteys, $kysely);

// Asetetaan tulokset taulukkoon
$tulokset_taulukko = array();
while ($rivi = mysqli_fetch_assoc($tulokset)) {
  $tulokset_taulukko[] = $rivi;
}

// Tulostetaan hakutulokset
foreach ($tulokset_taulukko as $projekti) {
  echo $projekti['name'] . "<br>";
}

?>
