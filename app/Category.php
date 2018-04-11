<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\UuidTrait;

class Category extends Model
{
    use UuidTrait;
    public $incrementing = false;

    protected $fillable = [
        'name'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
