@extends('layouts.master')
@section('content')
@include('layouts.partial.sidebar')
<div class="col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-2 main">
    @include('layouts.partial.alerts')
    @if( $project )
    <h1 class="page-header">
        {!! $project->project_name !!}
    </h1>

    <div class="container">
         <div class="row">
            <div class="col-md-3" style="border:1px solid #ccc;margin-left:5px;padding:10px;">
              <p>Due : {!! date_format(new DateTime($project->due_date), "d-m-Y") !!}</p>
              <p>Status: {!! $project->project_status !!}</p>
              <p>Tasks: {{ count($tasks) }} </p>
              <p>Comments: {{ count($comments) }}</p>
              <p>Attachments: {{ count($files) }} </p>
              <p><a href="/projects/{{ $project->id }}/edit">Edit</a></p>
                  <button class="btn btn-circle btn-danger delete"
                          data-action="{{ url('projects/' . $project->id) }}"
                          data-token="{{csrf_token()}}">
                    <i class="fa fa-trash-o"></i>Delete
                  </button>
            </div>
            @include('collaborators.form')
        </div>
        <hr> 
    
 <div class="row">
        @include('tasks.form') 
        @include('files.form') 
        </div>
        <hr>
         @include('comments.form') 
    </div>
    @endif
</div>
@stop