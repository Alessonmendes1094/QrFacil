<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Jobs\JobCadastroUsuario;
use App\Jobs\JobAlteracaoSenha;
use App\User;
use App\Role_User;
use App\Role;
use App\Grupo;
use App\Grupo_User;

class LoginController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function sair() {
		Auth::logout();
		return redirect()->route('cliente.home');
	}

	public function index() {
		$registros = User::all();
		return view('usuario.home', compact('registros'));        
	}

	public function salvar(Request $data) {
		$dados = $data->all();
        //Validação Formulário
		$this->validacao($data);

		if (isset($dados['id'])) {
			$user = User::find($dados['id']);
		} else {
			$user = new User;
		}
		$user->name = $data['name'];
		$user->email = $data['email'];
		$user->password = Hash::make($data['password']);
		$user->save();

		Session::flash('success', 'Usuario Cadastrado com Sucesso!');
		return redirect()->route('usuario.home');
	}

	public function editar($id) {
		$registro = User::find($id);
        //dd($registro);
		return view('usuario.editar', compact('registro'));        
	}
	public function deletar($id) {
		User::find($id)->delete();
		Session::flash('success', 'Usuario Deletado com Sucesso!');
		return redirect()->route('usuario.home');
	}

	public function validacao(Request $req){
		$dados = $req->all();

		$valid = [
			'name'                  => 'required|min:3|max:100',
			'email'                 => 'required|min:3|max:100',
			'password'             => 'min:3|max:100',
		];
		$messages = [
			'valor.required' => 'Deve ser informado pelo menos 1 Função!',
			'required' => 'O campo é de preenchimento obrigatório!',
			'min'      => 'O campo deve conter pelo menos 3 caracteres!',
			'max'      => 'O campo deve conter no maximo menos 100 caracteres!',
			'unique'   => "Conteúdo já cadastrado na bade de dados!"
		];
		$validacao = Validator($dados, $valid, $messages)->validate();
	}

	public function senha(){
		return view('usuario.senha');
	}

	public function alterarsenha(Request $request)
	{
		$input = $request->all();
		$password = $request['password'];

		if (! Hash::check($input['password'],Auth::user()->password)){
			return redirect()->route('usuario.senha')->withErrors(['password' => 'Senha atual está incorreta'])->withInput();
		}

		$user = DB::table('users')->select('name','email')->where('id', Auth::id())->get()->first();
		User::find(Auth::id())->update([
			'password' => Hash::make($input['password2']),
		]);
		
		Session::flash('success', 'Senha Alterada com Sucesso!');
		return redirect()->route('cliente.home');
        //dd($password , $id);
	}

}
