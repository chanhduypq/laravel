<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Student::orderBy('id', 'desc')->paginate(5);
        return view('student.index', array('items' => $items));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.create', ['classes' => Classes::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $model = new Student();
        $rules = [
            'name' => [
                'required',
                'max:30',
                'min:2',
            ],
            'classes_id' => 'required',
            'photo' => [
                'required',
                'mimes:jpeg,bmp,png',
                'max:512',//512KB
            ],
        ];
        $validattionErrorMessages = [
            'name.required' => 'Vui lòng nhập tên.',
            'name.max' => 'Tên không được dài quá 30 kí tự',
            'name.min' => 'Tên không được ít hơn 2 kí tự',
            'classes_id.required' => 'Vui lòng chọn lớp.',
        ];
        $validator = Validator::make($request->all(), $rules, $validattionErrorMessages);

        if ($validator->fails()) {
            return redirect('student/create')
                            ->withErrors($validator->errors())
                            ->withInput();
        } else {
            /**
             * save on database
             */
            
            
            $columnsInTable = \Illuminate\Support\Facades\Schema::getColumnListing('students');
            foreach ($request->all() as $key => $value) {
                if(in_array($key, $columnsInTable)){
                    $model->$key = $value;
                }
            }
            if($request->file('photo')){
                $path = Storage::putFile('public/photos', $request->file('photo'));
                $model->photo = str_replace('public/photos/', '', $path);
                
                $image = $request->file('photo');
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

                $destinationPath = storage_path('app/public/photos/thumbnail');
                $img = Image::make($image->getRealPath());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);
                
            }
            if($request->file('description')){
                $path = Storage::putFile('public/descriptions', $request->file('description'));
                $model->description = str_replace('public/descriptions/', '', $path);
            }       
            try {
                $model->save();
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect('student/create')
                            ->withErrors($validator->errors())
                            ->withInput();
            }
            $model->save();
            //
            return redirect('student');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student  $student, $primaryKeyValue)
    {
        $model = Student::find($primaryKeyValue);
        /**
         * if the item has been removed
         */
        if ($model == null) {
            return redirect('student');
        }

        return view('student.edit', ['item' => $model, 'classes' => Classes::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $primaryKeyValue)
    {
        $model = Student::find($primaryKeyValue);
        /**
         * if the item has been removed
         */
        if ($model == null) {
            return redirect('student');
        }
        /**
         * 
         */
        $rules = [
            'name' => [
                'required',
                'max:30',
                'min:2',
            ],
            'classes_id' => 'required',
        ];
        
        $validattionErrorMessages = [
            'name.required' => 'Vui lòng nhập tên.',
            'name.max' => 'Tên không được dài quá 30 kí tự',
            'name.min' => 'Tên không được ít hơn 2 kí tự',
            'classes_id.required' => 'Vui lòng chọn lớp.',
        ];
        

        $validator = Validator::make($request->all(), $rules, $validattionErrorMessages);
        
        if ($validator->fails()) {
            return redirect('student/edit/' . $primaryKeyValue)
                            ->withErrors($validator->errors())
                            ->withInput();
        } else {
            /**
             * save on database
             */
            $columnsInTable = \Illuminate\Support\Facades\Schema::getColumnListing('students');
            foreach ($request->all() as $key => $value) {
                if(in_array($key, $columnsInTable)){
                    $model->$key = $value;
                }
            }
            $model->save();
            //
            return redirect('student');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, $primaryKeyValue)
    {
        $model = Student::find($primaryKeyValue);
        /**
         * if the item has been removed
         */
        if ($model == null) {
            return redirect('student');
        }
        /**
         * delete record on database
         */
        $model->delete();

        return redirect('student');
    }
    
    public function download($primaryKeyValue) {
        $model = Student::find($primaryKeyValue);
        /**
         * if the item has been removed
         */
        if ($model == null || !$model->description) {
            return redirect('student');
        }
        //download
        return response()->download(storage_path('app/public/descriptions/' . $model->description));
    }
}
