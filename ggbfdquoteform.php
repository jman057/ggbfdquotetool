<?php

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">




<div class="container">
  <!-- Content here -->

  <div id="app">

    <div v-if="!step">
    <h2 class="step-heading"> Funeral Quote Tool</h2>
    <p> Here, you’ll work through some important decisions you need to consider. 
    We’ll contact funeral homes on your behalf and be back to you within 24 hours – 
    sooner if you tell us it’s urgent. Your details remain private until you decide 
    you wish to connect with one of the funeral homes. </p>

  <p>Your quote won’t include the kinds of decisions that are variable. Things like 
  venue hire, catering, flowers, even caskets have wide-ranging prices. 
  How much you spend  depends on the choices you make, and whether family 
  and friends wish to take on some aspects themselves.</p>

<p>Don’t worry, we can help you out with those decisions too, 
but first, let’s get the basics sorted out. 
 </p>



      <div class="info-wrapper">
      <p>Your quote will include the funeral homes fixed service fee. 
      This is a charge that covers their availability to make arrangements 
      on your behalf, handling paperwork, registering the death and medical 
      certificate, and a contribution to overheads. The amount of this fee can
       differ - it’s one of the reasons getting a quote is a good idea.
       </p>
       </div>



      <div style="display:flex; flex-direction: column; align-items: center;">

          <button @click="newQuote" type="submit" class="btn btn-primary float-right"
          >Start
        </button>

        <img src="<?= $this->plugin_url ?>assets/checklist.png">
      </div>

    </div>





    <!-- quote tool form wrapper -->
    <!-- quote tool form wrapper -->
    <!-- quote tool form wrapper -->
    <!-- action="https://formspree.io/xneboqbm" -->
    <form
    action="https://formspree.io/xneboqbm"
    method="POST"
    v-if="showForm" class="card">
        <div class="card-body">
    <div class="progress">
      <div class="progress-bar" role="progressbar" v-bind:style="{width: progressPercentage + '%'}" aria-valuenow="{{message}}" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <!-- hidden input for Formspree redirect -->
    <input type="hidden" name="_next" value="https://www.great-goodbyes.com/quote-request-received/"/>



      <!-- block one -->
      <!-- block one -->
      <!-- block one -->
      <!-- temporarily hidden while we agree to the structure -->
      <div class="form-step" v-show="step == -1">

        <h2 class="step-heading">Funeral Directors Fee</h2>
        <p>All funeral directors charge a fixed service fee.  It covers being available to make
          arrangements on your behalf, managing all required paperwork like the death and
          medical certificates, and a contribution towards their overheads   </p>

          <toggle-select tooltip = "The Funeral Director's fee is not optional and is always included as part of the Funeral Dreictor's service" name = "inputname"  title = "Funeral Director's base service fee is included as a matter of course."  disabled="true" checked="true"></toggle-select>

      </div>







