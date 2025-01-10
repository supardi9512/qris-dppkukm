<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaEvent extends Model
{
    use HasFactory;

    public $table = "peserta_event";

    protected $fillable = [
        'peserta_id',
        'nama',
        'jenis_kelamin',
        'event_id',
    ];

    public function peserta_qris()
    {
        return $this->belongsTo('App\Models\PesertaQris');
    }

    public function ref_event()
    {
        return $this->belongsTo('App\Models\RefEvent');
    }

}
