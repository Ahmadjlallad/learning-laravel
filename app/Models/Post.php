<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // for mass assignment you can spicily which filed or column can be mass assignment
    protected $fillable = ['title', 'excerpt'];
    // the which property or column can't be mass assignment
    protected $guarded = ['id'];
    //
}
