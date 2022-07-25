window.addEventListener("DOMContentLoaded",e=>{const o=document.getElementById("sidebar-wrapper");let s=!1;const a=document.body.querySelector(".menu-toggle");a.addEventListener("click",t=>{t.preventDefault(),o.classList.toggle("active"),i(),a.classList.toggle("active")});var l=[].slice.call(document.querySelectorAll("#sidebar-wrapper .js-scroll-trigger"));l.map(t=>{t.addEventListener("click",()=>{o.classList.remove("active"),a.classList.remove("active"),i()})});function i(){const t=document.body.querySelector(".menu-toggle > .fa-bars"),r=document.body.querySelector(".menu-toggle > .fa-xmark");t&&(t.classList.remove("fa-bars"),t.classList.add("fa-xmark")),r&&(r.classList.remove("fa-xmark"),r.classList.add("fa-bars"))}document.addEventListener("scroll",()=>{const t=document.body.querySelector(".scroll-to-top");document.documentElement.scrollTop>100?s||(n(t),s=!0):s&&(c(t),s=!1)})});function c(e){e.style.opacity=1,function o(){(e.style.opacity-=.1)<0?e.style.display="none":requestAnimationFrame(o)}()}function n(e,o){e.style.opacity=0,e.style.display=o||"block",function s(){var a=parseFloat(e.style.opacity);(a+=.1)>1||(e.style.opacity=a,requestAnimationFrame(s))}()}

$('.form-search-main input').change(function() {
  var input = $(this).val();
  var input_val = $('.form-search-main').attr('action');
  var url = input_val.replace("4155", input);
  $('.form-search-main').attr('action',url);
});


