



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
    formFields: []


  },
  computed:{
      progressPercentage: function (){
        if(this.diretToCommittal){
          return this.step/3*100
        }else{
          return this.step/7*100
        }
      },
      canProgress:function(){
        checkSteps = [2,3,4,5]
        if(checkSteps.includes(this.step)){
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

      if(this.diretToCommittal && this.step == 2){
        this.step = 7
      }else{
        this.step++
      }


    },
    prev: function() {
      if(this.diretToCommittal && this.step == 7){
        this.step = 2
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
