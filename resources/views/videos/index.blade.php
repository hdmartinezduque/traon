<x-app-layout>
@section('content')

<div class="container w-60 border p-4">
    <div class="row mx-auto">
    <form  method="POST" action="{{route('videos.store')}}">
        @csrf

        <div class="mb-3 col">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @error('type')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @error('link')
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
            {{-- <label for="type" class="form-label">Tipo de Video</label>
            <input type="text" class="form-control mb-2" name="type" id="exampleFormControlInput1" placeholder="Type"> --}}

            <label for="type" class="form-label">Tipo de video</label>
            <select name="type" class="form-select">
                <option value="">Selecciona...</option>
                <option value="transmision">Transmision</option>
                <option value="video">Video</option>
            </select>
            <br>
            <x-primary-button>
                {{ __('Crear') }}
            </x-primary-button>
            {{-- <input type="submit" value="Crear video" class="btn btn-dark" /> --}}
        </div>
    </form>
</div>
<div class="container w-10 border p-4">
    <div>
        <!-- TRANSMISION -->
        <br>
        <h1 align="center"> TRANSMISION </h1>
        <br>
        @foreach ($transmisiones as $video)
            @if ($video->type == 'transmision' && $video->status == 'active' )
                <div class="row py-50 align-items-center">
                    <div class="col-md-9 d-flex align-items-center">
                        <h1> {{ $video->name }} </h1> <br>
                    </div>
                    <br>
                    <div class="col-md-9 d-flex align-items-center">
                        <?php $url = $video->link;
                                $url = $video->link;
                                $all_urls = explode("/", $video->link);
                                $link = $all_urls[4]; 
                        ?>
                        <iframe width="500" height="400"
                            src="https://www.youtube.com/embed/{{$link}}?modestbranding=1&rel=0&loop=1&playlist={{$link}}&autoplay=1" 
                            frameborder="0" allowfullscreen>
                            {{-- https://studio.youtube.com/video/xxxxxxxxx/livestreaming --}}
                        </iframe>

                        <iframe width="400" height="315" 
                            src="https://www.youtube.com/live_chat?v={{$link}}&embed_domain=localhost"> 
                        </iframe>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('videos.destroy', [$video->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endif
            
        @endforeach
        <br>
        <h1 align="center"> LISTA DE VIDEOS </h1>
        <br>
        <!-- VIDEOS -->
        @foreach ($videos as $video)
            @if ($video->type == 'video' && $video->status == 'active' )
                <div class="row py-50 align-items-center">
                    <div class="container w-100 border p-400">
                        <div class="col-md-2 d-flex align-items-center">
                            <h1> {{ $video->name }} </h1>
                        </div>
                        <div class="col-md-5 d-flex align-items-center">
                            <iframe width="250" height="180" 
                                src="{{$video->link}}"
                                title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen>
                            </iframe>
                        </div>
                        <div class="col-md-5 d-flex justify-content-end">
                            <form action="{{ route('videos.destroy', [$video->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        
        @endforeach
        <div>
            {{ $videos->links() }}            
        </div>
    </div>
</div>
{{-- @endsection --}}
</x-app-layout>