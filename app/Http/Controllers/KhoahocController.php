<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail as FacadesMail;


use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class KhoahocController extends Controller
{

    public function khoahoc($madaotao)
    {

        $date_now = Carbon::now()->toDateString();
        $all_khoahoc = DB::table('khoahoc')->where('lichkhaigiang','>=',$date_now)->where('madaotao',$madaotao)->orderBy('lichkhaigiang','DESC')->get();
        $data_daotao = DB::table('daotao')->get();

        return view('userpages.khoahoc')->with('all_kh',$all_khoahoc)->with('all_daotao',$data_daotao);
    }
    public function chitietkhoahoc($makh)
    {
        $ctkh = DB::table('khoahoc')->where('makh',$makh)->get();
        $date_now = Carbon::now()->toDateString();

        $kh_lq = DB::table('khoahoc')->where('makh','!=',$makh)->where('lichkhaigiang','>=',$date_now)->orderBy('lichkhaigiang','DESC')->get();
        $all_daotao = DB::table('daotao')->get();
       return view('userpages.khoahoc_chitiet',compact('ctkh','kh_lq','all_daotao'));

    }
    public function add_khoahoc($makh)
    {

        $matk = Session::get('matk_user');
        if($matk == null){

            return redirect('/dangnhap');
        }
        else{

            $data_hv = DB::table('hocvien')->where('matk',$matk)->get();
            $mahv = $data_hv[0]->mahv;
            $data_dk = DB::table('dangky')->where('makh',$makh)->where('mahv',$mahv)->first();
            $data_kh = DB::table('khoahoc')->where('makh',$makh)->get();
            $lichkg = $data_kh[0]->lichkhaigiang;
            $date_now = Carbon::now()->toDateString();
            if($lichkg > $date_now){

                if(empty($data_dk)){
                    $data = array();

                    $data['mahv'] = $mahv;
                    $data['makh'] = $makh;
                    $data['ngaydk'] = $date_now;
                    DB::table('dangky')->insert($data);

                    $to_name = "SHTP Training";
                    $to_email = "vietvuit98@gmail.com" ;

                    $data = array("name"=>"SHTP Training","body"=>"????ng k?? kh??a h???c");

                    FacadesMail::send('userpages.bodymail',$data, function ($message) use($to_name,$to_email) {
                        $message->from($to_email, $to_name);
                        $message->to($to_email)->subject('C???m ??n H???c vi??n ???? ????ng k?? kho?? h???c n??y');

                    });
                    return redirect()->back()->with('thanhcong',"C???m ??n b???n ???? ????ng k?? kho?? h???c n??y");

                }
                else{



                    return redirect()->back()->with('da_dk','B???n ???? ????ng k?? kho?? h???c n??y r???i !');

                }


            }
            else{
                    return redirect()->back()->with('hethan',"Kho?? h???c n??y ???? h???t h???n ????ng k??");

           }

        }
    }
    public function timkiem(Request $request)
    {
        $txtTimkiem = $request->txtTimkiem;
        $all_daotao = DB::table('daotao')->get();
        $date_now = Carbon::now()->toDateString();
        $all_khoahoc = DB::table('khoahoc')->where('tenkh','like','%'.$txtTimkiem.'%')->where('lichkhaigiang','>=',$date_now)->orderBy('lichkhaigiang','DESC')->get();
        return view('userpages.khoahoc')->with('all_kh',$all_khoahoc)->with('all_daotao',$all_daotao);
    }


}
