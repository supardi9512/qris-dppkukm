<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefEvent extends Model
{
    use HasFactory;

    public $table = "ref_event";

    protected $fillable = [
        'nama_event',
        'jadwal_pelaksanaan_mulai',
        'jadwal_pelaksanaan_selesai',
    ];

    public function peserta_events()
    {
        return $this->hasMany('App\Models\PesertaEvent');
    }
}
