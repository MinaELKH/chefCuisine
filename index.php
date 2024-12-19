

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restaurant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Merienda&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
    />

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">
        <!-- Inclure le CSS de Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  </head>
  <body class="bg-gray-100 font-merienda lg:mx-16 px-2.5">
  <?php
session_start() ;
if(isset($_SESSION['login'])){
    if($_SESSION['role']=="admin"){ //admin
      header("location: gestion/Dashboard_chef.php") ;
      exit ;
    }
    echo "<p class='bg-red-400'> hello login </p>" ;
}else{
  echo "<p> oups </p>" ;
}

?>
  
  
  
  <!-- Navbar -->
    <nav
      class="bg-gray-900 text-white px-4 lg:px-8 py-3 flex justify-between items-center"
    >
      <a href="#" class="flex items-center space-x-2">
        <h1 class="text-primary text-2xl font-bold flex items-center">
          <img  class="   w-30 h-16 " src='images/logo1.png'>
        </h1>
      </a>
      <button class="lg:hidden text-white text-2xl" id="navbar-toggler">
        <i class="fa fa-bars"></i>
      </button>
      <div class="hidden lg:flex items-center space-x-6" id="navbar-menu">
        <a href="index.php" class="hover:text-[#FEA116] ">Home</a>
        <a href="#menu-section" class="hover:text-[#FEA116] ">Menu</a>
        <a href="about.html" class="hover:text-[#FEA116] ">About</a>
        <a href="service.html" class="hover:text-[#FEA116] ">Service</a>
        <a href="contact.html" class="hover:text-[#FEA116] ">Contact</a>
        <a href="gestion/gestionRes_Client.php" class="hover:text-[#FEA116] text-3xl ">

          <i class="fa-solid fa-utensils"></i></a>
       
          <div class="relative group">
            <a href="#" id="menuToggle" class="flex items-center hover:text-[#FEA116] text-3xl">
              <i class="fa-solid fa-user-tie"></i>
              <i class="fa fa-caret-down"></i>
            </a>
            <div
              id="dropdownMenu"
              class="absolute hidden bg-gray-800 text-white mt-2 rounded shadow-md p-2 space-y-2"
            >
              <a href="login/login.php" class="block hover:bg-gray-700 p-2 rounded">se connecter</a>
              <a href="login/register.php" class="block hover:bg-gray-700 p-2 rounded">s'inscrire</a>
              <a href="login/deconnecter.php" class="block hover:bg-gray-700 p-2 rounded">se deconnecter</a>
            </div>
          </div>
       
      </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-[url('images/header.png')] bg-cover  py-16">
      <div
        class="container mx-auto flex flex-col lg:flex-row items-center justify-between"
      >
        <div class="lg:w-1/2 text-center lg:text-left space-y-6 p-2.5">
          <h1 class="text-4xl lg:text-6xl font-bold leading-tight">
            Profitez de nos repas délicieux 
          </h1>
          <p class="text-white leading-relaxed">
            Découvrez l'excellence gastronomique avec notre chef de cuisine passionné. Offrez à vos papilles une expérience inoubliable à travers des plats créatifs.
          </p>
      
        </div>
      <!-- <div class="lg:w-1/2 flex justify-center lg:justify-end">
          <img
            class="w-84 h-80 rounded-lg"
            src="images/header1.png"
            alt="Hero Image"
          />--> 
        </div>
      </div>
    </div>

    <!-- Menu Section -->
    <div  id="menu-section" class=" py-16 bg-white">
      <h2 class="text-center text-3xl font-bold text-gray-800 mb-8">
        ~ Menu ~
      </h2>
      <div class="menu-cards flex flex-wrap justify-center gap-8">
        <!-- Meat Menu -->
        <div class="card">
          <img
            class="card-img-top"
            src="images/meat-menu.jpg"
            alt="Meat Menu"
          />
          <div class="card-body">
            <h5 class="card-title">~ Meat Menu ~</h5>
            <ul class="list-group">
              <li class="list-group-item">
                Bocconcini di carne in nido di sfoglia
              </li>
              <li class="list-group-item">Bruschette con maiale al curry</li>
              <li class="list-group-item">Uova al prosciutto</li>
              <li class="list-group-item">Vitello tonnato</li>
              <li class="list-group-item">
                Fesa di tacchino marinata con olive
              </li>
            </ul>

            <a
              class="text-[#21a9db] underline hover:scale-150 transition-transform cursor-pointer inline-block"
              onclick="openModal('Menu')"
              >Details</a
            >
          </div>
        </div>
        <!-- Fish Menu -->
        <div class="card">
          <img
            class="card-img-top"
            src="images/fish-menu.jpg"
            alt="Fish Menu"
          />
          <div class="card-body">
            <h5 class="card-title">~ Fish Menu ~</h5>
            <ul class="list-group">
              <li class="list-group-item">Carpaccio di polpo</li>
              <li class="list-group-item">Cozze al verde</li>
              <li class="list-group-item">Cocktail di gamberi</li>
              <li class="list-group-item">Risotto alla crema di scampi</li>
              <li class="list-group-item">
                Ravioli di pesce con crema di scampi
              </li>
            </ul>
          </div>
        </div>
        <!-- Vegetarian Menu -->
        <div class="card">
          <img
            class="card-img-top"
            src="images/menu-vegetarian.jpg"
            alt="Vegetarian Menu"
          />
          <div class="card-body">
            <h5 class="card-title">~ Vegetarian Menu ~</h5>
            <ul class="list-group">
              <li class="list-group-item">Parmigiana di melanzane</li>
              <li class="list-group-item">Strudel con ricotta e spinaci</li>
              <li class="list-group-item">Polpette di spinaci e ricotta</li>
              <li class="list-group-item">Frittata di patate al forno</li>
              <li class="list-group-item">
                Spaghetti con le polpettine vegetariane
              </li>
            </ul>
          </div>
        </div>
        <!-- Healty Menu -->
        <div class="card">
          <img
            class="card-img-top"
            src="images/menu-vegetarian.jpg"
            alt="Vegetarian Menu"
          />
          <div class="card-body">
            <h5 class="card-title">~ Vegetarian Menu ~</h5>
            <ul class="list-group">
              <li class="list-group-item">Parmigiana di melanzane</li>
              <li class="list-group-item">Strudel con ricotta e spinaci</li>
              <li class="list-group-item">Polpette di spinaci e ricotta</li>
              <li class="list-group-item">Frittata di patate al forno</li>
              <li class="list-group-item">
                Spaghetti con le polpettine vegetariane
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div
      id="ModalFelicitationAjoutEdit"
      class="hidden fixed inset-0 flex items-center justify-center z-50 bg-gray-700 bg-opacity-50"
    >
      <div class="relative p-5 shadow-xl rounded-lg bg-white p-2.5">
        <span
          id="closeModalFelicitationAjoutEdit"
          class="absolute right-2 top-2 text-gray-700 cursor-pointer material-symbols-outlined"
          >cancel</span
        >
        <div id="div_ModalFelicitationAjoutEdit" class="m-2 p-5"></div>
      </div>
    </div>

    <!-- Modal -->

    <div
      id="modal"
      class="hidden fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50"
    >
      <div class="bg-white w-full max-w-4xl rounded-lg shadow-lg relative">
        <!-- Close Button -->
        <button
          id="close-modal"
          class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl"
          onclick="closeModal()"
        >
          &times;
        </button>
        <!-- Modal Title -->
   
        <!-- Dishes -->
        <div class="grid grid-cols-2 gap-4">
          <div class="grid grid-cols-1 gap-4 p-6">
            <h2 id="menu-title" class="text-2xl font-bold text-gray-800 mb-4">
              Menu Title
            </h2>
            <!-- Item 1 -->
            <div class="flex items-center">
              <img
                class="flex-shrink-0 w-20 h-20 rounded"
                src="img/menu-1.jpg"
                alt="Menu 1"
              />
              <div class="flex flex-col justify-start pl-4 w-full">
                <h5
                  class="flex justify-between items-center border-b pb-2 w-full text-lg font-medium"
                >
                  <span>Chicken Burger</span>
                  <span class="text-blue-500 text-lg font-semibold">plat principal</span>
                </h5>
                <small class="italic text-gray-500"
                  >Ipsum ipsum clita erat amet dolor justo diam</small
                >
              </div>
            </div>
            <!-- Item 2 -->
            <div class="flex items-center">
              <img
                class="flex-shrink-0 w-20 h-20 rounded"
                src="img/menu-2.jpg"
                alt="Menu 2"
              />
              <div class="flex flex-col justify-start pl-4 w-full">
                <h5
                  class="flex justify-between items-center border-b pb-2 w-full text-lg font-medium"
                >
                  <span>Chicken Burger</span>
                  <span class="text-blue-500 text-lg font-semibold">entree</span>
                </h5>
                <small class="italic text-gray-500"
                  >Ipsum ipsum clita erat amet dolor justo diam</small
                >
              </div>
            </div>
            <!-- Item 3 -->
            <div class="flex items-center">
              <img
                class="flex-shrink-0 w-20 h-20 rounded"
                src="img/menu-3.jpg"
                alt="Menu 3"
              />
              <div class="flex flex-col justify-start pl-4 w-full">
                <h5
                  class="flex justify-between items-center border-b pb-2 w-full text-lg font-medium"
                >
                  <span>Chicken Burger</span>
                  <span class="text-blue-500 text-lg font-semibold">Amuse Bouche</span>
                </h5>
                <small class="italic text-gray-500"
                  >Ipsum ipsum clita erat amet dolor justo diam</small
                >
              </div>
            </div>
            <!-- Item 4 -->
            <div class="flex items-center">
              <img
                class="flex-shrink-0 w-20 h-20 rounded"
                src="img/menu-4.jpg"
                alt="Menu 4"
              />
              <div class="flex flex-col justify-start pl-4 w-full">
                <h5
                  class="flex justify-between items-center border-b pb-2 w-full text-lg font-medium"
                >
                  <span>Chicken Burger</span>
                  <span class="text-blue-500 text-lg font-semibold">Desert</span>
                </h5>
                <small class="italic text-gray-500"
                  >Ipsum ipsum clita erat amet dolor justo diam</small
                >
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-4 border-l-2 border-l-yellow-200 ">
            <div class=" flex items-center">
              <div class="p-6">
                <h2 id="menu-title" class="text-2xl font-bold  text-[#FEA116] mb-8 ">
                  Reservation
                </h2>
               
                <form class="">
                 
                    <!-- Date & Time -->
                    <div class="flex flex-col gap-4 ">
                      <div>
                        <label for="date" class="text-gray-900">Date</label>
                        <input
                          type="date"
                          id="date"
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-primary"
                          placeholder="Date"
                        />
                      </div>
                      <div>
                        <label for="time" class="text-gray-900">Heure</label>
                        <input
                          type="time"
                          id="time"
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-primary"
                          placeholder="Heure"
                        />
                      </div>

                      <div class="">
                        <label for="select1" class="text-gray-900"
                          >Nombre de personnes</label
                        >
                        <input
                          type="number"
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-primary"
                          placeholder="Nombre de personnes"
                        />
                      </div>

                      <div>
                        <label for="tel" class="text-gray-900">Téléphone :</label>
                        <input  name="tel"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-primary"
                          type="tel"
                          placeholder="Votre numéro de téléphone" />
                      </div>
                      <!-- Special Request -->
                      <div class="">
                        <label for="message" class="text-gray-900"
                          >Message</label
                        >
                        <textarea
                          class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-primary"
                          name="message"
                          placeholder="Message"
                          style="height: 100px"
                        ></textarea>
                      </div>
                      <!-- Submit Button -->
                      <div class="">
                        <button
                          class="btn bg-[#FEA116] text-white w-full py-3 rounded-lg transition"
                          type="submit"
                        >
                          Reserver
                        </button>
                      </div>
                    </div>
                 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- footer -->
    <div class="container-fluid bg-[#0f172b]     text-white  px-10 pt-5 mt-5">
        <div class="container py-5">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
                <div class="space-y-4 flex flex-col">
                    <h4 class="section-title text-[#FEA116]  mb-4">Company</h4>
                    <a class="text-white" href="">About Us</a>
                    <a class="text-white" href="">Contact Us</a>
                    <a class="text-white" href="">Reservation</a>
                    <a class="text-white" href="">Privacy Policy</a>
                    <a class="text-white" href="">Terms & Condition</a>
                </div>
                <div class="space-y-4">
                    <h4 class=" text-[#FEA116]  mb-4">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="flex space-x-2 pt-2">
                        <a class="btn btn-outline-light" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="space-y-4">
                    <h4 class="section-title  text-[#FEA116]  mb-4">Opening</h4>
                    <h5 class="">Monday - Saturday</h5>
                    <p>09AM - 09PM</p>
                    <h5 class="">Sunday</h5>
                    <p>10AM - 08PM</p>
                </div>
                <div class="space-y-4">
                    <h4 class="section-title text-primary  mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-full py-3 px-4" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 absolute top-0 end-0 mt-2 me-2">SIGNUP</button>
                    </div>
                </div>
            </div>
        </div>

            <div class="copyright">
      
                    <div class="text-center text-xs text-white">
                        &copy;  All Rights Reserved.
                        
           
                    </div>
                    
                </div>
   
        </div>
    </div>
    

    

    <script>
      // Functions for Modal
      function openModal(menuTitle) {
        //document.getElementById("menu-title").textContent = menuTitle;
        document.getElementById("modal").classList.remove("hidden");
      }

      function closeModal() {
        document.getElementById("modal").classList.add("hidden");
      }
 
      // Sélection des éléments
      const menuToggle = document.getElementById("menuToggle");
      const dropdownMenu = document.getElementById("dropdownMenu");
    
      // Événement pour afficher ou masquer le menu
      menuToggle.addEventListener("click", (event) => {
        event.preventDefault(); // Empêche le comportement par défaut du lien
        dropdownMenu.classList.toggle("hidden"); // Ajoute ou enlève la classe 'hidden'
      });
    
      // Fermer le menu si on clique en dehors
      document.addEventListener("click", (event) => {
        if (!menuToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
          dropdownMenu.classList.add("hidden"); // Masque le menu si on clique à l'extérieur
        }
      });
    </script>
  </body>
</html>
