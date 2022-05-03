<?php

namespace App;

class App
{
    private Transport $transport;

    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    public function index(string $message, string $chatId): void
    {
        error_log(json_encode($message));

        $this->transport->sendAnswer('sendMessage', [
            'chat_id' => $chatId,
            'text' => 'Вот мой ответ! 😁'
        ]);

        $this->transport->sendAnswer('sendMessage', [
            'chat_id' => $chatId,
            'text' => 'Вот мой ответ!' . hex2bin('F09F9882')
        ]);
    }
}
