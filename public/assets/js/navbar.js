//Sticky Navbar

const container = document.querySelector('.container');
const navbar = document.querySelector('nav');
const sticky = navbar.offsetTop;

window.addEventListener('scroll', () => {
    stickyNavbar();
})

function stickyNavbar() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
        sidebar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
        sidebar.classList.remove("sticky");
    }
}