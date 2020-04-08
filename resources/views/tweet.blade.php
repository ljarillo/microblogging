<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Tweetar - Microblogging</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    </head>
    <body class="bg-light">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Novo tweet</h2>
            </div>
            <div class="alert alert-danger" role="alert" {{ empty($msgError) ? 'hidden' : '' }}>
                {{ $msgError }}
            </div>

            <div class="row">
                <div class="col-md-12 order-md-1">
                    <form action="{{ route('tweet.store') }}" method="post" class="needs-validation" novalidate>
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ empty($username) ? '' : $username }}" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Seu username é requerido.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <textarea name="tweet" class="form-control" rows="4" cols="80" required>{{ empty($tweet) ? '' : $tweet }}</textarea>
                            <div class="invalid-feedback">
                                Seu tweet é requerido.
                            </div>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block" type="submit">Tweetar</button>
                    </form>
                </div>
            </div>

            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">&copy; 2020-2020 Microblogging</p>
            </footer>
        </div>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script type="text/javascript">
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

        window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation')

        // Loop over them and prevent submission
        Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault()
              event.stopPropagation()
            }
            form.classList.add('was-validated')
          }, false)
        })
        }, false)
        }())
        </script>
    </body>
</html>
