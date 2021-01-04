import { Header } from './layoutClasses/Header.js';

const HeaderDashboard = new Header('.dashboard__header');

let burgerEventHandler = false;

HeaderDashboard.setBurgerClickEvent({
  burgerClickHandler: () => {
    const navMenu = document.querySelector('.navMenu');
    
    if(burgerEventHandler) {
      navMenu.style.height = 'calc(100% - 6.3rem)';
      navMenu.style.visibility = 'visible';
    } else {
      navMenu.style.height = '0';
      navMenu.style.visibility = 'hidden';
    }
    
    burgerEventHandler = !burgerEventHandler;
  }
});

