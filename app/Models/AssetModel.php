<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetModel extends Model
{
    protected $table            = 'assets';
    protected $primaryKey       = 'asset_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['asset_id', 'department_id', 'department_other', 'name', 'id_type', 'type_other', 'method_id', 'method_other', 'purchase_date', 'start_date', 'end_date', 'purchase_price', 'id_localtion', 'localtion_other', 'currency_id', 'currency_other', 'supplier_id', 'supplier_other', 'status', 'UsageLife', 'DepreciationRate'];


    public function calculateDepreciation($id)
    {
        // ดึงข้อมูลของครุภัณฑ์
        $asset = $this->find($id);

        // คำนวณค่าเสื่อมราคาตามการใช้งาน
        $years = floor((time() - strtotime($asset['purchase_date'])) / 31536000);
        $annualDepreciation = $asset['purchase_price'] * $asset['DepreciationRate'];
        $accumulatedDepreciation = $annualDepreciation * $years;
        // Format accumulatedDepreciation to ensure it's a decimal
        $accumulatedDepreciation = number_format($accumulatedDepreciation, 2, '.', '');
        // print_r($accumulatedDepreciation);
        // die();

        // บันทึกค่าเสื่อมราคาสะสมลงในฐานข้อมูล
        $this->update($id, ['TotalValue' => $accumulatedDepreciation]);
    }

    public function getAllData()
    {
        // Assuming you want to retrieve all rows from the 'assets' table
        return $this->findAll();
    }
    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
