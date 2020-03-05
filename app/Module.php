<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'kinventory', 'kclients', 'ksuppliers' ,'kassistant','kpos','created_at','updated_at'
    ];
}
