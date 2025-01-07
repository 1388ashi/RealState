<?php

namespace App\Http\Controllers;

use App\Http\Requests\Selling\StoreRequest;
use App\Models\Facilitie;
use App\Models\Location;
use App\Models\Selling;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SellingController extends Controller
{
    public function index()
    {
        $typeId = request('type_id');  
        $locationId = request('location_id');  
        $area = request('area');  
        $status = request('status');  
        request()->merge([  
            'amount' => str_replace(',', '', request('amount')),  
        ]);  
        $amount = request('amount');

        $sellings = Selling::with('location', 'type')  
            ->when($area, fn($query) => $query->where('area', $area))  
            ->when($typeId, function ($query) use ($typeId) {  
                return $query->whereHas('type', fn($q) => $q->where('id', $typeId));  
            })  
            ->when($locationId, function ($query) use ($locationId) {  
                return $query->whereHas('location', function ($q) use ($locationId) {  
                    return $q->where('id', $locationId);
                });  
            })
            ->when($amount, fn($query) => $query->where('amount', '<=', $amount))
            ->when(isset($status), fn($query) => $query->where("status", $status))
            ->latest('id')->get();
        $types = Type::get();
        $locations = Location::get();

        return view('admin.selling.index',compact('sellings','types','locations'));
    }
    public function show(Selling $selling)
    {
        $selling->load('facilities','location','type');

        return view('admin.selling.show',compact('selling'));
    }
    public function create()
    {
        $locations = Location::get();
        $types = Type::get();
        $facilities = Facilitie::get();
        
        return view('admin.selling.create',compact('facilities','locations','types'));
    }
    
    public function store(StoreRequest $request): RedirectResponse
    {
        $selling = Selling::query()->create($request->validated());
        $facilities = $request->facilities;
        foreach ($facilities as $facilitie) {
            $selling->facilities()->attach($facilitie);
        }

        $data = [
            'status' => 'success',
            'message' => 'ملک با موفقیت ثبت شد'
        ];
        
        return redirect()->route('admin.sellings.index')
        ->with($data);
    }
    public function edit(Selling $selling)
    {
        $locations = Location::get();
        $types = Type::get();
        $facilities = Facilitie::get();
        
        return view('admin.selling.edit',compact('selling','facilities','locations','types'));
    }
    public function update(StoreRequest $request,Selling $selling): RedirectResponse
    {
        $selling->update($request->validated());

        $facilities = $request->facilities;
        $selling->facilities()->detach();
        foreach($facilities as $facilitie) {
            $selling->facilities()->attach($facilitie);
        }

        $data = [
            'status' => 'success',
            'message' => 'ملک با موفقیت به روزرسانی شد'
        ];
        
        return redirect()->route('admin.sellings.index')
        ->with($data);
    }
    public function changeStatus(Request $request,Selling $selling): RedirectResponse
    {
        $selling->update([
            'status' => $request->status
        ]);

        $data = [
            'status' => 'success',
            'message' => 'وضعیت ملک با موفقیت به روزرسانی شد'
        ];
        
        return redirect()->back()->with($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Selling $selling)
    {
        $selling->delete();

        $data = [
            'status' => 'success',
            'message' => 'ملک با موفقیت حذف شد'
        ];

        return redirect()->back()->with($data);
    }
}
