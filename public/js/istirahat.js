let timeInterval; // Variabel untuk menyimpan interval jam

// Fungsi untuk update jam setiap detik
function updateTime() {
    const currentTimeElement = document.getElementById("current-time");
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    if (currentTimeElement) {
        currentTimeElement.textContent = `${hours}:${minutes}:${seconds}`;
    }
}

// Memastikan jam terupdate saat modal dibuka
document.getElementById('exampleModalIstirahat').addEventListener('show.bs.modal', function() {
    updateTime(); // Update jam langsung pas modal dibuka
    timeInterval = setInterval(updateTime, 1000); // Mulai interval untuk update jam
});

// Menyimpan status di localStorage
function saveStatus() {
    const now = new Date();
    const timeString = now.toTimeString().split(' ')[0]; // Format HH:MM:SS

    // Simpan waktu klik di localStorage
    localStorage.setItem("saveTime", now.getTime());
    localStorage.setItem("wakeUpTime", timeString); // Simpan jam istirahat

    // Tampilkan centang biru (mungkin tidak relevan di modal ini)
    const checkIcon = document.getElementById("check-icon");
    if (checkIcon) {
        checkIcon.style.display = "inline";
    }

    // Hentikan jam dan ganti dengan keterangan waktu istirahat (mungkin tidak relevan di modal ini)
    const timeDisplay = document.getElementById("time-display");
    if (timeDisplay) {
        clearInterval(timeInterval);
        timeDisplay.innerHTML = `Saya istirahat pada jam ${timeString}`;
    }
}

// Mengecek apakah sudah 24 jam sejak tombol diklik (mungkin tidak relevan di modal ini)
function checkStatus() {
    const saveTime = localStorage.getItem("saveTime");
    const wakeUpTime = localStorage.getItem("wakeUpTime");
    const timeDisplay = document.getElementById("time-display");
    const checkIcon = document.getElementById("check-icon");

    if (saveTime && wakeUpTime && timeDisplay) {
        const now = new Date().getTime();
        const timeDiff = now - parseInt(saveTime);
        const oneDay = 24 * 60 * 60 * 1000; // 24 jam dalam milidetik

        if (timeDiff < oneDay) {
            if (checkIcon) checkIcon.style.display = "inline"; // Tetap tampilkan centang
            timeDisplay.innerHTML = `Saya istirahat pada jam ${wakeUpTime}`;
            clearInterval(timeInterval); // Hentikan jam
        } else {
            localStorage.removeItem("saveTime"); // Hapus status setelah 24 jam
            localStorage.removeItem("wakeUpTime"); // Hapus waktu istirahat
            if (checkIcon) checkIcon.style.display = "none"; // Sembunyikan centang
            timeDisplay.innerHTML = `Waktu saat ini: <span id="current-time"></span>`;
            timeInterval = setInterval(updateTime, 1000); // Mulai jam lagi
        }
    } else if (timeDisplay) {
        timeInterval = setInterval(updateTime, 1000); // Mulai jam jika tidak ada status
    }
}

// Panggil fungsi saat halaman dimuat
window.onload = checkStatus;

// Event listener untuk tombol Save (mungkin tidak relevan di modal ini, form submit yang akan bekerja)
const saveButton = document.getElementById("save-btn");
if (saveButton) {
    saveButton.addEventListener("click", saveStatus);
}

$(document).ready( function () {
    const saveBtn = $("#save-btn");
    const checkIcon = $("#check-icon");
    const currentTimeSpan = $("#current-time");
    const formIstirahat = $("#form-Istirahat"); // Perbaikan ID form

    function getCurrentTime() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        return `${hours}:${minutes}:${seconds}`;
    }

    // Tampilkan jam saat ini (di dalam modal)
    setInterval(() => {
        if (currentTimeSpan) {
            currentTimeSpan.textContent = getCurrentTime();
        }
    }, 1000);

    // Event listener untuk submit form
    formIstirahat.on("submit",function(e){
        e.preventDefault();
        const currentTime = getCurrentTime();
        console.log("Data yang dikirim:", {
            waktu: currentTime
        });
        $.ajax({
            url : `/istirahat`,
            type : 'POST',
            contentType: 'application/json',
            headers : {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            data : JSON.stringify({
                waktu:currentTime,
            }),
            success: function(res){
                window.location.href = '/siswa';
            },
            error: function(err) {
                console.error("Error saat mengirim data:", err);
            }
        });
    });
});