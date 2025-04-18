<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'street',
        'postal_code',
        'city',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    protected function total(): Attribute
    {
        return Attribute::get(fn () => $this->items->sum('total'));
    }
}
