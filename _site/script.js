function register() {
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();

    if (name && email) {
        const formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);

        fetch('backend.php', { method: 'POST', body: formData })
            .then(res => res.text())
            .then(data => {
                alert(data === 'success' ? 'Pendaftaran berhasil!' : 'Gagal mendaftar.');
                if (data === 'success') {
                    document.getElementById('name').value = '';
                    document.getElementById('email').value = '';
                }
            });
    } else {
        alert('Lengkapi nama dan email.');
    }
}

function loadParticipants() {
    fetch('backend.php?peserta.php=1')
        .then(res => res.json())
        .then(data => {
            const list = document.getElementById('participantList');
            list.innerHTML = '';
            if (data.length === 0) list.innerHTML = '<li>Belum ada peserta.</li>';
            data.forEach(p => {
                const li = document.createElement('li');
                li.textContent = `${p.nama} (${p.email})`;
                list.appendChild(li);
            });
        });
}

function uploadBukti() {
    const nama = document.getElementById('buktiNama').value.trim();
    const file = document.getElementById('buktiFile').files[0];

    if (nama && file) {
        const formData = new FormData();
        formData.append('bukti_nama', nama);
        formData.append('bukti_file', file);

        fetch('backend.php', { method: 'POST', body: formData })
            .then(res => res.text())
            .then(data => {
                alert(data === 'success' ? 'Bukti berhasil diunggah!' : 'Gagal mengunggah bukti.');
                if (data === 'success') {
                    document.getElementById('buktiNama').value = '';
                    document.getElementById('buktiFile').value = '';
                    loadBukti();
                }
            });
    } else {
        alert('Isi nama dan pilih file.');
    }
}

function loadBukti() {
    fetch('backend.php?pembayaran=1')
        .then(res => res.json())
        .then(data => {
            const list = document.getElementById('buktiList');
            list.innerHTML = '';
            if (data.length === 0) list.innerHTML = '<li>Belum ada bukti pembayaran.</li>';
            data.forEach(b => {
                const li = document.createElement('li');
                li.innerHTML = `${b.nama} - <a href="uploads/${b.bukti}" target="_blank">Lihat Bukti</a>`;
                list.appendChild(li);
            });
        });
}

function sendFeedback() {
    const feedback = document.getElementById('feedbackInput').value.trim();

    if (feedback) {
        const formData = new FormData();
        formData.append('feedback', feedback);

        fetch('backend.php', { method: 'POST', body: formData })
            .then(res => res.text())
            .then(data => {
                alert(data === 'success' ? 'Feedback terkirim!' : 'Gagal mengirim feedback.');
                if (data === 'success') {
                    document.getElementById('feedbackInput').value = '';
                    loadFeedback();
                }
            });
    }
}

function loadFeedback() {
    fetch('backend.php?feedback=1')
        .then(res => res.json())
        .then(data => {
            const list = document.getElementById('feedbackList');
            list.innerHTML = '';
            if (data.length === 0) list.innerHTML = '<li>Belum ada feedback.</li>';
            data.forEach(fb => {
                const li = document.createElement('li');
                li.textContent = fb.isi;
                list.appendChild(li);
            });
        });
}

function toggleMenu() {
    const nav = document.getElementById('navLinks');
    nav.classList.toggle('show');
}