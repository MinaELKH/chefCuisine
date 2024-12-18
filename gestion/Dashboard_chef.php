<?php
include 'db.php';
ob_start(); 
$title = "DASHBORD";
?>



<div class="grid  grid-cols-2 lg:grid-cols-3">
<div class="inline-block w-52 p-5 m-2 text-center text-xl border border-indigo-300 rounded-lg shadow-md">
    <!-- Contenu de la carte -->
        <h3>Nombres de Clients</h3>
        <p>125</p>
    </div>
    <div class="inline-block w-52 p-5 m-2 text-center text-xl border border-indigo-300 rounded-lg shadow-md">
    <!-- Contenu de la carte -->
        <h3> Nombres de reservation</h3>
        <p> 789</p>
    </div>
    <div class="inline-block w-52 p-5 m-2 text-center text-xl  border border-indigo-300 rounded-lg shadow-md">
    <!-- Contenu de la carte -->
        <h3> Nombres des menus disponible</h3>
        <p>50</p>
    </div>

    <div class="inline-block w-52 p-5 m-2 text-center text-xl  border border-indigo-300 rounded-lg shadow-md">
    <!-- Contenu de la carte -->
        <h3> Nombre de Clients ont Réservé</h3>
        <p>20</p>
    </div>

    <div class="inline-block w-52 p-5 m-2 text-center text-xl  border border-indigo-300 rounded-lg shadow-md">
    <!-- Contenu de la carte -->
    <h3 >CA</h3>
    <p c>3589 $</p>
    </div>

    
    <div class="inline-block w-52 p-5 m-2 text-center text-xl  border border-indigo-300 rounded-lg shadow-md">
    <!-- Contenu de la carte -->
    <h3 >Nombre de Réservation confirmées</h3>
    <p>10</p>
    </div>

</div>
<?php
$content = ob_get_clean(); 
include 'layout.php'; 
?>
