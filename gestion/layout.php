
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Concevoir une application web de gestion d agence de voyage">
    <meta name="keywords" content="voyage, travel, actvite, destination, reservation ,nature">
    <meta name="author" content="Mina">

    
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ChefCuisine</title>
    <link rel="icon" href="../images/imgs/logo1.png" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"> <!-- icon reseau sociaux-->
    <link rel="stylesheet" href="styles/index.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <?php  if($title!="DASHBORD") {echo "<script src='../js/main.js' defer></script>";} 
    ?>
    
    <script src='../js/burger.js' defer></script>
    <link rel="stylesheet" href="../css/style.css" />
   

</head>

<body class=" flex flex-col relative  bg-white no-repeat bg-cover    kanit-medium">
    <div class=" flex ">
        <aside class="hidden lg:block   bg-[#0f172b]     border-2 border-orange-100 rounded-xl w-1/5 p-2 pt-10">
            <div class="">

                <img class="  mx-auto  w-24 h-12 " src="../images/imgs/logo1.png"  alt="logo">
            </div>
            

            <nav id="menu"
     class="hidden lg:flex flex-col  gap-4 justify-center mx-auto items-center align-center mt-10">
  
  
  <?php
    if ($_SESSION['role'] == "client") { // client
        echo '
        <a href="../index.php" class="flex items-center space-x-4 text-white">
             <i class="fas fa-home"></i>
            <span>Accueil</span>
        </a>
                
        
            <a href="gestionRes_Client.php"
                class="text-white flex items-center justify-center gap-5 m-2 w-2/3  cursor-pointer border-[#FEA116] rounded-lg hover:scale-[1.1] hover:text-gray-800">
                  Mes Reservations
            </a>';
    } elseif ($_SESSION['role'] == "admin") { // Admin
        $id_Admin = $_SESSION['id']; 

        echo '<a href="Dashboard_chef.php"
                class="text-white flex justify-center items-center m-2 w-2/3 border-2 cursor-pointer border-[#FEA116] rounded-lg hover:scale-[1.1] hover:text-gray-800">
                  Dashboard
            </a>';

        echo '<a href="gestionMenu_Chef.php"
                class="text-white flex justify-center items-center m-2 w-2/3 border-2 cursor-pointer border-[#FEA116] rounded-lg hover:scale-[1.1] hover:text-gray-800">
                  Menu
            </a>';

        echo '<a href="gestionRes_Chef.php"
                class="text-white flex items-center justify-center m-2 w-2/3 border-2 cursor-pointer border-[#FEA116] rounded-lg hover:scale-[1.1] hover:text-gray-800">
                  Reservations
            </a>';
    }
    ?>

</nav>



        </aside >
        <div  class="w-full">
            <header class="p-5 lg:my-2.5 ">
            
                <div class=" mx-auto flex justify-between items-center">
                <div >
                <img class="lg:hidden mx-auto" src="../images/imgs/logo1.png" width="150" alt="logo">
            </div>

                <div class="flex  lg:ml-auto lg:flex-row flex-1  items-center  justify-end">
                <?php
                  if($_SESSION['role']=="admin"){ //admin
                    echo"     <a  class='text-white w-12 h-12'>
                            <img src='../images/imgs/userChef.jpg'  alt='user logo'>
                        </a>" ;}
                       
                if($_SESSION['role']=="client"){ //client
            
                     echo"   <a class='text-4xl'><i class='fa-solid fa-user-tie'></i></a>" ;
                    } ?>
                         <a href='../login/deconnecter.php' class='block hover:bg-yellow-300 p-2 rounded'>se deconnecter</a>
                </div>
                <div id="menuBurger" class="lg:hidden bg-black text-white p-4 absolute w-1/3 top-10 right-0 hidden">
                    <nav class="flex flex-col items-center">
                        <a href="Dashboard_chef.php" class="hover:bg-white hover:text-black rounded px-3 py-1 mb-2">DashBoard</a>
                        <a href="gestionRes_Chef.php"
                            class="hover:bg-white hover:text-black rounded px-3 py-1 mb-2">  gestion des Reservations</a>
                        <a href="gestionMenu_Chef.php" class="hover:bg-white hover:text-black rounded px-3 py-1 mb-2">gestion des Menus
                            Us</a>
                        <a href="gestionRes_Client.php" class="hover:bg-white hover:text-black rounded px-3 py-1 mb-2"> Mes Reservations</a>
                    </nav>
                </div>
                    <div class="lg:hidden ml-auto order-3">
                        <button id="menu-button" class="text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>




                </div>
<!-- Menu burger-->
              
            </header>
            <div class="px-2.5">
            <hr class="border-t border-[#FEA116] opacity-50">
          
             </div>

          
            

         
               
          


        


            <main class="flex-grow min-h-screen">

                <div class=" h-full flex flex-col lg:flex-row lg:px-[20px] gap-20 relative justify-cente">
                    <div class=" w-full ">
                        <?php
                        // Main contient les autres pages 
                       echo isset($content) ? $content : '<p>Bienvenue sur le site de réservation de voyages.</p>';
                        ?>
                    </div>

                </div>

        </div>
        </main>
    </div>
    </div>
 
</body>

</html>