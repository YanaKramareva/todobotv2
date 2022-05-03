<?php

namespace App;

class Transport
{
    private string $botUrl = 'https://api.telegram.org/bot5393296749:AAFNrpq4TTDH9tFmuKVX0FnWvarnKlb7qh0/';
    private string $serviceUrl = 'https://cahteltodov1.herokuapp.com/';

    public function sendAnswer($method, $data, $headers = [])
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->botUrl . $method,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array_merge(['Content-Type: application/json'], $headers)
        ]);
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result, 1) ?? $result;
    }

    public function getTodoList()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST => 0,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->serviceUrl . 'getTodayList',
        ]);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result, 1) ?? $result;
    }
}
