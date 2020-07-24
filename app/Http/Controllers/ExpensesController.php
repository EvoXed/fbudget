<?php

namespace App\Http\Controllers;

use App\Account;
use App\Expense;
use App\Purpose;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Expense $expense)
    {
        $data['expenses'] = $expense::with('user', 'purpose', 'account')
                                ->where('user_id', Auth::user()->id)
                                ->orderByDesc('date')
                                ->get();
        return view('expenses.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Purpose $purpose
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @param \App\Expense $expense
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, Expense $expense)
    {
        $request->validate([
            'date' => 'required|date',
            'purpose_id' => 'required|max:20',
            'new_purpose' => 'max:20',
            'amount' => 'required|numeric'
        ]);
        $reqData = $request->all();
        if ($reqData['purpose_id'] == 0 && $reqData['new_purpose']) {
            $newPurpose = Purpose::create(['purpose' => $reqData['new_purpose']]);
            $reqData['purpose_id'] = $newPurpose->id;
        }
        $reqData['user_id'] = Auth::user()->id;
        $reqData['amount'] *= 100;
        if ($expense->create($reqData)) {
            return redirect('/expenses');
        }

        return response()->json('Expense fail created', 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data['expense'] = Expense::find($id);
        $data['purposes'] = Purpose::all();

        return view('expenses.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'purpose_id' => 'required|max:20',
            'new_purpose' => 'max:20',
            'amount' => 'required|integer'
        ]);
        $reqData = $request->only(['date', 'purpose_id', 'amount']);
        /*if ($reqData['purpose_id'] == 0 && $reqData['new_purpose']) {
            $newPurpose = Purpose::create(['purpose' => $reqData['new_purpose']]);
            $reqData['purpose_id'] = $newPurpose->id;
        }*/
        $reqData['amount'] *= 100;
        if (Expense::whereId($id)->update($reqData)) {
            return redirect('/expenses');
        }

        return response()->json('Expense fail updated', 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if (Expense::destroy($id)) {
            return redirect('/expenses');
        }

        return response()->json('Expense not deleted', 400);
    }
}
