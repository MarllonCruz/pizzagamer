const menuBtn = document.querySelector('.nav-menu--btn');
const menus = document.querySelector('.nav-menu--menus');
let menuOpen = false;
menuBtn.addEventListener('click', function() {
    if (!menuOpen) {
        menuBtn.classList.add('open');
        menus.classList.add('active');
        menuOpen = true;
    } else {
        menuBtn.classList.remove('open');
        menus.classList.remove('active');
        menuOpen = false;
    }
});