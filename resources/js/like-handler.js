document.addEventListener('DOMContentLoaded', async () => {
    const likeButtons = document.querySelectorAll('.like-button');
    const userLoggedIn = window.userLoggedIn; // Gunakan variabel global dari Blade

    if (!userLoggedIn) {
        likeButtons.forEach(button => {
            button.addEventListener('click', () => window.location.href = "/login"); // Sesuaikan route login
        });
        return;
    }

    // Ambil daftar ayat yang sudah di-like oleh user
    const response = await fetch("/like/list"); // Sesuaikan route
    const likedAyat = await response.json();

    // Tandai tombol like yang sudah di-like
    likedAyat.forEach(item => {
        const button = document.querySelector(`.like-button[data-id="${item.idAyat}"][data-surat="${item.idSurat}"]`);
        if (button) {
            button.querySelector('img').src = "/icon/like_fill.svg"; // Sesuaikan path asset
            button.setAttribute('data-liked', 'true');
        }
    });

    // Handle klik tombol like/unlike
    likeButtons.forEach(button => {
        button.addEventListener('click', async function () {
            const ayatId = this.getAttribute('data-id');
            const suratId = this.getAttribute('data-surat');
            const isLiked = this.getAttribute('data-liked') === 'true';

            const likeIcon = this.querySelector('img');
            try {
                const response = await fetch("/like/toggle", { // Sesuaikan route
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        ayat_id: ayatId,
                        surat_id: suratId,
                        action: isLiked ? 'unlike' : 'like'
                    })
                });

                const data = await response.json();

                if (response.ok) {
                    if (data.liked) {
                        likeIcon.src = "/icon/like_fill.svg"; // Sesuaikan path asset
                        this.setAttribute('data-liked', 'true');
                    } else {
                        likeIcon.src = "/icon/like_nofill.svg"; // Sesuaikan path asset
                        this.setAttribute('data-liked', 'false');
                    }
                } else {
                    alert(data.message || 'Terjadi kesalahan.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat memproses permintaan.');
            }
        });
    });
});
