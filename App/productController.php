<?php
class productController  extends  Controller {
    public function getAllProduct(){
        // Message Array
        $returnStatus = [];
        $returnStatus['status'] = false;
        // All Product İnfo
        $data = $this->db->prepare('SELECT * FROM products');
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);

        $returnStatus['status'] = true;
        $returnStatus['data'] = $result;
        echo json_encode($returnStatus);
    }

    public function productAdd(){
        if ($_POST){
            // Message Array
            $returnStatus = [];
            $returnStatus['status'] = false;

            $productName = Helper::controlVariable('product_name');
            $productDescription = Helper::controlVariable('product_description');
            $productPrice = Helper::controlVariable('product_price');
            $productDiscount = Helper::controlVariable('product_discount');
            $salesStatus = Helper::controlVariable('sales_status');
            $date = date('Y-m-d');

            if ($productName!='' && $productDescription!='' && $productPrice!=''){

                    $insert = $this->db->prepare('INSERT INTO products(product_name,product_description,product_price,product_discount,sales_status,date) VALUES (?,?,?,?,?,?)');
                    $insertResult = $insert->execute(array($productName,$productDescription,$productPrice,$productDiscount,$salesStatus,$date));

                if ($insertResult){
                    $returnStatus['status'] = true;
                    $returnStatus['message'] = 'Ürün Başarı ile Eklendi';
                }else{
                    $returnStatus['message'] = 'Ürün Eklenemedi';
                }


            }else{
                $returnStatus['message'] = 'Lütfen Tüm Alanları Doldurunuz';
            }

            echo json_encode($returnStatus);

        }
    }

    public function productSingle($param,$id){
        // Message Array
        $returnStatus = [];
        $returnStatus['status'] = false;
        //Single Product Get
            $dataProductSingle = $this->db->prepare('SELECT * FROM products WHERE id=?');
            $dataProductSingle->execute(array($id));
            $count = $dataProductSingle->rowCount();
        if ($count == 0){
            $returnStatus['message'] = 'Böyle Bir Ürün Kaydı Bulunmamaktadır';
            return;
        }
        $result = $dataProductSingle->fetch(PDO::FETCH_ASSOC);
        $returnStatus['status'] = true;
        $returnStatus['data'] = $result;
        echo json_encode($returnStatus);
    }

    public function productUpdate(){

        if ($_POST) {
            // Message Array
            $returnStatus = [];
            $returnStatus['status'] = false;

            $id = Helper::controlVariable('id');
            $productName = Helper::controlVariable('product_name');
            $productDescription = Helper::controlVariable('product_description');
            $productPrice = Helper::controlVariable('product_price');
            $productDiscount = Helper::controlVariable('product_discount');
            $salesStatus = Helper::controlVariable('sales_status');
            $date = date('Y-m-d');

            if ($productName!='' && $productDescription!='' && $productPrice!=''){
                $returnStatus['message'] = 'Lütfen Tüm Alanları Doldurunuz';
            }

            // Database User Control

            $data = $this->db->prepare('SELECT * FROM products WHERE id=?');
            $data->execute(array($id));
            $count = $data->rowCount();
            if ($count == 0) {
                $returnStatus['message'] = 'Ürün Bulunamadı';
                return;
            }

            // UPDATE AT

            $update = $this->db->prepare('UPDATE products SET product_name=?,product_description=?, product_price=?, product_discount=?, sales_status=? WHERE id=? ');
            $updateResult = $update->execute(array($productName,$productDescription,$productPrice,$productDiscount,$salesStatus,$id));
            if ($updateResult) {
                $returnStatus['status'] = true;
                $returnStatus['message'] = 'Ürün Bilgileri Başarıyla Güncellendi';
            } else {
                $returnStatus['message'] = 'Ürün Bilgileri Düzenlenemedi';
            }
            echo json_encode($returnStatus);

        }

    }













}