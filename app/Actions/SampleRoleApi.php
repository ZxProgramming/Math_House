<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class SampleRoleApi
{
    public $roles_description = [
        'administrator' => 'Best for business owners and company administrators',
        'developer' => 'Best for developers or people primarily using the API',
        'analyst' => 'Best for people who need full access to analytics data, but don\'t need to update business settings',
        'support' => 'Best for employees who regularly refund payments and respond to disputes',
        'trial' => 'Best for people who need to preview content data, but don\'t need to make any updates',
    ];

    public function datatableList(Request $request)
    {
        $draw = $request->input('draw', 0);
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $columns = $request->input('columns');
        $searchValue = $request->input('search.value');

        $orderColumn = $request->input('order.0.column', 0); // Get the order column index
        $orderDir = $request->input('order.0.dir', 'asc'); // Get the order direction (ASC or DESC)

        $query = Role::query()->with('permissions')->with('users');

        if ($searchValue) {
            $searchColumns = ['name'];
            $query->where(function ($query) use ($searchValue, $searchColumns) {
                foreach ($searchColumns as $column) {
                    $query->orWhere(DB::raw("LOWER($column)"), 'LIKE', '%' . strtolower($searchValue) . '%');
                }
            });
        }

        // Get the column name for ordering based on the orderColumn index
        $orderColumnName = $columns[$orderColumn]['data'] ?? 'id';

        // Apply ordering to the query
        $query->orderBy($orderColumnName, $orderDir);

        $totalRecords = $query->count();

        $records = $query->offset($start)->limit($length)->get();

        foreach ($records as $i => $role) {
            $records[$i]->description = $this->roles_description[$role->name] ?? '';
        }

        $data = [
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $records,
            'orderColumnName' => $orderColumnName,
        ];

        return $data;
    }

    public function usersDatatableList(Request $request)
    {
        $role_id = $request->input('id', 0);
        $draw = $request->input('draw', 0);
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $columns = $request->input('columns');
        $searchValue = $request->input('search.value');

        $orderColumn = $request->input('order.0.column', 0); // Get the order column index
        $orderDir = $request->input('order.0.dir', 'asc'); // Get the order direction (ASC or DESC)

        $query = User::whereHas('roles', function ($query) use ($role_id) {
            $query->where('id', $role_id);
        })->with('roles');

        if ($searchValue) {
            $searchColumns = ['name'];
            $query->where(function ($query) use ($searchValue, $searchColumns) {
                foreach ($searchColumns as $column) {
                    $query->orWhere(DB::raw("LOWER($column)"), 'LIKE', '%' . strtolower($searchValue) . '%');
                }
            });
        }

        // Get the column name for ordering based on the orderColumn index
        $orderColumnName = $columns[$orderColumn]['data'] ?? 'id';

        // Apply ordering to the query
        $query->orderBy($orderColumnName, $orderDir);

        $totalRecords = $query->count();

        $records = $query->offset($start)->limit($length)->get();

        $data = [
            'role_id' => $role_id,
            'draw' => $draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $records,
            'orderColumnName' => $orderColumnName,
        ];

        return $data;
    }

    public function create(Request $request)
    {
        $role = $request->all();

        $rules = [
            'name' => 'required|string',
        ];

        $validator = Validator::make($role, $rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $updated = Role::create($role);

        return response()->json(['success' => $updated]);
    }

    public function get($id, $relations = ['permissions', 'users'])
    {
        return Role::with($relations)->findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $role = $request->all();

        $rules = [
            'name' => 'required|string',
        ];

        $validator = Validator::make($role, $rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $updated = Role::findOrFail($id)->update($role);

        return response()->json(['success' => $updated]);
    }

    public function delete($id)
    {
        return Role::destroy($id);
    }

    public function deleteUser($id, $user_id = null)
    {
        $user = User::find($user_id);

        if ($user) {
            return $user->roles()->detach($id);
        }

        return false;
    }
}
