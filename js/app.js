
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    showForm: false,
    step: 0,
    diretToCommittal: false,
    preferNotEmbalm: false,
    committal: '',
    viewing: '',
    privatetime: '',
    service: '',
    formFields: [],
    name: '',
    email:'',
    phone:'',
    region: ''


  },
  computed:{
      progressPercentage: function (){
        if(this.diretToCommittal){
          return this.step/2*100
        }else{
          return this.step/6*100
        }
      },
      canProgress:function(){
        checkSteps = [1,2,3,4]
      
        if(checkSteps.includes(this.step)){
          //check to see if a value has been set for the current step. return boolean.
          var rtn = (!!this.formFields[this.step]);
        
        }else{
          var rtn = true;
     
        }
     
        return rtn;

      }
  },
  methods: {
    newQuote: function () {
      this.showForm = true
      this.step = 1

    },
    next: function (){

      if(this.diretToCommittal && this.step == 1){
        this.step = 6
      }else{
        this.step++
      }


    },
    prev: function() {
      if(this.diretToCommittal && this.step == 6){
        this.step = 1
      }else{
        this.step--
      }


    },
    cancel: function(){
      this.step = 0
      this.showForm = false
    },

  }

})
