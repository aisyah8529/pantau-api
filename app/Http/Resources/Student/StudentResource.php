<?php

namespace App\Http\Resources\Student;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'student';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request = null)
    {
        return [
            'userId' => $this->user_id,
            'name' => $this->nama_pelajar,
            'ndpNo' => $this->no_ndp,
            'gender' => $this->gender(),
            'phone' => $this->no_tel,
            'out_date' => $this->inouts,
        ];
    }

    /**
     * Custom wrapper function to wrap the array.
     *
     * @return array
     */
    public function withWrap()
    {
        return [
            self::$wrap => $this->toArray()
        ];
    }
}
