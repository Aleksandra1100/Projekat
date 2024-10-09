<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrangement extends Model
{
    use HasFactory;
    // Naziv tabele u bazi podataka
    protected $table = 'arrangement';

    // Polja koja su dozvoljena za masovno dodeljivanje (mass assignment)
    protected $fillable = [
        'name',
        'destination',
        'date_of_departure',
        'number_of_nights',
        'price',
    ];
    
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
