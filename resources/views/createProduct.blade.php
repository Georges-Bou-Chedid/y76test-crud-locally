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

  @if(session('failed'))
        <div class="alert text-green-800 text-center">
            <span class="closebtn text-red-800" onclick="this.parentElement.style.display='none';">&times;</span>
            {{ session('failed')}}
        </div>
        @endif
    </div>

  <form method="POST" enctype = "multipart/form-data" action="/create">
    @csrf
<div class="p-6 justify-center w-full h-full">
  <div class="flex flex-wrap -mx-3 mb-6">

  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    <label class="block uppercase tracking-wide text-gray-700 text-s font-bold mb-2" for="grid-state">
        Product Name:
      </label>
      <div class="relative">
      <input class="appearance-none block w-full bg-white text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="productname" type="text" placeholder="name">
    
    </div>
      </div>
  </div>

  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    <label class="block uppercase tracking-wide text-gray-700 text-s font-bold mb-2" for="grid-state">
        Choose Product Type:
      </label>
      <div class="relative">
      <select class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="producttype">
          <option>Chocolate</option>
          <option>Vanilla</option>
          <option>Strawberries</option>
          <option>Cheese</option>
        </select>
    </div>
      </div>
  </div>

    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    <label class="block uppercase tracking-wide text-gray-700 text-s font-bold mb-2" for="grid-state">
        Choose Product Category:
      </label>
      <div class="relative">
        <select class="block appearance-none w-full bg-white border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="productcategory">
          <option>Cup</option>
          <option>Bottle</option>
          <option>Platter</option>
        </select>
      </div>
      </div>

  <div class="field">


</div>

        </div>
    <div class="ml-6 flex items-start">
    <div class="h-12">

    
  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
  Submit
    </button>
        
        </div>
 
        <div class="ml-2 mt-2 h-12">
        <a  href="{{ url()->previous() }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
        Cancel
        </a>

        </div>
        </div>

       
        </form>

  </body>

  </html>