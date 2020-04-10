
<!doctype html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <title>Tweetar - Microblogging</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .container {
        margin-top: 30px;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>
</head>
<body class="bg-light">
    <main role="main" class="container">
        <div class="alert alert-danger" role="alert" {{ empty($msg) ? 'hidden' : '' }}>
          {{ $msg }}
        </div>
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            @if (! isset($hashtag))
                <h6 class="border-bottom border-gray pb-2 mb-0">Recente tweets</h6>
            @else
                <h6 class="border-bottom border-gray pb-2 mb-0">Tweets da hashtag <a href=" {{route('hashtag.index', $hashtag) }}">#{{ $hashtag }}</a></h6>
            @endif
            @foreach ($tweets as $tweet)
                <div class="media text-muted pt-3">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">{{ '@' . $tweet->user }}</strong>
                        {!! $tweet->tweet !!}
                        <br><small>{{ date('d/m/Y H:i', strtotime($tweet->created_at)) }}</small>
                        <form class="" action="{{ route('tweet.destroy', $tweet->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn btn-danger" name="button" value="excluir">
                            {{-- <button type="submit" class="btn btn-danger" name="button"></button> --}}
                        </form>
                    </p>
                </div>
            @endforeach
            <small class="d-block text-right mt-1">
                <a href="{{ route('tweet.index') }}">Home</a> | <a href="{{ route('tweet.new') }}">Tweetar</a>
            </small>
        </div>
    </main>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
