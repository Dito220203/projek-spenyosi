@extends("components.layout")
@section("content")
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <h4 class="mb-4">Halo Selamat Datang Admin Di Sini Anda Bisa Mengetahui Data 7 Kebiasaan per Kelas</h4>
            <div class="row">
                @foreach ($dataPerKelas as $index => $data)
                    <div class="col-md-4">
                        <div class="card bg-light shadow mb-4">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">Kelas {{ $data['kelas'] }}</h5>
                                <p>Total Siswa: {{ $data['jumlah_siswa'] }}</p>
                                <p>Sudah Isi: {{ $data['sudah_isi'] }}</p>

                                <div class="progress mb-2">
                                    <div class="progress-bar
                                        @if($data['persen'] == 0)
                                            bg-secondary
                                        @elseif($data['persen'] < 50)
                                            bg-warning
                                        @else
                                            bg-success
                                        @endif
                                    " role="progressbar" style="width: {{ $data['persen'] }}%" aria-valuenow="{{ $data['persen'] }}" aria-valuemin="0" aria-valuemax="100">
                                        {{ $data['persen'] }}%
                                    </div>
                                </div>

                                @if($data['persen'] == 0)
                                    <p class="text-danger">Belum ada yang mengisi</p>
                                @else
                                    <button class="btn btn-sm btn-info mb-2" onclick="toggleDetail({{ $index }})">
                                        Lihat Detail
                                    </button>
                                    <div id="detail-{{ $index }}" style="display: none;">
                                        <h6>Daftar Siswa:</h6>
                                        <ul class="pl-3">
                                            @foreach ($data['siswa'] as $nama)
                                                <li>{{ $nama }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

{{-- JavaScript toggle --}}
<script>
    function toggleDetail(index) {
        const detailDiv = document.getElementById('detail-' + index);
        detailDiv.style.display = detailDiv.style.display === 'none' ? 'block' : 'none';
    }
</script>
@endsection
