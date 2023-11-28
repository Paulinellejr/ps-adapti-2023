<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCursoRequest;
use App\Http\Requests\UpdateCursoRequest;
use Illuminate\Http\Request;

use App\Models\curso;

use App\Models\Categoria;

class CursoController extends Controller
{

    private $cursos;

    public function __construct(curso $curso)
    {
        $this->cursos = $curso;
    }

    public function index()
    {
        $cursos = $this->cursos->all();
        return view('admin.curso.index', compact('cursos'));
    }


    public function create()
    {
        return view('admin.curso.crud');
    }


    public function store(StoreCursoRequest $request)
    {
        $data = $request->all();
        $this->cursos->create($data);
        return redirect()->route('curso.index')->with('success', 'Curso cadastrado com sucesso.');
    }

    public function show($id)
    {
        $curso = $this->cursos->find($id);
        return response()->json($curso);
    }

    public function edit($id)
    {
        $curso = $this->cursos->find($id);
        return view('admin.curso.crud', compact('curso'));
    }

    public function update(UpdateCursoRequest $request, $id)
    {
        $data = $request->all();
        $curso = $this->cursos->find($id);
        $curso->update($data);
        return redirect()->route('curso.index')->with('success', 'Curso atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $curso = $this->cursos->find($id);
        $curso->delete();
        return redirect()->route('curso.index')->with('success', 'Curso deletado com sucesso.');
    }
}
