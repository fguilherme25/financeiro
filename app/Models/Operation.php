<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $table = 'operations';

    protected $fillable = [
        'account_id',
        'category_id',
        'date',
        'type',
        'description',
        'amount',
        'status',
    ];

    public function expense(){
        return $this->belongsTo(Expense::class);
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }
}
