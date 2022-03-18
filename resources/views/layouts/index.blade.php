<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>AHP - Bootstrap 4.6.0</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <style>
    .chart-wrapper {
   
      height: 300px;
      width: 600px;
    }

    p {
      margin-top: 15px;
    }
  </style>

<!-- <style>
    .chart-wrapper2 {
      
      height: 30px;
      width: 60px;
    }

    p {
      margin-top: 15px;
    }
  </style> -->
 
 <link rel="stylesheet" href="/css/bootstrap.min.css">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/chart.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="\">AHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">

      @yield('menu')

      <!-- <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
      </form> -->
    </div>
  </nav>
  <br>

  <div class="container" style="margin-top:80px">
    @yield('conteudo')
  </div>

</body>

</html>