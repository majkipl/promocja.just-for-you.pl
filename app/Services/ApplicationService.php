<?php

namespace App\Services;

use App\Mail\ApplicationMail;
use App\Models\Application;
use App\Services\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApplicationService
{

    public function store(array $data, $imgReceipt, $imgEan, array $request): Application
    {
        DB::beginTransaction();

        try {
            $application = new Application($data);

            if( $imgReceipt ) {
                $application->img_receipt = $imgReceipt->store('receipts');
            }
            if( $imgEan ) {
                $application->img_ean = $imgEan->store('eans');
            }

            $application->voivodeship_id = $request['voivodeship'];
            $application->product_id = $request['product'];
            $application->shop_id = $request['shop'];
            $application->free_id = $request['free'];
            $application->where_id = $request['where'];

            $application->legal_1 = array_key_exists('legal_1', $request);
            $application->legal_2 = array_key_exists('legal_2', $request);
            $application->legal_3 = array_key_exists('legal_3', $request);
            $application->legal_4 = array_key_exists('legal_4', $request);

            $date = date_create_from_format('d-m-Y', $request['buy_at']);
            $formattedDate = date_format($date, 'Y-m-d');
            $application->buy_at = $formattedDate;

            $application->save();

            DB::commit();

            return $application;
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
    public function sendMail(string $email, int $id): void
    {
        Mail::to($email)->send(new ApplicationMail(['id' => $id]));
    }
}
