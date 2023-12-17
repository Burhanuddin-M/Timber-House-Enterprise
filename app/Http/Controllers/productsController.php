<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\item_two;
use App\Models\item_four;
use App\Models\product_four;
use App\Models\product_two;

class productsController extends Controller
{
    public function adminIndex()
    {

        $twoItems = item_two::all();
        $fourItems = item_four::all();

        $twoItemsCount = item_two::count();
        $fourItemsCount = item_four::count();

        return view('Products.Admin.index', compact('twoItems', 'fourItems', 'twoItemsCount', 'fourItemsCount'));
    }

    public function userIndex()
    {
        $twoItems = item_two::all();
        $fourItems = item_four::all();

        return view('Products.Users.index', compact('twoItems', 'fourItems'));


    }


    public function addTwoItems(Request $request)
    {
        $twoItems = new item_two();

        $twoItems->name = $request->two_name;
        $twoItems->save();

        return redirect('/Products/Admin/index')->with('success2', 'Items Added Successfully');
    }


    public function addFourItems(Request $request)
    {
        $fourItems = new item_four();

        $fourItems->name = $request->four_name;
        $fourItems->save();

        return redirect('/Products/Admin/index')->with('success4', 'Items Added Successfully');
    }


    //Delete Two Items 

    public function deletetwoitems(Request $request,$id){
        $DeleteRow = item_two::find($id);
        $DeleteRow->delete();

        return redirect(url('/Products/Admin/index'))->with('successdelete2', 'Item Deleted successfully');
    }

    //Delete Two Items 

    public function deletefouritems(Request $request,$id){
        $DeleteRow = item_four::find($id);
        $DeleteRow->delete();

        return redirect(url('/Products/Admin/index'))->with('successdelete4', 'Item Deleted successfully');
    }


    public function displaytwo($id)
    {
        $twoProducts = product_two::whereHas('itemtwo', function ($query) use ($id) {
            $query->where('column_2_id', $id);
        })->get();

        $ItemName = item_two::find($id);


        return view('Products.Admin.twotable', compact('twoProducts', 'ItemName'));

    }


    public function displayfour($id)
    {
        $fourProducts = product_four::whereHas('itemfour', function ($query) use ($id) {
            $query->where('column_4_id', $id);
        })->get();

        $ItemName = item_four::find($id);

        return view('Products.Admin.fourtable', compact('fourProducts', 'ItemName'));

    }

    //Admin Add Row Two Table

    public function addrowtwo(Request $request, $id)
    {
        $addRowTwo = new product_two();

        $addRowTwo->desc = $request->desc;
        $addRowTwo->price = $request->price;
        $addRowTwo->cost_price = $request->cost_price;
        $addRowTwo->column_2_id = $id;

        $addRowTwo->save();

        // Redirect back to the previous page
        return back()->with('success', 'Row added successfully');
    }

    //Admin Add Row Four Table
    public function addrowfour(Request $request, $id)
    {

        $addRowFour = new product_four();

        $addRowFour->desc = $request->desc;

        $addRowFour->one_price = $request->price1;
        $addRowFour->one_price_cost = $request->price1cost;

        $addRowFour->two_price = $request->price2;
        $addRowFour->two_price_cost = $request->price2cost;

        $addRowFour->three_price = $request->price3;
        $addRowFour->three_price_cost = $request->price3cost;

        $addRowFour->column_4_id = $id;

        $addRowFour->save();

        // Redirect back to the previous page
        return back()->with('success', 'Row added successfully');
    }



    //Admin Edit Two Table
    public function edittwotable($id)
    {
        $EditRow = product_two::find($id);
        return view('Products.Admin.edittabletwo', compact('EditRow'));
    }

    //Amin Update Two Table
    public function updatetwotable(Request $request, $id)
    {


        $updatetwo = product_two::find($id);

        $updatetwo->desc = $request->input('desc');
        $updatetwo->price = $request->input('price');
        $updatetwo->cost_price = $request->input('cost');

        $updatetwo->save();

        return redirect(url('/Products/Admin/edittabletwo/' . $id))->with('success', 'Product updated successfully');


    }

    //Admin Update Four Table
    public function updatefourtable(Request $request, $id)
    {


        $updatefour = product_four::find($id);

        $updatefour->desc = $request->input('desc');
        $updatefour->one_price = $request->input('one_price');
        $updatefour->one_price_cost = $request->input('one_price_cost');
        $updatefour->two_price = $request->input('two_price');
        $updatefour->two_price_cost = $request->input('two_price_cost');
        $updatefour->three_price = $request->input('three_price');
        $updatefour->three_price_cost = $request->input('three_price_cost');

        $updatefour->save();

        return redirect(url('/Products/Admin/edittablefour/' . $id))->with('success', 'Product updated successfully');


    }



    //Admin Edit Four Table
    public function editfourtable($id)
    {
        $EditRow = product_four::find($id);
        return view('Products.Admin.edittablefour', compact('EditRow'));
    }

    //Admin Delete two Table
    public function deletetwotable($id)
    {
        $DeleteRow = product_two::find($id);
        $DeleteRow->delete();

        return redirect(url('/Products/Admin/index'))->with('success', 'Product Deleted successfully');
    }

    //Admin Delete Four Table
    public function deletefourtable($id)
    {
        $DeleteRow = product_four::find($id);
        $DeleteRow->delete();

        return redirect(url('/Products/Admin/index'))->with('success', 'Product Deleted successfully');
    }

    //For User Display two
    public function displaytwoUser($id)
    {
        $twoProducts = product_two::whereHas('itemtwo', function ($query) use ($id) {
            $query->where('column_2_id', $id);
        })->get();

        $ItemName = item_two::find($id);


        return view('Products.Users.twotable', compact('twoProducts', 'ItemName'));

    }

    public function displayfourUser($id)
    {
        $fourProducts = product_four::whereHas('itemfour', function ($query) use ($id) {
            $query->where('column_4_id', $id);
        })->get();

        $ItemName = item_four::find($id);

        return view('Products.Users.fourtable', compact('fourProducts', 'ItemName'));

    }









}
