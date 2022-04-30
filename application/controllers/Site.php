<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

error_reporting(1);
ini_set('display_errors', 1);
class Site extends CI_Controller {
	
	
	public  function __construct(){
        parent:: __construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->library('encrypt');
		$this->load->model('site_model','SITEDBAPI');
		date_default_timezone_set("Asia/Kolkata");
    }
	 
	
	public function logout(){	
		$this->session->sess_destroy();		
		redirect();
	}
	
	public function index(){
		
		$user_msisdn='';
		if(isset($_GET['number']) && !empty($_GET['number'])){
			if($_GET['number'] != 'UNKNOWN' && $_GET['number'] != 'unknown' ){
				$phone = $_GET['number'];
				$otp = rand(111111, 999999);
				
				//check phone already registered or not
				$rsPhone = $this->SITEDBAPI->checkRegisteredPhone($phone); 
				if($rsPhone['rows'] == 0){
					
					$userData['user_id'] = 'unknown';
					$userData['user_logged_in'] = true;
					$this->session->set_userdata($userData);
					redirect('Home');
					
				} else {
					
					$rowUser = $rsPhone['result'];
					//print_r($rowUser);
					$userId = $rowUser['user_id'];
					
					$userInfo = $this->SITEDBAPI->getUserInformation($userId);
					$userData['user_id'] = $userInfo['user_id'];
					$userData['user_phone'] = $userInfo['user_phone'];
					$userData['user_img'] = $userInfo['user_img'];
					$userData['user_logged_in'] = true;
					$this->session->set_userdata($userData);
					redirect('Home');
					
				}
			
			} else {
				$userData['user_id'] = 'unknown';
				$userData['user_logged_in'] = true;
				$this->session->set_userdata($userData);
				redirect('Home');
			}
			
		} else {
			

			//	$url = "http://jazzgame.igpl.pro/home/GetMDN?source=".base_url();
			// header("Location: $url");
			
			$userData['user_id'] = 'unknown';
				$userData['user_logged_in'] = true;
				$this->session->set_userdata($userData);
				redirect('Home');
		}
	}
	
	public function index__1(){
		$user_msisdn='';
		if(isset($_GET['number']) && !empty($_GET['number'])){
			if($_GET['number'] != 'UNKNOWN' && $_GET['number'] != 'unknown' ){
				$phone = $_GET['number'];
				$otp = rand(111111, 999999);
				
				//check phone already registered or not
				$rsPhone = $this->SITEDBAPI->checkRegisteredPhone($phone); 
				if($rsPhone['rows'] == 0){
					/*
					$img = base_url()."uploads/site_users/default.png";
					
					//Call function to add new user in db
					$userId = $this->SITEDBAPI->addNewUser($phone, $otp, $img);
					
					$otpResponse = $this->sendOTPPhone($phone, $otp);
					if($otpResponse == 'success'){
						redirect('confirmLogin/?msg=success&data='.base64_encode($otp)."&accessId=".$userId);
					
					} else {				
						$this->session->set_flashdata('error', 'Unable to send OTP on the specified mobile number. <br>Please ente a valid mobile number.');
						redirect('Login');
					}
					*/
					redirect('Login/?number='.$phone);
					
					
				} else {
					
					$rowUser = $rsPhone['result'];
					//print_r($rowUser);
					$userId = $rowUser['user_id'];
					$userStatus = $rowUser['user_status']; // 0=OTPSent  1=Active  2=Deleted
					if($userStatus == 1){
						
						$userInfo = $this->SITEDBAPI->getUserInformation($userId);
						$userData['user_id'] = $userInfo['user_id'];
						$userData['user_phone'] = $userInfo['user_phone'];
						$userData['user_img'] = $userInfo['user_img'];
						$userData['user_logged_in'] = true;
						$this->session->set_userdata($userData);
						redirect('Home');
					
					} else {
						if($this->SITEDBAPI->updateUserLoginOTP($userId, $otp)){
						
							$otpResponse = $this->sendOTPPhone($phone, $otp);
							if($otpResponse == 'success'){
								redirect("confirmLogin/?msg=success&accessId=".$userId);
							
							} else {
								$this->session->set_flashdata('error', 'Unable to send OTP on the specified mobile number. <br>Please enter a valid mobile number.');
								redirect('Login');
							}
						} else {
							$this->session->set_flashdata('error', 'Unable to update OTP on the specified mobile number. <br>Please enter a valid mobile number.');
							redirect('Login');
						}
					}
				}
			
			} else {
				$data['profileImages'] = $this->SITEDBAPI->getProfileImages();
				$this->load->view('site/login', $data);
			}
			
		} else {
			// header("Location: http://jazzgame.igpl.pro/home/GetMDN?source=https://gamenow.com.pk/login.php");
			 $url = "http://jazzgame.igpl.pro/home/GetMDN?source=".base_url();
			 header("Location: $url");
		}
	}
	
