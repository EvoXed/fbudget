@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-4 offset-4">
        <form action="{{ route('expenses.store') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" id="date" placeholder="Date">
            </div>
            <div class="form-group">
                <label for="purpose">Purpose</label>
                <select class="custom-select" name="purpose_id" id="purpose">
                    <option selected></option>
                @foreach($purposes as $purpose)
                    <option value="{{ $purpose->id }}">{{ $purpose->purpose }}</option>
                @endforeach
                </select>
                <i class="add fa fa-plus-square" aria-hidden="true"></i>
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
