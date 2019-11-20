
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    showForm: false,
    step: 0,
    diretToCommittal: false,
    preferNotEmbalm: false,
    committalType: "Committal",
    committal: '',
    viewing: '',
    privatetime: '',
    service: '',
    formFields: [],
    name: '',
    email:'',
    phone:'',
    region: '',
    selectionError: false,
    moreInfoCommittal: `
      <p>If discussed and known prior to death, this is a relatively 
      straightforward decision. If not, gather as a family and consider what 
      suits your circumstances best, taking into account cost, and any 
      religious and cultural considerations. Cremation costs roughly one 
      third as much as burial, depending on whether you choose to have the 
      ash remains interred at a facility. </p>
      <p> In the spirit of fullness, a couple of committal options that are 
      not usually thought of are:</p>
    <p><strong>Home Burial:</strong> You must own the property and obtain 
    written consent from the county or city planning commission.
     Full records must be kept and disclosure of all burials made 
     when the property is sold.</p>
    <p><strong>Burial at Sea: </strong>For bodies or the cremated remains, 
    burial at sea is governed by myriad state and federal laws. 
    Understandably, there are many restrictions and requirements 
    regarding distance from land and depth of water. As a result, 
    burial at sea can cost 2-3 times that of a cemetery interment. 
    Contact a specialist maritime company to arrange.</p>
    `,
    moreInfoViewing: `
    <p>If you’re opting to have the casket open, give thought to clothing, 
    jewellery, medals or other items that defined and represented the person 
    being farewelled. Tradition has previously meant formal attire like a suit 
    for men or dress for women, but there is no reason at all why you can’t do 
    something different.  If he was a life long beach lover, owned 20 Hawiian
     shirts and never dressed up a day in his life then a suit doesn’t really 
     fit does it? Think about what makes sense and trust your instincts.</p>

    <p>Providing a photo will help the funeral director with presentation for 
    hair and any makeup.</p>
    
    <p>Even if the casket won’t be open, you may still want to select a special 
    outfit, and consider other items like jewellery, medals, watch, favorite 
    scarf or anything else that perfectly captures the person. </p>
    
    <p>Read the <a href="https://woocommerce-207249-1003603.cloudwaysapps.com/personalising-the-coffin/" target ="_blank">
    Casket Personalisation</a> section in the Guide. Here you’ll find 
    more information and ideas on what to put on and in the casket to keep building 
    a unique and personal Great Goodbye.</p>`,
    moreInfoEmblaming: `
    <p>Embalming uses the chemicals formaldehyde and ethanol (plus others) 
    to delay composition of the body. It is not mandatory, but it is governed 
    by certain criteria.</P>

    <p>For example, if more than 24 hours have elapsed since the death, 
    and the body will be removed from refrigeration and transported, if the 
    body cannot reach its destination within 6 hours then embalming or a sealed 
    rigid container is required.</P>
    
    <p>If the person died of HIV or AIDS, diptheria, hepatitis (B,C or D) plague, 
    rabies, tularemia or tuberculosis and the body will be shipped then embalming 
    is required. If religiousreligous custom probits embalming a sealed container 
    is requied. </p>
    
    <p>If there has been particular trauma or illness prior to death your funeral 
    director may guide you towards embalming and other preservation work if you wish 
    to view the body. </P>
    
    <p>If you elect to have an open casket or some private visitation time this 
    does not necessarily mean you must embalm. For some, being empowered to have a 
    chemical free and environmentally lighter funeral is important.  Please check 
    the Guide for <a href="https://woocommerce-207249-1003603.cloudwaysapps.com/myth-six-you-must-embalm-the-body/" target="_blank">
    more info on an embalming-free way forward</a>. We’ll give you some 
    helpful advice on steps to take for the bestfor best care of the body.</p>
    
    <p>Embalming costs average between $500 and $700, and does not usually cost more than $1,000</p>
    `,
    moreInfoPrivateTime: `
    <p>Whether the casket is open or closed consider if your family 
    would like some private time ahead of the service. This might be especially 
    important for those coming from out of town who were unable to be there at the end. 
    Even after death, the chance to say important things or simply have a chat 
    can’t be overlooked. It can save a lifetime of pain and regret. </p>

    <p>Having the casket at home offers multiple opportunities for family and 
    friends to spend time. To ensure that family aren’t swamped, consider setting 
    aside a specific time window for visitors.</p>
    
    <p>For any number of reasons this might not work for your family, in which case 
    your selected funeral director will be happy to make whatever arrangements 
    you need. Having an appropriate facility might influence your decision on 
    which funeral director will suit best. Once you have your quote, 
    check funeral director listings in the marketplace where you can see 
    what facilities each has to offer. </p>
    `,
    moreInfoPlaceOfService: `
    <p>A service, in whatever form it takes, is where a lot of the meaningful 
    moments happen. And where you have the service and any after function influences 
    the style of the service - everything takes its cue from this. A funeral service 
    held in a winery or at the beach will have a different feel to one is a church or 
    funeral home chapel. There is no right or wrong; only what works best for the 
    Great Goodbye you’re creating. </p>

    <p>You’ll need to estimate how many people will attend. Make a list of extended 
    family and friends that you know of and double it. You can then filter venues 
    based on guest capacity. </p>
    
    <p>Next, consider how long the service will be, and choose a venue that offers 
    flexibility if you’d like extended time.  A private venue or family home works 
    well. If the service is graveside, at a church or funeral chapel, consider if you’d 
    like guests gather at a secondary venue to keep sharing and remembering.</p>
    
    <p>Lastly, think about post service refreshments. Is there somewhere onsite to 
    gather afterwards? If not, would you like to invite guests to a functions venue, 
    restaurant or private home? <a href="https://woocommerce-207249-1003603.cloudwaysapps.com/guide/" target="_blank">
    The Guide</a> has lots of great ideas on how 
    you can shape a Great Goodbyes regardless of what venue you choose.</p>
    `,
    moreInfoTransport: `
    <p>In a break with tradition, having a family member drive the casket is a 
    special opportunity to get more involved in the funeral service. You simply need 
    to get permission from the  deceased's doctor or medical examiner in writing. </p>

    <p>You will need an appropriate vehicle that has space to take the casket such as 
    station wagon, SUV or van and ensure you have people on hand to assist with carrying.</p>
    
    <p>Multiple transports can add up. Having family handle some of the transport is 
    one way to reduce the cost of the funeral. Plus, you’ll get a deeply personal Great 
    Goodbye.</p>
    
    <p>Not sure if this is right for you? <a href="https://woocommerce-207249-1003603.cloudwaysapps.com/myth-ten-the-body-must-be-transported-by-the-funeral-director/" target="_blank">
    Read a couple of our blogs</a> about how others 
    have taken on the role of driving the casket. You’ll find them inspiring. </p>
    `


  },
  watch:{
    formFields: function(val){
      if(this.step == 1){
        this.committalType = this.formFields[this.step];
      }  
    }
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

      if(!this.canProgress){
        this.selectionError = true;
        return false;
      }
      
      this.selectionError = false;
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
    validate: function(){
      console.log('validation fn called');
    },

  }

})
