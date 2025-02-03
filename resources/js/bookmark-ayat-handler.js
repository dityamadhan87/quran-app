document.getElementById('bookmark-ayat-form').addEventListener('submit', async function (event) {
    event.preventDefault();
    const formData = new FormData(this);

    const id_koleksi = document.querySelectorAll('input[name="bookmark[]"]:checked');
    let koleksi_id = [];
    id_koleksi.forEach((checkbox) => {
        koleksi_id.push(checkbox.value);
    });

    const idAyat = formData.get('idAyat');
    const idSurat = formData.get('idSurat');

    const data = {
        koleksi_id: koleksi_id,
        idAyat: idAyat,
        idSurat: idSurat
    };

    try {
        const response = await fetch("/quran/bookmark/ayat", {
            method: "POST",
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
    }
    catch (error) {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat memproses permintaan.');
    }
});
