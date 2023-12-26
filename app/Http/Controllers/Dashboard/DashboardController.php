<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Enums\Message\MessageSuccess;
use App\Libraries\Response;
use App\Models\Student;
use App\Enums\Gender;
use App\Enums\InStatus;
use App\Models\Inout;
use App\Models\Reason;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $all_student_count = 0;
        $all_student_male_count = 0;
        $all_student_female_count = 0;
        $student_in_count = 0;
        $student_out_count = 0;
        $student_in_male_count = 0;
        $student_out_male_count = 0;
        $student_in_female_count = 0;
        $student_out_female_count = 0;

        $all_student_count = Student::all()->count();
        $all_student_male_count = Student::where('jantina', Gender::male)->count();
        $all_student_female_count = Student::where('jantina', Gender::female)->count();
        $student_out_count = Student::from('pelajars as p')
            ->select('p.*')
            ->join('keluar_masuks as k', 'k.user_id', '=', 'p.user_id')
            ->where(function ($query) {
                $query->where('k.status_masuk', InStatus::out);
            })
            ->count();
        $student_in_count = $all_student_count - $student_out_count;
        $student_out_male_count = Student::from('pelajars as p')
            ->select('p.*')
            ->join('keluar_masuks as k', 'k.user_id', '=', 'p.user_id')
            ->where(function ($query) {
                $query->where('p.jantina', Gender::male);
                $query->where('k.status_masuk', InStatus::out);
            })
            ->count();
        $student_in_male_count = $all_student_male_count - $student_out_male_count;
        $student_out_female_count = Student::from('pelajars as p')
            ->select('p.*')
            ->join('keluar_masuks as k', 'k.user_id', '=', 'p.user_id')
            ->where(function ($query) {
                $query->where('p.jantina', Gender::female);
                $query->where('k.status_masuk', InStatus::out);
            })
            ->count();
        $student_in_female_count = $all_student_female_count - $student_out_female_count;

        $reasons = [];
        $r1 = 0;
        $r2 = 0;
        $r3 = 0;

        $r1 = Student::from('pelajars as p')
            ->select('p.*')
            ->join('keluar_masuks as k', 'k.user_id', '=', 'p.user_id')
            ->where(function ($query) {
                $query->where('k.tujuan_id', 1);
                $query->where('k.status_masuk', InStatus::out);
            })
            ->count();
        $r2 = Student::from('pelajars as p')
            ->select('p.*')
            ->join('keluar_masuks as k', 'k.user_id', '=', 'p.user_id')
            ->where(function ($query) {
                $query->where('k.tujuan_id', 2);
                $query->where('k.status_masuk', InStatus::out);
            })
            ->count();
        $r3 = Student::from('pelajars as p')
            ->select('p.*')
            ->join('keluar_masuks as k', 'k.user_id', '=', 'p.user_id')
            ->where(function ($query) {
                $query->where('k.tujuan_id', 3);
                $query->where('k.status_masuk', InStatus::out);
            })
            ->count();

        foreach (Reason::all() as $reason) {
            array_push(
                $reasons,
                [
                    'id' => $reason->id,
                    'reason' => $reason->nama_tujuan,
                    'count' => $reason->id == 1 ? $r1 : ($reason->id == 2 ? $r2 : $r3),
                ],
            );
        }

        $response = [
            'student_count' => [
                'all' => $all_student_count,
                'male' => $all_student_male_count,
                'female' => $all_student_female_count,
                'all_in' => $student_in_count,
                'all_out' => $student_out_count,
                'male_in' => $student_in_male_count,
                'male_out' => $student_out_male_count,
                'female_in' => $student_in_female_count,
                'female_out' => $student_out_female_count
            ],
            'reasons' => $reasons,
        ];

        $success = (object) MessageSuccess::RETRIEVED;
        return Response::success($success->code, $response, trans($success->message, ['attribute' => 'data']));
    }
}
