<?php

namespace App\Http\Controllers;

use App\Http\Repositories\MarqueRepository;
use App\Http\Requests\MarqueRequest;
use App\Mail\CreateMarque;
use App\Mail\UpdateMarque;
use App\Models\Marque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        if (Auth::user()->can('marque-update')) {
            return view('marque.create');
        }

        abort(401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarqueRequest $request, Marque $marque)
    {
        $this->marqueRepository->store($request);

        $email = (new CreateMarque($marque))->with([
            'marque' => $marque,
            // 'autre_variable' => 'Valeur de l\'autre variable',
            // Ajoutez d'autres variables au besoin
        ]);

        Mail::to(Auth::user()->email)->send($email);

        return redirect()->route('marque.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marque $marque)
    {
        return view('marque.show', compact('marque'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marque $marque)
    {
        $marques = Marque::all();
        if (Auth::user()->can('marque-update')) {
            return view('marque.edit', compact('marque'));
        }

        abort(401);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MarqueRequest $request, Marque $marque)
    {

        $this->marqueRepository->update($request, $marque);

        $email = (new UpdateMarque($marque))->with([
            'marque' => $marque,
            // 'autre_variable' => 'Valeur de l\'autre variable',
            // Ajoutez d'autres variables au besoin
        ]);

        Mail::to(Auth::user()->email)->send($email);

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