var data = [
    { id:"1", fname:"Tiger", lname:"Noxx", team:'Team 1', address:'Ryecroft Field',   tel:'0494645879'},
    { id:"2", fname:"Garrett", lname:"Pellens", team:'Team 2', address:'Kiln Circus',      tel:'0493658746' },
    { id:"3", fname:"Ashton", lname:"Fox", team:'Team 1', address:'Thurne View',      tel:'0498532546' },
    { id:"4", fname:"Melissa", lname:"Perenboom", team:'Team 3', address:'Thornton Glade',   tel:'0499454891' },
    { id:"5",  fname:"Frankie", lname:"Winters", team:'Team 2', address:'Drayton Brae',     tel:'0494678943' },
    { id:"6", fname:"Benoist", lname:"Muniz", team:'Team 4', address:'Foxglove Lane',    tel:'0492884618' },
    { id:"7", fname:"Kelly", lname:"London", team:'Team 2', address:'Doxford Park Way', tel:'0497978945' },
    { id:"8", fname:"Hope", lname:"Gilmore", team:'Team 3', address:'Bradford Manor',   tel:'0499894125' },
    { id:"9", fname:"Muriel", lname:"Smith", team:'Team 3', address:'Wardle Street',    tel:'0491484215' },
    { id:"10", fname:"Gary", lname:"Hendren", team:'Team 4', address:'Church Street',    tel:'0493596488' },
  ];
  
  $('#txt-search').keyup(function(){
      $('.next').prop('disabled', true);
      var searchField = $(this).val();
      if(searchField === '')  {
        $('#filter-records').html('');
        return;
      }
      var regex = new RegExp(searchField, "i");
      var output = '';
      $.each(data, function(key, val){
        var fullname = val.fname +' '+ val.lname;
        if ((fullname.search(regex) != -1)) {
          output += '<li id="' +val.id +'" class="li-search">'+ val.fname +' '+ val.lname +'</li>';
        }
      });
      $('#filter-records').html(output);
  });
  
  $(document).on("click", ".li-search", function () {
    $("#txt-search").val($(this).html());
    setFormFields($(this).attr("id"));
    $("#filter-records").html("");
    $(".next").prop("disabled", false);
  });

  $(".answer-last-btn").on("click", function (event) {
    event.preventDefault();

    $('.current-step input').each(function( index ) {
        
      if($(this).attr('data-answer') == undefined){
        console.log($(this).attr('data-answer'));
        $(this).closest('.wrong-answer').removeClass('wrong-answer');
      }
      if($(this).is(":checked")){
        if(!$(this).attr('data-answer')) {
          $(this).closest('.mb-3').addClass('wrong-answer');
        }
      }
    });

  let inputCount = $('.input-answer-correct:checked').length;
  let inputCheckedCount = $('.current-step input:checked').length;
  let counter = $('.current-step .input-answer-correct').length;
  let wrong = $('.current-step .wrong-answer').length;

  if (inputCount >= counter && wrong < 1 && inputCheckedCount > 0) {

    $(".atsakymo-parodymas").html('Teisingai');

    setTimeout(() => {
      var nextstep = false;
      if (step == 2) {
        nextstep = checkForm("userinfo");
      } else {
        nextstep = true;
      }
      if (nextstep == true) {
        if (step < $(".step").length) {
          $(".step").show();
          $(".step")
            .not(":eq(" + step++ + ")")
            .hide();
          stepProgress(step);
        }
  
        hideButtons(step);
      }      

      $('.question-active').removeClass('question-active');
      $('.next').prop('disabled', true);
      $(".atsakymo-parodymas").html('');
        $('.current-step').next('.step').addClass('current-step');   


      $('.current-step').first().removeClass('current-step');
      let href = $('.answer-last-btn').attr('href');
      window.location.replace(href);
      
    }, "2000")

  } else {
    $('.question-active .question-story').removeClass('hidden');

    $('.question-active input:checked').each(function( index ) {
      if($(this).hasClass('input-answer-wrong')) {
        $(this).closest('.mb-3').addClass('wrong-answer');
      }
    });
    
    $(".atsakymo-parodymas").html('Neteisingai');
  }


  });

  $(".radio-group .radio").on("click", function () {
    $(".selected .fa").removeClass("fa-check");
    $(".radio").removeClass("selected");
    $(this).addClass("selected");
    if ($("#suser").hasClass("selected") == true) {
      $(".next").prop("disabled", true);
      $(".searchfield").show();
    } else {
      setFormFields(false);
      $(".next").prop("disabled", false);
      $("#filter-records").html("");
      $(".searchfield").hide();
    }
  });
  var step = 1;
  $(document).ready(function () { stepProgress(step); });
  
  setTimeout(() => {
    $('.text-success-section').addClass('hidden');
  }, "2000")

  $(".next").on("click", function () {
    nextFunction();
  });

  function nextFunction() {

      $('.current-step input').each(function( index ) {
        
        if($(this).attr('data-answer') == undefined){
          console.log($(this).attr('data-answer'));
          $(this).closest('.wrong-answer').removeClass('wrong-answer');
        }
        if($(this).is(":checked")){
          if(!$(this).attr('data-answer')) {
            $(this).closest('.mb-3').addClass('wrong-answer');
          }
        }
      });

    let inputCount = $('.input-answer-correct:checked').length;
    let inputCheckedCount = $('.current-step input:checked').length;
    let counter = $('.current-step .input-answer-correct').length;
    let wrong = $('.current-step .wrong-answer').length;
  
    if (inputCount >= counter && wrong < 1 && inputCheckedCount > 0) {
  
      $(".atsakymo-parodymas").html('Teisingai');

      setTimeout(() => {
        var nextstep = false;
        if (step == 2) {
          nextstep = checkForm("userinfo");
        } else {
          nextstep = true;
        }
        if (nextstep == true) {
          if (step < $(".step").length) {
            $(".step").show();
            $(".step")
              .not(":eq(" + step++ + ")")
              .hide();
            stepProgress(step);
          }
    
          hideButtons(step);
        }      
  
        $('.question-active').removeClass('question-active');
        $('.next').prop('disabled', true);
        $(".atsakymo-parodymas").html('');
          $('.current-step').next('.step').addClass('current-step');   


        $('.current-step').first().removeClass('current-step');
        if($('.current-step').length < 1) {
          $('.answer-last-btn').removeClass('answer-last-btn2').attr('data-go','true');

        }
      }, "2000")

    } else {
      $('.question-active .question-story').removeClass('hidden');
  
      $('.question-active input:checked').each(function( index ) {
        if($(this).hasClass('input-answer-wrong')) {
          $(this).closest('.mb-3').addClass('wrong-answer');
        }
      });
      
      $(".atsakymo-parodymas").html('Neteisingai');
    }
  }
  $(".hint-btn-show").on("click", function () {
    $(this).addClass('hidden');
    $(this).closest('.hint-div').find('.hint-show').removeClass('hidden');

  });
  
  // ON CLICK BACK BUTTON
  $(".back").on("click", function () {
    if (step > 1) {
      step = step - 2;
      $(".next").trigger("click");
    }
    hideButtons(step);
  });
  
  // CALCULATE PROGRESS BAR
  stepProgress = function (currstep) {
    var percent = parseFloat(100 / $(".step").length) * currstep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width", percent + "%")
      .html(percent + "%");
  };
  
  // DISPLAY AND HIDE "NEXT", "BACK" AND "SUMBIT" BUTTONS
  hideButtons = function (step) {
    var limit = parseInt($(".step").length);
    $(".action").hide();
    if (step < limit) {
      $(".next").show();
    }
    if (step > 1) {
      $(".back").show();
    }
    if (step == limit) {
      $(".next").hide();
      $(".submit").show();
    }
  };
  
  function setFormFields(id) {
    if (id != false) {
      // FILL STEP 2 FORM FIELDS
      d = data.find(x => x.id === id);
      $('#fname').val(d.fname);
      $('#lname').val(d.lname);
      $('#team').val(d.team);
      $('#address').val(d.address);
      $('#tel').val(d.tel);
    } else {
      // EMPTY USER SEARCH INPUT
      $("#txt-search").val('');
      // EMPTY STEP 2 FORM FIELDS
      $('#fname').val('');
      $('#lname').val('');
      $('#team').val('');
      $('#address').val('');
      $('#tel').val('');
    }
  }
  
  function checkForm(val) {
    // CHECK IF ALL "REQUIRED" FIELD ALL FILLED IN
    var valid = true;
    $("#" + val + " input:required").each(function () {
      if ($(this).val() === "") {
        $(this).addClass("is-invalid");
        valid = false;
      } else {
        $(this).removeClass("is-invalid");
      }
    });
    return valid;
  }

$('.card-body.step input').on("click", function () {
  $('.next').prop('disabled', false);
  $(this).closest('.step').addClass('question-active');
});