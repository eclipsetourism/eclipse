<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Repositories\Package\PackageRepositoryInterface;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    protected $currentUser;
    protected $package;

    public function __construct(PackageRepositoryInterface $package) {

        parent::__construct();

        $this->currentUser = auth()->user();

        $this->package = $package;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $packages = $this->package->all();

        return view('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $package = $this->currentUser
                    ->packages()
                    ->create($request->all());
        
        flash()->success('Yay!', 'You have successfully added new Package.');

        return redirect()->route('admin.packages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($package)
    {
        return view('admin.packages.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $package)
    {        
        $this->currentUser->packages()
                ->where( 'id', $package->id )
                ->update([
                    'name' => $request->name,
                    'subtitle'  => $request->subtitle,
                    'departs' => $request->departs,
                    'returns' => $request->returns,
                    'duration' => $request->duration,
                    'adult_price' => $request->adult_price,
                    'child_price' => $request->child_price,
                    'description' => $request->description
                    ]);

        flash()->success('Yay!', 'Package has been successfully updated.');

        return redirect()->route('admin.packages.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($package)
    {
        $this->package->delete($package->id);

        flash()->success('Yay!', 'Package has been successfully deleted.');

        return redirect()->route('admin.packages.index');         
    }
}
