<?php

namespace App\Controllers;

use App\Models\UserModel;

class SiteController extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function simple()
    {
        return view("sites/simple");
    }

    public function aboutUs()
    {
        
        return view("sites/about-us");
    }

    public function contactUs()
    {
        $data=[
            'name'=>'Brang Seng',
            'email'=>'novderesee@esc.com',
            'address'=>'Insein, Yangon'
        ];
        return view("sites/contact-us",compact('data'));
    }

    public function callMe($value1,$value2)
    {
        return "call me page ".$value1.$value2;
    }

    public function queryParam()
    {   print_r($this->request->getVar());
        return "<h3>Query Param</h3>";
        
    }

    public function rawQuery()
    {
        $query = "insert into users(name,email,phone) values('John','john32@gmail.com','09774480432')";
        
        if($this->db->query($query))
        {
            echo "Inserted successfully";
        }else{echo "failed!";}
    }

    public function insertData()
    {
        $builder=$this->db->table('users');
        $data=[
            [
            'name'=>'Acer',
            'email'=>'acer@yandex.com',
            'phone'=>'09445344532'
        ],
        [
            'name'=>'Lennon',
            'email'=>'systlene@yandex.com',
            'phone'=>'09432454532'
        ],
        [
            'name'=>'Dj Dance',
            'email'=>'ducedj@yandex.com',
            'phone'=>'09445454722'
        ]
        ];
        print_r($builder->insertBatch($data));
    }

    public function getData()
    {
        $data=$this->db->table("users")->where(["id"=>2,'name'=>'john'])->get()->getResultArray();
        echo $this->db->getLastQuery();
        echo "<pre>";
        print_r($data);
    }

    public function delete()
    {
        $builder=$this->db->table('users');

        print_r($builder->delete(['id'=>5]));
        echo $this->db->getLastQuery();
    }
    
    public function userModel()
    {
        $user= new userModel();

        $data = $user->findAll();

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public function myForm()
    {
        return view('sites/my-form');
    }

    public function userDef(){
        echo userdefined();
    }

    public function myFile()
    {   


        if($this->request->getMethod()=='post')
        {   $session = session();

            $file = $this->request->getFile('file');
            $name = $file->getName();
            $file_type = $file->getClientMimeType();
            $valid_type = ['image/jpeg','image/png','image/jpg'];

            if(in_array($file_type,$valid_type)){
                if($file->move('file',$name)){
                   $session->setFlashdata('session', 'successfully uploaded!'); 
                }else{
                   $session->setFlashdata('session', 'failed uploaded!');
                }
            }else{
                $session->setFlashdata('session', 'Invalid file type!');                
            }

            session_write_close();
            return redirect()->to(site_url('myfile'));
        }
       
        return view('fileupload');
    }

    public function myFormData()
    {
        if($this->request->getMethod()=='post')
        {
            

            $rules=[
                'name'=>'required|alpha_numeric_punct',
                'email'=>'required|valid_email', 
                'phone'=>'required|decimal'
            ];

             if (! $this->validate($rules)) {
            return view('myformdata', [
                'validation' => $this->validator,
            ]);
         }
        }
        return view('myformdata');
    }
}

