<?php

namespace App\Services;

class ToastService
{
    public function create($message, $type = 'info')
    {
        session()->flash('toast', [
            'message' => $message,
            'type' => $type,
        ]);
    }
}
