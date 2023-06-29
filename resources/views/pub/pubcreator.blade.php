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
                    <div style="font-weight:bold;" class="fs-2">Pub Creator</div>
                </div>
            </header>
            
            <main>
            
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            
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
                                            @foreach ($data as $key=>$item)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $item->pubname }}</td>
                                                <td>{{ $item->event }}</td>
                                                <td>{{ $item->location }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </table>                     
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @else
                            <div class="container">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                @if(session()->has('error'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
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
                                        </tbody>
                                        </table>                     
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif
                                <p>{{ __("Create Your Own Pub Here!") }}</p>
                                <p>&nbsp;</p>
                                <form action="{{ url('/pub/pubcreator') }}" method="POST">
                                @csrf <!-- {{ csrf_field() }} -->
                                    <div class="form-group row">
                                        <label class="col-2 col-form-label" for="pubname">Name of Pub</label> 
                                        <div class="col-8">
                                        <input id="pubname" name="pubname" type="text" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="event" class="col-2 col-form-label">Event Name</label> 
                                        <div class="col-8">
                                        <input id="event" name="event" type="text" class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="location" class="col-2 col-form-label">Location</label> 
                                        <div class="col-8">
                                        <input id="location" name="location" type="text" class="form-control" required="required">
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label for="ytkey" class="col-2 col-form-label">Youtube Link</label> 
                                        <div class="col-8">
                                        <input id="ytkey" name="ytkey" type="text" class="form-control" required="required">
                                        <input type="hidden" id="jbutton" name="jbutton" value="1">
                                        <div style="font-size:11px; color:red;">You can find the emebedded code by right click the video. Choose "copy embed code" then copy the embed code. 
                                        <br>Example: https://www.youtube.com/embed/LXQHmVVU8Cs
                                        <br>The Youtube link code is "LXQHmVVU8Cs."</div>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="offset-2 col-4">
                                        <button name="submit" type="submit" class="btn btn-primary" style="background-color: #1614b0;">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </body>
</html>