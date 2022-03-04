<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'thumb',
        'image',
        'user_id',
        'status',
        'reads',
        'body',
        'description',
        'new'
    ];
    public function author (){
        return $this->hasMany(User::class, 'id', 'user_id');
    }
    public function incrementReadCount() {
        $this->reads++;
        return $this->save();
    }
    public function countComments(){
        return $this->hasMany(Comment::class,'post_id','id')->count();
    }
    public function comments(){
        return $this->hasMany(Comment::class,'post_id','id')->where('reply_id',0)->orderBy('id', 'DESC');
    }
}
