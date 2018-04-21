<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialProvider;
use Auth;
use App\User;
use Socialite;

class PageController extends Controller
{
	public function redirectToProvider($providers){
        return Socialite::driver($providers)->redirect();
    }


    public function handleProviderCallback($providers){
      try{
          $socialUser = Socialite::driver($providers)->user();
          return $socialUser;//->getEmail();
      }
      catch(\Exception $e){
      	return $e;
         return redirect()->route('trangchu')->with(['flash_level'=>'danger','flash_message'=>"Đăng nhập không thành công"]);
      }
      $socialProvider = SocialProvider::where('provider_id',$socialUser->getId())->first();
      if(!$socialProvider){
          //tạo mới
          $user = User::where('email',$socialUser->getEmail())->first();
          if($user){
            return redirect()->route('trangchu')->with(['flash_level'=>'danger','flash_message'=>"Email đã có người sử dụng"]);
          }
          else{
            $user = new User();
            $user->email = $socialUser->getEmail();
            $user->full_name = $socialUser->getName();
            //if($providers == 'google'){
              $image = explode('?',$socialUser->getAvatar());
              $user->avatar = $image[0];
           // }
           // $user->avatar = $socialUser->getAvatar();
            $user->save();
          }
          $provider = new SocialProvider();
          $provider->provider_id = $socialUser->getId();
          $provider->provider = $providers;
          $provider->email = $socialUser->getEmail();
          $provider->save();
      }
      else{
          $user = User::where('email',$socialUser->getEmail())->first();
      }
      Auth()->login($user);
      return redirect()->route('trangchu')->with(['flash_level'=>'success','flash_message'=>"Đăng nhập thành công"]);
    }
  	public function getIndex(){
    	return view('page.trangchu');
  	}

  	public function getAddCancerDetail(){
  		return view('page.cancer_detail_add');
  	}
}
