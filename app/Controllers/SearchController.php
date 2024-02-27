<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\AssetModel;
use App\Models\DepartmentModel;
use App\Models\Message;
use App\Models\UsersModel;


class SearchController extends BaseController
{
    public function index()
    {
        helper(['form']);
        $deparment = new DepartmentModel();
        $data = $deparment->findAll();
        // ส่งข้อมูลไปยังหน้าแสดง    
        // print_r($data);
        // die;
        $Message = new Message();
        $data1 = $Message->where('role', 0)->findAll();
        $data2 = $Message->where('role', 1)->findAll();
        $User = new UsersModel();
        $session = session();

        $data3 = $User->where('id', $session->get('id'))->first();
        return view('search_form', ['department' => $data, 'messages' =>  $data1, 'alart' =>  $data2, 'user' =>  $data3]);
    }

    public function search()
    {
        helper(['form']);
        // ตรวจสอบข้อมูลที่ส่งมาจากฟอร์มค้นหา
        $searchid = $this->request->getPost('search_id');
        $searchname = $this->request->getPost('search_name');
        $searchdepartment = $this->request->getPost('search_department');
        $searchyear = $this->request->getPost('search_year');
        $searchmonth = $this->request->getPost('search_month');
        $searchday = $this->request->getPost('search_day');

        // print_r($searchmonth);
        // die;

        // ดำเนินการค้นหาข้อมูลตามคำค้นหา
        $model = new AssetModel(); // แทน YourModel ด้วยชื่อโมเดลของคุณ

        $query = $model->select('assets.* , suppliers.* , type_assets.* , department.* , acquisition_method.* , location.* , currency_types.*')
            ->join('suppliers', 'assets.supplier_id = suppliers.supplier_id')
            ->join('type_assets', 'type_assets.id_type = assets.id_type')
            ->join('department', 'department.department_id = assets.department_id')
            ->join('acquisition_method', 'acquisition_method.method_id = assets.method_id')
            ->join('location', 'location.id_location = assets.id_localtion')
            ->join('currency_types', 'currency_types.currency_id = assets.currency_id')
            ->like('assets.name', $searchname);

        if (!empty($searchdepartment)) {
            $query->where('assets.department_id', $searchdepartment);
        }

        if (!empty($searchyear)) {
            $query->where('YEAR(assets.purchase_date)', $searchyear);
        }
        if (!empty($searchid)) {
            $query->like('assets.asset_id', $searchid);
        }
        if (!empty($searchmonth)) {
            $query->where('MONTH(assets.purchase_date)', $searchmonth);
        }
        if (!empty($searchday)) {
            $query->where('DAY(assets.purchase_date)', $searchday);
        }

        // คำสั่งจากฟังก์ชันที่เรียก เพื่อดึงข้อมูลจากฐานข้อมูล
        $results =  $query->findAll();


        $Message = new Message();
        $data1 = $Message->where('role', 0)->findAll();
        $data2 = $Message->where('role', 1)->findAll();

        $deparment = new DepartmentModel();

        $data = $deparment->findAll();
        $dapartment =
            $deparment->where('department_id', $searchdepartment)->first();

        $User = new UsersModel();
        $session = session();

        $data3 = $User->where('id', $session->get('id'))->first();
        return view('search_result', ['searchTerm' => $searchname, 'results' => $results, 'searchid' =>  $searchid, 'searchdepartment' => $searchdepartment, 'searchyear' => $searchyear, 'messages' =>  $data1, 'alart' =>  $data2, 'department' => $data, 'search_month' => $searchmonth, 'search_day' => $searchday, 'dep' => $dapartment,'user' => $data3]);
    }
}
