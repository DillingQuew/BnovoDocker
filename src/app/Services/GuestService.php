<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class GuestService {
    public function handleCountry(array $data) {
        if (empty($data['country'])) {
            $countries = Storage::json('countries.json');
            $code = explode(' ', $data['phone'])[0];
            $data['country'] = $countries[$code];

        }
        return $data;
    }
}
