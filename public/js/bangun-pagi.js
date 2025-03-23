let timeInterval; // Variabel untuk menyimpan interval jam

// Fungsi untuk update jam setiap detik
function updateTime() {
    const currentTimeElement = document.getElementById("current-time");
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    currentTimeElement.textContent = `${hours}:${minutes}:${seconds}`;
}

// Memastikan jam terupdate saat modal dibuka
document.getElementById('exampleModal').addEventListener('show.bs.modal', function() {
    updateTime(); // Update jam langsung pas modal dibuka
    timeInterval = setInterval(updateTime, 1000); // Mulai interval untuk update jam
});

// Menyimpan status di localStorage
function saveStatus() {
    const now = new Date();
    const timeString = now.toTimeString().split(' ')[0]; // Format HH:MM:SS

    // Simpan waktu klik di localStorage
    localStorage.setItem("saveTime", now.getTime());
    localStorage.setItem("wakeUpTime", timeString); // Simpan jam bangun

    // Tampilkan centang biru
    document.getElementById("check-icon").style.display = "inline";

    // Hentikan jam dan ganti dengan keterangan waktu bangun
    clearInterval(timeInterval);
    document.getElementById("time-display").innerHTML = `Saya bangun pagi pada jam ${timeString}`;
}

// Mengecek apakah sudah 24 jam sejak tombol diklik
function checkStatus() {
    const saveTime = localStorage.getItem("saveTime");
    const wakeUpTime = localStorage.getItem("wakeUpTime");

    if (saveTime && wakeUpTime) {
        const now = new Date().getTime();
        const timeDiff = now - parseInt(saveTime);
        const oneDay = 24 * 60 * 60 * 1000; // 24 jam dalam milidetik

        if (timeDiff < oneDay) {
            document.getElementById("check-icon").style.display = "inline"; // Tetap tampilkan centang
            document.getElementById("time-display").innerHTML = `Saya bangun pagi pada jam ${wakeUpTime}`;
            clearInterval(timeInterval); // Hentikan jam
        } else {
            localStorage.removeItem("saveTime"); // Hapus status setelah 24 jam
            localStorage.removeItem("wakeUpTime"); // Hapus waktu bangun
            document.getElementById("check-icon").style.display = "none"; // Sembunyikan centang
            document.getElementById("time-display").innerHTML = `Waktu saat ini: <span id="current-time"></span>`;
            timeInterval = setInterval(updateTime, 1000); // Mulai jam lagi
        }
    }

}

// Panggil fungsi saat halaman dimuat
window.onload = checkStatus;

// Event listener untuk tombol Save
document.getElementById("save-btn").addEventListener("click", saveStatus);
