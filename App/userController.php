<?php
class userController extends Controller{

    public function getAllUser(){
        // Message Array
        $returnStatus = [];
        $returnStatus['status'] = false;

        // Database User Control

        $data = $this->db->prepare('SELECT * FROM users');
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        $returnStatus['status'] = true;
        $returnStatus['data'] = $result;

        echo json_encode($returnStatus);
    }

    public function store(){
        if ($_POST){
            // Message Array
            $returnStatus = [];
            $returnStatus['status'] = false;

            $name = Helper::controlVariable('name');
            $surname = Helper::controlVariable('surname');
            $email = Helper::controlVariable('email');
            $password = Helper::controlVariable('password');
            if ($name!='' and $surname!= '' and $email!= '' and $password!= '' ){
                // Email Checked
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $returnStatus['message'] = 'Lütfen Geçerli Bire Email Adresi Giriniz';
                    return;
                }else{

                    $data = $this->db->prepare("SELECT * FROM users WHERE email=?");
                    $data->execute(array($email));
                    $count = $data->rowCount();
                    if ($count != 0){
                        $returnStatus['message'] = 'Girilen Email Adresi Kullanımda';
                        return;
                    }
                    $password = md5($password);
                    $date = date('Y-m-d');
                    $addQuery = $this->db->prepare("INSERT INTO users(name,surname,email,password,date) VALUES (?,?,?,?,?)");
                    $result = $addQuery->execute(array($name,$surname,$email,$password,$date));

                    if ($result){
                        $returnStatus['status'] = true;
                        $returnStatus['userId'] = $this->db->lastInsertId();
                        $returnStatus['message'] = 'Kullanıcı Başarı ile Eklendi';
                    }else{
                        $returnStatus['message'] = 'Kullanıcı Eklenemedi';
                    }
                }


            }else{
                $returnStatus['message'] = 'Lütfen Tüm Alanları Doldurunuz';
            }

            echo json_encode($returnStatus);

        } else{
            die('Post İşlemi Yapılmadı');
        }
    }

    public function info($param,$id){
            // Message Array
            $returnStatus = [];
            $returnStatus['status'] = false;

            // Database User Control

            $data = $this->db->prepare('SELECT * FROM users WHERE id=?');
            $data->execute(array($id));
            $count = $data->rowCount();
            if ($count == 0){
                $returnStatus['message'] = 'Böyle Bir Kullanıcı Bulunmamaktadır';
                return;
            }

            $dataF = $this->db->prepare('SELECT * FROM users WHERE id=?');
            $dataF->execute(array($id));
            $result = $dataF->fetch(PDO::FETCH_ASSOC);
            $returnStatus['data'] = $result;
            $returnStatus['status'] = true;

            echo json_encode($returnStatus);

    }

    public function login(){
        if ($_POST){
            // Message Array
            $returnStatus = [];
            $returnStatus['status'] = false;

            $email = Helper::controlVariable('email');
            $password = Helper::controlVariable('password');

            if ($email == '' || $password == ''){
                $returnStatus['message'] = 'Lütfen Tüm Alanları Doldurunuz';
                return;
            }
                $data = $this->db->prepare('SELECT * FROM users WHERE email=?');
                $data->execute(array($email));
                $count = $data->rowCount();
                if ($count == 0){
                    $returnStatus['message'] = 'Bu Email Adresi Sistemde Kayıtlı Değildir';
                    return;
                }

                $dataPass = $this->db->prepare('SELECT * FROM users WHERE email=?');
                $dataPass->execute(array($email));
                $result = $dataPass->fetch(PDO::FETCH_ASSOC);
                if ($result['password'] != md5($password)){
                    $returnStatus['message'] = 'Şifreniz Hatalı';
                    return;
                }
                $returnStatus['status'] = true;
                $returnStatus['userId'] = $result['id'];
                $returnStatus['message'] = 'Başarılı Bir Şekilde Giriş Yaptınız';
                echo json_encode($returnStatus);

        }
    }

    public function update(){
        if ($_POST){
            // Message Array
            $returnStatus = [];
            $returnStatus['status'] = false;

            $id = Helper::controlVariable('id');
            $name = Helper::controlVariable('name');
            $surmane = Helper::controlVariable('surname');
            $email = Helper::controlVariable('email');
            $password = Helper::controlVariable('password');

            if ($name=='' || $surmane=='' || $email=='' || $password==''){
                $returnStatus['message'] = 'Lütfen Tüm Alanları Doldurunuz';
            }

            // Database User Control

                $data = $this->db->prepare('SELECT * FROM users WHERE id=?');
            $data->execute(array($id));
            $count = $data->rowCount();
            if ($count == 0){
                $returnStatus['message'] = 'Kullanıcı Bulunamadı';
                return;
            }

            // Email Control Used
            $dataEmail = $this->db->prepare('SELECT * FROM users WHERE id!=? and email=?');
            $dataEmail->execute(array($id,$email));
            $countEmail = $dataEmail->rowCount();
            if ($countEmail !=0){
                $returnStatus['message'] = 'Bu Email Adresi Kullanımda';
            }

            //Let's Check If There Is A Password
            $dataPass = $this->db->prepare('SELECT * FROM users WHERE id=?');
            $dataPass->execute(array($id));
            $result = $dataPass->fetch(PDO::FETCH_ASSOC);
            if ($password == ''){
                $password = $result['password'];
            }else{
                $password = md5($result['password']);
            }

            // UPDATE AT

            $update = $this->db->prepare('UPDATE users SET name=?,surname=?, email=?, password=? WHERE id=? ');
            $updateResult = $update->execute(array($name,$surmane,$email,$password,$id));
            if ($updateResult){
                $returnStatus['status'] = true;
                $returnStatus['message'] = 'Bilgiler Başarıyla Güncellendi';
            }
            else{
                $returnStatus['message'] = 'Bilgiler Düzenlenemedi';
            }

            echo json_encode($returnStatus);

        }
    }






}