<?php

namespace App\Http\Controllers;

use App\Http\Requests\MortgageRent\StoreRequest;
use App\Models\Facilitie;
use App\Models\Location;
use App\Models\MortgageRent;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MortgageRentController extends Controller
{
    public function index()
    {
        $typeId = request('type_id');  
        $locationId = request('location_id');  
        $area = request('area');  
        $status = request('status');  
        request()->merge([  
            'mortgage_amount' => str_replace(',', '', request('mortgage_amount')),  
            'rent_amount' => str_replace(',', '', request('rent_amount')),  
        ]);  
        $mortgageAmount = request('mortgage_amount');
        $rentAmount = request('rent_amount');

        $mortgageRents = MortgageRent::with('location', 'type')  
            ->when($area, fn($query) => $query->where('area', $area))  
            ->when($typeId, function ($query) use ($typeId) {  
                return $query->whereHas('type', fn($q) => $q->where('id', $typeId));  
            })  
            ->when($locationId, function ($query) use ($locationId) {  
                return $query->whereHas('location', function ($q) use ($locationId) {  
                    return $q->where('id', $locationId);
                });  
            })
            ->when($mortgageAmount, fn($query) => $query->where('mortgage_amount', '<=', $mortgageAmount))
            ->when($rentAmount, fn($query) => $query->where('rent_amount', '<=', $rentAmount))
            ->when(isset($status), fn($query) => $query->where("status", $status))
            ->latest('id')->get();
        $types = Type::get();
        $locations = Location::get();

        return view('admin.mortgageRent.index',compact('mortgageRents','types','locations'));
    }
    public function show($id)
    {
        $mortgageRent = MortgageRent::with('facilities','location','type')->findOrFail($id);

        return view('admin.mortgageRent.show',compact('mortgageRent'));
    }
    public function create()
    {
        $locations = Location::get();
        $types = Type::get();
        $facilities = Facilitie::get();
        
        return view('admin.mortgageRent.create',compact('facilities','locations','types'));
    }
    
    public function store(StoreRequest $request): RedirectResponse
    {
        $mortgageRent = MortgageRent::query()->create($request->validated());
        $facilities = $request->facilities;
        foreach ($facilities as $facilitie) {
            $mortgageRent->facilities()->attach($facilitie);
        }

        $data = [
            'status' => 'success',
            'message' => 'ملک با موفقیت ثبت شد'
        ];
        
        return redirect()->route('admin.mortgage-rents.index')
        ->with($data);
    }
    public function edit($id)
    {
        $mortgageRent = MortgageRent::with('facilities')->findOrFail($id);
        $locations = Location::get();
        $types = Type::get();
        $facilities = Facilitie::get();
        
        return view('admin.mortgageRent.edit',compact('mortgageRent','facilities','locations','types'));
    }
    public function update(StoreRequest $request,$id): RedirectResponse
    {
        $mortgageRent = MortgageRent::findOrFail($id);
        $mortgageRent->update($request->validated());

        $facilities = $request->facilities;
        $mortgageRent->facilities()->detach();
        foreach($facilities as $facilitie) {
            $mortgageRent->facilities()->attach($facilitie);
        }

        $data = [
            'status' => 'success',
            'message' => 'ملک با موفقیت به روزرسانی شد'
        ];
        
        return redirect()->route('admin.mortgage-rents.index')
        ->with($data);
    }
    public function changeStatus(Request $request,$id): RedirectResponse
    {
        $mortgageRent = MortgageRent::findOrFail($id);
        $mortgageRent->update([
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
    public function destroy($id)
    {
        $mortgageRent = MortgageRent::findOrFail($id);
        $mortgageRent->delete();

        $data = [
            'status' => 'success',
            'message' => 'ملک با موفقیت حذف شد'
        ];

        return redirect()->back()->with($data);
    }
}
