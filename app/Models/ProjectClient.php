<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProjectClient extends Model
{
    protected $fillable = [
        'name',
        'occupation',
        'avatar',
        'logo'
    ];


    public function testimonial(){
        return $this->hasMany(Testimonial::class);
    }
}
