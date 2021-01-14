<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPekerja extends Model
{
    //table name
    protected $table = 'detail_pekerja';

    public $primaryKey = 'id_detail_pekerja';

    public $timestamps = true;

    protected $fillable = [
        'id_pekerja',
        'nama',
        'nomorKTP',
        'usia',
        'tel',
        'alamat',
        'keahlian',
        'kondisiKhusus',
        'agama',
        'fotoKTP',
        'fotoDiri',
        'tanggalMasuk',
        'gaji',
    ];

    public function listPekerja()
    {
        return $this->belongsTo('App\Pekerja', 'id_pekerja', 'id');
    }
    
}
