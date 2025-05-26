@extends('components.layout')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1>{{$kelas}}</h1>
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <div>

                                    </div>
                                    <div>
                                        <a href="{{ route('admin.export', ['kelas' => $kelas]) }}" class="btn btn-success">📤
                                            Export Excel</a>



                                    </div>
                                </div>

                                <form method="GET" action="{{ url()->current() }}" class="form-inline mb-3">
                                    <label class="mr-2">Tanggal:</label>
                                    {{-- <select name="tanggal" class="form-control mr-2">
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}"
                                                {{ request('tanggal') == $i ? 'selected' : '' }}>{{ $i }}
                                            </option>
                                        @endfor
                                    </select> --}}

                                    <label class="mr-2">Bulan:</label>
                                    <select name="bulan" class="form-control mr-2">
                                        @for ($i = 1; $i <= 12; $i++)
                                            @php
                                                $bulanValue = str_pad($i, 2, '0', STR_PAD_LEFT);
                                            @endphp
                                            <option value="{{ $bulanValue }}"
                                                {{ request('bulan') == $bulanValue ? 'selected' : '' }}>
                                                {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                            </option>
                                        @endfor

                                    </select>

                                    <label class="mr-2">Tahun:</label>
                                    {{-- <select name="tahun" class="form-control mr-2">
                                        @for ($i = date('Y'); $i >= 2020; $i--)
                                            <option value="{{ $i }}"
                                                {{ request('tahun') == $i ? 'selected' : '' }}>{{ $i }}
                                            </option>
                                        @endfor
                                    </select> --}}

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
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @forelse ($rekapAbsensi as $absen)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $absen->siswa->nama }}</td>
                                                <td>{{ $absen->id_bangun_pagi != null ? '✔️' : '❌' }}</td>
                                                <td>{{ $absen->id_beribadah != null ? '✔️' : '❌' }}</td>
                                                <td>{{ $absen->id_olahraga != null ? '✔️' : '❌' }}</td>
                                                <td>{{ $absen->id_belajar != null ? '✔️' : '❌' }}</td>
                                                <td>{{ $absen->id_makan != null ? '✔️' : '❌' }}</td>
                                                <td>{{ $absen->id_masyarakat != null ? '✔️' : '❌' }}</td>
                                                <td>{{ $absen->id_istirahat != null ? '✔️' : '❌' }}</td>
                                                <td class="text-nowrap">{{ $absen->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm btn-detail"
                                                        data-nama="{{ $absen->siswa->nama }}"
                                                          data-agama="{{ $absen->siswa->agama }}"
                                                        data-bangun="{{ $absen->bangunpagi->waktu ?? '-' }}"
                                                        data-ibadah="{{ $absen->beribadah->keterangan ?? '-' }}"
                                                        data-subuh="{{ $absen->beribadah->subuh ?? '-' }}"
                                                        data-duhur="{{ $absen->beribadah->duhur ?? '-' }}"
                                                        data-asar="{{ $absen->beribadah->asar ?? '-' }}"
                                                        data-magrib="{{ $absen->beribadah->magrib ?? '-' }}"
                                                        data-isyak="{{ $absen->beribadah->isyak ?? '-' }}"
                                                        data-ibadah-foto="{{ asset('storage/' . ($absen->beribadah->image ?? 'default.jpg')) }}"
                                                        data-olahraga="{{ $absen->olahraga->ket_olahraga ?? '-' }}"
                                                        data-olahraga-foto="{{ asset('storage/' . ($absen->olahraga->image ?? 'default.jpg')) }}"
                                                        data-belajar="{{ $absen->belajar->ket_belajar ?? '-' }}"
                                                        data-belajar-foto="{{ asset('storage/' . ($absen->belajar->image ?? 'default.jpg')) }}"
                                                        data-makan="{{ $absen->makan ? implode(', ', array_filter([$absen->makan->karbohidrat, $absen->makan->protein, $absen->makan->serat, $absen->makan->minum])) : '-' }}"
                                                        data-makan-foto="{{ asset('storage/' . ($absen->makan->image ?? 'default.jpg')) }}"
                                                        data-masyarakat="{{ $absen->masyarakat->keterangan ?? '-' }}"
                                                        data-masyarakat-foto="{{ asset('storage/' . ($absen->masyarakat->image ?? 'default.jpg')) }}"
                                                        data-istirahat="{{ $absen->istirahat->waktu ?? '-' }}">
                                                        Detail
                                                    </a>
                                                </td>
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        document.querySelectorAll(".btn-detail").forEach(function(btn) {
                                                            btn.addEventListener("click", function(e) {
                                                                e.preventDefault();

                                                                const nama = this.dataset.nama;
                                                                const agama = this.dataset.agama;

                                                                const detailHTML = `
                                                                ${createDetailCard("Bangun Pagi", this.dataset.bangun)}
                                                                ${createDetailCard("Beribadah (Umum)", formatIbadah(this))}
                                                                ${createDetailCard("Berolahraga", this.dataset.olahraga, this.dataset.olahragaFoto)}
                                                                ${createDetailCard("Gemar Belajar", this.dataset.belajar, this.dataset.belajarFoto)}
                                                                ${createDetailCard("Makan Sehat & Bergizi", this.dataset.makan, this.dataset.makanFoto)}
                                                                ${createDetailCard("Bermasyarakat", this.dataset.masyarakat, this.dataset.masyarakatFoto)}
                                                                ${createDetailCard("Istirahat Cukup", this.dataset.istirahat)}
                                                            `;

                                                                document.getElementById("detailNamaSiswa").innerText = `Nama: ${nama} | Agama: ${agama}`;
                                                                document.getElementById("detailIsiKebiasaan").innerHTML = detailHTML;

                                                                const modal = new bootstrap.Modal(document.getElementById(
                                                                    'modalDetailKebiasaan'));
                                                                modal.show();
                                                            });
                                                        });

                                                        function createDetailCard(judul, keterangan, fotoUrl = null) {
                                                            const foto = fotoUrl ?
                                                                `<img src="${fotoUrl}" class="img-fluid rounded mt-2" style="max-height: 200px;">` : '';
                                                            return `
                                                                <div class="col-md-6 mb-3">
                                                                    <div class="card shadow-sm p-3">
                                                                        <h6>${judul}</h6>
                                                                        <p>${keterangan}</p>
                                                                        ${foto}
                                                                    </div>
                                                                </div>
                                                            `;
                                                        }

                                                        function formatIbadah(data) {
                                                            return `
                                                            Keterangan: ${data.dataset.ibadah}<br>
                                                            Subuh: ${data.dataset.subuh}<br>
                                                            Duhur: ${data.dataset.duhur}<br>
                                                            Asar: ${data.dataset.asar}<br>
                                                            Magrib: ${data.dataset.magrib}<br>
                                                            Isyak: ${data.dataset.isyak}
                                                        `;
                                                        }
                                                    });
                                                </script>


                                            </tr>
                                        @empty
                                            <td class="text-center" colspan="11">Tidak ada data</td>
                                        @endforelse
                                    </tbody>
                                </table>

                                <!-- Modal -->
                                <div class="modal fade" id="modalDetailKebiasaan" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Detail Kebiasaan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 id="detailNamaSiswa" class="mb-3"></h6>
                                                <div class="row" id="detailIsiKebiasaan"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
