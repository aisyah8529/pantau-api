<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Resources\Student\StudentCollection;
use Illuminate\Http\Request;

use App\Enums\Message\MessageSuccess;
use App\Libraries\Response;
use App\Models\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $students = new StudentCollection(
            Student::from('pelajars as p')
                ->select('p.*')
                ->join('keluar_masuks as k', 'k.user_id', '=', 'p.user_id')
                ->where(function ($query) use ($request) {
                    if ($request->input('tujuan_id')) $query->where('k.tujuan_id', $request->input('tujuan_id'));
                    if ($request->input('status_masuk')) $query->where('k.status_masuk', $request->input('status_masuk'));
                })
                ->when(true, function ($query) {
                    $query->orderBy('k.created_at', 'desc');
                })
                ->get()
        );
        
        $success = (object) MessageSuccess::RETRIEVED;
        return Response::success($success->code, $students, trans($success->message, ['attribute' => 'student list']));
    }
}
