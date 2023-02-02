// form manipulations
const form = document.querySelector(".form form"),
  submitBtn = form.querySelector(".submit-btn"),
  messages = document.querySelector(".form .messages"),
  errorText = document.querySelector(".form .error-text"),
  continueBtns = document.querySelectorAll(".continue-btn"),
  backBtns = document.querySelectorAll(".back-btn"),
  forms1 = document.querySelectorAll(".form-1");

let inpt1 = [...document.querySelectorAll(".inpt-1")],
  r1 = [...document.querySelectorAll(".r-1")].find(
    (elt) => elt.checked !== null
  );

continueBtns.forEach((btn, id) => {
  btn.onclick = (e) => {
    e.preventDefault();

    if (inpt1.find((elt) => elt.value === "")) {
      errorText.textContent = "Tous les champs sont obligatoires";
      errorText.style.display = "block";
      console.log("r1", r1);
    } else {
      errorText.style.display = "none";
      console.log(btn, `id = ${id}`);
      forms1[id].style.display = "none";
      forms1[id + 1].style.display = "flex";
      forms1[id + 1].style.left = 0;
    }
  };
});

backBtns.forEach((btn, id) => {
  btn.onclick = (e) => {
    e.preventDefault();
    console.log(btn, `id = ${id}`);
    forms1[id + 1].style.display = "none";
    forms1[id].style.display = "flex";
    forms1[id].style.left = 0;
  };
});

form.onsubmit = (e) => {
  e.preventDefault();
};

submitBtn.onclick = () => {
  // let's start ajax
  let xhr = new XMLHttpRequest(); //creating XML object

  xhr.open("post", "http://localhost/dev/Monsieur_LOIC/php/register.php", true);

  xhr.onload = () => {
    let data = xhr.response;
    console.log(data);
    if (data == "success") {
      errorText.style.display = "none";
      messages.style.display = "block";
    } else {
      errorText.textContent = data;
      messages.style.display = "none";
      errorText.style.display = "block";
    }
  };

  let formData = new FormData(form); //creating new formdata object
  xhr.send(formData);
};
