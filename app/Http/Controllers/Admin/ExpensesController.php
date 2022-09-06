<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use File;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Expenses;
use App\Models\OpeningBalance;
use App\Models\Order;
use App\Models\Order_detail;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->to==date('Y-m-d',strtotime(today()))) {
            $request->to=date('Y-m-d',strtotime(today()->addDay(1)));
        }
        $expenses=Expenses::orderBy('id','desc')->get();

        if(isset($request->to)){
            $expenses=Expenses::whereBetween('created_at',[$request->from,$request->to])->orderBy('id','desc')->get();

        }
        return view('admin.expense.index',compact('expenses'));
    }

    public function today()
    {
        $today_opening=OpeningBalance::whereDate('created_at',today())->value('amount');
        $expenses=Expenses::orderBy('id','desc')->whereDate('created_at',today())->get();
        return view('admin.expense.index',compact('expenses','today_opening'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.expense.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'remark'=>'required',
            'amount'=>'required',


        ]);
        try {
            //code...
        
  
        $expense=new Expenses;
        $expense->name=$request->name;
        $expense->remark=$request->remark;
        $expense->amount=$request->amount;

        $expense->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Created succesfully',
           
         );
        } catch (\Throwable $th) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to create  ',
               
             );
        }
         return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Room $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenses $expense)
    {
        return view('admin.expense.edit',compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expenses $expense)
    {
        $request->validate([
            'name'=>'required',
            'remark'=>'required',
            'amount'=>'required',

        ]);

        // try {
        //code...
        $expense=Expenses::find($expense->id);
        $expense->name=$request->name;
        $expense->amount=$request->amount;

        $expense->remark=$request->remark;
        $expense->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'updated succesfully', 
         );

        // } catch (\Throwable $th) {
        //     $notification=array(
        //         'alert-type'=>'error',
        //         'messege'=>'Failed to update    ',
               
        //      );
        // }
         return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expenses $expenses,$id)
    {
     
        $expenses=Expenses::find($id);
        $expenses->delete();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Deleted succesfully',
           
         );
         return redirect()->back()->with($notification);

    }


    public function opening_balance(Request $request){
        $opening_balance=new OpeningBalance;
        $opening_balance->amount=$request->opening_balance;
        $opening_balance->save();
        $notification=array(
          'messege'=>'Opening balance saved',
           'alert-type'=>'success'
       );
     
     return redirect()->back()->with($notification);
      }

      public function opening_balance_list(Request $request){
        $opening_balances=OpeningBalance::orderBy('id','desc')->get();
        return view('admin.expense.opening_balance',compact('opening_balances'));
      }
}
