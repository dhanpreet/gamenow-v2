<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {

	 function __construct(){
		parent::__construct();
	}
	
	function getProfileImages(){
		$this->db->select("*", FALSE);
        $this->db->from('user_avatar');
		$this->db->order_by('id', 'RANDOM');
		
		return $this->db->get()->result_array();
	}

	function getUserInformation($user_id){
		$sql = "SELECT * FROM tbl_users WHERE user_id='$user_id' ORDER BY user_id desc LIMIT 1 ";	
		$result = $this->db->query($sql)->row_array();
		
		return $result;
	}
	
	function checkRegisteredPhone($phone){
		$sql = "SELECT * FROM tbl_users WHERE user_phone='$phone' ORDER BY user_id desc LIMIT 1 ";	
		$result = $this->db->query($sql);
		if ($result->num_rows() == 0) {
			$data['rows'] = 0;
		} else {
			$data['rows'] = $result->num_rows();
			$data['result'] = $result->row_array();
		}
		return $data;
	}
	
	function addNewUser($phone, $otp, $img){
	
		$date = date('Y-m-d H:i:s');
		$time = time();
		$user_ip = $_SERVER['REMOTE_ADDR'];
		
		$userData['user_ip'] = $user_ip;
		$userData['user_phone'] = $phone;
		$userData['user_otp'] = $otp;
		$userData['user_img'] = $img;
		$userData['user_last_login'] = $date;
		$userData['user_status'] = 0;
		$userData['user_login_type'] = 1;
		$userData['user_registered_on'] = $time;
		$userData['user_last_updated'] = $time;
		
		if($this->db->insert('users', $userData)){
			return $this->db->insert_id();
		} else {
			return false;
		}
	}
	
	
	function updateUserLoginOTP($user_id, $otp){
		
		$date = date('Y-m-d H:i:s');
		$time = time();
		
		$userData['user_otp'] = $otp;
		$userData['user_last_login'] = $date;
		$userData['user_last_updated'] = $time;
		
		$this->db->where('user_id', $user_id);
		if($this->db->update('users', $userData)){
			return true;
			
		} else {
			return false;
		}
		
	}



	function getPublishedHeroBanners($limit){
		$img_types = array('1'); // 1=HeroBanner  2=PageBanner 3=LargThumb  4=MediumThumb  5=SmallThumb  6=HorizontalThumb  7=VerticleThumb  
		$this->db->select("game_id, game_name, game_category, game_play_link, img_link, img_gif_link", FALSE);
        $this->db->from('partners_games_images'); 
		$this->db->join('partners_games', 'partners_games.game_id=partners_games_images.img_game_id', 'left');  
		
		$this->db->where_in('img_type', $img_types);
		$this->db->where('game_status', '2');  // 0=AddedOnly  1=Approved  2=Published  3=Reject  4=Inactive
		$this->db->where('game_top_banner', '1');  
		$this->db->order_by('partners_games_images.img_game_id','RANDOM');
		$this->db->limit($limit);
        return $this->db->get()->result_array();
	}
	

	function getPublishedPageBanners($limit){
		$img_types = array('2'); // 1=HeroBanner  2=PageBanner 3=LargThumb  4=MediumThumb  5=SmallThumb  6=HorizontalThumb  7=VerticleThumb  
		$this->db->select("game_id, game_name, game_category, game_play_link, img_link, img_gif_link", FALSE);
        $this->db->from('partners_games_images'); 
		$this->db->join('partners_games', 'partners_games.game_id=partners_games_images.img_game_id', 'left');  
		
		$this->db->where_in('img_type', $img_types);
		$this->db->where('game_status', '2');  // 0=AddedOnly  1=Approved  2=Published  3=Reject  4=Inactive
		$this->db->where('game_page_banner', '1');  
		$this->db->order_by('partners_games_images.img_game_id','RANDOM');
		$this->db->limit($limit);
        return $this->db->get()->result_array();
	}
	

	function getPublishedPageBannersGIF($limit){
		$img_types = array('2'); // 1=HeroBanner  2=PageBanner 3=LargThumb  4=MediumThumb  5=SmallThumb  6=HorizontalThumb  7=VerticleThumb  
		$this->db->select("game_id, game_name, game_category, game_play_link, img_link, img_gif_link", FALSE);
        $this->db->from('partners_games_images'); 
		$this->db->join('partners_games', 'partners_games.game_id=partners_games_images.img_game_id', 'left');  
		
		$this->db->where_in('img_type', $img_types);
		$this->db->where('game_status', '2');  // 0=AddedOnly  1=Approved  2=Published  3=Reject  4=Inactive
		$this->db->where('game_page_banner', '1');  
		$this->db->order_by('partners_games_images.img_game_id','RANDOM');
		$this->db->limit($limit);
        return $this->db->get()->result_array();
	}
	

	function getPublishedFreeGames($limit){
		$img_types = array('6');  // 1=HeroBanner  2=PageBanner 3=LargThumb  4=MediumThumb  5=SmallThumb  6=HorizontalThumb  7=VerticleThumb  
		$this->db->select("game_id, game_name, game_category, game_play_link, img_link, img_gif_link", FALSE);
        $this->db->from('partners_games'); 
		$this->db->join('partners_games_images', 'partners_games_images.img_game_id=partners_games.game_id', 'left');  
		$this->db->where_in('img_type', $img_types);
		$this->db->where('game_free_to_play', '1');  
		$this->db->where('game_status', '2');  // 0=AddedOnly  1=Approved  2=Published  3=Reject  4=Inactive
		$this->db->group_by('partners_games.game_id');
		$this->db->order_by('partners_games.game_id','RANDOM');
		$this->db->limit($limit);
        return $this->db->get()->result_array();
	}
	

	function getPublishedTournamentGames__old($limit){
		$img_types = array('7');  // 1=HeroBanner  2=PageBanner 3=LargThumb  4=MediumThumb  5=SmallThumb  6=HorizontalThumb  7=VerticleThumb  
		$this->db->select("game_id, game_name, game_category, game_play_link, img_link, img_gif_link", FALSE);
        $this->db->from('partners_games'); 
		$this->db->join('partners_games_images', 'partners_games_images.img_game_id=partners_games.game_id', 'left');  
		$this->db->where_in('img_type', $img_types);
		$this->db->where('game_tournament', '1');  
		$this->db->where('game_status', '2');  // 0=AddedOnly  1=Approved  2=Published  3=Reject  4=Inactive
		$this->db->group_by('partners_games.game_id');
		$this->db->order_by('partners_games.game_id','RANDOM');
		$this->db->limit($limit);
        return $this->db->get()->result_array();
	}
	
	
	function getPublishedTournamentsBanners($type, $limit){
		$today = date('Y-m-d');
		$this->db->select("*", FALSE);
        $this->db->from('partners_tournaments'); 
		$this->db->join('tournament_images', 'tournament_images.tour_img_tournament_id=partners_tournaments.tournament_id', 'left');  
		$this->db->where('tour_img_type', $type);  //    1=Full Banner  2=Thumbnail 
		$this->db->where('tournament_status', '2');  //    2=Published  3=Reject 
		$this->db->where("tournament_start_date <= '$today' ");  
		$this->db->where("tournament_end_date >= '$today' ");  
		$this->db->group_by('partners_tournaments.tournament_id');
		$this->db->order_by('partners_tournaments.tournament_id','RANDOM');
		
		$this->db->limit($limit);
        return $this->db->get()->result_array();
	}
	
	
	
	function getPublishedFullTournamentGames($limit){
		$img_types = array('2');  // 1=HeroBanner  2=PageBanner 3=LargThumb  4=MediumThumb  5=SmallThumb  6=HorizontalThumb  7=VerticleThumb  
		$this->db->select("game_id, game_name, game_category, game_play_link, img_link, img_gif_link", FALSE);
        $this->db->from('partners_games'); 
		$this->db->join('partners_games_images', 'partners_games_images.img_game_id=partners_games.game_id', 'left');  
		$this->db->where_in('img_type', $img_types);
		$this->db->where('game_tournament', '1');  
		$this->db->where('game_status', '2');  // 0=AddedOnly  1=Approved  2=Published  3=Reject  4=Inactive
		$this->db->group_by('partners_games.game_id');
		$this->db->order_by('partners_games.game_id','RANDOM');
		$this->db->limit($limit);
        return $this->db->get()->result_array();
	}
	
	function getPublishedPopularGames($limit){
		$img_types = array('3'); // 1=HeroBanner  2=PageBanner 3=LargThumb  4=MediumThumb  5=SmallThumb  6=HorizontalThumb  7=VerticleThumb  
		$this->db->select("game_id, game_name, game_category, game_play_link, img_link, img_gif_link", FALSE);
        $this->db->from('partners_games'); 
		$this->db->join('partners_games_images', 'partners_games_images.img_game_id=partners_games.game_id', 'left');  
		$this->db->where_in('img_type', $img_types);
		$this->db->where('game_popular', '1');  
		$this->db->where('game_status', '2');  // 0=AddedOnly  1=Approved  2=Published  3=Reject  4=Inactive
		$this->db->group_by('partners_games.game_id');
		$this->db->order_by('partners_games.game_id','RANDOM');
		$this->db->limit($limit);
        return $this->db->get()->result_array();
	}
	
	function getPublishedMostlyPlayedGames($limit){
		$img_types = array('3'); // 1=HeroBanner  2=PageBanner 3=LargThumb  4=MediumThumb  5=SmallThumb  6=HorizontalThumb  7=VerticleThumb  
		$this->db->select("game_id, game_name, game_category, game_play_link, img_link, img_gif_link", FALSE);
        $this->db->from('partners_games'); 
		$this->db->join('partners_games_images', 'partners_games_images.img_game_id=partners_games.game_id', 'left');  
		$this->db->where_in('img_type', $img_types);
		$this->db->where('game_most_played', '1');  
		$this->db->where('game_status', '2');  // 0=AddedOnly  1=Approved  2=Published  3=Reject  4=Inactive
		$this->db->group_by('partners_games.game_id');
		$this->db->order_by('partners_games.game_id','RANDOM');
		$this->db->limit($limit);
        return $this->db->get()->result_array();
	}
	
	function getPublishedMiniGames($limit){
		$img_types = array('5'); // 1=HeroBanner  2=PageBanner 3=LargThumb  4=MediumThumb  5=SmallThumb  6=HorizontalThumb  7=VerticleThumb  
		$this->db->select("game_id, game_name, game_category, game_play_link, img_link, img_gif_link", FALSE);
        $this->db->from('partners_games'); 
		$this->db->join('partners_games_images', 'partners_games_images.img_game_id=partners_games.game_id', 'left');  
		$this->db->where_in('img_type', $img_types);
		$this->db->where('game_mini_games', '1');  
		$this->db->where('game_status', '2');  // 0=AddedOnly  1=Approved  2=Published  3=Reject  4=Inactive
		$this->db->group_by('partners_games.game_id');
		$this->db->order_by('partners_games.game_id','RANDOM');
		$this->db->limit($limit);
        return $this->db->get()->result_array();
	}
	
	
	function getPublishedTopChartGames($limit){
		$img_types = array('5'); // 1=HeroBanner  2=PageBanner 3=LargThumb  4=MediumThumb  5=SmallThumb  6=HorizontalThumb  7=VerticleThumb  
		$this->db->select("game_id, game_name, game_category, game_play_link, img_link, img_gif_link", FALSE);
        $this->db->from('partners_games'); 
		$this->db->join('partners_games_images', 'partners_games_images.img_game_id=partners_games.game_id', 'left');  
		$this->db->where_in('img_type', $img_types);
		$this->db->where('game_top_chart', '1');  
		$this->db->where('game_status', '2');  // 0=AddedOnly  1=Approved  2=Published  3=Reject  4=Inactive
		$this->db->group_by('partners_games.game_id');
		$this->db->order_by('partners_games.game_id','RANDOM');
		$this->db->limit($limit);
        return $this->db->get()->result_array();
	}
	
	
}  

?>
