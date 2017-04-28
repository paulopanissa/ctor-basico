<?php

namespace App\Http\Controllers;

use App\Entities\Client;
use App\Entities\ClientEmail;
use App\Entities\ClientPhone;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    use ApiControllerTrait;

    protected $model;

    protected $relationships = ['profession', 'email', 'phone'];

    public function __construct(Client $client)
    {
        $this->model = $client;
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'birthday' => 'required',
            'set_profession_id' => 'required',
            //'emails.*.email' => 'required|email',
            //'phones.*.phone' => 'required'
        ]);

        $store = $this->model->create($request->all());

        if($store){
            $client = $this->showToSave($store->id);
            if($request->has('email')){
                foreach($request->email as $email){
                    $client->email()->create($email);
                }
            }

            if($request->has('phone')){
                foreach($request->phone as $phone){
                    $client->phone()->create($phone);
                }
            }
        }

        return $this->show($store->id);

    }


}
