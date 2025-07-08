<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RekapJumlah extends Model
{
    protected $fillable = [
        'tahun','unit',
        'gol_3_4','gol_1_2','kampanye','honor',
        'pens_3_4','pens_1_2','direksi','dekom','pengacara',
        'transport','hiperkes','total'
    ];
}
