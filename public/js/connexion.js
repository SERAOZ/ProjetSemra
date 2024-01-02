function save_data() {
  var form_element = document.getElementsByClassName("form_data");
  var form_data = new FormData();

  for (var count = 0; count < form_element.length; count++) {
    form_data.append(form_element[count].name, form_element[count].value);
  }

  document.getElementById("submit").disabled = true;

  var ajax_request = new XMLHttpRequest();
  ajax_request.open("POST", "connexion");
  ajax_request.send(form_data);

  ajax_request.onreadystatechange = function () {
    if (ajax_request.readyState == 4 && ajax_request.status == 200) {
      document.getElementById("submit").disabled = false;
      
      var response = JSON.parse(ajax_request.responseText);

      if (response.success != "") {
        document.getElementById("connect_form").reset();
        document.getElementById("message").innerHTML = response.success;
        console.log(response.success);

        setTimeout(function () {
          document.getElementById("message").innerHTML = "";
        }, 3000);

        document.getElementById("email_error").innerHTML = "";
        document.getElementById("email_iconic").style.display = "none";
        document.getElementById("password_error").innerHTML = "";
        setTimeout(function () {
          window.location.href = "http://localhost/ProjetSemra/";
        }, 3000);

      } else {
        //display validation error
        if (response.email_error != "") {
          document.getElementById("email_error").innerHTML =
            response.email_error;
          document.getElementById("email_iconic").style.display = "inline";
        }

        if (response.password_error != "") {
          document.getElementById("password_error").innerHTML =
            response.password_error;
          document.getElementById("password_iconic").style.display = "inline";
        }
      }
    }
  };
}