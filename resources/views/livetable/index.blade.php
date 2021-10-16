<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <table class="table table-responsive">
      <thead>
        <tr>
            <th>Company</th>
            <th>Jumlah Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->id}} </td>
            <td>{{ $item->company->company_name}} </td>
            <td>{{ $item->jumlah}} </td>
        </tr>
        @endforeach

      </tbody>
  </table>



    
    
    
 
</body>
</html>
