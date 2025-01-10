<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrisTransaction extends Model
{
    use HasFactory;

    public $table = "qris_transaction";

    protected $fillable = [
        'peserta_id',
        'tanggal_transaksi',
        'nama_produk',
        'nominal',
    ];

    public function peserta_qris()
    {
        return $this->belongsTo('App\Models\PesertaQris');
    }
}
