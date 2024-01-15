// La fonction est définie pour enregistrer et envoyer les données du formulaire.
function save_data() {
  // Récupère tous les éléments avec la classe "form_data".
  var form_element = document.getElementsByClassName("form_data");

  // Crée un objet FormData, qui contiendra les données du formulaire.
  var form_data = new FormData();

  // Démarre une boucle pour chaque élément dans le tableau form_element.
  for (var count = 0; count < form_element.length; count++) {

    // Le nom et les valeurs de chaque élément sont ajoutés à l'objet FormData.
    form_data.append(form_element[count].name, form_element[count].value);
  }

  // Le bouton d'envoi est temporairement désactivé.
  document.getElementById("submit").disabled = true;

  // Crée un nouvel objet XMLHttpRequest.
  var ajax_request = new XMLHttpRequest();

  // La requête AJAX est configurée avec la méthode POST vers l'URL 'connexion'.
  ajax_request.open("POST", "connexion");

  // Envoie une requête AJAX avec l'objet FormData créé.
  ajax_request.send(form_data);

  // Définit un gestionnaire d'événements pour les changements d'état de la requête AJAX.
  ajax_request.onreadystatechange = function () {

    // Si la requête AJAX est terminée et réussie (readyState 4 et status 200)
    if(ajax_request.readyState == 4 && ajax_request.status == 200) {
      // Le bouton d'envoi est réactivé.
      document.getElementById("submit").disabled = false;
      
      // Analyse la réponse envoyée par le serveur au format JSON.
      var response = JSON.parse(ajax_request.responseText);

      // Si un message de réussite est présent dans la réponse
      if(response.success != "") {
        // Le formulaire est réinitialisé.
        document.getElementById("connect_form").reset();

        // Le message de réussite est affiché.
        document.getElementById("message").innerHTML = response.success;
        console.log(response.success);

        // Le message sera masqué après 3 secondes.
        setTimeout(function () {
          document.getElementById("message").innerHTML = "";
        }, 3000);

        // Les messages d'erreur et les icônes sont effacés.
        document.getElementById("email_error").innerHTML = "";
        document.getElementById("email_iconic").style.display = "none";
        document.getElementById("password_error").innerHTML = "";

        // Redirige vers une nouvelle page après 3 secondes.
        setTimeout(function () {
          window.location.href = "http://localhost/ProjetSemra/";
        }, 3000);

      } else { // Si des erreurs sont présentes dans la réponse, les messages d'erreur correspondants sont affichés.
        
        // Si une erreur concerne l'email
        if(response.email_error != "") {
          document.getElementById("email_error").innerHTML =
            response.email_error;
          document.getElementById("email_iconic").style.display = "inline";
        }
        // Si une erreur concerne le mot de passe
        if(response.password_error != "") {
          document.getElementById("password_error").innerHTML =
            response.password_error;
          document.getElementById("password_iconic").style.display = "inline";
        }
      }
    }
  };
}
