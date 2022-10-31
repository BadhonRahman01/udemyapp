<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Company;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function findContact($id)
    {
        return Contact::findOrfail($id);

    }
    public function index(){
        //DB::enableQueryLog();
        $companies = Company::orderBy('name')->pluck('name', 'id');
        $contacts = Contact::latestFirst()->paginate(10);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create(){
        return view('contacts.create');
    }

    public function show($id){
        $contact = $this->findContact($id);
        return view('contacts.show', compact('contact'));
    }

        public function store(Request $request)
        {

            $request->validate([
                 'first_name' => 'required',
                 'last_name' => 'required',
                 'email' => 'required|email',
                 //'address' => 'required',
                 'company' => 'required',
                 'company_id' => 'required|exists:companies,id',

            ]);
            Contact::create( $request->all() + ['user_id' => auth()->id()]);
            return redirect()->route('contacts.index')->with('message', "Contact has been added successfully");
        //    dd($request->all());
        //    dd($request->only('first_name', 'last_name'));
        //    dd($request->except('first_name', 'last_name'));
        }
        public function edit($id)
        {
            $companies = Company::orderBy('name')->pluck('name', 'id')->prepend("All Company");

            return view('contacts.edit', compact('companies'));
        }


        public function destroy($id)
        {
            $contact = $this->findContact($id);
            $contact->delete();
            return back()->with('message', "Message Deleted !");
        }

        
}
