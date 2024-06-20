<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TypesController extends Controller
{

    public function dashboard()
{
    $types = Type::all(); 

    return view('dashboard', [
        'types' => $types
    ]);
}

    #https://laravel.com/docs/11.x/eloquent#retrieving-models
    public function index() {
        return view('types.index', ['types' => Type::all()]);
        #aqui falar sobre outros tipos de query
        #return view('types.index', ['types' => Type::where('name', 'like', '%a%')->orderByDesc('name')->get()]);
        #$types = Type::where('name', 'like', '%a%')->orderByDesc('name')->get();
    }

    //abre o formulário vazio para um novo registro
    public function create() {
        return view('types.create');
    }

    //função chamada no submit do form..será um POST com os dados
    public function store(Request $request)
    {
        //dd($request->all());return;

        $request->validate([
            'name' => 'required|min:2|max:20',
        ]);

        Type::create([
            'name' => $request->name,
        ]);

        return redirect('/types')->with('success', 'Tipo salvo com sucesso!');
    }

    public function edit($id) {
        //find é o método que faz select * from types where id= ?
        $type = Type::find($id);
        //retornamos a view passando a TUPLA de tipo consultado
        return view('types.edit', ['type' => $type]);
    }

    public function update(Request $request) {
        $type = Type::find($request->id);
        $type->update([
            'name' => $request->name,
        ]);
        return redirect('/types')->with('success', 'Tipo atualizado com sucesso!');
    }

    public function destroy($id)
{
    $type = Type::find($id);

    if (!$type) {
        return redirect('/types')->with('error', 'Tipo não encontrado.');
    }

    try {
        $type->delete();
        return redirect('/types')->with('success', 'Tipo excluído com sucesso!');
    } catch (\Illuminate\Database\QueryException $e) {
        if ($e->getCode() == '23000') { // Código de erro para violação de chave estrangeira
            return redirect('/types')->with('error', 'Não é possível excluir o tipo porque ele está sendo usado em algum produto.');
        }
        return redirect('/types')->with('error', 'Ocorreu um erro ao tentar excluir o tipo.');
    }
}

}