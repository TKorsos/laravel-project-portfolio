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

function render() {
    initScrollBtn();
}

render();