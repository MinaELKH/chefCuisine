<?php

ob_start();
$title = "Mes Reservations";
session_start() ;
    /*if($_SESSION['role']!="client"){ //client
      header("location: ../erreur.php") ;
      exit ;
    }
    else if($_SESSION['role'] =="client"){
       $id_user = $_SESSION['id_user'] ; 
    }
    echo "<p class='bg-red-400'> hello login  client </p>" ;*/
    $_SESSION['id_user'] =  1 ; 


    require("../db/db.php");
?>
<div class="flex justify-between lg:mx-20 mb-8 p-2 border-b-2 border-y-indigo-300">
  <h2 class="text-2xl text-indigo-800">
    <?php echo $title; ?>
  </h2>
  <div>

  </div>
</div>

<div class='listeTable'>
  
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 text-left">Menu</th>
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
        $query = "SELECT r.*  ,   m.nomMenu 
                  FROM reservation as r 
                  inner join menu as m on r.id_menu = m.id_menu
                  where r.id_user = ?                                  
         ";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt , "i" , $_SESSION['id_user']); 
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $id, $date, $heure, $nb_personne,    $statut ,$id_user , $id_menu,  $tel ,$message , $archive ,  $nomMenu  );
            while (mysqli_stmt_fetch($stmt)) {
                echo "<tr>
                 <form action='' method='post'>
                 <input type='hidden' name='id_reservation' value='{$id}'>
                    <td class='py-2 px-4'>$nomMenu</td>
                    <td class='py-2 px-4'>$date</td>
                    <td class='py-2 px-4'>$heure</td>
                    <td class='py-2 px-4'>$nb_personne</td>
                    <td class='py-2 px-4'>$tel</td>
                    <td class='py-2 px-4'>$message</td>
                    <td class='py-2 px-4'> $statut </td>
                    <td >
                   </form>
                   <form action='' method='post'>
                        <input type='hidden' name='id_reservation' value='{$id}'>
                        <button type='submit' name='supprimer'>
                         <i class='fa fa-trash' aria-hidden='true'></i>
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



<div id="modal" class="fixed inset-0 flex items-center z-50 justify-center bg-white bg-opacity-50 p-4">
    <div class="relative p-6 shadow-xl rounded-lg bg-white text-gray-900 w-full max-w-lg overflow-y-auto">
        <span id="closeModal" class="absolute right-4 top-4 text-gray-600 hover:text-gray-900 cursor-pointer material-symbols-outlined text-2xl"  onclick="closeModal('modal')">cancel</span>
        <h2 class="text-2xl font-bold mb-6 text-center text-yellow-500">Modifier Réservation</h2>
        <p id="editError" class="hidden text-sm font-semibold px-4 py-2 mb-4 text-red-700 bg-red-100 border border-red-400 rounded"></p>
        <form id="editReservationForm" class="flex flex-col gap-4" action="" method="POST">
            <input id="edit_id" type="hidden" value="-1">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="edit_date_r" class="block font-medium mb-1">Date</label>
                    <input id="edit_date_r" name="date_r" type="date" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                </div>
                <div>
                    <label for="edit_heure" class="block font-medium mb-1">Heure</label>
                    <input id="edit_heure" name="heure" type="time" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                </div>
                <div>
                    <label for="edit_nb_personne" class="block font-medium mb-1">Nombre de Personnes</label>
                    <input id="edit_nb_personne" name="nb_personne" type="number" min="1" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                </div>
                <div>
                    <label for="edit_statut" class="block font-medium mb-1">Menu</label>
                    <select id="edit_statut" name="statut" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                        <option value="Menu1">Menu1</option>
                        <option value="Menu2">Menu2</option>
                        <option value="Menu3">Menu3</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" name="editReservation" id="submitEditReservation" class="w-full bg-[#7F020F] hover:bg-red-700 text-white font-bold py-2 rounded-lg">Valider</button>
            </div>
        </form>
    </div>
</div>


<?php
$content = ob_get_clean();
include 'layout.php';
?>