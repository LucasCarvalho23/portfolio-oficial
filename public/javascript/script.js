$(document).ready(() => {

    class Resolution {

        constructor() {
            this.width = window.screen.width
            this.height = window.screen.height
            this.imgPortfolio01 = document.querySelector("#img-portfolio01")
            this.imgPortfolio02 = document.querySelector("#img-portfolio02")

            if (this.width <= 991.98) {
                this.imgPortfolio01.src="../images/mobile/01/btec.png"
                this.imgPortfolio02.src="../images/mobile/02/escudo.png"
            } else {
                console.log('Desktop');
            }
            
        }

    }

    const resolution = new Resolution()

})

