
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
               
               <span>
               <p class="toggle-title"> {{title}}
               </p>

                <p v-if="!!checked && !!selecteddescription" class="switch-description">
                {{selecteddescription}}
                </p>
                <p v-if="!checked && !!unselecteddescription" class="switch-description">
                {{unselecteddescription}}
                </p>
                
               </span>

                <label class="switch" >

                    <input 
                    v-model="checked" 
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
