<?php

namespace App\Http\Controllers;

use App\Account;
use App\Category;
use App\RunningBalance;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Transaction $transaction
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index(Transaction $transaction)
    {
        $data['transactions'] = $transaction::with('from_account', 'to_account', 'user', 'category', 'payee', 'balance')
            ->where('user_id', $this->userId)
            ->orderByDesc('date')
            ->orderByDesc('created_at')
            ->get();

        return view('transactions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Account  $account
     * @param \App\Category $category
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create(Account $account, Category $category)
    {
        $data['accounts'] = $account::where('user_id', $this->userId)->orderByDesc('created_at')->get();
        $data['categories'] = $category::where('user_id', $this->userId)->orderByDesc('created_at')->get();

        return view('transactions.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'from_account_id' => 'required|max:20',
            'category_id' => 'required|max:20',
            'new_category' => 'max:20',
            'note' => 'max:50',
            'from_amount' => 'required|numeric',
            'payee_id' => 'numeric'
        ]);
        $transaction = $request->all();
        if ($transaction['category_id'] == 0 && $transaction['new_category']) {
            $newCategory = Category::create(['title' => $transaction['new_category'], 'user_id' => $this->userId]);
            $transaction['category_id'] = $newCategory->id;
        }
        $transaction['user_id'] = $this->userId;
        $transaction['from_amount'] *= 100;
        if ($tRes = Transaction::create($transaction)) {
            $account = Account::find($transaction['from_account_id']);
            $account->total_amount += $transaction['from_amount'];
            $account->save();
            RunningBalance::create(
                ['transaction_id' => $tRes->id,
                 'account_id' => $account->id,
                 'balance' => $account->total_amount
                ]);

            return redirect()->route('transactions.index');
        }
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
     * @param int              $id
     * @param \App\Transaction $transaction
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function edit($id)
    {
        $data['transaction'] = Transaction::find($id);
        $data['accounts'] = Account::where('user_id', $this->userId)->orderByDesc('created_at')->get();
        $data['categories'] = Category::where('user_id', $this->userId)->orderByDesc('created_at')->get();

        return view('transactions.edit', $data);
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
