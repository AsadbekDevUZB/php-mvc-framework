<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';


    public function rules(): array
    {
        return [
            'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED,[self::RULE_MIN,'min'=>8],[self::RULE_MAX,'max'=>20]]
        ];
    }

    public function login()
    {
        $user = User::findOne(['email'=>$this->email]);

        if(!$user){
            $this->addError('email','User does not exist');
            return false;
        }
        if(!password_verify($this->password,$user->password)){
            $this->addError('password','Password is incorrect');
            return false;
        }
        return Application::$app->login($user) ?? false;
    }

    public function labels(): array
    {
        return [
            'email'=>'Email',
            'password'=>'Password'
        ];
    }
}