<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\NewsType;
use JWTAuth;
use Illuminate\Http\Response;
use App\User;
use Hash;
use Mail;
use Validator;
use App\ForgetPassword;
use App\CancerList;
use App\CancerDetail;
use App\CancerDetailType;
use App\CancerDetailSite;
use App\CancerDetailDiagnosis;
use App\CancerDetailPathology;
use App\CancerType;
use App\JournalCatelogy;
use App\JournalMedicateLevel;
use App\JournalMedication;
use App\JournalPersonal;
use App\JournalSymptomLevel;
use App\JournalSymtom;
use App\JournalSymtomCatelogy;
use App\TreatmentDetail;
use App\TreatmentList;
use App\TreatmentType;
use App\YourCancer;

class ApiController extends Controller
{

	public function getNews(){
    	/*$news = NewsType::with(['News'=>function($query){
    		$query->take(10);
    	}])->get();
    	return $news->getCollection();*/
    	$news = News::orderBy('id','DESC')->paginate(10);
    	return $news->getCollection();
    }

    public function getDetailNews(Request $request){
        $news = News::where('id',$request->id)->first();
        return $news;
    }

    public function getNewsByType(Request $request){
        $news = News::where('id_type',$request->id_type)->with('NewsType')->orderBy('id','DESC')->paginate(10);
        return $news->getCollection();
    }


