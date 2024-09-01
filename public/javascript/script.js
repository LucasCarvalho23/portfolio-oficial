$(document).ready(() => {

    class Resolution {
        constructor() {
            this.updateImages();
        }

        updateImages() {
            this.width = window.innerWidth; 
            this.imgPortfolio01 = document.querySelector("#img-portfolio01");
            this.imgPortfolio02 = document.querySelector("#img-portfolio02");

            if (this.width <= 500) {
                this.imgPortfolio01.src = "../images/mobile/01/btec-mobile.png";
                this.imgPortfolio02.src = "../images/mobile/02/escudo-mobile.png";
            } else if (this.width <= 1024) {
                this.imgPortfolio01.src = "../images/mobile/01/btec.png";
                this.imgPortfolio02.src = "../images/mobile/02/escudo.png";
            } else {
                this.imgPortfolio01.src = "../images/desktop/01/btec.png";
                this.imgPortfolio02.src = "../images/desktop/02/escudo.png";
            }        

            this.imgPortfolio01.addEventListener("click", () => { 
                this.valueTitle = this.imgPortfolio01.title
                this.routeLoadTitle()
            })
            this.imgPortfolio02.addEventListener("click", () => { 
                this.valueTitle = this.imgPortfolio02.title
                this.routeLoadTitle()
            })

        }

        routeLoadTitle() {
            this.targetElement = document.querySelector('.container-img');
                if (this.targetElement) {
                    this.targetElement.scrollIntoView({
                        behavior: 'smooth' 
                    });
                }
            this.loadTitle() 
        }

        loadTitle() {
            console.log(this.valueTitle);    
        }
    }

    const resolution = new Resolution();

    $(window).on('resize', () => {
        resolution.updateImages();
    });

});
