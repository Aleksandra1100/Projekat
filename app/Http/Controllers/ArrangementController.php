<?php

namespace App\Http\Controllers;

use App\Models\Arrangement;
use Illuminate\Http\Request;

class ArrangementController extends Controller
{
     // Prikazivanje svih aranžmana
     public function index()
     {
         $arrangements = Arrangement::all();
         return view('arrangements.index', compact('arrangements'));
     }
 
     // Prikazivanje forme za kreiranje novog aranžmana
     public function create()
     {
         return view('arrangements.create');
     }
 
     // Čuvanje novog aranžmana u bazu
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:100',
             'destination' => 'required|string|max:100',
             'date_of_departure' => 'required|date',
             'number_of_nights' => 'required|integer',
             'price' => 'required|numeric',
         ]);
 
         Arrangement::create($request->all());
         return redirect()->route('arrangements.index');
     }
 
     // Prikazivanje jednog aranžmana
     public function show($id)
     {
         $arrangement = Arrangement::findOrFail($id);
         return view('arrangements.show', compact('arrangement'));
     }
 
     // Prikazivanje forme za uređivanje aranžmana
     public function edit($id)
     {
         $arrangement = Arrangement::findOrFail($id);
         return view('arrangements.edit', compact('arrangement'));
     }
 
     // Ažuriranje postojećeg aranžmana
     public function update(Request $request, $id)
     {
         $request->validate([
             'name' => 'required|string|max:100',
             'destination' => 'required|string|max:100',
             'date_of_departure' => 'required|date',
             'number_of_nights' => 'required|integer',
             'price' => 'required|numeric',
         ]);
 
         $arrangement = Arrangement::findOrFail($id);
         $arrangement->update($request->all());
         return redirect()->route('arrangements.index');
     }
 
     // Brisanje aranžmana
     public function destroy($id)
     {
         $arrangement = Arrangement::findOrFail($id);
         $arrangement->delete();
         return redirect()->route('arrangements.index');
     }
}