    public function getAuthenticatedUser(Request $request)
    {
        // $messages = [
        //     'required' => ':attribute không được rỗng.',
        //     'email' => 'Không đúng định dạng email',
        //     'unique' => 'Email đã được sử dụng',
        //     'min' => ':attribute ít nhất :min kí tự',
        //     'max' => ':attribute không quá :max kí tự',
        // ];
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'email|required|unique:users,email',
            'password'=>'required|min:6|max:30'
        ],[
            'name.required' => 'Vui lòng nhập tên',
            'email.required'=>'Vui lòng nhập email',
            'email.email' => 'Email chưa đúng định dạng',
            'email.unique' => "Email đã được sử dụng",
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Password ít nhất 6 kí tự',
            'password.max' => 'Password không quá 30 kí tự'
        ]);

        if ($validator->fails()) {
            return $errors = $validator->errors();
        }


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return json_encode(['thanhcong'=>'Thanh cong']);
    }


    public function login(Request $request, Response $res){
        
       // $credentials = array('email'=>$request->email,'password'=>$request->password);
        $credentials = $request->only('email',"password");
        $user = User::where([
            ['email','=',$credentials['email']]
        ])->first();
        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return json_encode(['error'=>'Sai thong tin dang nhap']);
            }
        }
        catch(Exception $e){
            return  json_encode(['error'=>'Error']);
        }
        return json_encode(['token'=>$token,"user"=>$user->name]);
       
    }
    //parse token to user
    //JWTAuth::parseToken()->toUser();
    // bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE1LCJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2NhbmNlcmFpZFwvYXBpXC9sb2dpbiIsImlhdCI6MTQ5MjY3ODI1OCwiZXhwIjoxNDkyNjgxODU4LCJuYmYiOjE0OTI2NzgyNTgsImp0aSI6IkZRa2lBYlFCdUp0RThGSVUifQ.qxH4m6-tfR3N63TnHjB5LWpSBKLw9rnAF_uzxCe3jVg



    public function checkLogin(Request $request){
        try{

            $token = JWTAuth::getToken();
            if(!$token){
                return json_encode(['error'=>'Error']);
            }
            else{
                $refreshToken = JWTAuth::refresh($token);
                return json_encode(['token'=>$refreshToken]);
            }
        }
        catch(Exception $e){
            return json_encode(['error'=>'TOKEN_KHONG_HOP_LE']);
        }
    }

    public function forgetPassword(request $request){
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return json_encode(['error'=>'Khong ton tai email']);
        }

        else{
            $passcode = rand(100000,999999);
            $data = ['passcode'=>$passcode,'user'=>$user];
            Mail::send('page_api.forget_password', $data, function ($message) use ($user)
            {
                $message->from($this->mailInfo['from_email'], $this->mailInfo['from_name']);
                $message->to($user->email,$user->name);
                $message->subject('Reset Password');
            });

            $resetPassword = new ForgetPassword();
            $resetPassword->id_user = $user->id;
            $resetPassword->passcode = $passcode;
            $resetPassword->save();

            $user->passcode = $passcode;
            $user->save();
            return json_encode(['success'=>'Please check mail to reset your password']);
        }
    }
        
        
    public function resetPassword(Request $request){
        // $user = JWTAuth::parseToken()->toUser();
        // if($user){
        //     $user->password = Hash::make($request->password);
        //     $user->save();
        //     return json_encode(['success'=>'Cap nhat thanh cong']);
        // }
        // else{
        //     json_encode(['error'=>'Sai thong tin']);
        // }
        $validator = Validator::make($request->all(), [
            'passcode'=>'required',
            'email'=>'email|required',
            'password'=>'required|min:6|max:30'
        ],[
            'passcode.required' => 'Vui lòng nhập passcode',
            'email.required'=>'Vui lòng nhập email',
            'email.email' => 'Email chưa đúng định dạng',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Password ít nhất 6 kí tự',
            'password.max' => 'Password không quá 30 kí tự'
        ]);

        if ($validator->fails()) {
            return $errors = $validator->errors();
        }
        $user = User::where('email',$request->email)->first();

        if(!$user){
            return json_encode(['error'=>'Khong ton tai email']);
        }
        else{
            $passcode = User::where([
                ['id','=',$user->id],
                ['passcode','=',$request->passcode]
            ])->first();
            if(!$passcode){
                return json_encode(['error'=>'Passcode khong dung']);
            }
            else{
                $user->password = Hash::make($request->password);
                $user->save();
                return json_encode(['success'=>'Cap nhat thanh cong']);
            
            }
        }
            
    }


    public function getUpdateInfo(){
        return view('page_api.test_update_avatar_user');
    }
    public function postUpdateInfo(Request $req){
        
        if($req->hasFile('avatar'))
        {
            
            $image = $req->file('avatar');
            if($image->getSize() > 1024*1000){ //1mb
                return json_encode(['error'=>'kích thước file quá lớn']);
            }
            $check = 1;
            $file_type = array('jpg','png','gif');
            $type = $image->getClientOriginalExtension();
            foreach($file_type as $t){
                if($type == $t){
                    $check = $check+1;
                }
            }
            if($check > 1){
              $filename = $image->getClientOriginalName();
              $name = explode('.',$filename);
              $filename  =  $name[0].'-'.time() . '.' . $image->getClientOriginalExtension();
              $image->move('source/img/user/profile',$filename);
              $user->avatar = url('/').'source/img/user/profile/'.$filename;
            }
            else{
                return json_encode(['error'=>'File không đúng định dạng']);
            }
            $user->save();
            return json_encode(['success'=>'Cập nhật thành công']);
        }
    }

    public function getAllCancerType(){
        $type = CancerType::all();
        return $type;
    }
    public function getListCancer(Request $request){
        $cancer_list = CancerList::where('id_user',$request->id_user)
                        ->with('CancerType')
                        ->get();
        return $cancer_list;
    }

    public function getDetailTypeListCancer(Request $request){
        $type = CancerDetailType::where("id_cancer_type",$request->id_cancer_type)->first();
        return $type;
    }

    public function getDetailSiteListCancer(Request $request){
        $site = CancerDetailSite::where([
            ['id_user','=',$request->id_user],
            ['id_cancer_type','=',$request->id_cancer_type]
        ])->first();
        return $site;
    }

    public function getDetailDiagnosisListCancer(Request $request){
        $diagnosis = CancerDetailDiagnosis::where([
            ['id_user','=',$request->id_user],
            ['id_cancer_type','=',$request->id_cancer_type]
        ])->first();
        return $diagnosis;
    }

    public function getDetailPathologyListCancer(Request $request){
        $pathology = CancerDetailPathology::where([
            ['id_user','=',$request->id_user],
            ['id_cancer_type','=',$request->id_cancer_type]
        ])->first();
        return $pathology;
    }

    public function addCancer(Request $req){
        $user = User::find($req->id_user);
        $cancer_type = CancerType::find($req->id_cancer_type);
        if($user && $cancer_type){
            $cancer =  new CancerList;
            $cancer->id_user = $req->id_user;
            $cancer->id_cancer_type = $req->id_cancer_type;
            $cancer->save();
            return json_encode(['success'=>'Thêm thành công']);
        }
        else{
            return json_encode(['erroe'=>'Thêm thất bại']);
        }
        
    }
}
