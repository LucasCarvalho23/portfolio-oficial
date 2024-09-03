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
                this.valueTitle = this.imgPortfolio01.title;
                this.routeLoadTitle();
            });

            this.imgPortfolio02.addEventListener("click", () => { 
                this.valueTitle = this.imgPortfolio02.title;
                this.routeLoadTitle();
            });
        }

        routeLoadTitle() {
            this.targetElement = document.querySelector('.container-img');
            if (this.targetElement) {
                this.targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
            this.loadTitle();
        }

        loadTitle() {
            const self = this; // Stores context for use within the AJAX callback
            $.ajax({
                url: '/portfolio',
                method: 'POST',
                data: { title: self.valueTitle }, 
                success: function(response) {
                    const data = JSON.parse(response);
                    if (data.error) {
                        console.error(data.error);
                    } else {
                        // Atualiza o conteúdo dinamicamente
                        $('#titleImg').text(data.title);
                        $('.container-info p:eq(0)').html(`<strong>Project name:</strong> ${data.name}`);
                        $('.container-info p:eq(1)').html(`<strong>Description:</strong> ${data.description}`);
                        $('.container-info p:eq(2)').html(`<strong>Technologies used:</strong> ${data.technologies}`);
                        $('.container-info a.link-github:eq(0)').attr('href', data.github);
                        $('.container-info a.link-github:eq(1)').attr('href', data.site);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error loading title:', error);
                }
            });
        }
    }

    const resolution = new Resolution();

    $(window).on('resize', () => {
        resolution.updateImages();
    });
});
