<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AssetModel;
use App\Models\Message;
use App\Models\UsersModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $AsetModel = new AssetModel();
        $data['count_assets'] = $AsetModel->countAllResults();
        $data['sum_assets'] = $AsetModel->selectSum('purchase_price')->first();
        $UserModel = new UsersModel();
        $data['count_users'] = $UserModel->countAllResults();
        // ทำกราฟเส้น
        $db = \Config\Database::connect();
        $builder = $db->table('assets');
        $query = $builder->select("COUNT(asset_id) as count, purchase_price as s, YEAR(purchase_date) as year");
        $query = $builder->where("YEAR(purchase_date) GROUP BY YEAR(purchase_date)")->get();
        $record = $query->getResult();
        $products = [];
        foreach ($record as $row) {
            $products[] = array(
                'year'   => $row->year + 543,
                'sell' => floatval($row->s)
            );
        }
        $data['asset'] =  $AsetModel
        ->findAll();

        $data['products'] = ($products);
        // print_r($data['products']);
        // die;
        $Message = new Message();
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();
        // print_r(($data)['notification']);
        // die;
        $User = new UsersModel();
        $session = session();
      
        $data['user'] = $User->where('id', $session->get('id'))->first();
        // print_r($data['user']);
        // die;


        return view('backoffice/users/dashboard_user', $data);
    }

    public function initChart()
    {

        $db = \Config\Database::connect();
        $builder = $db->table('assets');
        $query = $builder->select("COUNT(asset_id) as count, purchase_price as s, YEARNAME(purchase_date) as year");
        $query = $builder->where("YEAR(purchase_date) GROUP BY YEARNAME(purchase_date), s")->get();
        $record = $query->getResult();
        $products = [];
        foreach ($record as $row) {
            $products[] = array(
                'day'   => $row->day,
                'sell' => floatval($row->s)
            );
        }

        $data['products'] = ($products);
        // print_r($data['products']);
        // die;
        return view('backoffice/users/dashboard_user', $data);
    }
}
