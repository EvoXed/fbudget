@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <a class="btn btn-success" href="{{ route('expenses.create') }}" role="button">Добавить</a>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-xl-8 col-lg-9 col-md-10 col-sm-11">
            @foreach($expenses as $expense)
            <div class="t-item">
                <div class="t-account">{{ $expense->account->title }}</div>
                <div class="t-icon {{ $expense->amount >= 0 ? 'up' : 'down' }}"></div>
                <div class="t-purpose">{{ $expense->purpose->purpose }}</div>
                <div class="t-amount {{ $expense->amount >= 0 ? 'plus' : 'minus' }}">{{ number_format($expense->amount/100, 2) }}</div>
                <div class="t-date">{{ date('d M. Y', strtotime($expense->date)) }}</div>
                <div class="t-balance">{!! number_format($expense->account->total_amount /100, 2).' '.$expense->account->currency->symbol !!}</div>
                <div class="actions">
                    <a href="{{ route('expenses.show', $expense->id) }}">Show</a>
                    <a href="{{ route('expenses.edit', $expense->id) }}">Edit</a>
                    {!! Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['expenses.destroy', $expense->id]]) !!}
                        <button class="delete" onclick="return confirm('Are you sure?')">Delete</button>
                    {!! Form::close() !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
