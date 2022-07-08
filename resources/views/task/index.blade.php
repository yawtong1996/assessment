@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="container">
    <div class="row">
      <div class="col-12">
        <button type="button" class="btn btn-success" id="createButton">Create</i></button>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Task</th>
              <th scope="col">Description</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)
            <tr>
              <th scope="row">{{ $task->id }}</th>
              <td>{{ $task->task_name }}</td>
              <td>{{ $task->description }}</td>
              <td>
                <button type="button" class="btn btn-primary" edit-id="{{ $task->id }}">Edit</button>
                <button type="button" class="btn btn-danger" delete-id="{{ $task->id }}">Delete</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

<script>
    var createURL = "{{ route('task.create') }}";
    $(document).ready(function(){

        $('#createButton').click(function(){
            window.location.href = createURL;
        });

        $('button[edit-id]').click(function(){
            var id = $(this).attr("edit-id");
            window.location.href = "/edit/" + id;
        });

        $('button[delete-id]').click(function(){
            var id = $(this).attr("delete-id");
            $.ajax({
                type: 'DELETE',
                url: "/destroy/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
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


<style>
.container {
  padding: 2rem 0rem;
}

h4 {
  margin: 2rem 0rem 1rem;
}

.table-image {
  td, th {
    vertical-align: middle;
  }
}
</style>