@extends('layout.app')

@section('title', 'Data Penilaian')

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
            <h1 style="font-size: 30px;">Data Penilaian</h1>
        </div>
    </div>

    <!-- Menambahkan kelas untuk container tabel -->
    <div class="table-container">
        <table class="table table-bordered mx-auto">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>No</th>
                    <th>Nama Alternatif</th>
                    <!-- Menambahkan kolom untuk setiap nama kriteria -->
                    @foreach($kriteria as $k)
                        <th>{{ $k->nama_kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($alternatif as $index => $a)
                    <tr class="{{ $index % 2 == 0 ? 'table-success' : 'table-light' }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $a->nama_alternatif }}</td>
                        
                        <!-- Debugging output for id_kriteria = 1 (Pendidikan) -->
                        <td>{{ isset($nilai[$a->id][1]) ? $nilai[$a->id][0]->nilai : 'Data not found' }}</td>
                        
                        <!-- Display values for each kriteria -->
                        @foreach($kriteria as $k)
                            @if(isset($nilai[$a->id][$k->id]))
                                <td>{{ $nilai[$a->id][$k->id]->nilai }}</td>
                            @else
                                <td></td>
                            @endif
                        @endforeach
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
