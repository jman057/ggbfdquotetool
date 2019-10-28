



var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    showForm: false,
    step: 0,
    diretToCommittal: false,
    toQuote: false,
    value: "on",
    committal: '',
    viewing: '',
    private: ''

  },
  computed:{
      progressPercentage: function (){
        if(this.diretToCommittal){
          return this.step/3*100
        }else{
          return this.step/7*100
        }
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
