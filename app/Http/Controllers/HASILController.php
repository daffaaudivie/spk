<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class HASILController extends Controller
{
    public function calculateMooraValues()
    {
        // Ambil data kriteria
        $kriteriaData = Kriteria::all();

        // Ambil data nilai dari tabel nilai
        $nilaiData = Nilai::all();

        $alternatif = Alternatif::all();

        // Ubah data nilai ke dalam bentuk yang lebih mudah digunakan
        $alternatifValues = $this->prepareAlternatifValues($nilaiData);

        // Hitung nilai akhir menggunakan metode MOORA
        $mooraValues = $this->calculateMooraValue($kriteriaData, $alternatifValues);

        // Kembalikan hasil sebagai variabel ke blade
        $sortedMooraValues = collect($mooraValues)
            ->sortByDesc('nilai_akhir_optimalkan')
            ->values()
            ->all();

        return view('hasil.hasil', compact('mooraValues', 'sortedMooraValues', 'kriteriaData', 'alternatif'));
    }

    private function prepareAlternatifValues($nilaiData)
    {
        $alternatifValues = [];

        foreach ($nilaiData as $nilai) {
            $alternatifId = $nilai->id_alternatif;
            $kriteriaId = $nilai->id_kriteria;
            $nilaiKinerja = $nilai->nilai;

            $alternatifValues[$alternatifId][$kriteriaId] = $nilaiKinerja;
        }

        return $alternatifValues;
    }

    private function calculateMooraValue($kriteriaData, $alternatifValues)
    {
        $mooraValues = [];

        foreach ($alternatifValues as $alternatifId => $nilaiKinerja) {
            $mooraValue = 0;

            foreach ($kriteriaData as $kriteria) {
                $kriteriaId = $kriteria->id;
                $nilaiKinerjaAlternatif = $nilaiKinerja[$kriteriaId] ?? 0;

                $nilaiKriteria = ($kriteria->tipe == 'cost') ? 1 / $nilaiKinerjaAlternatif : $nilaiKinerjaAlternatif;

                $sumSquaredValues = array_sum(array_map(function ($value) {
                    return pow($value, 2);
                }, array_column($alternatifValues, $kriteriaId)));

                $normalizedValue = ($nilaiKriteria != 0) ? $nilaiKriteria / sqrt($sumSquaredValues) : 0;

                $mooraValues[$alternatifId][$kriteriaId]['normalized'] = $normalizedValue;
                $mooraValue += $normalizedValue * $kriteria->bobot;
            }

            $mooraValues[$alternatifId]['nilai_akhir'] = $mooraValue;
            $mooraValues[$alternatifId]['nilai_akhir_optimalkan'] = $mooraValue;
        }

        foreach ($mooraValues as &$nilaiKinerja) {
            $benefitValues = 0;
            $costValues = 0;
        
            foreach ($nilaiKinerja as $kriteriaId => $dataKriteria) {
                if ($kriteriaId != 'nilai_akhir' && $kriteriaId != 'nilai_akhir_optimalkan') {
                    if (isset($kriteriaData[$kriteriaId])) {
                        if ($kriteriaData[$kriteriaId]->tipe == 'Cost') {
                            $costValues += $dataKriteria['normalized'] * $kriteriaData[$kriteriaId]->bobot;
                        } else {
                            $benefitValues += $dataKriteria['normalized'] * $kriteriaData[$kriteriaId]->bobot;
                        }
                    }
                }
            }
        
            $nilaiKinerja['nilai_akhir_optimalkan'] = $benefitValues - $costValues;
        }
        

        return $mooraValues;
    }
}
