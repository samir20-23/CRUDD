<?php 
if($_SERVER["REQUEST_METHOD"]=="GET"){

    include "all.php";

    $id =  $_GET['id'];

 $con = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

        $select = $con->prepare("SELECT * FROM $tbname WHERE id='$id'");
        $select->execute();
         $fetch = $select->fetch();
   }
   $id =  $_GET['id'];
   

        if($_SERVER["REQUEST_METHOD"]=="POST"){

            include "all.php";

            try{
            $con = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
            $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);   
            //select 
            $select = $con->prepare("SELECT * FROM $tbname WHERE id='$id'");
            $select->execute();
             $fetch = $select->fetch();

          $delete = $con->prepare("DELETE FROM $tbname WHERE id='$id'");
          $delete->execute();
          header("location:users.php");
     
}catch(PDOException $e){echo "note conecct".$e->getMessage();}

        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="users.css">
</head>
<body>
    <form action="" id="formdelete" method="POST">
    <pre>
        <p id="textdelete">are you shore ? !</p>
    <button type="submit"  name="submit" id="btndelete"><img src="img/delete.png" id="imgdelete"></button>
   <a href="users.php"> <button style="position: absolute;
    left: 42px;
    padding: 10px;
    top: 96px;" name="no" id="btnno">no</button></a>

     </pre>
    </form>

</body>
</html>