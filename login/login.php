<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="flex flex-col justify-center items-center w-full h-[100vh] bg-[#282D2D]  px-5">
    <div class="flex flex-col items-end justify-start overflow-hidden mb-2 xl:max-w-3xl w-full"></div>
    <div class="w-full p-5 sm:p-10 rounded-md">
      <h1 class="text-center text-xl sm:text-3xl font-semibold text-white">
        Connectez-vous à votre compte
      </h1>
      <div class="w-full mt-8">
        <form  action="../index.php"  method="post">
        <div class="mx-auto max-w-xs sm:max-w-md md:max-w-lg flex flex-col gap-4">
          <div>
            <label for="email" class="text-white">Email :</label>
            <input id="email" name="email"
              class="w-full px-5 py-3 rounded-lg font-medium border-2 border-transparent placeholder-gray-500 text-sm focus:outline-none focus:border-2 focus:outline"
              type="email"
              placeholder="Votre adresse email" />
          </div>
          <div>
            <label for="password" class="text-white">Mot de passe :</label>
            <input id="password" name="password"
              class="w-full px-5 py-3 rounded-lg font-medium border-2 border-transparent placeholder-gray-500 text-sm focus:outline-none focus:border-2 focus:outline"
              type="password"
              placeholder="Votre mot de passe" />
          </div>
          <button type="submit" name="connecter" class="mt-5 tracking-wide font-semibold bg-[#FEA116] text-gray-100 w-full py-4 rounded-lg hover:bg-[#E9522C]/90 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
            <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
              <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
              <circle cx="8.5" cy="7" r="4" />
              <path d="M20 8v6M23 11h-6" />
            </svg>
            <span class="ml-3">Se connecter</span>
          </button>
          <p class="mt-6 text-xs text-gray-600 text-center">
            Pas encore de compte ? 
            <a href="register.php">
              <span class="text-[#FEA116] font-semibold">Inscrivez-vous</span>
            </a>
          </p>
        </div>
</form>
      </div>
    </div>
  </div>

 

  <?php
session_start();
require("../db/db.php");

if (isset($_POST["connecter"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $query = "SELECT id_user, nom, mdp  ,id_role FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt)) {
        mysqli_stmt_bind_result($stmt, $id, $nom, $pwd ,$id_role);
        mysqli_stmt_fetch($stmt);

        if (password_verify($password, $pwd)) {
          //client
            session_regenerate_id();
            $_SESSION['login'] = TRUE;
            $_SESSION['name'] = $nom;
            $_SESSION['id'] = $id;

            echo 'Bienvenue  ' . htmlspecialchars($nom, ENT_QUOTES);
           // echo "<br><p class='text-red-500 text-center'> role est" . $id_role ."</p>";
                if($id_role==1) //admin
                {
                  echo "<p class='text-red-500 text-center'>admin.</p>";
                  $_SESSION['role'] ="admin" ;
                } else if ($id_role==2) {
                  $_SESSION['role'] ="client" ;
                  echo "<p class='text-red-500 text-center'>client</p>";
                }
        } else {
            echo "<p class='text-red-500 text-center'>Veuillez vérifier votre mot de passe.</p>";
        }
    } else {
        echo "<p class='text-red-500 text-center'>Veuillez vérifier votre email.</p>";
    }
    mysqli_stmt_close($stmt);
}
?>




</body>
</html>
