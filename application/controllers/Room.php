<?php
//header('Access-Control-Allow-Origin: *');

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Room extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		if (defined('REQUEST') && REQUEST == "external") {
	        return;
	    }
		$this->template->loadData("activeLink",
			array("home" => array("general" => 1)));

			$this->load->library('Frontweb');

	}

	public function detail($id)
	{
		
		$contentDir = base_url(). '/theme_costume/static_content/';
		$tourDetailFiles = $contentDir . 'villa-room-details.json';
		$tourDetails = file_get_contents($tourDetailFiles);
		if (!empty($tourDetails)) $tourDetails = json_decode($tourDetails,TRUE);

		$collection = collect($tourDetails);
		$selectRoom = $collection->where('id', $id);
		
		$this->templatefront->loadData("activeLink",array("room" => array($id => 1)));
		
		if($id=="1"){
			$page="frontpage/room/bougenville";
		}elseif($id=="2"){
			$page="frontpage/room/jasmine";
		}elseif($id=="3"){
			$page="frontpage/room/lotus";
		}
		
		$this->templatefront->loadData("activeLink",array("home" => 1));

		$this->templatefront->loadExternal("");
		$this->templatefront->loadExternalJs(""); 
		$this->templatefront->loadContent($page, array(
			"og_image" => "https://localhost/ubudsvilla/theme_costume//images/slider/slider-01.jpg",
 			"og_title" => "Ubud Serendipity Villa",
 			"og_desc" => "Ubud Serendipity Villa",
 			"og_url" => "https://greenbiketour.com",
 			"selectRoom" => $selectRoom

			));

	}	

	public function show($id){
		$contentDir = base_url(). '/theme_costume/static_content/';
		$tourDetailFiles = $contentDir . 'villa-room-details.json';
		$tourDetails = file_get_contents($tourDetailFiles);
		if (!empty($tourDetails)) $tourDetails = json_decode($tourDetails,TRUE);

		$collection = collect($tourDetails);
		$selectRoom = $collection->where('id', $id);
        if($selectRoom){
                   $result['room']  = $selectRoom;
             }
        echo json_encode($result);
    }	

    public function showAllRoom(){
		 
        $contentDir      = base_url() . '/theme_costume/static_content/';
        $tourDetailFiles = $contentDir . 'villa-room-details.json';
        $tourDetails     = file_get_contents($tourDetailFiles);



        
        $roomDetail = collect($tourDetails);
        $roomDetail = collect($roomDetail);
        if($roomDetail){
                   $result['rooms']  = $roomDetail;
             }
        echo json_encode($result);
    }
	
	
}

?>
