<?php

ob_start();
$title = "Gestion des reservations";

?>

<div class='listeTable' >
    <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
            <th class="py-2 px-4 text-left">Menu</th>
                <th class="py-2 px-4 text-left">Date</th>
                <th class="py-2 px-4 text-left">Heure</th>
                <th class="py-2 px-4 text-left">Nombre de Personnes</th>
                <th class="py-2 px-4 text-left">Statut</th>
       
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-2 px-4">Menu 1</td>
                <td class="py-2 px-4">2024-12-20</td>
                <td class="py-2 px-4">18:00</td>
                <td class="py-2 px-4">4</td>
                <td class="py-2 px-4 ">
                    <select class="w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm">
                        <option value="en attente">En attente</option>
                        <option value="confirmée">Confirmée</option>
                        <option value="annulée">Annulée</option>
                    </select>
                </td>
              
            </tr>
            <tr>
                <td class="py-2 px-4">Menu 2</td>
                <td class="py-2 px-4">2024-12-21</td>
                <td class="py-2 px-4">19:00</td>
                <td class="py-2 px-4">2</td>
                <td class="py-2 px-4">
                    <select class=" w-full bg-gray-100 border border-gray-300 rounded-lg p-2 text-sm">
                        <option value="en attente">En attente</option>
                        <option value="confirmée">Confirmée</option>
                        <option value="annulée">Annulée</option>
                    </select>
                </td>
       
            </tr>
        </tbody>
    </table>
</div>


<?php
$content = ob_get_clean();
include 'layout.php';
?>