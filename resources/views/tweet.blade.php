<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    </head>
    <body>
        <form class="" action="" method="post">
            <label for="user">
                <input type="text" name="user">
            </label>
            <label for="tweet">
                <textarea name="tweet" rows="8" cols="80"></textarea>
            </label>
            <button type="submit" name="button" class="btn btn-success">Tweetar</button>
        </form>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
    </body>
</html>
