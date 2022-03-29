<?php require_once 'header.php';
require_once '../src/databaseFunctions.php';

$mysqli = new mysqli("localhost","root","","gc_festival");
if(isset($_POST['order'])){
    $userID = $_POST['userID'];
    $ticketSelect = $_POST['ticketSelect'];
    $amount = $_POST['amount'];
    $sql = "INSERT INTO orders (userID,ticketID,amount) values('$userID' ,'$ticketSelect','$amount')";
    $mysqli->query($sql);

    $sql = "SELECT name AS 'ticketsoort',amount AS 'aantal',amount * price AS 'totaalprijs' FROM orders,tickets WHERE userID = '$userID' AND orders.ticketID = tickets.id";
    $result =  $mysqli->query($sql);
    $orderData = $result->fetch_assoc();
}
?>
    <div class="page orderConfirmation">
        <div class="container">
            <h1>Bedankt voor de bestelling!</h1>
            <table class="orderOverview" border="1">
                <tr>
                    <th>Ticket</th>
                    <th>Aantal</th>
                    <th>Prijs</th>
                </tr>
                <tr>
                        <td><?php echo $orderData['ticketsoort'];  ?></td>
                        <td><?php echo $orderData['aantal']; ?></td>
                        <td><?php echo $orderData['totaalprijs'];?></td>
                </tr>
            </table>
        </div>
    </div>
<?php include_once 'footer.php';?>