<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClientRequest;
use App\Http\Requests\EditClientRequest;
use App\Models\Branch;
use App\Models\Client;

class ClientController extends Controller
{
    public function listClient()
    {
        if (checkUserBranch()[1]) {
            $clients = Client::with(['branch'])
                ->where('branch_id', checkUserBranch()[1]->id)
                ->get();
        } else {
            $clients = Client::with(['branch'])
                ->get();
        }

        return view('admin.clients.indexClient', compact('clients'));
    }

    public function addNewClient()
    {
        $branches = Branch::get();

        return view('admin.clients.addClient', compact('branches'));
    }

    public function addClient(AddClientRequest $request)
    {
        $client = Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'phone' => $request->phone,
            'branch_id' => $request->branch_id,
        ]);

        toast('Se agregó el cliente ' . $client->name . ' correctamente', 'success');
        return redirect()->route('list.client');
    }

    public function editClient($id)
    {
        $client = Client::find($id);

        $branches = Branch::get();

        return view('admin.clients.editClient', compact('client', 'branches'));
    }

    public function upgradeClient(EditClientRequest $request, $id)
    {
        $client = Client::find($id);
        $client->name = $request->name;
        $client->email = $request->email;
        $client->birthday = $request->birthday;
        $client->phone = $request->phone;
        $client->branch_id = $request->branch_id;
        $client->save();

        toast('Se editó el cliente ' . $client->name . ' correctamente', 'success');
        return redirect()->route('list.client');
    }

    public function deleteClient($id)
    {
        $client = Client::find($id);
        $client->delete();

        toast('Se eliminó el cliente ' . $client->name . ' correctamente', 'success');
        return redirect()->route('list.client');
    }
}
