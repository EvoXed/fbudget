@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-4 offset-4">
        <form action="{{ route('expenses.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ date('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="purpose">Purpose</label>
                <select class="custom-select" name="purpose_id" id="purpose">
                    <option value="0" selected></option>
                @foreach($purposes as $purpose)
                    <option value="{{ $purpose->id }}">{{ $purpose->purpose }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="new-purpose">New Purpose</label>
                <input type="text" class="form-control" name="new_purpose" id="new-purpose" placeholder="New Purpose">
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
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
