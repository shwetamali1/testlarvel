<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\XmlData;

class ReadXmlController extends Controller
{
    public function index(Request $req)
    {
        if($req->isMethod("POST")){

            $xmlDataString = file_get_contents(public_path('contacts.xml'));
            $xmlObject = simplexml_load_string($xmlDataString);
                    
            $json = json_encode($xmlObject);
            $phpDataArray = json_decode($json, true); 
    
            // echo "<pre>";
            // print_r($phpDataArray);

            if(count($phpDataArray['contacts']) > 0){

                $dataArray = array();
                
                foreach($phpDataArray['contacts'] as $index => $data){

                    $dataArray[] = [
                        "name" => $data['name'],
                        "lastname" => $data['lastname'],
                        "phone" => $data['phone']
                    ];
                }

                XmlData::insert($dataArray);

                return back()->with('success','Data saved successfully!');
            }
        }

        return view("xml-data");
    }
}
