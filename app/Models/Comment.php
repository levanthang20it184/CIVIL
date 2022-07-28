<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table='comments';
    public function commentuser()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function commentpost()
    {
        return $this->hasOne(Post::class,'id','post_id');
    }
    use softDeletes;

}
