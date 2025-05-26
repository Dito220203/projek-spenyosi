@extends('components.layout')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                const query = $(this).val();

                $.ajax({
                    url: "{{ route('siswa.search') }}",
                    type: "GET",
                    data: {
                        q: query
                    },
                    success: function(res) {
                        $('#siswaTableBody').html(res.html);
                    }
                });
            });
        });
    </script>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">

                <div class="row mb-2">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">📋 Data Siswa</h2>

                        <div>
                            <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data"
                                class="mb-2">
                                @csrf
                                <div class="input-group">
                                    <input type="file" name="file" class="form-control" required>
                                    <button class="btn btn-success" type="submit">📥 Import Excel</button>
                                </div>
                            </form>

                            <button class="btn btn-success" data-toggle="modal" data-target="#tambahModal">➕ Tambah
                                Siswa</button>
                        </div>
                    </div>
                </div>
                {{-- search --}}
                <form action="Datasiswa" method="GET" class="mb-3 d-flex">
                    <input type="text" name="search" class="form-control me-2"
                        placeholder="Cari nama / NIS / kelas / agama" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                <div class="card shadow">
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Agama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswaList as $index => $siswa)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $siswa->nis }}</td>
                                        <td>{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->kelas }}</td>
                                        <td>{{ $siswa->agama }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $siswa->id }}"
                                                data-nis="{{ $siswa->nis }}" data-nama="{{ $siswa->nama }}"
                                                data-kelas="{{ $siswa->kelas }}" data-agama="{{ $siswa->agama }}"
                                                data-toggle="modal" data-target="#editModal">
                                                ✏️ Update
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Tidak ada data siswa.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Optional: Pagination --}}
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="text-muted">
                                Menampilkan {{ $siswaList->firstItem() }} sampai {{ $siswaList->lastItem() }} dari total
                                {{ $siswaList->total() }} data
                            </div>
                            <div>
                                {{ $siswaList->links('pagination::bootstrap-4') }}
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal Tambah Siswa -->
                <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" action="{{ route('siswa.store') }}">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">➕ Tambah Siswa Baru</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input type="text" class="form-control" name="nis" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input type="text" class="form-control" name="kelas" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Agama</label>
                                        <input type="text" class="form-control" name="agama" required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- Modal Edit Siswa -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" action="" id="editForm">
                            @csrf
                            @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">✏️ Edit Data Siswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <input type="hidden" id="siswa_id" name="id">

                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input type="text" class="form-control" name="nis" id="nis"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input type="text" class="form-control" name="kelas" id="kelas"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <label>Agama</label>
                                        <input type="text" class="form-control" name="agama" id="agama"
                                            required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const editButtons = document.querySelectorAll('.edit-btn');
                        const editForm = document.getElementById('editForm');

                        editButtons.forEach(button => {
                            button.addEventListener('click', () => {
                                const id = button.getAttribute('data-id');
                                const nis = button.getAttribute('data-nis');
                                const nama = button.getAttribute('data-nama');
                                const kelas = button.getAttribute('data-kelas');
                                const agama = button.getAttribute('data-agama');

                                editForm.action = "{{ url('/Datasiswa') }}/" + id;
                                document.getElementById('nis').value = nis;
                                document.getElementById('nama').value = nama;
                                document.getElementById('kelas').value = kelas;
                                document.getElementById('agama').value = agama;
                            });
                        });
                    });
                </script>


            </div>
        </div>
    </div>
@endsection
