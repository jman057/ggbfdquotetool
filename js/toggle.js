
Vue.component('toggle-select', {
   props:   ["title", "name"],
    template: ` 
    <div>
    
               <div class="switch-wrapper">
               <p> {{title}} </p>
                <label class="switch">
                    <input :name="name" type="checkbox">
                <span class="slider"></span>
            </label>
            </div>
</div>`
  })