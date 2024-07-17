<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listings
    public function index()
    {

//        dd(request());
        return view('listings.index', [
            'heading' => 'Latest Listings',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(2)


        ]);
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate(['title' => 'required',
                'company' => ['required', Rule::unique('listings', 'company')],
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'required']

        );
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');

        }
        $formFields['user_id'] = auth()->id();
//        dd($request);
        Listing::create($formFields);
        return redirect('/')->with('message', 'listing created successful!!');
    }

    //show single lisiting
    public function show(Listing $listing)
    {

        return view('listings.show', ['listing' => $listing]);

    }

    //show edit form
    public function edit(Listing $listing)
    {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function destroy(Listing $listing)
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action ');
        }
        $listing->delete();
        return redirect('/')->with('message', 'listing deleted successfully !!');
    }

//update listing data
    public function update(Request $request, Listing $listing)
    {
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthoriztied Action ');
        }
        $formFields = $request->validate(['title' => 'required',
                'company' => 'required',
                'location' => 'required',
                'website' => 'required',
                'email' => ['required', 'email'],
                'tags' => 'required',
                'description' => 'required']

        );
        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');

        }
//        dd($request);
        $listing->update($formFields);

        return back()->with('message', 'listing updated successful!!');
    }

    public function manage()
    {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
//,
}
