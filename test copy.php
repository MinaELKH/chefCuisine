<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de Menu et Plats</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .dynamic-field {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .dynamic-field input {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <form action="" method="post" id="menuForm">
        <!-- Informations sur le menu -->
        <div>
            <label for="nomMenu">Nom du Menu :</label>
            <input type="text" name="nomMenu" required>
        </div>
        <div>
            <label for="prix">Prix :</label>
            <input type="number" name="prix" step="0.01" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label for="urlPhoto">URL de la Photo :</label>
            <input type="text" name="urlPhoto" required>
        </div>

        <!-- Section dynamique pour ajouter des plats -->
        <div id="platFields">
            <div class="dynamic-field">
                <input type="text" name="plats[]" placeholder="Nom du plat" required>
                <button type="button" class="addField"><i class="fa fa-plus-circle"></i></button>
            </div>
        </div>
        <button type="submit">Soumettre</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const platFields = document.getElementById('platFields');
            const addFieldButton = document.querySelector('.addField');

            addFieldButton.addEventListener('click', function() {
                const newField = document.createElement('div');
                newField.className = 'dynamic-field';
                newField.innerHTML = `<input type="text" name="plats[]" placeholder="Nom du plat" required>
                                      <button type="button" class="removeField"><i class="fa fa-minus-circle"></i></button>`;
                platFields.appendChild(newField);

                // Ajout de l'écouteur d'événements de suppression
                newField.querySelector('.removeField').addEventListener('click', function() {
                    platFields.removeChild(newField);
                });
            });
        });
    </script>
</body>
</html>



<?php
$host = "localhost";
$user = "root";
$pwd = "";
$db = "menu";

// Connexion à la base de données
$conn = mysqli_connect($host, $user, $pwd, $db);
echo("Connexion reusi : " );

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Données du menu
    $nomMenu = mysqli_real_escape_string($conn, $_POST["nomMenu"]);
    $prix = mysqli_real_escape_string($conn, $_POST["prix"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $urlPhoto = mysqli_real_escape_string($conn, $_POST["urlPhoto"]);

    // Insertion du menu
    $queryMenu = "INSERT INTO menu (nomMenu, prix, description, urlPhoto) VALUES (?, ?, ?, ?)";
    $stmtMenu = mysqli_prepare($conn, $queryMenu);
    mysqli_stmt_bind_param($stmtMenu, "ssss", $nomMenu, $prix, $description, $urlPhoto);
    mysqli_stmt_execute($stmtMenu);
    $menu_id = mysqli_insert_id($conn);

    // Insertion des plats associés
    if (isset($_POST['plats'])) {
        foreach ($_POST['plats'] as $plat) {
            $plat = mysqli_real_escape_string($conn, $plat);
            $queryPlat = "INSERT INTO plat (id_menu, nomPlat) VALUES (?, ?)";
            $stmtPlat = mysqli_prepare($conn, $queryPlat);
            mysqli_stmt_bind_param($stmtPlat, "is", $menu_id, $plat);
            mysqli_stmt_execute($stmtPlat);
            mysqli_stmt_close($stmtPlat);
        }
    }

    mysqli_stmt_close($stmtMenu);
    header("Location: success.php"); // Redirection ou message de succès
}
?>
