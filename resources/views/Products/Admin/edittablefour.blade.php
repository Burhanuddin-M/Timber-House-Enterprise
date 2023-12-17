@extends('layout.app')

@section('content')

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Edit Two Column table</title>
</head>

<body>

  



    <br>


    <div class="text-center">
        <button class="button">
            <a href="{{ route('products.admin') }}" class="text-dark text-decoration-none">
                <h3>&larr;</h3>
            </a>
        </button><br><br>
    </div>




    {{-- <h3 class="text-center text-primary">TIMBER HOUSE ENTERPRISE</h3><br> --}}






    <div class="container">
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        <div class="container d-flex justify-content-center">
            <form action="{{ route('products.admin.updatetablefour', ['id' => $EditRow->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                

                <label for="description">Description</label>
                <input type="text" class="form-control-lg text-center" name="desc"
                    value="{{$EditRow->desc}}" required><br><br>

                    <label for="oneprice">One Price</label>
                <input type="text" class="form-control-lg text-center" name="one_price"
                    value="{{$EditRow->one_price}}" required ><br><br>

                    <label for="onepricecost">One Price Cost</label>
                    <input type="text" class="form-control-lg text-center" name="one_price_cost"
                    value="{{$EditRow->one_price_cost}}" required><br><br>

                    <label for="twoprice">Two Price</label>
                    <input type="text" class="form-control-lg text-center" name="two_price"
                    value="{{$EditRow->two_price}}" required><br><br>

                    <label for="twopricecost">Two Price Cost</label>
                    <input type="text" class="form-control-lg text-center" name="two_price_cost"
                    value="{{$EditRow->two_price_cost}}" required><br><br>

                    <label for="threeprice">Three Price</label>
                    <input type="text" class="form-control-lg text-center" name="three_price"
                    value="{{$EditRow->three_price}}" required><br><br>

                    <label for="threepricecost">Three Price Cost</label>
                    <input type="text" class="form-control-lg text-center" name="three_price_cost"
                    value="{{$EditRow->three_price_cost}}" required><br><br>

                <div class="text-center">
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div><br><br>




            </form>

            <div class="container d-flex justify-content-center">
                <form action="{{ route('products.admin.deletetablefour', ['id' => $EditRow->id]) }}" method="POST">
                    @csrf
        
                    <!-- Other form fields or content if needed -->
        
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                </form>
            </div>
        </div>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>

@endsection