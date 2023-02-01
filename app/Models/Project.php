<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{


    protected $guarded = [];
    public function users() 
    {

        return $this->hasMany(User::class);
    }


    //HasManyThrough : çok sayıda ilişkili task getirir
    public function tasks()
    {
        return $this->hasManyThrough(Task::class, User::class, 'project_id','user_id','id');
        //(foreign model, other foreign model-localkeyden yararlanılan-, localkey, other foreing key, foreign key)
    }


    //HasOneThrough : bir adet ilişkişi task getirir
    public function task() 
    {
        return $this->hasOneThrough(Task::class, User::class, 'project_id','user_id','id');

    }




    use HasFactory;
}
