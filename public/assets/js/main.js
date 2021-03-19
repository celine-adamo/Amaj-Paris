// Menu Burger
const menuBtn = document.querySelector('.menu-btn');
const menuBtnBurger = document.querySelector('.menu-btn__burger');
const sidebar = document.querySelector('.sidebar');
const main = document.getElementById('main');
const body = document.querySelector('body');

let menuOpen = false;
menuBtn.addEventListener('click', () => {
    if(!menuOpen) {
        menuBtn.classList.add('open');
        sidebar.classList.add('open');
        main.classList.add('open');
        body.classList.add('open');
        menuOpen = true;
    } else {
        menuBtn.classList.remove('open');
        sidebar.classList.remove('open');
        main.classList.remove('open');
        body.classList.remove('open');
        menuOpen = false;
    }
});

// Language link redirect

const selectLanguage = document.getElementById('languages');

selectLanguage.addEventListener('change', () => {
    location.href = "/";
});