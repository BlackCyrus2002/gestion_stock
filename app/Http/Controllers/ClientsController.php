<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\ClientsModel;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function clients()
    {
        $clients = ClientsModel::orderBy('created_at', 'asc')->paginate(5);

        return View('dashboard.clients', ['clients' => $clients]);
    }
    public function save_clients(ClientRequest $client_request, ClientsModel $clients)
    {
        $request = $client_request->validated();
        $clients->fill($request);
        if ($clients->save()) {
            return back()->with('success', 'Le client a bien été enregistré');
        }
        return back()->with('error', 'Une erreur est survenue');
    }
}