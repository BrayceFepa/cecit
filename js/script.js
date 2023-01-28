var swiper = new Swiper(".hader-slider", {
  slidesPerView: 1,
  spaceBetween: 10,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 1,
      spaceBetween: 30,
    },
  },
});

// form manipulations
const form = document.querySelector(".form form"),
  submitBtn = form.querySelector(".submit-btn"),
  messages = document.querySelector(".form .messages"),
  errorText = document.querySelector(".form .error-text");

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
