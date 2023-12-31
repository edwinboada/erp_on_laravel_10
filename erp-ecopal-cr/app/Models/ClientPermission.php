<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id', 'deal_id','permissions'
    ];
}
