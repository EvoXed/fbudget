@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <a class="btn btn-success" href="{{ route('transactions.create') }}" role="button">Добавить</a>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-xl-8 col-lg-9 col-md-10 col-sm-11">
                @foreach($transactions as $transaction)
                    <div class="t-item">
                        <div class="t-account">{{ $transaction->from_account->title }}</div>
                        <div class="t-icon {{ $transaction->from_amount >= 0 ? 'up' : 'down' }}"></div>
                        <div class="t-purpose">{{ $transaction->category->title }}</div>
                        <div class="t-amount {{ $transaction->from_amount >= 0 ? 'plus' : 'minus' }}">
                            {{ number_format($transaction->from_amount/100, 2) }}
                        </div>
                        <div class="t-date">{{ date('d M. Y', strtotime($transaction->date)) }}</div>
                        <div class="t-balance">
                            {!! number_format($transaction->balance->balance /100, 2) .
                                ' ' . $transaction->from_account->currency->symbol !!}
                        </div>
                        <div class="actions">
                            <a href="{{ route('transactions.show', $transaction->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{ route('transactions.edit', $transaction->id) }}"><i class="fa fa-pencil"></i></a>
                            {!! Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['transactions.destroy', $transaction->id]]) !!}
                            <button class="delete" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"  aria-hidden="true"></i></button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
