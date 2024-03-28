<?php

namespace App\Http\Controllers;

use App\Models\MasterModel;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function index()
    {
        $master = new MasterModel();
        $data = $master->allData();
        return view("master", compact("data"));
    }

    public function tambahMaster()
    {
        return view('tambahmaster');
    }

    public function edit($id_barang)
    {
        $master = new MasterModel();
        $data = $master->getDataById($id_barang);
        return view('edit', compact('data'));
    }

    public function update(Request $request, $id_barang)
    {
        $master = new MasterModel();
        $master->updateData($request, $id_barang);
        return redirect('/master')->with('success', 'Data berhasil diupdate');
    }

    public function delete($id_barang)
    {
        $master = new MasterModel();
        $master->deleteData($id_barang);
        return redirect('/master')->with('success', 'Data berhasil dihapus');
    }

    public function addMaster(Request $request)
    {
        $master = new MasterModel();
        $master->addData($request);
        return redirect('/master')->with('success', 'Data berhasil ditambahkan');
    }
}
