@extends('layouts.school_manager')

@section('title', 'Class')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <form method="POST" action="{{ route('class.update', ['primaryKeyValue' => $item->id])}}">
                    <div class="form-row">
                        <label class="col-sm-1 col-form-label" for="name">Title:</label>
                        <input type="text" class="form-control col-sm-10{{ $errors->has('name')?' is-invalid':'' }}" name="name" id="name" value="{{ old('name',$item->name) }}"/>

                    </div>
                    @if ($errors->has('name')) 
                        <div class="row">&nbsp;</div>
                        <div class="form-row">
                            <label class="col-sm-1 col-form-label">&nbsp;</label>
                            <div class="form-control col-sm-10 text-danger">{{ $errors->first('name') }}</div>
                        </div>    
                    @endif
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col text-center">
                            <input type="submit" value="Save"/>
                        </div>
                    </div>
                    @csrf
                    @method('PUT')
                </form>
            </div>

        </div>
    </div>
</div>
@endsection