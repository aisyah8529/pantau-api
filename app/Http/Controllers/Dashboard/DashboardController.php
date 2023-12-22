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
        $student_in_count = 0;
        $student_out_count = 0;
        $student_in_male_count = 0;
        $student_out_male_count = 0;
        $student_in_female_count = 0;
        $student_out_female_count = 0;

        foreach (Student::all() as $student) {
            $inout = Inout::where('user_id', $student->user_id)->latest()->first();
            if (!empty($inout)) {
                if ($inout->status_masuk == InStatus::in || $inout->status_masuk == null || $inout->status_masuk == InStatus::home) {
                    $student_in_count++;
                } else if ($inout->status_masuk == InStatus::out) {
                    $student_out_count++;
                }
            } else {
                $student_in_count++;
            }
        }

        foreach (Student::where('jantina', Gender::male)->get() as $student) {
            $inout = Inout::where('user_id', $student->user_id)->latest()->first();
            if (!empty($inout)) {
                if ($inout->status_masuk == InStatus::in || $inout->status_masuk == null || $inout->status_masuk == InStatus::home) {
                    $student_in_male_count++;
                } else if ($inout->status_masuk == InStatus::out) {
                    $student_out_male_count++;
                }
            } else {
                $student_in_male_count++;
            }
        }

        foreach (Student::where('jantina', Gender::female)->get() as $student) {
            $inout = Inout::where('user_id', $student->user_id)->latest()->first();
            if (!empty($inout)) {
                if ($inout->status_masuk == InStatus::in || $inout->status_masuk == null || $inout->status_masuk == InStatus::home) {
                    $student_in_female_count++;
                } else if ($inout->status_masuk == InStatus::out) {
                    $student_out_female_count++;
                }
            } else {
                $student_in_female_count++;
            }
        }

        $reasons = [];
        $r1 = 0;
        $r2 = 0;
        $r3 = 0;

        foreach (Reason::all() as $reason) {
            foreach (Student::all() as $student) {
                $inout = Inout::where('user_id', $student->user_id)->where('status_masuk', InStatus::out)->latest()->first();
                if (!empty($inout)) {
                    if ($inout->tujuan_id == 1) {
                        $r1++;
                    } else if ($inout->tujuan_id == 2) {
                        $r2++;
                    } else if ($inout->tujuan_id == 3) {
                        $r3++;
                    }
                }
            }
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
                'all' => Student::all()->count(),
                'male' => Student::where('jantina', Gender::male)->count(),
                'female' => Student::where('jantina', Gender::female)->count(),
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
