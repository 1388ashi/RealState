<?php

namespace App\Http\Controllers;

use App\Models\Facilitie;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class FacilitiesController extends Controller
{
    public function index()
    {
        $facilities = Facilitie::latest('id')->get();
        
        return view('admin.facilities.index',compact('facilities'));
    }
    
    public function store(Request $request): RedirectResponse
    {
        Facilitie::query()->create([
            'title' => $request->title,
        ]);
        $data = [
            'status' => 'success',
            'message' => 'امکانات با موفقیت ثبت شد'
        ];
        
        return redirect()->route('admin.facilities.index')
        ->with($data);
    }
    public function update(Request $request,$id): RedirectResponse
    {
        $facilitie = Facilitie::findOrFail($id);
        $facilitie->update([
            'title' => $request->title,
        ]);
        $data = [
            'status' => 'success',
            'message' => 'امکانات با موفقیت به روزرسانی شد'
        ];
        
        return redirect()->route('admin.facilities.index')
        ->with($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $facilitie = Facilitie::findOrFail($id);
        $facilitie->delete();

        $data = [
            'status' => 'success',
            'message' => 'امکانات با موفقیت حذف شد'
        ];

        return redirect()->route('admin.facilities.index')
            ->with($data);
    }
}
