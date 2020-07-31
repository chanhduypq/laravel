@extends('layouts.school_manager')

@section('title', 'Class')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                                Name
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $class)
                        <tr>
                            <td>
                                {{ $class->id }}
                            </td>
                            <td>
                                {{ $class->name }}
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>

                </table>
            </div>

            </form>
            <div class="row">
                <div class="col-sm-5">&nbsp;</div>
                <div class="col-sm-6">
                    {{ $items->links() }}
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
    </div>
</div>
@endsection