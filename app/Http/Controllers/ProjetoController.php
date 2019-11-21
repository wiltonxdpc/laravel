<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projetos;
use App\Models\Apoiador;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use DB;
class ProjetoController extends Controller
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
        $projetos = Projetos::all();
        $apoiador = Apoiador::all();
        $qtdapoiador = DB::table('projetos')->where('id_usuario',Auth::user()->id)->count();
        $verifica = DB::table('apoiadors')->where('id_projeto',$projeto->id_projeto)->get();
        $custo = DB::table('apoiadors')->where('id_projeto',$projeto->id_projeto)->get()->sum('custo');
        return view('home')->with(['projetos'=>$projetos,'apoiador'=>$apoiador]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Projetos::create($request->all());
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->file('img1')){
            $client = new Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
            $response = $client->request('POST', 'https://api.imgur.com/3/image', [
                    'headers' => [
                        'authorization' => 'Client-ID ' . '990108b9849e878',
                        'content-type' => 'application/x-www-form-urlencoded',
                    ],
            'form_params' => [
                        'image' => base64_encode(file_get_contents($request->file('img1')->path()))
                    ],
                ]);
             $data =response()->json(json_decode(($response->getBody()->getContents())));
             $url1 = $data->getData()->data->link;
       }else{
        $url1 = "https://i.imgur.com/v8T0MoP.jpg";
       }
        
    if($request->file('img2')){
        $client = new Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
            $response = $client->request('POST', 'https://api.imgur.com/3/image', [
                    'headers' => [
                        'authorization' => 'Client-ID ' . '990108b9849e878',
                        'content-type' => 'application/x-www-form-urlencoded',
                    ],
            'form_params' => [
                        'image' => base64_encode(file_get_contents($request->file('img2')->path()))
                    ],
                ]);
             $data =response()->json(json_decode(($response->getBody()->getContents())));
             $url2 = $data->getData()->data->link;
       }else{
        $url2 = "https://i.imgur.com/v8T0MoP.jpg";
       }
    
        DB::table('projetos')->insert(
    
    ['img1' => $url1,'img2' => $url2,'id_usuario'=>$request->input('id_usuario'),'nome'=>$request->input('nome'),'descricao'=>$request->input('descricao'),'custo'=>$request->input('custo'),'tempo'=>$request->input('tempo')]
);
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
        $projetos = Projetos::find($id);
        return view('home.index')->with(['projetos'=>$projetos]);
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
         if($request->file('img1')){
            $client = new Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
            $response = $client->request('POST', 'https://api.imgur.com/3/image', [
                    'headers' => [
                        'authorization' => 'Client-ID ' . '990108b9849e878',
                        'content-type' => 'application/x-www-form-urlencoded',
                    ],
            'form_params' => [
                        'image' => base64_encode(file_get_contents($request->file('img1')->path()))
                    ],
                ]);
             $data =response()->json(json_decode(($response->getBody()->getContents())));
             $url1 = $data->getData()->data->link;
       }else{
        $url1 = "https://i.imgur.com/v8T0MoP.jpg";
       }
        
    if($request->file('img2')){
        $client = new Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
            $response = $client->request('POST', 'https://api.imgur.com/3/image', [
                    'headers' => [
                        'authorization' => 'Client-ID ' . '990108b9849e878',
                        'content-type' => 'application/x-www-form-urlencoded',
                    ],
            'form_params' => [
                        'image' => base64_encode(file_get_contents($request->file('img2')->path()))
                    ],
                ]);
             $data =response()->json(json_decode(($response->getBody()->getContents())));
             $url2 = $data->getData()->data->link;
       }else{
        $url2 = "https://i.imgur.com/v8T0MoP.jpg";
       }
       DB::table('projetos')->where('id_projeto', $id)->update(
    
    ['img1' => $url1,'img2' => $url2,'id_usuario'=>$request->input('id_usuario'),'nome'=>$request->input('nome'),'descricao'=>$request->input('descricao'),'custo'=>$request->input('custo'),'tempo'=>$request->input('tempo'),'status'=>$request->input('status')]
);
        return redirect()->route('home.index'); 
     
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Projetos::where('id_projeto', $id)->delete();
        return redirect()->route('home.index');
    }
}
