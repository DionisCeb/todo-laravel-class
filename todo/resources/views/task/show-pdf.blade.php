<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  body {
    background: gray;
    color: white;
    font-size: 30px;
    text-align: center;
  }
</style>
<body>
    <h5 class="card-title">{{ $task->title }}</h5>
    <p>Description:</strong> {{ $task->description }}</p>

    <ul>
        <li><strong>Completed:</strong> {{ $task->completed ? "Yes" : "No" }}</li>
        <li><strong>Due Date:</strong> {{ $task->due_date }}</li>
        <li><strong>Author:</strong>  {{ $task->user->name }} </li>
        <li><strong>Category:</strong> {{ $task->category ? $task->category->category[app()->getLocale()] ?? $task->category->category['en'] : '' }}</li>
    </ul>
</body>
</html>
      
                    