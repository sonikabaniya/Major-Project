<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KhaltiController extends Controller
{
    private $private_key = 'test_secret_key_e93b7d5c980e4cb5a1eed6b3d4ba5068';

    public function index(Request $request)
    {
        $token = $request->get('token');
        $amount = $request->get('amount');

        if($token && $amount){
            $response = $this->fakePayment($token, $amount);
            $idx = $response['response']['state']['name'];
            if($response['statusCode'] == 200){
                return 'bhayo';
            }
            // if response bhayo bhane
            //redirect to success page
            // or show success message

            // also check for request $amount and response $amount
        }

        return view('khaltitest');
    }

    public function fakePayment($token, $amount){
        $response = [
            "idx" => "XHBWFoBNyEpr62VDBen5RH",
            "type" => [
                "idx" => "2jwzDS9wkxbkDFquJqfAEC",
                "name" => "Wallet payment"
            ],
            "state" => [
                "idx" => "DhvMj9hdRufLqkP8ZY4d8g",
                "name" => "Completed",
                "template" => "is complete",
            ],
            "amount" => 1000,
            "fee_amount" => 30,
            "refunded" => false,
            "created_on" => "2019-08-05T18:59:20.066500+05:45",
            "user" => [
                "idx" => "eDJvDezqVz9FAz7Hu6ZkgC",
                "name" => "Sonika Baniya",
                "mobile" => "9840259168",
            ],
            "merchant" => [
                "idx" => "apYqwUMw8LFowjo3yvv67X",
                "name" => "4 Walls Innovations",
                "mobile" => "info@4wallsinn.com",
            ]
            ];

            return [
                'statusCode' => 200,
                'response' => $response
            ];
    }

    public function verifyPayment( $token, $amount ) {
        $url = "https://khalti.com/api/payment/verify/";
        # Make the call using API.
        $args = http_build_query(array(
            'token' => $token,
            'amount'  => $amount
           ));
        // $response    = wp_remote_request( $url, $headers );
        // $status_code = wp_remote_retrieve_response_code( $response );
        $url = "https://khalti.com/api/payment/verify/";
        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $headers = ['Authorization: Key '.$this->private_key];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $response = json_decode($response, true);

        return [
            'statusCode' => $status_code,
            'response'   => $response
        ];
        // Response
        // $response = json_decode( $response['body'] );
        // $idx      = @$response->idx;
        // $data     = array(
        //     "idx"         => $idx,
        //     "status_code" => $status_code,
        //     "response"    => $response
        // );
        // dd($data['idx']);
        // return $data;
    }
}
