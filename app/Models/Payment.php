<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'creditcard_id',
        'expense_id',
        'date',
        'description',
        'amount',
        'invoiceMonth',
        'invoiceYear',
        'status',
    ];

    public function expense(){
        return $this->belongsTo(Expense::class);
    }

    public function creditcard(){
        return $this->belongsTo(Creditcard::class);
    }
}
