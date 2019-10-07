<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
	public function index(){
		$registros = Cliente::all();

		return view('clientes.home', compact('registros'));
	}

	public function salvar(Request $req) {
		$dados = $req->all();

		
		
		if (isset($dados['id'])) {
			$cliente = Cliente::find($dados['id']);
		$this->validacaoUpdate($req);
		} else {
			$cliente = new Cliente;
		$this->validacao($req);
		}
		$cliente->nome = $dados['nome'];
		$cliente->fantasia = $dados['fantasia'];
		$cliente->email = $dados['email'];
		$cliente->cnpj = $dados['cnpj'];
		$cliente->telefone = $dados['telefone'];
		$cliente->contato = $dados['contato'];
		$cliente->cidade = $dados['cidade'];
		$cliente->endereco = $dados['endereco'];
		$cliente->save();


		Session::flash('success', 'Cliente Cadastrado com Sucesso!');
		return redirect()->route('cliente.home');
	}

	public function editar($id){
		$registro = Cliente::find($id);

		return view('clientes.editar', compact('registro'));
	}

	public function deletar ($id){
		Cliente::find($id)->delete();
		Session::flash('success', 'Cliente Deletado com Sucesso!');
		return redirect()->route('cliente.home');
	}

	public function validacao (Request $req)
	{
		$dados = $req->all();

        //Validação Formulário
		$valid = [
			'nome'      => 'required|unique:clientes|min:3|max:100',
			'fantasia'  => 'required|min:3|max:100',
			'email'     => 'required|min:3|max:100',
			'cnpj'      => 'required|unique:clientes|min:3|max:100',
			'telefone'  => 'required|min:3|max:100',
			'contato'   => 'required|min:3|max:100',
			'cidade'    => 'required|min:3|max:100',
			'endereco'  => 'required|min:3|max:100',
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
	public function validacaoUpdate (Request $req)
	{
		$dados = $req->all();

        //Validação Formulário
		$valid = [
			'nome'      => 'required|min:3|max:100',
			'fantasia'  => 'required|min:3|max:100',
			'email'     => 'required|min:3|max:100',
			'cnpj'      => 'required|min:3|max:100',
			'telefone'  => 'required|min:3|max:100',
			'contato'   => 'required|min:3|max:100',
			'cidade'    => 'required|min:3|max:100',
			'endereco'  => 'required|min:3|max:100',
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
