<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['kode', 'nama', 'tipe'];

    public function rekapBiayas()
    {
        return $this->hasMany(RekapBiaya::class);
    }
}