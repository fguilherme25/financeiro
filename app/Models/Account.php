<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    protected $fillable = [
       'bank_id' ,
       'agency',
       'number',
       'digit',
       'type',
       'limit',
       'balance',
       'status',
    ];

    public function bank(){
        return $this->belongsTo(Bank::class);
    }

    public function operation(){
        return $this->hasMany(Operation::class);
    }
}
