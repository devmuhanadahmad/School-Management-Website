<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Invoice;
use App\Models\Studant;
use App\Models\StudantAcount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $studant = Studant::findOrFail($id);
        $accounts = Account::all();
        return view('admin.studant.invoice', compact('studant', 'accounts'));
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
        DB::beginTransaction();
        try {
        $studant = Studant::findOrFail($id);
        $accounts_id = $request->post('account_id');

        foreach ($accounts_id as $account) {

            // $account_id=Invoice::whereIn('account_id', $account)->get();

            $acc_id=Account::findOrFail($account);
            Invoice::updateOrCreate([
                'studant_id' => $studant->id,
                'schoolgrade_id' => $studant->schoolgrade_id,
                'classroom_id' => $studant->classroom_id,
                'account_id' => $acc_id->id,
                'debit' => $acc_id->price,
                'notes' => $request->post('notes'),
            ]);

            StudantAcount::updateOrCreate([
            'studant_id' => $studant->id,
            'schoolgrade_id' => $studant->schoolgrade_id,
            'classroom_id' => $studant->classroom_id,
            'account_id' => $account,
            'debit' => $acc_id->price,
            'credit' => 0,
            'notes' => $request->post('notes'),
            ]);
        }

        DB::commit();
        return redirect()->route('studant.index')->with('success', 'operation accomplished successfully');

      } catch (\Exception $e) {
        DB::rollback();
        return redirect()->route('studant.index')->with('errore', "Add operation failed ");
      }
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
