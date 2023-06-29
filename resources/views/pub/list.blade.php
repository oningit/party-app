<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div style="font-weight:bold;" class="fs-2">Lists</div>
                </div>
            </header>
            
            <main>
            
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        
                            <div class="container">
                                <div class="col-12">
                                    <div class="row-2">
                                        <div class="table-responsive">
                                        <table class="table table-striped table-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Event</th>
                                                <th scope="col">Location</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        @hasrole('Admin')
                                        <tbody>
                                            @foreach ($adata as $key=>$item)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $item->pubname }}</td>
                                                    <td>{{ $item->event }}</td>
                                                    <td>{{ $item->location }}</td>
                                                    <td align="right">
                                                        <form action="{{ route('pubcreator.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <!-- <a href=" {{ url(str_replace(' ', '', $item->pubname)) }}" class="btn btn-sm btn-primary">JOIN</a> -->
                                                        <input type="hidden" id="jbutton" name="event" value="{{ $item->event }}">
                                                        <button name="submit" type="submit" class="btn btn-sm btn-primary" style="background-color: #de1818;">DELETE</button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                    <form action="{{ url('watch') }}" method="POST">
                                                    @csrf
                                                    <!-- <a href=" {{ url(str_replace(' ', '', $item->pubname)) }}" class="btn btn-sm btn-primary">JOIN</a> -->
                                                    <input type="hidden" id="jbutton" name="pubname" value="{{ $item->pubname }}">
                                                    <button name="submit" type="submit" class="btn btn-sm btn-primary" style="background-color:blue;">SHOW</button>
                                                    </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endhasrole
                                        @hasrole('Creator')
                                            @foreach ($data as $key=>$item)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $item->pubname }}</td>
                                                    <td>{{ $item->event }}</td>
                                                    <td>{{ $item->location }}</td>
                                                    <td align="right">
                                                        <form action="{{ route('pubcreator.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <!-- <a href=" {{ url(str_replace(' ', '', $item->pubname)) }}" class="btn btn-sm btn-primary">JOIN</a> -->
                                                        <input type="hidden" id="jbutton" name="event" value="{{ $item->event }}">
                                                        <button name="submit" type="submit" class="btn btn-sm btn-primary" style="background-color: #de1818;">DELETE</button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                    <form action="{{ url('watch') }}" method="POST">
                                                    @csrf
                                                    <!-- <a href=" {{ url(str_replace(' ', '', $item->pubname)) }}" class="btn btn-sm btn-primary">JOIN</a> -->
                                                    <input type="hidden" id="jbutton" name="pubname" value="{{ $item->pubname }}">
                                                    <button name="submit" type="submit" class="btn btn-sm btn-primary" style="background-color:blue;">SHOW</button>
                                                    </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endhasrole
                                        </tbody>
                                        </table>                     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </body>
</html>