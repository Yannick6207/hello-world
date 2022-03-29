<?php include_once 'header.php';?>
<?php include_once '../src/databaseFunctions.php';?>
<?php include_once '../src/userFunctions.php';?>
<?php
$PDO="";
$lineup ="";
try {
    $PDO = new PDO("mysql:host=localhost;dbname=gc_festival","root","");
    $lineup = db_getData('select * from lineup');
}catch (PDOException $e){
    die("Error!: " . $e->getMessage());
}
?>
    <div class="page lineup">
        <div class="container">
            <h1>Line-up</h1>
            <div class="artists">
            <?php
            foreach ($lineup as $artist) {
                echo "<div class='artist'>";
               echo "<img src=". IMAGE_FOLDER . "/" . $artist['artistImage'] .  " alt=''>";
                echo "<h2>" . $artist['artistName'] . "</h2>";
             echo "</div>";
            }

            ?>
            </div>
        </div>
    </div>
<?php include_once 'footer.php';?>