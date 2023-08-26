<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Eloquent;

class BaseModel extends Model
{
    use HasFactory;

    public $timestamps = false;    

}
