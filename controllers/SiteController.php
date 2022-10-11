<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;

class SiteController extends Controller
{
    /*
     * contact action yaratildi.
     * oddiy method call_user_fun uchun ishlamadi. Shuni uchun static methoddan foydalanildi.
     * */
    public function home()
    {
        $params = [
            'name' =>'Asadbek'
        ];
        return $this->render('home',$params);
    }
    public function contact(Request $request,Response $response)
    {
        $contact = new ContactForm();
        if($request->isPost())
        {
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()){
                Application::$app->session->setFlash('contact','Thanks for contacting us.');
                $response->redirect('/');
            }
            return $this->render('contact',[
                'model'=>$contact
            ]);
        }
        return $this->render('contact',[
            'model'=>$contact
        ]);
    }

}