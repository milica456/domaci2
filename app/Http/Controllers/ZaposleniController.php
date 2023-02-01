<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZaposleniResurs;
use App\Models\Zaposleni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZaposleniController extends BaseController
{
    public function index()
    {
        $zaposleni = Zaposleni::all();
        return $this->porukaOUspehu(ZaposleniResurs::collection($zaposleni), 'Vraceni su svi zaposleni.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'pozicijaID' => 'required',
            'plata' => 'required'
        ]);
        if($validator->fails()){
            return $this->porukaOGresci($validator->errors());
        }

        $zaposleni = Zaposleni::create($input);

        return $this->porukaOUspehu(new ZaposleniResurs($zaposleni), 'Novi zaposleni je kreiran.');
    }


    public function show($ID)
    {
        $zaposleni = Zaposleni::find($ID);
        if (is_null($zaposleni)) {
            return $this->porukaOGresci('Zaposleni sa zadatim ID-em ne postoji.');
        }
        return $this->porukaOUspehu(new ZaposleniResurs($zaposleni), 'Zaposleni sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $ID)
    {
        $zaposleni = Zaposleni::find($ID);
        if (is_null($zaposleni)) {
            return $this->porukaOGresci('Zaposleni sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'ime' => 'required',
            'prezime' => 'required',
            'pozicijaID' => 'required',
            'plata' => 'required'
        ]);

        if($validator->fails()){
            return $this->porukaOGresci($validator->errors());
        }

        $zaposleni->ime = $input['ime'];
        $zaposleni->prezime = $input['prezime'];
        $zaposleni->pozicijaID = $input['pozicijaID'];
        $zaposleni->plata = $input['plata'];
        $zaposleni->save();

        return $this->porukaOUspehu(new ZaposleniResurs($zaposleni), 'Zaposleni je izmenjen.');
    }

    public function destroy($ID)
    {
        $zaposleni = Zaposleni::find($ID);
        if (is_null($zaposleni)) {
            return $this->porukaOGresci('Zaposleni sa zadatim ID-em ne postoji.');
        }

        $zaposleni->delete();
        return $this->porukaOUspehu([], 'Zaposleni je obrisan.');
    }
}
