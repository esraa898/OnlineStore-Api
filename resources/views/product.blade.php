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







<form method="get" action="{{route('products')}}">
    <h5> Select color</h5>
<select name="color">
<option value="">
            Select one

        </option> 
        <option  @if(request('color') == 'black') selected @endif value="black">
            black

        </option>
        <option @if(request('color') == 'white') selected @endif value="white">
         white

        </option>
    </select>
    <h5> has discount</h5>
    <select name="discount">
    <option value="">
            Select one

        </option>
        <option @if(request('discount') == 'yes') selected @endif value="yes">
          yes

        </option>
        <option  @if(request('discount') == 'no') selected @endif value="no">
           no
 
        </option>
    </select>
    <button type="submit"> filter</button>
</form>
    <h3>
     products Details 
</h3>
    
<table border="1">

<thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock</th>
        <th>details</th>
      

    </tr>
</thead>
<tbody>
    @foreach($products as $key => $product)
    <tr>
        <td>
           {{++ $key}}
        </td>
        <td>
            {{$product->name}}
        </td>
        <td>
        {{$product->price}}
        </td>
        <td>
        {{$product->stock}}
        </td>
        <td>
        {{$product->details_count}}
        </td>
    </tr>
    @endforeach
</tbody>
</table>


        <script src="" async defer></script>
    </body>
</html>