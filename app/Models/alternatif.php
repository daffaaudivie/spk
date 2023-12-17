<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table = 'alternatif';
    protected $fillable = [
        'nama_alternatif',
    ];
    public $timestamps = false;
    
    public function nilais() {
        return $this->hasMany(Nilai::class, 'id_alternatif');
    }
}