<!-- form block 2 -->
<!-- form block 2 -->
<!-- form block 2 -->


      <div class="form-step" v-show="step==1">
        <h2 class="step-heading">Cremation or Burial</h2>
        <div class="step-description-wrapper">


          <span class="step-description">
            <p>The funeral home will quote for body disposition based on 
            the decision you make here. This will include required paperwork, 
            transport and other costs specific to your selection.
          </p>
          </span>



        </div>
        <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="Cremation or Burial"
        :contents=moreInfoCommittal id="Committal"></help-icon-modal>

          <div class="switch-field">
              <input @click = "selectionError = false" type="radio" id="bury" name="committal" value="Burial" v-model="formFields[1]" checked/>
              <label for="bury" :class="{ error: selectionError }">
                <div class="ggb-select-image">
                  <img v-if = "formFields[step] == 'Burial'" src="<?= $this->plugin_url ?>assets/bury-active.svg">
                  <img v-else src="<?= $this->plugin_url ?>assets/bury-normal.svg">
                </div>
                <div class="title">Bury</div>
                <div class="description">This does not include the burial plot or headstone.</div>
              </label>


              <input @click = "selectionError = false" type="radio" id="cremate" name="committal" value="Cremation" v-model="formFields[1]"/>
              <label for="cremate" :class="{ error: selectionError }">

                  <div class="ggb-select-image">
                      <img v-if = "formFields[step] == 'Cremation'" src="<?= $this->plugin_url ?>assets/cremate-active.svg">
                      <img v-else src="<?= $this->plugin_url ?>assets/cremate-normal.svg">
                    </div>
                    <div class="title">Cremation</div>
                    <div class="description">The family will have ashes returned for scattering or burying.</div>

              </label>
              <input @click = "selectionError = false" type="radio" id="aquacremate" name="committal" value="Bio Cremation" v-model="formFields[1]" />
              <label for="aquacremate" :class="{ error: selectionError }">

                  <div class="ggb-select-image">
                      <img v-if = "formFields[step] == 'Bio Cremation'" src="<?= $this->plugin_url ?>assets/aqua-active.svg">
                      <img v-else src="<?= $this->plugin_url ?>assets/aqua-normal.svg">
                    </div>
                    <div class="title">BioCremation</div>
                    <div class="description">Emerging as a more environmentally friendly way for cremation of the body.</div>
              </label>
            </div>


<!-- Direct to commital -->

          <h3 class="step-sub-heading">Direct to {{committalType}} </h3>

          <div class="step-description-wrapper">

                <span class="step-description">
                  <p>Electing Direct to {{committalType}} means the funeral 
                  homes involvement is limited to paperwork and body disposal. </p>
                </span>



              </div>


              <help-icon-modal imgroot="<?= $this->plugin_url ?>" :title = "'Direct to ' + committalType" :contents="moreInfoDTC" id="dtc"></help-icon-modal>



              <toggle-select v-model="diretToCommittal" name = "dtc"  :title = "'Direct to ' + committalType"></toggle-select>

              <div v-if="diretToCommittal" class="info-wrapper">
      <p>Not 100 percent sure if this is right for you or what’s involved? see <a>More Info</a> for guidance.
       </p>
       </div>




        </div>





<!-- SETION 3 -->
<!-- SETION 3 -->
<!-- SETION 3 -->

<div class="form-step" v-show="step==2">
  <h2 class="step-heading">Viewing the body</h2>
  <div class="step-description-wrapper">
    <div class="step-description">
        <p>It’s not for everyone, but for some it’s important to see their loved one, 
        one last time after death has occurred. It’s the chance for a final kiss or 
        touch of the hand. Your quote will include preparation and presentation of the body. 
        Where viewing takes place is dealt with in the next question.

          </p>
    </div>
  </div>
    <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="Viewing the body" :contents="moreInfoViewing" id="viewingmodal" v-model="formFields[step]"></help-icon-modal>
<!-- inputs -->
  <div class="switch-field wide">
      <input @click = "selectionError = false" type="radio" id="opencasket" name="viewing" value="opencasket" v-model="formFields[2]" checked/>
      <label for="opencasket" :class="{ error: selectionError }">
        <div class="ggb-select-image">
          <img v-if = "formFields[step] == 'opencasket'" src="<?= $this->plugin_url ?>assets/casket-open-active.svg">
          <img v-else src="<?= $this->plugin_url ?>assets/casket-open-normal.svg">
        </div>
        <div class="title">Open Casket</div>
        <div class="description">We would like to have the casket open at some point</div>
      </label>

      <input @click = "selectionError = false" type="radio" id="closedcasket" name="viewing" value="closedcasket" v-model="formFields[2]"/>
      <label for="closedcasket" :class="{ error: selectionError }">

          <div class="ggb-select-image">
              <img v-if = "formFields[step] == 'closedcasket'" src="<?= $this->plugin_url ?>assets/casket-closed-active.svg">
              <img v-else src="<?= $this->plugin_url ?>assets/casket-closed-normal.svg">
            </div>
            <div class="title">Closed Casket</div>
            <div class="description">We do not require the casket open at all.</div>

      </label>

    </div>

  <h3 class="step-sub-heading">Embalming  </h3>

  <div class="step-description-wrapper">
    <div class="step-description">
    <p>Embalming adds financial and environmental costs to a funeral. 
    Although occasionally required if transporting the body some distance, 
    it is rarely necessary for other reasons and there are alternative options if 
    you would prefer not to embalm.
