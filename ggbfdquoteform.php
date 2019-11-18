<?php

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">




<div class="container">
  <!-- Content here -->

  <div id="app">

    <div v-if="!step">
    <h2 class="step-heading"> Funeral Quote Tool</h2>
    <p> Here, you’ll work through the important decisions you need to consider.
      We’ll contact funeral directors on your behalf and be back to you within 24 hours –
      sooner if you tell us it’s urgent. Your details remain private until you decide you wish
      to connect with anyone of the funeral directors </p>

      <p>You can save your answers as a draft if you’re not quite ready to get pricing.
        Note that your quote won’t include the kinds of decisions that are variable.
        Things like venue hire, catering, flowers, even caskets have wide-ranging prices.</p>

      <p>Don’t worry, we can help you out with those decisions too,
        but first, let’s get the basics sorted out.
        </p>

      <div class="info-wrapper">
      <p>Your quote will include the funeral director's fixed service fee.
       This is a charge made by every funeral director and covers their 
       availability to make arrangements on your behalf, 
       handling paperwork, registering the death and medical 
       certificate, and a contribution to overheads. The amount of 
       this fee can differ - it’s one of the reasons getting a quote 
       is a good idea. Large full service funeral homes with lots of 
       resources may charge more than a smaller practice. What works 
       best for your situation is entirely up to you.
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
    <form
    action="https://formspree.io/xneboqbm" method="POST"
    v-if="showForm" class="card">
        <div class="card-body">
    <div class="progress">
      <div class="progress-bar" role="progressbar" v-bind:style="{width: progressPercentage + '%'}" aria-valuenow="{{message}}" aria-valuemin="0" aria-valuemax="100"></div>
    </div>





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
        <h2 class="step-heading">Committal of the body</h2>
        <div class="step-description-wrapper">

        <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="this title" contents="contents here" id="Committal"></help-icon-modal>

          <span class="step-description">
            <p>The funeral director will quote for arranging the committal.
              This will include paperwork, transport and other costs specific to your selection.
          </p>
          </span>


        </div>



          <div class="switch-field">
              <input @click = "selectionError = false" type="radio" id="bury" name="committal" value="Burial" v-model="formFields[step]" checked/>
              <label for="bury" :class="{ error: selectionError }">
                <div class="ggb-select-image">
                  <img v-if = "formFields[step] == 'Burial'" src="<?= $this->plugin_url ?>assets/bury-active.svg">
                  <img v-else src="<?= $this->plugin_url ?>assets/bury-normal.svg">
                </div>
                <div class="title">Bury</div>
                <div class="description">This does not include the burial plot or headstone.</div>
              </label>


              <input @click = "selectionError = false" type="radio" id="cremate" name="committal" value="Cremation" v-model="formFields[step]"/>
              <label for="cremate" :class="{ error: selectionError }">

                  <div class="ggb-select-image">
                      <img v-if = "formFields[step] == 'Cremation'" src="<?= $this->plugin_url ?>assets/cremate-active.svg">
                      <img v-else src="<?= $this->plugin_url ?>assets/cremate-normal.svg">
                    </div>
                    <div class="title">Cremation</div>
                    <div class="description">The family will have ashes returned for scattering or burying.</div>

              </label>
              <input @click = "selectionError = false" type="radio" id="aquacremate" name="committal" value="Bio Cremation" v-model="formFields[step]" />
              <label for="aquacremate" :class="{ error: selectionError }">

                  <div class="ggb-select-image">
                      <img v-if = "formFields[step] == 'Bio Cremation'" src="<?= $this->plugin_url ?>assets/aqua-active.svg">
                      <img v-else src="<?= $this->plugin_url ?>assets/aqua-normal.svg">
                    </div>
                    <div class="title">BioCremation</div>
                    <div class="description">Emerging as a promising environmentally friendly way for decomposition of the body.</div>
              </label>
            </div>


