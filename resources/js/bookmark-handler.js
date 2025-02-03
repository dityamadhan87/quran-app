document.addEventListener('DOMContentLoaded', async () => {
    const bookmarkForm = document.getElementById('bookmarkForm');
    const userLoggedIn = window.userLoggedIn;

    if (!userLoggedIn) {
        bookmarkForm.addEventListener('submit', (event) => {
            event.preventDefault();
            window.location.href = "/login";
        });
        return;
    }

    try {
        const response = await fetch("/quran/bookmark/list");
        if (!response.ok) {
            throw new Error('Terjadi kesalahan.');
        }
        const result = await response.json();
        result.data.forEach(element => {
            tambahKeListBookmark(element.koleksi_id, element.nama_koleksi);
        });
    }
    catch (error) {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat memproses permintaan.');
    }

    bookmarkForm.addEventListener('submit', async function (event) {
        event.preventDefault();
        const formData = new FormData(this);
        const data = {nama_koleksi: formData.get('nama_koleksi')};

        try{
            const response = await fetch("/quran/bookmark", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            });
            if (!response.ok) {
                throw new Error('Terjadi kesalahan.');
            }
            const result = await response.json();
            alert(result.message);
            tambahKeListBookmark(result.data.koleksi_id, result.data.judulBookmark);
        }
        catch (error) {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat memproses permintaan.');
        }
    });
});

function tambahKeListBookmark(koleksi_id, nama_koleksi) {
    const bookmarkList = document.getElementById('list-bookmark');
    const label = document.createElement('label');
    label.innerHTML = `<input type="checkbox" name="bookmark[]" value="${koleksi_id}"> ${nama_koleksi}`;
    bookmarkList.appendChild(label);
}
