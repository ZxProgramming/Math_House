<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class SamplePermissionApi
{
    public function datatableList(Request $request)
    {
        $draw = $request->input('draw', 0);
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $columns = $request->input('columns');
        $searchValue = $request->input('search.value');

        $orderColumn = $request->input('order.0.column', 0); // Get the order column index
        $orderDir = $request->input('order.0.dir', 'asc'); // Get the order direction (ASC or DESC)

        $query = Permission::query()->with('roles');

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
        $permission = $request->all();

        $rules = [
            'name' => 'required|string',
        ];

        $validator = Validator::make($permission, $rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $updated = Permission::create($permission);

        return response()->json(['success' => $updated]);
    }

    public function get($id)
    {
        return Permission::findOrFail($id);
    }

    public function update($id, Request $request)
    {
        $permission = $request->all();

        $rules = [
            'name' => 'required|string',
        ];

        $validator = Validator::make($permission, $rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $updated = Permission::findOrFail($id)->update($permission);

        return response()->json(['success' => $updated]);
    }

    public function delete($id)
    {
        return Permission::destroy($id);
    }
}
