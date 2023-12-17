<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\platerecords;

class DocumentUploadController extends Controller
{
    public function upload(Request $request)
    {

        $id = $request->id;


     
        //For RCBOOK
        if ($request->document == "rcbook") {

            $Documents = platerecords::find($id);

            $first =  $request->file('first');
            if (isset($first)) {
                //For first documents (RCBOOK)..
                $FirstSidefile = $request->file('first');
                // $FirstSidefileName = "RCBOOK_FIRST_" . time() . '.' . $FirstSidefile->getClientOriginalExtension();
                $FirstSidefileName = "RCBOOK_1_" . $Documents->numberplate . '.' . $FirstSidefile->getClientOriginalExtension();
                $request->first->move(public_path('assets'), $FirstSidefileName);
                $Documents->rcbook_first = $FirstSidefileName;
                $Documents->save();

                session()->flash('success', 'RCBOOK First image is Uploaded');
            }

            $second =  $request->file('second');
            if (isset($second)) {
                //For Second  documents (RCBOOK)..
                $SecondSidefile = $request->file('second');
                $SecondSidefileName = "RCBOOK_2_" . $Documents->numberplate . '.' . $SecondSidefile->getClientOriginalExtension();
                $request->second->move(public_path('assets'), $SecondSidefileName);
                $Documents->rcbook_second = $SecondSidefileName;
                $Documents->save();

                session()->flash('success', 'RCBOOK Second image is Uploaded');
            }

            $third =  $request->file('third');
            if (isset($third)) {
                //For Third documents (RCBOOK)..
                $ThirdSidefile = $request->file('third');
                $ThirdSidefileName = "RCBOOK_3_" . $Documents->numberplate  . '.' . $ThirdSidefile->getClientOriginalExtension();
                $request->third->move(public_path('assets'), $ThirdSidefileName);
                $Documents->rcbook_third = $ThirdSidefileName;
                $Documents->save();

                session()->flash('success', 'RCBOOK Third image is Uploaded');
            }

            $fourth =  $request->file('fourth');
            if (isset($fourth)) {
                //For Fourth documents (RCBOOK)..
                $FourthSidefile = $request->file('fourth');
                $FourthSidefileName = "RCBOOK_4_" . $Documents->numberplate  . '.' . $FourthSidefile->getClientOriginalExtension();
                $request->fourth->move(public_path('assets'), $FourthSidefileName);
                $Documents->rcbook_fourth = $FourthSidefileName;
                $Documents->save();

                session()->flash('success', 'RCBOOK Fourth image is Uploaded');
            }

            $fifth =  $request->file('fifth');
            if (isset($fifth)) {
                //For Fifth documents (RCBOOK)..
                $FifthSidefile = $request->file('fifth');
                $FifthSidefileName = "RCBOOK_5_" . $Documents->numberplate  . '.' . $FifthSidefile->getClientOriginalExtension();
                $request->fifth->move(public_path('assets'), $FifthSidefileName);
                $Documents->rcbook_fifth = $FifthSidefileName;
                $Documents->save();

                session()->flash('success', 'RCBOOK Fifth image is Uploaded');
            } 

            return redirect(route('showplates'));

        } 
        

        //For INSURANCE
        elseif ($request->document == "insurance") {

            $Documents = platerecords::find($id);

            $first =  $request->file('first');
            if (isset($first)) {
                //For first documents (INSURANCE)..
                $FirstSidefile = $request->file('first');
                $FirstSidefileName = "INSURANCE_1_" . $Documents->numberplate . '.' . $FirstSidefile->getClientOriginalExtension();
                $request->first->move(public_path('assets'), $FirstSidefileName);
                $Documents->insurance_first = $FirstSidefileName;
                $Documents->save();

                session()->flash('success', 'INSURANCE First image is Uploaded');
            }

            $second =  $request->file('second');
            if (isset($second)) {
                //For Second  documents (INSURANCE)..
                $SecondSidefile = $request->file('second');
                $SecondSidefileName = "INSURANCE_2_" . $Documents->numberplate . '.' . $SecondSidefile->getClientOriginalExtension();
                $request->second->move(public_path('assets'), $SecondSidefileName);
                $Documents->insurance_second = $SecondSidefileName;
                $Documents->save();

                session()->flash('success', 'INSURANCE Second image is Uploaded');
            }

            $third =  $request->file('third');
            if (isset($third)) {
                //For Third documents (INSURANCE)..
                $ThirdSidefile = $request->file('third');
                $ThirdSidefileName = "INSURANCE_3_" . $Documents->numberplate . '.' . $ThirdSidefile->getClientOriginalExtension();
                $request->third->move(public_path('assets'), $ThirdSidefileName);
                $Documents->insurance_third = $ThirdSidefileName;
                $Documents->save();

                session()->flash('success', 'INSURANCE Third image is Uploaded');
            }

            $fourth =  $request->file('fourth');
            if (isset($fourth)) {
                //For Fourth documents (INSURANCE)..
                $FourthSidefile = $request->file('fourth');
                $FourthSidefileName = "INSURANCE_4_" . $Documents->numberplate. '.' . $FourthSidefile->getClientOriginalExtension();
                $request->fourth->move(public_path('assets'), $FourthSidefileName);
                $Documents->insurance_fourth = $FourthSidefileName;
                $Documents->save();

                session()->flash('success', 'INSURANCE Fourth image is Uploaded');
            }

            $fifth =  $request->file('fifth');
            if (isset($fifth)) {
                //For Fifth documents (INSURANCE)..
                $FifthSidefile = $request->file('fifth');
                $FifthSidefileName = "INSURANCE_5_" . $Documents->numberplate . '.' . $FifthSidefile->getClientOriginalExtension();
                $request->fifth->move(public_path('assets'), $FifthSidefileName);
                $Documents->insurance_fifth = $FifthSidefileName;
                $Documents->save();

                session()->flash('success', 'INSURANCE Fifth image is Uploaded');
            } 

            return redirect(route('showplates'));
        } 



        //For PUC
        elseif ($request->document == "puc") {

            $Documents = platerecords::find($id);

            $first =  $request->file('first');
            if (isset($first)) {
                //For first documents (PUC)..
                $FirstSidefile = $request->file('first');
                $FirstSidefileName = "PUC_1_" . $Documents->numberplate . '.' . $FirstSidefile->getClientOriginalExtension();
                $request->first->move(public_path('assets'), $FirstSidefileName);
                $Documents->puc_first = $FirstSidefileName;
                $Documents->save();

                session()->flash('success', 'PUC First image is Uploaded');
            }

            $second =  $request->file('second');
            if (isset($second)) {
                //For Second  documents (PUC)..
                $SecondSidefile = $request->file('second');
                $SecondSidefileName = "PUC_2_" . $Documents->numberplate . '.' . $SecondSidefile->getClientOriginalExtension();
                $request->second->move(public_path('assets'), $SecondSidefileName);
                $Documents->puc_second = $SecondSidefileName;
                $Documents->save();

                session()->flash('success', 'PUC Second image is Uploaded');
            }

            $third =  $request->file('third');
            if (isset($third)) {
                //For Third documents (PUC)..
                $ThirdSidefile = $request->file('third');
                $ThirdSidefileName = "PUC_3_" . $Documents->numberplate. '.' . $ThirdSidefile->getClientOriginalExtension();
                $request->third->move(public_path('assets'), $ThirdSidefileName);
                $Documents->puc_third = $ThirdSidefileName;
                $Documents->save();

                session()->flash('success', 'PUC Third image is Uploaded');
            }

            $fourth =  $request->file('fourth');
            if (isset($fourth)) {
                //For Fourth documents (PUC)..
                $FourthSidefile = $request->file('fourth');
                $FourthSidefileName = "PUC_4_" . $Documents->numberplate. '.' . $FourthSidefile->getClientOriginalExtension();
                $request->fourth->move(public_path('assets'), $FourthSidefileName);
                $Documents->puc_fourth = $FourthSidefileName;
                $Documents->save();

                session()->flash('success', 'PUC Fourth image is Uploaded');
            }

            $fifth =  $request->file('fifth');
            if (isset($fifth)) {
                //For Fifth documents (PUC)..
                $FifthSidefile = $request->file('fifth');
                $FifthSidefileName = "PUC_5_" .$Documents->numberplate. '.' . $FifthSidefile->getClientOriginalExtension();
                $request->fifth->move(public_path('assets'), $FifthSidefileName);
                $Documents->puc_fifth = $FifthSidefileName;
                $Documents->save();

                session()->flash('success', 'PUC Fifth image is Uploaded');
            } 

            return redirect(route('showplates'));
        } 



         //For PUC
         elseif ($request->document == "fitness") {

            $Documents = platerecords::find($id);

            $first =  $request->file('first');
            if (isset($first)) {
                //For first documents (FITNESS)..
                $FirstSidefile = $request->file('first');
                $FirstSidefileName = "FITNESS_1_" . $Documents->numberplate . '.' . $FirstSidefile->getClientOriginalExtension();
                $request->first->move(public_path('assets'), $FirstSidefileName);
                $Documents->fitness_first = $FirstSidefileName;
                $Documents->save();

                session()->flash('success', 'FITNESS First image is Uploaded');
            }

            $second =  $request->file('second');
            if (isset($second)) {
                //For Second  documents (FITNESS)..
                $SecondSidefile = $request->file('second');
                $SecondSidefileName = "FITNESS_2_" . $Documents->numberplate . '.' . $SecondSidefile->getClientOriginalExtension();
                $request->second->move(public_path('assets'), $SecondSidefileName);
                $Documents->fitness_second = $SecondSidefileName;
                $Documents->save();

                session()->flash('success', 'FITNESS Second image is Uploaded');
            }

            $third =  $request->file('third');
            if (isset($third)) {
                //For Third documents (FITNESS)..
                $ThirdSidefile = $request->file('third');
                $ThirdSidefileName = "FITNESS_3_" . $Documents->numberplate. '.' . $ThirdSidefile->getClientOriginalExtension();
                $request->third->move(public_path('assets'), $ThirdSidefileName);
                $Documents->fitness_third = $ThirdSidefileName;
                $Documents->save();

                session()->flash('success', 'FITNESS Third image is Uploaded');
            }

            $fourth =  $request->file('fourth');
            if (isset($fourth)) {
                //For Fourth documents (FITNESS)..
                $FourthSidefile = $request->file('fourth');
                $FourthSidefileName = "FITNESS_4_" . $Documents->numberplate. '.' . $FourthSidefile->getClientOriginalExtension();
                $request->fourth->move(public_path('assets'), $FourthSidefileName);
                $Documents->fitness_fourth = $FourthSidefileName;
                $Documents->save();

                session()->flash('success', 'FITNESS Fourth image is Uploaded');
            }

            $fifth =  $request->file('fifth');
            if (isset($fifth)) {
                //For Fifth documents (FITNESS)..
                $FifthSidefile = $request->file('fifth');
                $FifthSidefileName = "FITNESS_5_" .$Documents->numberplate. '.' . $FifthSidefile->getClientOriginalExtension();
                $request->fifth->move(public_path('assets'), $FifthSidefileName);
                $Documents->fitness_fifth = $FifthSidefileName;
                $Documents->save();

                session()->flash('success', 'FITNESS Fifth image is Uploaded');
            } 

            return redirect(route('showplates'));
        } 

        

        //For NATIONAL PERMIT
        elseif ($request->document == "nationalpermit") {

            $Documents = platerecords::find($id);

            $first =  $request->file('first');
            if (isset($first)) {
                //For first documents (NATIONAL)..
                $FirstSidefile = $request->file('first');
                $FirstSidefileName = "NATIONAL_1_" . $Documents->numberplate . '.' . $FirstSidefile->getClientOriginalExtension();
                $request->first->move(public_path('assets'), $FirstSidefileName);
                $Documents->national_first = $FirstSidefileName;
                $Documents->save();

                session()->flash('success', 'NATIONAL PERMIT First image is Uploaded');
            }

            $second =  $request->file('second');
            if (isset($second)) {
                //For Second  documents (NATIONAL)..
                $SecondSidefile = $request->file('second');
                $SecondSidefileName = "NATIONAL_2_" . $Documents->numberplate . '.' . $SecondSidefile->getClientOriginalExtension();
                $request->second->move(public_path('assets'), $SecondSidefileName);
                $Documents->national_second = $SecondSidefileName;
                $Documents->save();

                session()->flash('success', 'NATIONAL PERMIT Second image is Uploaded');
            }

            $third =  $request->file('third');
            if (isset($third)) {
                //For Third documents (NATIONAL)..
                $ThirdSidefile = $request->file('third');
                $ThirdSidefileName = "NATIONAL_3_" . $Documents->numberplate. '.' . $ThirdSidefile->getClientOriginalExtension();
                $request->third->move(public_path('assets'), $ThirdSidefileName);
                $Documents->national_third = $ThirdSidefileName;
                $Documents->save();

                session()->flash('success', 'NATIONAL PERMIT Third image is Uploaded');
            }

            $fourth =  $request->file('fourth');
            if (isset($fourth)) {
                //For Fourth documents (NATIONAL)..
                $FourthSidefile = $request->file('fourth');
                $FourthSidefileName = "NATIONAL_4_" .$Documents->numberplate. '.' . $FourthSidefile->getClientOriginalExtension();
                $request->fourth->move(public_path('assets'), $FourthSidefileName);
                $Documents->national_fourth = $FourthSidefileName;
                $Documents->save();

                session()->flash('success', 'NATIONAL PERMIT Fourth image is Uploaded');
            }

            $fifth =  $request->file('fifth');
            if (isset($fifth)) {
                //For Fifth documents (NATIONAL)..
                $FifthSidefile = $request->file('fifth');
                $FifthSidefileName = "NATIONAL_5_" . $Documents->numberplate. '.' . $FifthSidefile->getClientOriginalExtension();
                $request->fifth->move(public_path('assets'), $FifthSidefileName);
                $Documents->national_fifth = $FifthSidefileName;
                $Documents->save();

                session()->flash('success', 'NATIONAL PERMIT Fifth image is Uploaded');
            } 

            return redirect(route('showplates'));
        } 



        //For ROAD TAX
        elseif ($request->document == "roadtax") {

            $Documents = platerecords::find($id);

            $first =  $request->file('first');
            if (isset($first)) {
                //For first documents (NATIONAL)..
                $FirstSidefile = $request->file('first');
                $FirstSidefileName = "ROADTAX_1_" . $Documents->numberplate . '.' . $FirstSidefile->getClientOriginalExtension();
                $request->first->move(public_path('assets'), $FirstSidefileName);
                $Documents->roadtax_first = $FirstSidefileName;
                $Documents->save();

                session()->flash('success', 'ROAD TAX First image is Uploaded');
            }

            $second =  $request->file('second');
            if (isset($second)) {
                //For Second  documents (NATIONAL)..
                $SecondSidefile = $request->file('second');
                $SecondSidefileName = "ROADTAX_2_" . $Documents->numberplate . '.' . $SecondSidefile->getClientOriginalExtension();
                $request->second->move(public_path('assets'), $SecondSidefileName);
                $Documents->roadtax_second = $SecondSidefileName;
                $Documents->save();

                session()->flash('success', 'ROAD TAX  Second image is Uploaded');
            }

            $third =  $request->file('third');
            if (isset($third)) {
                //For Third documents (NATIONAL)..
                $ThirdSidefile = $request->file('third');
                $ThirdSidefileName = "ROADTAX_3_" . $Documents->numberplate. '.' . $ThirdSidefile->getClientOriginalExtension();
                $request->third->move(public_path('assets'), $ThirdSidefileName);
                $Documents->roadtax_third = $ThirdSidefileName;
                $Documents->save();

                session()->flash('success', 'ROAD TAX  Third image is Uploaded');
            }

            $fourth =  $request->file('fourth');
            if (isset($fourth)) {
                //For Fourth documents (NATIONAL)..
                $FourthSidefile = $request->file('fourth');
                $FourthSidefileName = "ROADTAX_4_" .$Documents->numberplate. '.' . $FourthSidefile->getClientOriginalExtension();
                $request->fourth->move(public_path('assets'), $FourthSidefileName);
                $Documents->roadtax_fourth = $FourthSidefileName;
                $Documents->save();

                session()->flash('success', 'ROAD TAX  Fourth image is Uploaded');
            }

            $fifth =  $request->file('fifth');
            if (isset($fifth)) {
                //For Fifth documents (NATIONAL)..
                $FifthSidefile = $request->file('fifth');
                $FifthSidefileName = "ROADTAX_5_" . $Documents->numberplate. '.' . $FifthSidefile->getClientOriginalExtension();
                $request->fifth->move(public_path('assets'), $FifthSidefileName);
                $Documents->roadtax_fifth = $FifthSidefileName;
                $Documents->save();

                session()->flash('success', 'ROAD TAX  Fifth image is Uploaded');
            } 

            return redirect(route('showplates'));
        } 



        //For DRIVING LICENSE
        elseif ($request->document == "license") {
            
            
            $Documents = platerecords::find($id);

            $first =  $request->file('first');
            if (isset($first)) {
                //For first documents (DRIVING LICENSE)..
                $FirstSidefile = $request->file('first');
                $FirstSidefileName = "LICENSE_1_" . $Documents->numberplate . '.' . $FirstSidefile->getClientOriginalExtension();
                $request->first->move(public_path('assets'), $FirstSidefileName);
                $Documents->license_first = $FirstSidefileName;
                $Documents->save();

                session()->flash('success', 'DRIVING LICENSE First image is Uploaded');
            }

            $second =  $request->file('second');
            if (isset($second)) {
                //For Second  documents (DRIVING LICENSE)..
                $SecondSidefile = $request->file('second');
                $SecondSidefileName = "LICENSE_2_" . $Documents->numberplate . '.' . $SecondSidefile->getClientOriginalExtension();
                $request->second->move(public_path('assets'), $SecondSidefileName);
                $Documents->license_second = $SecondSidefileName;
                $Documents->save();

                session()->flash('success', 'DRIVING LICENSE Second image is Uploaded');
            }

            $third =  $request->file('third');
            if (isset($third)) {
                //For Third documents (DRIVING LICENSE)..
                $ThirdSidefile = $request->file('third');
                $ThirdSidefileName = "LICENSE_3_" . $Documents->numberplate. '.' . $ThirdSidefile->getClientOriginalExtension();
                $request->third->move(public_path('assets'), $ThirdSidefileName);
                $Documents->license_third = $ThirdSidefileName;
                $Documents->save();

                session()->flash('success', 'DRIVING LICENSE Third image is Uploaded');
            }

            $fourth =  $request->file('fourth');
            if (isset($fourth)) {
                //For Fourth documents (DRIVING LICENSE)..
                $FourthSidefile = $request->file('fourth');
                $FourthSidefileName = "LICENSE_4_" .$Documents->numberplate. '.' . $FourthSidefile->getClientOriginalExtension();
                $request->fourth->move(public_path('assets'), $FourthSidefileName);
                $Documents->license_fourth = $FourthSidefileName;
                $Documents->save();

                session()->flash('success', 'DRIVING LICENSE Fourth image is Uploaded');
            }

            $fifth =  $request->file('fifth');
            if (isset($fifth)) {
                //For Fifth documents (DRIVING LICENSE)..
                $FifthSidefile = $request->file('fifth');
                $FifthSidefileName = "LICENSE_5_" . $Documents->numberplate. '.' . $FifthSidefile->getClientOriginalExtension();
                $request->fifth->move(public_path('assets'), $FifthSidefileName);
                $Documents->license_fifth = $FifthSidefileName;
                $Documents->save();

                session()->flash('success', 'DRIVING LICENSE Fifth image is Uploaded');
            } 

            return redirect(route('showplates'));
        } 
        
    }
}
