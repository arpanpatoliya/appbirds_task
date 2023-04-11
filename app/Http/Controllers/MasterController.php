<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use DataTables;


class MasterController extends Controller
{
    public function index()
    {
        return view('deshbord');
    }
    public function getdata(Request $data)
    {
        $user = Customer::get();
        return DataTables::of($user)
                ->addColumn('action',function($user){
                    $html = '<button value="'.$user->id.'" class="btn btn-primary" id="edit" >Edit</button>&nbsp;';
                    $html .= '<button value="'.$user->id.'" class="btn btn-danger" id="delete"> Delete</button>';
                    return $html;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
    public function add(Request $data)
    {
        try {
            $validator = Validator::make($data->all(),[
                'name' => 'required',
                'email' => 'required|unique:customers',
                'mobile' => 'required|unique:customers',
                'DOB' => 'required',
                'country' => 'required',
                'aboutyou' => 'required',
            ]); 
            if ($validator->fails()) {
                return response(['status' => 0 , 'message' => $validator->messages()->first()]);
            }
            $customer = new Customer(); 
            $customer->name = $data->name;
            $customer->email = $data->email;
            $customer->mobile = $data->mobile;
            $customer->DOB = $data->DOB;
            $customer->country = $data->country;
            $customer->about_you = $data->aboutyou;
            if ($customer->save()) {
                // return redirect('deshbord')->with('success','Save Success Fully');
                return response(['status' => 1 , 'message' => 'Save Successfully']);
            }
            else {
                return response(['status' => 0 , 'message' => 'Error ! Plese Try agani']);

            }

        } catch (\Exception $ex) {
            return response(['status' => 0 , 'message' => $ex->getMessage()]);
        }
    }
    public function cdata(Request $data)
    {
        try {
            $customer = Customer::find($data->id);
            if ($customer) {
                return response(['status' => 1 , 'message' => 'Customer Details', 'data' => $customer]);
            } 
            else {
                 return response(['status' => 0 , 'message' => 'Customer Not Found']);
            }
        } catch (\Exception $ex) {
            return response(['status' => 0, 'message' => $ex->getMessage()]);   
        }
    }
    public function update(Request $data)
    {
        try {
            $validator = Validator::make($data->all(),[
                'name' => 'required',
                'email' => 'required|unique:customers,email,'.$data->id,
                'mobile' => 'required|unique:customers,mobile,'.$data->id,
                'DOB' => 'required',
                'country' => 'required',
                'aboutyou' => 'required',
            ]); 
            if ($validator->fails()) {
                return response(['status' => 0 , 'message' => $validator->messages()->first()]);
            }
            $customer = Customer::find($data->id);
            $customer->name = $data->name;
            $customer->email = $data->email;
            $customer->mobile = $data->mobile;
            $customer->DOB = $data->DOB;
            $customer->country = $data->country;
            $customer->about_you = $data->aboutyou;
            if ($customer->save()) {
                return response(['status' => 1, 'message' => 'Save Successfully']);
            }
            else {
                 return response(['status' => 0 , 'message' => 'Error ! Try Again']);
            }
        } catch (\Exception $ex) {
            return response(['status' => 0, 'message' => $ex->getMessage()]);
        }
    }
    public function delete($id)
    {
        $cus = Customer::find($id);
        if ($cus) {
            $delete = $cus->delete();
            if ($delete) {
                return redirect('deshbord')->with('success','Delete Successfully');
            }
        }
    }
}
