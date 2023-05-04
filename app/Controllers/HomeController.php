<?php 



class HomeController extends Controller
{
    public function index()
    {
        $data = ["name"=>"mohamed abdallah"];
        $this->view('home',$data);
    }
}