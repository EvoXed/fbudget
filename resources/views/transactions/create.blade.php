@extends('layouts.app')
<style>
    .changePass {
        position: relative;
    }
    .changePass input {
        padding: 5px;
        display: none;
    }
    .changePass .changePassBtn {
        padding: 4px;
        display: inline;
        overflow: hidden;
        white-space: nowrap;
    }
</style>
@section('content')
<div class="row">
    <div class="col-4 offset-4">
        <form action="{{ route('transactions.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ date('Y-m-d') }}">
            </div>
            <div class="form-group">
                <label for="account">Account</label>
                <select class="custom-select" name="from_account_id" id="account">
                    @foreach($accounts as $account)
                        @if ($account->is_default == 1)
                            <option value="{{ $account->id }}" selected>{{ $account->title }}</option>
                        @else
                            <option value="{{ $account->id }}">{{ $account->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
                <div class="form-group">
                <label for="category">Category</label>
                <select class="custom-select" name="category_id" id="category">
                    <option value="0" selected></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="changePass">
                    <div class="changePassBtn"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                    <label for="new-category">New Category</label>
                    <input type="text" class="form-control" name="new_category" id="new-category" placeholder="New Category">
                </div>
            </div>
            <div class="form-group">
                <label for="payee">Note</label>
                <input type="text" class="form-control" name="note" id="payee" placeholder="Note">
            </div>
            <div class="form-group">
                <label for="payee">Payee</label>
                <input type="text" class="form-control" name="payee" id="payee" placeholder="Payee">
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="checkbox" class="plus_minus" name="plus_minus">
                <span class="checkmark"></span>
                <input type="number" class="form-control" name="from_amount" id="amount" placeholder="Amount">
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
