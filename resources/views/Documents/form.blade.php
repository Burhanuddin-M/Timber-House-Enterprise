@extends('layout.app')

@section('content')
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 800px;
            margin: auto;
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            color: #007bff;
            border: 1px solid black;
            padding: 10px;
            border-radius: 5px;
        }

        .form-select {
            margin-top: 20px;
        }

        .image-section {
            display: none;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
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

    <title>Uploading Documents!</title>
</head>

<body>
    <div class="container">
        <br>
        <h2 class="text-center">
            {{ $Plate->numberplate }}
        </h2>
        <br>
        <form action="{{ route('upload', ['id' => $Plate->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $Plate->id }}">

            <select class="form-select text-center" aria-label="Default select example" name="document" id="documentSelect">
                <option>SELECT THE DOCUMENT</option>
                <option value="rcbook">RCBOOK</option>
                <option value="insurance">INSURANCE</option>
                <option value="puc">PUC</option>
                <option value="fitness">FITNESS</option>
                <option value="nationalpermit">NATIONAL PERMIT</option>
                <option value="roadtax">ROAD TAX</option>
                <option value="license">DRIVING LICENSE</option>
            </select>

            <br>

            <!-- Add a container for the code you want to show/hide -->
            <div id="conditionalCode" style="display: none;">
                <!-- Your code goes here -->
                <!-- For example, display a message -->

                <div class="button-container">
                    {{-- First Image --}}
                    <div style="display: none" class="mb-3 image-section" id="firstImageSection">
                        <label for="First image" class="form-label">1st - First image</label>
                        <input type="file" class="form-control" name="first" accept="image/*" capture="camera"
                            onchange="displayImage(event, 'output')">
                        @error('first')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="button" style="text-align: center;"
                        onclick="toggleImageSection('firstImageSection')">1</button><br><br>

                    <!-- This is where the selected image will be displayed -->
                    <img id="output" style="display: none; max-width: 100%; width: 100px; height: 100px; margin: auto;" />
                    <br>

                    {{-- Second Image --}}
                    <div style="display: none" class="mb-3 image-section" id="secondImageSection">
                        <label for="Second image" class="form-label">2nd - Second image</label>
                        <input type="file" class="form-control" name="second" accept="image/*"
                            onchange="displayImage(event, 'secondOutput')">
                        @error('second')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="button" onclick="toggleImageSection('secondImageSection')">2</button><br><br>

                    <!-- This is where the selected image will be displayed -->
                    <img id="secondOutput"
                        style="display: none; max-width: 100%; width: 100px; height: 100px; margin: auto;" /><br>

                    {{-- Third Image --}}
                    <div style="display: none" class="mb-3 image-section" id="thirdImageSection">
                        <label for="Third image" class="form-label">3rd - Third image</label>
                        <input type="file" class="form-control" name="third" accept="image/*"
                            onchange="displayImage(event, 'thirdOutput')">
                        @error('third')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="button" onclick="toggleImageSection('thirdImageSection')">3</button><br><br>

                    <!-- This is where the selected image will be displayed -->
                    <img id="thirdOutput"
                        style="display: none; max-width: 100%; width: 100px; height: 100px; margin: auto;" /><br>

                    {{-- Fourth Image --}}
                    <div style="display: none" class="mb-3 image-section" id="fourthImageSection">
                        <label for="Fourth image" class="form-label">4th - Fourth image</label>
                        <input type="file" class="form-control" name="fourth" accept="image/*"
                            onchange="displayImage(event, 'fourthOutput')">
                        @error('fourth')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="button" onclick="toggleImageSection('fourthImageSection')">4</button><br><br>

                    <!-- This is where the selected image will be displayed -->
                    <img id="fourthOutput"
                        style="display: none; max-width: 100%; width: 100px; height: 100px; margin: auto;" /><br>

                    {{-- Fifth Image --}}
                    <div style="display: none" class="mb-3 image-section" id="fifthImageSection">
                        <label for="Fifth image" class="form-label">5th - Fifth image</label>
                        <input type="file" class="form-control" name="fifth" accept="image/*"
                            onchange="displayImage(event, 'fifthOutput')">
                        @error('fifth')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="button" onclick="toggleImageSection('fifthImageSection')">5</button><br><br>

                    <!-- This is where the selected image will be displayed -->
                    <img id="fifthOutput"
                        style="display: none; max-width: 100%; width: 100px; height: 100px; margin: auto;" /><br>

                </div>

                {{-- Form submission button  --}}
                <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                    <button class="btn btn-primary"><a href="/" class="text-decoration-none text-white">Back</a></button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

            </div>
        </form>
    </div>

    <script>
        function toggleImageSection(sectionId) {
            var section = document.getElementById(sectionId);
            if (section.style.display === 'none' || section.style.display === '') {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        }
    </script>

    {{-- Display the selected image --}}
    <script>
        function displayImage(event, outputId) {
            var image = document.getElementById(outputId);
            image.src = URL.createObjectURL(event.target.files[0]);
            image.style.display = "block";
        }
    </script>

    <script>
        // Get the select element
        var documentSelect = document.getElementById('documentSelect');

        // Get the container for the conditional code
        var conditionalCode = document.getElementById('conditionalCode');

        // Add an event listener to the select element
        documentSelect.addEventListener('change', function () {
            // Check if the selected value is not '---------'
            if (documentSelect.value !== '---------') {
                // If a value is selected, show the conditional code
                conditionalCode.style.display = 'block';
            } else {
                // If '---------' is selected, hide the conditional code
                conditionalCode.style.display = 'none';
            }
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
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    -->
</body>

</html>
@endsection
