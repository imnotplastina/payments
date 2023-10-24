@extends('layouts.main')

@section('main.content')
    <section>
        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4">Тестовый способ</h1>

                <p class="lead">Вы можете подтвердить или отменить оплату в целях тестирования.</p>
                <hr class="my-4">

                <div class="d-flex flex-row">
                    <div class="p-2">
                        <form action="{{ route('payments.complete', $payment->uuid) }}" method="POST">
                            @csrf

                            <button type="submit" class="btn btn-primary btn-lg">
                                Подтвердить
                            </button>
                        </form>
                    </div>
                    <div class="p-2">
                        <form action="{{ route('payments.cancel', $payment->uuid) }}" method="POST">
                            @csrf

                            <button type="submit" class="btn btn-secondary btn-lg">
                                Отменить
                            </button>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
