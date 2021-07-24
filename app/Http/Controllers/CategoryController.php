<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showDatatable()
    {
        $tasks = Category::orderBy('order', 'ASC')->select('id', 'title', 'status', 'created_at')->get();

        return view('demos.sortabledatatable', compact('tasks'));
    }

    public function updateOrder(Request $request)
    {
        $tasks = Category::all();

        foreach ($tasks as $task) {
            $task->timestamps = false; // To disable update_at field updation
            $id = $task->id;

            foreach ($request->order as $order) {
                if ($order['id'] == $id) {
                    $task->update(['order' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }


    public function getDateTime(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select(['id', 'name', 'email', 'created_at']);
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return [
                        'display' => e($row->created_at->format('d/m/Y')),
                        'timestamp' => $row->created_at->timestamp
                    ];
                })
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') LIKE ?", ["%$keyword%"]);
                })
                ->make(true);
        }
        return view('date-time');
    }
}
