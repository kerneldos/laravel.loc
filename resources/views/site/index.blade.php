@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="{{ route('import_parse') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="csv_file" class="form-label">CSV file to import</label>
                    <input id="csv_file" type="file" class="form-control" name="csv_file" required>
                </div>

                <button type="submit" class="btn btn-primary">Parse CSV</button>
            </form>
        </div>
    </div>

    @if(!empty($message))
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="alert alert-primary" role="alert">
                    {{ $message }}
                </div>
            </div>
        </div>
    @endif
@endsection