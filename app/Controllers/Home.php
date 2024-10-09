<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
        
    }
    public function qr_code()
    {
        return view("qr");
    }
    public function feedback()
    {
        return view("feedback");
    }
    public function submit()
    {
        $model = new \App\Models\FeedbackModel();
        $feedback = $this->request->getPost('feedback');
        
        if ($model->save(['feedback' => $feedback])) {
            return redirect()->to('/thank_you');  // Redirect to a thank-you page or back to menu
        } else {
            return redirect()->back()->with('error', 'Feedback not submitted. Please try again.');
        }
    }
    public function thankYou()
    {
        return view('thank_you');
    }
    
}
