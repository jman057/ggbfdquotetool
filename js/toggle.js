
Vue.component('toggle-select', {
  model: {
    prop: 'checked',
    event: 'change'
  }, 
  props:   [
    "title", 
    "name", 
    "disabled", 
    "tooltip", 
    "checked", 
    "selecteddescription",
    "unselecteddescription" 
  ],
    template: `
    <div data-toggle="tooltip" data-placement="top" :title=tooltip>

               <div class="switch-wrapper" >
               <p> {{title}}
               </p>

                <p v-if="!!checked && !!selecteddescription">
                {{selecteddescription}}
                </p>
                <p v-if="!checked && !!unselecteddescription">
                {{unselecteddescription}}
                </p>
                {{checked}}


                <label class="switch" >

                    <input 
                    :checked="checked" 
                    :id="name" 
                    :name="name" 
                    type="checkbox" 
                    :disabled="disabled" 
                    v-on:change="$emit('change', $event.target.checked)"
                    >
                <span class="slider"></span>
            </label>
            </div>
</div>`,


   mounted() {
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
      console.log("mounted with: " + this.value);
    })
   }



  })
