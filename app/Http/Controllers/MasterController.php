<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Response;
use App\User;
use App\QuizLog;
use Hash;
use App\Employee;
use App\Announcement;

class MasterController extends Controller
{
    public function index(){
        return view('home');
    }

    public function corona(){
        return view('kuisioner_corona');
    }

    public function auth(Request $request){

        $user = $request->get('username');
        $pass = $request->get('password');

        $asd = Hash::check('dd', bcrypt($pass));

	        // if ($asd == true) {
	        // 	$asd = 'aw';
	        // }
	        // else{
	        // 	$asd = '412';
	        // }

	        // var_dump($asd);die();

	        $login = User::where('username','=', $user)
	        ->first();

	        if ($login == null) {
	          return 'username atau password salah';

	      } else{
	          if ($login == true) {
	           return view('kuisioner');
	       }
	       else{
	           return 'password salah';
	       }

   		}

	}

	public function checkEmployeeId(Request $request)
	{
	    try {
	        $cek = db::select("SELECT
			    employee_id,
			    name,
			    department,
                password
			FROM
			    `employees` 
			WHERE
		    `employee_id` = '".$request->get('employee_id')."' and
            `password` = '".$request->get('password')."' 
            and role = 'ADMIN'
		    AND `end_date` IS NULL");

	        if(count($cek) > 0){
	            $response = array(
    	            'status' => true,
    	            'data' => $cek
    	        );
    	        return Response::json($response);
	        }else{
	            $response = array(
    	            'status' => false,
    	            'message' => "Anda Tidak Memiliki Otoritas"
    	        );
    	        return Response::json($response);
	        }
	    } catch (QueryException $e) {
	        $response = array(
	            'status' => false,
	            'message' => $e->getMessage()
	        );
	        return Response::json($response);
	    }
	}

    public function resetPassword(Request $request)
    {
        try {
            if ($request->get('password') != $request->get('password2')) {
                $response = array(
                    'status' => false,
                );                
            }else{
                $employee = Employee::where('employees.employee_id', '=', $request->get('employee_id'))
                ->first();
                $employee = db::table('employees')->where('employees.employee_id', '=', $request->get('employee_id'))->update([
                    'password' => $request->get('password')
                ]);

                $response = array(
                    'status' => true,
                    'data' => $employee
                );
                return Response::json($response);
            }
        } catch (\Exception $e) {
            $response = array(
                'status' => false,
                'message' => $e->getMessage()
            );
            return Response::json($response);
        }
    }

	public function postForm(Request $request)
    {
        try {

		    	$quiz = $request->get('question');
	         	$answer = $request->get('answer');

		        $jumlah_pertanyaan = $request->get('jumlah_pertanyaan');

		        $loc = $this->getLocation($request->get('latitude'), $request->get('longitude'));

				$loc1 = json_encode($loc);

				$loc2 = explode('\"',$loc1);

				

				$keyStateDistrict = array_search('state_district', $loc2);
				$keyVillage = array_search('village', $loc2);
				$keyState = array_search('state', $loc2);
				$keyPostcode = array_search('postcode', $loc2);
				$keyCountry = array_search('country', $loc2);
				$keyResidential = array_search('residential', $loc2);
				$keyHamlet = array_search('hamlet', $loc2);

				//ketika gak ditemukan				
				if ($loc2[$keyVillage+2] != ":") {
					$village = $loc2[$keyVillage+2];
				}
				
				else if ($loc2[$keyResidential+2] != ":") {
					$village = $loc2[$keyResidential+2];
				}

				else if ($loc2[$keyHamlet+2] != ":") {
					$village = $loc2[$keyHamlet+2];
				}

				else{	
					$village = "";
				}

		        for ($i=0; $i < $jumlah_pertanyaan+1; $i++) { 
		              $forms = QuizLog::create([
		               'question_code' => 'corona-2',
		               'answer_date' => date('Y-m-d'),
		               'employee_id' => $request->get('employee_id'),
		               'name' => $request->get('name'),
		               'department' => $request->get('department'),
		               'question' => $quiz[$i],
		               'answer' => $answer[$i],
                       'latitude' => $request->get('latitude'),
                       'longitude' => $request->get('longitude'),
                       'village' => $village,
                       'city' => $loc2[$keyStateDistrict + 2],
                       'province' => $loc2[$keyState + 2]
		              ]);

		              $forms->save();                  
		        }

		        $response = array(
		            'status' => true,
		            'datas' => 'Berhasil Input Data',
		        );
		        return Response::json($response);

         } catch (QueryException $e){
             $error_code = $e->errorInfo[1];
            	if($error_code == 1062){
              		$response = array(
	                   'status' => false,
	                   'datas' => 'Anda Sudah Mengisi Laporan Untuk Hari ini'
	             	);
	             	return Response::json($response);
            	}
            	else{
              		$response = array(
	                   'status' => false,
	                   'datas' => $e->getMessage()
	             	);
	             	return Response::json($response);
            	}
         }
    }

    public function getLocation($lat, $long){

		$url = "https://locationiq.org/v1/reverse.php?key=29e75d503929a1&lat=".$lat."&lon=".$long."&format=json";
		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		$results = curl_exec($curlHandle);
		curl_close($curlHandle);

		$response = array(
			'status' => true,
			'data' => $results,
		);
		return Response::json($response);
	}

	public function getGrup(Request $request){
		try {

			if(strlen($request->get('employee_id')) > 0){
				$emp = "AND employee_id = '".$request->get('employee_id')."'";
			}
			else{
				$emp = "";
			}

			if(strlen($request->get('kode')) > 0){
				$kode = "AND kode = '".$request->get('kode')."'";
			}
			else{
				$kode = "";
			}

	        $list = db::select("SELECT
			    employee_id,
			    name,
			    tanggal,
			    remark
			FROM
			    `groups` 
			where `groups`.employee_id is not null
				".$emp." ".$kode."
		    ");

	        $response = array(
	            'status' => true,
	            'datas' => $list
	        );
	        return Response::json($response);
	    } 

	    catch (QueryException $e) {
	        $response = array(
	            'status' => false,
	            'message' => $e->getMessage()
	        );
	        return Response::json($response);
	    }

     
	}
	
	public function getEmployee(Request $request){
		try {

			if(strlen($request->get('employee_id')) > 0){
				$emp = "WHERE employee_id = '".$request->get('employee_id')."'";
			}
			else{
				$emp = "";
			}

	        $list = db::select("SELECT
			    employees.employee_id,
			    employees.name,
			    employees.department,
			    employees.section,
			    employees.group as groupes,
			    employees.password,
			    employees.role
			FROM
			    `employees` 
				".$emp."
		    ");

	        $response = array(
	            'status' => true,
	            'datas' => $list
	        );
	        return Response::json($response);
	    } 

	    catch (QueryException $e) {
	        $response = array(
	            'status' => false,
	            'message' => $e->getMessage()
	        );
	        return Response::json($response);
	    }
	}

	public function updateEmp(Request $request)
    {
        try {
            $employee = Employee::where('employees.employee_id', '=', $request->get('employee_id'))
            ->first();
            $employee = db::table('employees')->where('employees.employee_id', '=', $request->get('employee_id'))->update([
                'password' => $request->get('password'),
                'role' => $request->get('role')
            ]);

            $response = array(
                'status' => true,
                'data' => $employee
            );
            return Response::json($response);
        } catch (\Exception $e) {
            $response = array(
                'status' => false,
                'message' => $e->getMessage()
            );
            return Response::json($response);
        }
    }

    public function getPengumuman(Request $request){
		try {
	        $list = db::select("SELECT
			    *
			FROM
			    announcements
			where deleted_at is null
			ORDER BY id desc
		    ");

	        $response = array(
	            'status' => true,
	            'datas' => $list
	        );
	        return Response::json($response);
	    } 

	    catch (QueryException $e) {
	        $response = array(
	            'status' => false,
	            'message' => $e->getMessage()
	        );
	        return Response::json($response);
	    }
	}

	public function addAnnouncement(Request $request)
    {
        try {
        	$tujuan_upload = 'images';
            $file = $request->file('file');
            $filename = md5(date("dmYhisA")).'.'.$file->getClientOriginalExtension();
            $file->move($tujuan_upload,$filename);

            Announcement::create([
                'tanggal' => $request->input('tanggal_pengumuman'),
                'images' => $filename,
                'created_by' => $request->input('nik_pengumuman')
            ]);

            $response = array(
                'status' => true
            );
            return Response::json($response);
        } catch (\Exception $e) {
            $response = array(
                'status' => false,
                'message' => $e->getMessage()
            );
            return Response::json($response);
        }
    }

    public function deleteAnnouncement(Request $request)
    {
        try {
            $ann = Announcement::find($request->get('id'));
            $ann->delete();

            $response = array(
                'status' => true
            );
            return Response::json($response);
        } catch (\Exception $e) {
            $response = array(
                'status' => false,
                'message' => $e->getMessage()
            );
            return Response::json($response);
        }
    }

}
