<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
       
@if($errors->any())
  @foreach($errors->all()  as $error)
    <h5> {{$error}}</h5>
  @endforeach
@endif

<h3>
    Upload products 
</h3>
    <form method="post" action="{{route('upload.products')}}" enctype="multipart/form-data">
           @csrf 
           <input type="file" name="sheet">
           <button type="submit"> Upload Products</button>


    </form>

    <h3>
    Upload products Details 
</h3>
    <form method="post" action="{{route('upload.products.details')}}" enctype="multipart/form-data">
           @csrf 
           <input type="file" name="sheet">
           <button type="submit"> Upload Products Details</button>


    </form>
        <script src="" async defer></script>
    </body>
</html>