"use strict";document.addEventListener("DOMContentLoaded",(function(e){!function(){let e=document.querySelector(".numeral-mask-wrapper");for(let t of e.children)t.onkeyup=function(e){/^[a-zA-Z0-9]$/.test(e.key)?t.nextElementSibling&&this.value.length===parseInt(this.attributes.maxlength.value)&&t.nextElementSibling.focus():"Backspace"===e.key&&t.previousElementSibling&&t.previousElementSibling.focus()},t.onkeypress=function(e){"-"===e.key&&e.preventDefault()};const t=document.querySelector("#twoStepsForm");if(t){FormValidation.formValidation(t,{fields:{otp:{validators:{notEmpty:{message:"Please enter otp"}}}},plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap5:new FormValidation.plugins.Bootstrap5({eleValidClass:"",rowSelector:".mb-3"}),submitButton:new FormValidation.plugins.SubmitButton,defaultSubmit:new FormValidation.plugins.DefaultSubmit,autoFocus:new FormValidation.plugins.AutoFocus}});const e=t.querySelectorAll(".numeral-mask"),n=function(){let n=!0,o="";e.forEach((e=>{""===e.value&&(n=!1,t.querySelector('[name="otp"]').value=""),o+=e.value})),n&&(t.querySelector('[name="otp"]').value=o)};e.forEach((e=>{e.addEventListener("keyup",n)}))}}()})); 
