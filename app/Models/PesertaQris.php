<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaQris extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemilik_qris',
        'nama_usaha',
        'verified',
    ];

    public function peserta_events()
    {
        return $this->hasMany('App\Models\PesertaEvent');
    }

    public function qris_transactions()
    {
        return $this->hasMany('App\Models\QrisTransaction');
    }
}
