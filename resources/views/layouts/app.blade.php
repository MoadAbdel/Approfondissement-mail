<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', config('app.name'))</title>
        <style>
            body { font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; max-width: 900px; margin: 2rem auto; padding: 0 1rem; }
            header { display: flex; justify-content: space-between; align-items: center; gap: 1rem; margin-bottom: 1.5rem; }
            nav a { margin-right: .75rem; }
            .flash { padding: .75rem 1rem; border: 1px solid #ddd; background: #f7f7f7; margin-bottom: 1rem; }
            .errors { padding: .75rem 1rem; border: 1px solid #e6b8b8; background: #fff3f3; margin-bottom: 1rem; }
            label { display: block; margin-top: .75rem; }
            input, textarea { width: 100%; max-width: 520px; padding: .5rem; }
            textarea { min-height: 110px; }
            table { width: 100%; border-collapse: collapse; }
            th, td { border-bottom: 1px solid #eee; padding: .5rem .25rem; text-align: left; }
            .actions { display: flex; gap: .5rem; align-items: center; flex-wrap: wrap; }
            .actions form { display: inline; margin: 0; }
            button { padding: .4rem .7rem; cursor: pointer; }
        </style>
    </head>
    <body>
        <header>
            <div>
                <strong>{{ config('app.name', 'Gift App') }}</strong>
            </div>
            <nav>
                <a href="{{ route('home') }}">Accueil</a>
                <a href="{{ route('gifts.create') }}">Ajouter un cadeau</a>
            </nav>
        </header>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors">
                <strong>Erreurs :</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </body>
</html>

