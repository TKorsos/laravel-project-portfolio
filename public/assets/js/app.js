// általános scriptek
function updateDelays(observer, reset = false) {
    // összes animálható elem
    const allItems = document.querySelectorAll(".blog-title, #post-list > .blog.col, #index-blog-container > .blog.col");

    // ha reset=true, akkor csak az utolsó batch-et számozzuk újra
    let startIndex = 0;
    if (reset) {
        const batchSize = 12; // vagy amennyit egyszerre töltesz
        startIndex = Math.max(0, allItems.length - batchSize);
    }

    allItems.forEach((item, index) => {
        if (index >= startIndex) {
            const localIndex = index - startIndex;
            item.style.setProperty('--delay', `${localIndex * 0.1}s`);
            observer.observe(item);
        }
    });

    // gomb figyelése
    const btn = document.querySelector("#load-more, .btn-more-blog");
    if (btn) {
        const lastDelay = (Math.min(allItems.length, startIndex + 12) - startIndex - 1) * 0.1;
        btn.classList.remove("animate");
        btn.style.setProperty('--delay', `${lastDelay + 0.5}s`);
        observer.observe(btn);
    }
}

function observerBlogCols() {
    document.addEventListener("DOMContentLoaded", () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("animate");
                    if (!entry.target.matches("#load-more, .btn-more-blog")) {
                        observer.unobserve(entry.target);
                    }
                }
            });
        }, { threshold: 0.2 });

        // induláskor
        updateDelays(observer);

        // új posztok betöltésekor
        const postList = document.querySelector("#post-list");
        if (postList) {
            const mutationObserver = new MutationObserver(() => {
                updateDelays(observer, true); // új batch → reseteljük a delay-t
            });
            mutationObserver.observe(postList, { childList: true });
        }
    });
}

function render() {
    observerBlogCols();
}

render();