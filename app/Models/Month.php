<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;

    // Define the relationship with the Balance model
    public function balance()
    {
        return $this->hasOne(Balance::class);
    }

    // Define the relationship with the Flow model
    public function flow()
    {
        return $this->hasOne(Flow::class);
    }
}