<!-- Direct to commital -->
        <div v-if="formFields[step]">
          <h3 class="step-sub-heading">Direct to {{committalType}} </h2>

          <div class="step-description-wrapper">
              <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="Direct to Committal" contents="dtc contents here" id="dtc"></help-icon-modal>

                <span class="step-description">
                  <p>Most commonly, this option is for direct to cremation.
                      Any service you arrange will not have the casket present, but might include the ashes.

                </p>
                <p>Selecting direct to committal means you’re electing not to 
                have the casket present at any service you choose to have. 
                It also means many other decisions such as viewing are no 
                longer valid. </p>
                <p>Once you have selected the type of committal and elected to 
                do this directly, you can submit for a quote.
                </p>
                </span>


              </div>


              <toggle-select v-model="diretToCommittal" name = "dtc"  :title = "'Direct to ' + committalType"></toggle-select>
        </div>
      </div>




<!-- SETION 3 -->
<!-- SETION 3 -->
<!-- SETION 3 -->

<div class="form-step" v-show="step==2">
  <h2 class="step-heading">Viewing</h2>
  <div class="step-description-wrapper">
    <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="Viewing" contents="viewing contents here" id="viewingmodal" v-model="formFields[step]"></help-icon-modal>
    <div class="step-description">
        <p>It’s not for everyone, but for some it’s important to <i>see</i> their
          loved one, one last time. It’s the chance for a final kiss, or touch
          of the hand. Your funeral director will quote for preparation and presentation.
          </p>
    </div>
  </div>
<!-- inputs -->
  <div class="switch-field wide">
      <input @click = "selectionError = false" type="radio" id="opencasket" name="viewing" value="opencasket" v-model="formFields[step]" checked/>
      <label for="opencasket" :class="{ error: selectionError }">
        <div class="ggb-select-image">
          <img v-if = "formFields[step] == 'opencasket'" src="<?= $this->plugin_url ?>assets/casket-open-active.svg">
          <img v-else src="<?= $this->plugin_url ?>assets/casket-open-normal.svg">
        </div>
        <div class="title">Open Casket</div>
        <div class="description">We would like to have the casket open at some point</div>
      </label>

      <input @click = "selectionError = false" type="radio" id="closedcasket" name="viewing" value="closedcasket" v-model="formFields[step]"/>
      <label for="closedcasket" :class="{ error: selectionError }">

          <div class="ggb-select-image">
              <img v-if = "formFields[step] == 'closedcasket'" src="<?= $this->plugin_url ?>assets/casket-closed-active.svg">
              <img v-else src="<?= $this->plugin_url ?>assets/casket-closed-normal.svg">
            </div>
            <div class="title">Closed Casket</div>
            <div class="description">We do not require the casket open at all.</div>

      </label>

    </div>
<div v-if="formFields[step]">
  <h3 class="step-sub-heading">We explicitly would prefer not to embalm  </h3>

  <div class="step-description-wrapper">
  <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="Embalming" contents="embalm contents here" id="embalm"></help-icon-modal>
    <div class="step-description">
    <p>Embalming adds financial and environmental costs to a funeral. 
      Although it is sometimes necessary, 
      especially for viewing, there are alternative options that can be disucssed 
      with your Funeral Director. </p>
      <p>Selecting this option means that your quote will exclude options for embalming</p>

  </div>
  </div>

      <toggle-select v-model="preferNotEmbalm" name = "prefernotembalm"  title = "We explicitly would prefer not to embalm" checked=""></toggle-select>

  </div>
</div>



<!-- SETION 4 -->
<!-- SETION 4 -->
<!-- SETION 4 -->

<div class="form-step" v-show="step==3">
  <h2 class="step-heading">Private Time / Visitation</h2>
  <div class="step-description-wrapper">
      <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="Private time" contents="Private time contents here" id="privatetime"></help-icon-modal>

    <div class="step-description">
      <p>For many families taking some private time with their loved one is important. 
        It’s the chance to have a quiet chat and say goodbye.  
        It might be an extended time at home, or an hour or two at the funeral home. 
        This decision impacts transport arrangements and the funeral professional’s time.

          </p>

    </div>
  </div>

