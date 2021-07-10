<?php

namespace App\Http\Controllers;

use App\Http\Requests\TranslateRequest;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;


class TranslateController extends Controller
{
    public function show() {
        return view('welcome');
    }

    public function translate(TranslateRequest $request) {
        $data = $request->validated();
        $tr = new GoogleTranslate(); 
        $tr->setTarget($data['to']);
        $translatedText = $tr->translate($data['text']);
        $currentLang = $tr->getLastDetectedSource();
        $response = [
            'current_lang' => $currentLang,
            'translated_text' => $translatedText,
        ];
        return $response;
    }
}
