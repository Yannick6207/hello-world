<?php require_once 'header.php';
require_once '../src/databaseFunctions.php';
require_once '../src/userFunctions.php';

    $mysqli = new mysqli("localhost","root","","gc_festival");
    $sql = "select * from tickets";
    $tickets = $mysqli->query($sql);
    $user = null;
    $nieuwesql = null;
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql= "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
//        print_r($user);
    }
?>
    <div class="page tickets">
        <div class="container">
            <h1>Tickets bestellen</h1>
            <div class="ticketList">
                <?php if ($user !== 'no user found' && $user !== null){?>
                <form action="orderConfirmation.php" method="post">
                    <div class="inputRow">
                                 <label for="userID">Gebruikers ID</label>
                                 <input type="number" name="userID" value="<?php echo $user['id'];?>">
                   </div>
                    <div class="inputRow">
                       <label for="ticketSelect">soort ticket</label>
                            <select name="ticketSelect">
                        <?php
                       while ($ticket = $tickets->fetch_assoc()){
                        ?>
                               <option value="<?php echo $ticket['id'];?>"><?php echo $ticket['name'];?></option>
                           <?php
                       }
                           ?>
                        </select>
                    </div>
                    <div class="inputRow">
                        <label for="amount">Hoeveelheid</label>
                        <input type="number" name="amount">
                    </div>
                    <div class="inputRow">
                        <input type="submit" value="bestellen" name="order">
                    </div>
                </form>
          <?php }else{ ?>
          <form action="#" method="post">
              <div class="inputRow">
                  <label for="email">Email</label>
                      <input type="email" name="email">
              </div>
              <div class="inputRow">
                  <label for="password">Wachtwoord</label>
                      <input type="password" name="password">
              </div>
              <div class="inputRow">
                  <input type="submit" value="login" name="login">
              </div>
          </form>
    <?php } ?>
            </div>
        </div>
    </div>
<?php include_once 'footer.php';?>