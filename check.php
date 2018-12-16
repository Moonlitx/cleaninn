<?php require_once 'top.php';?>

<?php
session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {

    $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    $query ="select * from asiakas where email='$username' and password='$password'";
    $con = mysqli_connect('localhost','laurakyllonen','','Asiakasrekisteri');
    $run = mysqli_query($con,$query);

    if(mysqli_num_rows($run)>0) {
        header('location: index.php');
        $_SESSION['user']=$username;
        $_SESSION['kirjautunut'] = true;
    } 
    else {
        print "<div class='container'><p>Väärä käyttäjätunnus tai salasana!</p></div>";
        header( "refresh:2;url=login.php" );
    }

}
?>

<?php require_once 'bottom.php';?>
