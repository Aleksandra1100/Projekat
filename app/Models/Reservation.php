<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    use HasFactory;

    // Naziv tabele u bazi podataka
    protected $table = 'reservation';

    // Polja koja su dozvoljena za masovno dodeljivanje (mass assignment)
    protected $fillable = [
        'number_of_persons',
        'reservation_date',
        'price',
        'user_id',
        'arrangement_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

   
    public function arrangement()
    {
        return $this->belongsTo(Arrangement::class);
    }
}
