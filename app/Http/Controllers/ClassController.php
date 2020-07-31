<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Classes::paginate(5);
        return view('classes.index', array('items' => $items));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('classes.create');
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
        $model = new Classes();
        $rules = [
            'name' => [
                'required',
                'max:30',
                'min:2',
                'unique:classes',
            ],
        ];
        $validattionErrorMessages = [
            'name.required' => 'Vui lòng nhập tên lớp.',
            'name.max' => 'Tên lớp không được dài quá 30 kí tự',
            'name.min' => 'Tên lớp không được ít hơn 2 kí tự',
            'name.unique' => 'Đã tồn tại lớp học mang tên này rồi',
        ];
        $validator = Validator::make($request->all(), $rules, $validattionErrorMessages);

        if ($validator->fails()) {
            return redirect('class/create')
                            ->withErrors($validator->errors())
                            ->withInput();
        } else {
            /**
             * save on database
             */
            $columnsInTable = \Illuminate\Support\Facades\Schema::getColumnListing('classes');
            foreach ($request->all() as $key => $value) {
                if(in_array($key, $columnsInTable)){
                    $model->$key = $value;
                }
            }
            $model->save();
            //
            return redirect('class');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes  $classes, $primaryKeyValue)
    {
        $model = Classes::find($primaryKeyValue);
        /**
         * if the item has been removed
         */
        if ($model == null) {
            return redirect('class');
        }

        return view('classes.edit', ['item' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $primaryKeyValue)
    {
        $model = Classes::find($primaryKeyValue);
        /**
         * if the item has been removed
         */
        if ($model == null) {
            return redirect('class');
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
        ];
        $rules['name'][] = Rule::unique('classes')->ignore($primaryKeyValue, 'id');
        
        $validattionErrorMessages = [
            'name.required' => 'Vui lòng nhập tên lớp.',
            'name.max' => 'Tên lớp không được dài quá 30 kí tự',
            'name.min' => 'Tên lớp không được ít hơn 2 kí tự',
            'name.unique' => 'Đã tồn tại lớp học mang tên này rồi',
        ];
        

        $validator = Validator::make($request->all(), $rules, $validattionErrorMessages);
        
        if ($validator->fails()) {
            return redirect('class/edit/' . $primaryKeyValue)
                            ->withErrors($validator->errors())
                            ->withInput();
        } else {
            /**
             * save on database
             */
            $columnsInTable = \Illuminate\Support\Facades\Schema::getColumnListing('classes');
            foreach ($request->all() as $key => $value) {
                if(in_array($key, $columnsInTable)){
                    $model->$key = $value;
                }
            }
            $model->save();
            //
            return redirect('class');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes, $primaryKeyValue)
    {
        $model = Classes::find($primaryKeyValue);
        /**
         * if the item has been removed
         */
        if ($model == null) {
            return redirect('class');
        }
        /**
         * delete record on database
         */
        try {
            $model->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('class');
        }


        return redirect('class');
    }
}
