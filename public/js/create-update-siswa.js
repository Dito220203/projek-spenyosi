 // Fungsi validasi kelas
                    function validateKelas(inputId = 'inputKelas', feedbackId = 'kelasFeedback') {
                        const kelas = document.getElementById(inputId);
                        const feedback = document.getElementById(feedbackId);
                        const pattern = /^[A-Z]+$/;

                        if (!pattern.test(kelas.value)) {
                            feedback.classList.remove('d-none');
                        } else {
                            feedback.classList.add('d-none');
                        }
                    }

                    // Tambah & Edit: Validasi saat input berubah
                    document.addEventListener('input', function(e) {
                        if (e.target && e.target.classList.contains('kelas-input')) {
                            validateKelas(e.target.id, e.target.dataset.feedbackId);
                        }
                    });

                    // Tambah & Edit: Validasi saat form disubmit
                    document.addEventListener('submit', function(e) {
                        if (e.target && e.target.classList.contains('kelas-form')) {
                            const input = e.target.querySelector('.kelas-input');
                            const pattern = /^[A-Z]+$/;
                            const feedback = document.getElementById(input.dataset.feedbackId);

                            if (!pattern.test(input.value)) {
                                feedback.classList.remove('d-none');
                                input.focus();
                                e.preventDefault();
                            }
                        }
                    });

                    // Logika isi form edit siswa
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

                                editForm.action = `/Datasiswa/${id}`;
                                document.getElementById('nis').value = nis;
                                document.getElementById('nama').value = nama;
                                document.getElementById('inputKelasEdit').value = kelas;
                                document.getElementById('agama').value = agama;
                            });
                        });
                    });
