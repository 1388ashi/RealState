<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::latest('id')->get();
        
        return view('admin.location.index',compact('locations'));
    }
    
    public function store(Request $request): RedirectResponse
    {
        Location::query()->create([
            'title' => $request->title,
        ]);
        $data = [
            'status' => 'success',
            'message' => 'محله با موفقیت ثبت شد'
        ];
        
        return redirect()->route('admin.locations.index')
        ->with($data);
    }
    public function update(Request $request,Location $location): RedirectResponse
    {
        $location->update([
            'title' => $request->title,
        ]);
        $data = [
            'status' => 'success',
            'message' => 'محله با موفقیت به روزرسانی شد'
        ];
        
        return redirect()->route('admin.locations.index')
        ->with($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();

        $data = [
            'status' => 'success',
            'message' => 'محله با موفقیت حذف شد'
        ];

        return redirect()->route('admin.locations.index')
            ->with($data);
    }
}
