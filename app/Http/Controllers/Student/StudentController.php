<?php

namespace App\Http\Controllers\Student;

use App\Enums\InStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Enums\Message\MessageSuccess;
use App\Enums\Message\MessageError;
use App\Enums\PermissionStatus;
use App\Libraries\Helpers;
use App\Libraries\Response;
use App\Models\Inout;
use App\Models\Reason;
use App\Models\Student;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Request $request)
    {
        $students = Student::from('pelajars as p')
            ->select('*')
            ->join('keluar_masuks as k', 'k.user_id', '=', 'p.user_id')
            ->select('*', 'k.id as keluar_masuk_id')
            ->join('kursuses as c', 'c.id', '=', 'p.kursus_id')
            ->join('tujuans as t', 't.id', '=', 'k.tujuan_id')
            ->where(function ($query) use ($request) {
                if ($request->input('tujuan_id')) $query->where('k.tujuan_id', $request->input('tujuan_id'));
                if ($request->input('status_masuk')) $query->where('k.status_masuk', $request->input('status_masuk'));
            })
            ->when(true, function ($query) {
                $query->orderBy('k.updated_at', 'desc');
            })
            ->get();

        $success = (object) MessageSuccess::RETRIEVED;
        return Response::success($success->code, $students, trans($success->message, ['attribute' => 'student list']));
    }

    public function statistic(Request $request)
    {
        // The first 8 weeks

        $currentDate8 = Carbon::now();
        $startWeek8 = $currentDate8->subWeek(8)->format('Y-m-d');
        $startWeek8String = date('M j, Y', strtotime($startWeek8));
        $endWeek8 = Carbon::now()->format('Y-m-d');
        $endtWeek8String = date('M j, Y', strtotime($endWeek8));
        $rangeDate8 = Helpers::getDatesFromRange($startWeek8, $endWeek8);
        $rangeDateSplit8 = array_chunk($rangeDate8, 8);
        $rangeDate8String = "{$startWeek8String} - {$endtWeek8String}";

        $graph8 = [];
        $graph8Info = [];

        foreach ($rangeDateSplit8 as $b) {
            $countDate8 = Student::from('pelajars as p')
                ->join('keluar_masuks as k', 'k.user_id', '=', 'p.user_id')
                ->whereBetween('k.tarikh_keluar', [$b[0], $b[count($b) - 1]])
                ->where(function ($query) use ($request) {
                    if ($request->input('tujuan_id')) $query->where('k.tujuan_id', $request->input('tujuan_id'));
                })
                ->when(true, function ($query) {
                    $query->orderBy('k.tarikh_keluar', 'desc');
                })
                ->count();
            array_push(
                $graph8,
                array(
                    'domain' => date('d/m', strtotime($b[0])),
                    'measure' => $countDate8,
                )
            );
        }

        $graph8Info = [
            'title' => $rangeDate8String,
            'description' => 'The first 8 weeks',
            'graph_data' => $graph8,
        ];

        // The first 6 months

        $currentDate6 = Carbon::now();
        $startMonth6 = $currentDate6->subMonth(6)->format('Y-m-d');
        $startMonth6String = date('M, Y', strtotime($startMonth6));
        $endMonth6 = Carbon::now()->format('Y-m-d');
        $endMonth6String = date('M, Y', strtotime($endMonth6));
        $period = \Carbon\CarbonPeriod::create($startMonth6, '1 month', $endMonth6);
        $rangeDate6String = "{$startMonth6String} - {$endMonth6String}";

        $graph6 = [];
        $graph6Info = [];

        foreach ($period as $dt) {

            $countDate6 = Student::from('pelajars as p')
                ->join('keluar_masuks as k', 'k.user_id', '=', 'p.user_id')
                ->whereMonth('k.tarikh_keluar', $dt->format('m'))
                ->whereYear('k.tarikh_keluar', $dt->format('Y'))
                ->where(function ($query) use ($request) {
                    if ($request->input('tujuan_id')) $query->where('k.tujuan_id', $request->input('tujuan_id'));
                })
                ->when(true, function ($query) {
                    $query->orderBy('k.tarikh_keluar', 'desc');
                })
                ->count();

            array_push(
                $graph6,
                array(
                    'domain' => $dt->format('M/y'),
                    'measure' => $countDate6,
                )
            );
        }

        $graph6Info = [
            'title' => $rangeDate6String,
            'description' => 'The first 6 months',
            'graph_data' => $graph6,
        ];

        // Response data

        $reason = Reason::from('tujuans as t')
            ->select('t.nama_tujuan as reason')
            ->where('t.id', $request->input('tujuan_id'))
            ->first();


        $response = [
            $reason,
            $graph8Info,
            $graph6Info
        ];

        $success = (object) MessageSuccess::RETRIEVED;
        return Response::success($success->code, $response, trans($success->message, ['attribute' => 'data']));
    }

    public function suspendList()
    {
        $students = Student::from('pelajars as p')
            ->select('*')
            ->join('kursuses as c', 'c.id', '=', 'p.kursus_id')
            ->orderByRaw('FIELD(p.gantung, 0, 1)')
            ->get();

        $reasons = Reason::from('tujuans as t')
            ->select('t.*')
            ->get();

        $reasonarr = [];
        $index = 0;

        foreach ($students as $s) {
            foreach ($reasons as $r) {
                $count = Student::from('pelajars as p')
                    ->join('keluar_masuks as k', 'k.user_id', '=', 'p.user_id')
                    ->join('tujuans as t', 't.id', '=', 'k.tujuan_id')
                    ->where([
                        'p.user_id' => $s->user_id,
                        't.id' => $r->id,
                        'k.status_masuk' => InStatus::late,
                    ])
                    ->count();

                if ($count > 0) {
                    if ($r->id == 1 || $r->id == 2) {
                        array_push(
                            $reasonarr,
                            array(
                                'index' => $index,
                                'user_id' => $s->user_id,
                                'gantung' => $s->gantung,
                                'nama_pelajar' => $s->nama_pelajar,
                                'nama_kursus' => $s->nama_kursus,
                                'no_ndp' => $s->no_ndp,
                                'reason' => $r->nama_tujuan,
                                'status_masuk' => InStatus::late,
                                'count' => $count,
                            )
                        );
                    }
                    $index++;
                }
            }
        }

        $response = [];

        foreach ($reasonarr as $rr) {
            $response[$rr['index']]['user_id'] = $rr['user_id'];
            $response[$rr['index']]['gantung'] = $rr['gantung'];
            $response[$rr['index']]['nama_pelajar'] = $rr['nama_pelajar'];
            $response[$rr['index']]['nama_kursus'] = $rr['nama_kursus'];
            $response[$rr['index']]['no_ndp'] = $rr['no_ndp'];
            $response[$rr['index']]['reasons'][] = array('reason' => $rr['reason'], 'status_masuk' => $rr['status_masuk'], 'count' => $rr['count']);
        }

        $success = (object) MessageSuccess::RETRIEVED;
        return Response::success($success->code, $response, trans($success->message, ['attribute' => 'student list']));
    }

    public function suspendUpdate(Request $request)
    {
        $student = Student::find($request->input('id'));

        if (empty($student)) {
            $error = (object) MessageError::NOT_FOUND;
            return Response::error($error->code, [], trans($error->message, ['attribute' => trans('account')]));
        }

        $student->gantung = $request->input('gantung');
        $student->save();

        $success = (object) MessageSuccess::UPDATED;
        return Response::success($success->code, $student, trans($success->message, ['attribute' => trans('account')]));
    }

    public function studentAll()
    {
        $students = Student::from('pelajars as p')
            ->select('*')
            ->orderByRaw('FIELD(p.gantung, 0, 1)')
            ->get();

        $success = (object) MessageSuccess::RETRIEVED;
        return Response::success($success->code, $students, trans($success->message, ['attribute' => 'student list']));
    }
}
