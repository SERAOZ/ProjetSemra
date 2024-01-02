function register_user() {
  var form_element = document.getElementsByClassName('form_data');
  var form_data = new FormData();

  for (var count = 0; count < form_element.length; count++) {
    form_data.append(form_element[count].name, form_element[count].value);
  }
  console.log(form_data);
  document.getElementById('submit').disabled = true;

  var ajax_request = new XMLHttpRequest();
  ajax_request.open('POST', 'register');
  ajax_request.send(form_data);

  ajax_request.onreadystatechange = function () {
    if (ajax_request.readyState == 4 && ajax_request.status == 200) {
      document.getElementById('submit').disabled = false;
      var response = JSON.parse(ajax_request.responseText);

      if (response.success != "") {
        document.getElementById('message').innerHTML = response.success;
        document.getElementById('connect_form').reset();

        document.getElementById("username_error").innerHTML = "";
        document.getElementById("username_iconic").style.display = "none";
        document.getElementById("email_error").innerHTML = "";
        document.getElementById("email_iconic").style.display = "none";
        document.getElementById("password_error").innerHTML = "";
        document.getElementById("password_iconic").style.display = "none";
        // Redirect after successful registration, if needed
        setTimeout(function () {
          window.location.href = "http://localhost/ProjetSemra/users/connexion";
        }, 3000);

      } else {
        // Display validation errors

        if (response.username_error != "") {
          document.getElementById('username_error').innerHTML = response.username_error;
          document.getElementById('username_iconic').style.display = 'inline';
        } else {
          document.getElementById('username_iconic').style.display = 'none';
        }
        
        if (response.email_error != "") {
          document.getElementById('email_error').innerHTML = response.email_error;
          document.getElementById('email_iconic').style.display = 'inline';
        } else {
          document.getElementById('email_iconic').style.display = 'none';
        }

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
