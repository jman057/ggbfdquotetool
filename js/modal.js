Vue.component('help-icon-modal', {
    props:   ["id", "title", "contents", "imgroot"],
     template: `
     <div class="new-help-wrapper" style="display:flex">
     <span class="step-help-circle" data-toggle="modal" :data-target="'#' + id">
       <img :src="imgroot+'assets/help-circle.svg'">
     </span>
 
     <div class="modal fade" :id="id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">{{title}}</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
            <span v-html="contents"></span>
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 
           </div>
         </div>
       </div>
     </div>
     <div><p style="margin-bottom:0px; margin-left:-20px; color:#40052">More information</p></div>
     </div>
 `
   })
 

 