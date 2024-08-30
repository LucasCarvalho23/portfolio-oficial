$(document).ready(() => {

    class Resolution {

        constructor() {
            this.width = window.screen.width
            this.height = window.screen.height
            this.imgPortfolio01 = document.querySelector("#img-portfolio01")
            this.imgPortfolio02 = document.querySelector("#img-portfolio02")

            if (this.width <= 1024 && this.width >= 500.01) {
                this.imgPortfolio01.src="../images/mobile/01/btec.png"
                this.imgPortfolio02.src="../images/mobile/02/escudo.png"
                console.log('ipad');
            } if (this.width <= 500) {
                this.imgPortfolio01.src="../images/mobile/01/btec-mobile.png"
                this.imgPortfolio02.src="../images/mobile/02/escudo-mobile.png"
                console.log('mobile');
            } else if (this.width > 1024.01) {
                console.log('Desktop');
            }
            
        }

    }

    const resolution = new Resolution()

})

