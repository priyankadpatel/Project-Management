@extends('layouts.master')

@section('content')

@include('layouts.partial.sidebar')

	 
	<?php foreach ($final_todos as $key => $value): ?>  
	<div class="col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-2 main"> 
    <h1 class="page-header">
    	Task List</br> 
    </h1> 
    
    <h2>{{$key}}</h2>
    <?php for($i=0;$i<count($value);$i++){?>
    <div class="container">
         <div class="row">
            <div class="col-md-3" style="border:1px solid #ccc;margin-left:5px;padding:10px;">
               <p>Project Name:{{$value[$i]['project_name']}}</p>
               <p>Task Name:{{$value[$i]['task_name']}}</p>
            </div>
             
        </div> 
    	</div>
    </br>
    	<?php }?>
	<?php endforeach ?>
@endsection