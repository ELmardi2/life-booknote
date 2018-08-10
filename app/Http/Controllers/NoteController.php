<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //DB::connection()->enableQueryLog();
       // $notes = Note::orderBy('id', 'desc')->paginate(3);
        $notes = Note::with('user')
        ->where('user_id', Auth::user()->id)
        ->orderBy('id', 'desc')
        ->paginate(4);
        return view('notes.index', ['notes' => $notes]);
        print_r(Note::getQueryLog());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation to fields required
        $this->validate($request, [
            'object' => 'required | min: 4',
            'comment' => 'required | min: 10',
            'addingtime' => 'required |date'
        ]);
        //get courently user
        $user = Auth::user();

        // get store inputs 
        Note::create([
            'object' => $request->object,
            'comment' => $request->comment,
            'addingtime' => $request->addingtime,
            'user_id' => Auth()->id(),
        ]);

        session()->flash('message', 'your note has been successfully added');
       return redirect(route('notes.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return view('notes.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        $userId = Auth::id();
        
        if ($note->user_id !== $userId) {
            session()->flash('error', 'Sorry that it is not your note !! you can not edit it');
            return redirect('/main');
        }
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $note->object = $request->object;
        $note->addingtime = $request->addingtime;
        $note->comment = $request->comment;

        $userId = Auth::id();
        if ($note->user_id !== $userId) {
            session()->flash('error', 'Sorry that it is not your note !! you can not edit it');
            return redirect('notes.index');
        }
        $note->save();
        session()->flash('message', 'your note has been successfully updated');
         return redirect(route('notes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $userId = Auth::id();

        if ($note->user_id !== $userId) {
            session()->flash('error', 'Sorry that it is not your note !! you can not delete it !!');
            return redirect('notes.index');
            
        }

        $note->delete();
        session()->flash('message', 'your note has been deleted');
        return redirect(route('notes.index'));
    }
}
