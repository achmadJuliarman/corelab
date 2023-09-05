<?php

namespace App\Validation;

use App\Models\PegawaiModel;

class UserRules

{
    public function validateUser(string $str, string $fields, array $data)
    {
        $model = new PegawaiModel();
        $user = $model->where('NAMA', $data['NAMA'])
            ->first();

        if (!$user)
            return false;

        return password_verify($data['PASSWORD'], $user['PASSWORD']);
    }
}
