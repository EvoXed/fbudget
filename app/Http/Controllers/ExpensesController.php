<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Purpose;
use App\User;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class ExpensesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Expense $expense
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Expense $expense)
    {
        $data['expenses'] = $expense::with('user', 'purpose')->orderByDesc('date')->get();
        return view('expenses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Purpose $purpose
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Purpose $purpose)
    {
        $data['purposes'] = $purpose::orderByDesc('created_at')->get();
        return view('expenses.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Expense             $expense
     *
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Expense $expense)
    {
        /*$rules = [
            'date' => 'required|date',
            'purpose' => 'required|max:20',
            'amount' => 'required|numeric|max:10'
        ];
        $this->validate($request, $rules);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
