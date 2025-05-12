<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekap VII A - {{ $tanggal }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Rekap Harian Kegiatan - Kelas VII A</h2>
    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($tanggal)->format('d F Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Bangun Pagi</th>
                <th>Beribadah</th>
                <th>Olahraga</th>
                <th>Belajar</th>
                <th>Makan</th>
                <th>Masyarakat</th>
                <th>Istirahat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswaList as $i => $siswa)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $siswa['nama'] }}</td>
                    <td>{{ $siswa['bangun_pagi'] ? '✔️' : '❌' }}</td>
                    <td>{{ $siswa['beribadah'] ? '✔️' : '❌' }}</td>
                    <td>{{ $siswa['olahraga'] ? '✔️' : '❌' }}</td>
                    <td>{{ $siswa['belajar'] ? '✔️' : '❌' }}</td>
                    <td>{{ $siswa['makan'] ? '✔️' : '❌' }}</td>
                    <td>{{ $siswa['masyarakat'] ? '✔️' : '❌' }}</td>
                    <td>{{ $siswa['istirahat'] ? '✔️' : '❌' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
