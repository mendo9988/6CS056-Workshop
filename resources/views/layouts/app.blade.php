<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Student Record')</title>
    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col">
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded-full focus:bg-white focus:px-4 focus:py-2">
        Skip to content
    </a>

    <header class="px-4 pt-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-6xl rounded-3xl border-4 border-sunshine bg-white/90 px-4 py-3 shadow-md backdrop-blur-sm md:rounded-full">
            <div class="flex items-center justify-between gap-3">
                <a href="{{ url('/') }}" class="flex items-center gap-2 font-display text-lg font-semibold text-navy">
                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-sunshine text-xl" aria-hidden="true">✎</span>
                    <span>Student Record</span>
                </a>

                <button
                    type="button"
                    class="cartoon-btn border-2 border-navy bg-white text-navy md:hidden"
                    data-nav-toggle
                    aria-expanded="false"
                    aria-controls="primary-navigation"
                >
                    Menu
                </button>

                <nav id="primary-navigation" class="hidden md:block" aria-label="Primary">
                    <ul class="flex items-center gap-2">
                        <li>
                            <a href="{{ url('/') }}" class="cartoon-btn {{ request()->is('/') ? 'bg-mint text-navy' : 'bg-transparent text-navy hover:bg-cream' }}">Home</a>
                        </li>
                        <li>
                            <a href="/students" class="cartoon-btn {{ request()->is('students') && ! request()->is('students/*') ? 'bg-mint text-navy' : 'bg-transparent text-navy hover:bg-cream' }}">Students</a>
                        </li>
                        <li>
                            <a href="/students/create" class="cartoon-btn bg-peach text-white shadow-[0_4px_0_#f06e18] hover:bg-peach-dark active:translate-y-0.5 active:shadow-none">Create Student →</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <nav id="primary-navigation-mobile" data-nav-panel class="mt-3 hidden border-t-2 border-sunshine pt-3 md:hidden" aria-label="Mobile">
                <ul class="flex flex-col gap-2">
                    <li><a href="{{ url('/') }}" class="cartoon-btn w-full bg-cream text-navy">Home</a></li>
                    <li><a href="/students" class="cartoon-btn w-full bg-cream text-navy">Students</a></li>
                    <li><a href="/students/create" class="cartoon-btn w-full bg-peach text-white">Create Student →</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main id="main-content" class="mx-auto flex w-full max-w-6xl flex-1 flex-col px-4 py-6 sm:px-6 lg:px-8">
        <section class="notebook-shell relative flex flex-1 flex-col overflow-hidden p-5 sm:p-8">
            <div class="pointer-events-none absolute left-4 top-3 h-8 w-40 rounded-full border-2 border-sunshine bg-white/80" aria-hidden="true"></div>
            <div class="mb-6 mt-4 text-center">
                <h1 class="title-arch">@yield('heading', 'Student Record')</h1>
                @hasSection('subtitle')
                    <p class="mt-3 text-base font-semibold text-navy/70">@yield('subtitle')</p>
                @endif
            </div>

            <x-alert />

            <div class="relative z-10 flex-1">
                @yield('content')
            </div>
        </section>
    </main>

    <footer class="px-4 pb-6 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-6xl rounded-3xl border-2 border-sunshine/80 bg-white/80 px-6 py-4 text-center text-sm font-semibold text-navy/70">
            <p>Student Record Management · Keep every classmate easy to find</p>
        </div>
    </footer>
</body>
</html>
