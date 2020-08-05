@extends('layouts.school_manager')

@section('title', 'Student')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <form method="POST" action="{{ route('student.store')}}" enctype="multipart/form-data">
                    <div class="form-row">
                        <label class="col-sm-1 col-form-label" for="name">Name:</label>
                        <input type="text" class="form-control col-sm-10{{ $errors->has('name')?' is-invalid':'' }}" name="name" id="name" value="{{ old('name') }}"/>
                    </div>
                    @if ($errors->has('name')) 
                        <div class="row">&nbsp;</div>
                        <div class="form-row">
                            <label class="col-sm-1 col-form-label">&nbsp;</label>
                            <div class="form-control col-sm-10 text-danger">{{ $errors->first('name') }}</div>
                        </div>    
                    @endif
                    <div class="row">&nbsp;</div>    
                    <div class="form-row">
                        <label class="col-sm-1 col-form-label" for="classes_id">Lớp:</label>
                        <select class="form-control col-sm-10" name="classes_id">
                            <option value="">Chọn lớp</option>
                            @foreach ($classes as $class)
                            <option value="{{ $class->id }}"<?php if(old('classes_id') == $class->id) echo ' selected'; ?>> 
                                    {{ $class->name }} 
                                </option>
                            @endforeach    
                        </select>
                    </div>
                    @if ($errors->has('classes_id')) 
                        <div class="row">&nbsp;</div>
                        <div class="form-row">
                            <label class="col-sm-1 col-form-label">&nbsp;</label>
                            <div class="form-control col-sm-10 text-danger">{{ $errors->first('classes_id') }}</div>
                        </div>    
                    @endif
                    <div class="row">&nbsp;</div>
                    <div class="form-row">
                        <label class="col-sm-1 col-form-label" for="photo">Photo: </label>
                        <input type="file" class="form-control col-sm-10{{ $errors->has('photo')?' is-invalid':'' }}" name="photo" id="photo"/>
                    </div>
                    @if ($errors->has('photo')) 
                        <div class="row">&nbsp;</div>
                        <div class="form-row">
                            <label class="col-sm-1 col-form-label">&nbsp;</label>
                            <div class="form-control col-sm-10 text-danger">{{ $errors->first('photo') }}</div>
                        </div>    
                    @endif
                    <div class="row">&nbsp;</div>
                    <div class="form-row">
                        <label class="col-sm-1 col-form-label" for="description">Mô tả: </label>
                        <input type="file" class="form-control col-sm-10{{ $errors->has('description')?' is-invalid':'' }}" name="description" id="description"/>
                    </div>
                    @if ($errors->has('description')) 
                        <div class="row">&nbsp;</div>
                        <div class="form-row">
                            <label class="col-sm-1 col-form-label">&nbsp;</label>
                            <div class="form-control col-sm-10 text-danger">{{ $errors->first('description') }}</div>
                        </div>    
                    @endif
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col text-center">
                            <input type="submit" value="Save"/>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>

        </div>
    </div>
</div>
@endsection