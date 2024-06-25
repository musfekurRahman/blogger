<?php

namespace App\Modules\Content\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contents extends Model
{
    use HasFactory;
    protected $fillable = [
        'blogger_id',
        'headline',
        'content',
        'priority',
        'categories',
        'total_comments',
        'total_hits',
        'total_hosts',
        'author_name',
        'is_pinned',
        'status',
    ];

}
