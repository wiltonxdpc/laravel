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
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Meus Projetos <span class="badge badge-success"> 4</span></a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Projetos Apoiados</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Apoiar Projetos</a>
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
          <tr>
            <td>
              <div class="card" style="margin-bottom: 2%" >
                <div class="row no-gutters">
                  <div class="col-md-4">
                      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
                  <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="{{asset('storage/logo1.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('storage/logo.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                  </div>
                </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h4 >Middle aligned media</h4>
                                  <div style="text-align:justify;">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
                                  </div> 
                                  <div style="font-size: 1.5vw;">
                                    <span class="badge badge-secondary">Custo: R$ 3000,00</span> 
                                    <span class="badge badge-info">Tempo: 6 meses</span> 
                                    <span class="badge badge-success">Arrecadado: R$ 1000,00</span>
                                    <span class="badge badge-success">Projeto Ativo</span>
                                  </div>
                                  <button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-danger"><i class="fa fa-times"></i> Encerrar Projeto</button>
                                  
                                  <button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</button>
      </div>
    </div>
  </div>
</div></td></tr>

<tr>
            <td>
              <div class="card"  style="margin-bottom: 2%" >
                <div class="row no-gutters">
                  <div class="col-md-4">
                      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
                  <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="{{asset('storage/logo1.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('storage/logo.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                  </div>
                </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h4 >Middle aligned media</h4>
                                  <div style="text-align:justify;">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
                                  </div> 
                                  <div style="font-size: 1.5vw;">
                                    <span class="badge badge-secondary">Custo: R$ 3000,00</span> 
                                    <span class="badge badge-info">Tempo: 6 meses</span> 
                                    <span class="badge badge-success">Arrecadado: R$ 1000,00</span>
                                    <span class="badge badge-success">Projeto Ativo</span>
                                  </div>
                                  <button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-danger"><i class="fa fa-times"></i> Encerrar Projeto</button>
                                  
                                  <button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</button>
      </div>
    </div>
  </div>
</div></td></tr>

<tr>
            <td>
              <div class="card" style="margin-bottom: 2%" >
                <div class="row no-gutters">
                  <div class="col-md-4">
                      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
                  <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="{{asset('storage/logo1.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('storage/logo.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                  </div>
                </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h4 >Middle aligned media</h4>
                                  <div style="text-align:justify;">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
                                  </div> 
                                  <div style="font-size: 1.5vw;">
                                    <span class="badge badge-secondary">Custo: R$ 3000,00</span> 
                                    <span class="badge badge-info">Tempo: 6 meses</span> 
                                    <span class="badge badge-success">Arrecadado: R$ 1000,00</span>
                                    <span class="badge badge-success">Projeto Ativo</span>
                                  </div>
                                  <button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-danger"><i class="fa fa-times"></i> Encerrar Projeto</button>
                                  
                                  <button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</button>
      </div>
    </div>
  </div>
</div></td></tr>

<tr>
            <td>
              <div class="card" style="margin-bottom: 2%" >
                <div class="row no-gutters">
                  <div class="col-md-4">
                      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
                  <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="{{asset('storage/logo1.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('storage/logo.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                  </div>
                </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h4 >Middle aligned media</h4>
                                  <div style="text-align:justify;">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
                                  </div> 
                                  <div style="font-size: 1.5vw;">
                                    <span class="badge badge-secondary">Custo: R$ 3000,00</span> 
                                    <span class="badge badge-info">Tempo: 6 meses</span> 
                                    <span class="badge badge-success">Arrecadado: R$ 1000,00</span>
                                    <span class="badge badge-success">Projeto Ativo</span>
                                  </div>
                                  <button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-danger"><i class="fa fa-times"></i> Encerrar Projeto</button>
                                  
                                  <button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</button>
      </div>
    </div>
  </div>
</div></td></tr>

<tr>
            <td>
              <div class="card" style="margin-bottom: 2%" >
                <div class="row no-gutters">
                  <div class="col-md-4">
                      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
                  <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="{{asset('storage/logo1.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('storage/logo.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                  </div>
                </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h4 >Middle aligned media</h4>
                                  <div style="text-align:justify;">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
                                  </div> 
                                  <div style="font-size: 1.5vw;">
                                    <span class="badge badge-secondary">Custo: R$ 3000,00</span> 
                                    <span class="badge badge-info">Tempo: 6 meses</span> 
                                    <span class="badge badge-success">Arrecadado: R$ 1000,00</span>
                                    <span class="badge badge-success">Projeto Ativo</span>
                                  </div>
                                  <button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-danger"><i class="fa fa-times"></i> Encerrar Projeto</button>
                                  
                                  <button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</button>
      </div>
    </div>
  </div>
</div></td></tr>
          
           
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
          <tr>
            <td>
              <div class="card" style="margin-bottom: 2%" >
                <div class="row no-gutters">
                  <div class="col-md-4">
                      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
                  <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="{{asset('storage/logo1.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('storage/logo.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                  </div>
                </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h4 >Middle aligned media</h4>
                                  <div style="text-align:justify;">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
                                  </div> 
                                  <div style="font-size: 1.5vw;">
                                    <span class="badge badge-secondary">Custo: R$ 3000,00</span> 
                                    <span class="badge badge-info">Tempo: 6 meses</span> 
                                    <span class="badge badge-success">Arrecadado: R$ 1000,00</span>
                                   
                                  </div>
                                  <div style="font-size: 1.5vw;">
                                    <span class="badge badge-success">Projeto Ativo | Apoiado com R$ 30,00</span>
                                  </div>
                                  
      </div>
    </div>
  </div>
</div></td></tr>


          
           
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
          <tr>
            <td>
              <div class="card" style="margin-bottom: 2%" >
                <div class="row no-gutters">
                  <div class="col-md-4">
                      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" >
                  <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="{{asset('storage/logo1.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="{{asset('storage/logo.png')}}" height="300px" width="300px" class="d-block w-100" alt="...">
                    </div>
                  </div>
                </div>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h4 >Middle aligned media</h4>
                                  <div style="text-align:justify;">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
                                  </div> 
                                  <div style="font-size: 1.5vw;">
                                    <span class="badge badge-secondary">Custo: R$ 3000,00</span> 
                                    <span class="badge badge-info">Tempo: 6 meses</span> 
                                    <span class="badge badge-success">Arrecadado: R$ 1000,00</span>
                                    <span class="badge badge-success">Projeto Ativo</span>
                                  </div>
                                  <button style="margin-top: 7.5%; margin-left: 1%; float:right" class="btn btn-success"><i class="fa fa-credit-card"></i> Apoiar</button>
                                  <input type="text" class="form-control" size="10" style="margin-top: 7.5%; margin-left: 1%; float:right; width: 30%" name="">
                                  
      </div>
    </div>
  </div>
</div></td></tr>


          
           
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
  <button class="main" data-toggle="modal" data-target=".bd-example-modal-lg">
  </button>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
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
