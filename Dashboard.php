<?php
 include './configuration.php';
$sql="select * from users";
$res=mysqli_query($conn,$sql);
if (!$res) {
    # code...
    echo mysqli_errno($conn);
}else{
   $data=mysqli_fetch_all($res,MYSQLI_ASSOC);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="./Dashboard.css">

</head>
<body>
  
    <div class="container">
       <nav class="nav">welcome to your accout !</nav>
  <div style="  
    display: grid;
    grid-template-columns: 33% 33% 33%;
    height: 3em;
    background: #333;
    color: #fff;
    justify-items: center;
    align-items: center;
  ">
    <span id="username">Username</span>
    <span id="username">Email</span>
    <span id="username">type</span>
        
  
  </div>

  <table class="users-table">
 <?php 
 for ($i=0; $i <count($data) ; $i++) { 
    # code...
    echo "
 <tr>
    <td>".$data[$i]['username']."</td>
    <td>".$data[$i]['email']."</td>
    <td>".$data[$i]['type']."</td>

  </tr>";
 }
 ?>
 
 
</table>


    </div>
    
</body>
</html>