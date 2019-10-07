<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Link;
use App\Cliente;

class LinksController extends Controller
{
    public function index($cliente){

    	$id = Cliente::where('nome','=',$cliente)->value('id');
		$registros = link::where('cliente_id','=',$id)->get();
    	//dd($cliente , $registros);

		return view('link.home', compact('registros','cliente'));
	}

	public function salvar(Request $req , $cliente) {
		$id = Cliente::where('nome','=',$cliente)->value('id');
		$dados = $req->all();
		//dd($dados,$cliente);
		$this->validacao($req);

		if (isset($dados['id'])) {
			$link = link::find($dados['id']);
		} else {
			$link = new link;
		}
		$link->titulo = $dados['titulo'];
		$link->url 	= $dados['url'];
		$link->cliente_id = $id;
		$link->save();


		Session::flash('success', 'Link Cadastrado com Sucesso!');
		return redirect()->route('link.home' , $cliente);
	}

	public function editar($cliente,$req){
		$registro = Link::find($req);

		return view('link.editar', compact('registro', 'cliente'));
	}

	public function deletar ($cliente , $id){		
		Link::find($id)->delete();
		Session::flash('success', 'link Deletado com Sucesso!');
		return redirect()->route('link.home' , $cliente);
	}

	public function acesso($cliente,$req){
		$id = Cliente::where('nome','=',$cliente)->value('id');
		$registro = Link::where('titulo','=',$req)->first();
		//dd($cliente,$req,$registro);

		return view('link.pagina', compact('registro'));
	}

	public function validacao (Request $req)
	{
		$dados = $req->all();

        //Validação Formulário
		$valid = [
			'titulo'    => 'required|min:3|max:100',
			'url'  		=> 'required|min:3|max:500',
		];
		$messages = [
			'required' => 'O campo é de preenchimento obrigatório!',
			'min'      => 'O campo deve conter pelo menos 3 caracteres!',
			'max'      => 'O campo deve conter no maximo menos 100 caracteres!',
			'unique'   => 'Conteúdo já cadastrado na bade de dados!',
			'date'     => 'A Data não é valida!',
		];
		$validacao = Validator($dados, $valid, $messages)->validate();   
	}
}