	public function login(){
		$user_msisdn='';
		if(isset($_GET['number']) && !empty($_GET['number'])){
			if($_GET['number'] != 'UNKNOWN' && $_GET['number'] != 'unknown' )
				$user_msisdn = 	$_GET['number'];
		} 
		
		$data['profileImages'] = $this->SITEDBAPI->getProfileImages();
		$data['user_msisdn'] = $user_msisdn;
		$this->load->view('site/login', $data);
	}
	
	
	public function liveFeed(){	
		//$data['upFeed'] = 1;
		//$this->load->view('site/live_feed');
		
		//update live feed data
		$liveFeed = $this->db->query("SELECT * FROM tbl_live_feed_data where id = '1'")->row_array();
		echo "<pre>";
		print_r($liveFeed);
		echo "</pre>";
				
		
	}
	
	
	
	public function processLogin__1(){
		$phone = $_POST['phone'];
		$profile_image = $_POST['profile_login_image'];
		$otp = rand(111111, 999999);
		
		//check phone already registered or not
		$rsPhone = $this->SITEDBAPI->checkRegisteredPhone($phone); 
		if($rsPhone['rows'] == 0){
			
			$img = base_url()."uploads/site_users/".$profile_image.".png";
			
			//Call function to add new user in db
			$userId = $this->SITEDBAPI->addNewUser($phone, $otp, $img);
			
			$otpResponse = $this->sendOTPPhone($phone, $otp);
			if($otpResponse == 'success'){
				redirect('confirmLogin/?msg=success&data='.base64_encode($otp)."&accessId=".$userId);
			
			} else {				
				$this->session->set_flashdata('error', 'Unable to send OTP on the specified mobile number. <br>Please ente a valid mobile number.');
				redirect('Login');
			}
			
		} else {
			
			$rowUser = $rsPhone['result'];
			//print_r($rowUser);
			$userId = $rowUser['user_id'];
			$userStatus = $rowUser['user_status']; // 0=OTPSent  1=Active  2=Deleted
			
			// update user profile image
			$img = base_url()."uploads/site_users/".$profile_image.".png";
			$updateImage['user_img'] = $img;
			$this->db->where('user_id', $userId);
			$this->db->update('users', $updateImage);
			
			
			if($userStatus == 1){				
				$userInfo = $this->SITEDBAPI->getUserInformation($userId);
				$userData['user_id'] = $userInfo['user_id'];
				$userData['user_phone'] = $userInfo['user_phone'];
				$userData['user_img'] = $userInfo['user_img'];
				$userData['user_logged_in'] = true;
				$this->session->set_userdata($userData);
				redirect('Home');
			
			} else {
				if($this->SITEDBAPI->updateUserLoginOTP($userId, $otp)){
				
					$otpResponse = $this->sendOTPPhone($phone, $otp);
					if($otpResponse == 'success'){
						redirect("confirmLogin/?msg=success&accessId=".$userId);
					
					} else {
						$this->session->set_flashdata('error', 'Unable to send OTP on the specified mobile number. <br>Please enter a valid mobile number.');
						redirect('Login');
					}
				} else {
					$this->session->set_flashdata('error', 'Unable to update OTP on the specified mobile number. <br>Please enter a valid mobile number.');
					redirect('Login');
				}
			}
		}
	}
	

