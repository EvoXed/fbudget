@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4 offset-4">
            <form action="{{ route('expenses.update', $expense->id) }}" method="post">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date" id="date" value="{{ $expense->date }}">
                </div>
                <div class="form-group">
                    <label for="purpose">Purpose</label>
                    <select class="custom-select" name="purpose_id" id="purpose">
                        @foreach($purposes as $purpose)
                            <option @if ($purpose->id == $expense->purpose_id) selected @endif value="{{ $purpose->id }}">{{ $purpose->purpose }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="new-purpose">New Purpose</label>
                    <input type="text" class="form-control" name="new_purpose" id="new-purpose" placeholder="New Purpose">
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" name="amount" id="amount" value="{{ $expense->amount / 100 }}">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
        @if (isset($errors) && count($errors))

            There were {{count($errors->all())}} Error(s)
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }} </li>
                @endforeach
            </ul>

        @endif
    </div>
@endsection
