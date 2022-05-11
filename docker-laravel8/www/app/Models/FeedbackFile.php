<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FeedbackFile extends Model
{
    use HasFactory;

    public static function create($data) {

        $writeToFile = json_encode($data);

        $path = $data['username'].$data['countryId'].$data['phone'];
        try {
            if (Storage::disk('local')->exists($path)) {
                $entity =  Storage::disk('local')->get($path);
                $entity = json_decode($entity, true);

                $messageNew = FeedbackFile::addMessage($entity['message'], $data['message']);
                $entity['message'] = $messageNew;

                $writeToFile =json_encode($entity);
            }

            Storage::disk('local')->put($path, $writeToFile);
        }
        catch (FileNotFoundException $e) {
            $status = ['writetofile' => false,
                       'error' => $e->getMessage()];

            return json_encode($status);
        }

        return $writeToFile;
    }

    private static function addMessage($message, $data_to_add):array {
        $messageArr = [];

        if (is_string($message)) {
            array_push($messageArr, $message);
            array_push($messageArr, $data_to_add);
        }

        if (is_array($message)) {
            array_push($message, $data_to_add);

            $messageArr = $message;
        }

        return $messageArr;
    }
}