</p>

  </div>
  </div>
  <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="Embalming" :contents="moreInfoEmblaming" id="embalm"></help-icon-modal>

      <toggle-select v-model="preferNotEmbalm" name = "prefernotembalm"  title = "It is our strong preference not to embalm" checked=""></toggle-select>

  </div>




<!-- SETION 4 -->
<!-- SETION 4 -->
<!-- SETION 4 -->

<div class="form-step" v-show="step==3">
  <h2 class="step-heading">Private time / Visitation</h2>
  <div class="step-description-wrapper">

    <div class="step-description">
      <p>For many families taking some private time with their loved one before 
      the service is important. It’s the chance to have a quiet chat and say goodbye.  
      It might be an extended time at home, or an hour or two at funeral home premises. 
      This decision impacts transport arrangements and the funeral professional’s time. 
</p>

    </div>
  </div>
      <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="Private time / Visitation" :contents="moreInfoPrivateTime" id="privatetime"></help-icon-modal>

<!-- inputs -->
<div class="switch-field">
    <input @click = "selectionError = false" type="radio" id="facility" name="privatetime" value="facility" v-model="formFields[3]" checked/>
    <label for="facility" :class="{ error: selectionError }">
      <div class="ggb-select-image">
        <img v-if = "formFields[step] == 'facility'" src="<?= $this->plugin_url ?>assets/funeral-directors-active.svg">
        <img v-else src="<?= $this->plugin_url ?>assets/funeral-directors-normal.svg">
      </div>
      <div class="title">At the funeral home</div>
      <div class="description">Chapel or purpose-specific room</div>
    </label>


    <input @click = "selectionError = false" type="radio" id="otherlocation" name="privatetime" value="otherlocation" v-model="formFields[3]"/>
    <label for="otherlocation" :class="{ error: selectionError }">

        <div class="ggb-select-image">
            <img v-if = "formFields[step] == 'otherlocation'" src="<?= $this->plugin_url ?>assets/another-location-active.svg">
            <img v-else src="<?= $this->plugin_url ?>assets/another-location-normal.svg">
          </div>
          <div class="title">At another location</div>
          <div class="description">At home or arranged venue</div>

    </label>
    <input @click = "selectionError = false" type="radio" id="noprivatetime" name="privatetime" value="noprivatetime" v-model="formFields[3]" />
    <label for="noprivatetime" :class="{ error: selectionError }">

        <div class="ggb-select-image">
            <img v-if = "formFields[step] == 'noprivatetime'" src="<?= $this->plugin_url ?>assets/no-visitation-active.svg">
            <img v-else src="<?= $this->plugin_url ?>assets/no-visitation-normal.svg">
          </div>
          <div class="title">Not Required</div>
          <div class="description">Private visitation is not required</div>
    </label>
  </div>





</div>


<!-- SETION 5 -->

<div class="form-step" v-show="step==4" >
  <h2 class="step-heading">Place of Service</h2>
  <div class="step-description-wrapper">

    <div class="step-description">
              <p>Whether grand or grassroots, formal or freestyle the service 
              can be anywhere that suits your family and the kind of Great Goodbye 
              you’re creating. Consider how many people you need to host and 
              whether you want to follow the service with an extended, less formal gathering.</p>
 
 <p>This selection impacts transport costs, and unless you’re having the service at home 
 there could be a cost associated with the venue hire.
 </p>

       
    </div>
  </div>
    <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="Place of Service" :contents="moreInfoPlaceOfService" id="service"></help-icon-modal>
