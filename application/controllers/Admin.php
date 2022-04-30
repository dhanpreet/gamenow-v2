<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Admin extends CI_Controller {
	
	
	public  function __construct(){
		parent:: __construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->library('encryption');	
		$this->load->model('admin_model','ADMINDBAPI');
		
		date_default_timezone_set("Asia/Calcutta");
		
    }

	public function index()	{	
		if($this->session->userdata('admin_logged_in'))
			redirect('Admin/Home');
		else{
			$this->load->view('admin/login');
		}
	}
	
	
	public function processLogin(){
		
	 	$username = trim($_POST['username']);
		$password  = trim($_POST['password']);
	
		if(!($username && $password)){
			$this->session->set_flashdata('error',' Username and Password both fields are required.');
			redirect('Admin');
		}	else{
			$status = $this->ADMINDBAPI->getLoginStatus($username,$password);
			
			if(count($status) == 0){
				
				$this->session->set_flashdata('error',' Invalid Username or Password.');
				redirect('Admin');
			} else{
				$profile = $this->ADMINDBAPI->getUserInfo($status['user_id']);
		
				$user_login_data = array(
				   'username'     => $username,
				   'name'     => $status['name'],
				   'access'     => 'Admin',
				   'user_id'      => @$status['user_id'],
				   
			   );
				$user_login_data['admin_logged_in'] = TRUE;					
				$this->session->set_userdata($user_login_data);
				redirect('Admin/Home');		
			}
		}	
	}
	
	
	public function alert(){
		$this->session->sess_destroy();	
		redirect('Admin');			
	}
	
	public function error(){
		//$this->session->sess_destroy();
		//redirect('Admin');	
		$this->load->view('admin/error');	
	}
		
	public function logout(){	
		$this->session->sess_destroy();		
		redirect('Admin');
	}
	
	

	public function home(){
		if($this->session->userdata('admin_logged_in')){
			//$data['allGames'] = $this->ADMINDBAPI->getAllGamesCount();
			//$data['allPublishedGames'] = $this->ADMINDBAPI->getPublishedGamesCount();
			//$data['allTournaments'] = $this->ADMINDBAPI->getTournamentsCount();
		//	$data['liveTournaments'] = $this->ADMINDBAPI->getLiveTournamentsCount();
			
			$this->load->view('admin/dashboard');
		} else{
			$this->session->set_flashdata('error','<strong> Error! </strong> Login to Access Your Account.');
			redirect('Admin');
			
		}
	}
	


	//******************************************************************************************//
	//************************     Update Password Starts         ************************//
	//******************************************************************************************//
	
	public function updatePassword(){
		if($this->session->userdata('admin_logged_in')){
			$user_id = $this->session->userdata('user_id');
			$data['info'] = $this->ADMINDBAPI->getUserInfo($user_id);
			$this->load->view('admin/update_password', $data);
		} else{
			$this->session->set_flashdata('error','<strong> Error! </strong> Login to Access Your Account.');
			redirect('Admin');
			
		}
	}
	
	public function processUpdatePassword(){
		if($this->session->userdata('admin_logged_in')){
			$user_id = $this->session->userdata('user_id');
			
			$info = $this->ADMINDBAPI->getUserInfo($user_id);
		//	print_r($info); die;
			if(is_array($info) && count($info)>0){
				
				$old_password = $_POST['old_password'];
				$new_password = $_POST['new_password'];
				$confirm_password = $_POST['confirm_password'];
				
			if($old_password == $info['password']){
				$this->db->where('user_id', $user_id);
				
				if($new_password == $confirm_password){
				
					$user['password'] = $new_password;
					if($this->db->update('login', $user)){
						$this->session->set_flashdata('success','<strong> Success!</strong>  Profile settings updated successfully.');
						redirect("Admin/UpdatePassword");
					} else {
						$this->session->set_flashdata('error','<strong> Error!</strong>  Something went wrong while updating information. Please try again later.');
						redirect("Admin/UpdatePassword");
					}
				
				} else {
					$this->session->set_flashdata('error',"<strong>Error! </strong> New password and confirm password doesn't match.");
					redirect("Admin/UpdatePassword");
				}
			
			} else {
				$this->session->set_flashdata('error','<strong>Error! </strong> Old password is incorrect.');
				redirect("Admin/UpdatePassword");
			}
				
			} else {
				$this->session->set_flashdata('error','<strong> Error! </strong> Login to Access Your Account.');
				redirect('Admin');
			
			}
		
		} else {
			$this->session->set_flashdata('error','<strong> Error! </strong> Login to Access Your Account.');
			redirect('Admin');
			
		}
		
	}
	
	//******************************************************************************************//
	//************************     Update Password Ends         ************************//
	//******************************************************************************************//
	
	
	
	
	//  **************************************   ***************************** **************************************//
	//  **************************************   Partners  Section Starts **************************************//
	//  **************************************   ***************************** **************************************//
	
	
	
	public function getPartners(){
		if($this->session->userdata('admin_logged_in')){
			$data['list'] = $this->ADMINDBAPI->getPartnersList();
			$this->load->view('admin/partners_list', $data);	
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	
	public function validatePartnerUsername(){
		if($this->session->userdata('admin_logged_in')){
			$username = $_POST['username'];
			$id = @$_POST['id'];
			if(!empty($id))
				$no_rows = $this->ADMINDBAPI->validatePartnerUsername($username, $id);
			else 
				$no_rows = $this->ADMINDBAPI->validatePartnerUsername($username);
			
			if($no_rows){
				echo "error";
			} else {
				echo "success";
			}
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	
	public function processPartner($partner_id =''){
		if($this->session->userdata('admin_logged_in')){
			
			$id = base64_decode($partner_id); 
			foreach($_POST as $key=>$val){
				$data[$key] = $val;
			}	
			
			unset($data['partner_password']);
			
			if(!empty($_POST['partner_password']))
				$data['partner_password'] = password_hash($_POST['partner_password'] , PASSWORD_DEFAULT);
			
			
			if($id){
				
				$no_rows = $this->ADMINDBAPI->validatePartnerUsername($data['partner_username'], $id);
				if($no_rows){
					$this->session->set_flashdata('error','Username already exists with us. Please try again with unique username.');
					redirect("Admin/Partners");
				
				} else {
				
					$data['partner_updated_on'] = time();
					$this->db->where('partner_id', $id);				
					if($this->db->update('partners', $data)){
						$this->session->set_flashdata('success','Partner information updated successfully. ');
						redirect("Admin/Partners");
					} else {
						$this->session->set_flashdata('error','Unable to update partner information. Please try again.');
						redirect("Admin/Partners");
					}
				}				
			} else {
				
				
				$no_rows = $this->ADMINDBAPI->validatePartnerUsername($data['partner_username']);
				if($no_rows){
					$this->session->set_flashdata('error','Username already exists with us. Please try again with unique username.');
					redirect("Admin/Partners");
				
				} else {
					
					$data['partner_added_on'] = time();
					$data['partner_updated_on'] = time();
					
					if($this->db->insert('partners', $data)){
						$this->session->set_flashdata('success','Partner information added successfully. ');
						redirect("Admin/Partners");
					} else {
						$this->session->set_flashdata('error','Unable to add new partner information. Please try again.');
						redirect("Admin/Partners");
					}
				}
			}
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}

	
	public function deletePartner($id){
		if($this->session->userdata('admin_logged_in')){
			$id = base64_decode($id);
			
			// finally remove partner
			$this->db->where('partner_id', $id);
			if($this->db->delete('partners')){
				$this->session->set_flashdata('success','Partner information deleted successfully. ');
				redirect("Admin/Partners");
			} else {
				$this->session->set_flashdata('error','Unable to delete partner information. Please try again.');
				redirect("Admin/Partners");
			}
			
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	
	
	
	
	
	//  **************************************   ***************************** **************************************//
	//  **************************************   Partners  Section Ends **************************************//
	//  **************************************   ***************************** **************************************//
	
		
	
	
	//  **************************************   ***************************** **************************************//
	//  **************************************   Games  Section Starts **************************************//
	//  **************************************   ***************************** **************************************//
	
		
	public function getPartnersGames(){
		if($this->session->userdata('admin_logged_in')){
			$data['list'] = $this->ADMINDBAPI->getPartnersGamesList();
			$this->load->view('admin/games_list', $data);	
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
		
	public function addNewPartnerGame(){
		if($this->session->userdata('admin_logged_in')){
			$data['partners'] = $this->ADMINDBAPI->getPartnersList();
			$this->load->view('admin/games_add', $data);	
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	public function updateNewPartnerGame($game_id){
		
		if($this->session->userdata('admin_logged_in')){
			$game_id=base64_decode($game_id);
			$data['gameInfo'] = $this->ADMINDBAPI->getGameInfo($game_id);
			$data['partners'] = $this->ADMINDBAPI->getPartnersList();
			$this->load->view('admin/games_update', $data);	
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	
	public function processPartnerGame($game_id =''){
		if($this->session->userdata('admin_logged_in')){
			
			$id = base64_decode($game_id); 
			foreach($_POST as $key=>$val){
				$data[$key] = $val;
			}	
			
			$data['game_desc'] = addslashes(urlencode($_POST['game_desc']));
			$data['game_tips'] = addslashes(urlencode($_POST['game_tips']));
			$data['game_how_to_play'] = addslashes(urlencode($_POST['game_how_to_play']));
			
			/*echo "<pre>";
			print_r($data);
			echo "</pre>";
			die;  */
			
			if($id){				
				$data['game_updated_on'] = time();
				$this->db->where('game_id', $id);				
				if($this->db->update('partners_games', $data)){
					$this->session->set_flashdata('success','Game information updated successfully. ');
					redirect("Admin/Games");
				} else {
					$this->session->set_flashdata('error','Unable to update game information. Please try again.');
					redirect("Admin/Games");
				}
								
			} else {
					
				$data['game_added_on'] = time();
				$data['game_updated_on'] = time();
				if($this->db->insert('partners_games', $data)){
					$this->session->set_flashdata('success','Game information added successfully. ');
					redirect("Admin/Games");
				} else {
					$this->session->set_flashdata('error','Unable to add new game information. Please try again.');
					redirect("Admin/Games");
				}
				
			}
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	
	############################ Update Game ###################################
	
	public function updatePartnerGame(){
		$game_id = base64_decode($this->uri->segment(3));
		foreach($_POST as $key=>$value)
			$data[$key]= $value;
			
		$data['game_desc'] = addslashes(urlencode($_POST['game_desc']));
		$data['game_tips'] = addslashes(urlencode($_POST['game_tips']));
		$data['game_how_to_play'] = addslashes(urlencode($_POST['game_how_to_play']));
		$data['game_updated_on'] = time();		
		
		
		$result = $this->ADMINDBAPI->updateGame($data, $game_id);
		
		
		
		if($result){
			$this->session->set_flashdata('success','Game information updated successfully. ');
			redirect("Admin/Games");
		} else {
			$this->session->set_flashdata('error','Unable to update game information. Please try agian. ');
			redirect("Admin/Games");
		}
	}

	############################################################################
	public function manageGamesImages($game_id){
		if($this->session->userdata('admin_logged_in')){
			$game_id = base64_decode($game_id);
			if(!empty($game_id)){
				$data['gameInfo'] = $this->ADMINDBAPI->getPartnersGamesInfo($game_id);
				$data['list'] = $this->ADMINDBAPI->getGamesImages($game_id);
				$data['game_id'] = $game_id;
				
				//Make a list of array to show default files in dropify
				$data['heroBanner'] = $this->ADMINDBAPI->getGameImageByType($game_id, $type='1');
				$data['pageBanner'] = $this->ADMINDBAPI->getGameImageByType($game_id, $type='2');
				$data['largeThumbBanner'] = $this->ADMINDBAPI->getGameImageByType($game_id, $type='3');
				$data['mediumThumbBanner'] = $this->ADMINDBAPI->getGameImageByType($game_id, $type='4');
				$data['smallThumbBanner'] = $this->ADMINDBAPI->getGameImageByType($game_id, $type='5');
				$data['horizontalThumbBanner'] = $this->ADMINDBAPI->getGameImageByType($game_id, $type='6');
				$data['verticalThumbBanner'] = $this->ADMINDBAPI->getGameImageByType($game_id, $type='7');
				
				$this->load->view('admin/games_images_list', $data);	
			} else {
				$this->session->set_flashdata('error','Unable to get game images list. Please try again.');
				redirect("Admin/Games");
			}
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	
	// *****************************  Hero Banner Upload Starts  **************************  //
							
	public function uploadHeroBanner(){
		if(!empty($_FILES['hero_banner']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_width'] = 500;
			$config['max_height'] = 235;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('hero_banner')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='1');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
				//	$dataFile['img_type'] = '1';   // 1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF
					$dataFile['img_type'] = '1';   // 1=HeroBanner  2=PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb 6=HorizontalThumb  7=VerticleThumb   
					$dataFile['img_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '1');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
				
			}
		}
    }
	
	public function uploadHeroBannerGIF(){
		if(!empty($_FILES['hero_banner_gif']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'gif|GIF';
			$config['max_width'] = 500;
			$config['max_height'] = 235;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('hero_banner_gif')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='1');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '1';   // 1=HeroBanner  2PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb  6=VerticleThumb  7=HorizontalThumb   
					$dataFile['img_gif_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_gif_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '1');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	// *****************************  Hero Banner Ends  **************************  //
	
	
	// *****************************  Page Banner Upload Starts  **************************  //
							
	public function uploadPageBanner(){
		if(!empty($_FILES['page_banner']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_width'] = 580;
			$config['max_height'] = 270;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('page_banner')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='2');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '2';   // 1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF
					$dataFile['img_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '2');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	
	public function uploadPageBannerGIF(){
		if(!empty($_FILES['page_banner_gif']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'gif';
			$config['max_width'] = 580;
			$config['max_height'] = 270;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('page_banner_gif')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='2');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '2';   // 1=HeroBanner  2PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb  6=VerticleThumb  7=HorizontalThumb   
					$dataFile['img_gif_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_gif_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '2');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	// *****************************  Page Banner Ends  **************************  //
	
	// *****************************  Large Thumbnail Banner Upload Starts  **************************  //
							
	public function uploadLargeThumb(){
		if(!empty($_FILES['large_thumb_banner']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_width'] = 180;
			$config['max_height'] = 180;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('large_thumb_banner')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='3');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '3';   // 1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF
					$dataFile['img_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '3');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	
	public function uploadLargeThumbGIF(){
		if(!empty($_FILES['large_thumb_banner_gif']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'gif';
			$config['max_width'] = 180;
			$config['max_height'] = 180;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('large_thumb_banner_gif')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='3');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '3';   // 1=HeroBanner  2PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb  6=VerticleThumb  7=HorizontalThumb   
					$dataFile['img_gif_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_gif_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '3');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	// *****************************  Large Thumbnail Banner Ends  **************************  //
	
	
	// *****************************  Medium Thumbnail Banner Upload Starts  **************************  //
							
	public function uploadMediumThumb(){
		if(!empty($_FILES['medium_thumb_banner']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_width'] = 135;
			$config['max_height'] = 135;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('medium_thumb_banner')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='4');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '4';   // 1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF
					$dataFile['img_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '4');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	
	public function uploadMediumThumbGIF(){
		if(!empty($_FILES['medium_thumb_banner_gif']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'gif';
			$config['max_width'] = 135;
			$config['max_height'] = 135;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('medium_thumb_banner_gif')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='4');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '4';   // 1=HeroBanner  2PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb  6=VerticleThumb  7=HorizontalThumb   
					$dataFile['img_gif_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_gif_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '4');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	// *****************************  Medium Thumbnail  Banner Ends  **************************  //
	
	
	// *****************************  Small Thumbnail Banner Upload Starts  **************************  //
							
	public function uploadSmallThumb(){
		if(!empty($_FILES['small_thumb_banner']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_width'] = 100;
			$config['max_height'] = 100;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('small_thumb_banner')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='5');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '5';   // 1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF
					$dataFile['img_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '5');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	
	public function uploadSmallThumbGIF(){
		if(!empty($_FILES['small_thumb_banner_gif']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'gif';
			$config['max_width'] = 100;
			$config['max_height'] = 100;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('small_thumb_banner_gif')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='5');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '5';   // 1=HeroBanner  2PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb  6=VerticleThumb  7=HorizontalThumb   
					$dataFile['img_gif_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_gif_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '5');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	// *****************************  Small Thumbnail  Banner Ends  **************************  //
	
	// *****************************  Horizontal Thumbnail Banner Upload Starts  **************************  //
							
	public function uploadHorizontalThumb(){
		if(!empty($_FILES['horizontal_thumb_banner']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_width'] = 300;
			$config['max_height'] = 170;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('horizontal_thumb_banner')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='6');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '6';   // 1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF
					$dataFile['img_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '6');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	
	public function uploadHorizontalThumbGIF(){
		if(!empty($_FILES['horizontal_thumb_banner_gif']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'gif';
			$config['max_width'] = 300;
			$config['max_height'] = 170;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('horizontal_thumb_banner_gif')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='6');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '6';   // 1=HeroBanner  2PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb  6=VerticleThumb  7=HorizontalThumb   
					$dataFile['img_gif_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_gif_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '6');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	// *****************************  Horizontal Thumbnail  Banner Ends  **************************  //
	
	
	// *****************************  Vertical Thumbnail Banner Upload Starts  **************************  //
							
	public function uploadVerticalThumb(){
		if(!empty($_FILES['vertical_thumb_banner']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_width'] = 180;
			$config['max_height'] = 240;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('vertical_thumb_banner')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='7');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '7';   // 1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF
					$dataFile['img_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '7');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	
	public function uploadVerticalThumbGIF(){
		if(!empty($_FILES['vertical_thumb_banner_gif']['name'])){
			$config['upload_path'] = 'uploads/content/';
			$config['allowed_types'] = 'gif';
			$config['max_width'] = 180;
			$config['max_height'] = 240;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('vertical_thumb_banner_gif')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkGameImageExists($gameId, $type='7');
				if($checkGameImageCount == 0){
					$dataFile['img_game_id'] = $gameId;
					$dataFile['img_type'] = '7';   // 1=HeroBanner  2PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb  6=VerticleThumb  7=HorizontalThumb   
					$dataFile['img_gif_link'] = $fileName;
					$dataFile['img_status'] = '1';
					$dataFile['img_added_on'] = time();
					$dataFile['img_updated_on'] = time();
					
					$this->db->insert('partners_games_images', $dataFile);
				} else {
					$dataFileUpdate['img_gif_link'] = $fileName;
					$dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('img_game_id', $gameId);
					$this->db->where('img_type', '7');
					$this->db->update('partners_games_images', $dataFileUpdate);
				}
			}
		}
    }
	// *****************************  Vertical Thumbnail  Banner Ends  **************************  //
	
	
	
	public function deleteGameImage(){
		if($this->session->userdata('admin_logged_in')){
			$id = $_POST['gameId'];
			$type = $_POST['type'];
			$imgType = $_POST['imgType'];
			if($imgType == 'gif'){
				$dataUpdate['img_gif_link'] = '';
			} else {
				$dataUpdate['img_link'] = '';
			}
			$this->db->where('img_game_id', $id);
			$this->db->where('img_type', $type);
			if($this->db->update('partners_games_images', $dataUpdate)){
				echo "success";
			} else {
				echo "error";
			}
			
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	
	public function deleteGame($id){
		if($this->session->userdata('admin_logged_in')){
			$id = base64_decode($id);
			$this->db->where('game_id', $id);
			if($this->db->delete('partners_games')){
				$this->session->set_flashdata('success','Game information deleted successfully. ');
				redirect("Admin/Games");
			} else {
				$this->session->set_flashdata('error','Unable to delete game information. Please try again.');
				redirect("Admin/Games");
			}
			
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	
	
	
	//  **************************************   ***************************** **************************************//
	//  **************************************   Games  Section Ends **************************************//
	//  **************************************   ***************************** **************************************//
	
	
	
	//  **************************************   ***************************** **************************************//
	//  **************************************   Tournaments  Section Starts **************************************//
	//  **************************************   ***************************** **************************************//
	
		
	public function getPartnersTournaments(){
		if($this->session->userdata('admin_logged_in')){
			$data['list'] = $this->ADMINDBAPI->getPartnersTournamentsList();
			$this->load->view('admin/tournaments_list', $data);	
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
		
	public function addNewTournament(){
		if($this->session->userdata('admin_logged_in')){
			$data['partners'] = $this->ADMINDBAPI->getPartnersList();
			$this->load->view('admin/tournament_add', $data);	
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	
	public function updateTournament($id=''){
		$id=base64_decode($id);
		$data['partners'] = $this->ADMINDBAPI->getPartnersList();
		$data['info'] = $this->ADMINDBAPI->getTournamentInfo($id);
		$this->load->view('admin/tournament_update', $data);	
	}
	
	
	public function processTournament($game_id =''){
		if($this->session->userdata('admin_logged_in')){
			
			$id = base64_decode($game_id); 
			foreach($_POST as $key=>$val){
				$data[$key] = $val;
			}
			if($id){	
			
				$data['tournament_updated_on'] = time();
				$this->db->where('tournament_id', $id);				
				if($this->db->update('tbl_partners_tournaments', $data)){
					$this->session->set_flashdata('success','Tournament information updated successfully. ');
					redirect("Admin/Tournaments");
				} else {
					$this->session->set_flashdata('error','Unable to update Tournament information. Please try again.');
					redirect("Admin/Tournaments");
				}					
			} else {
				$data['tournament_added_on'] = time();
				$data['tournament_updated_on'] = time();
				if($this->db->insert('tbl_partners_tournaments', $data)){
					$this->session->set_flashdata('success','Tournament information added successfully. ');
					redirect("Admin/Tournaments");
				} else {
					$this->session->set_flashdata('error','Unable to add new Tournament information. Please try again.');
					redirect("Admin/Tournaments");
				}
			}
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	
	
	
	public function manageTournamentImages($id){
		if($this->session->userdata('admin_logged_in')){
			$id = base64_decode($id);
			if(!empty($id)){
				$data['tournamentInfo'] = $this->ADMINDBAPI->getTournamentInfo($id);
				$data['game_id'] = $id;
				
				//Make a list of array to show default files in dropify
				$data['heroBanner'] = $this->ADMINDBAPI->getTournamentImageByType($id, $type='1');
				$data['verticalBanner'] = $this->ADMINDBAPI->getTournamentImageByType($id, $type='2');
				$this->load->view('admin/tournament_images_list', $data);	
			} else {
				$this->session->set_flashdata('error','Unable to get game images list. Please try again.');
				redirect("Admin/Games");
			}
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	
	
	public function deleteTournamentImage(){
		if($this->session->userdata('admin_logged_in')){
			$id = $_POST['gameId'];
			$type = $_POST['type'];
			$imgType = $_POST['imgType'];
			
			if($imgType == 'gif'){
				$dataUpdate['tour_img_img_gif'] = '';
			} else {
				$dataUpdate['tour_img_img_link'] = '';
			}
			$this->db->where('tour_img_tournament_id', $id);
			$this->db->where('tour_img_type', $type);
			if($this->db->update('tbl_tournament_images', $dataUpdate)){
				echo "success";
			} else {
				echo "error";
			}
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	

	public function deleteTournament($id= ''){
		if($this->session->userdata('admin_logged_in')){
			$id = base64_decode($id);
			$this->db->where('tournament_id', $id);
			if($this->db->delete('tbl_partners_tournaments')){
				$this->session->set_flashdata('success','Tournament information deleted successfully. ');
				redirect("Admin/Tournaments");
			} else {
				$this->session->set_flashdata('error','Unable to delete tournament information. Please try again.');
				redirect("Admin/Tournaments");
			}
			
		} else{
			$this->session->set_flashdata('error','Login to Access Your Account.');
			redirect('Admin');
		}
	}
	
	
	public function uploadTournamentVerticalThumb(){
		if(!empty($_FILES['vertical_thumb_banner']['name'])){
			$config['upload_path'] = 'uploads/tournaments/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_width'] = 180;
			$config['max_height'] = 240;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('vertical_thumb_banner')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkTournamentImageExists($gameId, $type='2');
				if($checkGameImageCount == 0){
					$dataFile['tour_img_tournament_id'] = $gameId;
				//	$dataFile['img_type'] = '1';   // 1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF
					$dataFile['tour_img_type'] = '2';   // 1=HeroBanner  2=PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb 6=HorizontalThumb  7=VerticleThumb   
					$dataFile['tour_img_img_link'] = $fileName;
					
					
					$this->db->insert('tbl_tournament_images', $dataFile);
					// echo $this->db->insert_id();
				} else {
					$dataFileUpdate['tour_img_img_link'] = $fileName;
					// $dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('tour_img_tournament_id', $gameId);
					$this->db->where('tour_img_type', '2');
					$this->db->update('tbl_tournament_images', $dataFileUpdate);
					// echo  "hii";
				}
			}
		}
    }

	
	public function uploadTournamentVerticalThumbGIF(){
		if(!empty($_FILES['vertical_thumb_banner_gif']['name'])){
			$config['upload_path'] = 'uploads/tournaments/';
			$config['allowed_types'] = 'gif';
			$config['max_width'] = 180;
			$config['max_height'] = 240;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('vertical_thumb_banner_gif')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkTournamentImageExists($gameId, $type='7');
				if($checkGameImageCount == 0){
					$dataFile['tour_img_tournament_id'] = $gameId;
				//	$dataFile['img_type'] = '1';   // 1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF
					$dataFile['tour_img_type'] = '2';   // 1=HeroBanner  2=PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb 6=HorizontalThumb  7=VerticleThumb   
					$dataFile['tour_img_img_gif'] = $fileName;
					
					
					$this->db->insert('tbl_tournament_images', $dataFile);
					// echo $this->db->insert_id();
				} else {
					$dataFileUpdate['tour_img_img_gif'] = $fileName;
					// $dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('tour_img_tournament_id', $gameId);
					$this->db->where('tour_img_type', '2');
					$this->db->update('tbl_tournament_images', $dataFileUpdate);
					// echo  "hii";
				}
			}
		}
    }

	
	
	public function uploadTournamentHeroBanner(){
		$gameId = $_POST['game_id'];
		if(!empty($_FILES['hero_banner']['name'])){
			$config['upload_path'] = 'uploads/tournaments/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_width'] = 580;
			$config['max_height'] = 270;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('hero_banner')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				// echo $gameId;
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkTournamentImageExists($gameId, $type='1');
				// print_r($checkGameImageCount);
				
				if($checkGameImageCount == 0){
					$dataFile['tour_img_tournament_id'] = $gameId;
				//	$dataFile['img_type'] = '1';   // 1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF
					$dataFile['tour_img_type'] = '1';   // 1=HeroBanner  2=PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb 6=HorizontalThumb  7=VerticleThumb   
					$dataFile['tour_img_img_link'] = $fileName;
					
					
					$this->db->insert('tbl_tournament_images', $dataFile);
					// echo $this->db->insert_id();
				} else {
					$dataFileUpdate['tour_img_img_link'] = $fileName;
					// $dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('tour_img_tournament_id', $gameId);
					$this->db->where('tour_img_type', '1');
					$this->db->update('tbl_tournament_images', $dataFileUpdate);
					// echo  "hii";
				}
			}
		}
    }
	
	public function uploadTournamentHeroBannerGIF(){
		if(!empty($_FILES['hero_banner_gif']['name'])){
			$config['upload_path'] = 'uploads/tournaments/';
			$config['allowed_types'] = 'gif|GIF';
			$config['max_width'] = 580;
			$config['max_height'] = 270;
			$config['max_size'] = '500';
			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('hero_banner_gif')) {
				$error = array('error' => $this->upload->display_errors());
				//print_r($error);
			} else {
				$arr_image = array('upload_data' => $this->upload->data());
				//print_r($arr_image);
				
				$fileName = $arr_image['upload_data']['file_name'];
				$gameId = $_POST['game_id'];
				
				// Check for image is already uploaded or not
				$checkGameImageCount = $this->ADMINDBAPI->checkTournamentImageExists($gameId, $type='1');
				if($checkGameImageCount == 0){
					$dataFile['tour_img_tournament_id'] = $gameId;
				//	$dataFile['img_type'] = '1';   // 1=HeroBanner  2=HeroBannerGIF  3=PageBanner  4=PageBannerGIF  5=LargThumb  6=LargThumbGIF  7=MediumThumb  8=MediumThumbGIF  9=SmallThumb  10=SmallThumbGIF  11=VerticleThumb  12=VerticleThumbGIF   13=HorizontalThumb   14=HorizontalThumbGIF
					$dataFile['tour_img_type'] = '1';   // 1=HeroBanner  2=PageBanner  3=LargThumb  4=MediumThumb  5=SmallThumb 6=HorizontalThumb  7=VerticleThumb   
					$dataFile['tour_img_img_gif'] = $fileName;
					
					
					$this->db->insert('tbl_tournament_images', $dataFile);
					// echo $this->db->insert_id();
				} else {
					$dataFileUpdate['tour_img_img_gif'] = $fileName;
					// $dataFileUpdate['img_updated_on'] = time();
					
					$this->db->where('tour_img_tournament_id', $gameId);
					$this->db->where('tour_img_type', '1');
					$this->db->update('tbl_tournament_images', $dataFileUpdate);
					// echo  "hii";
				}
			}
		}
    }




	//  **************************************   ***************************** **************************************//
	//  **************************************   Tournaments  Section Ends **************************************//
	//  **************************************   ***************************** **************************************//
	
	
	
	
}
