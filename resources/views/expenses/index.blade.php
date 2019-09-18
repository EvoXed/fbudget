@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <a class="btn btn-success" href="{{ route('expenses.create') }}" role="button">Добавить</a>
        </div>
    </div>
    <div class="row row justify-content-center mt-3">
        <div class="col-12">
            <table class="table table-striped table-inverse">
                <thead class="thead-inverse">
                <tr>
                    <th>Date</th>
                    <th>Purpose</th>
                    <th>Amount</th>
                    <th>User</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($expenses as $expense)
                    <tr>
                        <td scope="row">{{ $expense['date'] }}</td>
                        <td>{{ $expense['purpose']->purpose }}</td>
                        <td>{{ number_format($expense['amount']/100, 2) }}</td>
                        <td>{{ $expense['user']->name }}</td>
                        <td>
                            <a class="btn btn-warning float-left mr-1" href="{{ route('expenses.edit', $expense['id']) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                            <form action="{{ route('expenses.destroy', $expense['id']) }}" method="post">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
