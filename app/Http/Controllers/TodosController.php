<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodosController extends Controller
{
    /**
     * index to show all data
     * store to save a todo
     * update to update a todo
     * destroy to remove a todo
     * edit to show a form to edit
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request){
        $request -> validate([
            'title' => 'required|min:3'
        ]);

        $todo = new Todo;
        $todo ->title = $request->title;
        $todo ->category_id = $request->category_id;
        $todo ->save();
        return redirect()->route('todos')->with('success', 'TODO added correctly');
     }

     public function index(){
        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', ['todos'=>$todos, 'categories'=>$categories]);
     }

     public function show($id){
        $todo = Todo::find($id);
        return view('todos.show', ['todo'=>$todo]);
     }

     public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo -> title = $request->title;
        $todo -> save();
        // return view('todos.index', ['success'=>'TODO updated']);
        return redirect()->route('todos')->with('success', 'TODO updated correctly');
     }

     public function destroy($id){
        $todo = Todo::find($id);
        $todo -> delete();
        return redirect()->route('todos')->with('success', 'TODO removed');
     }
}
