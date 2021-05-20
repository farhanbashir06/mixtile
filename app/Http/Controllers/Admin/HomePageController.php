<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews=Review::all();
        $data=HomePage::find(1);
        return view('admin.content-managment.homepage',compact('reviews','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if ($id == 1){

            if ($request->file('img1')) {
                $img1=$request->img1->store('public/homepage');
                $pic1=str_replace("public/homepage","storage/homepage",$img1);
            }
            else {
                $pic1=$request->pr_img1;
            }
            if ($request->file('img2')) {
                $img2=$request->img2->store('public/homepage');
                $pic2=str_replace("public/homepage","storage/homepage",$img2);
            }
            else {
                $pic2=$request->pr_img2;
            }
            if ($request->file('img3')) {
                $img3=$request->img3->store('public/homepage');
                $pic3=str_replace("public/homepage","storage/homepage",$img3);
            }
            else {
                $pic3=$request->pr_img3;
            }

            $section1=['h'=>$request->input('heading'),'d'=>$request->input('descr'),'img1'=>$pic1,'img2'=>$pic2,'img3'=>$pic3];

            $columns = [
                'section1' => json_encode($section1),
            ];

            $affected = DB::table('homepages')->where('id','=',1)->update($columns);

        }
        if ($id == 2){

            if ($request->file('img1')) {
                $img1=$request->img1->store('public/homepage');
                $pic1=str_replace("public/homepage","storage/homepage",$img1);
            }
            else {
                $pic1=$request->pr_img1;
            }
            if ($request->file('img2')) {
                $img2=$request->img2->store('public/homepage');
                $pic2=str_replace("public/homepage","storage/homepage",$img2);
            }
            else {
                $pic2=$request->pr_img2;
            }
            if ($request->file('img3')) {
                $img3=$request->img3->store('public/homepage');
                $pic3=str_replace("public/homepage","storage/homepage",$img3);
            }
            else {
                $pic3=$request->pr_img3;
            }

            $section2=['h1'=>$request->input('h1'),'d1'=>$request->input('d1'),'img1'=>$pic1,'h2'=>$request->input('h2'),'d2'=>$request->input('d2'),'img2'=>$pic2,'h3'=>$request->input('h3'),'d3'=>$request->input('d3'),'img3'=>$pic3];

            $columns = [
                'section2' => json_encode($section2),
            ];

            $affected = DB::table('homepages')->where('id','=',1)->update($columns);

        }
        if ($id == 3){

            if ($request->file('img1')) {
                $img1=$request->img1->store('public/homepage');
                $pic1=str_replace("public/homepage","storage/homepage",$img1);
            }
            else {
                $pic1=$request->pr_img1;
            }

            $section3=['h1'=>$request->input('h1'),'d1'=>$request->input('d1'),'img1'=>$pic1];

            $columns = [
                'section3' => json_encode($section3),
            ];

            $affected = DB::table('homepages')->where('id','=',1)->update($columns);

        }
        if ($id == 4){
            foreach ($request->n_r_img as $key=>$img){


                $file1=$img->store('public/review');
                $pic=str_replace("public/review","storage/review",$file1);

                $add = new Review();
                $add->title=$request->n_r_name[$key];
                $add->descr=$request->n_r_words[$key];
                $add->img=$pic;
                $add->year=$request->n_r_year[$key];
                $add->save();
            }


        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function del_single($id)
    {
        $del = Review::find($id)->delete();
        return redirect()->back();
    }

}
