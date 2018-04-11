<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UuidTrait;
class Comment extends Model
{
    use UuidTrait;
    public $incrementing = false;

    protected $fillable = [
      'ticket_id', 'user_id', 'comment'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
