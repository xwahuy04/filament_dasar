<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory;
    use SoftDeletes;
protected $fillable = [
        "product_id",
        "name",
        "phone_number",
        "brief",
        "budget",
        "email",
        "meeting_at",
    ];

    public function map($appointment): array
    {
        return [
            $appointment->name,
            $appointment->phone_number,
            $appointment->brief,
            $appointment->budget,
            $appointment->email,
            $appointment->meeting_at,
            $appointment->product->name ?? '', // Handle potential null product relationships
        ];
    }

    public function Product(){
        return $this->belongsTo(Product::class, "product_id");
    }
}
