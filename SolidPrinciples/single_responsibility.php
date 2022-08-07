<?php

// Single Responsibility states that a class should have 
// one and only one responsibility pertaining to business
// logic

class Json {
    public static function from($data)
    {
        return json_encode(['name' => $data->name, "email" => $data->email]);
    }
}

class UserRequest {
    protected static $rules = [
        'name' => 'string',
        'email' => 'string'
    ];

    public static function validate($data)
    {
        foreach ($data as $property => $type) {
            $data_type = self::$rules[$property];
            if (gettype($type) !== $data_type) {
                throw new Exception(message: "Property ${property} is not of type ${data_type}");
            }
        }
    }

}

class User {

    public function __construct(public string $name, public string $email) {}
}


$data = ['name' => "Patrick", 'email' => 'eloquentintech@gnail.com'];

UserRequest::validate($data);

$user = new User($data["name"], $data["email"]);

echo Json::from($user);

