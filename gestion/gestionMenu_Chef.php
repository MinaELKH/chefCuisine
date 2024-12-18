<?php

ob_start();
$title = "Gestion des reservations";

?>

<div class='listeTable' >
<h2>Liste des Menus</h2>
    <table>
        <thead>
            <tr>
                <th>ID Menu</th>
                <th>Nom du Menu</th>
                <th>Prix (€)</th>
                <th>Archivé</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Menu 1</td>
                <td>8.50</td>
                <td>0</td>
                <td class="actions">
                    <i class="fa-solid fa-pen" title="Modifier"></i>
                    <i class="fa-solid fa-trash" title="Supprimer"></i>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Menu 2</td>
                <td>10.00</td>
                <td>1</td>
                <td class="actions">
                    <i class="fa-solid fa-pen" title="Modifier"></i>
                    <i class="fa-solid fa-trash" title="Supprimer"></i>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Menu3</td>
                <td>12.50</td>
                <td>0</td>
                <td class="actions">
                    <i class="fa-solid fa-pen" title="Modifier"></i>
                    <i class="fa-solid fa-trash" title="Supprimer"></i>
                </td>
            </tr>
        </tbody>
    </table>
<div>


<div id="modal" class=" fixed inset-0 flex items-center z-50 justify-center bg-white bg-opacity-50">
    <div class="relative p-6 shadow-xl rounded-lg bg-white text-gray-900 overflow-y-auto lg:w-1/3">
        <span id="closeModal"
            class="absolute right-4 top-4 text-gray-600 hover:text-gray-900 cursor-pointer material-symbols-outlined text-2xl">
            cancel
        </span>
        <h2 class="text-2xl font-bold mb-6 text-center text-yellow-500">Ajouter un Menu</h2>
        <p id="errorMsg"
            class="hidden text-sm font-semibold px-4 py-2 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
            </p>
    
            <div class="flex justify-end">
    <button type="button"
        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded-lg">
        +
    </button>
</div>
            <form id="platForm" class="grid grid-cols-2 gap-4">
<!--  men -->
            <div>
                <label for="nomMenu" class="block font-medium mb-1">Nom du Menu</label>
                <input id="nomMenu" name="nomMenu" type="text" placeholder="Nom du menu"
                    class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
            </div>
            <div>
                <label for="prix" class="block font-medium mb-1">Prix Total (€)</label>
                <input id="prix" name="prix" type="number" step="0.01" placeholder="Prix du menu"
                    class="inputformulaire w-full bg-gray-50 border border-gray-300 rounded-lg p-2 text-sm">
            </div>

<!--plat-->
<div class=" col-span-2 border-2 border-orange-100 grid grid-cols-2 gap-4 p-2.5">
            <!-- Nom du plat -->
            <div class="col-span-2 md:col-span-1">
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom du Plat</label>
                <input id="nom" name="nom" type="text" placeholder="Ex: Pizza Margherita"
                    class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Catégorie -->
            <div class="col-span-2 md:col-span-1">
                <label for="categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
                <input id="categorie" name="categorie" type="text" placeholder="Ex: Plat principal, Dessert"
                    class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Ingrédients -->
            <div class="col-span-2">
                <label for="ingredient" class="block text-sm font-medium text-gray-700">Ingrédients</label>
                <textarea id="ingredient" name="ingredient" rows="3" placeholder="Ex: Tomates, fromage, basilic"
                    class="w-full p-2 border border-gray-300 rounded-lg" required></textarea>
            </div>

            <!-- Description -->
            <div class="col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="3" placeholder="Description facultative"
                    class="w-full p-2 border border-gray-300 rounded-lg"></textarea>
            </div>

            <!-- Photo -->
            <div class="col-span-2">
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                <input id="photo" name="photo" type="file" accept="image/*"
                    class="w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
</div>

            <!-- Bouton Ajouter -->
            <div class="col-span-2">
                <button type="submit"
                    class="w-full bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 focus:outline-none">
                    Ajouter le Menu
                </button>
            </div>
        </form>
               
                </div>
            </div>

            
        </form>
    </div>
</div>
<?php
$content = ob_get_clean();
include 'layout.php';
?>