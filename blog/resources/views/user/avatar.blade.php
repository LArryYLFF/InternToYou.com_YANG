@extends('layout.app')

@section('title', 'Modify Avatar')

@section('style')
    <style>

    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3">
                @include('common.user-menu', ['nav' => 'avatar'])
            </div>
            <div class="col-sm-9 p-0">
                <div class="card">
                    <div class="card-header bg-white fs-14">
                        Modify Avatar
                    </div>
                    <div class="card-body">
                        @include('common.error')
                        @include('common.success')
                        <form method="post" action="{{ route('user.avatar.update') }}" class="col-md-6 offset-3" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Please select an avatar and upload it</label>
                                <input name="avatar" type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm w-100 mt-4 bg-blue text-white">Modify</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection

