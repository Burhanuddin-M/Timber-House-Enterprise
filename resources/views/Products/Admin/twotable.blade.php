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

    <title>Display Two Tables</title>

</head>

<body><br>

    {{-- <h2 class="text-center text-primary">TIMBER HOUSE ENTERPRISE</h2><br> --}}

    <div id="container">

        <!-- Items Modal -->
        <div class="modal fade" id="ItemsModal" tabindex="-1" aria-labelledby="ItemsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ItemsModalLabel">Add Row</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('products.admin.addrowtwo', ['id' => $ItemName->id]) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="Item">ITEM_DESC</label>
                            <input type="text" class="form-control" name="desc"
                                placeholder="Write the ITEM DESCRIPTION" required><br>

                            <label for="Item">ITEM PRICE</label>
                            <input type="text" class="form-control" name="price" placeholder="Write the Item Price"
                                required><br>

                            <label for="Item">COST PRICE</label>
                            <input type="text" class="form-control" name="cost_price"
                                placeholder="Write the Cost Price" required><br>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="Insert_Item" class="btn btn-primary">Add</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div id="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header">

                            <div class="row">
                                <div class="col-3">
                                    <button class="button">
                                        <a href="{{ url('/Products/Admin/index') }}"
                                            class="text-dark text-decoration-none">&larr;</a>
                                    </button>
                                </div>
                                <div class="col-5">
                                    <h5>
                                        {{ $ItemName->name }}
                                    </h5>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#ItemsModal">
                                        Add Row
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body" id="col-1">

                            @if (session('success'))
                                <div class="alert alert-success text-center">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <table class="table table-striped table-hover border border-primary">
                                <thead>
                                    <tr>
                                        <th class="text-center">DESC</th>
                                        <th class="text-center">PRICE</th>
                                        <th class="text-center">COST</th>
                                        <th class="text-center">EDIT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($twoProducts as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{ $item->desc }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->price }}
                                            </td>
                                            <td class="text-center">
                                                {{ $item->cost_price }}
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary">
                                                    <a href="{{ route('products.admin.edittabletwo', ['id' => $item->id]) }}"
                                                        class="text-white text-decoration-none">&#9998;</a>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascript for fetching the data for updation -->
    <script>
        edits = document.getElementsByClassName("edit");
        Array.from(edits).forEach(element) => {
            element.addEventListener("click", () => {
                console.log("edit", e);
            })
        }
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>

@endsection
