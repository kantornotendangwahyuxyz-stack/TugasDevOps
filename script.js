function formatWaktu(date = new Date()) {
    return date.toLocaleTimeString('id-ID');
}

function getOutputText(waktuStr) {
    return `Berhasil diklik pada ${waktuStr}`;
}

if (typeof document !== 'undefined') {
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('btnClick');
        if (btn) {
            btn.addEventListener('click', () => {
                const output = document.getElementById('output');
                const waktu = formatWaktu();
                if (output) {
                    output.textContent = getOutputText(waktu);
                }
            });
        }
    });
}

if (typeof module !== 'undefined' && module.exports) {
    module.exports = { formatWaktu, getOutputText };
}
