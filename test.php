

<?php

ob_start();
$title = "Gestion des reservations";
?>



<div id="modal" class="fixed inset-0 flex items-center z-50 justify-center bg-white bg-opacity-50  ">
     <div class="relative p-6   border-gray-300  border-2 shadow-xl rounded-lg bg-white text-gray-900 overflow-y-auto lg:w-1/3 max-h-[calc(100vh-210px)] ">

        <span id="closeModal"
            class="absolute right-4 top-4 text-gray-600 hover:text-gray-900 cursor-pointer material-symbols-outlined text-2xl"
            >
          close
        </span>
        <h2 class="text-2xl font-bold mb-6 text-center text-yellow-500">Ajouter un Menu</h2>
        <p id="errorMsg"
            class="hidden text-sm font-semibold px-4 py-2 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
        </p>

        <form action="" method="post" id="platForm" class="grid grid-cols-2 gap-4">
            <!-- Menu -->
            <div>
                <label for="nomMenu" class="block font-medium mb-1">Nom du Menu</label>
                <input  name="nomMenu" type="text" placeholder="Nom du menu"
                    class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm" required>
            </div>
            <div>
                <label for="prix" class="block font-medium mb-1">Prix Total (€)</label>
                <input name="prix" type="number" step="0.01" placeholder="Prix du menu"
                    class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm" required>
            </div>
            <div>
                <label for="descrptionu" class="block font-medium mb-1">Description</label>
                <textarea  name="descriptionMenu" type="text" placeholder="Description"
                    class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm" required>
                    </textarea>
                </div>
            <div>
                <label for="photo" class="block font-medium mb-1">Photo</label>
                <input  name="urlPhoto" type="number" step="0.01" placeholder="Prix du menu"
                    class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm" required>
            </div>
            <!-- Plat -->
            <div id="divPlats" class="col-span-2 flex flex-col gap-2.5 ">
          
                <div id="firstplat" class="relative bg-gray-300 border-2 border-orange-100 grid grid-cols-2 gap-4 p-2.5">
                <span 
                class=" removePlat absolute right-1 top-1 text-red-600 hover:text-gray-900 cursor-pointer material-symbols-outlined text-xl">
            cancel
        </span>
                
                <!-- Nom du plat -->
                    <div class="col-span-2 md:col-span-1">
                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom du Plat</label>
                        <input id="nom" name="plats[nom][]" type="text" placeholder="Ex: Pizza Margherita"
                            class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Catégorie -->
                    <div class="col-span-2 md:col-span-1">
                        <label for="categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
                        <input id="categorie" name="plats[categorie][]" type="text" placeholder="Ex: Plat principal, Dessert"
                            class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Ingrédients -->
                    <div class="col-span-2">
                        <label for="ingredient" class="block text-sm font-medium text-gray-700">Ingrédients</label>
                        <textarea id="ingredient" name="plats[ingredient][]" rows="3" placeholder="Ex: Tomates, fromage, basilic"
                            class="w-full p-2 border border-gray-300 rounded-lg" required></textarea>
                    </div>

                    <!-- Description -->
                    <div class="col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="plats[description][]" rows="3" placeholder="Description facultative"
                            class="w-full p-2 border border-gray-300 rounded-lg"></textarea>
                    </div>

                    <!-- Photo -->
                    <div class="col-span-2">
                        <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                        <input id="photo" name="plats[photo][]" type="file" accept="image/*"
                            class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>
                </div>
            </div>

            <div class="col-span-2 flex justify-between gap-8">
                <button type="submit"
                    class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 focus:outline-none">
                    Ajouter le Menu
                </button>
                <button type="button" id="addPlat_Btn"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded-lg">
                    +
                </button>
            </div>
        </form>
    </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const divPlats = document.getElementById('divPlats');
            const addPlat_Btn = document.getElementById('addPlat_Btn');
            const firstplat = document.getElementById('firstplat');
            firstplat.querySelector('.removePlat').addEventListener('click', function() {
                    divPlats.removeChild(firstplat);
                });
            addPlat_Btn.addEventListener('click', function() {
                const newPlat = document.createElement('div');
                newPlat.className = 'relative bg-gray-300 border-2 border-orange-100 grid grid-cols-2 gap-4 p-2.5';
                newPlat.innerHTML = ` 
                    <!-- Nom du plat -->
                     <span 
            class=" removePlat absolute right-1 top-1 text-red-600 hover:text-gray-900 cursor-pointer material-symbols-outlined text-xl">
            cancel
        </span>
                    <div class="col-span-2 md:col-span-1">
                        <label for="nom" class="block text-sm font-medium text-gray-700">Nom du Plat</label>
                        <input  name="plats[nom][]" type="text" placeholder="Ex: Pizza Margherita"
                            class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Catégorie -->
                    <div class="col-span-2 md:col-span-1">
                        <label for="categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
                        <input name="plats[categorie][]" type="text" placeholder="Ex: Plat principal, Dessert"
                            class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>

                    <!-- Ingrédients -->
                    <div class="col-span-2">
                        <label for="ingredient" class="block text-sm font-medium text-gray-700">Ingrédients</label>
                        <textarea  name="plats[ingredient][]" rows="3" placeholder="Ex: Tomates, fromage, basilic"
                            class="w-full p-2 border border-gray-300 rounded-lg" required></textarea>
                    </div>

                    <!-- Description -->
                    <div class="col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="plats[description][]" rows="3" placeholder="Description facultative"
                            class="w-full p-2 border border-gray-300 rounded-lg"></textarea>
                    </div>

                    <!-- Photo -->
                    <div class="col-span-2">
                        <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                        <input  name="plats[photo][]" type="file" accept="image/*"
                            class="w-full p-2 border border-gray-300 rounded-lg" required>
                    </div>
                `;
                divPlats.appendChild(newPlat);

                // Ajout de l'écouteur d'événements de suppression
                newPlat.querySelector('.removePlat').addEventListener('click', function() {
                    divPlats.removeChild(newPlat);
                });
            });
        });
    </script>




