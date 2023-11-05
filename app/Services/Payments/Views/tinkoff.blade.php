<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="0; url={{ $payment->url }}">
    <title>{{ config('app.name') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>
@include('includes.navbar')

    <section class="mx-auto">
        <div class="container">
            <div class="mb-2 d-flex justify-content-center">
                <div class="spinner-border text-primary" role="status"></div>
            </div>
            <div class="d-flex justify-content-center">
                <p>Redirecting to payment</p>
            </div>
        </div>
    </section>

</body>

</html>
