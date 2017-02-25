<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mozzi</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Dosis:800" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token()
            ]); ?>
        </script>
    </head>
    <body>
        <div id="app"></div>
        <script async src="https://www.youtube.com/iframe_api"></script>
        <script src="{{ mix('js/main.js') }}"></script>
    </body>
</html>