<?php


require("db/db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomMenu = mysqli_real_escape_string($conn, $_POST["nomMenu"]);
    $prix = mysqli_real_escape_string($conn, $_POST["prix"]);
    $descriptionMenu = mysqli_real_escape_string($conn, $_POST["descriptionMenu"]);
    $urlPhoto = mysqli_real_escape_string($conn, $_POST["urlPhoto"]);

    // Insertion du menu
    $queryMenu = "INSERT INTO menu (nomMenu, prix, description, urlPhoto) VALUES (?, ?, ?, ?)";
    $stmtMenu = mysqli_prepare($conn, $queryMenu);
    mysqli_stmt_bind_param($stmtMenu, "ssss", $nomMenu, $prix, $descriptionMenu, $urlPhoto);
    mysqli_stmt_execute($stmtMenu);
    $menu_id = mysqli_insert_id($conn);

    // Insertion des plats associés
    if (isset($_POST['plats']['nom'])) {
        // Parcourir les données des plats
        $noms = $_POST['plats']['nom'];
        $categories = $_POST['plats']['categorie'];
        $ingredients = $_POST['plats']['ingredient'];
        $descriptions = $_POST['plats']['description'];
        $photos = $_POST['plats']['photo'];
    
        for ($i = 0; $i < count($noms); $i++) {
            // Assurez-vous que toutes les données pour ce plat sont définies
            if (!empty($noms[$i]) && !empty($categories[$i]) && !empty($ingredients[$i]) && !empty($photos[$i])) {
                $nomPlat = mysqli_real_escape_string($conn, $noms[$i]);
                $categoriePlat = mysqli_real_escape_string($conn, $categories[$i]);
                $ingredientPlat = mysqli_real_escape_string($conn, $ingredients[$i]);
                $descriptionPlat = isset($descriptions[$i]) ? mysqli_real_escape_string($conn, $descriptions[$i]) : null;
                $photoPlat = mysqli_real_escape_string($conn, $photos[$i]);
    
                // Insertion dans la table `plat`
                $queryPlat = "INSERT INTO plat (id_menu, nom, categorie, ingredient, description, photo) VALUES (?, ?, ?, ?, ?, ?)";
                $stmtPlat = mysqli_prepare($conn, $queryPlat);
                mysqli_stmt_bind_param($stmtPlat, "isssss", $menu_id, $nomPlat, $categoriePlat, $ingredientPlat, $descriptionPlat, $photoPlat);
                mysqli_stmt_execute($stmtPlat);
                mysqli_stmt_close($stmtPlat);
            }
        }
    }

    mysqli_stmt_close($stmtMenu);
   // header("Location: success.php"); // Redirection ou message de succès
}
?>

<?php

$content = ob_get_clean();
include 'gestion/layout.php';
?>