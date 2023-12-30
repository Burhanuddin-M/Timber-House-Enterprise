<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function submitForm(Request $request)
{
    // Validate the request data as needed
    $request->validate([
        'length' => 'required|array',
        'breadth' => 'required|array',
        'width' => 'required|array',
    ]);

    $inputLengths = $request->input('length');
    $inputBreadths = $request->input('breadth');
    $inputWidths = $request->input('width');

    // Initialize an array to store table data
    $tableData = [];

    // Perform the calculation for each row and store the results
    $totalArea = 0;

    foreach ($inputLengths as $key => $length) {
        $breadth = $inputBreadths[$key];
        $width = $inputWidths[$key];

        // Apply the rounding logic to calculation variables
        $roundedLength = $this->applyRoundingLogic($length);
        $roundedBreadth = $this->applyRoundingLogic($breadth);
        $roundedWidth = $this->applyRoundingLogic($width);

        // Calculate area for each row (roundedLength * roundedBreadth * roundedWidth) and divide by 144
        $area = ($roundedLength * $roundedBreadth * $roundedWidth) / 144;

        // Store data for each row using the original input values
        $tableData[] = [
            'serialNumber' => $key + 1,
            'length' => $length,
            'breadth' => $breadth,
            'width' => $width,
            'area' => $area,
        ];

        // Sum the calculated areas
        $totalArea += $area;
    }

    // Access other data from the request
    $name = $request->input('name');
    $place = $request->input('place');

    // Pass the data to the view and return the view
    return view('calculator.result', compact('name', 'place', 'tableData', 'totalArea'));
}

private function applyRoundingLogic($value)
{
    // Apply the rounding logic to the given value for calculation
    if ($value > 0.5) {
        return ceil($value / 0.5) * 0.5;
    } elseif ($value < 0.5) {
        return floor($value / 0.5) * 0.5;
    } else {
        return $value * 1;
    }
}




    public function submitForm2(Request $request)
{
    // Validate the request data as needed
    $request->validate([
        'length' => 'required|array',
        'diameter' => 'required|array',
    ]);

    // Access the data from the request
    $name = $request->input('name');
    $place = $request->input('place');
    $lengths = $request->input('length');
    $diameters = $request->input('diameter');

    // Initialize an array to store table data
    $tableData = [];

    // Perform the calculation for each row and store the results
    $totalArea = 0;

    foreach ($lengths as $key => $length) {
        $diameter = $diameters[$key];

        // Calculate area for each row (length * diameter * diameter / 2304)
        $area = ($length * $diameter * $diameter) / 2304;

        // Store data for each row
        $tableData[] = [
            'serialNumber' => $key + 1,
            'length' => $length,
            'diameter' => $diameter,
            'area' => $area,
        ];

        // Sum the calculated areas
        $totalArea += $area;
    }

    // Pass the data to the view and return the view
    return view('calculator.result2', compact('name', 'place', 'tableData', 'totalArea'));
}

}
