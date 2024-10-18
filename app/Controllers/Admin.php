<?php

namespace App\Controllers;

use App\Models\Admin_M;
use CodeIgniter\HTTP\RedirectResponse;

class Admin extends BaseController
{
    public function index()
    {
        return view('homepage');
    }

    public function input()
    {
        return view('input-data');
    }


    public function insertData(): RedirectResponse
    {
        $request = $this->request;
        $model = new Admin_M();

        // Validate form input
        $rules = [
            'nama' => 'required|min_length[3]|max_length[255]',
            'mail' => 'required|valid_email|max_length[255]',
            'alamat' => 'required|min_length[5]|max_length[255]',
            'documen' => 'uploaded[documen]|max_size[documen,5000]|ext_in[documen,pdf,doc,docx,jpg,jpeg,png,xls,xlsx]',
        ];

        if (!$this->validate($rules))
        {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $file = $request->getFile('documen');
        if ($file->isValid() && !$file->hasMoved()) {
            $newFilename = $file->getRandomName();
            $file->move('uploads', $newFilename);
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to upload file.');
        }

        // Prepare data for insertion
        $data = [
            'nama' => $request->getPost('nama'),
            'mail' => $request->getPost('mail'),
            'alamat' => $request->getPost('alamat'),
            'documen' => $newFilename
        ];

        // Insert data into database
        if ($model->insert($data)) {
            return redirect()->to('/input')->with('success', 'Data successfully saved and file uploaded.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to save data. Please try again.');
        }
    }

    //get data all data
    public function lihatData()
    {
        $model = new Admin_M();
        $data ['dataList'] = $model->findAll();
        return view('lihat-data', $data);
    }

    public function edit($id)
    {
        $model = new Admin_M();
        // Fetch data from the database based on the given ID
        $data['dataList'] = $model->find($id);

        if (empty($data['dataList'])) {
            // If no data is found, redirect to a different page or show an error message
            return redirect()->to('/data')->with('error', 'Data not found.');
        }

        // Load the edit view with the fetched data
        return view('edit', $data);
    }


    public function deleteData($id)
    {
        $model = new Admin_M();
        if($model->find($id)) {
            if($model->delete($id)) {
                return redirect()
                    ->to('/data')
                    ->with('success', 'Data successfully deleted.');
            }else{
                return redirect()
                    ->to('/data')
                    ->with('error', 'Data failed to delete. Please try again.');
            }
        }else{
            return redirect()
                ->to('/data')
                ->with('error', 'Data not found.');
        }
    }

    public function update($id)
    {
        $model = new Admin_M();

        // Validasi input
        $validation = $this->validate([
            'nama' => 'required|min_length[3]|max_length[100]',
            'mail' => 'required|valid_email',
            'alamat' => 'required|max_length[255]',
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembali ke halaman edit dengan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data input dari form
        $data = [
            'nama' => $this->request->getPost('nama'),
            'mail' => $this->request->getPost('mail'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        // Update data berdasarkan ID
        $updated = $model->update($id, $data);

        if ($updated) {
            // Jika berhasil, redirect ke halaman data dengan pesan sukses
            return redirect()->to('/data')->with('success', 'Data berhasil diperbarui.');
        } else {
            // Jika gagal, redirect kembali ke halaman edit dengan pesan error
            return redirect()->back()->withInput()->with('error', 'Gagal memperbarui data.');
        }
    }

}