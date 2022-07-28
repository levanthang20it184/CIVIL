<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Topic;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table='posts';
    public function imagesuser()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function topick()
    {
        return $this->hasOne(Topic::class,'id','topic_id');
    }
    use softDeletes;

}
