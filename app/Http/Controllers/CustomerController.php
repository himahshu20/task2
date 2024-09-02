<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Customer;
use App\Models\ItemMaster;
use App\Models\Item;
use App\Models\Store;
use DB;

class CustomerController extends Controller
{

    public function index(Request $request)
    {

        $latest_id = Customer::all()->count('id');
        $item_list = Item::all();
        $doc_no = !empty($latest_id) ? 'DOC-' . sprintf('%03u', $latest_id + 1) : 'DOC-001';
        return view('pages.customer', ['doc_no' => $doc_no, 'item' => $item_list]);
    }

    public function getStoreList(Request $request)
    {

        $store_list = Store::all();
        $response = array();
        if (!empty($store_list)) {
            $response = ['Success' => true, 'data' => $store_list, 'code' => 200];
            return response()->json($response);
        } else {
            $response = ['Fail' => true, 'data' => array(), 'code' => 404];
            return response()->json($response);
        }
    }

    public function listDoc(Request $request)
    {
        $customers = Customer::all();
        if ($customers->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No customers found',
                'data'    => []
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Customers retrieved successfully',
            'data'    => $customers
        ],200);
    }

    public function saveDoc(Request $request)
    {
        $data = $request->all();

        try {
            DB::beginTransaction();
            $latest_id = Customer::latest()->select('doc_no')->first();
            $doc_no = !empty($latest_id) ? $latest_id->doc_no + 1 : 1;
            $customer_data = [
                'doc_no' => $doc_no,
                'doc_date' => $data['doc_date'],
                'name' => $data['customer_name'],
                'email' => $data['customer_email']
            ];
            $save_customer = Customer::create($customer_data);
            if (!$save_customer) {
                DB::rollBack();
                return response()->json(['success' => false, 'message' => 'Failed to save customer data.'], 500);
            }
            $item_save = [];
            foreach ($data['item'] as $item) {
                if (!empty($item['name'])) {
                    $item_save[] = [
                        'doc_id' => $save_customer->id,
                        'item_name' => $item['name'],
                        'qty' => $item['quantity']
                    ];
                }
            }
            if (!empty($item_save)) {
                $item_save_result = ItemMaster::insert($item_save);
                if (!$item_save_result) {
                    DB::rollBack();
                    return response()->json(['success' => false, 'message' => 'Failed to save item data.'], 500);
                }
            }
            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data saved successfully.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }
}
