<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Http\RedirectResponse;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::latest('id')->get();
        
        return view('admin.type.index',compact('types'));
    }
    
    public function store(Request $request): RedirectResponse
    {
        Type::query()->create([
            'title' => $request->title,
        ]);
        $data = [
            'status' => 'success',
            'message' => 'نوع با موفقیت ثبت شد'
        ];
        
        return redirect()->route('admin.types.index')
        ->with($data);
    }
    public function update(Request $request,Type $type): RedirectResponse
    {
        $type->update([
            'title' => $request->title,
        ]);
        $data = [
            'status' => 'success',
            'message' => 'نوع با موفقیت به روزرسانی شد'
        ];
        
        return redirect()->route('admin.types.index')
        ->with($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        $data = [
            'status' => 'success',
            'message' => 'نوع با موفقیت حذف شد'
        ];

        return redirect()->route('admin.types.index')
            ->with($data);
    }
}
