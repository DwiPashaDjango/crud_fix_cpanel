<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Listkbm;
use App\Service;
use App\Room;

class StorePgRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        

     
        $rules = [
            'tgl_pengajuan'          => 'required|date_format:Y-m-d',
        ];
        
        $this->request->get('namaproduk') as $key)
        {
            $rules['namaproduk.'.$key] = 'required|text'; // you can set rules for all the array items
        }

        $this->request->get('company') as $key)
        {
            $rules['company.'.$key] = 'required|text'; // you can set rules for all the array items
        }

        $this->request->get('serialnumber') as $key)
        {
            $rules['serialnumber.'.$key] = 'required'; // you can set rules for all the array items
        }       
        $this->request->get('gedung') as $key)
        {
            $rules['gedung.'.$key] = 'required'; // you can set rules for all the array items
        }  
        $this->request->get('alamat') as $key)
        {
            $rules['alamat.'.$key] = 'required'; // you can set rules for all the array items
        }  
        $this->request->get('kelas') as $key)
        {
            $rules['kelas.'.$key] = 'required'; // you can set rules for all the array items
        }  
        $this->request->get('luas') as $key)
        {
            $rules['luas.'.$key] = 'required'; // you can set rules for all the array items
        }  
        $this->request->get('baserent') as $key)
        {
            $rules['baserent.'.$key] = 'required'; // you can set rules for all the array items
        }  
        $this->request->get('servicecharge') as $key)
        {
            $rules['servicecharge.'.$key] = 'required'; // you can set rules for all the array items
        }  
        $this->request->get('tarifbr') as $key)
        {
            $rules['tarifbr.'.$key] = 'required'; // you can set rules for all the array items
        }  
          $this->request->get('tarifsc') as $key)
        {
            $rules['tarifsc.'.$key] = 'required'; // you can set rules for all the array items
        }  
          $this->request->get('totalbr') as $key)
        {
            $rules['totalbr.'.$key] = 'required'; // you can set rules for all the array items
        }  
          $this->request->get('totalsc') as $key)
        {
            $rules['totalsc.'.$key] = 'required'; // you can set rules for all the array items
        }  
        return $rules;
        
    }
}
