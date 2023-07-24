<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function index(){

        if(request()->query('search')){
            $query = request()->query('search');
            
            $notes = Notes::where('title','LIKE',"%$query%")->orderBy('id','desc')->simplePaginate(3);

        }else{
            $notes = Notes::orderBy('id', 'desc')->simplePaginate(3);
        }

        return view('notes.index')->with('notes', $notes);
    }


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
        }else{
            $formData['completed'] = 0;
        }

        $note->update($formData);

        return redirect( route('note', $note->id ))->with('success','Note updated');
    }

    public function destroy(Notes $note){
        // dd($note);

        $note->delete();

        return redirect( route('notes'))->with('success','Note deleted successfully');
    }

    public function complete(Notes $note){
        $note->completed = true;

        $note->update();

        return redirect()->back()->with('success', 'Note updated successfully');
    }
    
}
