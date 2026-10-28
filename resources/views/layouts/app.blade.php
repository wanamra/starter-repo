<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Events') · {{ config('app.name') }}</title>
    <style>
        :root { --ink: #1c2333; --muted: #5b6475; --line: #dfe3ea; --bg: #f6f7fb; --card: #fff; --accent: #2457d6; --ok: #127a4a; --bad: #b42318; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: system-ui, -apple-system, 'Segoe UI', sans-serif; background: var(--bg); color: var(--ink); line-height: 1.5; }
        header { background: var(--card); border-bottom: 1px solid var(--line); }
        .wrap { max-width: 860px; margin: 0 auto; padding: 16px; }
        header .wrap { display: flex; align-items: center; justify-content: space-between; gap: 12px; }
        a { color: var(--accent); }
        .brand { font-weight: 700; text-decoration: none; color: var(--ink); }
        .card { background: var(--card); border: 1px solid var(--line); border-radius: 10px; padding: 16px; }
        .grid { display: grid; gap: 12px; }
        .muted { color: var(--muted); }
        .pill { display: inline-block; font-size: 13px; padding: 2px 10px; border-radius: 99px; background: #eef2fb; }
        .status { padding: 10px 14px; border-radius: 8px; background: #e8f6ef; color: var(--ok); }
        .error { padding: 10px 14px; border-radius: 8px; background: #fdecea; color: var(--bad); }
        button, .button { font: inherit; padding: 8px 16px; border-radius: 8px; border: 1px solid var(--accent); background: var(--accent); color: #fff; cursor: pointer; }
        button.link { background: none; border: 0; color: var(--accent); padding: 0; }
        label { display: block; font-weight: 600; margin-top: 12px; }
        input { font: inherit; width: 100%; padding: 8px 10px; border: 1px solid var(--line); border-radius: 8px; }
    </style>
</head>
<body>
    <header>
        <div class="wrap">
            <a class="brand" href="{{ route('events.index') }}">Campus Events</a>
            <div>
                @auth
                    <span class="muted">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline">
                        @csrf
                        <button class="link" type="submit">Log out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Log in</a>
                @endauth
            </div>
        </div>
    </header>
    <main class="wrap">
        @if (session('status'))
            <p class="status">{{ session('status') }}</p>
        @endif
        @yield('content')
    </main>
</body>
</html>
