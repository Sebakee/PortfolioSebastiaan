<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index() {
        return view('Listings.index', [
            'listings' => Listing::latest()
            ->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function show(Listing $listing) {
        return view('Listings.show', [
            'listing' => $listing
        ]);
    }

    public function create(){
        return view('listings.create');
    }

    public function store(Request $request){

        $formFields = $request->validate([
            'title' => 'required', 
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required', 
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasfile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        

        return redirect('/')
        ->with('message', 'Listing created successfully!');
    }

    public function edit(Listing $listing){
        return view('Listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing)
    {
        if($listing->user_id != auth()->id()){
            abort(403, 'unauthorized action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasfile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        

        $listing->update($formFields);

        

        return back()
            ->with('message', 'Listing updated successfully!');
    }

    public function destroy(Listing $listing){
        if ($listing->user_id != auth()->id()) {
            abort(403, 'unauthorized action');
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    public function manage(){
        return view('listings.manage', [
            'listings' => Listing::all()]);
    }


}

