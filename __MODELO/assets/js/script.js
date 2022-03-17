/* =======================================================
*   Btn Nav Menu
* ======================================================= */
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
	let active = document.getElementsByClassName('active');
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