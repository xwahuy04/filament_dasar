<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeroSection extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "achievement",
        "heading",
        "subheading",
        "path_vidio",
        "banner",
    ];
}
