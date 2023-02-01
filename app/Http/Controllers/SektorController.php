<?php

namespace App\Http\Controllers;

use App\Http\Resources\SektorResurs;
use App\Models\Sektor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SektorController extends BaseController
{
    public function index()
    {
        $sektori = Sektor::all();
        return $this->porukaOUspehu(SektorResurs::collection($sektori), 'Vraceni su svi sektori.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'sektor' => 'required',
            'rukovodilac' => 'required'
        ]);
        if($validator->fails()){
            return $this->porukaOGresci($validator->errors());
        }

        $sektor = Sektor::create($input);

        return $this->porukaOUspehu(new SektorResurs($sektor), 'Novi sektor je kreiran.');
    }


    public function show($ID)
    {
        $sektor = Sektor::find($ID);
        if (is_null($sektor)) {
            return $this->porukaOGresci('Sektor sa zadatim ID-em ne postoji.');
        }
        return $this->porukaOUspehu(new SektorResurs($sektor), 'Sektor sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $ID)
    {
        $sektor = Sektor::find($ID);
        if (is_null($sektor)) {
            return $this->porukaOGresci('Sektor sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'sektor' => 'required',
            'rukovodilac' => 'required'
        ]);

        if($validator->fails()){
            return $this->porukaOGresci($validator->errors());
        }

        $sektor->sektor = $input['sektor'];
        $sektor->rukovodilac = $input['rukovodilac'];
        $sektor->save();

        return $this->porukaOUspehu(new SektorResurs($sektor), 'Sektor je izmenjen.');
    }

    public function destroy($ID)
    {
        $sektor = Sektor::find($ID);
        if (is_null($sektor)) {
            return $this->porukaOGresci('Sektor sa zadatim ID-em ne postoji.');
        }
        
        $sektor->delete();
        return $this->porukaOUspehu([], 'Sektor je obrisan.');
    }
}
