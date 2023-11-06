<?php
include 'configuration.php';




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><style>
.msg{
    width: 80%;
    background: #2196F3;
    text-align: center;
    margin: 2em auto;
    padding: 2em 0;
    text-transform: capitalize;
}

</style>
</head>
<body>
    <?php
// Handle registration
if (isset($_POST['register'])) {
    // echo "work ?";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $password = $_POST['password'];
    // $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    // $stmt->execute([$username, $email, $password]);
$sql="insert into users  values('$username','$password','$email','$type')"  ;  // Redirect to login page or another page


    if(mysqli_query($conn, $sql)){
        echo  "<h1 class='msg'>congratulation! you registered to system :) </h1>";


  }else {
        echo  "sorry somting wrong !!!  :", mysqli_error($conn);
  }
    // header("Location: login.html");
    exit();
}

   ?> 



<?php


// Handle login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password =$_POST['password'];
    $sql="select * from users ";
    $result=mysqli_query($conn , $sql);
    if (!$result) {
        echo "somting wrong";
        http_response_code(404);
        die(mysqli_error($conn));
    }
    $r=mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    // print_r($r);
 for ($i=0;$i< count($r);$i++) {//check all users
  
    if ( $r[$i]['email']==$email && $r[$i]['password']==$password) {
    
    # code...
    //   Successful login, redirect to a user dashboard or another page
    header("Location: Dashboard.php");
   } else if($i==count($r)-1){
    //    Invalid login, display an error message
            echo "Invalid login credentials.";

   }

}

}

   ?> 



</body>
</html>