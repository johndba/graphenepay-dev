<?php

/**
 * Created by PhpStorm.
 * User: steve
 * Date: 22/10/2016
 * Time: 11:09
 */
class GrapheneDonation
{
    public  $payid, $to, $amount, $currency, $callback, $success, $message;

    function __construct($data)
    {
        if(array_has($data, "payid")) {$this->payid = $data['payid'];} else {$this->payid = GrapheneHelper::generatePaymentID();};

        if(array_has($data, "callback")) {$this->callback = $data['callback'];} else {$this->callback = "https://www.steemit.com/@steve-walschot";};

        if (array_has($data, "receiver")) {

            $this->amount = 0;
            $this->currency = 0;
            $this->to = $data['receiver'];


            if ($this->amount != "0") {
                // Fixed payment handler
            }

            $this->success = true;
            $this->message = "";
            // Create the data array

            $data = array(
                'success' => true,
                'msg' => $this->message,
                'paymentID' => $this->payid,
                'receiver' => $this->to,
                'amount' => $this->amount,
                'currency' => $this->currency,
                'callback' => $this->callback,
            );
        } else
        {
            $this->success =false;
            $this->message = "Input is missing required parameter 'receiver'.";
            $data = array(
                'success' => false,
                'msg' => $this->message,
                'paymentID' => $this->payid,
                'receiver' => $this->to,
                'amount' => $this->amount,
                'currency' => $this->currency,
                'callback' => $this->callback,
            );
        }
    }


}