	public function processLogin(){
		$phone = $_POST['phone'];
		$profile_image = $_POST['profile_login_image'];
		$otp = rand(111111, 999999);
		
		//check phone already registered or not
		$rsPhone = $this->SITEDBAPI->checkRegisteredPhone($phone); 
		if($rsPhone['rows'] == 0){
			
			$img = base_url()."uploads/site_users/".$profile_image.".png";
			
			//Call function to add new user in db
			$userId = $this->SITEDBAPI->addNewUser($phone, $otp, $img);
			
			$otpResponse = $this->sendOTPPhone($phone, $otp);
			if($otpResponse == 'success'){
				redirect('confirmLogin/?msg=success&data='.base64_encode($otp)."&accessId=".$userId);
			
			} else {				
				$this->session->set_flashdata('error', 'Unable to send OTP on the specified mobile number. <br>Please ente a valid mobile number.');
				redirect('Login');
			}
			
		} else {
			
			$rowUser = $rsPhone['result'];
			//print_r($rowUser);
			$userId = $rowUser['user_id'];
			$userStatus = $rowUser['user_status']; // 0=OTPSent  1=Active  2=Deleted
			
			// update user profile image
			$img = base_url()."uploads/site_users/".$profile_image.".png";
			$updateImage['user_img'] = $img;
			$this->db->where('user_id', $userId);
			$this->db->update('users', $updateImage);
							
			$userInfo = $this->SITEDBAPI->getUserInformation($userId);
			$userData['user_id'] = $userInfo['user_id'];
			$userData['user_phone'] = $userInfo['user_phone'];
			$userData['user_img'] = $userInfo['user_img'];
			$userData['user_logged_in'] = true;
			$this->session->set_userdata($userData);
			redirect('Home');
			
		}
	}
	

	function sendOTPPhone($phone, $otp){
	
		$phone = "+92".$phone;
		$msg = urlencode("Dear user, your one time password for the mobile verification is {$otp} for Gamenow services.");
/*

		//$url = "http://68.168.100.106:15019/cgi-bin/sendsms?username=username&password=pwd^323&to=".$phone."&text=".$msg."&dlr-ma";
		$url = "http://192.168.11.109/JAZZ/SendSMSAPI.php?msisdn=".$phone."&message=".$msg;

		$cURLConnection = curl_init();

		curl_setopt($cURLConnection, CURLOPT_URL, $url);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($cURLConnection);
		curl_close($cURLConnection);

		$response = json_decode($response);

		//print_r($response);
		
		
		*/
		
		
		return "success";
		
	}
	
		
	public function confirmLogin(){
	
		if(!empty($_GET['msg']) && !empty($_GET['accessId']) ){
			
			$user_id = $_GET['accessId'];
			$msg = $_GET['msg'];
			
			if($msg == 'success'){
				$dataArray['user_id'] = $user_id;
				$dataArray['userInfo'] = $this->SITEDBAPI->getUserInformation($_GET['accessId']);
				$this->load->view('site/confirm_login', $dataArray);
				
			} else if($msg == 'error'){
				$dataArray['user_id'] = $user_id;
				$dataArray['userInfo'] = $this->SITEDBAPI->getUserInformation($_GET['accessId']);
				
				$this->load->view('site/confirm_login', $dataArray);
				
			} else {
				redirect('Login');
			}
		}  else {
			redirect('Login');
		}
	}
		
