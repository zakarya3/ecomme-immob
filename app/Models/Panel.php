<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panel extends Model
{
    protected $table = "panels";
    protected $fillable = [
        "decorator_id",
        "quantity",
        "status",
    ];

    public function decorators() {
        return $this->belongsTo(Decorator::class, 'decorator_id', 'id');
    }
}
