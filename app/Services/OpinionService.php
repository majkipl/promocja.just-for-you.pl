<?php

namespace App\Services;

use App\Mail\OpinionMail;
use App\Models\Opinion;
use App\Services\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OpinionService
{

    /**
     * @param array $data
     * @param array $request
     * @return Opinion
     */
    public function store(array $data, array $request): Opinion
    {
        DB::beginTransaction();

        try {
            $opinion = new Opinion($data);

            $opinion->free_id = $request['free'];

            $opinion->legal_1 = array_key_exists('legal_1', $request);
            $opinion->legal_2 = array_key_exists('legal_2', $request);
            $opinion->legal_3 = array_key_exists('legal_3', $request);
            $opinion->legal_4 = array_key_exists('legal_4', $request);

            $opinion->application_id = $request['just_for_you_id'];

            $opinion->save();

            DB::commit();

            return $opinion;
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception('Nie można zapisać zgłoszenia');
        }
    }

    /**
     * @param string $email
     * @param int $id
     * @return void
     */
    public function sendMail(string $email): void
    {
        Mail::to($email)->send(new OpinionMail());
    }
}
