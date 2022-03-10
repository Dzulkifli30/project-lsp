<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'nomor_kwh',
        'nama_pelanggan',
        'alamat',
        'id_tarif',
    ];
    public function tarif()
    {
    	return $this->belongsTo('App\Models\Tarif');
    }
}
