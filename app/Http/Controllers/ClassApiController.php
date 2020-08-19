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
    public function get($id)
    {
        return new ClassesResource(Classes::find($id));
    }
    
    public function delete($id)
    {
        $message = 'Xóa thành công!';
        try {
            Classes::destroy($id);
        } catch (\Illuminate\Database\QueryException $e) {
            $message = 'Lớp này đang có sinh viên nên không được xóa.';
        }
        
        return response()->json([
            'message' => $message
        ], 201);
    }

    
}
