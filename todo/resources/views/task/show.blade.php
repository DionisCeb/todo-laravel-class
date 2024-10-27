@extends('layouts.app')
@section('title', 'Task')
@section('content')

<div class="container">
    <h1 class="mt-5 mb-4">Task</h1>
    <div class="row">
        
            <div class="col-md-8 ">    
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title">{{ $task->title }}</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><strong>Description:</strong> {{ $task->description }}</li>
                            <li><strong>Completed:</strong> {{ $task->completed ? "Yes" : "No" }}</li>
                            <li><strong>Due Date:</strong> {{ $task->due_date }}</li>
                            <li><strong>Author:</strong> {{ $task->user_id }}</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Delete
                                </button>
                                
                            </div>
                    </div>
                </div>
            </div>
    </div>
</div>



<!-- Modal -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{ route('task.destroy', $task->id) }}" method="post" >
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button> 
       </form>
      </div>
    </div>
  </div>
</div>
@endsection