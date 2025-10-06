document.addEventListener('DOMContentLoaded', () => {
  const items = document.querySelectorAll('.carrusel-item');
  const prevBtn = document.getElementById('prev');
  const nextBtn = document.getElementById('next');
  let currentIndex = 0;

  function showItem(index) {
    items.forEach((item, i) => {
      item.classList.toggle('active', i === index);
    });
  }

  prevBtn.addEventListener('click', () => {
    currentIndex = (currentIndex === 0) ? items.length - 1 : currentIndex - 1;
    showItem(currentIndex);
  });

  nextBtn.addEventListener('click', () => {
    currentIndex = (currentIndex === items.length - 1) ? 0 : currentIndex + 1;
    showItem(currentIndex);
  });

  // Autoplay
  setInterval(() => {
    currentIndex = (currentIndex === items.length - 1) ? 0 : currentIndex + 1;
    showItem(currentIndex);
  }, 7000);

  showItem(currentIndex);
});

