<?php

namespace App\Http\Controllers\Backend\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Location\ManageLocationRequest;
use App\Http\Requests\Backend\Location\StoreLocationRequest;
use App\Http\Requests\Backend\Location\UpdateLocationRequest;
use App\Models\Institute\Institute;
use App\Models\Location\Location;
use App\Repositories\Backend\Location\LocationRepository;

class LocationController extends Controller
{
    /**
     * @var LocationRepository
     */
    protected $locations;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(LocationRepository $locations)
    {
        $this->locations = $locations;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageLocationRequest $request)
    {
        return view('backend.location.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLocationRequest $request)
    {
        $data = $request->all();

        $location = Location::create($data);

        return redirect()->route('admin.institute')->withFlashSuccess(trans('alerts.backend.locations.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location\Location $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('backend.location.show')->withLocation($location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location\Location $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        return view('backend.location.edit')->withLocation($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backend\Location\StoreLocationRequest  $request
     * @param  \App\Models\Location\Location $location
     * @return \Illuminate\Http\Response
     */
    public function update(Location $location, UpdateLocationRequest $request)
    {
        $location->update($request->all());
        return redirect()->route('admin.locations.show', [$location->id])->withFlashSuccess(trans('alerts.backend.locations.updated'));
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
