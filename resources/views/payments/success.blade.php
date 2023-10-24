@extends('layouts.main')

@section('main.content')
    <section>
        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4">Платеж прошел успешно</h1>

                <p class="lead">Благодарим за покупку</p>
                <hr class="my-4">

                <a class="btn btn-primary btn-lg" href="{{ $payment->payable->getPayableUrl() }}">
                    Продолжить
                </a>
            </div>
        </div>
    </section>
@endsection
