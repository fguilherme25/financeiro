<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Creditcard extends Model
{
    protected $table = 'creditcards';

    protected $fillable = [
       'flag',
       'name',
       'category',
       'duedate',
       'limit',
       'status',
    ];

    public function payment(){
        return $this->hasMany(Payment::class);
    }
}
