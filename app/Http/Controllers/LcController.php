<?php

namespace App\Http\Controllers;

use App\Models\Lc;
use App\Models\Port;
use Illuminate\Http\Request;
use DB;

class LcController extends Controller
{
     /**lc
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:lc-list|lc-create|lc-edit|lc-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:lc-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:lc-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:lc-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $positions = Lc::latest()->paginate(50);
        
        return view('lcs.managelc');
    }
    // public function index()
    // {
    //     $lcs = Lc::latest()->paginate(50);
    //     return view('lcs.index', compact('lcs'));
    // }


     public function allLc()
  {
    // $result = TankPosition::all();
     $result = Lc::all();
    return $result;
  }


    public function autocomplete(Request $request)
    {
        // $data = [];
    
        // if($request->filled('q')){
        //     $data = Port::select("id", "port_name", "country")
        //                 ->where('port_name', 'LIKE', '%'. $request->get('q'). '%')
        //                 ->get();
        // }
     
        // return response()->json($data);


        $data = [];
            if($request->has('q')){
            $search = $request->q;
            $data = DB::table("ports")
            ->select("id","port_name", "country")
            ->where('port_name','LIKE',"%$search%")
            ->get();
            }
        return response()->json($data);


    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lcs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'lc_no' => 'required',
            'lc_date'=> 'required',
            'lc_type'=> 'required',
            'consignee_name' => 'required',
            'beneficiary' => 'required',
            'lc_expired_date'=> 'required',
            'last_ship_date'=> 'required',
            'product'=> 'required',
            'qtn' => 'required',
            'price' => 'required',
            'origin' => 'required',
            'destination' => 'required',
        ]);

        $result=Lc::create($request->all());

         if ($result==true) {
                    return 1;
                    } else {
                    return 0;
                    }

        // return redirect()->route('lcs.index')
        //     ->with('success', 'lc created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lc  $lc
     * @return \Illuminate\Http\Response
     */
    public function show(lc $lc)
    {
        return view('lcs.show', compact('lc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lc  $lc
     * @return \Illuminate\Http\Response
     */
    public function edit(lc $lc)
    {
        return view('lcs.edit', compact('lc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lc  $lc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lc $lc)
    {
        request()->validate([
            'lc_no' => 'required',
            'lc_date'=> 'required',
            'lc_type'=> 'required',
            'consignee_name' => 'required',
            'beneficiary' => 'required',
            'lc_expired_date'=> 'required',
            'last_ship_date'=> 'required',
            'product'=> 'required',
            'qtn' => 'required',
            'price' => 'required',
            'origin' => 'required',
            'destination' => 'required',
        ]);

        $lc->update($request->all());

        return redirect()->route('lcs.index')
            ->with('success', 'lc updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lc  $lc
     * @return \Illuminate\Http\Response
     */
    public function destroy(lc $lc)
    {
        $lc->delete();

        return redirect()->route('lcs.index')
            ->with('success', 'lc deleted successfully');
    }

    public function lcDetailId(Request $req)
  {
        $id = $req->input('id');
        $data = Lc::where('id','=',$id)->first();
        return $data;
  }




  public function updatelc(Request $request, $id)
    {

        request()->validate([
            // 'shipment_id' => 'required',
            'update_lc_no' => 'required',
            'update_lc_date' => 'required',
            'update_lc_type' => 'required',
            'update_consignee_name' => 'required',
            'update_beneficiary' => 'required',
            'update_lc_expired_date' => 'required',
            'update_last_ship_date' => 'required',
            'update_product' => 'required',
            'update_qtn' => 'required',
            'update_price' => 'required',
            'update_origin' => 'required',
            'update_destination' => 'required',
        
        ]);



        // $id = $request->data_id_for_update;

            $lc = Lc::find($id);


            $lc->lc_no = $request->update_lc_no;
            $lc->lc_date = $request->update_lc_date;
            $lc->lc_type = $request->update_lc_type;
            $lc->consignee_name = $request->update_consignee_name;
            $lc->beneficiary = $request->update_beneficiary;
            $lc->lc_expired_date = $request->update_lc_expired_date;
            $lc->last_ship_date = $request->update_last_ship_date;
            $lc->product = $request->update_product;
            $lc->qtn = $request->update_qtn;
            $lc->price = $request->update_price;
            $lc->origin = $request->update_origin;
            $lc->destination = $request->update_destination;
       

           ;
            
            $result= $lc->update();
                   if ($result==true) {
                    return 1;
                    } else {
                    return 0;
                    }
    }


     public function LcsDelete(Request $req)
    {
        $id = $req->input('id');
        $result = Lc::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        } else {
            return 0;
        }
    }
     public function lcShow(Request $req)
    {
        $id = $req->input('id');
        $result = Lc::where('id','=',$id)->first();
        return $result;
    }

}