<?php include_once '../config/database.php';?>
<?php
function registerUser($firstname, $lastname, $email, $password){
    try {
        $PDO = new PDO("mysql:host=localhost;dbname=gc_festival","root","");
        $db = $PDO;
        $result = $db->prepare("INSERT INTO users (firstname, lastname, email, password) 
                                  values ('$firstname' , '$lastname' , '$email' , '$password')");
        $result->execute();
        return 1;
    } catch (PDOException $e){
    die("error!: " . $e->getMessage());
}
}
//registerUser("john", "doe","johndoe@outlook.com","John1!1Doe?");
function getUser($email, $password){
    try {
        $PDO = new PDO("mysql:host=localhost;dbname=gc_festival","root","");

        $result = $PDO->prepare("select * from users where email = '$email', and  password = '$password'");
        $result->execute();
        $user = $result->fetchAll(PDO::FETCH_ASSOC);
        if($user > 0){
            return $user;
        }else{
            return "No user found";
        }
    }catch (PDOException $e){
        die("error!: " . $e->getMessage());
    }
}
//print_r(getUser("johndoe@outlook.com","John1!1Doe?"));
