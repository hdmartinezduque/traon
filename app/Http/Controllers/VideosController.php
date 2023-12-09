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
        $video->save();

        return redirect()->route('categories.index')->with('success', 'Creado exitosamente');

    }

    public function index(){
        $videos = Video::all();
        return view('videos.index', ['videos' => $videos]);
    }

    public function show($id){
        $video = Video::find($id);
        return view('video.show', ['video' => $video]);
    }

    public function update(Request $request, $id){
        $video = Video::find($id);
        $video->title = $request->title;
        $video->save();
        // return view('videos.index', ['success' => 'Actualizado correctamente']);
        return redirect()->route('videos')->with('success', 'Actualizado correctamente');
    }

    public function destroy($id){
        $video = Video::find($id);
        $video->delete();

        return redirect()->route('videos')->with('success', 'Se eliminado!');
    }

}
