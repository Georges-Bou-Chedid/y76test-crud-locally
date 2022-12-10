<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000000">
    <link rel="shortcut icon" href="./assets/img/favicon.ico">
    
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css">
     <!-- Styles -->
     <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Y76 Test Locally</title>
  </head>

    <body class="bg-gray-200">
    <p class="text-center text-2xl mt-4 font-bold">Welcome Mr. Ibrahim</p>

    <div>
    @if(session('created'))
        <div class="alert text-green-800 text-center">
            <span class="closebtn text-red-800" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('created')}}
        </div>
        @endif
    </div>
    @if(session('failed'))
        <div class="alert text-green-800 text-center">
            <span class="closebtn text-red-800" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('failed')}}
        </div>
        @endif
    </div>
    @if(session('updated'))
        <div class="alert text-green-800 text-center">
            <span class="closebtn text-red-800" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('updated')}}
        </div>
        @endif
    </div>
    @if(session('deleted'))
        <div class="alert text-green-800 text-center">
            <span class="closebtn text-red-800" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('deleted')}}
        </div>
        @endif
    </div>

    <div class="text-center">
        <form method="GET" action="/create">
        <button class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        Sync Data
        </button>
        </form>
        <form method="GET" action="/create">
        <button class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        Add Product +
        </button>
        </form>
        <form method="GET" action="/invoices/create">
        <button class="mt-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
        Add Invoice +
        </button>
        </form>
    </div>

     <!-- Table -->

     <table class='table-auto mt-4 mx-auto max-w-8xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Product Name
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Product Type
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Product Category
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

			@foreach($products as $product)
           
                <tr>
                    <td class="px-6 py-4">
                        {{$product->data()['productname']}}
                    </td>
                    <td class="px-6 py-4 text-center">

                         {{$product->data()['producttype']}}
                    </td>
                    <td class="px-6 py-4 text-center">

                     {{$product->data()['productcategory']}}
                </td>

                    <td class="px-6 py-4 text-center">
                    <form method="post" action="/edit/{{$product->id() }}">
                            @method('PUT')
                            @csrf
                            <button class="text-red-600 hover:underline">
                                Edit Product
                            </button>
                        </form>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <form method="post" action="/delete/{{$product->id() }}">
                            @method('DELETE')
                            @csrf
                            <button class="text-red-600 hover:underline">
                                Delete Product
                            </button>
                        </form>
                    </td>
                </tr>
				@endforeach

            </tbody>
        </table>

        <table class='table-auto mt-4 mx-auto max-w-8xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Invoice Number
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Invoice Surcharge
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Invoice Discount
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Invoice Paid
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Invoice Amount
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Invoice Currency
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

			@foreach($invoices as $invoice)
           
                <tr>
                    <td class="px-6 py-4">
                        {{$invoice->data()['invoicenumber']}}
                    </td>
                    <td class="px-6 py-4 text-center">

                         {{$invoice->data()['invoicesurcharge']}}
                    </td>
                    <td class="px-6 py-4 text-center">

                     {{$invoice->data()['invoicediscount']}}
                    </td>
                    <td class="px-6 py-4 text-center">

                    {{$invoice->data()['invoicepaid']}}
                    </td>
                    <td class="px-6 py-4 text-center">

                    {{$invoice->data()['invoiceamount']}}
                    </td>
                    <td class="px-6 py-4 text-center">

                    {{$invoice->data()['invoicecurrency']}}
                    </td>

                    <td class="px-6 py-4 text-center">
                    <form method="post" action="/invoices/edit/{{$invoice->id() }}">
                            @method('PUT')
                            @csrf
                            <button class="text-red-600 hover:underline">
                                Edit Invoice
                            </button>
                        </form>
                    </td>

                    <td class="px-6 py-4 text-center">
                        <form method="post" action="/invoices/delete/{{$invoice->id() }}">
                            @method('DELETE')
                            @csrf
                            <button class="text-red-600 hover:underline">
                                Delete Invoice
                            </button>
                        </form>
                    </td>
                </tr>
				@endforeach

            </tbody>
        </table>
    </body>
</html>
