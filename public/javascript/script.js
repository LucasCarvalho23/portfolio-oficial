$(document).ready(() => {
    class Resolution {
        constructor() {
            this.updateImages();
            this.iconUp = document.querySelector("#icon-up")
            this.iconUp.addEventListener("click", ()=> {
                this.routeLoadTop()
            })
            document.addEventListener('scroll', () => {
                this.handleScroll();
            });  
        }

        updateImages() {
            this.width = window.innerWidth; 
            this.imgPortfolio01 = document.querySelector("#img-portfolio01");
            this.imgPortfolio02 = document.querySelector("#img-portfolio02");
            this.imgPortfolio03 = document.querySelector("#img-portfolio03");
            this.imgPortfolio04 = document.querySelector("#img-portfolio04");
            this.imgPortfolio05 = document.querySelector("#img-portfolio05");
            this.imgPortfolio06 = document.querySelector("#img-portfolio06");

            this.bottomImgPortfolio01 = document.querySelector("#bottom-img-portfolio01")
            this.bottomImgPortfolio02 = document.querySelector("#bottom-img-portfolio02")
            this.bottomImgPortfolio03 = document.querySelector("#bottom-img-portfolio03")
            this.bottomImgPortfolio04 = document.querySelector("#bottom-img-portfolio04")
            this.bottomImgPortfolio05 = document.querySelector("#bottom-img-portfolio05")
            this.bottomImgPortfolio06 = document.querySelector("#bottom-img-portfolio06")

            if (this.width <= 500) {
                this.imgPortfolio01.src = "../images/mobile/01/btec-mobile.png"
                this.imgPortfolio02.src = "../images/mobile/02/escudo-mobile.png"
                this.imgPortfolio03.src = "../images/mobile/03/gn-mobile.png"
                this.imgPortfolio04.src = "../images/mobile/04/spotify-mobile.png"
                this.imgPortfolio05.src = "../images/mobile/05/twitter-mobile.png"
                this.imgPortfolio06.src = "../images/mobile/06/starplus-mobile.png"
            } else if (this.width <= 1024) {
                this.imgPortfolio01.src = "../images/mobile/01/btec.png"
                this.imgPortfolio02.src = "../images/mobile/02/escudo.png"
                this.imgPortfolio03.src = "../images/mobile/03/gn-ipad.png"
                this.imgPortfolio04.src = "../images/mobile/04/spotify-ipad.png"
                this.imgPortfolio05.src = "../images/mobile/05/twitter-ipad.png"
                this.imgPortfolio06.src = "../images/mobile/06/starplus-ipad.png"
            } else {
                this.imgPortfolio01.src = "../images/desktop/01/btec.png"
                this.imgPortfolio02.src = "../images/desktop/02/escudo.png"
                this.imgPortfolio03.src = "../images/desktop/03/gn.png"
                this.imgPortfolio04.src = "../images/desktop/04/spotify-desktop.png"
                this.imgPortfolio05.src = "../images/desktop/05/twitter-desktop.png"
                this.imgPortfolio06.src = "../images/desktop/06/starplus-desktop.png"
            }

            this.imgPortfolio01.addEventListener("click", () => { 
                this.valueTitle = this.imgPortfolio01.title;
                this.bottomImgPortfolio01.src = "../images/desktop/01/portfolio001.png"
                this.bottomImgPortfolio02.src = "../images/desktop/01/portfolio002.png"
                this.bottomImgPortfolio03.src = "../images/desktop/01/portfolio003.png"
                this.bottomImgPortfolio04.src = "../images/desktop/01/portfolio004.png"
                this.bottomImgPortfolio05.src = "../images/desktop/01/portfolio005.png"
                this.bottomImgPortfolio06.src = "../images/desktop/01/portfolio006.png"
                this.routeLoadTitle();
            });
            this.imgPortfolio02.addEventListener("click", () => { 
                this.valueTitle = this.imgPortfolio02.title;
                this.bottomImgPortfolio01.src = "../images/desktop/02/portfolio001.png"
                this.bottomImgPortfolio02.src = "../images/desktop/02/portfolio002.png"
                this.bottomImgPortfolio03.src = "../images/desktop/02/portfolio003.png"
                this.bottomImgPortfolio04.src = "../images/desktop/02/portfolio004.png"
                this.bottomImgPortfolio05.src = "../images/desktop/02/portfolio005.png"
                this.bottomImgPortfolio06.src = "../images/desktop/02/portfolio006.png"
                this.routeLoadTitle();
            });
            this.imgPortfolio03.addEventListener("click", () => { 
                this.valueTitle = this.imgPortfolio03.title;
                this.bottomImgPortfolio01.src = "../images/desktop/03/portfolio001.png"
                this.bottomImgPortfolio02.src = "../images/desktop/03/portfolio002.png"
                this.bottomImgPortfolio03.src = "../images/desktop/03/portfolio003.png"
                this.bottomImgPortfolio04.src = "../images/desktop/03/portfolio004.png"
                this.bottomImgPortfolio05.src = "../images/desktop/03/portfolio005.png"
                this.bottomImgPortfolio06.src = "../images/desktop/03/portfolio006.png"
                this.routeLoadTitle();
            });
            this.imgPortfolio04.addEventListener("click", () => { 
                this.valueTitle = this.imgPortfolio04.title;
                this.bottomImgPortfolio01.src = "../images/desktop/04/portfolio001.png"
                this.bottomImgPortfolio02.src = "../images/desktop/04/portfolio002.png"
                this.bottomImgPortfolio03.src = "../images/desktop/04/portfolio003.png"
                this.bottomImgPortfolio04.src = "../images/desktop/04/portfolio004.png"
                this.bottomImgPortfolio05.src = "../images/desktop/04/portfolio005.png"
                this.bottomImgPortfolio06.src = "../images/desktop/04/portfolio006.png"
                this.routeLoadTitle();
            });
            this.imgPortfolio05.addEventListener("click", () => { 
                this.valueTitle = this.imgPortfolio05.title;
                this.bottomImgPortfolio01.src = "../images/desktop/05/portfolio001.png"
                this.bottomImgPortfolio02.src = "../images/desktop/05/portfolio002.png"
                this.bottomImgPortfolio03.src = "../images/desktop/05/portfolio003.png"
                this.bottomImgPortfolio04.src = "../images/desktop/05/portfolio004.png"
                this.bottomImgPortfolio05.src = "../images/desktop/05/portfolio005.png"
                this.bottomImgPortfolio06.src = "../images/desktop/05/portfolio006.png"
                this.routeLoadTitle();
            });
            this.imgPortfolio06.addEventListener("click", () => { 
                this.valueTitle = this.imgPortfolio06.title;
                this.bottomImgPortfolio01.src = "../images/desktop/06/portfolio001.png"
                this.bottomImgPortfolio02.src = "../images/desktop/06/portfolio002.png"
                this.bottomImgPortfolio03.src = "../images/desktop/06/portfolio003.png"
                this.bottomImgPortfolio04.src = "../images/desktop/06/portfolio004.png"
                this.bottomImgPortfolio05.src = "../images/desktop/06/portfolio005.png"
                this.bottomImgPortfolio06.src = "../images/desktop/06/portfolio006.png"
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
            const self = this;
            $.ajax({
                url: '/portfolio',
                method: 'POST',
                data: { title: self.valueTitle }, 
                success: function(response) {
                    const data = JSON.parse(response);
                    if (data.error) {
                        console.error(data.error);
                    } else {
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

        routeLoadTop() {
            this.targetElementUp = document.querySelector('body');
            if (this.targetElementUp) {
                this.targetElementUp.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }

        handleScroll() {
            if (window.scrollY > window.innerHeight) {
                this.iconUp.classList.add('show');
            } else {
                this.iconUp.classList.remove('show');
            }
        }
    }

    const resolution = new Resolution();

    $(window).on('resize', () => {
        resolution.updateImages();
    });
});

function openModal(image) {
    var modal = document.getElementById("imageModal");
    var modalImg = document.getElementById("imgModal");

    modal.style.display = "block";
    modalImg.src = image.src; 
}

function closeModal() {
    var modal = document.getElementById("imageModal");
    modal.style.display = "none";
}

document.querySelectorAll('.menu-btn').forEach(button => {
    button.addEventListener('click', function () {
        const menuContainer = this.parentElement;
        menuContainer.classList.toggle('active');
    });
});

document.addEventListener('click', function (event) {
    const isClickInsideMenu = event.target.closest('.menu-container');
    if (!isClickInsideMenu) {
        document.querySelectorAll('.menu-container.active').forEach(menu => {
            menu.classList.remove('active');
        });
    }
});
