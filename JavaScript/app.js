// Menu pour petits écran
function toggleMenu () {
    const navbar = document.querySelector('.navbar');
    const burger = document.querySelector('.burger');
    burger.addEventListener('click', (e) => {
      navbar.classList.toggle('show-nav');
    });
  }
  toggleMenu();
// Utilisation de la librairie ScrollReveal pour déclencher des effets à l'apparition du contenu sur le viewport
const sr = ScrollReveal();
sr.reveal('#appear',{
  reset: false,
  duration: 2000,
  interval: 500,
});
sr.reveal('section',{
  duration: 2000,
})
sr.reveal('.appear',{
  reset: false,
  duration: 2000,
  interval: 500,
});

// Bouton Pour remonter en haut de la page
const btn = document.querySelector('.btn');

btn.addEventListener('click', () => {

    window.scrollTo({
        top: 0,
        left: 0,
        behavior: "smooth"
    })

})
