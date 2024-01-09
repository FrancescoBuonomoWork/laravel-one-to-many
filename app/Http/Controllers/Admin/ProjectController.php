<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin/project/index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $types = Type::all();
        return view('admin.project.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string|unique:projects',
           
        ]);
        $data = $request->all();

        $new_project = Project::create($data);

        return redirect()->route('admin.project.store',$new_project->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.project.show',compact('project') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {

        $types = Type::all();
        return view('admin.project.edit',compact('project','types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => ['required','max:255','string',ValidationRule::unique('projects')->ignore($project->id)],
           
        ]);
        $data = $request->all();
        
        $project->update($data);
        return redirect()->route('admin.project.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.project.index');
    }
}
