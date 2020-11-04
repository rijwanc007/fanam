<?php

namespace App\Http\Controllers;

use App\Collection;
use App\Company;
use App\SisCon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CollectionController extends Controller
{
    public function index()
    {
        $collections = Collection::paginate(20);
        return view('collection.index', compact('collections'));
    }
    public function create()
    {
        $companies = Company::all();
        $siscons = SisCon::all();
        return view('collection.create', compact('companies','siscons'));
    }
    public function store(Request $request)
    {
        Collection::create([
           'mcompany'=>$request->mcompany,
            'name'=>$request->siscon,
            'tax'=>$request->tax,
            'collection'=>$request->collection,
            'date'=>$request->date,
            'totaltax'=>$request->totaltax,
            'totalcollection'=>$request->collectionat,
            ]);
        Session::flash('success', 'Collection created Successfully');
        return redirect()->route('collection.index');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $collection = Collection::find($id);
        $companies = Company::all();
        $siscons = SisCon::all();
        return view('collection.edit', compact('collection', 'companies', 'siscons'));
    }
    public function update(Request $request, $id)
    {
        $collection = Collection::find($id);
        $collection->update([
            'mcompany'=>$request->mcompany,
            'name'=>$request->siscon,
            'tax'=>$request->tax,
            'collection'=>$request->collection,
            'date'=>$request->date,
            'totaltax'=>$request->totaltax,
            'totalcollection'=>$request->collectionat,
        ]);
        Session::flash('success', 'Collection Updated Successfully');
        return redirect()->route('collection.index');
    }
    public function destroy($id)
    {
        Collection::find($id)->delete();
        Session::flash('success', 'Collection deleted Successfully');
        return redirect()->back();
    }
}
