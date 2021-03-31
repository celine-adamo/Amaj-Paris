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

// Sidebar

// const sidebar = document.querySelector('.sidebar').forEach((e) => {
//     const links = Array.from(e.querySelectorAll('.sidebar-menu'));
// });
const sidebar_menu = Array.from(document.querySelectorAll('.sidebar .sidebar-menu ul li a'));

sidebar_menu.forEach((e) => {
    e.addEventListener('click', () => {
        if (sidebar.classList.contains('open')) {
            menuBtn.classList.remove('open');
            sidebar.classList.remove('open');
            main.classList.remove('open');
            body.classList.remove('open');
            menuOpen = false;
        }
    });
})

