<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Exception;

class InvoiceController
{
    public function create(){
        return view ('createInvoice');
    }

    public function storeInFirestore(
        Request $request
    ) {
        $request->validate([
            'invoicenumber' => ["required", "string"],
            'invoicesurcharge' => ["nullable", "numeric"],
            'invoicediscount' => ["nullable", "numeric"],
            'invoicepaid' => ["nullable", "string"],
            'invoiceamount' => ["required", "numeric"],
            'invoicecurrency' => ["required", "string"],
        ]);

        try {
            $firestore = app('firebase.firestore');
            $database = $firestore->database()->collection('Invoices')->newDocument();
            $database->set([
                'invoicenumber' => $request->input('invoicenumber'),
                'invoicesurcharge' => $request->input('invoicesurcharge'),
                'invoicediscount' => $request->input('invoicediscount'),
                'invoicepaid' => $request->input('invoicepaid'),
                'invoiceamount' => $request->input('invoiceamount'),
                'invoicecurrency' => $request->input('invoicecurrency')
            ]);

            return redirect('/')->with('created' , 'Invoice Added Successfuly');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/invoices/create')->with('failed' , 'An exception occured, Please review laravel.logs for more information');
        }
       
    }

    public function edit($id){
        try {
            $firestore = app('firebase.firestore');
            $database = $firestore->database()->collection('Invoices')->document($id);
            $database->update([
                ['path' => 'invoicenumber', 'value' => "123344"],
                ['path' => 'invoicesurcharge', 'value' => "12"],
                ['path' => 'invoicediscount', 'value' => ""],
                ['path' => 'invoicepaid', 'value' => "Hardcoded Invoice"],
                ['path' => 'invoiceamount', 'value' => "15"],
                ['path' => 'invoicecurrency', 'value' => "USD"],
               ]);

            return redirect('/')->with('updated' , 'Invoice Edited Successfuly');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/')->with('failed' , 'An exception occured, Please review laravel.logs for more information');
        }
    }

    public function delete($id){
        try {
            $firestore = app('firebase.firestore');
            $database = $firestore->database()->collection('Invoices')->document($id)->delete();

            return redirect('/')->with('deleted' , 'Invoice Deleted Successfuly');
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/')->with('failed' , 'An exception occured, Please review laravel.logs for more information');
        }
    }
}