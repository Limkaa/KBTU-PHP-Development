export default class Carousel{
    constructor({
        carouselSelector = ".main-carousel",
        carouselContainerSelector = ".carousel-container",
        previousSelector = ".carousel-previous",
        nextSelector = ".carousel-next",
        transitionTime = 2000,
    } = {}){
        this.carousel = document.querySelector(carouselSelector);
        this.slides = document.querySelectorAll(`${carouselContainerSelector} img`).length;
        this.carouselContainer = document.querySelector(carouselContainerSelector);
        this.previousBtn = document.querySelector(previousSelector);
        this.nextBtn = document.querySelector(nextSelector);
        this.slideSize = this.carousel.offsetWidth;
        this.currentSlide = 0;

        this.setEventListener();
        this.generateShortcuts();
        this.setAutoPlay(transitionTime);
    }

    moveSlides(){
        this.carouselContainer.style.transform = `translateX(-${this.currentSlide * this.slideSize}px)`;
        Array.from(this.shortcuts.children).forEach(shortcut => shortcut.classList.remove('active'));
        this.shortcuts.children[this.currentSlide].classList.add('active');
    }

    nextSlide() {
        this.currentSlide = this.currentSlide >= this.slides - 1 ? 0 : this.currentSlide + 1;
        this.moveSlides();
    };

    previousSlide() {
        this.currentSlide = this.currentSlide <= 0 ? this.slides - 1 : this.currentSlide - 1;
        this.moveSlides();
    };

    setEventListener(){
        this.nextBtn.addEventListener('click', this.nextSlide.bind(this));
        this.previousBtn.addEventListener('click', this.previousSlide.bind(this));
    }

    generateShortcuts() {
        const shortcuts = document.createElement('div');
        shortcuts.classList.add('shortcuts');

        for (let i = 0; i < this.slides; i += 1) {
            const dot = document.createElement('span');
            dot.addEventListener('click', () => {
                this.currentSlide = i;
                this.moveSlides();
            });
            dot.classList.add('shortcut');
            shortcuts.appendChild(dot);
        }
        shortcuts.firstChild.classList.add('active');
        this.carousel.appendChild(shortcuts);
        this.shortcuts = shortcuts;
    }
    setAutoPlay(transitionTime) {
        setInterval(this.nextSlide.bind(this), transitionTime);
    }
}