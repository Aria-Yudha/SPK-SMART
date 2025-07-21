<?php
namespace App\Controllers;

use App\models\usermodel;

class Auth extends BaseController
{
    public function index()
{
    if (!session()->get('logged_in')) {
        return redirect()->to('/auth/login');
    }

    // lanjut tampilkan dashboard
}

    public function login()
    {
        return view('auth/login');
    }

    public function lupapw()
    {
        return view('auth/lupapw');
    }

    public function ceklogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $usermodel = new \App\models\usermodel();
        $user = $usermodel->where('username', $username)->first();

        if ($user && $user['password'] === $password) {
            session()->set([
                'id_user' => $user['id_user'],
                'nama_user' => $user['nama_user'],
                'role' => $user['role'],
                'logged_in' => true
            ]);

            return redirect()->to('/dashboard/index');
        }

        session()->setFlashdata('error', 'Username atau password salah.');
        return redirect()->to('/auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/dashboard/index');
    }

    public function kirimReset()
{
    $email = $this->request->getPost('email');

    $userModel = new \App\Models\Usermodel();
    $user = $userModel->where('email', $email)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Email tidak terdaftar.');
    }

    $token = bin2hex(random_bytes(32));
    $resetUrl = base_url("auth/resetPassword/{$token}");

    // Simpan token ke tabel password_resets (buat dulu tabel ini)
    $db = \Config\Database::connect();
    $db->table('reset_password')->insert([
        'email' => $email,
        'token' => $token,
    ]);

    // Kirim email
    $emailService = \Config\Services::email();
    $emailService->setTo($email);
    $emailService->setSubject('Reset Password');
    $emailService->setMessage("Klik link berikut untuk mereset password Anda:<br><a href='{$resetUrl}'>Reset Password</a>");

    if ($emailService->send()) {
        return redirect()->to('/auth/lupapw')->with('success', 'Link reset password telah dikirim ke email Anda.');
    } else {
        return redirect()->back()->with('error', 'Gagal mengirim email.');
    }
}

public function resetPassword($token)
{
    // Cek token di tabel reset_password
    $db = \Config\Database::connect();
    $resetData = $db->table('reset_password')->where('token', $token)->get()->getRow();

    if (!$resetData) {
        return redirect()->to('/auth/lupapw')->with('error', 'Token tidak valid atau telah kadaluarsa.');
    }

    $data = [
        'title' => 'Reset Password',
        'token' => $token,
        'email' => $resetData->email
    ];

    return view('auth/resetpw', $data);
}

public function simpanpassword()
{
    $token = $this->request->getPost('token');
    $email = $this->request->getPost('email');
    $passwordBaru = $this->request->getPost('password');

    // Validasi token
    $db = \Config\Database::connect();
    $reset = $db->table('reset_password')->where(['email' => $email, 'token' => $token])->get()->getRow();

    if (!$reset) {
        return redirect()->to('/auth/lupapw')->with('error', 'Token tidak valid atau telah digunakan.');
    }

    // Update password di tabel user
    $userModel = new \App\Models\Usermodel();
    $userModel->where('email', $email)->set(['password' => $passwordBaru])->update();

    // Hapus token dari tabel reset_password
    $db->table('reset_password')->where('email', $email)->delete();

    return redirect()->to('/auth/login')->with('success', 'Password berhasil diubah. Silakan login.');
}

}
