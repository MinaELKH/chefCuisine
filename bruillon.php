<?php
require("db/db.php");

if (isset($_GET['id_menu']) && is_numeric($_GET['id_menu'])) {
    $id_menu = intval($_GET['id_menu']);
    
    echo "<div id='modal' class='fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50'>
          <div class='bg-white w-full max-w-4xl rounded-lg shadow-lg relative'>
            <button id='close-modal' class='absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl' onclick='closeModal()'>
              &times;
            </button>";

    $plat_query = "SELECT * FROM plat WHERE id_menu = ?";
    $plat_stmt = mysqli_prepare($conn, $plat_query);

    if ($plat_stmt) {
        mysqli_stmt_bind_param($plat_stmt, 'i', $id_menu);
        mysqli_stmt_execute($plat_stmt);
        mysqli_stmt_store_result($plat_stmt);

        if (mysqli_stmt_num_rows($plat_stmt) > 0) {
            mysqli_stmt_bind_result($plat_stmt, $id_plat, $nom, $ingredient, $categorie, $description, $id_menu, $photo);

            echo "<div class='grid grid-cols-2 gap-4 p-6'>
                    <h2 class='text-2xl font-bold text-gray-800 mb-4'>Menu Title</h2>";

           while (mysqli_stmt_fetch($plat_stmt)) {
                echo "<div class='flex items-center'>
                        <img class='w-20 h-20 rounded' src='images/$photo' alt='$nom' />
                        <div class='pl-4'>
                            <h5 class='text-lg font-medium'>$nom</h5>
                            <small class='text-gray-500'>$description</small>
                        </div>
                      </div>";
            }

            echo "</div>";

            // Formulaire de réservation
            echo "<div class='p-6 border-l-2 border-l-yellow-200'>
                    <h2 class='text-2xl font-bold text-[#FEA116] mb-8'>Réservation</h2>
                    <form method='post'>
                        <!-- Form fields -->
                        ...
                    </form>
                  </div>";
        } else {
            echo "<p class='text-center'>Aucun plat disponible pour ce menu.</p>";
        }

        mysqli_stmt_close($plat_stmt);
    } else {
        echo "<p class='text-red-500'>Erreur : Impossible de préparer la requête.</p>";
    }

    echo "</div></div>";
}
?>



<div id='modal'  class=' fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50' >
      <div class='bg-white w-full max-w-4xl rounded-lg shadow-lg relative'>
        <!-- Close Button -->
        <button
          id='close-modal'
          class='absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-2xl'
          onclick='closeModal()'
        >
          &times;
        </button>
        <!-- Modal Title -->
   
        <!-- Dishes -->
        <div class='grid grid-cols-2 gap-4'>
          <div class='grid grid-cols-1 gap-4 p-6'>
            <h2 id='menu-title' class='text-2xl font-bold text-gray-800 mb-4'>
              Menu Title
            </h2>
            <!-- Item 1 -->
            <div class='flex items-center'>
              <img
                class='flex-shrink-0 w-20 h-20 rounded'
                src='images/imgs/imgs/menu-1.jpg'
                alt='Menu 1'
              />
              <div class='flex flex-col justify-start pl-4 w-full'>
                <h5
                  class='flex justify-between items-center border-b pb-2 w-full text-lg font-medium'
                >
                  <span>Chicken Burger</span>
                  <span class='text-blue-500 text-lg font-semibold'>plat principal</span>
                </h5>
                <small class='italic text-gray-500'
                  >Ipsum ipsum clita erat amet dolor justo diam</small
                >
              </div>
            </div>
            <!-- Item 2 -->
            <div class='flex items-center'>
              <img
                class='flex-shrink-0 w-20 h-20 rounded'
                src='images/imgs/imgs/menu-2.jpg'
                alt='Menu 2'
              />
              <div class='flex flex-col justify-start pl-4 w-full'>
                <h5
                  class='flex justify-between items-center border-b pb-2 w-full text-lg font-medium'
                >
                  <span>Chicken Burger</span>
                  <span class='text-blue-500 text-lg font-semibold'>entree</span>
                </h5>
                <small class='italic text-gray-500'
                  >Ipsum ipsum clita erat amet dolor justo diam</small
                >
              </div>
            </div>
            <!-- Item 3 -->
            <div class='flex items-center'>
              <img
                class='flex-shrink-0 w-20 h-20 rounded'
                src='images/imgs/imgs/menu-3.jpg'
                alt='Menu 3'
              />
              <div class='flex flex-col justify-start pl-4 w-full'>
                <h5
                  class='flex justify-between items-center border-b pb-2 w-full text-lg font-medium'
                >
                  <span>Chicken Burger</span>
                  <span class='text-blue-500 text-lg font-semibold'>Amuse Bouche</span>
                </h5>
                <small class='italic text-gray-500'
                  >Ipsum ipsum clita erat amet dolor justo diam</small
                >
              </div>
            </div>
            <!-- Item 4 -->
            <div class='flex items-center'>
              <img
                class='flex-shrink-0 w-20 h-20 rounded'
                src='images/imgs/imgs/menu-4.jpg'
                alt='Menu 4'
              />
              <div class='flex flex-col justify-start pl-4 w-full'>
                <h5
                  class='flex justify-between items-center border-b pb-2 w-full text-lg font-medium'
                >
                  <span>Chicken Burger</span>
                  <span class='text-blue-500 text-lg font-semibold'>Desert</span>
                </h5>
                <small class='italic text-gray-500'
                  >Ipsum ipsum clita erat amet dolor justo diam</small
                >
              </div>
            </div>
          </div>

          <div class='grid grid-cols-1 gap-4 border-l-2 border-l-yellow-200 '>
            <div class=' flex items-center'>
              <div class='p-6'>
                <h2 id='menu-title' class='text-2xl font-bold  text-[#FEA116] mb-8 '>
                  Reservation
                </h2>
               
                <form method="post" class=''>
                 
                    <!-- Date & Time -->
                    <div class='flex flex-col gap-4 '>
                      <div>
                        <label for='date' class='text-gray-900'>Date</label>
                        <input
                          type='date'
                          id='date'
                          class='w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-primary'
                          placeholder='Date'
                        />
                      </div>
                      <div>
                        <label for='time' class='text-gray-900'>Heure</label>
                        <input
                          type='time'
                          id='time'
                          class='w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-primary'
                          placeholder='Heure'
                        />
                      </div>

                      <div class=''>
                        <label for='select1' class='text-gray-900'
                          >Nombre de personnes</label
                        >
                        <input
                          type='number'
                          class='w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-primary'
                          placeholder='Nombre de personnes'
                        />
                      </div>

                      <div>
                        <label for='tel' class='text-gray-900'>Téléphone :</label>
                        <input  name='tel'
                        class='w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-primary'
                          type='tel'
                          placeholder='Votre numéro de téléphone' />
                      </div>
                      <!-- Special Request -->
                      <div class=''>
                        <label for='message' class='text-gray-900'
                          >Message</label
                        >
                        <textarea
                          class='form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-primary'
                          name='message'
                          placeholder='Message'
                          style='height: 100px'
                        ></textarea>
                      </div>
                      <!-- Submit Button -->
                      <div class=''>
                        <button
                          class='btn bg-[#FEA116] text-white w-full py-3 rounded-lg transition'
                          type='submit'
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
