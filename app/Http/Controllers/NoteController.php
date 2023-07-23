<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function store(Request $request){
        // dd($request->request);

        

        $formData = $request->validate([
            'title' => ['required'],
            'description' => 'required'
        ]);

        if($request->has('completed')){
            $formData['completed'] = 1;
        }

        Notes::create($formData);

        return redirect(route('notes'))->with('success','Note created');

    }

    public function show(Notes $note){
        // dd($note);

        return view('notes.show', ['note'=> $note]);
    }
    
}
