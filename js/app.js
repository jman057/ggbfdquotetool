
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    showForm: false,
    step: 0,
    diretToCommittal: false,
    preferNotEmbalm: false,
    committalType: "Cremation",
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
    straightforward decision. If not, get together as a family and consider 
    what suits your circumstances best, taking into account cost,  religious 
    and cultural considerations and where family are located.  
    Cremation costs roughly one third as much as burial, depending 
    on whether you choose to have the ash remains buried at a cemetery 
    or other facility. You might elect to scatter or bury somewhere personal.
    </p>
    <p><strong>Bio Cremation:</strong> (sometimes referred to as Aqua Cremation) 
    is a process based on alkaline hyrolysis for the disposal of human remains 
    using water and potassium hydroxide. It is emerging as an alternative to 
    traditional flame based cremation as it uses only ¼ of the energy and produces 
    less carbon dioxide and pollutants. Alkaline Hydrolysis also produces no 
    mercury emissions. The process takes approximately 4-6 hours. The remaining 
    soft bone matter is crushed and returned to next of kin.</p>
    
    <p><strong>Natural Burial:</strong> The definition and standards vary, but 
    there are some common themes. Taking the beautiful description from The 
    Natural Burial Company, it is the direct earth burial of a body or cremated 
    remains in a biodegradable container that allows the elements to return 
    fully to the soil over time. There can be no embalming, nor is there 
    concrete or steel lined vault liners. Natural Burials are roughly half the 
    cost of a standard burial.</p>
    
    <p>In the spirit of fullness, a couple of committal options that are not usually thought of are:</p>
    
    <p><strong>Home Burial:</strong> You must own the property and obtain written consent 
    from the county or city planning commission. Full records must be kept and disclosure 
    of all burials made when the property is sold.</p>
    
    <p><strong>Burial at Sea:</strong> For bodies or the cremated remains, burial at 
    sea is governed by myriad state and federal laws. Understandably, there are 
    many restrictions and requirements regarding distance from land and depth of 
    water. As a result, burial at sea can cost 2-3 times that of a cemetery 
    interment. Contact a specialist maritime company to arrange.</p>
    `,
    moreInfoDTC: `
    <p>Direct to Cremation has typically meant the body is simply cremated without 
    a service. Cheaper than standard cremations it takes place outside peak operating 
    hours of the crematorium. Ashes are returned to the family. </p>

    <p>There are any number of reasons a family or individual might choose Direct to Cremation. 
    For some it is a way to remove the financial pressure that a funeral service brings.  
    For others it’s a way to keep things simple as it means that a raft of pressing decisions 
    like choosing a casket, flowers, venue and many other details can be delayed for a 
    little (or a long) time. Still others might be more motivated to spend differently 
    not necessarily less. This might mean an epic memorial service that puts the 
    budget towards a grand send off rather than items like a casket and hearse hire.</p>
    
    <p>It’s important to know:</p>
    
    <p>Funerals don’t have to cost a fortune. If you want a service with the casket present 
    there are ways of achieving this without spending a huge amount. Getting a quote is a
     great first step. Then check out our Guide for some great advice and tips on how to 
     achieve a memorable and personal funeral without breaking the bank.</p>
    
    <p>Wonderful services come in all shapes and sizes. Whether you have the casket 
    present, bring the ashes along or go without either they are all equally valid and 
    meaningful. In the end, what makes a great service is the personal touch, and that 
    simply takes some effort and thought. We can help with that.</p>
    `,
    moreInfoViewing: `
    <p>If you opt to have the casket open give thought to clothing, jewellery, medals or 
    other items that defined and represented the person being farewelled. Tradition has 
    previously meant formal attire like a suit for men or dress for women, but there is 
    no reason at all why you can’t do something different.  If he was a life long beach 
    lover, owned 20 Hawiian shirts and never wore a suit a day in his life, you might 
    want to do something less formal. Think about what makes sense and trust your instincts.</p>

    <p>Providing a photo will help the funeral director with presentation for hair and any makeup.</p>
    
    <p>Even if the casket won’t be open, you may still want to select a special outfit, 
    and consider other items like jewellery, medals, watch, favorite scarf or anything 
    else that perfectly captures the person. </p>
    
    <p>A reminder to select undergarments . . . With the attention on selecting just
     the right outfit it’s something people often forget. If you do forget please don’t
      worry. Funeral directors generally have a supply they will use. </p>
      
    
    <p>Read the <a href="https://woocommerce-207249-1003603.cloudwaysapps.com/personalising-the-coffin/" target ="_blank">
    Casket Personalisation</a> section in the Guide. Here you’ll find more information and 
    ideas on what to put on and in the casket to keep building a unique and 
    personal Great Goodbye.</p>`,
    moreInfoEmblaming: `
    <p>Embalming uses the chemicals formaldehyde and ethanol (plus others) to delay 
    decomposition of the body. It is not mandatory, but it is governed by certain criteria.</p>

    <p>For example, if more than 24 hours have elapsed since the death, the body will be removed 
    from refrigeration and transported, and if the body cannot reach its destination within 
    6 hours then embalming or a sealed rigid container is required.</p>
    
    <p>If the person died of HIV or AIDS, diptheria, hepatitis (B,C or D) plague, rabies, 
    tularemia or tuberculosis and the body will be shipped then embalming is required. 
    If religious custom probits embalming a sealed container is required. </p>
    
    <p>If there has been particular trauma or illness prior to death your funeral director 
    may guide you towards embalming and other preservation work if you wish to view the body.
    </P>
    
    <p>If you elect to have an open casket or some private visitation time this does 
    not necessarily mean you must embalm. For some, being empowered to have a 
    chemical free and environmentally lighter funeral is important.  Please check 
    the Guide for <a href="https://woocommerce-207249-1003603.cloudwaysapps.com/myth-six-you-must-embalm-the-body/" target="_blank">
    more info on an embalming-free way forward</a>. We’ll give you some helpful advice 
    on steps to take for the best care of the body.</p>
    
    <p>Embalming costs average between $500 and $700, and does not usually cost more than $1,000</p>
    `,
    moreInfoPrivateTime: `
    <p>Whether the casket is open or closed consider if your family would like 
    some private time ahead of the service. This might be especially important 
    for those coming from out of town who were unable to be there at the end. 
    Even after death, the chance to say important things or simply have a chat 
    can’t be overlooked. It can save a lifetime of pain and regret. </p>

    <p>Having the casket at home offers multiple opportunities for family and 
    friends to spend time. To ensure that family aren’t swamped, consider setting 
    aside a specific time for visitors.</p>
    
    <p>For any number of reasons having the casket at home might not work for your 
    family, in which case your selected funeral director will be happy to make 
    whatever arrangements you need. Having an appropriate facility might influence 
    your decision on which funeral director will suit best. Once you have your 
    quote, check funeral director listings in the marketplace where you can see 
    what facilities each has to offer.
    </p>
    `,
    moreInfoPlaceOfService: `
    <p>The service, in whatever form it takes, is where a lot of 
    the meaningful moments happen, and where you have the service 
    and any after function can influence the style of that service. 
    Nothing sets the tone of a Great Goodbyes more than location, 
    from the food you serve and even to how people might dress. A 
    funeral service held in a winery or at the beach will have a 
    different feel to one is a church or funeral home chapel. 
    There is no right or wrong; only what works best for the Great 
    Goodbye you’re creating.</p>

    <p>You’ll need to estimate how many people will attend so you can choose an appropriate sized venue and consider how many to cater for if providing refreshments. This can be tricky . A good rule of thumb is to make a list of extended family and friends that you know of and double it. You can then filter venues based on guest capacity. </p>
    
    <p>Next, consider how long you’d like the service be, and choose a venue that offers flexibility if you’d like extended time.  You might want more time to allow for greater than usual number of eulogies, readings or music. A private venue or family home works well here.  If the service is graveside, at a church or funeral chapel and an extended service is less available consider if you’d like  guests gather at a secondary venue to keep sharing and remembering. </p>
    
    
    <p>Lastly, think about post service refreshments. Does the venue have somewhere onsite to gather afterwards? If not, would you like to invite guests to a functions venue, restaurant or private home? 
     <a href="https://woocommerce-207249-1003603.cloudwaysapps.com/guide/" target="_blank">
    The Guide</a> has lots of great ideas on how you can shape a Great Goodbyes regardless of what venue you choose.</p>
    `,
    moreInfoTransport: `
    <p>While it is traditional to have the funeral director drive the casket, having a 
    family member take on this role is a special opportunity to get more involved in 
    the funeral service. You simply need to get written permission from the  deceased's 
    doctor or medical examiner. </p>

    <p>You will need an appropriate vehicle that has space to take the casket such as 
    station wagon, SUV or van and ensure you have people on hand to assist with carrying. 
    Consider if there is a special vehicle in your loved ones life that might really add 
    something unique. Some people have used a vintage fire truck, the farm tractor or pickup truck.</p>
    
    <p>Costs for multiple transports of the casket can add up. Having family handle some of the 
    transport is one way to reduce the cost of the funeral. Plus, you’ll get a deeply personal 
    Great Goodbye.</p>
    
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
