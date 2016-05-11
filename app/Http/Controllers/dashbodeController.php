<?php

namespace Prego\Http\Controllers;

use Illuminate\Http\Request;
use Prego\User;
use Auth;
use DB;
use Prego\Project;
use Prego\Task;
use Prego\Http\Requests;

class dashbodeController extends Controller
{
  	public function account()
  	{
  			return view('account');
  	}
  	public function editAccount()
  	{ 
  			$user = Auth::user();
  			return view('editAccount')->with('user',$user);
  			
  	}
  	public function userUpdate($id,Request $request)
  	{  
  		DB::table('users')
            ->where('id', $id) 
            ->update(['username' => $request->input('username'),'email' => $request->input('email'),'password' => $request->input('password')]);
  		 return redirect()->route('index');	
  	} 

  	public function todos()
  	{
      $task = Task::All();
      $taskArray=array();
      $projectArray = array();
       foreach ($task as $key => $value) {
              $taskArray[] = [
                'task'=> $value->task_name,
                'project_id' => $value->project_id,
              ];
       }  
        foreach ($taskArray as $key => $value) {
            
             $project = Project::where('id',"=",$value['project_id'])->get();
               foreach ($project as $key1 => $value1) {
                    $projectArray[] = [
                        'project_name' => $value1['project_name'],
                        'user_id' => $value1['user_id'],
                        'task_name' => $value['task'],
                    ];          
               }
        }

        $user = Auth::user();
        $final_todos=array();
        foreach ($projectArray as $key => $value) {
              if($user->id == $value['user_id'])
              {
                  $final_todos[ $user->username][]=[
                       'project_name'=>$value['project_name'],
                       'task_name'=>$value['task_name'],
                  ];
              }
        }
        
  		return view('todos')->with('final_todos',$final_todos);
  	}
  	
}
