<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendantRequest;
use App\Http\Resources\AttendantResource;
use App\Models\Attendant;
use Illuminate\Http\Request;

class AttendantController extends Controller
{
    public function create(AttendantRequest $request)
    {
        $attendant = Attendant::create([
            'name' => $request->get('name'),
            'mobile' => $request->get('mobile'),
            'team' => $request->get('team'),
            'runs' => $request->get('runs'),
            'time' => $request->get('time'),
            'tc_accepted' => $request->get('tc_accepted'),
        ]);

        return response(['id' => $attendant->uuid, 'status' => 'success']);
    }

    public function index(Request $request)
    {
        $sort_order = strtolower($request->get('sort'));
        $sort_order = in_array($sort_order, ['desc', 'asc']) ? $sort_order : 'asc';

        $field = strtolower($request->get('field'));
        $field = in_array($field, ['id', 'name', 'team', 'runs', 'time']) ? $field : 'time';

        $q = $request->get('q');

        $query = Attendant::orderBy($field, $sort_order);

        if(!empty($q)) {
            $query->where('name', 'LIKE', '%' . $q . '%')
                ->orWhere('team', 'LIKE', '%' . $q . '%');
        }

        $attendants = $query->get();

        return AttendantResource::collection($attendants);

    }
}
