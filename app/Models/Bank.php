<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';

    protected $fillable = [
        'code',
        'name',
        'status',
    ];

    public function account(){
        return $this->hasMany(Account::class);
    }
}
