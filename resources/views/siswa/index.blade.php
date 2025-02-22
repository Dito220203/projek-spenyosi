<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Siswa</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 50px;
            background: linear-gradient(to right, #073249, #031c6d);
            color: white;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
        }

        .navbar .logo img {
            margin-right: 10px;
        }

        .navbar .logo span {
            font-weight: bold;
            font-size: 24px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            font-size: 14px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .content {
            text-align: center;
            margin-top: 50px;
        }

        .content h1 {
            font-size: 28px;
        }

        .content p {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" width="120px">
            <span>SPENYOSI</span>
        </div>
        <div>
            <a href="#">Dito febriansyah</a>
            <a href="#">VII B</a>
            <a href="#">Log Out</a>
        </div>
    </div>




    <div class="container-fluid" style="margin-top: 20px;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body" style="min-height: 400px;">
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; ">NO</th>
                                            <th style="text-align: center; ">BANGUN PAGI</th>
                                            <th style="text-align: center;">BERIBADAH</th>
                                            <th style="text-align: center;">BEROLAHRAGA</th>
                                            <th style="text-align: center;">GEMAR BELAJAR</th>
                                            <th style="text-align: center;">MAKAN SEHAT DAN BERGIZI</th>
                                            <th style="text-align: center;">BERMASYARAKAT</th>
                                            <th style="text-align: center;">ISTIRAHAT CUKUP</th>
                                            <th style="text-align: center;">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td style="text-align: center; ">1</td>
                                        <td style="text-align: center; ">07:00</td>
                                        <td style="text-align: center; ">iya</td>
                                        <td style="text-align: center; ">iya</td>
                                        <td style="text-align: center; ">iya</td>
                                        <td style="text-align: center; ">iya</td>
                                        <td style="text-align: center; ">iya</td>
                                        <td style="text-align: center; ">iya</td>
                                        <td style="text-align: center; ">
                                            <button type="button" class="btn btn-primary tombolTambahData"
                                                data-bs-toggle="modal" data-bs-target="#e-exampleModal">
                                                Update
                                            </button>
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="e-exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Form isi modal -->
                                                        <form action="" method="post">
                                                            @csrf
                                                            <div class="form-group">

                                                                <label for="bangunpagi">Bangun Pagi</label>
                                                                <div>
                                                                    <input type="text" class="form-control"
                                                                        id="bangunpagi" name="bangunpagi" readonly
                                                                        required>
                                                                    <label><input type="checkbox" id="ambilJamBangun">
                                                                        Ambil Jam</label>
                                                                </div>

                                                                <script>
                                                                    document.addEventListener("DOMContentLoaded", function() {
                                                                        const checkbox = document.getElementById('ambilJamBangun');
                                                                        const bangunPagiInput = document.getElementById('bangunpagi');

                                                                        checkbox.addEventListener('change', function() {
                                                                            if (this.checked) {
                                                                                const now = new Date();
                                                                                const formattedTime = now.toLocaleTimeString('id-ID', {
                                                                                    hour: '2-digit',
                                                                                    minute: '2-digit',
                                                                                    second: '2-digit'
                                                                                });
                                                                                bangunPagiInput.value = formattedTime;
                                                                            } else {
                                                                                bangunPagiInput.value = '';
                                                                            }
                                                                        });
                                                                    });
                                                                </script>



                                                                <label>Beribadah</label>
                                                                <div>
                                                                    <label><input type="checkbox" class="salat-checkbox"
                                                                            value="subuh"> Subuh</label>
                                                                    <div class="upload-container"
                                                                        style="display:none;">
                                                                        <input type="file" class="salat-image"
                                                                            accept="image/*">
                                                                        <span class="upload-status"
                                                                            style="display:none; color:green; font-weight:bold;">✔️
                                                                            Upload berhasil</span>
                                                                        <input type="text" class="salat-time"
                                                                            readonly
                                                                            style="display:none; margin-top:5px;">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label><input type="checkbox"
                                                                            class="salat-checkbox" value="dzuhur">
                                                                        Dzuhur</label>
                                                                    <div class="upload-container"
                                                                        style="display:none;">
                                                                        <input type="file" class="salat-image"
                                                                            accept="image/*">
                                                                        <span class="upload-status"
                                                                            style="display:none; color:green; font-weight:bold;">✔️
                                                                            Upload berhasil</span>
                                                                        <input type="text" class="salat-time"
                                                                            readonly
                                                                            style="display:none; margin-top:5px;">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label><input type="checkbox"
                                                                            class="salat-checkbox" value="ashar">
                                                                        Ashar</label>
                                                                    <div class="upload-container"
                                                                        style="display:none;">
                                                                        <input type="file" class="salat-image"
                                                                            accept="image/*">
                                                                        <span class="upload-status"
                                                                            style="display:none; color:green; font-weight:bold;">✔️
                                                                            Upload berhasil</span>
                                                                        <input type="text" class="salat-time"
                                                                            readonly
                                                                            style="display:none; margin-top:5px;">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label><input type="checkbox"
                                                                            class="salat-checkbox" value="maghrib">
                                                                        Maghrib</label>
                                                                    <div class="upload-container"
                                                                        style="display:none;">
                                                                        <input type="file" class="salat-image"
                                                                            accept="image/*">
                                                                        <span class="upload-status"
                                                                            style="display:none; color:green; font-weight:bold;">✔️
                                                                            Upload berhasil</span>
                                                                        <input type="text" class="salat-time"
                                                                            readonly
                                                                            style="display:none; margin-top:5px;">
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label><input type="checkbox"
                                                                            class="salat-checkbox" value="isya">
                                                                        Isya</label>
                                                                    <div class="upload-container"
                                                                        style="display:none;">
                                                                        <input type="file" class="salat-image"
                                                                            accept="image/*">
                                                                        <span class="upload-status"
                                                                            style="display:none; color:green; font-weight:bold;">✔️
                                                                            Upload berhasil</span>
                                                                        <input type="text" class="salat-time"
                                                                            readonly
                                                                            style="display:none; margin-top:5px;">
                                                                    </div>
                                                                </div>

                                                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

                                                                {{-- olahraga --}}
                                                                <label for="berolahraga">Berolahraga</label>
                                                                <div
                                                                    style="display: flex; align-items: center; gap: 10px;">
                                                                    <div style="flex: 1;">
                                                                        <label
                                                                            for="keteranganOlahraga">Keterangan:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="keteranganOlahraga"
                                                                            name="keteranganOlahraga"
                                                                            placeholder="Isi keterangan">
                                                                    </div>
                                                                    <div>
                                                                        <label for="uploadOlahraga">Upload
                                                                            Bukti:</label>
                                                                        <input type="file" id="uploadOlahraga"
                                                                            accept="image/*">
                                                                        <span id="statusOlahraga"
                                                                            style="display:none; color:green; font-weight:bold;">✔️
                                                                            Upload berhasil</span>
                                                                    </div>
                                                                </div>

                                                                <script>
                                                                    document.addEventListener("DOMContentLoaded", function() {
                                                                        const checkbox = document.getElementById('ambilJamBangun');
                                                                        const bangunPagiInput = document.getElementById('bangunpagi');

                                                                        checkbox.addEventListener('change', function() {
                                                                            if (this.checked) {
                                                                                const now = new Date();
                                                                                const formattedTime = now.toLocaleTimeString('id-ID', {
                                                                                    hour: '2-digit',
                                                                                    minute: '2-digit',
                                                                                    second: '2-digit'
                                                                                });
                                                                                bangunPagiInput.value = formattedTime;
                                                                            } else {
                                                                                bangunPagiInput.value = '';
                                                                            }
                                                                        });

                                                                        const uploadOlahraga = document.getElementById('uploadOlahraga');
                                                                        const statusOlahraga = document.getElementById('statusOlahraga');

                                                                        uploadOlahraga.addEventListener('change', function() {
                                                                            if (this.files.length > 0) {
                                                                                statusOlahraga.style.display = 'inline';
                                                                            } else {
                                                                                statusOlahraga.style.display = 'none';
                                                                            }
                                                                        });
                                                                    });
                                                                </script>


                                                                <label for="makansehatbergizi">Makan Sehat
                                                                    Bergizi</label>
                                                                <input type="text" class="form-control"
                                                                    id="makansehatbergizi" name="makansehatbergizi"
                                                                    autofocus required>
                                                                <label for="bermasyarakat">bermasyarakat</label>
                                                                <input type="text" class="form-control"
                                                                    id="bermasyarakat" name="bermasyarakat" autofocus
                                                                    required>
                                                                <label for="istirahat">Istirahat Cukup</label>
                                                                <input type="text" class="form-control"
                                                                    id="istirahat" name="istirahat" autofocus
                                                                    required>

                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>


    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    {{-- <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
