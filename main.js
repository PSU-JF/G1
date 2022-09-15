const hamburguer = document.querySelector('.hamburguer');

hamburguer.addEventListener('click', function () {
    this.classList.toggle('is-active');
});