<?php
//header('Access-Control-Allow-Origin: *');

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Book extends CI_Controller
{
    
    public function __construct()
    {
        
        parent::__construct();
        if (defined('REQUEST') && REQUEST == "external") {
            return;
        }
        $this->template->loadData("activeLink", array(
            "home" => array(
                "general" => 1
            )
        ));
        
        $this->load->library('Frontweb');

        $this->load->model("book_model");
        
    }
    
    

    public function now($idroom = '')
    {
        
        $this->templatefront->loadExternalCss('
                    <link rel="stylesheet" type="text/css" href="https://unpkg.com/vue-airbnb-style-datepicker@latest/dist/vue-airbnb-style-datepicker.min.css"/>'.
                    '<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">'
                );
            
        $this->templatefront->loadExternalJs('<script src="' . base_url() . '/theme_costume/plugin/vue/js/vue.js"></script>
                <script src="https://unpkg.com/vuejs-datepicker"></script>
                <script src="' . base_url() . '/theme_costume/plugin/vue/js/axios.min.js"></script>
                <script src="' . base_url() . '/theme_costume/plugin/vue/js/pagination.js"></script>
                <script src="' . base_url() . '/theme_costume/plugin/vue/js/vue-airbnb-style-datepicker.min.js"></script>
                <script src="https://unpkg.com/vee-validate@2.0.0-rc.21/dist/vee-validate.js"></script>
                <script src="' . base_url() . '/theme_costume/plugin/vue/js/date_fns.js"></script>
                <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
                <script src="' . base_url() . '/theme_costume/plugin/vue/js/app.js"></script>');
            
        $this->templatefront->loadContent('frontpage/book_view', array(
                "og_image" => "https://localhost/ubudsvilla/theme_costume//images/slider/slider-01.jpg",
                "og_title" => "Ubud Serendipity Villa",
                "og_desc" => "Ubud Serendipity Villa",
                "og_url" => "https://ubudserendipityvilla.com",
                "idroom" => $idroom
            ));
            
    }

    public function getdirectdataroom($idroom)
    {
        $contentDir      = base_url() . '/theme_costume/static_content/';
        $tourDetailFiles = $contentDir . 'villa-room-details.json';
        $tourDetails     = file_get_contents($tourDetailFiles);
        if (!empty($tourDetails))
            $tourDetails = json_decode($tourDetails, TRUE);
        
        $roomDetail = collect($tourDetails);
        $dataSelectedRoom = $roomDetail->where('id', $idroom);


        $data = array(
                'dataSelectedRoom' => $dataSelectedRoom
            );
        
        
        echo json_encode($data); 
    }

    // public function now()
    // {
        
    //     $contentDir      = base_url() . '/theme_costume/static_content/';
    //     $tourDetailFiles = $contentDir . 'villa-room-details.json';
    //     $tourDetails     = file_get_contents($tourDetailFiles);
    //     if (!empty($tourDetails))
    //         $tourDetails = json_decode($tourDetails, TRUE);
        
    //     $roomDetail = collect($tourDetails);
    //     $idroom       = $this->input->post('room');
    //     $data["room"] = $idroom;
            
    //         $this->templatefront->loadExternalCss('
    //                 <link rel="stylesheet" type="text/css" href="https://unpkg.com/vue-airbnb-style-datepicker@latest/dist/vue-airbnb-style-datepicker.min.css"/>'.
    //                 '<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">'
    //             );
            
    //         $this->templatefront->loadExternalJs('<script src="' . base_url() . '/theme_costume/plugin/vue/js/vue.js"></script>
    //             <script src="https://unpkg.com/vuejs-datepicker"></script>
    //             <script src="' . base_url() . '/theme_costume/plugin/vue/js/axios.min.js"></script>
    //             <script src="' . base_url() . '/theme_costume/plugin/vue/js/pagination.js"></script>
    //             <script src="' . base_url() . '/theme_costume/plugin/vue/js/vue-airbnb-style-datepicker.min.js"></script>
    //             <script src="https://unpkg.com/vee-validate@2.0.0-rc.21/dist/vee-validate.js"></script>
    //             <script src="' . base_url() . '/theme_costume/plugin/vue/js/date_fns.js"></script>
    //             <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
    //             <script src="' . base_url() . '/theme_costume/plugin/vue/js/app.js"></script>');
            
    //         $this->templatefront->loadContent('frontpage/book_view', array(
    //             "og_image" => "https://localhost/ubudsvilla/theme_costume//images/slider/slider-01.jpg",
    //             "og_title" => "Ubud Serendipity Villa",
    //             "og_desc" => "Ubud Serendipity Villa",
    //             "og_url" => "https://ubudserendipityvilla.com",
    //             "allRoom" => $roomDetail,
    //             "data" => $data
    //         ));
            
    // }
    
    
    public function checkout()
    {
        $this->load->library('form_validation');
        $config = array(
            array(
                'field' => 'idroom',
                'label' => 'Room Name',
                'rules' => 'trim|callback_select_empty'
            ),
            array(
                'field' => 'arrivaldate',
                'label' => 'Arrival Date',
                'rules' => 'required'
            ),
            array(
                'field' => 'departuredate',
                'label' => 'Departure Date',
                'rules' => 'required'
            ),
            array(
                'field' => 'fullname',
                'label' => 'Full Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'contact',
                'label' => 'Contact',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'country',
                'label' => 'Country',
                'rules' => 'trim|callback_select_empty'
            )
        );
        $this->form_validation->set_message('select_empty', 'You need to select an Option');
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg']   = array(
                'idroom' => form_error('idroom'),
                'fullname' => form_error('fullname'),
                'arrivaldate' => form_error('arrivaldate'),
                'departuredate' => form_error('departuredate'),
                'email' => form_error('email'),
                'contact' => form_error('contact'),
                'country' => form_error('country')
            );
            
        } else {
            $idroom = $this->input->post('idroom');
            
            $contentDir      = base_url() . '/theme_costume/static_content/';
            $tourDetailFiles = $contentDir . 'villa-room-details.json';
            $tourDetails     = file_get_contents($tourDetailFiles);
            if (!empty($tourDetails))
                $tourDetails = json_decode($tourDetails, TRUE);
            
            $collection    = collect($tourDetails);
            $selectRoom    = $collection->where('id', $idroom);
            $price         = $selectRoom->pluck("startprice")->first();
            $arrivaldate   = $this->input->post('arrivaldate');
            $departuredate = $this->input->post('departuredate');
            


            $stayduration = abs((strtotime($departuredate) - strtotime($arrivaldate)) / 86400);
            
                        
            $StayPay        = ($price * $stayduration);
            $totalAmountPay = $StayPay;
            
            
            $data = array(
                'idroom' => $this->input->post('idroom'),
                'roomname' => $this->input->post('roomname'),
                'fullname' => $this->input->post('fullname'),
                'arrivaldate' => $this->common->converttodate($this->input->post('arrivaldate')),
                'departuredate' => $this->common->converttodate($this->input->post('departuredate')),
                'totalAmountPay' => $totalAmountPay,
                'stayduration' => $stayduration,
                'email' => $this->input->post('email'),
                'contact' => $this->input->post('contact'),
                'country' => $this->input->post('country'),
                'submitdate' =>  date("Y/m/d")
            );
            
            
            if ($this->book_model->add_booking($data)) {

                $subject         = "[NEW BOOKING]" . " " . $data["fullname"] . "-" . $data["roomname"];
                $email           = $data["email"];
                $msg             = $this->load->view("frontpage/layout/email/email_confirm_view", '', true);
                
                //Name
                $msg = str_replace("%_name_cust", $data["fullname"], $msg);
                
                
                //Villa
                $msg = str_replace("%_villa",  $data['roomname'], $msg);
                
                //Checkin
                $msg = str_replace("%_checkin", $data['arrivaldate'], $msg);
                
                //Checkout
                $msg = str_replace("%_checkout", $data['departuredate'], $msg);
                
                //Duration
                $msg = str_replace("%_duration", $data['stayduration'], $msg);
                
                               
                //Total
                $totalAmountPay = $this->common->formatIDR($totalAmountPay,"$");
                $msg            = str_replace("%_totalharga", $totalAmountPay, $msg);
                
                $replayto = "ubudserendipityvillas@gmail.com";
                //send email to customer
                //$this->sendEmailQueueTable($subject, $msg, $email, $replayto);
                                
                

                //send email to User
                 $idEmailQueue = $this->sendEmailQueueTable($subject, $msg, $email, $replayto);
                
                 $result=array(
                            "error" => false,
                            "msg" => "Booking Added Successfully",   
                            "idsendemail" => $idEmailQueue   
                        );
                
            }
            
        }
        echo json_encode($result);
    }
    
    public function sendEmailQueueTable($subject, $msg, $emailSend, $replayto='',$emailCC='')
    {   
        //echo "masuk dode";
        $dataEmail = array(
                    "email_send" => $emailSend,
                    "email_cc" => $emailCC,
                    "replayTo" => $replayto,
                    "subject" => $subject,
                    "message" => $msg,
                    "createdAt" => date("Y/m/d")

                );

        //echo "<pre>"; print_r($dataEmail);die;
        
        return $this->book_model->add_emailQueue($dataEmail);
        
    } 

    public function sendEmail() 
    {
        $dataEmail = $this->book_model->get_emailQueue();
        foreach ($dataEmail->result() as $res) {
           //SEND ke CUSTOMER
            $replayto             = "ubudserendipityvillas@gmail.com";
            $emailCustomer = $res->email_send;
            $body = $res->message;
            $subject = $res->subject;
           	$this->common->send_email($subject, $body, $emailCustomer, $replayto);


           //SEND ke ADMIN WEB
            // $replayto             = $res->email_send;
            $emailAdmin = "ubudserendipityvillas@gmail.com";
            $body = $res->message;
            $subject = $res->subject;
            $this->common->send_email($res->subject, $res->message, $emailAdmin, $replayto); 

            $dataEmail = array(
                            "status" => 1
                        );
            $this->book_model->update_emailQueue($res->id,$dataEmail);
        }
    }
    
    function select_empty($element)
    {
        if ($element === 'null') {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    public function room($id)
    {
        
        $contentDir      = base_url() . '/theme_costume/static_content/';
        $tourDetailFiles = $contentDir . 'villa-room-details.json';
        $tourDetails     = file_get_contents($tourDetailFiles);
        if (!empty($tourDetails))
            $tourDetails = json_decode($tourDetails, TRUE);
        
        $collection = collect($tourDetails);
        $selectRoom = $collection->where('id', $id);
        
        
        if ($id == "1") {
            $page = "frontpage/room/bougenville";
        } elseif ($id == "2") {
            $page = "frontpage/room/jasmine";
        } elseif ($id == "3") {
            $page = "frontpage/room/lotus";
        }
        
        $this->templatefront->loadData("activeLink", array(
            "home" => 1
        ));
        
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
    
    
}

?>