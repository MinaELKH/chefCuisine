<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="flex flex-col justify-center items-center w-full h-[100vh] bg-[#282D2D] px-5">
    <div class="flex flex-col items-end justify-start overflow-hidden mb-2 xl:max-w-3xl w-full"></div>
    <div class="w-full p-5 sm:p-10 rounded-md">
      <h1 class="text-center text-xl sm:text-3xl font-semibold text-white">
        Inscrivez-vous pour un compte gratuit
      </h1>
      <div class="w-full mt-8">
        <form action="#" method="post">
          <div class="mx-auto max-w-xs sm:max-w-md md:max-w-lg flex flex-col gap-4">
            <div>
              <label for="nom" class="text-white">Nom :</label>
              <input name="nom" class="w-full px-5 py-3 rounded-lg font-medium border-2 border-transparent placeholder-gray-500 text-sm focus:outline-none focus:border-2 focus:outline" type="text" placeholder="Votre nom" required />
            </div>
            <div>
              <label for="prenom" class="text-white">Prénom :</label>
              <input name="prenom" class="w-full px-5 py-3 rounded-lg font-medium border-2 border-transparent placeholder-gray-500 text-sm focus:outline-none focus:border-2 focus:outline" type="text" placeholder="Prénom" />
            </div>
            <div>
              <label for="email" class="text-white">Email :</label>
              <input name="email" class="w-full px-5 py-3 rounded-lg font-medium border-2 border-transparent placeholder-gray-500 text-sm focus:outline-none focus:border-2 focus:outline" type="email" placeholder="Votre adresse email" required />
            </div>
            <div>
              <label for="password" class="text-white">Mot de passe :</label>
              <input name="password" class="w-full px-5 py-3 rounded-lg font-medium border-2 border-transparent placeholder-gray-500 text-sm focus:outline-none focus:border-2 focus:outline" type="password" placeholder="Votre mot de passe" required />
            </div>
            <div>
              <label for="password1" class="text-white">Confirmez le mot de passe :</label>
              <input name="password1" class="w-full px-5 py-3 rounded-lg font-medium border-2 border-transparent placeholder-gray-500 text-sm focus:outline-none focus:border-2 focus:outline" type="password" placeholder="Confirmez le mot de passe" required />
            </div>
            <button type="submit" name="inscrir" class="mt-5 tracking-wide font-semibold bg-[#FEA116] text-gray-100 w-full py-4 rounded-lg hover:bg-[#E9522C]/90 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
              <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                <circle cx="8.5" cy="7" r="4" />
                <path d="M20 8v6M23 11h-6" />
              </svg>
              <span class="ml-3">S'inscrire</span>
            </button>
            <p class="mt-6 text-xs text-gray-600 text-center">
              <a href="login.php">
                <span class="text-[#FEA116] font-semibold">Se connecter</span>
              </a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php
  include("../db/db.php");

  if (isset($_POST["inscrir"])) {
      $nom = mysqli_real_escape_string($conn, $_POST["nom"]);
      $email = mysqli_real_escape_string($conn, $_POST["email"]);
      $password = $_POST["password"];
      $password1 = $_POST["password1"];
      $id_role = 2 ;  // role client
      if ($password !== $password1) {
          echo "<p class='text-red-500 text-center'>Les mots de passe ne correspondent pas.</p>";
      } else {
          $hashed_password = password_hash($password, PASSWORD_DEFAULT);
          $query = "INSERT INTO users (nom, email, mdp ,id_role) VALUES (?, ?, ? , ?)";
          $stmt = mysqli_prepare($conn, $query);
          mysqli_stmt_bind_param($stmt, "sssi", $nom, $email, $hashed_password ,      $id_role);
          if (mysqli_stmt_execute($stmt)) {
              echo "<p class='text-green-500 text-center'>Inscription réussie !</p>";
          } else {
              echo "<p class='text-red-500 text-center'>Erreur lors de l'inscription : " . mysqli_error($conn) . "</p>";
          }
          mysqli_stmt_close($stmt);
      }
  }
?>
</body>
</html>
