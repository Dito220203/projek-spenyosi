@extends("components.layout")
@section("content")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>VII E</h1>
                            <div class="mb-3 d-flex justify-content-between align-items-center">
    <div>
        {{-- <a href="{{ route('recap.today') }}" class="btn btn-success mr-2">📅 Rekap Hari Ini</a> --}}
        {{-- <a href="{{ route('recap.month') }}" class="btn btn-warning mr-2">🗓️ Rekap Bulan Ini</a> --}}
    </div>
    <div>
        <a href="{{ route('export.pdf', request()->all()) }}" class="btn btn-danger">🖨️ Cetak PDF</a>
    </div>
</div>

                            <form method="GET" action="{{ url()->current() }}" class="form-inline mb-3">
                                <label class="mr-2">Tanggal:</label>
                                <select name="tanggal" class="form-control mr-2">
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}" {{ request('tanggal') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>

                                <label class="mr-2">Bulan:</label>
                                <select name="bulan" class="form-control mr-2">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
                                            {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                        </option>
                                    @endfor
                                </select>

                                <label class="mr-2">Tahun:</label>
                                <select name="tahun" class="form-control mr-2">
                                    @for ($i = date('Y'); $i >= 2020; $i--)
                                        <option value="{{ $i }}" {{ request('tahun') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>

                                <button type="submit" class="btn btn-primary">Filter</button>
                            </form>
                        </div>

                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Bangun Pagi</th>
                                        <th>Beribadah</th>
                                        <th>Berolahraga</th>
                                        <th>Gemar Belajar</th>
                                        <th>Makan Sehat & Bergizi</th>
                                        <th>Bermasyarakat</th>
                                        <th>Istirahat Cukup</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswaList as $index => $siswa)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $siswa['nama'] }}</td>
                                        <td>{{ $siswa['bangun_pagi'] ? '✔️' : '❌' }}</td>
                                        <td>{{ $siswa['beribadah'] ? '✔️' : '❌' }}</td>
                                        <td>{{ $siswa['olahraga'] ? '✔️' : '❌' }}</td>
                                        <td>{{ $siswa['belajar'] ? '✔️' : '❌' }}</td>
                                        <td>{{ $siswa['makan'] ? '✔️' : '❌' }}</td>
                                        <td>{{ $siswa['masyarakat'] ? '✔️' : '❌' }}</td>
                                        <td>{{ $siswa['istirahat'] ? '✔️' : '❌' }}</td>
                                        <td>
                                            <!-- Tambah tombol aksi jika perlu -->
                                            <a href="#" class="btn btn-info btn-sm">Detail</a>
                                        </td>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function () {
                                                document.querySelectorAll('.btn-info').forEach(function (button) {
                                                    button.addEventListener('click', function (e) {
                                                        e.preventDefault();
                                                        const row = this.closest('tr');
                                                        const data = {
                                                            nama: row.children[1].innerText,
                                                            bangun: row.children[2].innerText,
                                                            ibadah: row.children[3].innerText,
                                                            olahraga: row.children[4].innerText,
                                                            belajar: row.children[5].innerText,
                                                            makan: row.children[6].innerText,
                                                            masyarakat: row.children[7].innerText,
                                                            istirahat: row.children[8].innerText,
                                                        };

                                                        Swal.fire({
                                                            title: `<strong>Detail Siswa</strong>`,
                                                            html: `
                                                                <b>Nama:</b> ${data.nama}<br>
                                                                <b>Bangun Pagi:</b> ${data.bangun}<br>
                                                                <b>Beribadah:</b> ${data.ibadah}<br>
                                                                <b>Berolahraga:</b> ${data.olahraga}<br>
                                                                <b>Gemar Belajar:</b> ${data.belajar}<br>
                                                                <b>Makan Sehat & Bergizi:</b> ${data.makan}<br>
                                                                <b>Bermasyarakat:</b> ${data.masyarakat}<br>
                                                                <b>Istirahat Cukup:</b> ${data.istirahat}
                                                            `,
                                                            icon: 'info'
                                                        });
                                                    });
                                                });
                                            });
                                        </script>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($siswaList->isEmpty())
                                <p class="text-center">Tidak ada data untuk tanggal ini.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