	public function processLoginOTP($user_id){
	
		if( !empty($user_id)){
			$user_id = base64_decode($user_id);
			$userInfo = $this->SITEDBAPI->getUserInformation($user_id);
			$otp = $userInfo['user_otp'];
			$confirm_otp = $_POST['confirm_otp'];
			
			if($confirm_otp == $otp){
				
				//update user status 1=active in db
				$updateStatus['user_status'] = '1';
				$this->db->where('user_id', $user_id);
				$this->db->update('users', $updateStatus);
				
				// save session and redirect to home
				$userData['user_id'] = $userInfo['user_id'];
				$userData['user_phone'] = $userInfo['user_phone'];
				$userData['user_img'] = $userInfo['user_img'];
				$userData['user_logged_in'] = true;
				$this->session->set_userdata($userData);
				redirect('Home');
				
			} else {
				$this->session->set_flashdata('error', 'Invalid OTP entered. Please enter a valid OTP received on your moble number.');
				
				redirect("confirmLogin/?msg=error&accessId=".$user_id);
			}
			
		}  else {
			redirect('Login');
		}
		
	}
	
	
	public function home__1()	{
		if($this->session->userdata('user_logged_in')){
			$data['heroBanners'] = $this->SITEDBAPI->getPublishedHeroBanners($limit=6);
			$data['pageBanners'] = $this->SITEDBAPI->getPublishedPageBanners($limit=6);
		//	$data['pageBannersGIF'] = $this->SITEDBAPI->getPublishedPageBannersGIF($limit=3);
			
			$freeGamesBanners = $this->SITEDBAPI->getPublishedFreeGames($limit=30);
			$data['freeGamesBanners'] = array_chunk($freeGamesBanners, 3, true);
			
			$miniGamesBanners = $this->SITEDBAPI->getPublishedMiniGames($limit=30);
			$data['miniGamesBanners'] = array_chunk($miniGamesBanners, 5, true);
			
			$data['tournamentGamesBanners'] = $this->SITEDBAPI->getPublishedTournamentGames($limit=50);
			$data['fullTournamentGamesBanners'] = $this->SITEDBAPI->getPublishedFullTournamentGames($limit=50);
			$data['popularGamesBanners'] = $this->SITEDBAPI->getPublishedPopularGames($limit=50);
			$data['mostlyPlayedGamesBanners'] = $this->SITEDBAPI->getPublishedMostlyPlayedGames($limit=10);
			
			$data['topChartGames'] = $this->SITEDBAPI->getPublishedTopChartGames($limit=100);
			
			$this->load->view('site/homepage', $data);
		} else {
			redirect();
		}
		
	}
	
