document.getElementById("closeModal").addEventListener("click" , function() {
    document.getElementById("modal").classList.add("hidden") ; 
}) ;
document.getElementById("ShowForm").addEventListener("click" , function() {
    document.getElementById("modal").classList.remove("hidden") ; 
}) ;



function openModal(modalId) {
    alert("hello ")
    document.getElementById(modalId).classList.remove('hidden');
  }
  
  // Fonction pour fermer un modal
  function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
  }