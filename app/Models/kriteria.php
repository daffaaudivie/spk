<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';
    protected $fillable = [
        'nama_kriteria',
        'tipe',
        'bobot',
    ];
    public $timestamps = false;

    public function nilais() {
        return $this->hasMany(Nilai::class, 'id_kriteria');
    }
}
