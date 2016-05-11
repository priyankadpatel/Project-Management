@extends('layouts.master')

@section('content')

@include('layouts.partial.sidebar')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
{{ HTML::style('css/bootstrap-datetimepicker.min.css') }}
{{ HTML::script('js/jquery-ui.js') }}
{{ HTML::script('js/bootstrap-datetimepicker.min.js') }}
<script type="text/javascript">
    $('document').ready(function(){ 
      var currentDate = new Date(); 
      $('#due-date').datepicker({
          inline: true,
          showOtherMonths: true,
          dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
          dateFormat: 'dd/mm/yy'
      }); 
      $("#due-date").datepicker("setDate", currentDate); 
  });
</script>
 <div class="col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-2 main">
    <h1 class="page-header"> Edit Project</h1>

    <div class="col-lg-6">
        <form class="form-vertical" role="form" method="post" action="{{ route('projects.update', $project->id) }}">
            <div class="form-group{{ $errors->has('project_status') ? ' has-error' : '' }}">
                <label for="status" class="control-label">Choose Status</label>
                <select name="project_status" id="status">
                    <option value="{!! $project->project_status !!}">{!! $project->project_status !!}</option>
                    {{ getStatus($project->project_status) }}
                </select>
                @if ($errors->has('project_status'))
                    <span class="help-block">{{ $errors->first('project_status') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label">Name</label>
                <input type="text" name="project_name" class="form-control" id="name" value="{!! $project->project_name ?: '' !!}">
                @if ($errors->has('project_name'))
                    <span class="help-block">{{ $errors->first('project_name') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('due-date') ? ' has-error' : '' }}">
               <label for="due-date" class="control-label">Due date</label>
                <div class="col-sm-13">
                      <input type="text" name="due-date" class="form-control" id="due-date" value="{!! $project->due_date !!}">
                </div>
                @if ($errors->has('due-date'))
                    <span class="help-block">{{ $errors->first('due-date') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('project_notes') ? ' has-error' : '' }}">
                <label for="notes" class="control-label">Notes</label>
                <textarea name="project_notes" class="form-control" id="notes" rows="10" cols="10">
                    {!! $project->project_notes ?: '' !!}
                </textarea>
                @if ($errors->has('project_notes'))
                    <span class="help-block">{{ $errors->first('project_notes') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn bt">Update</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
             {!! method_field('PUT') !!}
        </form>
    </div>
</div>
@stop