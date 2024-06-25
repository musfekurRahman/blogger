<?php

namespace App\Modules\Blogger\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Bloggers extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'description',
        'status',
    ];

}
