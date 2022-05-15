<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FeedbackFile extends Model
{
    use HasFactory;

    public static function create($data)
    {

        $writeToFile = json_encode($data);

        $path = $data['username'] . $data['countryId'] . $data['phone'];
        try {
            if (Storage::disk('local')->exists($path)) {
                $entity = Storage::disk('local')->get($path);
                $entity = json_decode($entity, true);

                $messages = FeedbackFile::addMessage($entity['message'], $data['message']);
                $entity['message'] = $messages;

                $writeToFile = json_encode($entity);
            }

            Storage::disk('local')->put($path, $writeToFile);
        } catch (FileNotFoundException $e) {
            $status = ['writetofile' => false,
                'error' => $e->getMessage()];

            return json_encode($status);
        }

        return $writeToFile;
    }

    private static function addMessage($oldMessage, string $newMessage): array
    {
        $messages = [];

        if (is_string($oldMessage)) {
            array_push($messages, $oldMessage);
            array_push($messages, $newMessage);
        }

        if (is_array($oldMessage)) {
            array_push($oldMessage, $newMessage);

            $messages = $oldMessage;
        }

        return $messages;
    }
}
