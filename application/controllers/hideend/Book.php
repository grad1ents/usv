<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* @property PhpWord_model $PhpWord_model */


class Book extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("content_model");
		$this->load->model("book_model");
		$this->load->model("user_model");
		$this->load->model("pengajuan_model");
		$this->load->model("verifikasi_model");
		if (!$this->user->loggedin) redirect(site_url("hideend/login"));
		if(!$this->common->has_permissions(array(
				"admin", "content_manager", "content_worker","admin_members"), $this->user)) {
				$this->template->error(lang("error_81"));
		}
	}

	function random_color_part() {
    		return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}

	function random_color() {
	    return "#".$this->random_color_part() . $this->random_color_part() . $this->random_color_part();
	}

	public function calendar()
	{	
		$allCalendar =$this->showAllData();

		$plan = "[";
		foreach ($allCalendar as $cal) {
			$color = $this->random_color();
			$plan .=	"{
			          title          : '".$cal->fullname."-".$cal->roomname."',
			          start          : '".$cal->arrivaldate."',
			          end            : '".$cal->departuredate."',
		          	  allDay         : false,
			          backgroundColor: '".$color."', //red
			          borderColor    : '".$color."' //red
			        },";
			
		}

		$plan .= "]";
		// echo "<pre>"; print_r( $plan);die;

			

		$script = '<script>
		  $(function () {

		    /* initialize the external events
		     -----------------------------------------------------------------*/
		    function init_events(ele) {
		      ele.each(function () {

		        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
		        // it doesn"t need to have a start or end
		        var eventObject = {
		          title: $.trim($(this).text()) // use the element"s text as the event title
		        }

		        // store the Event Object in the DOM element so we can get to it later
		        $(this).data("eventObject", eventObject)

		        // make the event draggable using jQuery UI
		        $(this).draggable({
		          zIndex        : 1070,
		          revert        : true, // will cause the event to go back to its
		          revertDuration: 0  //  original position after the drag
		        })

		      })
		    }

		    init_events($("#external-events div.external-event"))

		    /* initialize the calendar
		     -----------------------------------------------------------------*/
		    //Date for the calendar events (dummy data)
		    var date = new Date()
		    var d    = date.getDate(),
		        m    = date.getMonth(),
		        y    = date.getFullYear()
		    $("#calendar").fullCalendar({
		      header    : {
		        left  : "prev,next today",
		        center: "title",
		        right : "month"
		      },
		      buttonText: {
		        today: "today",
		        month: "month",
		        week : "week",
		        day  : "day"
		      },
		      //Random default events
		      events    : '.$plan.',
		      editable  : false,
		      droppable : false, // this allows things to be dropped onto the calendar !!!
		      drop      : function (date, allDay) { // this function is called when something is dropped

		        // retrieve the dropped element"s stored Event Object
		        var originalEventObject = $(this).data("eventObject")

		        // we need to copy it, so that multiple events don"t have a reference to the same object
		        var copiedEventObject = $.extend({}, originalEventObject)

		        // assign it the date that was reported
		        copiedEventObject.start           = date
		        copiedEventObject.allDay          = allDay
		        copiedEventObject.backgroundColor = $(this).css("background-color")
		        copiedEventObject.borderColor     = $(this).css("border-color")

		        // render the event on the calendar
		        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
		        $("#calendar").fullCalendar("renderEvent", copiedEventObject, true)

		        // is the "remove after drop" checkbox checked?
		        if ($("#drop-remove").is(":checked")) {
		          // if so, remove the element from the "Draggable Events" list
		          $(this).remove()
		        }

		      }
		    })

		    /* ADDING EVENTS */
		    var currColor = "#3c8dbc" //Red by default
		    //Color chooser button
		    var colorChooser = $("#color-chooser-btn")
		    $("#color-chooser > li > a").click(function (e) {
		      e.preventDefault()
		      //Save color
		      currColor = $(this).css("color")
		      //Add color effect to button
		      $("#add-new-event").css({ "background-color": currColor, "border-color": currColor })
		    })
		    $("#add-new-event").click(function (e) {
		      e.preventDefault()
		      //Get value and make sure it is not null
		      var val = $("#new-event").val()
		      if (val.length == 0) {
		        return
		      }

		      //Create events
		      var event = $("<div />")
		      event.css({
		        "background-color": currColor,
		        "border-color"    : currColor,
		        "color"           : "#fff"
		      }).addClass("external-event")
		      event.html(val)
		      $("#external-events").prepend(event)

		      //Add draggable funtionality
		      init_events(event)

		      //Remove event from text input
		      $("#new-event").val("")
		    })
		  })
		</script>';



  		$this->template->loadExternal(
			'<link rel="stylesheet" href="'.$this->common->theme_hideend().'ltetheme/bower_components/fullcalendar/dist/fullcalendar.min.css">'.
			'<link rel="stylesheet" href="'.$this->common->theme_hideend().'ltetheme/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">'
			);
		$this->template->loadExternalJs(
			'<script src="'.$this->common->theme_hideend().'ltetheme/bower_components/moment/moment.js"></script>'.
			'<script src="'.$this->common->theme_hideend().'ltetheme/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>'.
			$script
			);
		$this->template->loadContent("hidepage/book/calendar.php");


	}		
	public function all()
	{
		$this->template->loadData("activeLink",
			array("content" => array("general" => 1)));

		$vueComponent = $this->load->view("hidepage/vue/ComponentBookingUSV.js",'',true);
		$this->template->loadExternal(
			'<link rel="stylesheet" href="https://unpkg.com/vue-form-wizard/dist/vue-form-wizard.min.css">'.
			'<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">'.
			'<link rel="stylesheet" href="https://unpkg.com/vue-airbnb-style-datepicker@latest/dist/vue-airbnb-style-datepicker.min.css">'
			);

		$this->template->loadExternalJs(
			'<script src="https://unpkg.com/vue-form-wizard/dist/vue-form-wizard.js"></script>'.
			'<script src="https://cdn.jsdelivr.net/npm/vue-the-mask@0.11.1/dist/vue-the-mask.min.js"></script>'.
			'<script src="https://unpkg.com/vee-validate@2.0.0-rc.21/dist/vee-validate.js"></script>'.
			'<script src="https://unpkg.com/vue-multiselect@2.1.6/dist/vue-multiselect.min.js"></script>'.
			'<script src="'.$this->common->theme_hideend().'plugins/js/vue-airbnb-style-datepicker.min.js"></script>'.
			'<script src="'.$this->common->theme_hideend().'plugins/js/date_fns.js"></script>'.
			$vueComponent.
			'<script src="'.$this->common->theme_hideend().'plugins/js/appBooking.js"></script>'
			);
		$this->template->loadContent("hidepage/book/status.php", array(
			)
		);
	}


	public function showAll($jenisAkun=''){

       	$query =  $this->book_model->showAll();
       	$result = [];
        if($query){
            $result['book'] = $query;
        }
        echo json_encode($result);	
	}

	public function showAllData(){

       	$query =  $this->book_model->showAll();
       	$result = [];
        if($query){
            $result= $query;
        }
        return $result;	
	}







	
	


}

?>
