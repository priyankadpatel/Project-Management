<?php

namespace Prego\Http\Controllers; 
use Illuminate\Http\Request; 
use Auth;
use Prego\User;
use Prego\Project;
use Prego\Collaboration;
use Prego\Http\Requests;
use Prego\Http\Controllers\Controller;
class ProjectCollaboratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function addCollaborator(Request $request, $id)
    { 
      $collaboration = new Collaboration;
       $this->validate($request, [
            'collaborator'     => 'required|min:5',
        ]);

       $collaborator_username = substr(trim($request->input('collaborator')),1);
       $collaboration->project_id = $id;

       if(is_null($this->getId($collaborator_username)))
       {  
            return redirect()->back()->with('warning', 'This user does not exist');
       }
        
       $collaborator = $this->isCollaborator($id, $this->getId($collaborator_username));
       $count = count($collaborator);  
       if($count == 0)
       {  
            $collaboration->collaborator_id  = $this->getId($collaborator_username);
            $collaboration->save();
            return redirect()->back()->with('info', "{$collaborator_username} has been added to your project successfully");
       }
       else
       {
         return redirect()->back()->with('warning', 'This user is already a collaborator on this project');
       }   
    }

    /**
     * Get id of the user
     * @param  string $username
     * @return mixed  null | integer
     */
    private function getId($username)
    {
        $result = User::where('username', $username)->first();
        return (is_null($result)) ? null : $result->id;
    }
      
    private function isCollaborator($projectId, $collaboratorId)
    { 
        return Collaboration::where('project_id', $projectId)
                            ->where('collaborator_id', $collaboratorId)
                            ->first();
    }

public function deleteProjectCollaborators($projectId, $collaboratorId)
    { 
        collaboration::where('project_id', $projectId)
                ->where('collaborator_id', $collaboratorId)
                ->delete();   
        return redirect()->route('projects.show',$projectId);
    }


}