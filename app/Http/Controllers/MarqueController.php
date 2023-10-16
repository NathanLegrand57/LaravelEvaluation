<?php

namespace App\Http\Controllers;

use App\Http\Repositories\MarqueRepository;
use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $marqueRepository;
    public function __construct(MarqueRepository $marqueRepository)
    {
        $this->marqueRepository = $marqueRepository;
        // $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $marques = Marque::all();
        return view('marque.index', compact('marques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marque.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->marqueRepository->store($request);
        return redirect()->route('marque.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marque $marque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marque $marque)
    {
        $marques = Marque::all();

        return view('marque.edit', compact('marque'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marque $marque)
    {

        $this->marqueRepository->update($request, $marque);
        return redirect()->route('marque.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marque $marque)
    {
        $marque -> delete();
        return redirect()->route("marque.index");
    }
}
