<?php

namespace App\Http\Controllers\Superuser;

use App\Http\Controllers\Controller;
use App\Http\Requests\Superuser\Transaction\StoreRequest;
use App\Http\Requests\Superuser\Transaction\UpdateRequest;
use App\Models\Transaction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Superuser.Transaction.index')
            ->with('collection', Transaction::query()->paginate(50));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('main.Superuser.Transaction.create');
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $object = new Transaction($request->validated());
        $object->save();

        return to_route('superuser.transaction.show', $object->id);
    }

    /**
     * @param Transaction $transaction
     * @return Application|Factory|View
     */
    public function show(Transaction $transaction): View|Factory|Application
    {
        return view('main.Superuser.Transaction.show')
            ->with('transaction', $transaction);
    }

    /**
     * @param Transaction $transaction
     * @return Application|Factory|View
     */
    public function edit(Transaction $transaction): View|Factory|Application
    {
        return view('main.Superuser.Transaction.edit')
            ->with('transaction', $transaction);
    }

    /**
     * @param UpdateRequest $request
     * @param Transaction $transaction
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Transaction $transaction): RedirectResponse
    {
        $transaction->update($request->validated());

        return to_route('superuser.transaction.show', $transaction->id);
    }

    /**
     * @param Request $request
     * @param Transaction $transaction
     * @return RedirectResponse
     */
    public function destroy(Request $request, Transaction $transaction): RedirectResponse
    {
        $transaction->delete();

        return to_route('superuser.transaction.index');
    }
}
