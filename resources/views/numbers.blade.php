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

        <style>
            #container {
                width: 600px;
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <div id="container">
            @isset($results)
                <div id="results">
                    @empty($results)
                        <div class="error">No results found</div>
                    @else
                        <div class="success">{{ count($results) }}(s) results found</div>
                    @endempty

                    @foreach ($results as $result)
                        <div>{{ $result }}</div>
                    @endforeach
                </div>
            @endisset

            <form id="numbers" action="/find-equation" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Target number</label>
                    <input type="number" name="target" />
                    @error('target')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Target number</label>
                    <input type="file"  name="input_csv" accept=".csv" />
                    @error('input_csv')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" value="Calculate!"/>
            </form>
        </div>
    </body>
</html>
