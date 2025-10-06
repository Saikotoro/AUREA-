// app.js

document.addEventListener("DOMContentLoaded", () => {
  /* Menú hamburguesa */
  const burger = document.getElementById("burger");
  const navLinks = document.querySelector(".nav-links");
  burger.addEventListener("click", () => {
    burger.classList.toggle("active");
    navLinks.classList.toggle("show");
  });

  /* Carrusel de #tiposHidroponia */
  const items = document.querySelectorAll("#tiposHidroponia .carousel-item");
  let current = 0;
  const showSlide = (index) => {
    items.forEach((el, i) => {
      el.classList.toggle("active", i === index);
    });
  };
  showSlide(current);
  setInterval(() => {
    current = (current + 1) % items.length;
    showSlide(current);
  }, 4000);

  /* Año footer */
  const y = document.getElementById("year");
  if (y) y.textContent = new Date().getFullYear();
});



