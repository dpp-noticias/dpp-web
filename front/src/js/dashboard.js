import '../scss/main.scss';
import { Header } from './layoutClasses/Header.js';

const HeaderElement = new Header('.header');

let burgerEventHandler = false;

const mediaMinTablet = window.matchMedia("(max-width: 700px)") // 700px = 43.75em

HeaderElement.setBurgerClickEvent({
  burgerClickHandler: () => {
    const navMenu = document.querySelector('.navMenu');
    
    if(burgerEventHandler && mediaMinTablet.matches) {
      navMenu.style.height = 'calc(100% - 6.3rem)';
      navMenu.style.visibility = 'visible';
    } else {
      navMenu.style.height = '0';
      navMenu.style.visibility = 'hidden';
    }
    
    burgerEventHandler = !burgerEventHandler;
  }
});