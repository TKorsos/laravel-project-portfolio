// csak az index oldalra vonatkozó scriptek
// lap tetejére gomb script egyelőre nincs már ilyen gomb, nem lesz rá szükség?
function initScrollBtn() {
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    let isVisible = false;
    let hideTimeout;

    window.addEventListener('scroll', () => {
    if (window.scrollY > 500) {
        if (!isVisible) {
        if (hideTimeout) {
            clearTimeout(hideTimeout);
        }
        scrollTopBtn.style.display = 'block';
        setTimeout(() => {
            scrollTopBtn.style.opacity = '1';
            scrollTopBtn.style.pointerEvents = 'auto';
            scrollTopBtn.style.visibility = 'visible';
        }, 10);
        isVisible = true;
        }
    } else {
        if (isVisible) {
        scrollTopBtn.style.opacity = '0';
        scrollTopBtn.style.pointerEvents = 'none';
        scrollTopBtn.style.visibility = 'hidden';
        hideTimeout = setTimeout(() => {
            scrollTopBtn.style.display = 'none';
        }, 400);
        isVisible = false;
        }
    }
    });

    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// portfóliót megjelenítő animáció
function observerIndexPortfolioImages() {
    document.querySelectorAll('.index-portfolio').forEach((img, index) => {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    setTimeout( () => {
                        entry.target.style.transition = 'opacity 1s ease-out, transform 1s ease-out';
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 200);
                    obs.unobserve(entry.target); // csak egyszer animáljuk
                }
            });
        }, {
            threshold: 0.1 // 10% láthatóság kell az aktiváláshoz
        });
    observer.observe(img);
    });
}

function observerIndexAboutContainers() {
    document.addEventListener('DOMContentLoaded', () => {
        const pictureContainer = document.getElementById('index-about-picture-container');
        const textContainer = document.getElementById('index-about-text-container');

        const observerOptions = {
            threshold: 0.3
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
            if(entry.isIntersecting) {
                pictureContainer.classList.add('animate-in');
                textContainer.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
            });
        }, observerOptions);

        observer.observe(pictureContainer);
    });
}

function render() {
    // initScrollBtn();
    observerIndexPortfolioImages();
    observerIndexAboutContainers();
}

render();
