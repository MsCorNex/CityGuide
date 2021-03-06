<?php
set_include_path('inc');
$mysql_database = "City_Guide";
include "db_connect.inc.php";
// include SUCHE
$gesucht = false;
if (isset($_POST["Suche"])) $gesucht = true;


?>
<html>
<head>
    <title>City Guide</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        
        <div class="container">
            <div class="logo">
                <!--<h1>Der City Guide</h1>-->
                <img src="images/logo.png">
            </div>
            
            <a href="index_en.php"><img class="language" src="images/flag_en.png"></a>
            <a href="#"><img class="language" src="images/flag_ger.png"></a>

            <div class="search">
                <form action="index.php" method="POST">
                    <input type="image" src="images/search_icon.svg" name="Suche_start" value="">
                    <input type="text" name="Suche" placeholder="Suche nach Orten...">
                </form>
            </div>
        </div>
    </div>
    
    <div class="content">
		<?php
        if (!$gesucht) { // Damit nicht immer alles ausgegeben wird
            $sqlAus = "SELECT * FROM `Guide`"; // SELECT Befehl
			$teildb = mysqli_query($db, $sqlAus);
			while ($fetched = mysqli_fetch_array($teildb))
            {
                print "<div class=\"attraktion\">
                        <center><h4>".$fetched['Titel']."</h4></center>
                        <p><b>Adresse:</b><br> ".$fetched['Streetname']."</p><br>
                        <p><b>Nächste Bushaltestelle:</b><br> ".$fetched['Bus_stop']."</p><br>
                        <p><b>Kurzbeschreibung:</b><br>".$fetched['Abstract']."</p><br>
                        <p><b>Auf der Karte:</b><br> ".$fetched['Google_Maps']."</p>
                    </div>";
            }
        }
    	?>
    </div>
</body>
</html>
