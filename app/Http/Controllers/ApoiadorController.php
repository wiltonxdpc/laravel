<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoiador;
class ApoiadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	 $apoiarprojeto= DB::table('projetos')->where([['id_usuario','!=',Auth::user()->id],['status','ativo']])->count();
        $apoiador = DB::table('apoiadors')->join('projetos', 'apoiadors.id_projeto', '=', 'projetos.id_projeto')->join('users', 'apoiadors.id_usuario', '=', 'users.id')->where('users.id','=',Auth::user()->id)->distinct()->select('apoiadors.id_projeto','projetos.nome','projetos.nome','projetos.descricao','projetos.tempo','projetos.custo','projetos.img1','projetos.img2','projetos.status','apoiadors.id_usuario')->get();
        $qtdapoiado = DB::table('apoiadors')->where([['id_projeto', '=', $apoios->id_projeto],['id_usuario', '=',Auth::user()->id]])->get()->sum('apoiadors.custo');
        $verificaapoio = DB::table('apoiadors')->where('id_projeto',$projeto->id_projeto)->get();
        $apoiados = DB::table('apoiadors')->where('id_projeto',$projeto->id_projeto)->get()->sum('custo');
          return redirect()->route('home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       	  Apoiador::create($request->all());
          return redirect()->route('home.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Apoiador::create($request->all());
      return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
