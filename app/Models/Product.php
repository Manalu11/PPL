<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'price',
        'image',
        'discount',
        'is_new',
        'product_type',
        'skin_type',
        'category_id',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    // Relasi ke promotions
    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'promotion_product')
            ->withPivot('discount')
            ->withTimestamps();
    }

    // Ambil promo yang sedang aktif
    public function activePromotion()
    {
        return $this->promotions()
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();
    }

    // Harga setelah diskon
    public function getFinalPriceAttribute(): int
    {
        $promo = $this->activePromotion();
        if ($promo) {
            $discount = $promo->pivot->discount;
            return (int) ($this->price - ($this->price * $discount / 100));
        }
        return $this->price;
    }

    // Persentase diskon aktif
    public function getActiveDiscountAttribute(): ?int
    {
        $promo = $this->activePromotion();
        return $promo ? $promo->pivot->discount : null;
    }
}
