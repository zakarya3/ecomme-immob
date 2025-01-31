<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = "commandes";
    protected $fillable = ['decorator_id', 'client_name', 'client_email', 'client_phone', 'status'];
}
