<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DepartmentModel;

use CodeIgniter\HTTP\Response; // Use the correct namespace for Response

use App\Models\AssetModel;

use App\Models\LocationModel;

use App\Models\CurrencyTypesModel;

use App\Models\AcquisitionMethodModel;

use App\Models\TypeAssetsModel;

use App\Models\FinancialInformationModel;

use App\Models\SuppliersModel;

use App\Models\UsersModel;

use App\Models\LogLoginModel;

use App\Models\Message;

use App\Models\ManualModel;

use Dompdf\Dompdf;
use Dompdf\Options;

// Import TCPDF library
use TCPDF;
// Import MPDF library
use App\Libraries\CustomMPDF;

use Mpdf\Mpdf;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;


class BackofficeController extends BaseController
{
    // show users list
    public function index()
    {
        $Furniturn = new AssetModel();

        $data['asset'] = $Furniturn
            ->findAll();
        // มูลค่าทั้งหมดของจำนวนเงิน
        $data['total_price'] = $Furniturn->selectSum('purchase_price')->findAll();
        // print_r($data['total_price']);
        // die;
        $Message = new Message();
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();
        $User = new UsersModel();
        $session = session();

        $data['user'] = $User->where('id', $session->get('id'))->first();


        return view('backoffice/asset/asset_view', $data);
    }

    // เพิ่มข้อมูลครุภัณฑื
    public function add()
    {
        $Department = new DepartmentModel();
        $TypeAssets = new TypeAssetsModel();
        $AcquisitionMethod = new AcquisitionMethodModel();
        $Location = new LocationModel();
        $CurrencyTypes = new CurrencyTypesModel();
        $SuppliersModel = new SuppliersModel();
        $data['department'] = $Department->orderBy('department_name', 'ASC')
            ->findAll();
        $data['type_assets'] = $TypeAssets->orderBy('name_type', 'ASC')
            ->findAll();
        $data['acquisition_method'] = $AcquisitionMethod->orderBy('method_id', 'ASC')
            ->findAll();
        $data['location'] = $Location->orderBy('name_location', 'ASC')
            ->findAll();
        $data['currency_types'] = $CurrencyTypes->orderBy('currency_id', 'ASC')
            ->findAll();
        $data['supplier'] = $SuppliersModel
            ->orderBy('contact_person', 'ASC')
            ->findAll();

        // print_r($data['supplier']);
        // die;

        return view('backoffice/asset/add_asset', $data);
    }

    // เก็บข้อมูลครุภัณฑ์
    public function save()
    {
        $AssetModel = new AssetModel();
        $data = [
            'asset_id' => $this->request->getPost('asset_id'),
            'department_id' => $this->request->getVar('department_id'),
            'department_other' => $this->request->getVar('department_other') ?? '',
            'name' => $this->request->getVar('name'),
            'id_type' => $this->request->getPost('id_type'),
            'type_other' => $this->request->getPost('type_other') ?? '',
            'method_id' => $this->request->getPost('method_id'),
            'method_other' => $this->request->getPost('method_other') ?? '',
            'purchase_date' => $this->request->getVar('purchase_date'),
            'purchase_price' => $this->request->getVar('purchase_price'),
            'id_localtion' => $this->request->getPost('id_localtion'),
            'localtion_other' => $this->request->getPost('localtion_other'),
            'status' => $this->request->getVar('status') ?? '',
            'currency_id' => $this->request->getVar('currency_id'),
            'currency_other' => $this->request->getVar('currency_other') ?? '',
            'supplier_id' => $this->request->getVar('supplier_id'),
            'supplier_other' => $this->request->getVar('supplier_other') ?? '',
            'UsageLife' => $this->request->getVar('UsageLife'),
            'DepreciationRate' => $this->request->getVar('DepreciationRate'),
        ];
        // นำasset_id มาเก็บไว้ในตัวแปร
        $AssetModel->insert($data);
        // ถ้าหากกดปุ่มจำนวนที่ต้องการ
        return redirect()->to(base_url('asset-list'))->with('success', 'บันทึกข้อมูลสำเร็จ');
    }

