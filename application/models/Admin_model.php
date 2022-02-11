<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	 function __construct(){
		parent::__construct();
	}
	
	
	function getLoginStatus($email,$pswd){
		$this->db->select("*", FALSE);
        $this->db->from('login');        
        $this->db->where('username', $email);
		$this->db->where('password', $pswd);
		$this->db->where('user_status', '1');		
		$this->db->where('user_type', '1');		
        return $this->db->get()->row_array();
	}

	
	function getUserInfo($user_id){
		$this->db->select("*", FALSE);
        $this->db->from('login');        
        $this->db->where('user_id', $user_id);
		
        return $this->db->get()->row_array();
	}
	
	function getPartnersList(){
		$this->db->select("*", FALSE);
        $this->db->from('partners'); 
		return $this->db->get()->result_array();
	}
	
	function validatePartnerUsername($username, $userid=''){
		$this->db->select("*", FALSE);
        $this->db->from('partners'); 
        $this->db->where('partner_username', $username); 
		if(!empty($userid))
        $this->db->where_not_in('partner_id', $userid); 
		return $this->db->get()->num_rows();
		
	}
	
	function getHeroBanner($id)
	{
		$this->db->select('img_link');
		$this->db->where('img_game_id' , $id);
		$this->db->where('img_type' , 1);
		$result=$this->db->get('tbl_partners_games_images');
		return $result->result_array()[0]['img_link'];
		
	}
	function getPageBanner($id)
	{
		$this->db->select('img_link');
		$this->db->where('img_game_id' , $id);
		$this->db->where('img_type' , 2);
		$result=$this->db->get('tbl_partners_games_images');
		return $result->result_array()[0]['img_link'];
	}

	function getPartnersTournamentsList(){
		$this->db->select("*", FALSE);
        $this->db->from('partners_tournaments'); 
        $this->db->join('partners', 'partners.partner_id = partners_tournaments.tournament_partner_id', 'left'); 
		// $this->db->join('tbl_partners_games', 'tbl_partners_games.game_id = partners_tournaments.tournament_game_id', 'left'); 
		return $this->db->get()->result_array();
	}
	
	function getPartnersTournamentInfo($tournament_id){
		$this->db->select("*", FALSE);
        $this->db->from('partners_tournaments'); 
        $this->db->where('tournament_id', $tournament_id);
        $this->db->join('partners', 'partners.partner_id = partners_tournaments.tournament_partner_id', 'left'); 
		return $this->db->get()->row_array();
	}
	
	

	function getPartnersGamesList(){
		$this->db->select("*", FALSE);
        $this->db->from('partners_games'); 
      //  $this->db->where('game_status', '2');  // 0=AddedOnly  1=Approved  2=Published  3=Reject  4=Inactive
        $this->db->join('partners', 'partners.partner_id = partners_games.game_partner_id', 'left'); 
		return $this->db->get()->result_array();
	}
	
	
	function getPartnersGamesInfo($game_id){
		$this->db->select("*", FALSE);
        $this->db->from('partners_games'); 
        $this->db->where('game_id', $game_id);
        $this->db->join('partners', 'partners.partner_id = partners_games.game_partner_id', 'left'); 
		return $this->db->get()->row_array();
	}
	
	
	function getGamesImages($game_id=''){
		$this->db->select("*", FALSE);
        $this->db->from('partners_games_images'); 
		if($game_id)
			$this->db->where('img_game_id', $game_id);
		return $this->db->get()->result_array();
	}
	
	
	function checkGameImageExists($game_id, $type){
		$this->db->select("*", FALSE);
        $this->db->from('partners_games_images'); 
		$this->db->where('img_game_id', $game_id);
		$this->db->where('img_type', $type);
		
		return $this->db->get()->num_rows();
	}

	function checkTournamentImageExists($game_id, $type){
		$this->db->select("*", FALSE);
        $this->db->from('tbl_tournament_images'); 
		$this->db->where('tour_img_tournament_id', $game_id);
		$this->db->where('tour_img_type', $type);
		return $this->db->get()->num_rows();
	}
	
	function getPartnerGamesList($partner)
	{
		$this->db->select("*", FALSE);
        $this->db->from('tbl_partners_games'); 
		$this->db->where('game_partner_id', $partner);
		// $this->db->where('img_type', $type);
		return $this->db->get()->result_array();
	}

	function getGameImageByType($game_id, $type){
		$this->db->select("*", FALSE);
        $this->db->from('partners_games_images'); 
		$this->db->where('img_game_id', $game_id);
		$this->db->where('img_type', $type);
		
		return $this->db->get()->row_array();
	}

	function getTournamentImageByType($_id, $type){
		$this->db->select("*", FALSE);
        $this->db->from('tbl_tournament_images'); 
		$this->db->where('tour_img_tournament_id', $_id);
		$this->db->where('tour_img_type', $type);
		return $this->db->get()->row_array();
	}

	  ################################# START ##################################
	  ###################### Get Game Info For Game Update #####################
	  ##########################################################################
	  public function getTournamentInfo($id)
	  {
		  $this->db->select('*' , FALSE);
		  $this->db->from('tbl_partners_tournaments');
		  $this->db->where('tournament_id' , $id);
		  $this->db->join('partners', 'partners.partner_id = partners_tournaments.tournament_partner_id', 'left'); 
		//   $this->db->join('tbl_partners_games', 'tbl_partners_games.game_id = partners_tournaments.tournament_game_id', 'left'); 
		  $result = $this->db->get()->row_array();
		  return $result;
	  }

	  public function getTournamentInfoForImage($id)
	  {
		  $this->db->select('*' , FALSE);
		  $this->db->from('tbl_partners_tournaments');
		  $this->db->where('tournament_id' , $id);
		  $this->db->join('partners', 'partners.partner_id = partners_tournaments.tournament_partner_id', 'left'); 
		  $this->db->join('tbl_partners_games', 'tbl_partners_games.game_id = partners_tournaments.tournament_game_id', 'left'); 
		  $result = $this->db->get()->row_array();
		  return $result;
	  }

	public function getGameInfo($game_id)
	{
		$this->db->select('*' , FALSE);
		$this->db->from('partners_games');
		$this->db->where('game_id' , $game_id);
		$result = $this->db->get()->row_array();
		// echo "<pre>";
		// print_r($result);
		// die();
		return $result;
	}

	public function updateGame($data , $game_id)
	{
		$data2= array(
			'game_top_banner'=>0,
			'game_page_banner'=>0,
			'game_free_to_play'=>0,
			'game_mini_games'=>0,
			'game_top_chart'=>0,
			'game_tournament'=>0,
			'game_most_played'=>0,
		);
		$this->db->where('game_id' , $game_id);
		$this->db->update('tbl_partners_games' , $data2);
		// if(!($this->db->affected_rows()>0))
		// 	return false;
		$this->db->where('game_id' , $game_id);
		$this->db->update('tbl_partners_games' , $data);
		// print_r($this->db->last_query());
		// die();
		if($this->db->affected_rows()>0)
			return true;
		return false;
	}

	  ##########################################################################
	  ###################### Get Game Info For Game Update #####################
	  ################################# END ####################################
        
        // Manage Ads
        public function getAdsList(){
            $this->db->select("*", FALSE);
            $this->db->from('ads'); 
            $this->db->where('status', 1);
            return $this->db->get()->result_array();
	}
        
        public function getAdvertisementInfo($id) {
            $this->db->select('*' , FALSE);
            $this->db->from('tbl_ads');
            $this->db->where('id' , $id);
            $result = $this->db->get()->row_array();
            return $result;
        }
	        
        public function getAdvertisementImages($id) {
            $this->db->select('*' , FALSE);
            $this->db->from('tbl_ads_images');
            $this->db->where('ad_id' , $id);
            $result = $this->db->get()->row_array();
            return $result;
        }
	
        function checkAdvertisementImageExists($ad_id, $type){
            $this->db->select("*", FALSE);
            $this->db->from('tbl_ads_images'); 
            $this->db->where('ad_id', $ad_id);
            $this->db->where('img_type', $type);
            return $this->db->get()->num_rows();
	}
        
        
}  

?>
