<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Majikan extends Authenticatable
{
    //table name
    protected $guard = 'majikan';

    protected $table = 'majikan';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'email',
        'password',
        'status'
    ];

    public function listMajikan()
    {
        return $this->hasOne('App\DetailMajikan', 'id_majikan', 'id');
    }
}
