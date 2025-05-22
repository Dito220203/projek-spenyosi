
$(document).ready(function () {
    $('#btn-beribadah').click(function () {
        let agama = $('meta[name="user-agama"]').attr('content');
        if (agama === 'Islam') {
            $('#modalIslam').modal('show');
        } else if (agama === 'Kristen') {
            $('#modalKristen').modal('show');
        }
    });
});



document.addEventListener('DOMContentLoaded', function() {
           const checkboxes = document.querySelectorAll('.salat-checkbox');

           // Hari sekarang (format: YYYY-MM-DD)
           const today = new Date().toISOString().split('T')[0];

           // Cek localStorage dan isi ulang checkbox + waktu
           checkboxes.forEach(function(checkbox) {
               const value = checkbox.value;
               const timeInput = checkbox.closest('div').querySelector('.salat-time');
               const dataKey = `salat_${value}`;

               const saved = localStorage.getItem(dataKey);
               if (saved) {
                   const parsed = JSON.parse(saved);
                   if (parsed.date === today) {
                       checkbox.checked = true;
                       timeInput.value = parsed.time;
                       timeInput.style.display = 'block';
                   } else {
                       // Hapus data jika sudah lewat hari
                       localStorage.removeItem(dataKey);
                   }
               }

               checkbox.addEventListener('change', function() {
                   if (checkbox.checked) {
                       const now = new Date();
                       const jam = now.getHours().toString().padStart(2, '0');
                       const menit = now.getMinutes().toString().padStart(2, '0');
                       const waktu = `${jam}:${menit}`;

                       timeInput.value = waktu;
                       timeInput.style.display = 'block';

                       // Simpan ke localStorage
                       localStorage.setItem(dataKey, JSON.stringify({
                           time: waktu,
                           date: today
                       }));
                   } else {
                       timeInput.value = '';
                       timeInput.style.display = 'none';
                       localStorage.removeItem(dataKey);
                   }
               });
           });
       });