    // Update asset
    public function update($id = null)
    {
        $AssetModel = new AssetModel();
        $Department = new DepartmentModel();
        $TypeAssets = new TypeAssetsModel();
        $AcquisitionMethod = new AcquisitionMethodModel();
        $Location = new LocationModel();
        $CurrencyTypes = new CurrencyTypesModel();
        $SuppliersModel = new SuppliersModel();
        $data['department'] = $Department->orderBy('department_name', 'ASC')->findAll();
        $data['type_assets'] = $TypeAssets->orderBy('name_type', 'ASC')
            ->findAll();
        $data['acquisition_method'] = $AcquisitionMethod->orderBy('method_id', 'ASC')
            ->findAll();
        $data['location'] = $Location->orderBy('name_location', 'ASC')
            ->findAll();
        $data['currency_types'] = $CurrencyTypes->orderBy('currency_id', 'ASC')
            ->findAll();
        $data['supplier'] = $SuppliersModel
            ->orderBy('contact_person', 'ASC')
            ->findAll();
        $data['asset_obj'] = $AssetModel->select('assets.* , suppliers.* , type_assets.* , department.* , acquisition_method.* , location.* , currency_types.*')
            ->join('suppliers', 'assets.supplier_id = suppliers.supplier_id')
            ->join('type_assets', 'type_assets.id_type = assets.id_type')
            ->join('department', 'department.department_id = assets.department_id')
            ->join('acquisition_method', 'acquisition_method.method_id = assets.method_id')
            ->join('location', 'location.id_location = assets.id_localtion')
            ->join('currency_types', 'currency_types.currency_id = assets.currency_id')
            ->like('assets.asset_id', $id)->first();
        // print_r($data['asset_obj']);
        // die;
        return view('backoffice/asset/edit_asset', $data);
    }
    // แก้ไขข้อมูล
    public function update_asset()
    {

        $AssetModel = new AssetModel();
        $id = $this->request->getPost('asset_id');
        // แก้ไขข้อมูลคีย์หลัก
        $data = [
            'department_id' => $this->request->getVar('department_id'),
            'name' => $this->request->getVar('name'),
            'id_type' => $this->request->getPost('id_type'),
            'method_id' => $this->request->getPost('method_id'),
            'purchase_date' => $this->request->getVar('purchase_date'),
            'purchase_price' => $this->request->getVar('purchase_price'),
            'id_localtion' => $this->request->getPost('id_localtion'),
            'status' => $this->request->getVar('status') ?? '',
            'currency_id' => $this->request->getVar('currency_id'),
            'supplier_id' => $this->request->getVar('supplier_id'),
            'UsageLife' => $this->request->getVar('UsageLife'),
            'DepreciationRate' => $this->request->getVar('DepreciationRate'),
        ];
        $AssetModel->update($id, $data);
        return redirect()->to('/asset-list')->with('edits', "แก้ไขข้อมูล $id สำเร็จ");
    }


    // delete user
    public function delete($id = null)
    {
        $AssetModel = new AssetModel();
        $data['asset'] = $AssetModel->where('asset_id', $id)->delete($id);
        return redirect()->to('/asset-list')->with('delect', "ลบข้อมูล $id สำเร็จ");
    }

    public function detail($id)
    {
        $Asset = new AssetModel();

        $data['asset'] = $Asset->select('*')
            ->join('suppliers', 'assets.supplier_id = suppliers.supplier_id', 'inner')
            ->join('type_assets', 'type_assets.id_type = assets.id_type', 'inner')
            ->join('department', 'department.department_id = assets.department_id', 'inner')
            ->join('acquisition_method', 'acquisition_method.method_id = assets.method_id', 'inner')
            ->join('location', 'location.id_location = assets.id_localtion', 'inner')
            ->join('currency_types', 'currency_types.currency_id = assets.currency_id', 'inner')
            ->like('assets.asset_id', $id)->first();
        // print_r($id);
        // print_r($data['asset']);
        // echo $id;
        // die;
        $Message = new Message();
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();
        $User = new UsersModel();
        $session = session();

        $data['user'] = $User->where('id', $session->get('id'))->first();
        return view('backoffice/asset/detail_asset', $data);
    }

