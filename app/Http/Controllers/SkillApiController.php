<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillApiController extends Controller
{
    // Get all skills
    public function index()
    {
        return response()->json(Skill::all(), 200);
    }

    // Store a new skill
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'skill_name' => 'required|string|max:255',
            'proficiency' => 'required|integer|min:1|max:100',
        ]);

        $skill = Skill::create($request->all());

        return response()->json($skill, 201);
    }

    // Get a specific skill by ID
    public function show($id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            return response()->json(['message' => 'Skill not found'], 404);
        }
        return response()->json($skill, 200);
    }

    // Update a skill
    public function update(Request $request, $id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            return response()->json(['message' => 'Skill not found'], 404);
        }

        $request->validate([
            'skill_name' => 'sometimes|string|max:255',
            'proficiency' => 'sometimes|integer|min:1|max:100',
        ]);

        $skill->update($request->all());

        return response()->json($skill, 200);
    }

    // Delete a skill
    public function destroy($id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            return response()->json(['message' => 'Skill not found'], 404);
        }

        $skill->delete();

        return response()->json(['message' => 'Skill deleted successfully'], 200);
    }
}
