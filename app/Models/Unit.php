<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function rekapBiayas()
    {
        return $this->hasMany(RekapBiaya::class);
    }
}