    public function calculateDepreciation($id)
    {
        $assetModel = new AssetModel();
        $assetModel->calculateDepreciation($id);

        return redirect()->to('/asset-list');
    }

    // สถานที่ตั้ง
    public function localtion()
    {
        $Localtion = new LocationModel();
        $data['localtion'] = $Localtion->findAll();
        // print_r($data['localtion']);
        // die;
        $Message = new Message();
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();
        $User = new UsersModel();
        $session = session();

        $data['user'] = $User->where('id', $session->get('id'))->first();
        return view('backoffice/localtion/localtion_view', $data);
    }


    // เพิ่มข้อมูลสถานที่ตั้ง
    public function addlocaltion()
    {
        return view('backoffice/localtion/add_localtion');
    }

    // เก็บข้อมูลสถานที่ตั้ง
    public function addlocaltion_save()
    {
        $localtionModel = new LocationModel();
        $localtionModel->save([
            'name_location' => $this->request->getVar('name_location'),
        ]);
        // print_r($localtionModel);
        // die;
        return redirect()->to('/Localtion_view')->with('success', 'เพิ่มข้อมูลสถานที่ตั้งเรียบร้อย');
    }
    // แก้ไขข้อมูลสถานที่ตั้ง
    public function editlocaltion($id)
    {
        $localtionModel = new LocationModel();
        $data['localtion'] = $localtionModel->where('id_location', $id)->first();
        // print_r($data['localtion']);
        // die;
        return view('backoffice/localtion/edit_localtion', $data);
    }

    // แก้ไขฐานข้อมูลสถานที่ตั้ง
    public function update_localtion()
    {

        $localtionModel = new LocationModel();
        $id = $this->request->getVar('id_location');
        $data = [
            'name_location' => $this->request->getVar('name_location'),
        ];
        $localtionModel->update($id, $data);
        return redirect()->to('/Localtion_view')->with('edits', "แก้ไขข้อมูลสถานที่ $id ตั้งเรียบร้อย");
    }

    // ลบข้อมูลสถานที่ตั้ง
    public function delete_localtion($id)
    {
        $localtionModel = new LocationModel();
        $localtionModel->where('id_location', $id)->delete();
        return redirect()->to('/Localtion_view')->with('delece', "ลบข้อมูลสถานที่ $id ตั้งเรียบ");
    }


    // ประเภทงบประมาณ
    public function type()
    {
        $Currency = new CurrencyTypesModel();
        $data['type'] = $Currency->findAll();
        // print_r($data['type']);
        // die;
        $Message = new Message();
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();
        $User = new UsersModel();
        $session = session();

        $data['user'] = $User->where('id', $session->get('id'))->first();
        return view('backoffice/type/type_view', $data);
    }

    // เพิ่มประเภทงบประมาณ
    public function addtype()
    {
        return view('backoffice/type/add_type');
    }


    // เก็บข้อมูลประเภทงบประมาณ
    public function addtype_save()
    {
        $Currency = new CurrencyTypesModel();
        $Currency->save([
            'currency_name' => $this->request->getVar('currency_name'),
        ]);
        // print_r($Currency);
        // die;
        return redirect()->to('/CurrencyTypes_view')->with('success', 'เพิ่มข้อมูลประเภทงบประมาณเรียบร้อย');
    }

    // แก้ไขข้อมูลประเภทงบประมาณ
    public function edit_type($id)
    {
        $Currency = new CurrencyTypesModel();
        $data['currency'] = $Currency->where('currency_id', $id)->first();
        // print_r($data['currency']);
        // die;
        return view('backoffice/type/edit_currency', $data);
    }

