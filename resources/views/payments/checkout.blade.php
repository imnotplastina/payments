@extends('layouts.main')

@section('main.content')
    <section>
        <div class="container">
            <h4 class="mb-3">Оплата</h4>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-0">
                        Детали платежа
                    </h5>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">
                                <div class="text-muted">
                                    ID платежа
                                </div>
                            </div>

                            <div class="col-8">
                                {{ $payment->uuid }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">
                                <div class="text-muted">
                                    Сумма платежа
                                </div>
                            </div>

                            <div class="col-8">
                                {{ $payment->amount }} {{ $payment->currency_id }}
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">
                                <div class="text-muted">
                                    Статус платежа
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="text-{{ $payment->status->color() }}">
                                    {{ $payment->status->name() }}
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">
                                <div class="text-muted">
                                    Операция
                                </div>
                            </div>

                            <div class="col-8">
                                {{ $payment->payable->getPayableName() }}
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="card-body">
                    <form action="" method="POST">
                        @csrf

                        <p>Выберите способ оплаты</p>

                        <button type="submit" class="btn btn-primary">
                            Продолжить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
