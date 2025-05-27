<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-agama" content="{{ auth()->user()->agama }}">



    <title>7 Kebiasaan Anak</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/beribadah.js') }}"></script> {{-- Contoh file JS eksternal --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .header {
        background-color: #2c237e;
        color: white;
        display: flex;
        justify-content: ;
        align-items: center;
        gap: 10px;
        /* Biar logo dan tulisan sejajar di tengah vertikal */
        padding: 10px 20px;
    }

    .header img {
        height: 100px;
        background-color: white;
        padding: 0px;
        /* Opsional, untuk memberi jarak antara gambar dan latar */
        border-radius: 100px;
        /* Opsional, kalau mau sudut agak melengkung */
    }

    /* CSS buat teks di pinggir kanan */
    .user-info {
        position: absolute;
        right: 20px;
        top: 90px;
        display: flex;
        /* flex-direction: column; */
        /* ini bikin kontennya vertikal */
        gap: 2px;

        padding-left: 55px;
        display: flex;
        /* ini bikin isinya horizontal */
        gap: 10px;
        /* beri jarak antar elemen, opsional */
        align-items: center;
        /* supaya sejajar secara vertikal */
        /* teks rata kanan */
    }

    .user-info h6,
    .user-info a {
        margin: 0;
    }

    .status-bar {
        background: white;
        padding: 10px 20px;
        border-radius: 10px;
        margin: 10px;
        border: 1px solid rgb(0, 0, 0);
    }

    .progress-bar {
        background: #e0e0e0;
        border-radius: 8px;
        height: 20px;
        width: 100%;
        overflow: hidden;
    }

    .progress {
        background-color: #007bff;
        height: 100%;
        width: 0%;
        color: white;
        text-align: center;
        line-height: 20px;
        transition: width 0.4s ease-in-out;
    }

    .container {
        background: white;
        /* margin: 10px; */
        padding: 10px 20px;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        border: 1px solid rgb(0, 0, 0);
        max-width: 1340px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 55px;
        padding-right: 55px;
        position: relative;
        /* Biar posisi anaknya bisa diatur */
        /* Jarak dari kiri */
    }


    .carousel {
        display: flex;
        scroll-snap-type: x mandatory;
        gap: 50px;
        padding: 10px;
        overflow-x: scroll;
        scroll-behavior: smooth;
        width: 100%;
    }

    .slide-group {
        display: flex;
        justify-content: center;
        gap: 70px;
        /* Jarak antar kotak */
        margin-bottom: 30px;
        /* Jarak antar baris */
    }

    .card {
        background: white;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 5px 10px 15px rgba(0, 0, 0, 0.3);
        text-align: center;
        min-width: 250px;
        border: 1px solid black;
        scroll-snap-align: start;
        transition: transform 0.2s ease-in-out;
        will-change: transform;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card img {
        width: 150px;
        height: 150px;
        /* text-align: center; */
        margin-left: auto;
        margin-right: auto;


    }

    .card h3 {
        font-size: 18px;
        /* Ukuran teks judul */
        position: absolute;
        /* Geser tombol tanpa pengaruh ke kotak */

        left: 50%;
        /* Biar tetap di tengah */
        transform: translateX(-50%);
        /* Biar posisi tetap terpusat */
        top: 23px;
        /* Geser ke atas, ubah angka sesuai kebutuhan */
    }

    .btn {
        background: #ffd700;
        border: none;
        padding: 10px;
        border-radius: 20px;
        cursor: pointer;

    }

    .indicators {
        display: none;
        /* default: disembunyikan */
    }

    @media (max-width: 768px) {
        .indicators {
            display: flex;
            /* atau block, tergantung kebutuhan */
            justify-content: center;
            gap: 8px;
            margin-top: 10px;
        }

        .indicator {
            width: 10px;
            height: 10px;
            background-color: #ccc;
            border-radius: 50%;
            cursor: pointer;
        }

        .indicator.active {
            background-color: #007bff;
        }

    }

</style>

<body>
    {{-- <script>
        $(document).ready(function() {
            if (!sessionStorage.getItem('sudahMulai')) {
                Swal.fire({
                    title: '7 Kebiasaan Anak Indonesia Hebat',
                    text: 'Ayo mulai perjalanan hebatmu!',
                    imageUrl: '/images/pop-up-mulai.png',
                    imageWidth: 400,
                    imageAlt: '7 Kebiasaan',
                    confirmButtonText: 'MULAI',
                    confirmButtonColor: '#FF8C00'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/simpan-kebiasaan',
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                mulai: true
                            },
                            success: function(response) {
                                if (response.success) {
                                    sessionStorage.setItem('sudahMulai', 'true');
                                    window.location.href = '/siswa';
                                } else {
                                    alert("Gagal menyimpan data!");
                                }
                            },
                            error: function(xhr) {
                                console.log("Error:", xhr.responseText);
                                alert("Terjadi kesalahan, cek console!");
                            }
                        });
                    }
                });
            } else {
                // Reset flag saat halaman /siswa sudah terbuka agar alert bisa muncul lagi kalau user balik
                sessionStorage.removeItem('sudahMulai');
            }
        });
    </script> --}}

    <div class="header">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
        <span>SPENYOSI</span>
        <div class="user-info">

            <h6>{{ $siswa->nama }}</h6>
            <h6>{{ $siswa->kelas }}</h6>
            <h6>{{ $siswa->agama }}</h6>
            <a href="/"><i class="fa-solid fa-right-from-bracket"></i></a>
            {{-- <a href="#">Log Out</a> --}}

        </div>

    </div>
    <div class="status-bar">
        <strong>Status Pekerjaan</strong>
        <p>7 Kebiasaan Anak</p>
        <div class="progress-bar">
            <div class="progress">0%</div>
        </div>
    </div>

    <script>
        let listKebiasaanHtml = ''; // Disiapkan supaya bisa dipakai saat modal dibuka

        function updateProgress(data, agama) {
            const semuaKebiasaan = [
                'Bangun Pagi',
                'Beribadah',
                'BeribadahKristen',
                'Berolahraga',
                'Gemar Belajar',
                'Makan Sehat & Bergizi',
                'Bermasyarakat',
                'Istirahat Cukup'
            ];

            // Filter kebiasaan sesuai agama
            const kebiasaan = semuaKebiasaan.filter(item => {
                if (agama === 'Islam') return item !== 'BeribadahKristen';
                if (agama === 'Kristen') return item !== 'Beribadah';
                return item !== 'Beribadah' && item !== 'BeribadahKristen'; // Default jika agama tidak diketahui
            });

            let totalSelesai = 0;
            let listKebiasaan = '<ul style="list-style:none;">';

            kebiasaan.forEach(function(item) {
                if (data[item]) {
                    totalSelesai++;
                    listKebiasaan += `<li>✅ ${item}</li>`;
                } else {
                    listKebiasaan += `<li>⬜ ${item}</li>`;
                }
            });

            listKebiasaan += '</ul>';
            listKebiasaanHtml = listKebiasaan;

            let progress = Math.round((totalSelesai / kebiasaan.length) * 100);
            $('.progress').css('width', `${progress}%`).text(`${progress}%`);
        }

        $(document).ready(function() {
            // Load data dan update progress saat halaman dimuat
            $.get('/siswa/status-kebiasaan', function(data) {
                const agamaUser = data.agama || ''; // Misalnya: 'Islam' atau 'Kristen'
                updateProgress(data, agamaUser);
            });

            // Modal hanya dibuka saat user klik
            $('.status-bar').click(function() {
                const popupContent = `
                <div class="modal fade" id="kebiasaanModal" tabindex="-1" aria-labelledby="kebiasaanModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="kebiasaanModalLabel">7 Kebiasaan Anak</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ${listKebiasaanHtml??''}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>`;

                $('body').append(popupContent);
                $('#kebiasaanModal').modal('show');
                $('#kebiasaanModal').on('hidden.bs.modal', function() {
                    $('#kebiasaanModal').remove();
                });
            });
        });
    </script>

    {{-- <div class="status-bar">
        <strong>Status Pekerjaan</strong>
        <p>7 Kebiasaan Anak</p>
        <div class="progress-bar">
            <div class="progress">0%</div>
        </div>
    </div>

    <script>
        let listKebiasaanHtml = ''; // Disiapkan supaya bisa dipakai saat modal dibuka

        function updateProgress(data) {
            const kebiasaan = [
                'Bangun Pagi',
                'Beribadah',
                'BeribadahKristen',
                'Berolahraga',
                'Gemar Belajar',
                'Makan Sehat & Bergizi',
                'Bermasyarakat',
                'Istirahat Cukup'
            ];

            let totalSelesai = 0;
            let listKebiasaan = '<ul style="list-style:none;">';

            kebiasaan.forEach(function(item) {
                if (data[item]) {
                    totalSelesai++;
                    listKebiasaan += `<li>✅ ${item}</li>`;
                } else {
                    listKebiasaan += `<li>⬜ ${item}</li>`;
                }
            });

            listKebiasaan += '</ul>';
            listKebiasaanHtml = listKebiasaan; // Simpan untuk nanti saat modal dibuka

            let progress = Math.round((totalSelesai / kebiasaan.length) * 100);
            $('.progress').css('width', `${progress}%`).text(`${progress}%`);
        }

        $(document).ready(function() {
            // Load data dan update progress saat halaman dimuat
            $.get('/siswa/status-kebiasaan', function(data) {
                updateProgress(data);
            });

            // Modal hanya dibuka saat user klik
            $('.status-bar').click(function() {
                const popupContent = `
                    <div class="modal fade" id="kebiasaanModal" tabindex="-1" aria-labelledby="kebiasaanModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="kebiasaanModalLabel">7 Kebiasaan Anak</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ${listKebiasaanHtml}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>`;

                $('body').append(popupContent);
                $('#kebiasaanModal').modal('show');
                $('#kebiasaanModal').on('hidden.bs.modal', function() {
                    $('#kebiasaanModal').remove();
                });
            });
        });
    </script> --}}





    <!-- Modal bangun pagi -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bangun Pagi</h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('bangunpagi') }}" method="post" id="form-bgnpagi"> <!-- FORM DIMULAI DI SINI -->
                    @csrf
                    <div style="text-align: center;">
                        <p>Waktu saat ini</p>
                        <span id="current-time"
                            style="display: block; font-size: 1.9em; font-weight: bold; margin-top: 5px;">
                            22:11:44
                        </span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>


                        <button type="submit" class="btn btn-primary" id="save-btn">
                            Simpan
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Modal Beribadah -->
    <div class="modal fade" id="modalIslam" tabindex="-1" aria-labelledby="exampleModalBeribadahLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalBeribadahLabel">Form Beribadah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('beribadah') }}" method="post" id="formBeribadah">
                        @csrf
                        <label>Beribadah</label>
                        <div>
                            <label><input type="checkbox" class="salat-checkbox" value="subuh"> Subuh</label>
                            <input type="time" class="salat-time form-control mt-1" name="subuh" readonly hidden>
                        </div>
                        <div>
                            <label><input type="checkbox" class="salat-checkbox" value="dzuhur"> Dzuhur</label>
                            <input type="time" class="salat-time form-control mt-1" name="duhur" readonly hidden>
                        </div>
                        <div>
                            <label><input type="checkbox" class="salat-checkbox" value="ashar"> Ashar</label>
                            <input type="time" class="salat-time form-control mt-1" name="asar" readonly hidden>
                        </div>
                        <div>
                            <label><input type="checkbox" class="salat-checkbox" value="maghrib"> Maghrib</label>
                            <input type="time" class="salat-time form-control mt-1" name="magrib" readonly hidden>
                        </div>
                        <div>
                            <label><input type="checkbox" class="salat-checkbox" value="isya"> Isya</label>
                            <input type="time" class="salat-time form-control mt-1" name="isyak" readonly hidden>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" form="formBeribadah" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script>
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
    </script>

    <!-- Modal Beribadah (Kristen - Sederhana) -->
    <div class="modal fade" id="modalKristen" tabindex="-1" aria-labelledby="exampleModalBeribadahLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalBeribadahLabel">Form Ibadah Harian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('beribadahkristen') }}" method="post" id="formBeribadahkristen">
                        @csrf

                        <div>
                            <label><input type="checkbox" class="ibadah-checkbox" value="doa_pagi"> Doa Pagi</label>
                            <input type="time" class="ibadah-time form-control mt-1" name="subuh" readonly
                                hidden>
                        </div>
                        <div>
                            <label><input type="checkbox" class="ibadah-checkbox" value="alkitab"> Membaca
                                Alkitab/Renungan</label>
                            <input type="time" class="ibadah-time form-control mt-1" name="asar" readonly
                                hidden>
                        </div>
                        <div>
                            <label><input type="checkbox" class="ibadah-checkbox" value="doa_malam"> Doa
                                Malam</label>
                            <input type="time" class="ibadah-time form-control mt-1" name="isyak" readonly
                                hidden>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" form="formBeribadahkristen" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script></script>





    {{-- modal Olahraga --}}
    <div class="modal fade" id="exampleModalOlahraga" tabindex="-1" aria-labelledby="exampleModalOlahragaLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalOlahragaLabel">Data Olahraga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="olahragaForm" action="{{ route('olahraga') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="foto_masyarakat" class="form-label">Upload Foto Kegiatan</label>
                            <input type="file" class="form-control" id="foto_masyarakat" name="image"
                                accept="image/*" required>
                        </div>

                        {{-- Waktu Otomatis --}}
                        <div class="mb-3">
                            <label for="waktu_olahraga_display" class="form-label">Waktu Upload</label>
                            <input type="text" class="form-control" id="waktu_olahraga_display" readonly>
                            <input type="hidden" name="waktu" id="waktu_olahraga">
                        </div>
                        <div class="mb-3">
                            <label for="ket_olahraga" class="form-label">Jenis Olahraga</label>
                            <textarea class="form-control" id="ket_olahraga" name="ket_olahraga" rows="2" required
                                placeholder="Olahraga Apa Kamu Hari Ini ?">{{ old('ket_olahraga', $rekaps->olahraga?->ket_olahraga ?? '') }}</textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Script --}}
    <script>
        document.getElementById('foto_masyarakat').addEventListener('change', function() {
            const now = new Date();
            const waktu = now.getHours().toString().padStart(2, '0') + ':' +
                now.getMinutes().toString().padStart(2, '0') + ':' +
                now.getSeconds().toString().padStart(2, '0');

            // Tampilkan di input text
            document.getElementById('waktu_olahraga_display').value = waktu;

            // Simpan ke input hidden
            document.getElementById('waktu_olahraga').value = waktu;
        });
    </script>

    {{-- modalgemar belajar --}}
    <div class="modal fade" id="exampleModalBelajar" tabindex="-1" aria-labelledby="exampleModalBelajarLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalBelajarLabel">Data Gemar Belajar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-Belajar" action="{{ route('belajar') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="foto_belajar" class="form-label">Upload Foto Belajar</label>
                                <input type="file" class="form-control" id="foto_belajar" name="image"
                                    accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label for="ket_belajar" class="form-label">Belajar Apa Aku Hari ini</label>
                                <textarea class="form-control" id="ket_belajar" name="ket_belajar" rows="2" required
                                    placeholder="Masih Ingat Belajar Apa Hari Ini?"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modalmakan --}}
    <div class="modal fade" id="exampleModalMakan" tabindex="-1" aria-labelledby="exampleModalMakanLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalMakanLabel">Input Data Makan Sehat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('makan') }}" method="POST" id="form-Makan" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="foto_makan" class="form-label">Upload Foto Makanan</label>
                            <input type="file" class="form-control" id="foto_makan" name="image"
                                accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="ket_makan" class="form-label">Karbohidrat</label>
                            <input type="text" class="form-control" id="karbohidrat" name="karbohidrat"
                                placeholder="Karbohidrat Apa Yang Kamu Makan Hari Ini?" required>
                        </div>
                        <div class="mb-3">
                            <label for="ket_makan" class="form-label">Serat</label>
                            <input type="text" class="form-control" id="serat" name="serat"
                                placeholder="Serat Apa Yang Kamu Makan Hari Ini?" required>
                        </div>
                        <div class="mb-3">
                            <label for="ket_makan" class="form-label">Protein</label>
                            <input type="text" class="form-control" id="protein" name="protein"
                                placeholder="Protein Apa Yang Kamu Makan Hari Ini?" required>
                        </div>
                        <div class="mb-3">
                            <label for="ket_makan" class="form-label">Susu</label>
                            <input type="text" class="form-control" id="minum" name="minum"
                                placeholder="Penuhi Asupan Cairan Mu Dengan Minum Susu/Air Mineral" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modalmasyarakat --}}
    <div class="modal fade" id="exampleModalMasyarakat" tabindex="-1" aria-labelledby="exampleModalMasyarakatLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalMasyarakatLabel">Input Data Bermasyarakat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('masyarakat') }}" method="POST" id="form-Masyarakat"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="foto_masyarakat" class="form-label">Upload Foto Kegiatan</label>
                            <input type="file" class="form-control" id="foto_masyarakat" name="image"
                                accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_masyarakat" class="form-label">Keterangan Kegiatan</label>
                            <textarea class="form-control" id="keterangan_masyarakat" name="keterangan" rows="3" required
                                placeholder="Kegiatan Apa Yang Di Lakukan Hari Ini?"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modalistirahat --}}
    <div class="modal fade" id="exampleModalIstirahat" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Waktu Istirahat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <form action="{{ route('istirahat') }}" method="post" id="form-istirahat">
                    @csrf

                    <div class="modal-body text-center">
                        <p>Silakan beristirahat sejenak. Waktu saat ini:</p>
                        <h2 id="jamSekarang" class="fw-bold text-dark">--:--:--</h2>
                        <input type="hidden" name="waktu" id="inputJamIstirahat">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script></script>



    <div class="container">
        <h2 style="text-align: center;">7 KEBIASAAN ANAK</h2>
        <div class="carousel slider" id="carousel">
            <div class="slide-group">
                <div class="card">
                    <h3>Bangun Pagi</h3>
                    <img src="{{ asset('img/clock.png') }}" alt="Bangun Pagi">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Isi Data
                    </button>
                </div>

                <div class="card">
                    <h3>Beribadah</h3>
                    <img src="{{ asset('img/agama.png') }}" alt="Beribadah">
                    <button type="button" class="btn btn-primary" id="btn-beribadah" data-bs-toggle="modal"
                        @if ($siswa->agama == 'Islam') data-bs-target="#modalslam"
                    @elseif ($siswa->agama == 'Kristen')
                    data-bs-target="#modalKristen" @endif>
                        Isi Data
                    </button>

                </div>
                <div class="card">
                    <h3>Berolahraga</h3>
                    <img src="{{ asset('img/olahraga.png') }}" alt="Berolahraga">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalOlahraga">
                        Isi Data
                    </button>
                </div>
            </div>
            <div class="slide-group">
                <div class="card">
                    <h3>Gemar Belajar</h3>
                    <img src="{{ asset('img/belajar.png') }}" alt="Gemar Belajar">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalBelajar">Isi
                        Data</button>
                </div>
                <div class="card">
                    <h3>Makan Sehat & Bergizi</h3>
                    <img src="{{ asset('img/makan.png') }}" alt="Makan Sehat">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalMakan">Isi
                        Data</button>
                </div>
                <div class="card">
                    <h3>Bermasyarakat</h3>
                    <img src="{{ asset('img/masyarakat.png') }}" alt="Bermasyarakat">
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalMasyarakat">Isi
                        Data</button>
                </div>
            </div>
            <div class="slide-group">
                <div class="card">
                    <h3>Istirahat Cukup</h3>
                    <img src="{{ asset('img/istirahat.png') }}" alt="Istirahat Cukup">
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalIstirahat">Isi
                        Data</button>
                </div>
            </div>
        </div>
        <div class="indicators">
            <div class="indicator active" onclick="scrollToSlide(0)"></div>
            <div class="indicator" onclick="scrollToSlide(1)"></div>
            <div class="indicator" onclick="scrollToSlide(2)"></div>
            <div class="indicator" onclick="scrollToSlide(3)"></div>
            <div class="indicator" onclick="scrollToSlide(4)"></div>
            <div class="indicator" onclick="scrollToSlide(5)"></div>
            <div class="indicator" onclick="scrollToSlide(6)"></div>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script src="{{ asset('js/bangun-pagi.js') }}"></script>


    <script>
        function updateJam() {
            const now = new Date();
            // Format waktu: jam:menit:detik (HH:MM:SS)
            const jam = now.toTimeString().split(' ')[0]; // hasilnya "21:54:50"
            document.getElementById('jamSekarang').textContent = jam;
            document.getElementById('inputJamIstirahat').value = jam;
        }

        const modalIstirahat = document.getElementById('exampleModalIstirahat');
        modalIstirahat.addEventListener('shown.bs.modal', function() {
            updateJam(); // inisialisasi awal
            window.jamInterval = setInterval(updateJam, 1000);
        });

        modalIstirahat.addEventListener('hidden.bs.modal', function() {
            clearInterval(window.jamInterval);
        });


        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.ibadah-checkbox');

            // Hari sekarang (format: YYYY-MM-DD)
            const today = new Date().toISOString().split('T')[0];

            checkboxes.forEach(function(checkbox) {
                const value = checkbox.value;
                const timeInput = checkbox.closest('div').querySelector('.ibadah-time');
                const dataKey = `ibadah_${value}`;

                // Ambil dari localStorage
                const saved = localStorage.getItem(dataKey);
                if (saved) {
                    const parsed = JSON.parse(saved);
                    if (parsed.date === today) {
                        checkbox.checked = true;
                        timeInput.value = parsed.time;
                        timeInput.style.display = 'block';
                    } else {
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
    </script>


</body>

</html>