<!-- inputs -->
<div class="switch-field">
    <input @click = "selectionError = false" type="radio" id="facility" name="privatetime" value="facility" v-model="formFields[step]" checked/>
    <label for="facility" :class="{ error: selectionError }">
      <div class="ggb-select-image">
        <img v-if = "formFields[step] == 'facility'" src="<?= $this->plugin_url ?>assets/funeral-directors-active.svg">
        <img v-else src="<?= $this->plugin_url ?>assets/funeral-directors-normal.svg">
      </div>
      <div class="title">Funeral Director's Facility</div>
      <div class="description">Chapel or purpose-specific room</div>
    </label>


    <input @click = "selectionError = false" type="radio" id="otherlocation" name="privatetime" value="otherlocation" v-model="formFields[step]"/>
    <label for="otherlocation" :class="{ error: selectionError }">

        <div class="ggb-select-image">
            <img v-if = "formFields[step] == 'otherlocation'" src="<?= $this->plugin_url ?>assets/another-location-active.svg">
            <img v-else src="<?= $this->plugin_url ?>assets/another-location-normal.svg">
          </div>
          <div class="title">At another location</div>
          <div class="description">At home or arranged venue</div>

    </label>
    <input @click = "selectionError = false" type="radio" id="noprivatetime" name="privatetime" value="noprivatetime" v-model="formFields[step]" />
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
    <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="Arranging a Service" contents="Arranging a Service contents here" id="service"></help-icon-modal>

    <div class="step-description">
              <p>Whether grand or grassroots, formal or freestyle, the service can be 
          anywhere that suits your family and the kind of Great Goodbye you’re creating. </p>
         <p> You might follow the service with an extended, less formal gathering.
      
         <p>This selection impacts transport costs, and unless you’re having the 
        service at home there will be a cost associated with the venue hire.</p>

        </p>
    </div>
  </div>
<!-- selection -->
<div class="switch-field wide">
    <input @click = "selectionError = false" type="radio" id="graveside" name="service" value="Gravesite" v-model="formFields[step]" checked/>
    <label for="graveside" :class="{ error: selectionError }">
      <div class="ggb-select-image">
        <img v-if = "formFields[step] == 'Gravesite'" src="<?= $this->plugin_url ?>assets/graveside-active.svg">
        <img v-else src="<?= $this->plugin_url ?>assets/graveside-normal.svg">
      </div>
      <div class="title">Graveside service</div>
      <div class="description">We would like to have the casket open at some point</div>
    </label>

    <input @click = "selectionError = false" type="radio" id="fdfacility" name="service" value="Funeral Directors Facility" v-model="formFields[step]"/>
    <label for="fdfacility" :class="{ error: selectionError }">

        <div class="ggb-select-image">
            <img v-if = "formFields[step] == 'Funeral Directors Facility'" src="<?= $this->plugin_url ?>assets/funeral-directors-active.svg">
            <img v-else src="<?= $this->plugin_url ?>assets/funeral-directors-normal.svg">
          </div>
          <div class="title">Funeral Director's Facility</div>
          <div class="description">Service at the chappel</div>

    </label>

  </div>
<div class="switch-field wide">
    <input @click = "selectionError = false" type="radio" id="worship" name="service" value="Place of Worship" v-model="formFields[step]" checked/>
    <label for="worship" :class="{ error: selectionError }">
      <div class="ggb-select-image">
        <img v-if = "formFields[step] == 'Place of Worship'" src="<?= $this->plugin_url ?>assets/place-of-worship-active.svg">
        <img v-else src="<?= $this->plugin_url ?>assets/place-of-worship-normal.svg">
      </div>
      <div class="title">Place of worship</div>
      <div class="description">We would like to have the casket open at some point</div>
    </label>

    <input @click = "selectionError = false" type="radio" id="altvenue" name="service" value="Alternative Venue" v-model="formFields[step]"/>
    <label for="altvenue" :class="{ error: selectionError }">

        <div class="ggb-select-image">
            <img v-if = "formFields[step] == 'Alternative Venue'" src="<?= $this->plugin_url ?>assets/alternatice-venue-active.svg">
            <img v-else src="<?= $this->plugin_url ?>assets/alternatice-venue-normal.svg">
          </div>
          <div class="title">Altenative Venue</div>
          <div class="description">Somewhere else</div>

    </label>
  </div>

