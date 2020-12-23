<?php

class HelperAPI
{
    public function sendResponse($statusCode, $response)
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo $response;
        exit();
    }
    public function validateIssetAndLength($fieldName, $min, $max)
    {

        if (!isset($_POST[$fieldName])) {
            $this->sendResponse(400, '{
        "message": "'.$fieldName. ' must not be empty"
    }');
        }
        if (strlen($_POST[$fieldName]) < $min) {
            $this->sendResponse(400, '{
        "message": "'.$fieldName. ' must not be at least ' . $min . ' characters"
    }');
        }
        if (strlen($_POST[$fieldName]) > $max) {
            $this->sendResponse(400, '{
        "message": "'.$fieldName. ' cannot be longer then ' . $max . ' characters"
    }');
        }
    }
    public function validateIssetAndSize($fieldName, $min, $max){

        if (!isset($_POST[$fieldName])) {
            $this->sendResponse(400, '{
        "message": "' .$fieldName. '  must not be empty"
    }');
        }
        if ($_POST[$fieldName] < $min) {
            $this->sendResponse(400, '{
        "message": "'.$fieldName. ' must not be at least ' . $min . ' characters"
    }');
        }
        if ($_POST[$fieldName] > $max) {
            $this->sendResponse(400, '{
        "message": "'.$fieldName. ' cannot be longer then ' . $max . ' characters"
    }');
        }
    }
    public function validateIssetAndEmail($fieldName)
    {

        if (!isset($_POST[$fieldName])) {
            $this->sendResponse(400, '{
        "message": "' . $fieldName . '  must not be empty"
    }');
        }
        if (!filter_var($_POST[$fieldName], FILTER_VALIDATE_EMAIL)) {
            $this->sendResponse(400, '{
                "message": "' . $fieldName . '  is not a valid email"
            }');
        }
    }
}
