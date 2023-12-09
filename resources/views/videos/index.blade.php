{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TRADING ONTOLOGICO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        
        }

        .color-container{
            width: 16px;
            height: 16px;
            display: inline-block;
            border-radius: 4px;
        }

        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> CLASES DE TRADING </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="#">Clases en vivo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Administrativo</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1> HOLA A TODOS BIENVENIDOS!! </h1>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/f9NtBrBP1-0?si=z07bWrLWu4ZkTO1l" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
     este <iframe width="560" height="315" src="https://www.youtube.com/embed/5SNseIGx3mE?si=E8QL_SHClT6ERKdS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
     este <iframe src="https://www.youtube.com/live_chat?v=5SNseIGx3mE&embed_domain=localhost" width="560" height="315"> </iframe>
</body>
</html> --}}

{{-- @extends('layouts.app') --}}
<x-app-layout>
@section('content')

<div class="container w-25 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{route('videos.store')}}">
        @csrf

        <div class="mb-3 col">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control mb-2" name="name" id="exampleFormControlInput1" placeholder="Nombre">
            <label for="link" class="form-label">Link de Youtube</label>
            <input type="text" class="form-control mb-2" name="link" id="exampleFormControlInput1" placeholder="Link">
            <label for="domain" class="form-label">Dominio</label>
            <input type="text" class="form-control mb-2" name="domain" id="exampleFormControlInput1" placeholder="Dominio">
            <label for="type" class="form-label">Tipo de Video</label>
            <input type="text" class="form-control mb-2" name="type" id="exampleFormControlInput1" placeholder="Type">

            {{-- <label for="category_id" class="form-label">Categoria de la tarea</label>
            <select name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select> --}}
            <x-primary-button>
                {{ __('Crear video') }}
            </x-primary-button>
            {{-- <input type="submit" value="Crear video" class="btn btn-dark" /> --}}
        </div>
    </form>

    <div>
        @foreach ($videos as $video)
        
            <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="#">{{ $video->name }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('videos.destroy', [$video->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
            
        @endforeach
    </div>


    <iframe width="560" height="315" src="https://www.youtube.com/embed/pp30YgrISPc?si=E8QL_SHClT6ERKdS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <iframe src="https://www.youtube.com/live_chat?v=5SNseIGx3mE&embed_domain=localhost" width="560" height="315"> </iframe>
    </div>
</div>
{{-- @endsection --}}
</x-app-layout>