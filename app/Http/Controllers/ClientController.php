<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClientRequest;
use App\Http\Requests\EditClientRequest;
use App\Models\Branch;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

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

    public function profileClient($id)
    {
        $client = Client::find($id);

        $clientCount = Sale::select('*', DB::raw('COUNT(*) as count'))
            ->where('client_id', $id)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();

        if (checkUserBranch()[1]) {
            $products = Product::where('branch_id', checkUserBranch()[1]->id)
                ->get();

            $employees = Employee::where('branch_id', checkUserBranch()[1]->id)
                ->where('status', 1)
                ->get();
        } else {
            $products = Product::get();

            $employees = Employee::where('status', 1)
                ->get();
        }


        $payments = Payment::get();

        return view('admin.clients.profileClient', compact('client', 'products', 'employees', 'payments', 'clientCount'));
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
        return redirect()->to('/perfil-cliente/' .$client->id);
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
