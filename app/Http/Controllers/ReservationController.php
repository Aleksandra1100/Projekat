<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
        // Prikazivanje svih rezervacija
        public function index()
        {
            $reservations = Reservation::with(['user', 'arrangement'])->get();
            return view('reservations.index', compact('reservations'));
        }
    
        // Prikazivanje forme za kreiranje nove rezervacije
        public function create()
        {
            return view('reservations.create');
        }
    
        // Čuvanje nove rezervacije
        public function store(Request $request)
        {
            $request->validate([
                'number_of_persons' => 'required|integer',
                'reservation_date' => 'required|date',
                'price' => 'required|numeric',
                'user_id' => 'required|exists:users,id',
                'arrangement_id' => 'required|exists:arrangement,id',
            ]);
    
            Reservation::create($request->all());
            return redirect()->route('reservations.index');
        }
    
        // Prikazivanje jedne rezervacije
        public function show($id)
        {
            $reservation = Reservation::with(['user', 'arrangement'])->findOrFail($id);
            return view('reservations.show', compact('reservation'));
        }
    
        // Prikazivanje forme za editovanje rezervacije
        public function edit($id)
        {
            $reservation = Reservation::findOrFail($id);
            return view('reservations.edit', compact('reservation'));
        }
    
        // Ažuriranje rezervacije
        public function update(Request $request, $id)
        {
            $request->validate([
                'number_of_persons' => 'required|integer',
                'reservation_date' => 'required|date',
                'price' => 'required|numeric',
                'user_id' => 'required|exists:users,id',
                'arrangement_id' => 'required|exists:arrangement,id',
            ]);
    
            $reservation = Reservation::findOrFail($id);
            $reservation->update($request->all());
            return redirect()->route('reservations.index');
        }
    
        // Brisanje rezervacije
        public function destroy($id)
        {
            $reservation = Reservation::findOrFail($id);
            $reservation->delete();
            return redirect()->route('reservations.index');
        }
}
