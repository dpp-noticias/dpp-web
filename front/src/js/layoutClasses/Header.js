export class Header {
  constructor(headerElementClass) {
    this.parentElement = document.querySelector(headerElementClass);
  }
  
  setBurgerClickEvent({ burgerClickHandler }) {
    const burgerBtn = this.parentElement.querySelector('.header__burgerBox');
    
    burgerBtn.addEventListener('click', () => {
      burgerClickHandler();
    })
  }
}