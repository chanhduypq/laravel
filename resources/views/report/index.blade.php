@extends('layouts.report')

@section('title', 'Thống kê')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <form method="POST" action="{{ route('class.store')}}">
                    <div class="form-row">
                        <label class="col-sm-1 col-form-label" for="excel">File excel:</label>
                        <input type="file" class="form-control col-sm-10" name="excel" id="excel"/>
                    </div>
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