<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(DataTables $dataTables,Request $request)
    {
        // Datatable with server side processing with pagination
        $data = User::all();
        if ($request->ajax()) {
            return $dataTables->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.users.index', compact('data'));
    }

    public function store(Request $request)
    {
        $user = User::updateOrCreate(['id' => $request->user_id],
            ['name' => $request->name, 'email' => $request->email]);
        return response()->json($user);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::updateOrCreate(['id' => $request->user_id],
            ['name' => $request->name, 'email' => $request->email]);
        return response()->json($user);
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return response()->json(['success' => 'User deleted successfully.']);
    }

}
