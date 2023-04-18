<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\MaterialGroup;
use App\Models\MaterialToGroup;
use App\Models\Order;
use App\Models\OrderMaterialGroup;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Order $order)
    {
        return view('order.index',[
          'orders' => Order::with('client')->get(),
        ]);
    }

    public function create()
    {
        return view('order.create',[
            'clients' => Client::select(['id','name', 'lastname'])->get(),
            'materialGroups' => MaterialToGroup::with(['material', 'group'])->get(),
            'groups' => MaterialGroup::all(),
        ]);
    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
