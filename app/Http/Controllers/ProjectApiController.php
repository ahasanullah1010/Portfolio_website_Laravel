<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectApiController extends Controller
{
    // Get all projects
    public function index()
    {
        return response()->json(Project::with('user')->get());
    }

    // Create a new project
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'image' => 'nullable|image|max:2048'
        ]);

        $project = new Project();
        $project->user_id = Auth::id();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->technologies = $request->technologies;
        $project->project_url = $request->project_url;
        $project->github_url = $request->github_url;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $filename);
            $project->image = 'uploads/projects/' . $filename;
        }

        $project->save();

        return response()->json(['message' => 'Project created successfully!', 'project' => $project], 201);
    }

    // Get single project
    public function show($id)
    {
        return response()->json(Project::with('user')->findOrFail($id));
    }

    // Update project
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        if ($project->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'project_url' => 'nullable|url',
            'github_url' => 'nullable|url'
        ]);

        $project->update($request->all());

        return response()->json(['message' => 'Project updated successfully!', 'project' => $project]);
    }

    // Delete project
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if ($project->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        if ($project->image) {
            unlink(public_path($project->image));
        }

        $project->delete();

        return response()->json(['message' => 'Project deleted successfully!']);
    }













    // // Get all projects
    // public function index()
    // {
    //     return response()->json(Project::all(), 200);
    // }

    // // Store a new project
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'user_id' => 'required|exists:users,id',
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'technologies' => 'required|string',
    //         'project_url' => 'nullable|url',
    //         'github_url' => 'nullable|url',
    //         'image' => 'nullable|string'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $project = Project::create($request->all());

    //     return response()->json($project, 201);
    // }

    // // Get a single project by ID
    // public function show($id)
    // {
    //     $project = Project::find($id);
    //     if (!$project) {
    //         return response()->json(['message' => 'Project not found'], 404);
    //     }

    //     return response()->json($project, 200);
    // }

    // // Update a project
    // public function update(Request $request, $id)
    // {
    //     $project = Project::find($id);
    //     if (!$project) {
    //         return response()->json(['message' => 'Project not found'], 404);
    //     }

    //     $validator = Validator::make($request->all(), [
    //         'title' => 'string|max:255',
    //         'description' => 'string',
    //         'technologies' => 'string',
    //         'project_url' => 'nullable|url',
    //         'github_url' => 'nullable|url',
    //         'image' => 'nullable|string'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $project->update($request->all());

    //     return response()->json($project, 200);
    // }

    // // Delete a project
    // public function destroy($id)
    // {
    //     $project = Project::find($id);
    //     if (!$project) {
    //         return response()->json(['message' => 'Project not found'], 404);
    //     }

    //     $project->delete();
    //     return response()->json(['message' => 'Project deleted'], 200);
    // }
}
