<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = project::all();
        return view('pages.index', compact('projects'));
    }

    public function create()
    {
        $technologies = Technology :: all();
        $types = Type ::all();
        return view('pages.create', compact('technologies', 'types'));
    }

    public function store(Request $request)
    {
        $data = $request -> all();

        $type = Type :: find($data['type_id']);

        $image = $data['image'];
        $image_path = Storage :: disk('public')
            ->put('images', $image);
        

            
        $projects = new Project();

        $projects -> name = $data['name'];
        $projects -> description = $data['description'];
        $projects -> image = $image_path;

        $projects -> type() -> associate($type);
        
        $projects -> save();

        $projects -> technologies() -> attach($data['technology_id']);

        return redirect() -> route('project.index');


    }
}
