<?php

namespace App\Http\Controllers;

use App\Http\Resources\PozicijaResurs;
use App\Models\Pozicija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PozicijaController extends BaseController
{
    public function index()
    {
        $pozicije = Pozicija::all();
        return $this->porukaOUspehu(PozicijaResurs::collection($pozicije), 'Vracene su sve pozicije.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'pozicija' => 'required',
            'sektorID' => 'required'
        ]);
        if($validator->fails()){
            return $this->porukaOGresci($validator->errors());
        }

        $pozicija = Pozicija::create($input);

        return $this->porukaOUspehu(new PozicijaResurs($pozicija), 'Nova pozicija je kreirana.');
    }


    public function show($ID)
    {
        $pozicija = Pozicija::find($ID);
        if (is_null($pozicija)) {
            return $this->porukaOGresci('Pozicija sa zadatim ID-em ne postoji.');
        }
        return $this->porukaOUspehu(new PozicijaResurs($pozicija), 'Pozicija sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $ID)
    {
        $pozicija = Pozicija::find($ID);
        if (is_null($pozicija)) {
            return $this->porukaOGresci('Pozicija sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'pozicija' => 'required',
            'sektorID' => 'required'
        ]);

        if($validator->fails()){
            return $this->porukaOGresci($validator->errors());
        }

        $pozicija->pozicija = $input['pozicija'];
        $pozicija->sektorID = $input['sektorID'];
        $pozicija->save();

        return $this->porukaOUspehu(new PozicijaResurs($pozicija), 'Pozicija je izmenjena.');
    }

    public function destroy($ID)
    {
        $pozicija = Pozicija::find($ID);
        if (is_null($pozicija)) {
            return $this->porukaOGresci('Pozicija sa zadatim ID-em ne postoji.');
        }
        
        $pozicija->delete();
        return $this->porukaOUspehu([], 'Pozicija je obrisana.');
    }
}
