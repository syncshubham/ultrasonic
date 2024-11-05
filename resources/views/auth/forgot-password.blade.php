<x-guest-layout>

    <head>
        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || []; w[l].push({
                    'gtm.start':
                        new Date().getTime(), event: 'gtm.js'
                }); var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                        'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-WZTRVWRP');</script>
        <!-- End Google Tag Manager -->
        <title>Recover Password | Ultra-Sonic Hearing Aids Account</title>
        <meta name="description"
            content="Forgot your password? Reset it quickly and securely to regain access to your Ultra-Sonic hearing aids account and manage your orders.">
        <meta name="keywords"
            content="forgot password, recover password, reset account password, hearing aids account recovery, Ultra-Sonic password help, secure password reset">
        <link rel="canonical" href="https://ultra-sonicltd.com/forgot-password">
        <meta content="en_US" property="og:locale">
        <meta content="Ultrasonic Ltd." property="og:site_name">
        <meta content="website" property="og:type">
        <meta content="https://ultra-sonicltd.com/forgot-password" property="og:url">
        <meta content="Recover Password | Ultra-Sonic Hearing Aids Account" property="og:title">
        <meta
            content="Forgot your password? Reset it quickly and securely to regain access to your Ultra-Sonic hearing aids account and manage your orders."
            property="og:description">


        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@ultrasonicltd">
        <meta name="twitter:creator" content="@ultrasonicltd">
        <meta name="twitter:title" content="Recover Password | Ultra-Sonic Hearing Aids Account">
        <meta name="twitter:description"
            content="Forgot your password? Reset it quickly and securely to regain access to your Ultra-Sonic hearing aids account and manage your orders.">

        <meta property="og:title" content="Recover Password | Ultra-Sonic Hearing Aids Account" />
        <meta property="og:description"
            content="Forgot your password? Reset it quickly and securely to regain access to your Ultra-Sonic hearing aids account and manage your orders." />
        <meta property="og:url" content="https://ultra-sonicltd.com/forgot-password" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="{{ asset('assets/images/company-ultrasonic.png') }}" />
        <meta property="og:image:alt" content="our logo" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />

        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/company-ultrasonic.png') }}">
        <script type="application/ld+json">
            {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "Ultrasonic Ltd.",
          "url": "https://ultra-sonicltd.com/",
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+81-9093651168",
            "contactType": "Customer Service"
          },
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "3-33-6, Nishi-ikebukuro",
            "addressLocality": "Toshima-ku",
            "addressRegion": "Tokyo",
            "postalCode": "171-0021",
            "addressCountry": "Japan"
          },
          "geo": {
            "@type": "GeoCoordinates",
            "latitude": 35.731310,
            "longitude": 139.714231
          }
        }
          </script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-QRNZWRYP5Q"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());

            gtag('config', 'G-QRNZWRYP5Q');
        </script>
    </head>
    <x-authentication-card>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZTRVWRP" height="0" width="0"
                style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a
            password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>