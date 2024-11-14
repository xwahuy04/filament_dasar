<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyAbout extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        "name",
        "thumnail",
        "icon",
    ];

    public function companyKeypoint()
    {
        return $this->hasMany(CompanyKeypoint::class);
    }
}
