@extends('layout.app')

@section('title', 'Data Alternatif')

<!-- Menambahkan gaya CSS -->
<style>
    .mt-6 {
        margin-top: 1.5rem; /* Sesuaikan nilai margin-top sesuai kebutuhan */
        margin-right: 1.5rem;
    }

    .table-container {
        margin-top: 0.5rem; /* Sesuaikan nilai margin-top sesuai kebutuhan */
        margin-left: 3.0rem;
    }
</style>

<div class="container mt-6">
<div class="row">
        <div class="col-md-12 text-center">
            <h1 style="font-size: 30px;">Data Alternatif</h1>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 text-right">
            <a class="btn btn-success" href="{{ route('alternatif.create') }}">Tambah Data +</a>
        </div>
    </div>

    <!-- Menambahkan kelas untuk container tabel -->
    <div class="table-container">
        <table class="table table-bordered mx-auto">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Alternatif</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alternatif as $index => $baris)
                    <tr class="{{ $index % 2 == 0 ? 'table-success' : 'table-light' }}">
                        <td>{{ $baris['id'] }}</td>
                        <td>{{ $baris['nama_alternatif'] }}</td>
                        <td>
                            <a href="{{ route('alternatif.edit', $baris['id']) }}" class="btn btn-warning text-white">Edit</a>
                            <form action="{{ route('alternatif.destroy', $baris['id']) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>

<script>
    function hapusData(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data?")) {
            alert("Data dengan ID " + id + " berhasil dihapus.");
        }
    }
</script>
