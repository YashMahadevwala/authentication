<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\posts;

class clients extends Model
{
    use HasFactory;
    protected $table = 'clients';
    public $timestamps = false;

    public function post()  
    {  
        return $this->hasOne('App\Models\posts');  
    }  

}
