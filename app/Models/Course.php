<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public $fillable = [
        'title', 'author', 'date', 'description' , 'image'
    ];


    public function videos()
    {
        return $this->hasMany(CourseVideo::class);
    }
}
