<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <header>
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a href="#" class="navbar-brand">
                        <strong>Countdown Number Solver</strong>
                    </a>
                </div>
            </div>
        </header>
        <main role="main">
            <section class="">
                <form id="numbers" action="/find-equation" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="target">Target number: </label>
                        <input class="form-control" id="target" type="number" name="target" placeholder="532" />
                        @error('target')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file">File: </label>
                        <input class="form-control" type="file" id="file" name="file" accept=".csv" />
                        @error('file')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @isset($results)
                    <div id="results">
                        @empty($results)
                            <div class="error">No results found</div>
                        @else
                            <div class="success">{{ count($results) }} result(s) found</div>
                        @endempty

                        @foreach ($results as $result)
                            <div>{{ $result }}</div>
                        @endforeach
                    </div>
                @endisset
            </section>
        </main>
    </body>
</html>
