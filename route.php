
<?php
session_start() ;
if(isset($_SESSION['login'])){
    if($_SESSION['role']=="admin"){ //admin
   header("location: gestion/Dashboard_chef.php") ;
     exit ;
    }
    if( $_SESSION['role'] =="client"){ //admin
      header("location: index.php") ;
        exit ;
       }
//    echo "<p class='bg-red-400'> hello login </p>" ;
}else{
  echo "<p> oups </p>" ;
}

?>
  
  