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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...your-correct-sha512-hash-here..." crossorigin="anonymous">




</head>

<body><br>



    <div id="container">

        <!-- Items Modal -->
        <div class="modal fade" id="ItemsModal" tabindex="-1" aria-labelledby="ItemsModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ItemsModalLabel">Add Items</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">

                        <div class="modal-body">
                            <label for="Item">ITEM_DESC</label>
                            <input type="text" class="form-control" name="desc"
                                placeholder="Write the ITEM DESCRIPTION">

                            <label for="Item">ITEM_PRICE</label>
                            <input type="text" class="form-control" name="price"
                                placeholder="Write the ITEM PRICE">


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
                                <div class="col-5">
                                    <button class="button">
                                        <a href="{{ url('/Products/Users/index') }}"
                                            class="text-dark text-decoration-none">&larr;</a>
                                    </button>
                                </div>
                                <div class="col-7">
                                    <h5>
                                        {{ $ItemName->name }}
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="card-body" id="col-1">
                            <table class="table table-striped table-hover border border-primary">
                                <thead>
                                    <tr>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Cost Price</th>
                                        <th class="text-center">Last</th>
                                       
                                  
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
                                            <!-- Add this inside the <tr> loop -->
                                            <td class="text-center cost-price" data-cost="{{ $item->cost_price }}">
                                                <button class="toggle-cost-btn"><i class="fas fa-eye"></i></button>
                                            </td>
                                            <td class="text-center">
                                                <small>{{ $item->updated_at->diffForHumans() }}</small>
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


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Function to toggle the visibility of the cost price
        function toggleCostPrice(cell) {
            const costPrice = cell.data('cost');
            cell.text(costPrice); // Show the cost price

            // Automatically hide the cost price after 3 seconds
            setTimeout(function () {
                cell.text(''); // Hide the cost price by emptying the cell

                // Show the eye icon immediately
                cell.html('<button class="toggle-cost-btn"><i class="fas fa-eye"></i></button>');
            }, 1000);
        }

        // Event delegation for dynamically created elements
        $(document).on('click', '.toggle-cost-btn', function (event) {
            // Stop the button click event from propagating to the table cell
            event.stopPropagation();

            // Get the parent cell
            const costPriceCell = $(this).parent('.cost-price');

            // Toggle the visibility of the cost price
            toggleCostPrice(costPriceCell);
        });

        // Click event for the cost-price cell (without the button)
        $('.cost-price').on('click', function () {
            // Get the cell and toggle the visibility of the cost price
            const costPriceCell = $(this);
            toggleCostPrice(costPriceCell);
        });
    });
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