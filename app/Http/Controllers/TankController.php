<?php

namespace App\Http\Controllers;

use App\Models\Tank;
use Illuminate\Http\Request;

class TankController extends Controller
{
    /**tank
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:tank-list|tank-create|tank-edit|tank-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:tank-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:tank-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:tank-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // public function index()
    // {
    //     $tanks = Tank::with('TankPosition')->get();
    //     return view('tanks.index', compact('tanks'));
    // }
    public function demo()
    {
        $tankNumbers = DB::table('tank')
        ->whereNotIn('tank_number', function($query) {
        $query->select('tank_number')->from('tank_position');
    })
    ->pluck('tank_number');
    }

     public function index()
    {
        $tanks = Tank::with('TankPosition')->get();
        return response()->json($tanks);
        // aikhane problem ai khane tumi response hisebe pura akta page render korteso,tumi data json response send koro,then javascript a giye status dhore page show //koro
        // ami jodi json render kori tahole oi page ta extend ba secton use kora lagtase na tasara script se section ta kivave add korbo

        //shono akta example dei 
        /*  
         $data = Model::all();
         return response()->json($data);


         <div id="content-container">
           <!-- Content will be loaded here -->
        </div>

        $(document).ready(function() {
    $.ajax({
        url: "{{ route('fetch.data') }}",
        method: 'GET',
        success: function(response) {
            // If returning a view
            $('#content-container').html(response);

            // If returning JSON
            // $('#content-container').html(JSON.stringify(response));
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
});
// ei qury ta ami ki 
 aivabe try koro ar oi query use koro,then messenger a knock dio layout thik ase,just i
        */

        // ok ami try kore dekhi
      
        // return view('tanks.managetank');
    }


    public function allTanks()
    {
        // $result = Tank::all();
        $result = Tank::with('TankPosition')->get();
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tanks.create');
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
            'tank_number'=> 'required',
            'tank_owner'=> 'required',
            'manufacturing_date'=> 'required',
            'current_po_certificate'=> 'required',
            'certificate_name'=> 'required',
            'certificate_cost'=> 'required',
            'last_test_date'=> 'required',
            'expired_date'=> 'required',
            // 'no_of_test'=> 'required',
            // 'status'=> 'required'
        ]);

        $result=Tank::create($request->all());

        if ($result==true) {
                    return 1;
                    } else {
                    return 0;
                    }

        // return redirect()->route('tanks.index')
        //     ->with('success', 'tank created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function show(Tank $tank)
    {
        return view('tanks.show', compact('tank'));
    }
    
    public function viewtank($id)
    {
        $tank = Tank::where('tank_number', '=', $id)->first();
        return view('tanks.show', compact('tank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function edit(Tank $tank)
    {
        return view('tanks.edit', compact('tank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tank $tank)
    {
        request()->validate([
           'tank_number'=> 'required',
            'tank_owner'=> 'required',
            'manufacturing_date'=> 'required',
            'current_po_certificate'=> 'required',
            'certificate_name'=> 'required',
            'certificate_cost'=> 'required',
            'last_test_date'=> 'required',
            'expired_date'=> 'required',
            // 'no_of_test'=> 'required',
            // 'status'=> 'nullable'
        ]);

        $tank->update($request->all());

        return redirect()->route('tanks.index')
            ->with('success', 'tank updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tank  $tank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tank $tank)
    {
        $tank->delete();

        return redirect()->route('tanks.index')
            ->with('success', 'tank deleted successfully');
    }


     public function TanksDelete(Request $req)
    {
        $id = $req->input('id');
        $result = Tank::where('id','=',$id)->delete();
        if ($result==true) {
            return 1;
        } else {
            return 0;
        }
    }
     public function showsingletank(Request $req)
    {
        $id = $req->input('id');
        $result = Tank::where('id','=',$id)->first();
        return $result;
    }


      public function TanksDetails(Request $req)
  {
        $id = $req->input('id');
        $data = Tank::where('id','=',$id)->first();
        return $data;
  }


  public function updatetank(Request $request, $id)
    {

        request()->validate([
            'update_tank_number' => 'required',
            'update_tank_owner' => 'required',
            'update_tank_manuf_date' => 'required',
            'update_tank_curr_po_certificate' => 'required',
            'update_tank_certificate_name' => 'required',
            'update_tank_certificate_cost' => 'required',
            'update_tank_last_test' => 'required',
            'update_tank_expire' => 'required',
        
        ]);
     
            $tank = Tank::find($id);
            $tank->tank_number = $request->update_tank_number;
            $tank->tank_owner = $request->update_tank_owner;
            $tank->manufacturing_date = $request->update_tank_manuf_date;
            $tank->current_po_certificate = $request->update_tank_curr_po_certificate;
            $tank->certificate_name = $request->update_tank_certificate_name;
            $tank->certificate_cost = $request->update_tank_certificate_cost;
            $tank->last_test_date = $request->update_tank_last_test;
            $tank->expired_date = $request->update_tank_expire;
         
            $result= $tank->update();
                   if ($result==true) {
                    return 1;
                    } else {
                    return 0;
                    }
    }


}