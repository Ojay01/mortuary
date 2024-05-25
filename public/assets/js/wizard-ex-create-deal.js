"use strict";!function(){const e=document.querySelector("#dealDuration");e&&e.flatpickr({mode:"range"}),window.Helpers.initCustomOptionCheck();const t=document.querySelector("#wizard-create-deal");if(void 0!==typeof t&&null!==t){const e=t.querySelector("#wizard-create-deal-form"),o=e.querySelector("#deal-type"),a=e.querySelector("#deal-details"),i=e.querySelector("#deal-usage"),n=e.querySelector("#review-complete"),l=[].slice.call(e.querySelectorAll(".btn-next")),r=[].slice.call(e.querySelectorAll(".btn-prev"));let s=new Stepper(t,{linear:!0});const d=FormValidation.formValidation(o,{fields:{dealAmount:{validators:{notEmpty:{message:"Please enter amount"},numeric:{message:"The amount must be a number"}}},dealRegion:{validators:{notEmpty:{message:"Please select region"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap5:new FormValidation.plugins.Bootstrap5({eleValidClass:"",rowSelector:".col-sm-6"}),autoFocus:new FormValidation.plugins.AutoFocus,submitButton:new FormValidation.plugins.SubmitButton}}).on("core.form.valid",(function(){s.next()})),c=$("#dealRegion");c.length&&(c.wrap('<div class="position-relative"></div>'),c.select2({placeholder:"Select an region",dropdownParent:c.parent()}).on("change.select2",(function(){d.revalidateField("dealRegion")})));const u=FormValidation.formValidation(a,{fields:{dealTitle:{validators:{notEmpty:{message:"Please enter deal title"}}},dealCode:{validators:{notEmpty:{message:"Please enter deal code"},stringLength:{min:4,max:10,message:"The deal code must be more than 4 and less than 10 characters long"},regexp:{regexp:/^[A-Z0-9]+$/,message:"The deal code can only consist of capital alphabetical and number"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap5:new FormValidation.plugins.Bootstrap5({eleValidClass:"",rowSelector:".col-sm-6"}),autoFocus:new FormValidation.plugins.AutoFocus,submitButton:new FormValidation.plugins.SubmitButton}}).on("core.form.valid",(function(){s.next()})),m=$("#dealOfferedItem");m.length&&(m.wrap('<div class="position-relative"></div>'),m.select2({placeholder:"Select an offered item",dropdownParent:m.parent()}).on("change.select2",(function(){})));const g=FormValidation.formValidation(i,{fields:{},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap5:new FormValidation.plugins.Bootstrap5({eleValidClass:"",rowSelector:".col-sm-6"}),autoFocus:new FormValidation.plugins.AutoFocus,submitButton:new FormValidation.plugins.SubmitButton}}).on("core.form.valid",(function(){s.next()})),p=FormValidation.formValidation(n,{fields:{},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap5:new FormValidation.plugins.Bootstrap5({eleValidClass:"",rowSelector:".col-md-12"}),autoFocus:new FormValidation.plugins.AutoFocus,submitButton:new FormValidation.plugins.SubmitButton}}).on("core.form.valid",(function(){alert("Submitted..!!")}));l.forEach((e=>{e.addEventListener("click",(e=>{switch(s._currentIndex){case 0:d.validate();break;case 1:u.validate();break;case 2:g.validate();break;case 3:p.validate()}}))})),r.forEach((e=>{e.addEventListener("click",(e=>{switch(s._currentIndex){case 3:case 2:case 1:s.previous()}}))}))}}();