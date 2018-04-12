<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use UuidTrait;
    public $incrementing = false;


    protected $fillable = [
       'name'
    ];
}
