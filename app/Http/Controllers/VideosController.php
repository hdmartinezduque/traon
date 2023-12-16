<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideosController extends Controller
{

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'link' => 'required',
            'type' => 'required',
            'domain' => 'required',
        ]);

        $video = new Video;
        $video->name = $request->name;
        $video->link = $request->link;
        $video->type = $request->type;
        $video->domain = $request->domain;
        if ($video->type == 'transmision') {
            Video::where('type', 'transmision')
                ->where('status', 'active')->update(['status'=>'inactive']);
        }
        $video->save();

        return redirect()->route('videos.index')->with('success', 'Creado correctamente');

    }

    public function index(){
        $transmisiones = Video::all();
        $videos = Video::paginate(3);
        return view('videos.index', ['videos' => $videos, 'transmisiones' => $transmisiones]);
    }

    public function show($id){
        $video = Video::find($id);
        return view('video.show', ['video' => $video]);
    }

    public function update(Request $request, $id){
        $video = Video::find($id);
        $video->title = $request->title;
        $video->save();
        
        return redirect()->route('videos')->with('success', 'Actualizado correctamente');
    }

    public function destroy($id){
        $video = Video::find($id);
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Se ha eliminado!');
    }

}
