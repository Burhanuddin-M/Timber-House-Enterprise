@extends('layout.app')

@section('content')

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .text-center {
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button {
            margin-right: 6px;
        }

        .bg-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .bg-danger:hover {
            background-color: #bb2d3b;
        }

        .bg-success {
            background-color: #28a745;
            color: #fff;
        }

        .bg-success:hover {
            background-color: #218838;
        }

        #container {
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 800px;
            margin: auto;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <title>Displaying Items</title>
</head>

<body><br>

    <div class="text-center">
        <button class="btn btn-primary">
            <a href="{{ route('products.users') }}" class="text-white text-decoration-none">GO TO USER PANEL</a>
        </button>
    </div><br>

    <div id="container">
        <div class="modal fade" id="ItemsModal" tabindex="-1" aria-labelledby="ItemsModalLabel" aria-hidden="true">
            <!-- Add Items Modal (2 Column) -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ItemsModalLabel">Add Items</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('products.addTwoItems') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="Item">Item name</label>
                            <input type="text" class="form-control" name="two_name"
                                placeholder="Enter the name of Item">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="Insert_Item" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Two Column table --}}
        <div id="container mt-5">
            <div class="row">
                @if (session('successdelete2'))
                    <div class="alert alert-success text-center">
                        {{ session('successdelete2') }}
                    </div>
                @endif
                <div class="col-md-12">
                    @if (session('success2'))
                        <div class="alert alert-success text-center">
                            {{ session('success2') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-8">
                                    <h5 class="text-center">
                                        2 - Column
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#ItemsModal">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                        @if ($twoItemsCount != 0)
                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">LIST OF ITEMS</th>
                                            <th class="text-center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($twoItems as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->name }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="button-container">
                                                        <form
                                                            action="{{ route('products.admin.deletetwoitems', ['id' => $item->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="button bg-danger text-white"
                                                                onclick="return confirm('Are you sure you want to delete this item?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        <Button class="button bg-success text-white">
                                                            <a href="{{ route('products.admin.displaytwo', ['id' => $item->id]) }}"
                                                                class="text-white text-decoration-none">OPEN</a>
                                                        </Button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h3 class="text-center text-danger">No Data Found</h3><br>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Four Column Tables Code Starting -->
    <div id="container">
        <!-- Add Items Modal (4 Column) -->
        <div class="modal fade" id="ItemsModal4" tabindex="-1" aria-labelledby="ItemsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ItemsModalLabel">Add Items</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('products.addFourItems') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="Item">Item name</label>
                            <input type="text" class="form-control" name="four_name"
                                placeholder="Enter the name of Item">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="Insert_Item" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Four Column Table --}}
        <div id="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @if (session('success4'))
                                <div class="alert alert-success text-center">
                                    {{ session('success4') }}
                                </div>
                            @endif

                            @if (session('successdelete4'))
                                <div class="alert alert-success text-center">
                                    {{ session('successdelete4') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-8">
                                    <h5 class="text-center">
                                        4 - Column
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#ItemsModal4">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>

                        @if ($fourItemsCount != 0)
                            <div class="card-body" id="col-2">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">LIST OF ITEMS</th>
                                            <th class="text-center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fourItems as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->name }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="button-container">
                                                        <form
                                                            action="{{ route('products.admin.deletefouritems', ['id' => $item->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                class="button bg-danger text-white"
                                                                onclick="return confirm('Are you sure you want to delete this item?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        <Button class="button bg-success text-white">
                                                            <a href="{{ route('products.admin.displayfour', ['id' => $item->id]) }}"
                                                                class="text-white text-decoration-none">OPEN</a>
                                                        </Button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h3 class="text-center text-danger">No Data Found</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.
2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>

@endsection
