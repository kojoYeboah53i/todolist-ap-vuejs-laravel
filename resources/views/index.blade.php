<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('favico/apple-touch-icon.png') }}" type="image/x-icon">
        <title>Todo list App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://github.com/kojoYeboah53i/voters-app/blob/main/src/bootstrap.css">
        <!-- Styles -->
    

        <style>
                 *{
                     margin: 0;
                    padding: 0;
                     box-sizing: border-box;

                     }
                        
            body{
             background-image: linear-gradient(120deg, #7e9492, #13615c);
              color: white;
            /* font-family: "Poppins ", sans-serif; */
            font-family: 'Nunito', sans-serif;

            min-height: 100vh;
            }
        </style>
    </head>
    <body >
        <div id="app">
            <app></app>
        </div>

            <div style="text-align:center">
                {{-- <img src="./screenshot.png" alt="screenshot" width="500" height="700"> --}}
            </div>

    </body>
        <script src="{{ mix('js/app.js') }}"></script>

</html>
