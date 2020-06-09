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
          justify-content: center;
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
        .table-footer{
          display:flex;
          justify-content: center;
        }
        .button-pagination{
          margin:5px;
        }
        .footer{
          display: flex;
          flex-direction: row-reverse;
        }

    </style>
</head>

<body>
  <div class="container layout">

    <div class="title">
      <h4 class="main-title">Crear cliente</h4>
    </div> 

    <div class="infoTable">

      <form action="{{route('clientes.create')}}" method="POST">
        @csrf
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="inputName">Nombre</label>
            <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
          </div>

          <div class="form-group col-md-6">
            <label for="inputDocument">N° Documento</label>
            <input type="text" name="document" class="form-control" id="inputDocument" placeholder="Documento">
          </div>

        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email@email.co" id="inputEmail">
          </div>

          <div class="form-group col-md-6">
            <label for="inputDate">Fecha</label>
            <input type="date" name="date" class="form-control" id="inputDate">
          </div>

        </div>

        <div class="dropdown-divider"></div>

        <div class="footer"> 
          <button 
            type="submit" 
            class="btn btn-primary"
          >
            Aceptar
          </button>
          <button 
            type="button" 
            class="btn btn-danger"
            onclick="location.href = 'http://127.0.0.1:8000/client/list/'" 
          >
            Cancelar
          </button>
        </div>

      </form>

    </div>
      
  </div>
</body>

</html>