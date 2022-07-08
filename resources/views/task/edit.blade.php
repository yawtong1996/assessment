@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
      <div class="col-12">
        <form>
            <div class="form-group">
              <label for="Task">Task</label>
              <input type="text" class="form-control" id="task" placeholder="Enter task" value="{{ $task->task_name }}">
            </div>
            <div class="form-group">
              <label for="Description">Description</label>
              <input type="text" class="form-control" id="description" placeholder="Enter description" value="{{ $task->description }}">
            </div>

            <button type="button" class="btn btn-primary" id="submitButton">Submit</button>
          </form>
      </div>
    </div>
  </div>

<script>
    $(document).ready(function () {
        $('#submitButton').click(function () {
            $.ajax({
                type: 'PUT',
                url: '/update/' + {{ $task->id }},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    task_name: $('#task').val(),
                    description: $('#description').val(),
                },
                success: function (data) {
                    window.location.href = "{{ route('task.index') }}";
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                },
            })
        });
    });
</script>