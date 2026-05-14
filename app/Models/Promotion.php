<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['name', 'start_date', 'end_date'];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
        'banner'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'promotion_product')
            ->withPivot('discount')
            ->withTimestamps();
    }

    public function isActive(): bool
    {
        return now()->between($this->start_date, $this->end_date);
    }
}