    // แก้ไขฐานข้อมูลประเภทงบประมาณ
    public function update_type()
    {

        $Currency = new CurrencyTypesModel();
        $id = $this->request->getVar('currency_id');
        $data = [
            'currency_name' => $this->request->getVar('currency_name'),
        ];

        $Currency->update($id, $data);
        return redirect()->to('/CurrencyTypes_view')->with('edits', "แก้ไขข้อมูลประเภทงบประมาณ $id เรียบร้อย");
    }

    // ลบข้อมูลประเภทงบประมาณ
    public function delete_type($id)
    {
        $Currency = new CurrencyTypesModel();
        $Currency->where('currency_id', $id)->delete();
        return redirect()->to('/CurrencyTypes_view')->with('delece', "แก้ไขข้อมูลประเภทงบประมาณ $id เรียบร้อย");
    }

    // ข้อมูลผู้ใช้งาน   
    public function users()
    {
        $Users = new UsersModel();
        $data['user'] = $Users->findAll();
        // print_r($data['user']);
        // die;
        $Message = new Message();
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();

        return view('backoffice/users/users_view', $data);
    }

    // แก้ไขข้อมูลผู้ใช้งาน
    public function edit_users($id)
    {
        $Users = new UsersModel();
        $data['users_old'] = $Users->where('id', $id)->first();
        // print_r($data['users_old']);
        // die;
        return view('backoffice/users/edit_users', $data);
    }

