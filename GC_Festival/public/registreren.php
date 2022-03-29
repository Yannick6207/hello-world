<?php
require_once('header.php');
require_once('../src/userFunctions.php');

try {
    $PDO = new PDO("mysql:host=localhost;dbname=gc_festival","root","");

    $newUser = null;
    if (isset($_POST['register'])){
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $newUser = registerUser("$firstname","$lastname","$email","$password");
    }
}catch (PDOException $e){
    die("error!: " . $e->getMessage());
}
?>
    <div class="page registreren">
        <div class="container">
            <h1>Registreren</h1>
            <?php if ($newUser === 1){?>
           <p>nieuwe gebruiker succesvol toegevoegd</p>
           <?php }else{ ?>
           <form action="#" method="post">
               <div class="inputRow">
                   <label for="firstName">Voornaam</label>
                   <input type="text" name="firstName">
                   <br>
                   <label for="lastName">Achternaam</label>
                   <input type="text" name="lastName">
                   <br>
                   <label for="email">Email</label>
                   <input type="email" name="email">
                   <br>
                   <label for="password">Wachtwoord</label>
                   <input type="password" name="password">
                   <br>
                   <input type="submit" name="register" value="Registreer">
               </div>
           </form>
          <?php } ?>
        </div>
    </div>
<?php require_once 'footer.php';?>