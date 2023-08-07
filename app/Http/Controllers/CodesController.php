<?php

namespace App\Http\Controllers;

use App\Models\Codes;
use Exception;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes = Codes::orderBy('created_at', 'desc')->get();

        return view('codes.index', ['codes' => $codes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('codes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accountNumbers = $request->account_numbers;
        $accountNumbers = explode(',', $accountNumbers);

        foreach ($accountNumbers as $accountNumber) {
            try {
                $code = new Codes();
                $code->account_number = $accountNumber;
                $code->file = $accountNumber . '.png';
                if ($code->save()) {
                    QrCode::size(300)->format('png')->generate($accountNumber . '-Name', public_path('images/' . $code->file));
                }
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }

        return redirect()->route('codes.index')->with('success', 'QR Codes created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Codes  $codes
     * @return \Illuminate\Http\Response
     */
    public function show(Codes $codes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Codes  $codes
     * @return \Illuminate\Http\Response
     */
    public function edit(Codes $codes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Codes  $codes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codes $codes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Codes  $codes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Codes $codes)
    {
        //
    }
}