<!-- selection -->
<div class="switch-field wide">
    <input @click = "selectionError = false" type="radio" id="graveside" name="service" value="Gravesite" v-model="formFields[4]" checked/>
    <label for="graveside" :class="{ error: selectionError }">
      <div class="ggb-select-image">
        <img v-if = "formFields[step] == 'Gravesite'" src="<?= $this->plugin_url ?>assets/graveside-active.svg">
        <img v-else src="<?= $this->plugin_url ?>assets/graveside-normal.svg">
      </div>
      <div class="title">Graveside</div>
      <div class="description">Outdoor service with casket lowering.</div>
    </label>

    <input @click = "selectionError = false" type="radio" id="fdfacility" name="service" value="Funeral Directors Facility" v-model="formFields[4]"/>
    <label for="fdfacility" :class="{ error: selectionError }">

        <div class="ggb-select-image">
            <img v-if = "formFields[step] == 'Funeral Directors Facility'" src="<?= $this->plugin_url ?>assets/funeral-directors-active.svg">
            <img v-else src="<?= $this->plugin_url ?>assets/funeral-directors-normal.svg">
          </div>
          <div class="title">Funeral Home</div>
          <div class="description">A dedicated chapel, private room or other service space.</div>

    </label>

  </div>
<div class="switch-field wide">
    <input @click = "selectionError = false" type="radio" id="worship" name="service" value="Place of Worship" v-model="formFields[4]" checked/>
    <label for="worship" :class="{ error: selectionError }">
      <div class="ggb-select-image">
        <img v-if = "formFields[step] == 'Place of Worship'" src="<?= $this->plugin_url ?>assets/place-of-worship-active.svg">
        <img v-else src="<?= $this->plugin_url ?>assets/place-of-worship-normal.svg">
      </div>
      <div class="title">Place of worship</div>
      <div class="description">Quaint or grand for familiarity, formality and comfort.</div>
    </label>

    <input @click = "selectionError = false" type="radio" id="altvenue" name="service" value="Alternative Venue" v-model="formFields[4]"/>
    <label for="altvenue" :class="{ error: selectionError }">

        <div class="ggb-select-image">
            <img v-if = "formFields[step] == 'Alternative Venue'" src="<?= $this->plugin_url ?>assets/alternatice-venue-active.svg">
            <img v-else src="<?= $this->plugin_url ?>assets/alternatice-venue-normal.svg">
          </div>
          <div class="title">Altenative Venue</div>
          <div class="description">A family home or another special place.</div>

    </label>
  </div>

</div>


<!-- SETION 6 -->

<div class="form-step" v-show="step==5">
  <h2 class="step-heading">Transporting the casket</h2>
  <div class="step-description-wrapper">
        <div class="step-description">

        <p>Driving the casket to the service and/or on to the committal is a 
        special way to personalise a Great Goodbye. For some, taking this last 
        drive together is deeply meaningful. </p>

    <p>If that’s not for you, your funeral professional will be honoured to do 
    this task on your family’s behalf. Getting a quote doesn’t lock you into a 
    decision. You’ve probably not thought about this option before so talk about 
    it with family.
</p>

        </div>
    </div>
      <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="Transport" :contents="moreInfoTransport" id="transport"></help-icon-modal>
      <h3 class="step-sub-heading">Please quote for transport of the casket </h3>


  <toggle-select
    name = "collection"
    tooltip="This is always included as part of the standard Funeral Director's services "
    title = "Body collection from place of death"

    selecteddescription = "Funeral Director will quote for transport"
    disabled="true"
    checked="true">
  </toggle-select>
  <toggle-select
    name = "transport-to-service"
    :title = "'Transport to the ' + formFields[4] + ' for the service'"
    selecteddescription = "Funeral Director will quote for transport"
    unselecteddescription = "A quote is not needed. The family will arrange transport"
    checked=""
    >
  </toggle-select>
  <toggle-select
    name = "transport-to-burial-or-crematorium"
    :title = "'Transport to the ' + committalType + ' site'"
    selecteddescription = "Funeral Director will quote for transport"
    unselecteddescription = "A quote is not needed. The family will arrange transport"
    checked=""
    >
  </toggle-select>


