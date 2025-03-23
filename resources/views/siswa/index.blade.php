<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>7 Kebiasaan Anak</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        top: 10px;
        text-align: right;
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
        width: 100%;
        background-color: #ddd;
        border-radius: 5px;
        overflow: hidden;
    }

    .progress {
        width: 30%;
        background-color: #ffd700;
        text-align: right;
        padding-right: 5px;
        color: black;
    }

    .container {
        background: white;
        /* margin: 10px; */
        padding: 10px 20px;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        border: 1px solid rgb(0, 0, 0);
        max-width: 1340px;
        /* margin-left: auto;
        margin-right: auto; */
        padding-left: 55px;
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
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .indicator {
        width: 10px;
        height: 10px;
        margin: 0 5px;
        background-color: lightgray;
        border-radius: 50%;
        cursor: pointer;
    }

    .indicator.active {
        background-color: blue;
    }
</style>

<body>
    <script>
        $(document).ready(function() {
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
                        data: {
                            mulai: true
                        },
                        success: function(response) {
                            window.location.href = '/siswa';
                        }
                    });
                }
            });
        });
    </script>
    <div class="header">
        <img src="{{ asset('img/logo.png') }}" alt="Logo">
        <span>SPENYOSI</span>
        {{-- <div class="user-info">
            <h6>Dito Febriansyah</h6>
            <h6>VII A</h6>
            <h6>Islam</h6>
            <a href="#">Log Out</a>
        </div> --}}
        <a href="" style="float: right;">Log Out</a>

    </div>
    <div class="status-bar">
        <strong>Status Pekerjaan</strong>
        <p>7 Kebiasaan Anak</p>
        <div class="progress-bar">
            <div class="progress">30%</div>
        </div>
    </div>
    <!-- Tambahkan script jQuery jika belum ada -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Tambahkan event listener untuk Status Pekerjaan -->
    <script>
        $(document).ready(function() {
            $('.status-bar').click(function() { // Ubah event listener ke seluruh kotak status-bar
                const kebiasaan = [
                    'Bangun Pagi',
                    'Beribadah',
                    'Berolahraga',
                    'Gemar Belajar',
                    'Makan Sehat & Bergizi',
                    'Bermasyarakat',
                    'Istirahat Cukup'
                ];

                let listKebiasaan = '<ul>';
                kebiasaan.forEach(function(item) {
                    listKebiasaan += `<li>${item}</li>`;
                });
                listKebiasaan += '</ul>';

                const popupContent = `
                <div class="modal fade" id="kebiasaanModal" tabindex="-1" aria-labelledby="kebiasaanModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="kebiasaanModalLabel">7 Kebiasaan Anak</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ${listKebiasaan}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

                $('body').append(popupContent);
                $('#kebiasaanModal').modal('show');

                $('#kebiasaanModal').on('hidden.bs.modal', function() {
                    $('#kebiasaanModal').remove();
                });
            });
        });
    </script>


    <!-- Modal bangun pagi -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bangun Pagi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="">
                        <p id="time-display">Waktu saat ini: <span id="current-time"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                    <button type="button" class="btn btn-primary" id="save-btn">
                        Simpan <span id="check-icon" style="display: none;">✔️</span>
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Modal Beribadah -->
    <div class="modal fade" id="exampleModalBeribadah" tabindex="-1" aria-labelledby="exampleModalBeribadahLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalBeribadahLabel">Form Beribadah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formBeribadah">
                        <label>Beribadah</label>
                        <div>
                            <label><input type="checkbox" class="salat-checkbox" value="subuh"> Subuh</label>
                            <div class="upload-container" style="display:none;">
                                <input type="file" class="salat-image" accept="image/*">
                                <span class="upload-status" style="display:none; color:green; font-weight:bold;">✔️
                                    Upload berhasil</span>
                                <input type="text" class="salat-time" readonly style="display:none; margin-top:5px;">
                            </div>
                        </div>
                        <div>
                            <label><input type="checkbox" class="salat-checkbox" value="dzuhur"> Dzuhur</label>
                            <div class="upload-container" style="display:none;">
                                <input type="file" class="salat-image" accept="image/*">
                                <span class="upload-status" style="display:none; color:green; font-weight:bold;">✔️
                                    Upload berhasil</span>
                                <input type="text" class="salat-time" readonly style="display:none; margin-top:5px;">
                            </div>
                        </div>
                        <div>
                            <label><input type="checkbox" class="salat-checkbox" value="ashar"> Ashar</label>
                            <div class="upload-container" style="display:none;">
                                <input type="file" class="salat-image" accept="image/*">
                                <span class="upload-status" style="display:none; color:green; font-weight:bold;">✔️
                                    Upload berhasil</span>
                                <input type="text" class="salat-time" readonly style="display:none; margin-top:5px;">
                            </div>
                        </div>
                        <div>
                            <label><input type="checkbox" class="salat-checkbox" value="maghrib"> Maghrib</label>
                            <div class="upload-container" style="display:none;">
                                <input type="file" class="salat-image" accept="image/*">
                                <span class="upload-status" style="display:none; color:green; font-weight:bold;">✔️
                                    Upload berhasil</span>
                                <input type="text" class="salat-time" readonly
                                    style="display:none; margin-top:5px;">
                            </div>
                        </div>
                        <div>
                            <label><input type="checkbox" class="salat-checkbox" value="isya"> Isya</label>
                            <div class="upload-container" style="display:none;">
                                <input type="file" class="salat-image" accept="image/*">
                                <span class="upload-status" style="display:none; color:green; font-weight:bold;">✔️
                                    Upload berhasil</span>
                                <input type="text" class="salat-time" readonly
                                    style="display:none; margin-top:5px;">
                            </div>
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
        $(document).ready(function() {
            $('.salat-checkbox').change(function() {
                const container = $(this).closest('div').find('.upload-container');
                if ($(this).is(':checked')) {
                    container.show();
                } else {
                    container.hide();
                    container.find('.upload-status').hide();
                    container.find('.salat-image').val('');
                    container.find('.salat-time').hide().val('');
                }
            });

            $('.salat-image').change(function() {
                const status = $(this).siblings('.upload-status');
                const timeField = $(this).siblings('.salat-time');
                if ($(this).val()) {
                    status.show();
                    const now = new Date();
                    const formattedTime = now.toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    });
                    timeField.val(formattedTime).show();
                } else {
                    status.hide();
                    timeField.hide().val('');
                }
            });
        });
    </script>

    {{-- modal Olahraga --}}
    <div class="modal fade" id="exampleModalOlahraga" tabindex="-1" aria-labelledby="exampleModalOlahragaLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalOlahragaLabel">Data Olahraga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="olahragaForm" action="#" method="">

                        @csrf
                        <div class="mb-3">
                            <label for="waktu_olahraga" class="form-label">Waktu Berolahraga</label>
                            <input type="time" class="form-control" id="waktu_olahraga" name="waktu_olahraga"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_olahraga" class="form-label">Jenis Olahraga</label>
                            <input type="text" class="form-control" id="jenis_olahraga" name="jenis_olahraga"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" form="formBeribadah" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const waktuOlahragaInput = document.getElementById('waktu_olahraga');
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            waktuOlahragaInput.value = `${hours}:${minutes}`;

            const centang = localStorage.getItem('centangOlahraga');
            const lastSubmit = localStorage.getItem('lastSubmitOlahraga');
            const simpanButton = document.getElementById('simpanButton');

            if (centang === 'true' && lastSubmit && new Date().toDateString() === new Date(lastSubmit)
                .toDateString()) {
                document.getElementById('centang').style.display = 'inline';
                simpanButton.disabled = true;
            }

            const resetTime = new Date();
            resetTime.setHours(0, 0, 0, 0);
            if (now >= resetTime) {
                localStorage.removeItem('centangOlahraga');
                localStorage.removeItem('lastSubmitOlahraga');
                simpanButton.disabled = false;
                document.getElementById('centang').style.display = 'none';
            }

            document.getElementById('olahragaForm').addEventListener('submit', function(event) {
                event.preventDefault();
                localStorage.setItem('centangOlahraga', 'true');
                localStorage.setItem('lastSubmitOlahraga', new Date().toISOString());
                document.getElementById('centang').style.display = 'inline';
                simpanButton.disabled = true;
                this.submit();
            });
        });
    </script>

    {{-- modalgemar belajar --}}
    <div class="modal fade" id="exampleModalBelajar" tabindex="-1" aria-labelledby="exampleModalBelajarLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalBelajarLabel">Data Gemar Belajar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="" action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="materi_belajar" class="form-label">Materi yang Dipelajari</label>
                            <input type="text" class="form-control" id="materi_belajar" name="materi_belajar"
                                required>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalMakanLabel">Input Data Makan Sehat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="makan_sehat" class="form-label">Waktu Makan Sehat</label>
                            <input type="text" class="form-control" id="makan_sehat" name="makan" required>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalMasyarakatLabel">Input Data Bermasyarakat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="keterangan_masyarakat" class="form-label">Keterangan Kegiatan</label>
                            <textarea class="form-control" id="keterangan_masyarakat" name="bermasyarakat" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="foto_masyarakat" class="form-label">Upload Foto Kegiatan</label>
                            <input type="file" class="form-control" id="foto_masyarakat" name="foto_masyarakat"
                                accept="image/*" required>
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


    {{-- modalistirahhat --}}
    <div class="modal fade" id="exampleModalIstirahat" tabindex="-1" aria-labelledby="exampleModalIstirahatLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalIstirahatLabel">Input Data Waktu Istirahat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="waktu_istirahat" class="form-label">Waktu Istirahat</label>
                            <input type="text" class="form-control" id="waktu_istirahat" name="waktu_istirahat"
                                value="{{ now()->format('H:i') }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_istirahat" class="form-label">Keterangan Istirahat</label>
                            <textarea class="form-control" id="keterangan_istirahat" name="keterangan_istirahat" rows="3" required></textarea>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModalBeribadah">
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
        </div>
    </div>

    <!-- Panggil file JavaScript -->
    <script src="{{ asset('js/bangun-pagi.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/script.js') }}"></script>


</body>

</html>
