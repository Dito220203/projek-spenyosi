@extends("components.layout")
@section("content")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Rekap Kebiasaan Siswa</h3>
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <div>
                                        <a href="" class="btn btn-success">Export Excel</a>
                                        <a href="" class="btn btn-danger">Export PDF</a>
                                    </div>
                                <form method="GET" action="{{ route('rekap.index') }}" class="row g-3 mb-4">
                                    <div class="col-md-3">
                                        <label>Kelas</label>
                                        <select name="kelas" class="form-control">
                                            <option value="">Semua Kelas</option>
                                            @foreach($kelasList as $kelas)
                                                <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>
                                                    {{ $kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Bulan</label>
                                        <select name="bulan" class="form-control">
                                            @foreach(range(1,12) as $bulan)
                                                <option value="{{ $bulan }}" {{ request('bulan') == $bulan ? 'selected' : '' }}>
                                                    {{ \Carbon\Carbon::create()->month($bulan)->translatedFormat('F') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Tahun</label>
                                        <select name="tahun" class="form-control">
                                            @for ($tahun = date('Y'); $tahun >= 2023; $tahun--)
                                                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                                    {{ $tahun }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-2 align-self-end">
                                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                                    </div>
                                </form>
                            </div> <!-- end card-header -->

                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div style="overflow-x: auto;">
                                            <table class="table table-bordered text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Kelas</th>
                                                        <th>Tanggal</th>
                                                        <th>Bangun Pagi</th>
                                                        <th>Beribadah</th>
                                                        <th>Olahraga</th>
                                                        <th>Belajar</th>
                                                        <th>Makan</th>
                                                        <th>Bermasyarakat</th>
                                                        <th>Istirahat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($rekap as $data)
                                                        <tr>
                                                            <td>{{ $data['nama'] }}</td>
                                                            <td>{{ $data['kelas'] }}</td>
                                                            <td>{{ $data['tanggal'] }}</td>
                                                            <td>{{ $data['bangun_pagi'] ? '✅' : '❌' }}</td>
                                                            <td>{{ $data['beribadah'] ? '✅' : '❌' }}</td>
                                                            <td>{{ $data['olahraga'] ? '✅' : '❌' }}</td>
                                                            <td>{{ $data['belajar'] ? '✅' : '❌' }}</td>
                                                            <td>{{ $data['makan'] ? '✅' : '❌' }}</td>
                                                            <td>{{ $data['masyarakat'] ? '✅' : '❌' }}</td>
                                                            <td>{{ $data['istirahat'] ? '✅' : '❌' }}</td>
                                                        </tr>
                                                    @empty
                                                        <tr><td colspan="10" class="text-center">Tidak ada data.</td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


            </div> <!-- end container-fluid -->
        </div> <!-- end content-header -->
    </div> <!-- end content-wrapper -->
</div> <!-- end container -->
@endsection
