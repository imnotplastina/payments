@extends('layouts.main')

@section('main.content')
    <section>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-0">
                        Детали подписки
                    </h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('subscriptions.store') }}" method="POST">
                        @csrf

                        <button type="submit" class="btn btn-primary">
                            Оформить подписку
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
