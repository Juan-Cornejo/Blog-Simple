document.getElementById('postForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('save_post.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        alert(data);
        this.reset();
        loadPosts();
    });
});

function loadPosts() {
    fetch('posts.php')
        .then(res => res.text())
        .then(data => {
            document.getElementById('postsContainer').innerHTML = data;
        });
}

window.onload = loadPosts;