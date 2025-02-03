<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = "commandes";
    protected $fillable = ['panel_id', 'client_name', 'client_email', 'client_phone', 'status', 'total_price'];
    
    public function panels()
    {
        return $this->belongsTo(Panel::class, 'panel_id', 'id');
    }
}
