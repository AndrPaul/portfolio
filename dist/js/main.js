
// Select DOM Items
const menuBtn =  document.querySelector('.menu-btn');
const menu =  document.querySelector('.menu');
const menuNav =  document.querySelector('.menu-nav');
const menuBranding =  document.querySelector('.menu-branding');
const navItems = document.querySelectorAll('.nav-item');

//Set initial State of menu
let showMenu = false;

menuBtn.addEventListener('click', toggleMenu);

function toggleMenu(){
  if(!showMenu){
    menuBtn.classList.add('close');
    menu.classList.add('show');
    menuNav.classList.add('show');
    menuBranding.classList.add('show');
    navItems.forEach(item => item.classList.add('show'));

    //Set menu state
    showMenu = true;
  } else {
    menuBtn.classList.remove('close');
    menu.classList.remove('show');
    menuNav.classList.remove('show');
    menuBranding.classList.remove('show');
    navItems.forEach(item => item.classList.remove('show'));

    //Set menu state
    showMenu = false;

  }
}
const heading =  document.querySelector('.lg-heading');
heading.classList.add('animated', 'bounceInDown');

const smHeading =  document.querySelector('.sm-heading');
smHeading.classList.add('animated', 'fadeInUp');

tippy('.copyBtn', {
  trigger:'click',
  content: "Copied!",
  placement: 'right',
  duration: [800, 300],
});
