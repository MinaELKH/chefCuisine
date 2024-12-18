xl<?php
include '../db/db.php';
ob_start(); 
$title = "DASHBORD";
?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 p-5 m-2">
    <div class="bg-gray-100 p-5 m-2 rounded-lg shadow-lg text-center text-lg lg:text-lg">
        <h3 class="text-lg lg:text-lg mb-2">Nombre de demandes en attente</h3>
        <p class="text-lg lg:text-lg font-bold">125</p>
    </div>
    <div class="bg-gray-100 p-5 m-2 rounded-lg shadow-lg text-center text-lg lg:text-lg">
        <h3 class="text-lg lg:text-lg mb-2">Nombre de demandes approuvées pour la journée.</h3>
        <p class="text-lg lg:text-lg font-bold">789</p>
    </div>
    <div class="bg-gray-100 p-5 m-2 rounded-lg shadow-lg text-center text-lg lg:text-lg">
        <h3 class="text-lg lg:text-lg mb-2">Nombre de demandes approuvées pour pour le jour suivant.</h3>
        <p class="text-lg lg:text-lg font-bold">50</p>
    </div>

    <div class="bg-gray-100 p-5 m-2 rounded-lg shadow-lg text-center text-lg lg:text-lg">
        <h3 class="text-lg lg:text-lg mb-2">Nombre de clients inscrits.</h3>
        <p class="text-lg lg:text-lg font-bold">3589</p>
    </div>
    
    <div class="bg-gray-100 p-5 m-2 rounded-lg shadow-lg text-center text-lg lg:text-lg">
        <h3 class="text-lg lg:text-lg mb-2">Nombre de Réservation confirmées</h3>
        <p class="text-lg lg:text-lg font-bold">10</p>
    </div>

    <div class="bg-gray-100 p-5 m-2 rounded-lg shadow-lg text-center text-lg lg:text-lg">
        <h3 class="text-lg lg:text-lg mb-2">CA</h3>
        <p class="text-lg lg:text-lg font-bold">10</p>
    </div>
</div>

<h3 class="text-lg font-merienda mb-4">Détails du prochain client et de sa réservation.</h3>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-5 m-2 border border-indigo-300 rounded-lg shadow-md">
    <!-- Première colonne : Photo du menu et nom des plats -->
   <!-- <div class="text-center">
        <img src="path/to/menu-photo.jpg" alt="Menu Photo" class="w-full h-32 object-cover rounded-lg mb-2">
        <h4 class="text-lg font-merienda">Nom du Menu</h4>
        <ul class="text-left text-md">
            <li>Plat 1</li>
            <li>Plat 2</li>
            <li>Plat 3</li>
        </ul>
    </div>-->

    <!-- Deuxième colonne : Détails de la réservation -->
    <div class="">
       
        <p class="text-lg">Nom du client : John Doe</p>
        <p class="text-lg" >Date de la réservation : 20/12/2024</p>
        <p class="text-lg">Heure de la réservation : 15:00</p>
        <p class="text-lg">Statut : Confirmé .</p>
    </div>
</div>

<?php
$content = ob_get_clean(); 
include 'layout.php'; 
?>
