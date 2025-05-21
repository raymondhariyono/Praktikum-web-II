<?php

namespace App\Controllers;

use App\Models\BukuModel;

class BukuController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/loginView')->with('error', 'Silakan login terlebih dahulu.');
        }

        $model = new BukuModel();
        $data['buku'] = $model->findAll();

        return view('buku/indexView', $data);
    }

    public function create()
    {
        return view('buku/createView');
    }

    public function store()
    {
        $validationRules = [
            'judul' => 'required|regex_match[/^[a-zA-Z\s]+$/]',
            'pengarang' => 'required|regex_match[/^[a-zA-Z\s]+$/]',
            'penerbit' => 'required|regex_match[/^[a-zA-Z\s]+$/]',
            'tahun_terbit' => 'required|numeric|greater_than[1900]|less_than[2024]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $model = new BukuModel();
        $model->save([
            'judul' => $this->request->getPost('judul'),
            'pengarang' => $this->request->getPost('pengarang'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ]);

        return redirect()->to('/buku')->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $model = new BukuModel();
        $buku = $model->find($id);

        if (!$buku) {
            return redirect()->to('/buku')->with('error', 'Data buku tidak ditemukan.');
        }

        return view('buku/editView', ['buku' => $buku]);
    }


    public function update($id)
    {
        $model = new BukuModel();
        $buku = $model->find($id);

        if (!$buku) {
            return redirect()->to('/buku')->with('error', 'Data buku tidak ditemukan.');
        }

        $judul = $this->request->getPost('judul');
        $pengarang = $this->request->getPost('pengarang');
        $penerbit = $this->request->getPost('penerbit');
        $tahun_terbit = $this->request->getPost('tahun_terbit');

        $validationRules = [
            'judul' => 'permit_empty|regex_match[/^[a-zA-Z\s]+$/]',
            'pengarang' => 'permit_empty|regex_match[/^[a-zA-Z\s]+$/]',
            'penerbit' => 'permit_empty|regex_match[/^[a-zA-Z\s]+$/]',
            'tahun_terbit' => 'permit_empty|numeric|greater_than[1900]|less_than[2025]'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $dataToUpdate = [
            'judul' => $judul ?: $buku['judul'],
            'pengarang' => $pengarang ?: $buku['pengarang'],
            'penerbit' => $penerbit ?: $buku['penerbit'],
            'tahun_terbit' => $tahun_terbit ?: $buku['tahun_terbit'],
        ];

        $model->update($id, $dataToUpdate);

        return redirect()->to('/buku')->with('success', 'Data buku berhasil diperbarui.');
    }


    public function delete($id)
    {
        $model = new BukuModel();
        $buku = $model->find($id);

        if (!$buku) {
            return redirect()->to('/buku')->with('error', 'Data buku tidak ditemukan.');
        }

        $model->delete($id);
        return redirect()->to('/buku')->with('success', 'Data buku berhasil dihapus.');
    }
}