{{-- Global site tag (gtag.js) - Google Analytics --}}
@if(config('polr.services.enableGoogleAnalytics'))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('polr.services.googleAnalyticsID') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', "{{ config('polr.services.googleAnalyticsID') }}");
    </script>
@endif