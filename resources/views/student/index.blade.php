@extends('layouts.school_manager')

@section('title', 'Student')

@section('script_page')
<script type="text/javascript">
    $('form').find('img, button, a, input[type="button"], input[type="submit"]').click(function (e) {
        $(this).parents('form').submit();
    });
</script>
@endsection 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                Tên
                            </th>
                            <th>
                                Lớp
                            </th>
                            <th>
                                Ảnh đại diện
                            </th>
                            <th>
                                Thông tin chi tiết của sinh viên
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $class)
                        <tr>
                            <td>
                                {{ $class->name }}
                            </td>
                            <td>
                                {{ $class->classes->name }}
                            </td>
                            <td> 
                                <img style="width: 50px;height: 50px;" src="{{ url('storage/photos/'.$class->photo) }}" alt="" title="" />
                            </td>
                            <td>
                                <a href="{{ route('student.download', [$class->id]) }}">Download</a>
                            </td>
                            <td>
                                <div class="row text-center">
                                    <div class="col-sm-3">
                                        <a href="{{ route('student.edit', ['primaryKeyValue' => $class->id]) }}">
                                            <img class="icon_manage" title="Edit" src="{{ URL::asset('images/icon/ico_edit.png') }}">
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <form action="{{ route('student.destroy', [$class->id])}}" method="post">
                                            <img class="icon_manage" title="Delete" src="{{ URL::asset('images/icon/delete-icon.png') }}">
                                            @csrf 
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
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