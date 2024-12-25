const projLinkCollection = document.getElementsByClassName(`projLink`);
const imgLogoCollection = document.querySelectorAll('.techBox.hidden');
const designCollection = document.querySelectorAll('.design.hiddenv');
const pixsologoCollection = document.getElementsByClassName(`pixsoLogo`);



document.addEventListener(`mouseover`, (event) => {
    if (event.target.classList.contains(`projLink`)) {

        const projCenter = event.target.closest('.projCenter');
        const projRight = projCenter.nextElementSibling;


        const techBox = projRight.querySelector('.techBox.hidden');
        const design = projCenter.querySelector('.design.hiddenv');


        if (techBox) {
            techBox.classList.remove('hidden')
        }
        if (design) {
            design.classList.remove('hiddenv')
        }
    } else {

        imgLogoCollection.forEach((img) => img.classList.add('hidden'));
        designCollection.forEach((img) => img.classList.add('hiddenv'));
    }
});
