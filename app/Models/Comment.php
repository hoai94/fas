<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';

    protected $fillable = [
        'post_id',
        'reply_id',
        'user_id',
        'content',
        'status',
    ];
    public function user (){
        return $this->hasOne(Customer::class,'id','user_id');
    }
    public function replies(){
        return $this->hasMany(Comment::class,'reply_id','id');
    }
}
