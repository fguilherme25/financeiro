<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';

    protected $fillable = [
        'category_id',
        'name',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function operation(){
        return $this->hasMany(Operation::class);
    }
}