    // แก้ไขข้อมูลผู้ใช้งานจากฐานข้อมูล
    public function update_users()
    {

        $Users = new UsersModel();
        $id = $this->request->getVar('id');
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
        ];
        $Users->update($id, $data);
        return redirect()->to('/User_view')->with('edits', "แก้ไขข้อมูลผู้ใช้งาน $id เรียบร้อย");
    }

    // ลบข้อมูลผู้ใช้งาน
    public function delete_users($id)
    {
        $Users = new UsersModel();
        $Users->where('id', $id)->delete();
        return redirect()->to('/User_view')->with('delece', "ลบข้อมูลผู้ใช้งาน $id เรียบร้อย");
    }

    // วิธีการที่ได้มา
    public function method()
    {
        $Method = new AcquisitionMethodModel();
        $data['method'] = $Method->findAll();
        // print_r($data['method']);
        // die;
        $Message = new Message();
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();
        $User = new UsersModel();
        $session = session();

        $data['user'] = $User->where('id', $session->get('id'))->first();
        return view('backoffice/method/method_view', $data);
    }

    // เพิ่มข้อมูลวิธีการที่ได้มา
    public function addmethod()
    {
        return view('backoffice/method/add_method');
    }

    // เก็บข้อมูลวิธีการที่ได้มา
    public function addmethod_save()
    {
        $Method = new AcquisitionMethodModel();
        $Method->save([
            'acquisition_method_name' => $this->request->getVar('acquisition_method_name'),
        ]);
        // print_r($Method);
        // die;
        return redirect()->to('/Method_view')->with('success', 'เพิ่มข้อมูลวิธีการที่ได้รับเรียบร้อย');
    }

    // แก้ไขข้อมูลวิธีการที่ได้มา
    public function edit_method($id)
    {
        $Method = new AcquisitionMethodModel();
        $data['method'] = $Method->where('method_id', $id)->first();
        // print_r($data['method']);
        // die;
        return view('backoffice/method/edit_method', $data);
    }

    // แก้ไขฐานวิธีการที่ได้มา
    public function update_method()
    {

        $Method = new AcquisitionMethodModel();
        $id = $this->request->getVar('method_id');
        $data = [
            'acquisition_method_name' => $this->request->getVar('acquisition_method_name'),
        ];

        $Method->update($id, $data);
        // แจ้งเตือนเมื่ออัปเดตสำเร็จ
        return redirect()->to('/Method_view')->with('edits', "แก้ไขข้อมูลวิธีการที่ได้รับ $id เรียบร้อย");
    }

    // ลบข้อมูลวิธีการที่ได้มา
    public function delete_method($id)
    {
        $Method = new AcquisitionMethodModel();
        $Method->where('method_id', $id)->delete();

        return redirect()->to('/Method_view')->with('delece', "ลบข้อมูลวิธีการที่ได้รับ $id เรียบร้อย");
    }


    // ประเภทการจัดซื้อ
    public function assetType()
    {
        $AssetType = new TypeAssetsModel();
        $data['assetType'] = $AssetType->findAll();
        // print_r($data['assetType']);
        // die;
        $Message = new Message();
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();
        $User = new UsersModel();
        $session = session();

        $data['user'] = $User->where('id', $session->get('id'))->first();
        return view('backoffice/assetType/assetType_view', $data);
    }

    // เพิ่มประเภทการจัดซื้อ
    public function addassetType()
    {
        return view('backoffice/assetType/add_assetType');
    }
    // เก็บข้อมูลประเภทการจัดซื้อ
    public function addassetType_save()
    {
        $AssetType = new TypeAssetsModel();
        $AssetType->save([
            'name_type' => $this->request->getVar('name_type'),
        ]);
        return redirect()->to('/AssetTypes_view')->with('success', 'เพิ่มข้อมูลประเภทเรียบร้อย');
    }

    // แก้ไขข้อมูลวิธีการที่ได้มา
    public function edit_assetType($id)
    {
        $AssetType = new TypeAssetsModel();
        $data['assetType'] = $AssetType->where('id_type', $id)->first();
        // print_r($data['assetType']);
        // die;
        return view('backoffice/assetType/edit_type', $data);
    }

    // แก้ไขฐานวิธีการที่ได้มา
    public function update_assetType()
    {

        $AssetType = new TypeAssetsModel();
        $id = $this->request->getVar('id_type');
        $data = [
            'name_type' => $this->request->getVar('name_type'),
        ];

        $AssetType->update($id, $data);
        return redirect()->to('/AssetTypes_view')->with('edits', "แก้ไขข้อมูลประเภท $id เรียบร้อย");
    }

    // ลบข้อมูลวิธีการที่ได้มา
    public function delete_assetType($id)
    {
        $AssetType = new TypeAssetsModel();
        $AssetType->where('id_type', $id)->delete();
        return redirect()->to('/AssetTypes_view')->with('delece', "ลบข้อมูลประเภท $id เรียบร้อย");
    }

    // ข้อมูลผู้ชื่อขาย
    public function suppliers()
    {
        $SuppliersModel = new SuppliersModel();
        $data['suppliers'] = $SuppliersModel->findAll();
        // print_r($data['suppliers'][5]);
        // die;
        $Message = new Message();
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();
        $User = new UsersModel();
        $session = session();

        $data['user'] = $User->where('id', $session->get('id'))->first();
        return view('backoffice/suppliers/suppliers_view', $data);
    }

    // เพิ่มผู้ซื้อ/ขาย
    public function addsuppliers()
    {
        return view('backoffice/suppliers/suppliers_add');
    }

    // เก็บข้อมูลผู้ซื้อ/ขาย
    public function addsuppliers_save()
    {
        $SuppliersModel = new SuppliersModel();
        $SuppliersModel->save([
            'contact_person' => $this->request->getVar('contact_person'),
            'contact_email' => $this->request->getVar('contact_email') ?? '',
            'phone_number' => $this->request->getVar('phone_number'),
            'address' => $this->request->getVar('address'),
        ]);



        return redirect()->to('/Suppliers_view')->with('success', 'เพิ่มข้อมูลผู้ซื้อ/ผู้ขายเรียบร้อย');
    }


    // แก้ไขข้อมูลผู้ซื้อ/ขาย
    public function edit_suppliers($id)
    {
        $SuppliersModel = new SuppliersModel();
        $data['suppliers'] = $SuppliersModel->where('supplier_id', $id)->first();
        // print_r($data['suppliers']);
        // die;
        return view('backoffice/suppliers/suppliers_edit', $data);
    }

    // แก้ไขฐานผู้ซื้อ/ขาย
    public function update_suppliers()
    {

        $SuppliersModel = new SuppliersModel();
        $id = $this->request->getVar('supplier_id');
        $data = [
            'contact_person' => $this->request->getVar('contact_person'),
            'contact_email' => $this->request->getVar('contact_email'),
            'phone_number' => $this->request->getVar('phone_number'),
            'address' => $this->request->getVar('address'),
        ];

        $SuppliersModel->update($id, $data);
        return redirect()->to('/Suppliers_view')->with('edits', "แก้ไขข้อมูลผู้ซื้อ/ผู้ขาย $id เรียบร้อย");
    }

    // ลบข้อมูลผู้ซื้อ/ขาย
    public function delete_suppliers($id)
    {
        $SuppliersModel = new SuppliersModel();
        $SuppliersModel->where('supplier_id', $id)->delete();
        return redirect()->to('/Suppliers_view')->with('delece', "ลบข้อมูลผู้ซื้อ/ผู้ขาย $id เรียบร้อย");
    }

    // เก็บประวัติการเข้าออก
    public function log()
    {
        // Get the session service
        $session = session();
        $LogLoginModel = new LogLoginModel();
        $data['log'] = $LogLoginModel->orderBy('creart_at', 'DESC')
            ->where('id_users', $session->get('id'))
            ->findAll();

        // print_r($data['log']);
        // die;
        $Message = new Message();
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();

        $User = new UsersModel();
        $session = session();

        $data['user'] = $User->where('id', $session->get('id'))->first();
        return view('backoffice/users/log_view', $data);
    }

    public function serch_export()
    {
        $Message = new Message();
        $deparment = new DepartmentModel();
        $data['deparments'] = $deparment->orderBy('department_name', 'ASC')->findAll();
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();
        // print_r($data['deparments'][0]);
        // die;
        return view('serch/asset_export', $data);
    }

    public function exportToCSV_asset()
    {
        $deparment = new DepartmentModel();
        $Serch_Department = $this->request->getPost('search_Department');
        $data = $deparment->where('department_id', $Serch_Department)->first();
        // print_r($data['department_name']);
        // die;
        // file name 
        $filename = 'ครุภัณฑ์' . $data['department_name'] . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // สร้างไฟล์ CSV โดยใช้ fputcsv เพื่


        // get data 
        $AssetModel = new AssetModel();
        $AssetData = $AssetModel->select('*')->where('department_id', $Serch_Department)
            ->findAll();

        // file creation 
        $file = fopen('php://output', 'w');

        $header = array(
            "รหัสครุภัณฑ์",
            "รหัสสาขาวิชา",
            "ชื่อสาขา",
            "ชื่อครุภัณฑ์",
            "ลำดับประเภท",
            "ประเภท",
            "ลำดับวิธีการ",
            "วิธีการ",
            "วันที่ซื้อ",
            "วันเริ่มต้น",
            "วันสิ้นสุด",
            "ราคา",
            "ลำดับสถานที่ตั้ง",
            "สถานที่ตั้ง",
            "ลำดับเงินงบประมาณ",
            "เงินงบประมาณ",
            "ลำดับผู้ซื้อขาย",
            "ผู้ซื้อขาย",
            "สถานะ",
            "จำนวนปีเสื่อมราคา",
            "อัตราค่าเสื่อมราคา"

        );
        // Insert the UTF-8 BOM in the file
        fputs($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
        // file creation    
        fputcsv($file, $header);
        foreach ($AssetData as $key => $line) {
            // file data

            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }

    public function exportToCSV_currency()
    {
        // file name 
        $filename = 'ประเภทเงินงบประมาณ' . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $CurrencyTypesModel = new CurrencyTypesModel();
        $CurrencyData = $CurrencyTypesModel->select('*')->findAll();

        // file creation 
        $file = fopen('php://output', 'w');

        // Insert the UTF-8 BOM in the file
        fputs($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
        $header = array(
            "ลำดับ",
            "เงินงบประมาณ"
        );
        fputcsv($file, $header);
        foreach ($CurrencyData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }
    public function exportToCSV_localtion()
    {
        // file name 
        $filename = 'สถานที่ตั้ง' . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $LocationModel = new LocationModel();
        $LocationData = $LocationModel->select('*')->findAll();

        // file creation 
        $file = fopen('php://output', 'w');

        // Insert the UTF-8 BOM in the file
        fputs($file, chr(0xEF) . chr(0xBB) . chr(0xBF));
        $header = array(
            "ลำดับ",
            "สถานที่ตั้ง"
        );
        fputcsv($file, $header);
        foreach ($LocationData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }
    public function exportToCSV_type_asset()
    {
        // file name 
        $filename = 'ประเภทครุภัณฑ์' . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $TypeAssetsModel = new TypeAssetsModel();
        $TypeAssetsData = $TypeAssetsModel->select('*')->findAll();

        // file creation 
        $file = fopen('php://output', 'w');
        // Insert the UTF-8 BOM in the file
        fputs($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

        $header = array(
            "ลำดับ",
            "ประเภทครุภัณฑ์"
        );
        fputcsv($file, $header);
        foreach ($TypeAssetsData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }

    public function exportToCSV_1()
    {
        // file name 
        $filename = 'type_asset' . '.csv';
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // get data 
        $TypeAssetsModel = new TypeAssetsModel();
        $TypeAssetsData = $TypeAssetsModel->select('*')->findAll();

        // file creation 
        $file = fopen('php://output', 'w');
        // Insert the UTF-8 BOM in the file
        fputs($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

        $header = array(
            "id_type",
            "name_type"
        );
        fputcsv($file, $header);
        foreach ($TypeAssetsData as $key => $line) {
            fputcsv($file, $line);
        }
        fclose($file);
        exit;
    }

    public function Register()
    {
        helper(['form']);
        $data = [];
        echo view('backoffice/users/logup', $data);
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => ' กรุณากรอกชื่อ',
                ],
            ],
            'email' => [
                'rules' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'กรุณากรอกอีเมล',
                    'min_length' => 'กรุณากรอกอีเมลอย่างน้อย 4 ตัวอักษร',
                    'max_length' => 'กรุณากรอกอีเมลไม่เกิน 100 ตัวอักษร',
                    'valid_email' => 'กรุณากรอกอีเมลให้ถูกต้วน',
                    'is_unique' => 'มีอีเมลนี้อยู่ในระบบแล้ว'
                ],
            ],
            'password' => [
                'rules' => 'required|max_length[255]|min_length[10]',
                'errors' => [
                    'required' => 'กรุณากรอกรหัสผ่าน',
                    'min_length' => 'กรุณากรอกรหัสผ่านอย่างน้อย 10 ตัวอักษร',
                    'max_length' => 'กรุณากรอกรหัสผ่านอย่างน้อย 255 ตัวอักษร',
                ],
            ],
            'confirmpassword' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'รหัสผ่านไม่ตรงกัน',
                ],
            ],
        ];

        if ($this->validate($rules)) {
            $userModel = new UsersModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => 1
            ];
            $userModel->save($data);

            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            echo view('backoffice/users/logup', $data);
        }
    }

    public function login()
    {
        helper(['form']);
        echo view('backoffice/users/login');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UsersModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'role' => $data['role'],
                    'log_action' => 1,
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);

                $userModel->update($data['id'], ['log_action' => 1]);
                // เก็บlog
                $LogLoginModel = new LogLoginModel();
                $data = [
                    'log_action' => 1,
                    'id_users' => $session->get('id'),
                ];
                $LogLoginModel->save($data);
                return redirect()->to('/Dashboard');
            } else {
                $session->setFlashdata('msg', 'รหัสผ่านไม่ถูกต้อง');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'อีเมลล์ไม่ถูกต้อง');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        // ถ้ากดปุ่มออกจากระบบ



        // Get the session service
        $session = session();

        // Remove user data from session
        $session->destroy();
        $userModel = new UsersModel();

        $LogLoginModel = new LogLoginModel();
        $data = [
            'log_action' => 0,
            'id_users' => $session->get('id'),
        ];
        $LogLoginModel->save($data);
        $userModel->update($session->get('id'), ['log_action' => 0]);



        return redirect()->to('/login');
        //    ถ้าไม่กดปุ่มออกจากระบบภายใน 1 นาที ให้ออกจากระบบอัตโนมัติ      


    }

    // โปรไฟล์
    public function profile()
    {

        $Message = new Message();
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();
        $User = new UsersModel();
        $session = session();

        $data['user'] = $User->where('id', $session->get('id'))->first();
        return view('backoffice/users/profile', $data);
    }

    public function pdf()
    {

        // แก้ฟอร์นภาษาไทย
        $Asset = new AssetModel();

        $data['asset'] = $Asset->findAll();


        return view('backoffice/print/pdf_view', $data);

        // print_r($data['asset'][0]);
        // die;
    }
    public function htmlToPDF()
    {
        $mpdf = new CustomMPDF();
        $mpdf->WriteHTML('<h1>Hello World</h1>');
        $mpdf->Output();
    }

    // คู่มือการใช้งาน
    public function guide()
    {
        $Message = new Message();
        $ManualModel = new ManualModel();
        $data['manual'] = $ManualModel->orderBy('id_manual', 'ASC')->findAll();
        // print_r($data['manual'][0]);
        // die;
        $data['messages'] = $Message->where('role', 0)->findAll();
        $data['alart'] = $Message->where('role', 1)->findAll();
        $User = new UsersModel();
        $session = session();

        $data['user'] = $User->where('id', $session->get('id'))->first();
        return view('backoffice/users/guide', $data);
    }
    // การตั้งค่า
    public function setting()
    {
        // $Message = new Message();
        $User = new UsersModel();
        $session = session();

        $data['user'] = $User->where('id', $session->get('id'))->first();
        // print_r($data['user']);
        // die;

        return view('backoffice/users/setting', $data);
    }
    public function upload()
    {
        helper(['form', 'url']);
        $session = session();
        $database = \Config\Database::connect();
        $db = $database->table('users');

        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/png]',
                'max_size[file,1024]',
            ]
        ]);

        if (!$input) {
            return redirect()->to(base_url('/Setting'))->with('error', 'อัปโหลดรูปไม่สำเร็จ');
        } else {
            $img = $this->request->getFile('file');
            // ให้เอารูปไปที่public
            $img->move('../public/uploads');
            $data = [
                'image' => $img->getName()
            ];
            $id = $session->get('id');
            $db->set($data)->where('id', $id)->update();
            return redirect()->to(base_url('/Setting'))->with('success', 'อัปโหลดรูปสำเร็จ');
        }
    }

    // reset_password
    public function reset_password($id)
    {
        $User = new UsersModel();
        $session = session();

        $data['user'] = $User->where('id', $session->get('id'))->first();
        return view('backoffice/reset/reset_password', $data);
    }
    public function resetpasword()
    {
        $id = $this->request->getPost('id');
        $password = $this->request->getPost('password');

        // Verify token
        $userModel = new UsersModel();
        $user = $userModel->where('id', $id)->first();


        if (!$user) {
            // Handle invalid token
            return redirect()->to('login')->with('error', 'Invalid password reset link');
        }

        // Update password and clear token
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userModel->update($user['id'], ['password' => $hashedPassword]);

        return redirect()->to(base_url('reset_password_User/' . $id))->with('success', 'เปลี่ยนรหัสผ่านสำเร็จ');
    }


}
