<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailMajikan extends Model
{
    //table name
    protected $table = 'detail_majikan';

    public $primaryKey = 'id_detail_majikan';

    public $timestamps = true;

    protected $fillable = [
        'id_majikan',
        'nama',
        'nomorKTP',
        'tel',
        'alamat',
        'fotoKTP',
        'fotoDiri',
        'tanggalMasuk',
    ];

    public function listMajikan()
    {
        return $this->belongsTo('App\Majikan', 'id_majikan', 'id');
    }
    
}
