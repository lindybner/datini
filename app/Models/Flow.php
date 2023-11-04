<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flow extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, mixed>
     */
    protected $fillable = [
        'month_id',
        'inflow',
        'outflow',
        'user_id', // Assuming you have a user_id field in your flows table
    ];

    public function month()
    {
        return $this->belongsTo(Month::class, 'month_id');
    }
}
