@extends('layouts.app')
@section('title', 'New Task')
@section('content')
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">New Task</h5>
                </div>
                <div class="card-body">
                    <form method="post">
                        @csrf 
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            @if($errors->has('title'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('title') }}
                                </div>
                                
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="completed" class="form-check-label">Completed</label>
                            <input type="checkbox" class="form-check-input" name="completed" value='1' value="{{ old('completed') ? 'checked': '' }}">
                            @if($errors->has('completed'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('completed') }}
                                </div>     
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" class="form-control" name="due_date" value="{{ old('due_date') }}">
                            @if($errors->has('due_date'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('due_date') }}
                                </div>
                                
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)                                 
                                    <option value="{{ $category['id'] }}" @if ($category['id'] == old('category_id')) selected @endif>{{ $category['category'] }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))
                                <div class="text-danger mt-2">
                                    {{ $errors->first('category_id') }}
                                </div>
                                
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>
            </div>
@endsection