	public function home()	{
		if($this->session->userdata('user_logged_in')){
			
			//update live feed data
			$liveFeed = $this->db->query("SELECT feed_count FROM tbl_live_feed_data where id = '1'")->row_array();
			$upData['feed_count'] = $liveFeed['feed_count']+1;
			$upData['last_updated'] = gmdate('Y-m-d H:i:s');
			$this->db->where('id','1');
			$this->db->update('tbl_live_feed_data',$upData);
                        
                        $published_banners = $this->SITEDBAPI->getPublishedBanners();
                        
                        $i=0;
                        $data['heroBanners'] = array_filter($published_banners, function($item) use($i) {
                            if($i < 15) {
                                return $item['img_type'] == '1';
                            }
                            $i++;
                        });
                        
                        $i=0;
                        $data['pageBanners'] = array_filter($published_banners, function($item) use($i) {
                            if($i < 15) {
                                return $item['img_type'] == '2';
                            }
                            $i++;
                        });
                        
                        
                        $published_tournament_banners = $this->SITEDBAPI->getPublishedTournamentsBanners();
                        
                        $i=0;
                        $data['tournamentGamesBanners'] = array_filter($published_tournament_banners, function($item) use($i) {
                            if($i < 5) {
                                return $item['tour_img_type'] == '1';
                            }
                            $i++;
                        });
                        
                        $i=0;
                        $data['tournamentGamesThumbs'] = array_filter($published_tournament_banners, function($item) use($i) {
                            if($i < 10) {
                                return $item['tour_img_type'] == '2';
                            }
                            $i++;
                        });
                        
                        $games = $this->SITEDBAPI->getGamesList();
                        
                        $i=0;
                        $data['freeGamesBanners'] = array_filter($games, function($item) use($i) {
                            if($i < 30) {
                                return ($item['game_status'] == '2' && $item['img_type'] == '6' && $item['game_free_to_play'] == '1');
                            }
                            $i++;
                        });
                        
                        $data['freeGamesBanners'] = array_chunk($freeGamesBanners, 3, true);
                        
                        $i=0;
                        $data['miniGamesBanners'] = array_filter($games, function($item) use($i) {
                            if($i < 30) {
                                return ($item['game_status'] == '2' && $item['img_type'] == '5' && $item['game_mini_games'] == '1');
                            }
                            $i++;
                        });
                        
                        $data['miniGamesBanners'] = array_chunk($miniGamesBanners, 5, true);
                        
                        
                        $i=0;
                        $data['tournamentGamesSpec'] = array_filter($games, function($item) use($i) {
                            if($i < 50) {
                                return ($item['game_status'] == '2' && $item['img_type'] == '7' && $item['game_tournament'] == '1');
                            }
                            $i++;
                        });
                        
                        $i=0;
                        $data['fullTournamentGamesBanners'] = array_filter($games, function($item) use($i) {
                            if($i < 50) {
                                return ($item['game_status'] == '2' && $item['img_type'] == '2' && $item['game_tournament'] == '1');
                            }
                            $i++;
                        });
                        
                        $i=0;
                        $data['popularGamesBanners'] = array_filter($games, function($item) use($i) {
                            if($i < 50) {
                                return ($item['game_status'] == '2' && $item['img_type'] == '3' && $item['game_popular'] == '1');
                            }
                            $i++;
                        });
                        
                        $i=0;
                        $data['mostlyPlayedGamesBanners'] = array_filter($games, function($item) use($i) {
                            if($i < 10) {
                                return ($item['game_status'] == '2' && $item['img_type'] == '3' && $item['game_most_played'] == '1');
                            }
                            $i++;
                        });
                        
                        $i=0;
                        $data['topChartGames'] = array_filter($games, function($item) use($i) {
                            if($i < 100) {
                                return ($item['game_status'] == '2' && $item['img_type'] == '5' && $item['game_top_chart'] == '1');
                            }
                            $i++;
                        });
                        
		
		
			//$data['heroBanners'] = $this->SITEDBAPI->getPublishedHeroBanners($limit=15);
			//$data['pageBanners'] = $this->SITEDBAPI->getPublishedPageBanners($limit=15);
                        //$data['pageBannersGIF'] = $this->SITEDBAPI->getPublishedPageBannersGIF($limit=3);
			
			//$freeGamesBanners = $this->SITEDBAPI->getPublishedFreeGames($limit=30);
			//$data['freeGamesBanners'] = array_chunk($freeGamesBanners, 3, true);
			
			//$miniGamesBanners = $this->SITEDBAPI->getPublishedMiniGames($limit=30);
			//$data['miniGamesBanners'] = array_chunk($miniGamesBanners, 5, true);
			
			//$data['tournamentGamesSpec'] = $this->SITEDBAPI->getPublishedTournamentGames($limit=50);
			//$data['tournamentGamesBanners'] = $this->SITEDBAPI->getPublishedTournamentsBanners($type=1, $limit=5);
			//$data['tournamentGamesThumbs'] = $this->SITEDBAPI->getPublishedTournamentsBanners($type=2, $limit=10);
			
			
			//$data['fullTournamentGamesBanners'] = $this->SITEDBAPI->getPublishedFullTournamentGames($limit=50);
			//$data['popularGamesBanners'] = $this->SITEDBAPI->getPublishedPopularGames($limit=50);
			//$data['mostlyPlayedGamesBanners'] = $this->SITEDBAPI->getPublishedMostlyPlayedGames($limit=10);
			
			//$data['topChartGames'] = $this->SITEDBAPI->getPublishedTopChartGames($limit=100);
			
			$this->load->view('site/homepage', $data);
		} else {
			redirect();
		}
		
	}
	

	public function chooseLoginProfileImage(){
		$data['profileImages'] = $this->SITEDBAPI->getProfileImages();
		$this->load->view('site/user_login_profile_images', $data);
	}

	public function chooseProfileImage(){
		$user_id = $this->session->userdata('user_id');
		if(!empty($user_id)){
			
			$data['profileImages'] = $this->SITEDBAPI->getProfileImages();
			$this->load->view('site/user_profile_images', $data);	
			
		} else {
			$this->session->set_flashdata("error","We're unable to identify your account. Please go back and login again.");
			redirect('Login');
		} 
		
	}

	public function setUserProfileImage(){
		$user_id = $this->session->userdata('user_id');
		if(!empty($user_id)){
			$imgId = $_POST['imgId'];
			$imgId = ($imgId);
			$dataUser['user_img'] = base_url()."uploads/site_users/".$imgId.".png";
		
			$this->db->where('user_id', $user_id);
			if($this->db->update('users', $dataUser)){
				
				$user_img = $dataUser['user_img'];
				$this->session->set_userdata('user_img', $user_img);
				
				echo $user_img;
			} else {
				echo "failed";
			}
			
		} else {
			$this->session->set_flashdata("error","We're unable to identify your account. Please go back and login again.");
			redirect('Login');
		} 
		
	}


}
