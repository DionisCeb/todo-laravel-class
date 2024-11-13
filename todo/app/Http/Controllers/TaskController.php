<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;

class TaskController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $tasks = Task::all();
        return view('task.index', ['tasks'=>$tasks]);
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
       /*  $categories = new Category();
        $categories = $categories->categories(); */

        $categories = Category::categories();
        
        return view('task.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'completed' => 'nullable|boolean',
            'due_date' => 'nullable|date',
            'category_id' => 'required'
        ]);
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->input('completed', false),
            'due_date' => $request->due_date,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            ]);

        //return $task;
        return redirect()->route('task.show', $task->id)->withSuccess('Task created with success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $categories = Category::categories();
        return view('task.show', compact('task', 'categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {

        $categories = Category::categories();
        

        return view('task.edit', compact('task', 'categories'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'completed' => 'nullable|boolean',
            'due_date' => 'nullable|date',
            'category_id' => 'required'
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->input('completed', false),
            'due_date' => $request->due_date,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('task.show', $task->id)->withSuccess('Task edited with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index', $task->id)->withSuccess('Task deleted with success');
    }

    public function completed($completed) {
        $tasks = Task::where('completed', $completed)->get();
        return view('task.index', ['tasks' => $tasks]);
    }

   public function pdf(Task $task) {
        $pdf = new Dompdf();
        $pdf->setPaper('letter', 'portrait');
        $pdf->loadHtml(view('task.show-pdf', ["task" => $task]));
        $pdf->render();
        return $pdf->stream('task_'.$task->id .'.pdf');

        //return view('task.show-pdf', compact('task'));
   }



}
