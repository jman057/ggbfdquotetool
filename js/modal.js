Vue.component('help-icon-modal', {
    props:   ["id", "title", "contents"],
     template: `
     <div>
     <span class="step-help-circle" data-toggle="modal" :data-target="'#' + id">
       <img src="assets/help-circle.svg">
     </span>
 
     <div class="modal fade" :id="id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">{{title}}</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             {{contents}}
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 
           </div>
         </div>
       </div>
     </div>
     </div>
 `
   })
 

 