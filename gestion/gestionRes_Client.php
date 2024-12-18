<?php

ob_start();
$title = "Gestion des reservations cote client";

?>

<div class='listeTable' >
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 text-left">ID</th>
                <th class="py-2 px-4 text-left">Date</th>
                <th class="py-2 px-4 text-left">Heure</th>
                <th class="py-2 px-4 text-left">Nombre de Personnes</th>
                <th class="py-2 px-4 text-left">Statut</th>
       
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4">1</td>
                <td class="py-2 px-4">2024-12-20</td>
                <td class="py-2 px-4">18:00</td>
                <td class="py-2 px-4">4</td>
                <td class="py-2 px-4 ">
                    <select class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm">
                        <option value="confirmée">Confirmée</option>
                        <option value="annulée">Annulée</option>
                    </select>
                </td>
              
            </tr>
            <tr>
                <td class="py-2 px-4">2</td>
                <td class="py-2 px-4">2024-12-21</td>
                <td class="py-2 px-4">19:00</td>
                <td class="py-2 px-4">2</td>
                <td class="py-2 px-4">
                    <select class=" w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm">
                        <option value="confirmée">Confirmée</option>
                        <option value="annulée">Annulée</option>
                    </select>
                </td>
       
            </tr>
        </tbody>
    </table>
</div>



<div id="modal" class="fixed inset-0 flex items-center z-50 justify-center bg-white bg-opacity-50">
    <div class="relative p-6 shadow-xl rounded-lg bg-white text-gray-900 overflow-y-auto lg:w-1/3">
        <span id="closeModal" class="absolute right-4 top-4 text-gray-600 hover:text-gray-900 cursor-pointer material-symbols-outlined text-2xl">cancel</span>
        <h2 class="text-2xl font-bold mb-6 text-center text-yellow-500">Modifier Réservation</h2>
        <p id="editError" class="hidden text-sm font-semibold px-4 py-2 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
        </p>
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
                    <label for="edit_statut" class="block font-medium mb-1">Statut</label>
                    <select id="edit_statut" name="statut" class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
                        <option value="en attente">En attente</option>
                        <option value="confirmée">Confirmée</option>
                        <option value="annulée">Annulée</option>
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