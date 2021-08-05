<?php

namespace App\Http\Controllers;

use App\Models\addetails;
use App\Models\cardetails;
use App\Models\files;
use App\Models\Listings;
use App\Models\vehfeatures;
use App\Models\vehlocation;
//use Illuminate\Foundation\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListingsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //cardetails
        $cardet = new cardetails();
        $cardet->make_model = $request->input('make');
        $cardet->make_year = $request->input('make_year');
        $cardet->mileage = $request->input('mileage');
        $cardet->body_type = $request->input('body_type');
        $cardet->condition_type = $request->input('condition');
        $cardet->transmission = $request->input('transmission');
        $cardet->price = $request->input('price');
        $cardet->duty = $request->input('duty');
        if ($request->has('negotiable')) {
            $cardet->negotiable = true;

        } else {
            $cardet->negotiable = false;

        }

        $cardet->save();
        $carid = $cardet->id;
        //ad details

        $addet = new addetails();
        $addet->fuel_type = $request->input('fuel');
        $addet->interior_type = $request->input('interior');
        $addet->color = $request->input('color');
        $addet->enginesize_cc = $request->input('engine_size');
        $addet->descr = $request->input('descr');
        $addet->save();
        $adid = $addet->id;

        //vehicle location details
        $locdet = new vehlocation();
        $locdet->location = $request->input('location');
        $locdet->save();
        $locid = $locdet->id;

        //listings details
        $listdet = new Listings();
        $listdet->cardetailid = $carid;
        $listdet->adid = $adid;
        $listdet->vehlocationid = $locid;
        $listdet->userid = $request->userid;
        $listdet->save();
        $listid = $listdet->id;

        //vehicle features
        if ($request->has('otherfeatures')) {
            $extfet = $request->input("otherfeatures");
            foreach ($extfet as $extfet) {
                $vehfet = new vehfeatures();
                $vehfet->listingid = $listid;

                $vehfet->feature = $extfet;
                $vehfet->save();
            }}

        //files
        $files = $request->file('file');
        $dt = date('ymdhis');

        if ($request->hasFile('file')) {
            foreach ($files as $file) {
                $filedet = new files();

                $name = $file->getClientOriginalName();
                $fn = pathinfo($name, PATHINFO_FILENAME) . $dt;
                $fe = pathinfo($name, PATHINFO_EXTENSION);

                $filedet->listingid = $listid;

                $filedet->file_name = $fn . '.' . $fe;
                $file->move(public_path() . '/carfiles/', $fn . '.' . $fe);
                $filedet->save();
                //$data[] = $name;

            }
        }
        $vehfeatures = DB::table('allvehfeatures')->get();
        return "success";
        //return back()->with(array('status' => "You have successfully created a listing. <a href='/view-listing?id=$listid'>Click here to check it out</a>", 'vehfeatures' => json_decode($vehfeatures, true)));

    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit2(Request $request)
    {
        //cardetails
        $listid = $request->input('listingid');

        //get ids of affected tables
        $cardetid = DB::table('listings')->where('id', '=', $listid)->value('cardetailid');
        $adid = DB::table('listings')->where('id', '=', $listid)->value('adid');
        $locid = DB::table('listings')->where('id', '=', $listid)->value('vehlocationid');
        //update affected tables

        $cardetaffected = DB::table('cardetails')
            ->where('id', $cardetid)
            ->update(['make_model' => $request->input('make'), 'make_year' => $request->input('make_year'),
                'mileage' => $request->input('mileage'), 'body_type' => $request->input('body_type'),
                'condition_type' => $request->input('condition'), 'transmission' => $request->input('transmission'),
                'price' => $request->input('price'), 'duty' => $request->input('duty')]);
        if ($request->has('negotiable')) {
            $cardetaffected = DB::table('cardetails')
                ->where('id', $cardetid)
                ->update(['negotiable' => true]);

        } else {
            $cardetaffected = DB::table('cardetails')
                ->where('id', $cardetid)
                ->update(['negotiable' => false]);

        }
        //ad details

        $addetaffected = DB::table('addetails')
            ->where('id', $adid)
            ->update(['fuel_type' => $request->input('fuel'), 'interior_type' => $request->input('interior'),
                'color' => $request->input('color'), 'enginesize_cc' => $request->input('engine_size'),
                'descr' => $request->input('descr')]);

        //vehicle location details
        $vehlocaffected = DB::table('vehlocation')
            ->where('id', $locid)
            ->update(['location' => $request->input('location')]);

        //listings details
        $listingaffected = DB::table('listings')
            ->where('id', $listid)
            ->update(['cardetailid' => $cardetid, 'adid' => $adid, 'vehlocationid' => $locid,
                'userid' => $request->userid]);
        //remove old vehicle features
        if ($request->has('otherfeaturesold')) {
            $extfet1 = $request->input("otherfeaturesold");
            DB::table('vehfeatures')->where('listingid', '=', $listid)->delete();
        }

        //add new vehicle features
        if ($request->has('otherfeatures')) {
            $extfet = $request->input("otherfeatures");
            foreach ($extfet as $extfet) {
                $vehfet = new vehfeatures();
                $vehfet->listingid = $listid;

                $vehfet->feature = $extfet;
                $vehfet->save();
            }
        }

        //files
        $files = $request->file('file');
        $dt = date('ymdhis');

        if ($request->hasFile('file')) {
            foreach ($files as $file) {
                $filedet = new files();

                $name = $file->getClientOriginalName();
                $fn = pathinfo($name, PATHINFO_FILENAME) . $dt;
                $fe = pathinfo($name, PATHINFO_EXTENSION);

                $filedet->listingid = $listid;

                $filedet->file_name = $fn . '.' . $fe;
                $file->move(public_path() . '/carfiles/', $fn . '.' . $fe);
                $filedet->save();
                //$data[] = $name;

            }
        }
        $vehfeatures = DB::table('allvehfeatures')->get();
        return "success";
        //return back()->with(array('status' => "You have successfully created a listing. ", 'vehfeatures' => json_decode($vehfeatures, true)));

    }
    public function edit()
    {
        $listingid = $_GET['id'];

        //get select data
        $make = DB::table('make')->get();
        $body = DB::table('body')->get();
        $condition = DB::table('contition')->get();
        $transmission = DB::table('transmission')->get();
        $duty = DB::table('duty')->get();
        $fuel = DB::table('fuel')->get();
        $interior = DB::table('interior')->get();
        $color = DB::table('color')->get();
        $location = DB::table('location')->get();
        $feat = DB::table('vehfeatures')->where('listingid', $listingid)->get();
        $files = DB::table("files")->where('listingid', $listingid)->get();

        $cardetid = DB::table('listings')->where('id', '=', $listingid)->value('cardetailid');
        $adid = DB::table('listings')->where('id', '=', $listingid)->value('adid');
        $locid = DB::table('listings')->where('id', '=', $listingid)->value('vehlocationid');

        $vehfeatures = DB::table('allvehfeatures')->get();
        $cardet = DB::table('cardetails')->where('id', '=', $cardetid)->get();
        $addet = DB::table('addetails')->where('id', '=', $adid)->get();
        $vehloc = DB::table('vehlocation')->where('id', '=', $locid)->get();

        return view('edit')->with(array('status' => "", 'files' => json_decode($files, true), 'feat' => json_decode($feat, true), 'location' => json_decode($location, true), 'fuel' => json_decode($fuel, true), 'color' => json_decode($color, true), 'interior' => json_decode($interior, true), 'transmission' => json_decode($transmission, true), 'duty' => json_decode($duty, true), 'condition' => json_decode($condition, true), 'body' => json_decode($body, true), 'make' => json_decode($make, true), 'cardet' => json_decode($cardet, true), 'addet' => json_decode($addet, true), 'vehloc' => json_decode($vehloc, true), 'vehfeatures' => json_decode($vehfeatures, true)));
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deletepic(Request $request)
    {
        $picid = $request->input('id');
        $filen = DB::table('files')->where('id', $picid)->value('file_name');
        DB::table('files')->where('id', '=', $picid)->delete();
        $image_path = public_path() . '/carfiles/' . $filen;
        unlink($image_path);
        return "success";

    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $listingid = $request->input('id');
        $cardetid = DB::table('listings')->where('id', $listingid)->value('cardetailid');
        $adid = DB::table('listings')->where('id', $listingid)->value('adid');
        $locid = DB::table('listings')->where('id', $listingid)->value('vehlocationid');
        DB::table('files')->where('listingid', '=', $listingid)->delete();
        DB::table('vehfeatures')->where('listingid', '=', $listingid)->delete();
        DB::table('listings')->where('id', '=', $listingid)->delete();
        DB::table('cardetails')->where('id', '=', $cardetid)->delete();
        DB::table('addetails')->where('id', '=', $adid)->delete();
        DB::table('vehlocation')->where('id', '=', $locid)->delete();
        return "success";
    }
    public function new_listing()
    {
        $vehfeatures = DB::table('allvehfeatures')->get();
        //get select data
        $make = DB::table('make')->get();
        $body = DB::table('body')->get();
        $condition = DB::table('contition')->get();
        $transmission = DB::table('transmission')->get();
        $duty = DB::table('duty')->get();
        $fuel = DB::table('fuel')->get();
        $interior = DB::table('interior')->get();
        $color = DB::table('color')->get();
        $location = DB::table('location')->get();

        return view('new_listing')->with(array('make' => json_decode($make, true), 'condition' => json_decode($condition, true), 'body' => json_decode($body, true), 'transmission' => json_decode($transmission, true), 'duty' => json_decode($duty, true), 'fuel' => json_decode($fuel, true), 'color' => json_decode($color, true), 'interior' => json_decode($interior, true), 'location' => json_decode($location, true), 'status' => "", 'vehfeatures' => json_decode($vehfeatures, true)));
    }

    public function show()
    {
        $listings = DB::table('listings')
            ->distinct()
            ->leftJoin('cardetails', function ($join) {
                $join->on('listings.cardetailid', '=', 'cardetails.id');

            })
            ->leftJoin('addetails', function ($join) {
                $join->on('listings.adid', '=', 'addetails.id');

            })
            ->leftJoin('vehlocation', function ($join) {
                $join->on('listings.vehlocationid', '=', 'vehlocation.id');

            })
            ->leftJoin('make', function ($join) {
                $join->on('cardetails.make_model', '=', 'make.id');

            })
            ->leftJoin('transmission', function ($join) {
                $join->on('cardetails.transmission', '=', 'transmission.id');

            })
            ->leftJoin('contition', function ($join) {
                $join->on('cardetails.condition_type', '=', 'contition.id');

            })
            ->where('listings.userid', Auth::user()->id)
            ->get(['listings.id AS id', 'make.make AS make_model', 'cardetails.make_year as make_year', 'contition.contition AS condition_type', 'transmission.transmission AS transmission', 'cardetails.price as price']);

        return view('listings')->with(array('listings' => json_decode($listings, true)));
    }
}