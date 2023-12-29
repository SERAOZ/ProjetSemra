const Input = document.querySelectorAll("input");
const FormData = document.querySelectorAll(".formData");
const Span = document.querySelectorAll(".iconic");

function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
    email
  );
}

console.log(Input);

function validate() {
  for (let i = 0; i < Input.length; i++) {
    if (Input[i].value.length < 1 && i !== 2) {
      FormData[i].setAttribute("data-error-visible", "true");
      Input[i].style.border = "1px solid hsl(0, 100%, 74%)";
      Span[i].style.display = "inline";
      Input[i].placeholder = "";
    } else {
      FormData[i].setAttribute("data-error-visible", "false");
      Input[i].style.border = "1px solid hsl(246, 25%, 77%)";
      Span[i].style.display = "none";
    }
  }
  if (Input[2].value.length < 1 || !isEmail(Input[2].value)) {
    Input[2].placeholder = "email@example.com";
    Input[2].classList.add("Pcolor");
    FormData[2].setAttribute("data-error-visible", "true");
    Input[2].style.border = "1px solid hsl(0, 100%, 74%)";
    Span[2].style.display = "inline";
  }
}