<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){
        $projects_db = Project::all();

        return response()->json([
            'success' => true,
            'response' => $projects_db,
        ]);
    }

    public function show($slug){
        $project = Project::all()->where('slug', $slug);

        if($project){
            return response()->json([
                'success' => true,
                'response' => $project
            ]);
        }
        else{
            return response()->json([
                'success' => false,
                'response' => 'No project found matching query.'
            ]);
        }
    }
}
