<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Decorator extends Model
{
    protected $fillable = ["name", "category", "description", "image", "price", "quantity"];

    public function panels()
{
    return $this->hasMany(Panel::class);
}
}
