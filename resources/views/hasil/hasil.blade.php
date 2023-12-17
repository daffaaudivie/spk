@extends('layout.app')

@section('title', 'Hasil Perhitungan MOORA')

<!-- Menambahkan gaya CSS -->
<style>
    .mt-6 {
        margin-top: 1.5rem;
        margin-right: 1.5rem;
    }

    .table-container {
        margin-top: 0.5rem;
        margin-left: 3.0rem;
    }

    .even-row {
        background-color: #ffffff; /* Put your desired even row color */
    }

    .odd-row {
        background-color: #e6f7e6; /* Put your desired odd row color */
    }
</style>

<!DOCTYPE html>
<html lang="en">

<div class="container mt-6">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1>Hasil Perhitungan MOORA</h1>
        </div>
    </div>

<body>
    <!-- Tabel untuk menampilkan nilai normalisasi -->
    <table class="table table-bordered">
        <div class="container mt-6">
            <div class="row">
                <div class="col-md-12 text-left">
                    <h1 style="font-size: 20px;">Langkah 1 : Normalisasi</h1>
                </div>
            </div>
            <thead>
                <tr>
                    <th>Alternatif</th>
                    @foreach ($kriteriaData as $kriteria)
                        <th>{{ $kriteria->nama_kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($mooraValues as $alternatifId => $nilaiKinerja)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'even-row' : 'odd-row' }}">
                        <td>{{ $alternatif->where('id', $alternatifId)->first()->nama_alternatif }}</td>
                        @foreach ($kriteriaData as $kriteria)
                            <td>{{ $nilaiKinerja[$kriteria->id]['normalized'] }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Continue the same process for other tables -->

        <div style="margin-top: 20px;"></div>

        <!-- Tabel untuk menampilkan hasil nilai akhir yang telah dioptimalkan dengan bobot -->
        <table class="table table-bordered">
            <div class="row">
                <div class="col-md-12 text-left">
                    <h1 style="font-size: 20px;">Langkah 2 : Menghitung Nilai Optimasi</h1>
                </div>
            </div>
            <thead>
                <tr>
                    <th>Alternatif</th>
                    @foreach ($kriteriaData as $kriteria)
                        <th>{{ $kriteria->nama_kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($mooraValues as $alternatifId => $nilaiKinerja)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'even-row' : 'odd-row' }}">
                        <td>{{ $alternatif->where('id', $alternatifId)->first()->nama_alternatif }}</td>
                        @foreach ($kriteriaData as $kriteria)
                            <td>{{ $nilaiKinerja[$kriteria->id]['normalized'] * $kriteria->bobot }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

<!-- Tabel baru untuk menampilkan hasil nilai akhir yang telah dioptimalkan -->
<div style="margin-top: 20px;"></div>
<table class="table table-bordered">
    <div class="row">
        <div class="col-md-12 text-left">
            <h1 style="font-size: 20px;">Langkah 3 : Mencari Nilai Akhir</h1>
        </div>
    </div>
    <thead>
        <tr>
            <th>Alternatif</th>
            <th>Total Benefit</th>
            <th>Total Cost</th>
            <th>Nilai Akhir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mooraValues as $alternatifId => $nilaiKinerja)
            <tr class="{{ $loop->iteration % 2 == 0 ? 'even-row' : 'odd-row' }}">
                <td>{{ $alternatif->where('id', $alternatifId)->first()->nama_alternatif }}</td>
                <?php
                    $totalBenefit = 0;
                    $totalCost = 0;
                ?>
                @foreach ($kriteriaData as $kriteria)
                    @if ($kriteria->tipe == 'Cost')
                        <?php
                            $totalCost += $nilaiKinerja[$kriteria->id]['normalized'] * $kriteria->bobot;
                        ?>
                    @else
                        <?php
                            $totalBenefit += $nilaiKinerja[$kriteria->id]['normalized'] * $kriteria->bobot;
                        ?>
                    @endif
                @endforeach
                <td>{{ $totalBenefit }}</td>
                <td>{{ $totalCost }}</td>
                <td>{{ $totalBenefit - $totalCost }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


    </body>

    </body>

</html> 