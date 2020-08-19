<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ClassesCollection;
use App\Http\Resources\Classes as ClassesResource;
use App\Models\Classes;

class ClassApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ClassesCollection(Classes::paginate(2));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request, $id)
    {
        return new ClassesResource(Classes::find($id));
    }

    
}
