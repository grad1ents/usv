var datepickerOptions = {}
Vue.use(window.AirbnbStyleDatepicker, datepickerOptions)

Vue.use(VueMultiselect)
Vue.component('vue-multiselect', window.VueMultiselect.default)

Vue.use(VeeValidate)
Vue.filter('readMore', function (text, length, suffix) {
    return text.substring(0, length) + suffix;
});

//dynamic url
let url = window.location.origin+"/";

if(url.includes("localhost")){
  var pathArray = window.location.pathname.split( '/' );
  url = url + pathArray [1] + "/";
}

var v = new Vue({
   el:'#bigApp',
    data: {
      date: '',
      step1:true,
      step2:false,
      step3:false,
      link:url,
      newBooking:{
            idroom:null,
            roomname:'',
            arrivaldate:'',
            departuredate:'',
            fullname:'',
            country:"",
            email:'',
            contact:'',
            ordernote:''},
      idTableEmailQueue:'',
      selectCountry:null,
      option_room_villa:[],
      option_country:[],
      rooms:[],
      successBookingMessage:false,      
      bookingFormActive:true,
      isShowInfoRoom:false,
      formValidate:[],
      selectRoom :[],
      selectValue:'',
      dateFormat: 'D MMM YYYY',
      inputDateOne: '',
      inputDateTwo: '',
      sundayFirst: false,
      alignRight: false,
      trigger: false,
      isLoading: false,
      minDate: new Date()
    },
    created(){
        this.getOptionRooms();
        this.getOptionCountry();
        this.getDirectDataRoom();
    },
    methods:{
        getDirectDataRoom(){
          let idroom = document.getElementById("idroomselected").value
          if(idroom!=''){
              axios.get(this.link + "book/getdirectdataroom/"+idroom)
                .then(response => {
                   //console.log(response.data.dataSelectedRoom[idroom-1])
                   v.selectRoom = response.data.dataSelectedRoom[idroom-1]
                   if(v.selectRoom){
                      v.newBooking.idroom = v.selectRoom.id
                      v.newBooking.roomname =  v.selectRoom.name
                      this.step1=false
                      this.step2=true
                      this.isShowInfoRoom=true
                   }
                })
          }

        },
        getOptionRooms() {
            let self = this
            axios.get(this.link + "/theme_costume/static_content/villa-room-details.json")
                .then(response => {
                    self.option_room_villa = response.data
                    self.rooms = response.data
                })
        },
        getOptionCountry() {
            let self = this
            axios.get(this.link + "/theme_costume/static_content/country.json")
                .then(response => {
                    self.option_country = response.data
                })
        },
        name_country({name}) {

            return `${name}`
        },
        name_room({no,name}) {

            return `${name}`
        },
        selectIdRoom(room){ 
          v.selectRoom = room
          v.newBooking.idroom = room.id;
          
          v.step1 = false;
          v.step2 = true;  
          v.isShowInfoRoom = true;
        },
        showAllRoom(){ 
               axios.get(this.link+"room/showAllRoom/").then(function(response){
              if(response.data.rooms != null){
                       v.rooms = response.data;
                    }
            })
        },
          updateNewBookingCountry(){ 
              v.newBooking.country = this.selectCountry.name
          },
          updateNewBookingRoomName(){ 
              v.newBooking.roomname = this.selectRoom.name 
          },

          addBooking(){  
            let self = this
            return this.$validator.validateAll("step1").then((result) => {
                 if (!result) {
                      alert('Please Complete the from below')
                      return false;
                  } else {
                      v.step1=false      
                      v.step2=false  
                      v.step3=true  
                      this.isLoading = true
                      this.bookingFormActive = false
                      this.departuredate = ((this.departuredate==null)?this.arrivaldate:this.departuredate)
                      var formData = v.formData(v.newBooking);
                      axios.post(this.link+"book/checkout", formData).then(function(response){
                          if(response.data.error){
                              v.isLoading = false
                              v.bookingFormActive=true,
                              v.formValidate = response.data.msg;
                          }else{
                              v.idTableEmailQueue = response.data.idsendemail;
                              v.successMSG = response.data.msg;
                              v.isLoading = false
                              v.clearAll();
                              v.successBookingMessage=true;
                              axios.post(v.link+"book/sendEmail/").then(function(response){
                                    console.log("sukses kirim email")
                                    return true
                                 })
                          }
                         });

                       return true
                  }
            })
           
        },
        formData(obj){
            var formData = new FormData();
                for ( var key in obj ) {
                    formData.append(key, obj[key]);
                } 
                return formData;
          },
          linkRoom(value){
            return this.link+'/room/detail/'+value; //for image gender sign in the table
          },
          linkImageRoom(value){
            return this.link+'theme_costume/images/room/'+value; //for image gender sign in the table
          },

        clearAll(){
            v.newUser = { 
                        idroom:null,
                        arrivaldate:'',
                        departuredate:'',
                        fullname:'',
                        country:'',
                        email:'',
                        contact:'',
                        ordernote:''}
            v.formValidate = false;
            
        },
        formatDates: function(dateOne, dateTwo) {
            var formattedDates = ''
            if (dateOne) {
              formattedDates = dateFns.format(dateOne, this.dateFormat)
            }
            if (dateTwo) {
              formattedDates += ' - ' + dateFns.format(dateTwo, this.dateFormat)
            }
            return formattedDates
          },
          onClosed: function() {
            var datesStr = this.formatDates(this.newBooking.arrivaldate, this.newBooking.departuredate)
            // if(this.newBooking.arrivaldate){
            //     this.errors.remove(field);  
            // }

            console.log('Dates Selected: ' + datesStr)
            this.trigger = false
          },
          toggleAlign: function() {
            this.alignRight = !this.alignRight
          },
          triggerDatepicker: function() {
            this.trigger = !this.trigger
          },
          onMonthChange: function(dates) {
            console.log('months changed', dates)
          }
     
  }
})