</div>


<!-- SETION 6 -->

<div class="form-step" v-show="step==5">
  <h2 class="step-heading">Transport</h2>
  <div class="step-description-wrapper">
      <help-icon-modal imgroot="<?= $this->plugin_url ?>" title="Transport" contents="Transport time contents here" id="transport"></help-icon-modal>
        <div class="step-description">

        <p>Driving your loved one to the service and/or on to the committal 
          is a special way to personalise a Great Goodbye. For some, 
          taking this last drive together is deeply meaningful. </p>
          <p>If that’s not for you, your funeral professional will be 
          honoured to do this task on your family’s behalf. Getting a 
          quote doesn’t lock you into a decision. You’ve probably not 
          thought about this option before. Talk about it with family. 
          </p>
    
        </div>
    </div>


  <toggle-select 
    name = "collection"  
    tooltip="This is always included as part of the standard Funeral Director's services " 
    title = "Body collection from place of death" 
    value="true" 
    disabled="true" 
    checked="true">
  </toggle-select>
  <toggle-select 
    name = "to-service"  
    :title = "'Transport to the ' + formFields[4] + ' for the service'"
    selecteddescription = "Funeral Director will quote for transport"
    unselecteddescription = "Family will arrange transport"
    checked=""
    >
  </toggle-select>
  <toggle-select 
    name = "to-committal"  
    :title = "'Transport to the ' + committalType + ' site'"
    selecteddescription = "Funeral Director will quote for transport"
    unselecteddescription = "Family will arrange transport"
    checked=""
    >
  </toggle-select>


</div>

<!-- SETION 7 -->

<div class="form-step" v-show="step==6">
  <h2 class="step-heading">Request Quote</h2>
  <p>We’ll contact local funeral professionals and get some quotes for you, 
    on your behalf. We won't share your contact or private information.</p>

    <p>Once you receive the quotes, you’ll be able to initiate contact with the funeral professionals, or, if you are still unsure about your plan, you can 
      return to Great Goodbyes and get a different quote based on different choices.</p>
      
      <p>Remember that the quote is only for the services that the funeral professional does, and does not include services provided by other professionals that may be included. For those, we encourage you to visit our marketplace.
      </p>


    <h3 class="step-sub-heading">Please tell us more about yourself</h4>

    <toggle-select name = "urgent-quote"  title = "This is an urgent quote. The death has already ocurred."></toggle-select>

<div class="row">
  <div class="col">
    <div class="form-group">
      <label for="email">Email address*</label>
      <input type="email" class="form-control" v-model="email" name="email" id="email" placeholder="name@example.com" required >
    </div>
  </div>

  <div class="col">
    <div class="form-group">
      <label for="name">Name*</label>
      <input type="text" class="form-control" v-model="name" name="name" id="name" placeholder="name" required >
    </div>
  </div>
</div>

<div class="row">
  <div class="col">
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
  <div class="col">
    <div class="form-group">
      <label for="phone">Phone*</label>
      <input type="text" class="form-control" name="phone" v-model="phone" id="phone" required placeholder="021 123 456">
    </div>

  </div>
</div>

</div>

<!-- FORM NAVIGATION -->

<div class="lower-nav">

  <div class="float-right next-button-wrapper" style="position:relative">
    <button type="button" class="btn btn-primary"
      @click.prevent="next"
      v-if="step < 6"
   
      >Next
    </button>

      
    <button
      v-if="step == 6" 
      type="submit" 
      class="btn btn-primary float-right"
      :disabled="!canProgress"
      >Submit
    </button>
      
    <p class="progress-error" v-if="!canProgress">Select an option to proceed</p>
  </div>

  <button type="button" class="btn btn-primary"
  @click="prev"
  v-if="step > 1"
  >Previous</button>

  <button type="button" class="btn btn-primary"
  @click="cancel"
  v-else
  >Cancel</button>

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
