@extends('layouts.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
          <br>
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
    <nav>
      <?php $apoiador = DB::table('apoiadors')->join('projetos', 'apoiadors.id_projeto', '=', 'projetos.id_projeto')->join('users', 'apoiadors.id_usuario', '=', 'users.id')->where('users.id','=',Auth::user()->id)->distinct()->select('apoiadors.id_projeto','projetos.nome','projetos.nome','projetos.descricao','projetos.tempo','projetos.custo','projetos.img1','projetos.img2','projetos.status','apoiadors.id_usuario')->get(); $count=0;?>
                @foreach($apoiador as $apoios)
                <?php $count++;?>
                @endforeach
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Meus Projetos <span class="badge badge-success">@foreach($qtdapoiado as qtdapoiador) {{$qtdapoiador}} @endofreach</span></a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Projetos Apoiados <span class="badge badge-warning" style="color: white">{{$count}}</span></a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Apoiar Projetos <span class="badge badge-info">@foreach{{$apoiarprojeto}}@endofreach</span></a>
      </div>
    </nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <br>
    <table id="example" style="width:100%">
        <thead>
            <tr>
              <th></th>
            </tr>
        </thead>

        <tbody>
          @foreach($projetos as $projeto)
          @if ($projeto->id_usuario== Auth::user()->id)
          <tr>
            <td>
              <div class="card" style="margin-bottom: 2%;border-color: green;" >
                <div class="row no-gutters">
                  <div class="col-md-4">
                      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
                  <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="{{$projeto->img1}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{$projeto->img2}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                  </div>
                </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h4 >{{$projeto->nome}}</h4>
                                  <div style="text-align:justify;">
                                  {{$projeto->descricao}}
                                  </div> 
                                  <div style="font-size: 1.5vw;">
                                    <span class="badge badge-secondary">Custo: R$ {{$projeto->custo}}</span> 
                                    <span class="badge badge-info">Tempo: {{$projeto->tempo}}</span> 
                                    <span class="badge badge-warning" style="color: white">
                                    @if ($verifica)
                                       Arrecadado R$ {{$custo}},00
                                    @else
                                        Arrecadado: 0
                                    @endif
                                    </span>
                                    @if($projeto->status=='ativo')
                                      <span class="badge badge-success">Projeto Ativo</span>
                                    @else
                                      <span class="badge badge-danger">Projeto Inativo</span>
                                    @endif
                                  </div>
                                  <form action="{{route('home.destroy',['projetos'=>$projeto->id_projeto])}}" class="form-horizontal" method="POST">
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  {{ method_field('DELETE') }}
                                  <button  type="submit"style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-danger"><i class="fa fa-times"></i> Excluir Projeto</button>
                                  </form>
                                  <a href="#edit{{old('projetos',$projeto->id_projeto)}}" data-toggle="modal"><button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</button></a>
      </div>
    </div>
  </div>
</div></td></tr>
   <div class="modal fade" id="edit{{old('projetos',$projeto->id_projeto)}}">  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar {{$projeto->nome}}:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('home.update',['projetos'=>$projeto->id_projeto])}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
       {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-12">
      Nome: <input type="text" class="form-control" name="nome"  value="{{old('projetos',$projeto->nome)}}"placeholder="Nome">
    </div>
            <div class="col-md-6">
      Tempo: <input type="text" class="form-control" name="tempo" value="{{old('projetos',$projeto->nome)}}" placeholder="Tempo">
    </div>
            <div class="col-md-6">
      Custo: <input type="text" class="form-control" name="custo" value="{{old('projetos',$projeto->nome)}}"placeholder="Custo">
    </div>
  
        </div>
            <div class="row">
            <div class="col-12">
      Descrição: <textarea cols="76"  rows="10"class="form-control col-md-12" style="resize: none;" name="descricao">{{old('projetos',$projeto->nome)}}</textarea>
    </div>
    

        </div><br>
          <div class="row">
            <div class="col-12">
       Imagem1 :<input name="img1"  type="file" class="form-control" ><br>
       Imagem2 : <input name="img2"  type="file" class="form-control">
       <input type="text" value="{{ Auth::user()->id}}" name="id_usuario" hidden>
    </div>
         
      


        </div>
          <div class="row">
            <div class="col-6">
      Status: <select name="status" class="form-control">
        <option value="ativo">Ativo</option>
        <option value="inativo">Inativo</option>
      </select>
    </div>
           
           <br><br><br>
            <button class="btn btn-success" style="margin-left: 32%"><i class="fa fa-plus"></i> Cadastrar</button> 
            <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
        </div>

    </form>
      </div>
    </div>
  </div>
</div>
@endif
@endforeach           
        </tbody>
    </table>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
     <br>
    <table id="example2" style="width:100%">
        <thead>
            <tr>
              <th></th>
            </tr>
        </thead>
        
        <tbody>
                         

          
                @foreach($apoiador as $apoios)
                  @if($apoios->id_usuario==Auth::user()->id)
          <tr>
            <td>
              <div class="card" style="margin-bottom: 2%;border-color: yellow" >
                <div class="row no-gutters">
                  <div class="col-md-4">
                      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
                  <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="{{$apoios->img1}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{$apoios->img2}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                  </div>
                </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h4 >{{$apoios->nome}}</h4>
                                  <div style="text-align:justify;">
                                  {{$apoios->descricao}}
                                  </div> 
                                  <div style="font-size: 1.5vw;">
                                    <span class="badge badge-secondary">Custo: {{$apoios->custo}}</span> 
                                    <span class="badge badge-info">Tempo: {{$apoios->tempo}}</span> 
                                    <span class="badge badge-success"> Arrecadado R$ {{$custo}},00</span>
                                   
                                  </div>
                                  <div style="font-size: 1.5vw;">
                                    <span class="badge badge-success">Projeto {{$apoios->status}} | Apoiado com R$  {{$qtdapoiado}},00</span>
                                  </div>
                                  
      </div>
    </div>
  </div>
</div></td></tr>
  @endif
@endforeach


          
           
        </tbody>
    </table>
  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <br>
    <table id="example1" style="width:100%">
        <thead>
            <tr>
              <th></th>
            </tr>
        </thead>
        
        <tbody>
          @foreach($projetos as $projeto)
          @if ($projeto->id_usuario!= Auth::user()->id And $projeto->status!='inativo')
          <tr>
            <td>
              <div class="card" style="margin-bottom: 2%;border-color: #17a2b8" >
                <div class="row no-gutters">
                  <div class="col-md-4">
                      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
                  <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="{{$projeto->img1}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{$projeto->img2}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                  </div>
                </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h4 >{{$projeto->nome}}</h4>
                                  <div style="text-align:justify;">
                                  {{$projeto->descricao}}
                                  </div> 
                                  <div style="font-size: 1.5vw;">
                                    <span class="badge badge-secondary">Custo: R$ {{$projeto->custo}}</span> 
                                    <span class="badge badge-info">Tempo: {{$projeto->tempo}}</span> 
                                    <span class="badge badge-success"> @if ($verificaapoio)
                                       Arrecadado R$ {{$apoiados}},00
                                    @else
                                        Arrecadado: 0
                                    @endif</span>
                                    <span class="badge badge-success">Projeto Ativo</span>
                                  </div>
                                  
                                  <form method="post" action="{{route('apoiar.store')}}"> 
                                    {{ csrf_field() }}
                                    
                                    <input type="text" class="form-control" style="margin-top: 10.5%; margin-left: 1%; float:right" name="id_usuario" hidden   value="{{ Auth::user()->id}}">
                                    <input type="text" class="form-control" style="margin-top: 10.5%; margin-left: 1%; float:right" name="id_projeto" hidden value="{{$projeto->id_projeto}}">
                                    <input type="text" class="form-control col-md-5" style="size:10px;margin-top: 7.5%; margin-left: 1%; float:right" name="custo" placeholder="Colocaborar com">
                                  
                                  <button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-success"><i class="fa fa-credit-card"></i> Colaborar</button>
                                  </form>
      </div>
    </div>
  </div>
</div></td></tr>

@endif
@endforeach   
          
           
        </tbody>
    </table>
  </div>
</div>
                   
  </div>
</div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fab">
  <button class="main" data-toggle="modal" data-target=".bd-example-modal-lg22">
  </button>
</div>

<div class="modal fade bd-example-modal-lg22" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criar um novo projeto:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('home.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-12">
      Nome: <input type="text" class="form-control" name="nome" placeholder="Nome">
    </div>
            <div class="col-md-12">
      Tempo: <input type="text" class="form-control" name="tempo" placeholder="Tempo">
    </div>
            <div class="col-md-12">
      Custo: <input type="text" class="form-control" name="custo" placeholder="Custo">
    </div>
  
        </div>
            <div class="row">
            <div class="col-12">
      Descrição: <textarea cols="76" class="form-control col-md-12"  rows="10" style="resize: none;" name="descricao"></textarea>
    </div>

        </div><br>
          <div class="row">
            <div class="col-12">
       Imagem1 :<input name="img1"  type="file" class="form-control" title="oi"><br>
       Imagem2 : <input name="img2"  type="file" class="form-control" title="oi">
       <input type="text" value="{{ Auth::user()->id}}" name="id_usuario" hidden>
    </div>
         
      


        </div>
           
           <br><br>
            <button class="btn btn-success" style="margin-left: 32%"><i class="fa fa-plus"></i> Cadastrar</button>
            <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
        </div>

    </form>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
  .fab{
  position: fixed;
  bottom:10px;
  right:10px;
}

.fab button{
  cursor: pointer;
  width: 48px;
  height: 48px;
  border-radius: 30px;
  background-color: #28a5;
  border: none;
  box-shadow: 0 1px 5px rgba(0,0,0,.4);
  font-size: 24px;
  color: white;

  -webkit-transition: .2s ease-out;
  -moz-transition: .2s ease-out;
  transition: .2s ease-out;
}

.fab button:focus{
  outline: none;
}

.fab button.main{
  position: absolute;
  width: 60px;
  height: 60px;
  border-radius: 30px;
  background-color: #28a745;
  right: 0;
  bottom: 0;
  z-index: 20;
}

.fab button.main:before{
  content: '+';
}


</style>
<script type="text/javascript">
  $(document).ready(function() {
        $('#example').dataTable( {
            "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
       "lengthMenu": [[3]],
"filter":false,
        "autoWidth": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
            }
        } );
         $('#example1').dataTable( {
            "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
       "lengthMenu": [[3]],
"filter":false,
        "autoWidth": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
            }
        } );
          $('#example2').dataTable( {
            "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
       "lengthMenu": [[3]],
"filter":false,
        "autoWidth": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"
            }
        } );
    } );
</script>
@endsection
