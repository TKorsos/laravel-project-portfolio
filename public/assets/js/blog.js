function loadMorePosts() {
    document.getElementById('load-more').addEventListener('click', function() {
        var button = this;
        var nextPage = button.getAttribute('data-next-page');

        if (!nextPage) {
            button.style.display = 'none';
            return;
        }

        fetch(nextPage, {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Hálózati hiba történt');
            }
            return response.json();
        })
        .then(data => {
            var parser = new DOMParser();
            var doc = parser.parseFromString(data.posts, 'text/html');
            var newPosts = doc.body.childNodes;

            var postList = document.getElementById('post-list');
            Array.from(newPosts).forEach(node => {
                postList.appendChild(node);
            });

            if (data.next_page_url) {
                button.setAttribute('data-next-page', data.next_page_url);
            } else {
                button.style.display = 'none';
            }
        })
        .catch(error => {
            alert('Hiba történt a blogok betöltésekor.');
            console.error(error);
        });
    });
}

function render() {
    loadMorePosts();
}

render();