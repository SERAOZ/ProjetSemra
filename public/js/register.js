// Cette fonction est conçue pour gérer l'inscription de l'utilisateur.
function register_user() {
  // Récupère tous les éléments du formulaire avec la classe 'form_data'.
  var form_element = document.getElementsByClassName('form_data');
  // Crée un nouvel objet FormData pour stocker les données du formulaire.
  var form_data = new FormData();

  // Itère sur chaque élément du formulaire et ajoute leur nom et valeur à l'objet FormData.
  for(var count = 0; count < form_element.length; count++) {
    form_data.append(form_element[count].name, form_element[count].value);
  }

  // Enregistre l'objet FormData dans la console (utile pour le débogage).
  console.log(form_data);
  // Désactive le bouton d'envoi pour éviter les soumissions multiples.
  document.getElementById('submit').disabled = true;
  var ajax_request = new XMLHttpRequest();
  // Crée un nouvel objet XMLHttpRequest pour la requête asynchrone.
  ajax_request.open('POST', 'register');
  
  // Envoie l'objet FormData avec la requête AJAX.
  ajax_request.send(form_data);

  // Fonction pour gérer le changement d'état de la requête AJAX.
  ajax_request.onreadystatechange = function () {
    // Vérifie si la requête est complète et réussie.
    if(ajax_request.readyState == 4 && ajax_request.status == 200) {
      // Réactive le bouton d'envoi.
      document.getElementById('submit').disabled = false;
      // Analyse la réponse JSON renvoyée par le serveur.
      var response = JSON.parse(ajax_request.responseText);

      // Si l'inscription est réussie
      if(response.success != "") {
        // Affiche un message de réussite.
        document.getElementById('message').innerHTML = response.success;
        // Réinitialise le formulaire d'inscription.
        document.getElementById("register_form").reset();

        // Efface les messages d'erreur précédents et masque les icônes d'erreur.
        document.getElementById("username_error").innerHTML = "";
        document.getElementById("username_iconic").style.display = "none";
        document.getElementById("email_error").innerHTML = "";
        document.getElementById("email_iconic").style.display = "none";
        document.getElementById("password_error").innerHTML = "";
        document.getElementById("password_iconic").style.display = "none";

        // Redirige vers la page de connexion après 3 secondes.
        setTimeout(function () {
          window.location.href = "http://localhost/ProjetSemra/users/connexion";
        }, 3000);

      } else {
        // S'il y a des erreurs de validation, affiche-les et montre les icônes d'erreur.

        // Erreur de validation du nom d'utilisateur.
        if (response.username_error != "") {
          document.getElementById('username_error').innerHTML = response.username_error;
          document.getElementById('username_iconic').style.display = 'inline';
        } else {
          document.getElementById('username_iconic').style.display = 'none';
        }

        // Erreur de validation de l'e-mail.
        if(response.email_error != "") {
          document.getElementById('email_error').innerHTML = response.email_error;
          document.getElementById('email_iconic').style.display = 'inline';
        } else {
          document.getElementById('email_iconic').style.display = 'none';
        }

        // Erreur de validation du mot de passe.
        if (response.password_error != "") {
          document.getElementById('password_error').innerHTML = response.password_error;
          document.getElementById('password_iconic').style.display = 'inline';
        } else {
          document.getElementById('password_iconic').style.display = 'none';
        }        
      }
    }
  };
}
