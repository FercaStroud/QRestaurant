<?php

namespace App\Http\Controllers;

use App\Payment;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use http\Exception;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function getServiceStatus(Request $request)
    {
        $user = $request->user();

        try {
            $contractDateBegin = (Payment::select('created_at')->latest()->where(
                'user_id', '=', $request->user()->id
            )->first())->created_at;
        } catch (Exception $e) {

        }


        return $contractDateBegin;
        //$today = Carbon::now();

        /*        $today = new \DateTime('05/01/2021');

        $contractDateBegin = new \DateTime('01/01/2021');
        $contractDateEnd   = new \DateTime('03/01/2021');


        $status = self::dateIsInBetween(
            $contractDateBegin, $contractDateEnd, $today
        );

        return response()->json(array(
            ['status' => $status],
            ['$today' => $today],
            ['$contractDateBegin' => $contractDateBegin],
            ['$contractDateEnd' => $contractDateEnd],
        ), 201);

*/
    }

    function dateIsInBetween(DateTime $from, DateTime $to, DateTime $subject): bool
    {
        return $subject->getTimestamp() >= $from->getTimestamp() && $subject->getTimestamp() <= $to->getTimestamp();
    }

    function add_months($months, DateTime $dateObject)
    {
        $next = new DateTime($dateObject->format('Y-m-d'));
        $next->modify('last day of +'.$months.' month');

        if($dateObject->format('d') > $next->format('d')) {
            return $dateObject->diff($next);
        } else {
            return new DateInterval('P'.$months.'M');
        }
    }


}
