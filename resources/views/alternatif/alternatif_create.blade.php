@extends('layout.app')

@section('title', 'Data Alternatif')


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mx-auto"> <!-- Menggunakan mx-auto untuk tengah secara horizontal -->
                <h1 class="text-center mb-4">Tambah Data Alternatif</h1>
                <form method="POST" action="{{ route('alternatif.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="nama_alternatif" class="col-sm-2 col-form-label">Nama Alternatif</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_alternatif" name="nama_alternatif" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <div class="mt-4 text-center"> <!-- Pusatkan alert secara horizontal -->
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                Data berhasil ditambahkan!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script>
        // Menangani alert ketika form disubmit
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function() {
                document.getElementById('success-alert').style.display = 'block';
            });
        });
    </script>

