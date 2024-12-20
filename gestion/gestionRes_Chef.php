<?php

ob_start();
$title = "Gestion des reservations";
session_start() ;
    /*if($_SESSION['role']!="admin"){ //admin
      header("location: ../erreur.php") ;
      exit ;
    }
    echo "<p class='bg-red-400'> hello login </p>" ;*/


    require("../db/db.php");

     if(isset($_POST["statut"]))
      {  $id_reservation= trim(mysqli_real_escape_string($conn ,$_POST["id_reservation"]));
        $statut= trim(mysqli_real_escape_string($conn ,$_POST["statut"]));

        $query  = "UPDATE reservation set statut_r = ? where id_reservation = ?" ; 
        $stmt = mysqli_prepare($conn  , $query) ;
        mysqli_stmt_bind_param($stmt , "si" , $statut , $id_reservation) ; 
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_close($stmt) ;
    }


        if (isset($_POST["archive"])) {
            if (isset($_POST['id_reservation']) && !empty($_POST['id_reservation'])) {
                $id = mysqli_real_escape_string($conn, $_POST["id_reservation"]);
                $query = "UPDATE reservation SET archive='1' WHERE id_reservation = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        }


?>


<?php

?>

<div class='listeTable'>
    <h2>Liste des Réservations</h2>
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 text-left">Menu</th>
                <th class="py-2 px-4 text-left">Client</th>
                <th class="py-2 px-4 text-left">Date</th>
                <th class="py-2 px-4 text-left">Heure</th>
                <th class="py-2 px-4 text-left">nb Invités</th>
                <th class="py-2 px-4 text-left">Telephone</th>
                <th class="py-2 px-4 text-left">Message</th>
                <th class="py-2 px-4 text-left">Statut</th>
                <th class="py-2 px-4 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT r.*  ,  u.nom , m.nomMenu 
                  FROM reservation as r 
                  inner join users as u on r.id_user = u.id_user 
                  inner join menu as m on r.id_menu = m.id_menu
         ";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $id, $date, $heure, $nb_personne,    $statut ,$id_user , $id_menu,  $tel ,$message , $archive , $nomUser , $nomMenu  );
            while (mysqli_stmt_fetch($stmt)) {
                echo "<tr>
                 <form action='' method='post'>
                 <input type='hidden' name='id_reservation' value='{$id}'>
                    <td class='py-2 px-4'>$nomMenu</td>
                    <td class='py-2 px-4'>$nomUser</td>
                    <td class='py-2 px-4'>$date</td>
                    <td class='py-2 px-4'>$heure</td>
                    <td class='py-2 px-4'>$nb_personne</td>
                    <td class='py-2 px-4'>$tel</td>
                    <td class='py-2 px-4'>$message</td>
                    <td class='py-2 px-4'>
                        <select name='statut' onchange='this.form.submit()' class='w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm'>
                            <option value='en attente'" . ($statut == 'en attente' ? ' selected' : '') . ">En attente</option>
                            <option value='confirmée'" . ($statut == 'confirmée' ? ' selected' : '') . ">Confirmée</option>
                            <option value='annulée'" . ($statut == 'annulée' ? ' selected' : '') . ">Annulée</option>
                        </select>
                    </td>
                    <td >
                   </form>
                   <form action='' method='post'>
                        <input type='hidden' name='id_reservation' value='{$id}'>
                        <button type='submit' name='archive'>
                            <i class='fa-regular fa-folder-open cursor-pointer'></i>
                        </button>
                    </form>
                    </td>
                
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='py-2 px-4'>Aucune réservation trouvée.</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<!--modal ajout menu-->
<div id="modal" class="hidden fixed inset-0 flex items-center z-50 justify-center bg-white bg-opacity-50">
    <div class="relative p-6 shadow-xl rounded-lg bg-white text-gray-900 overflow-y-auto lg:w-1/3">
        <span id="closeModal" class="absolute right-4 top-4 text-gray-600 hover:text-gray-900 cursor-pointer material-symbols-outlined text-2xl">
            cancel
        </span>
        <h2 class="text-2xl font-bold mb-6 text-center text-yellow-500">Ajouter un Menu</h2>
        <!-- Formulaire d'ajout de menu ici -->
    </div>
</div>



<?php
$content = ob_get_clean();
include 'layout.php';
?>