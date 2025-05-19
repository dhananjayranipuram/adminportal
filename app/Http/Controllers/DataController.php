<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    public function sample(){
        dd(session()->all());

    }

    public function list(Request $request)
    {
        $type = $request->input('type');

        switch ($type) {
            case 'customer':
                return response()->json(Customer::all());
                break;
            case 'invoice':
                $invoices = Invoice::with('customer')->get();
                return response()->json($invoices);
                break;
            default:
                return response()->json(['error' => 'Invalid type'], 400);
                break;
        }
    }

    public function create(Request $request)
    {
        $type = $request->input('type');

        switch ($type) {
            case 'customer':
                $request->validate([
                    'name' => 'required|string',
                    'email' => 'required|email|unique:customers,email',
                    'phone' => 'nullable|digits:10',
                    'address' => 'nullable|string',
                ]);

                $customer = Customer::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                ]);
                return response()->json($customer);
                break;
            case 'invoice':
                $request->validate([
                    'customer_id' => 'required|exists:customers,id',
                    'date' => 'required|date',
                    'amount' => 'required|numeric',
                    'status' => 'required|in:Unpaid,Paid,Cancelled',
                ]);

                $invoice = Invoice::create([
                    'customer_id' => $request->customer_id,
                    'date' => $request->date,
                    'amount' => $request->amount,
                    'status' => $request->status,
                ]);
                return response()->json($invoice);
                break;
            default:
                return response()->json(['error' => 'Invalid type'], 400);
                break;
        }
    }

    public function update(Request $request)
    {
        $type = $request->input('type');

        switch ($type) {
            case 'customer':
                $request->validate([
                    'id' => 'required|exists:customers,id',
                    'name' => 'required|string',
                    'phone' => 'nullable|string',
                    'email' => 'required|email|unique:customers,email',
                    'address' => 'nullable|string',
                ]);
            
                $customer = Customer::findOrFail($request->input('id'));

                $customer->update([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                ]);

                return response()->json(['message' => 'Customer data updated successfully']);
                break;
            case 'invoice':
                $request->validate([
                    'id' => 'required|exists:invoices,id',
                    'customer_id' => 'required|exists:customers,id',
                    'date' => 'required|date',
                    'amount' => 'required|numeric',
                    'status' => 'required|in:Unpaid,Paid,Cancelled',
                ]);

                $invoice = Invoice::find($request->id);

                $invoice->update([
                    'customer_id' => $request->customer_id,
                    'date' => $request->date,
                    'amount' => $request->amount,
                    'status' => $request->status,
                ]);

                return response()->json(['message' => 'Invoice data updated successfully']);
                break;
            default:
                return response()->json(['error' => 'Invalid type'], 400);
                break;
        }
    }

    public function editInvoiceView($id)
    {
        $invoice = Invoice::findOrFail($id);
        $customers = Customer::all();
        return view('/admin/invoice_edit', compact('invoice', 'customers'));
    }

    public function editCustomerView($id)
    {
        $customer = Customer::findOrFail($id);
        return view('/admin/customer_edit', compact('customer'));
    }
}
