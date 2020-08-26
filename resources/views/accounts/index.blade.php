@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <a class="btn btn-success" href="{{ route('accounts.create') }}" role="button">Добавить</a>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-xl-8 col-lg-9 col-md-10 col-sm-11">
                @foreach($accounts as $account)
                    <div class="t-item">
                        <div class="t-purpose">{{ $account->type->title }}</div>
                        <div class="t-amount {{ $account->total_amount >= 0 ? 'plus' : 'minus' }}">
                            {{ number_format($account->total_amount / 100, 2) }} {!! $account->currency->symbol !!}
                        </div>
                        <div class="actions">
                            <a href="{{ route('accounts.show', $account->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{ route('accounts.edit', $account->id) }}"><i class="fa fa-pencil"></i></a>
                            {!! Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['accounts.destroy', $account->id]]) !!}
                            <button class="delete" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"  aria-hidden="true"></i></button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
