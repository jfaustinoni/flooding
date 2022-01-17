@extends('home')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (!empty($message))
        <div class="alert alert-danger">
            <p class="mb-0">{{ $message }}</p>
        </div>
    @endif

    <div class="flooding-form">
        <form action="{{ route('processFlooding') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group d-flex flex-column mb-4">
                <label for="file">Enviar arquivo</label>
                <input type="file" name="file" class="form-control-file" id="file">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>


    @if (!empty($results))
        <div class="col-md-6 mt-4">
            <div class="h-100 p-5 text-white bg-dark rounded-3">
                <h4>Resultados</h4>
                <ul class="mb-0">
                    @foreach ($results as $result)
                        <li>{{ $result }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

@stop
