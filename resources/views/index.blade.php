<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <p>{{ date('d/m/Y H:i', strtotime($var->created_at)) }}</p>
    </body>
</html>
