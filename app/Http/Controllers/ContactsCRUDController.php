<?php

namespace App\Http\Controllers;
use App\Models\contacts;
use Illuminate\Http\Request;
class ContactsCRUDController extends Controller
{

public function index()
{
$data['contacts'] = contacts::orderBy('id','desc')->paginate(5);
return view('contacts.index', $data);
}

public function create()
{
return view('contacts.create');
}

public function store(Request $request)
{
$request->validate([
'name' => 'required',
'lastname' => 'required',
'phone' => 'required'
]);
$contacts = new contacts;
$contacts->name = $request->name;
$contacts->lastname = $request->lastname;
$contacts->phone = $request->phone;
$contacts->save();
return redirect()->route('contacts.index')
->with('success','contacts has been created successfully.');
}

public function show(contacts $contacts)
{
return view('contacts.show',compact('contacts'));
} 

public function edit(contacts $contacts)
{
return view('contacts.edit',compact('contacts'));
}

public function update(Request $request, $id)
{
$request->validate([
'name' => 'required',
'lastname' => 'required',
'phone' => 'required',
]);
$contacts = contacts::find($id);
$contacts->name = $request->name;
$contacts->lastname = $request->lastname;
$contacts->phone = $request->phone;
$contacts->save();
return redirect()->route('contacts.index')
->with('success','contacts Has Been updated successfully');
}

public function destroy(contacts $contacts)
{
$contacts->delete();
return redirect()->route('contacts.index')
->with('success','contacts has been deleted successfully');
}
}