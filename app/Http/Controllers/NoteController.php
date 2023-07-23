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


    public function edit(Notes $note){

        $note = $note;

        return view('notes.edit', ['note'=>$note]);
    }

    public function update(Notes $note,Request $request){
        // dd($note->id);

        
        $formData = $request->validate([
            'title' => ['required'],
            'description' => 'required'
        ]);

        if($request->has('completed')){
            $formData['completed'] = 1;
        }

        $note->update($formData);

        return redirect( route('note', $note->id ))->with('success','Note updated');
    }
    
}
