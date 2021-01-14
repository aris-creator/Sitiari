<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pekerja extends Authenticatable
{
    //table name
    protected $guard = 'pekerja';

    protected $table = 'pekerja';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'email',
        'password',
        'status',
        'jenisPekerjaan'
    ];

    public function listPekerja()
    {
        return $this->hasOne('App\DetailPekerja', 'id_pekerja', 'id');
    }
}
