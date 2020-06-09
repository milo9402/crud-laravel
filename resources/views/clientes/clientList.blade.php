<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Bootstrap v4.5 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <!-- Styles -->
    <style>

        body{
          background-color: grey;
        }

        .layout{
          position: relavite;

        }

        .title{
          background: #131339;
          display: flex;
          justify-content: space-between;
          height: 20%;
          align-items: center;
          padding: 10px;  
        }

        .infoTable{
          height: 80%;
          padding: 10px;
          background: white;
        }

        .main-title{
          color: white;
        }
        .button-pagination{
          margin:5px;
        }
        .md-avatar {
          vertical-align: middle;
          width: 70px;
          height: 70px;
        }

        .row-buttons{
          display: flex;
          justify-content: flex-end;
        }
        .client-name{
          font-weight: bold;
        }
        .image-container{
          margin-left: 20%;
        }
        .pagination{
          display:flex;
          justify-content: center;
        }
        .info-data{
          display: flex;
          flex-direction: column;
          align-items: flex-end;
        }
        .vl{
          border-left: 2px solid black;
          height: 20px;
          padding-left: 5px;
          padding-right: 5px;
        }
        .date-container{
          display: flex;
          padding: 5px;
        }
        .date-container p{
          padding-left: 5px;
        }

    </style>
</head>

<body>
  <div class="container layout">

    <div class="title">
      <h4 class="main-title">Listado de clientes</h4>
      <button 
        type="button" 
        class="btn btn-primary"
        onclick="location.href = 'http://127.0.0.1:8000/client/create';" 
      >
        Nuevo cliente
      </button>
    </div> 

    <div class="infoTable">
      <!-- Search form -->
      
      <form action="{{route('clientes')}}" method="GET">
        @csrf
        <div class="row">
        
          <div class="col-4">
            <div class="form-group has-search">
              <span class="fa fa-search form-control-feedback"></span>
              <input type="text" name="textSearch" class="form-control" placeholder="Buscar">
            </div>
          </div>

          <div class="col-3">
            <div class="form-group has-search">
              <span class="fa fa-search form-control-feedback"></span>
              <input type="date" name="dateIni" class="form-control" placeholder="Fecha inicio">
            </div>
          </div>


          <div class="col-3">
            <div class="form-group has-search">
              <span class="fa fa-search form-control-feedback"></span>
              <input type="date" name="dateEnd" class="form-control" placeholder="Fecha Fin">
            </div>
          </div>

          <div class="col-2">
            <div class="form-group has-search">
              <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
          </div>

        </div>

      </form>

      <!-- table  -->
      <div> 

        <table class="table table-hover">
          <tbody>
            @foreach($clientes as $cliente)
              <tr>
                  <td>  
                    <div class="image-container container"> 
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" alt="Avatar" class="md-avatar rounded-circle">
                    </div>
                  </td>
                  <td>
                    <div class="date-container"> 
                    <p class="client-name"> {{$cliente->name}} </p>
                    <p> {{$cliente->email}} </p>
                    </div>
                  </td>
                  <td>
                  <div class="container info-data">
                    <div class="date-container">
                      <p>{{$cliente->created_at->format('d/m/Y')}}</p>
                      <p>{{$cliente->date->format('d/m/Y')}}</p>
                    </div>

                    <div class="row-buttons">
                      <form action="{{route('clientes.destroy', $cliente)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button
                        type="submit"
                        class="btn-sm btn-danger"
                        onclick="return confirm('desea eliminar el cliente?')">
                          Delete
                        </button>
                      </form>
                      <button type="button" class="btn-sm btn-primary">Edit</button>
                    </div>
                  </div>

                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>
        {{ $clientes->render()}}
      </div>

    </div>
      
  </div>
  
</body>

</html>