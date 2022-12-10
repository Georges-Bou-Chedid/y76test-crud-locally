<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Exception;

class ProductController
{
    public function create(){
        return view ('createProduct');
    }

    public function storeInFirestore(
        Request $request
    ) {
        $request->validate([
            'productname' => ["required", "string"],
            'producttype' => ["required", "string"],
            'productcategory' => ["required", "string"]
        ]);

        try {
            $firestore = app('firebase.firestore');
            $database = $firestore->database()->collection('Products')->newDocument();
            $database->set([
                'productname' => $request->input('productname'),
                'producttype' => $request->input('producttype'),
                'productcategory' => $request->input('productcategory'),
            ]);

            return redirect('/')->with('created' , 'Product Added Successfuly');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/create')->with('failed' , 'An exception occured, Please review laravel.logs for more information');
        }
       
    }

    public function edit($id){
        try {
            $firestore = app('firebase.firestore');
            $database = $firestore->database()->collection('Products')->document($id);
            $database->update([
                ['path' => 'productname', 'value' => "New Hardcoded Name"],
                ['path' => 'producttype', 'value' => "Cheese"],
                ['path' => 'productcategory', 'value' => "Cup"],
               ]);

            return redirect('/')->with('updated' , 'Product Edited Successfuly');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/')->with('failed' , 'An exception occured, Please review laravel.logs for more information');
        }
    }

    public function delete($id){
        try {
            $firestore = app('firebase.firestore');
            $database = $firestore->database()->collection('Products')->document($id)->delete();

            return redirect('/')->with('deleted' , 'Product Deleted Successfuly');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/')->with('failed' , 'An exception occured, Please review laravel.logs for more information');
        }
    }
}