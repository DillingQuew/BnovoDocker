<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuestCreateRequest;
use App\Http\Resources\GuestResource;
use App\Models\Guest;
use Illuminate\Support\Facades\Storage;
use App\Services\GuestService;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GuestResource::collection(Guest::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuestCreateRequest $request)
    {
        $validated = $request->validated();
        $guestData = (new GuestService())->handleCountry($validated);
        $created_guest = Guest::create($guestData);
        return new GuestResource($created_guest);
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        return new GuestResource($guest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GuestCreateRequest $request, Guest $guest)
    {
        $validated = $request->validated();
        $guestData = (new GuestService())->handleCountry($validated);
        $guest->update($guestData);
        return new GuestResource($guest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guest $guest)
    {
        $guest->delete();
        return response(null, 204);
    }
}