</div>

<!-- SETION 7 -->

<div class="form-step" v-show="step==6">
  <h2 class="step-heading">Request Quote</h2>
  <p>With the questions completed we will now contact local funeral 
  professionals on your behalf. We won't share your contact details 
  or private information. </p>
 
 <p>Once you receive the quotes get in touch with the funeral professionals 
 when you’re ready. There will be a link in the quote document to each of 
 their listings in Great Goodbyes.  If you are unsure about your plan return 
 and get another quote based on different choices.</p>
  
 <p>Remember, the quote is only for the particular services that you’ve 
 responded to in this section. Other things such as the casket, flowers, 
 order of service and so forth all depend on individual preference and 
 budget. The quote considers the decisions that aren’t variable and give 
 you clarity and comparability on the cost. <p>
  
 <p>For all other aspects of the funeral browse the marketplace. Here 
 you will find wonderful vendors and funeral professionals who are passionate 
 about helping you arrange a Great Goodbye.
 </p>


    <h3 class="step-sub-heading">Your Contact Details</h4>



<div class="row">
  <div class="col-12 col-sm-6">
    <div class="form-group">
      <label for="email">Email address*</label>
      <input type="email" class="form-control" v-model="email" name="email" id="email" placeholder="name@example.com" required >
    </div>
  </div>

  <div class="col-12 col-sm-6">
    <div class="form-group">
      <label for="name">Name*</label>
      <input type="text" class="form-control" v-model="name" name="name" id="name" placeholder="name" required >
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 col-sm-6">
    <div class="form-group">
      <label for="Region">Preferred region for services*</label>

      <select class="form-control" name="Region" id="Region" v-model = "region" required >
        <option>North Portland</option>
        <option>North West Portland</option>
        <option>North East Portland</option>
        <option>South West Portland</option>
        <option>South East Portland</option>
      </select>
    </div>
  </div>
  <div class="col-12 col-sm-6">
    <div class="form-group">
      <label for="phone">Phone*</label>
      <input type="text" class="form-control" name="phone" v-model="phone" id="phone" required placeholder="021 123 456">
    </div>

  </div>
</div>
<toggle-select name = "urgent-quote"  title = "This is an urgent quote. The death has already ocurred."></toggle-select>
</div>

<!-- FORM NAVIGATION -->

<div class="lower-nav text-align-center">

  <button type="button" class="btn btn-primary d-block d-sm-inline-block mx-auto"
  @click="prev"
  v-if="step > 1"
  >Previous</button>

  <button type="button" class="btn btn-primary d-block d-sm-inline-block mx-auto"
  @click="cancel"
  v-else
  >Cancel</button>

  <div class="float-sm-right d-block d-sm-inline-block mx-auto next-button-wrapper" style="position:relative">
    <button type="button" class="btn btn-primary d-block mx-auto"
      @click.prevent="next"
      v-if="step < 6"

      >Next
    </button>


    <button
      v-if="step == 6"
      type="submit"
      class="btn btn-primary d-block mx-auto"
      :disabled="!canProgress"
      >Submit
    </button>

    <p class="progress-error d-block mx-auto" v-if="!canProgress">Select an option to proceed</p>
  </div>

</div>


</div>
    </form>

  </div>
</div>


<script src="https://kit.fontawesome.com/ff9b9ba176.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.0"></script>
<!-- bootstrap scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>

</script>
