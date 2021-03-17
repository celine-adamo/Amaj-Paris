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

// User link redirect

const account = document.querySelector('#account');

account.addEventListener('change', (e) => {
    // console.log('e.target', e.target)
    const select = e.target;
    const value = select.value;
    const numberValue = parseInt(value)
    redirectLinks(numberValue);
});

function redirectLinks(sel) {
    switch (sel) {
        case 1:
            location.href = "/account";
            break;
        case 2:
            location.href = "/logout";
            break;
        case 3:
            location.href = "/register";
            break;
        case 4:
            location.href = "/login"
            break;
    }
}