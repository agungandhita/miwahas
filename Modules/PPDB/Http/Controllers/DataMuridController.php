<?php

namespace Modules\PPDB\Http\Controllers;

use App\Models\dataMurid;
use App\Models\User;
use App\Models\Biaya;
use Illuminate\Contracts\Support\Renderable;
use ErrorException;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Modules\SPP\Entities\DetailPaymentSpp;
use Modules\SPP\Entities\PaymentSpp;

class DataMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $murid = User::with('muridDetail')->where('role','Guest')->get();
        return view('ppdb::backend.dataMurid.index', compact('murid'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('ppdb::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $murid = User::with('muridDetail','dataOrtu','berkas')->where('role','Guest')->find($id);
        if (!$murid->muridDetail->agama || !$murid->dataOrtu->nama_ayah || !$murid->berkas->kartu_keluarga) {
            Session::flash('error','Calon Siswa Belum Input Biodata Diri !');
            return redirect('/ppdb/data-murid');
        }
        return view('ppdb::backend.dataMurid.show',compact('murid'));

    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('ppdb::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();



            $murid = User::find($id);
            $murid->role = 'Murid';
            $murid->update();

            if ($murid) {
                $data = dataMurid::where('user_id', $id)->first();
                $data->proses   = $murid->role;
                $data->update();

                // create data payment
                $this->payment($murid->id);
            }

            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $murid->assignRole($murid->role);

            DB::commit();
            Session::flash('success','Success, Data Berhasil diupdate !');
            return redirect()->route('data-murid.index');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    // Create Data Payment
    public function payment($murid)
    {
      try {
        DB::beginTransaction();
        $payment = PaymentSpp::create([
          'user_id'   => $murid,
          'year'      => date('Y'),
          'is_active' =>  1
        ]);
        $biaya = Biaya::first();

        if ($payment) {
            DetailPaymentSpp::create([
                'payment_id'  => $payment->id,
                'user_id'     => $murid,
                'month'       => date('F'),
                'amount'      => $biaya->biaya,
                'status'      => 'unpaid',
                'file'        => null,
                'user_created' =>  auth()->user()->id
            ]);
        }
        DB::commit();
      } catch (\ErrorException $e) {
        DB::rollBack();
        throw new ErrorException($e->getMessage());
      }
    }
}
