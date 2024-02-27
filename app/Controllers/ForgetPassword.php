<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UsersModel;
// Class 'App\Controllers\PHPMailer' not found
use PHPMailer\PHPMailer\PHPMailer;
// Class 'PHPMailer\PHPMailer\PHPMailer' not found
use PHPMailer\PHPMailer\Exception;

class ForgetPassword extends BaseController
{
    public function index()
    {
        return view('backoffice/users/forgot_password');
    }

    //---------------------------->->- Reset password : step 1
    public function sendResetLink()
    {
        $email = $this->request->getPost('email');

        // Validate email existence
        $userModel = new UsersModel();
        $user = $userModel->where('email', $email)->first();
        // print_r($user);
        // die;



        if (!$user) {
            // Handle invalid email
            return redirect()->to('/forget_password')->with('error', 'ไม่มีอีเมลล์ในระบบ');
        }

        // Generate a unique token and save it in the database
        $token = bin2hex(random_bytes(16)); // You can use a better method for generating tokens
        $userModel->update($user['id'], ['reset_token' => $token]);
        return redirect()->to("reset-password/$token")->with('success', 'ลิงก์รีเซ็ตรหัสผ่านส่งไปยังอีเมลของคุณ');
    }

    public function showResetForm($token)
    {
        // Verify token
        $userModel = new UsersModel();
        $user = $userModel->where('reset_token', $token)->first();

        if (!$user) {
            // Handle invalid token
            return redirect()->to('login')->with('error', 'Invalid password reset link');
        }

        return view('backoffice/users/reset_password', ['token' => $token]);
    }

    public function resetPassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');

        // Verify token
        $userModel = new UsersModel();
        $user = $userModel->where('reset_token', $token)->first();

        if (!$user) {
            // Handle invalid token
            return redirect()->to('login')->with('error', 'Invalid password reset link');
        }

        // Update password and clear token
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userModel->update($user['id'], ['password' => $hashedPassword, 'reset_token' => null]);

        return redirect()->to('login')->with('success', 'เปลี่ยนรหัสผ่านสำเร็จ');
    }
}
