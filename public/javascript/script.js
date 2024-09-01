$(document).ready(() => {

    class Resolution {
        constructor() {
            this.updateImages();
        }

        updateImages() {
            this.width = window.innerWidth; // Usa o innerWidth para obter a largura atual da janela
            this.imgPortfolio01 = document.querySelector("#img-portfolio01");
            this.imgPortfolio02 = document.querySelector("#img-portfolio02");

            if (this.width <= 500) {
                this.imgPortfolio01.src = "../images/mobile/01/btec-mobile.png";
                this.imgPortfolio02.src = "../images/mobile/02/escudo-mobile.png";
                console.log('mobile');
            } else if (this.width <= 1024) {
                this.imgPortfolio01.src = "../images/mobile/01/btec.png";
                this.imgPortfolio02.src = "../images/mobile/02/escudo.png";
                console.log('ipad');
            } else {
                this.imgPortfolio01.src = "../images/desktop/01/btec.png";
                this.imgPortfolio02.src = "../images/desktop/02/escudo.png";
            }
        }
    }

    const resolution = new Resolution();

    // Adiciona o ouvinte de evento para redimensionar a janela
    $(window).on('resize', () => {
        resolution.updateImages(); // Recarrega as imagens ao redimensionar a janela
    });

});
