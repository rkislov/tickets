<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Ticket extends Model
{
    use Uuid;
    public $incrementing = false;


    protected $fillable = [
      'id', 'user_id','category_id','ticket_id','title','priority','message','status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
