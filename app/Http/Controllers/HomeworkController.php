<?php

namespace App\Http\Controllers;

use App\Mail\CorreoMailable;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Mail;

class HomeworkController extends Controller
{
    public function getHomework(){
        $tarea = Tarea::where('id_usuario', '=', auth()->user()->id)->simplePaginate(5);
        return view('home', compact('tarea'));
    }

    public function addHomework(Request $request, Redirector $redirect ){
        $request->validate([
            'titulo' => ['required', 'string'],
            'descripcion' => ['required', 'string'],
            'fecha_vencimiento' => ['required']
        ]);

        $tarea = new Tarea();
        $tarea->titulo=$request->titulo;
        $tarea->descripcion=$request->descripcion;
        $tarea->fecha_vencimiento=$request->fecha_vencimiento;
        $tarea->id_usuario=auth()->user()->id;
        $tarea->completado=0;

        $tarea->save();
        Mail::to(auth()->user()->email)->send(new CorreoMailable($request->titulo, $request->descripcion, $request->fecha_vencimiento));

        return $redirect->to('/home');

    }

    public function setHomework($id, Redirector $redirect ){
        $tarea = Tarea::find($id);
        $tarea->completado=1;
        $tarea->save();
        return $redirect->back();
    }
}
