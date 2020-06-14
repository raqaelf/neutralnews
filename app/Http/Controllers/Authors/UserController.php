<?php

namespace App\Http\Controllers\Authors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
	{
		if ($request->ajax()) {
			$data = User::where('id', '!=', auth()->id())->latest()->get();
			return Datatables::of($data)
			->addIndexColumn()
			->addColumn('action', function($row){
				$btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-xs btn-white btn-uppercase editRole"><i class="icon ion-md-create mr-1"></i>Edit</a>';
				$btn = $btn.' <a href="javascript:void(0)"  data-id="'.$row->id.'" class="btn btn-xs text-danger btn-uppercase deleteRole">Delete</a>';

				return $btn;
			})
			->rawColumns(['action'])
			->make(true);
		}
		return view('Authors.user.index');
	}

	public function store(Request $request)
	{
		$request->validate([
            'name'    =>  'required',
			'email'   =>  'required',
            'role'    =>  'required',
            ]
        );
        $insert = User::updateOrCreate(['id' => $request->input('id')],
        [
            'name'    =>  $request->input('name'),
			'email'   =>  $request->input('email'),
            'role'    =>  $request->input('role'),
            ]
        );
        if ($insert) {
            return response()->json(['message' => 'Data created'], 201);
        } else {
            return response()->json(['message' => 'Failed to Create Data'], 500);
        }
	}

	public function edit($id)
	{
		$user = User::find($id);
		$json = [
			'id' => $user->id,
            'name' => $user->name,
			'email' => $user->email,
			'role' => $user->role,
		];
		return response()->json($json);
	}

	public function destroy($id)
	{
		$data = User::find($id);
		if ($data->delete()) {
			return response()->json(['msg'=>'Category deleted successfully.']);
		} else {
			return response()->json(['msg'=>'Failed']);
		}
	}
}
