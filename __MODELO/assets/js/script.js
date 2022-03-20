/* =======================================================
*   Btn Nav Menu
* ======================================================= */
const menuBtnOpen = document.querySelector('.nav-menu--btn-open');
const menuBtnClose = document.querySelector('.nav-menu--btn-close');
const menus = document.querySelector('.nav-menu--menus');
let menuOpen = false;
menuBtnOpen.addEventListener('click', function() {
    if (!menuOpen) {
        menus.classList.add('active');
        menuOpen = true;
    } else {
        menus.classList.remove('active');
        menuOpen = false;
    }
});

menuBtnClose.addEventListener('click', function() {
	if (menuOpen) {
		menus.classList.remove('active');
        menuOpen = false;
	}
});

/* =======================================================
*   Javascript sliders
* ======================================================= */
var slides = document.querySelectorAll('.slide');
var btns   = document.querySelectorAll('.btn');
let currentSlide = 1;

// slider manual navigation
var manualNav = function(manual) {
	slides.forEach((slide)=> {
		slide.classList.remove('active');
	});
	btns.forEach((btn)=> {
		btn.classList.remove('active');
	});

	slides[manual].classList.add('active');
	btns[manual].classList.add('active');
}

btns.forEach((btn, i) => {
	btn.addEventListener('click', ()=> {
		manualNav(i);
		currentSlide = i;
	});
});


// slider autoplay navigation
var repeat = function(activeClass) {
	let active = document.getElementsByClassName('slide active');
	let i = 1;

	var repeater = () => {
		setTimeout(function(){
			[...active].forEach((activeSlide) => {
				activeSlide.classList.remove('active');
			});

			slides[i].classList.add('active');
			btns[i].classList.add('active');
			i++;

			if(slides.length == i) {
				i = 0;
			} 
			if(i >= slides.length) {
				return;
			}
			repeater();
		}, 10000);
	}
	repeater();
}
repeat();