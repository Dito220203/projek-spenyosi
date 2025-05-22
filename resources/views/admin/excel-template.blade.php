
    <table>
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
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($rekapAbsensi as $absen)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $absen->siswa->nama }}</td>
                    <td>{{ $absen->id_bangun_pagi ? '✔️' : '❌' }}</td>
                    <td>{{ $absen->id_beribadah ? '✔️' : '❌' }}</td>
                    <td>{{ $absen->id_olahraga ? '✔️' : '❌' }}</td>
                    <td>{{ $absen->id_belajar ? '✔️' : '❌' }}</td>
                    <td>{{ $absen->id_makan ? '✔️' : '❌' }}</td>
                    <td>{{ $absen->id_masyarakat ? '✔️' : '❌' }}</td>
                    <td>{{ $absen->id_istirahat ? '✔️' : '❌' }}</td>
                    <td>{{ \Carbon\Carbon::parse($absen->created_at)->format('d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

