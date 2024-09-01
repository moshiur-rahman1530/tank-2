<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**certificate
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:certificate-list|certificate-create|certificate-edit|certificate-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:certificate-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:certificate-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:certificate-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = Certificate::latest()->paginate(50);
        return view('certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificates.create');
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
            'certificate_id' => 'required',
            'container_id' => 'required',
            'certificate_name' => 'required',
            'test_date' => 'required',
            'expiration_date' => 'required',
            'certificate_cost' => 'required',
        ]);

        Certificate::create($request->all());

        return redirect()->route('certificates.index')
            ->with('success', 'certificate created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(certificate $certificate)
    {
        return view('certificates.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(certificate $certificate)
    {
        return view('certificates.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, certificate $certificate)
    {
        request()->validate([
           'certificate_id' => 'required',
            'container_id' => 'required',
            'certificate_name' => 'required',
            'test_date' => 'required',
            'expiration_date' => 'required',
            'certificate_cost' => 'required',
        ]);

        $certificate->update($request->all());

        return redirect()->route('certificates.index')
            ->with('success', 'certificate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(certificate $certificate)
    {
        $certificate->delete();

        return redirect()->route('certificates.index')
            ->with('success', 'certificate deleted successfully');
    }
}