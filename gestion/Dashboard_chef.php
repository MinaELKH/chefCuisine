
<?php
include '../db/db.php';
ob_start(); 
$title = "DASHBORD";
//Nombre de demandes en attente.
$res = $conn->query("SELECT COUNT(*) AS total_attent FROM reservation");
$row = mysqli_fetch_assoc($res);
$total_res_attent= $row['total_attent'];
//Nombre de demandes approuvées pour la journée.
$date = date("Y/M/D") ;  // on peut utlise date de php ou date de sql avec current_date
$res1 = $conn->query("SELECT count(*) as total_conf_aujourdhui from reservation where date_r='{$date}'  and statut_r ='confirme'") ;
$row1 = mysqli_fetch_assoc($res1) ;
$total_res_confirme_aujourdhui = $row1['total_conf_aujourdhui'];

//Nombre de demandes approuvées pour pour le jour suivant.
$res2 = $conn->query("SELECT count(*) as total_conf_futur from reservation where statut_r = 'confirmée' and  date_r = (SELECT CURDATE() + INTERVAL 1 DAY AS tomorrow_date)") ;
$row2 = mysqli_fetch_assoc($res2) ;
$total_res_confirme_futur = $row2['total_conf_futur'];

//Nombre des res approuvées pour pour les jours suivants.
$res5 = $conn->query("SELECT count(*) as total_conf_futur1 from reservation where statut_r = 'confirmée' and  date_r >= (SELECT CURDATE() + INTERVAL 1 DAY AS tomorrow_date)") ;
$row5 = mysqli_fetch_assoc($res5) ;
$total_res_confirme_futur1 = $row5['total_conf_futur1'];


//Nombre de clients inscrits.
$res3 = $conn->query("SELECT count(*) as total_inscrit from users where id_role= 2") ;
$row3 = mysqli_fetch_assoc($res3) ;
$total_inscrit = $row3['total_inscrit'];


//Nombre de clients inscrits.
$res3 = $conn->query("SELECT count(*) as total_inscrit from users where id_role= 2") ;
$row3 = mysqli_fetch_assoc($res3) ;
$total_inscrit = $row3['total_inscrit'];


?>


<div class="flex justify-between lg:mx-20 mb-8 p-2 border-b-2 border-y-indigo-300">
  <h2 class="text-2xl text-indigo-800">
    <?php echo $title; ?>
  </h2>
  <div>

  </div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 p-5 m-2">
    <div class="bg-gray-100 p-5 m-2 rounded-lg shadow-lg text-center text-lg lg:text-lg">
        <h3 class="text-lg lg:text-lg mb-2">Nombre de demandes en attente</h3>
        <p class="text-lg lg:text-lg font-bold"><?php echo"$total_res_attent"?></p>
    </div>
    <div class="bg-gray-100 p-5 m-2 rounded-lg shadow-lg text-center text-lg lg:text-lg">
        <h3 class="text-lg lg:text-lg mb-2">Nombre de demandes approuvées pour la journée.</h3>
        <p class="text-lg lg:text-lg font-bold"><?php  echo"$total_res_confirme_aujourdhui" ?></p>
    </div>
    <div class="bg-gray-100 p-5 m-2 rounded-lg shadow-lg text-center text-lg lg:text-lg">
        <h3 class="text-lg lg:text-lg mb-2">Nombre de demandes approuvées pour  le jour suivant.</h3>
        <p class="text-lg lg:text-lg font-bold"><?php echo"$total_res_confirme_futur" ?></p>
    </div>

    <div class="bg-gray-100 p-5 m-2 rounded-lg shadow-lg text-center text-lg lg:text-lg">
        <h3 class="text-lg lg:text-lg mb-2">Nombre de clients inscrits.</h3>
        <p class="text-lg lg:text-lg font-bold"><?php echo"$total_inscrit" ?></p>
    </div>
    
    <div class="bg-gray-100 p-5 m-2 rounded-lg shadow-lg text-center text-lg lg:text-lg">
        <h3 class="text-lg lg:text-lg mb-2">Nombre de Réservation confirmées</h3>
        <p class="text-lg lg:text-lg font-bold"><?php echo"$total_res_confirme_futur1" ?></p>
    </div>

    <div class="bg-gray-100 p-5 m-2 rounded-lg shadow-lg text-center text-lg lg:text-lg">
        <h3 class="text-lg lg:text-lg mb-2">CA</h3>
        <p class="text-lg lg:text-lg font-bold">10</p>
    </div>
</div>





  <h2 class="mx-8 text-xl font-merienda mb-4 text-indigo-800">
        Détails du prochain client et de sa réservation
  </h2>





<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 p-5 m-2 border border-indigo-300 rounded-lg shadow-md">



    <!-- Deuxième colonne : Détails de la réservation -->
    <?php 

//Détails du prochain client et de sa réservation.

$query = ("SELECT r.*  ,  u.nom , m.nomMenu  , m.prix , m.description 
                  FROM reservation as r 
                  inner join users as u on r.id_user = u.id_user 
                  inner join menu as m on r.id_menu = m.id_menu
         
                    where date_r >= CURRENT_DATE()
                    and TIME(heure_r) >= CURTIME()
                    and statut_r = 'confirmée'
                    order by date_r ASC , heure_r ASC 
                    limit 1 ") ;

$stmt=mysqli_prepare($conn ,$query) ;
mysqli_stmt_execute($stmt) ; 
mysqli_stmt_store_result($stmt) ;
if (mysqli_stmt_num_rows($stmt) > 0){
mysqli_stmt_bind_result($stmt  ,  $id, $date, $heure, $nb_personne,    $statut ,$id_user , $id_menu,  $tel ,$message , $archive , $nomUser , $nomMenu , $prix ,$description) ;
mysqli_stmt_fetch($stmt) ;


  echo" 
  <div>
    <img src='path/to/menu-photo.jpg' alt='Menu Photo' class='w-full h-32 object-cover rounded-lg mb-2'>
  </div> 
    <div class=''>
      
        <h4 class='text-xl font-merienda text-center text-indigo-500'>Menu  :  $nomMenu </h4>
        <ul class='text-left text-lg'>
            <li>\${$prix}</li>
            <li>{$description}</li>
        </ul>
    </div>
  
  <div class=''>
   <h4 class='text-xl font-merienda text-center text-indigo-500'>Reservation</h4>
        <p class='text-lg'>Nom du client : {$nomUser}</p>
        <p class='text-lg' >Date de la réservation : {$date}</p>
        <p class='text-lg'>Heure de la réservation : {$heure}</p>
         <p class='text-lg'>Nombres des invités : {$nb_personne}</p>
        <p class='text-lg'>Statut : {$statut}.</p>
    </div>
</div>";
}
?>
<?php
$content = ob_get_clean(); 
include 'layout.php'; 
?>
