@extends('layouts.master')

@section('content')

@include('layouts.partial.sidebar')

 <div class="col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-2 main">
    @include('layouts.partial.alerts')
    
    <h1 class="page-header">
        Projects
        <a class="btn btn-info" href="{{ route('projects.create') }}">New Project</a>
    </h1>

    <div class="container">
      @if($project)
         <div class="row">
             @foreach ($project as $proj) 
               <div class="col-md-3" style="border:1px solid #ccc;margin-left:5px;">
               <h2><a href="/projects/{{ $proj->id }}">{!! $proj->project_name !!}</a></h2>
               <p>Due : {!! date_format(new DateTime($proj->due_date), "d-m-Y") !!}</p>
               <p>Status: {!! $proj->project_status !!}</p>
               <p>Tasks: 0</p>
               <p>Comments: 0</p>
               <p>Attachments: 0</p>
               </div>
             @endforeach
         </div>
      @endif

      @if($project->isEmpty())
         <h3>There are currently no Projects</h3>
      @endif
    </div>
  
</div>
@stop