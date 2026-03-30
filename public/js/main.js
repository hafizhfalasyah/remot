let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    menu.classList.remove('bx-x');
    navbar.classList.remove('active');
}

const sr = ScrollReveal ({
    distance: '60px',
    duration: 2500,
    delay: 400,
    reset: true
})

const inputs = document.querySelectorAll(".contact-input");

inputs.forEach((ipt) => {
    ipt.addEventListener("focus", () => {
        ipt.parentNode.classList.add("focus");
        ipt.parentNode.classList.add("not-empty");
    });
    ipt.addEventListener("blur", () => {
        if(ipt.value == "") {
            ipt.parentNode.classList.remove("not-empty");
        }
        ipt.parentNode.classList.remove("focus");
    });
});


sr.reveal('#lottie1', {delay: 300, origin: 'right'})
sr.reveal('#lottie2', {delay: 300, origin: 'right'})
sr.reveal('.text', {delay: 300, origin: 'top'})
sr.reveal('.form-container form', {delay: 300, origin: 'left'})
sr.reveal('.heading', {delay: 300, origin: 'top'})
sr.reveal('.rent-container', {delay: 300, origin: 'top'})
sr.reveal('.services-container .box', {delay: 300, origin: 'top'})
sr.reveal('#load-more', {delay: 300, origin: 'top'})
sr.reveal('.reviews-container', {delay: 300, origin: 'top'})
sr.reveal('.contact-heading', {delay: 300, origin: 'left'})
sr.reveal('.contact-form', {delay: 400, origin: 'left'})
