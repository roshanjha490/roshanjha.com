<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all()->where('status', 1);

        $sorted = array_values(Arr::sort($projects, function ($value) {
            return $value['created_at'];
        }));

        $projects = array_reverse($sorted);

        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('login_status') == 'false') {
            return view('errors.404');
        }

        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_title' => 'required',
            'project_slug' => 'unique:articles,slug',
            'meta_tags' => 'required',
            'project_desc' => 'required',
            'project_content' => '',
            'project_tech' => 'required',
            'project_img' => 'required|file|image|mimes:jpeg,png,jpg',
            'project_git_src' => 'required',
            'project_demo_src' => 'required',
            'project_status' => 'required',
            'project_date' => 'required'
        ]);

        $file = $request->file('project_img');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('', $filename);


        $project = new project;

        $project->title = $request->project_title;
        $project->slug = $request->project_slug;
        $project->metatags = $request->meta_tags;
        $project->desc = $request->project_desc;
        $project->content = $request->project_content;

        if (empty($project->content)) {
            $project->content = '';
        }

        $project->tech = $request->project_tech;
        $project->img = $path;
        $project->github_sauce = $request->project_git_src;
        $project->demo_sauce = $request->project_demo_src;
        $project->status = $request->project_status;
        $project->created_at = $request->project_date;

        $query = $project->save();

        if ($query) {
            return redirect('dashboard')->with('success', 'Project Added Successfully');
        } else {
            return redirect('dashboard')->with('success', 'Project Not Added Succesfully');
        }

        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        return view('errors.404');
    }


    public function show_project($slug)
    {
        $article = Project::all()->where('slug', $slug)->first();

        if (($article->status == 0) && (session('login_status') == 'false')) {
            return view('errors.404');
        }

        return view('article.show', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        if (session('login_status') == 'false') {
            return view('errors.404');
        }

        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        $request->validate([
            'project_title' => 'required',
            'meta_tags' => 'required',
            'project_slug' => 'required',
            'project_desc' => 'required',
            'project_content' => '',
            'project_tech' => 'required',
            'project_img' => 'file|image|mimes:jpeg,png,jpg',
            'project_git_src' => 'required',
            'project_demo_src' => 'required',
            'project_status' => 'required',
            'project_date' => 'required'
        ]);


        // $url = Storage::download($filename);

        // $path = $request->file('project_img')->store('avatars');

        // $path = Storage::disk('local')->put($file, $filename);

        // return $path;

        $project->title = $request->project_title;
        $project->desc = $request->project_desc;
        $project->metatags = $request->meta_tags;
        $project->slug = $request->project_slug;
        $project->content = $request->project_content;

        if (empty($project->content)) {
            $project->content = '';
        }

        $project->tech = $request->project_tech;
        if ($request->file('project_img') !== null) {
            $file = $request->file('project_img');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('', $filename);
            $project->img = $path;
        }
        $project->github_sauce = $request->project_git_src;
        $project->demo_sauce = $request->project_demo_src;
        $project->status = $request->project_status;
        $project->created_at = $request->project_date;

        $query = $project->save();

        if ($query) {
            return redirect('dashboard')->with('success', 'Project Edited Successfully');
        } else {
            return redirect('dashboard')->with('success', 'Project Not Edited Succesfully');
        }

        return $request;
    }


    public function show_project_write_up($slug)
    {

        $article = Project::all()->where('slug', $slug)->first();

        if (($article->status == 0) && (session('login_status') == 'false')) {
            return view('errors.404');
        }

        return view('project.show', $article);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        //
    }
}
