$(document).ready(function(){

$('.inter').tokenizer();
var list = $('.inter').tokenizer(get);
console.log(list);
$('#interest').attr('value', list);
$('.my-input').tokenizer();
var list1 = $('.my-input').tokenizer(get);

  $('.collapsible').collapsible({
    accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
  });
});

$('.hobbies').material_chip({
  placeholder: 'Enter hobbies',
  secondaryPlaceholder: 'Enter hobbies',
});
        
$('.language').material_chip({
  placeholder: 'Language proficiency',
  secondaryPlaceholder: 'Language proficiency',
});
var chip = {
  tag: 'chip content',
  image: '', //optional
  id: 1, //optional
};

var sdata = $('.skills').material_chip('data');
var idata = $('.interests').material_chip('data');

$('.datepicker').pickadate({
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15,
  format: 'yyyy/mm/dd' // Creates a dropdown of 15 years to control year
});  

 
//--------------------
var counter = 1;
$(document).on('click', '#addEdu', function() {
  cloneEdu();
});

$(document).on('click', '#removeEdu', function() {
  var $edu = $(this).parents('.education');
  $edu.remove();
});

function cloneEdu() {
  counter += 1;
  $('#educationClone').append($('.education:eq(0)').clone(true));
  $(".education:last").show();
  $(".education:last").find('[id]').each(function () {
    var id = $(this).attr('id');
    var id1 = $(this).attr('id') + counter;
    $(this).attr('id', id).attr('name', id1);
  });
  // console.log(counter);
  $('#educationClone').find('#dummy').attr('value', counter);
}  
//---------------------


//--------------------
var counter1 = 1;
$(document).on('click', '#addProj', function() {
  cloneProj();
});

$(document).on('click', '#removeProj', function() {
  var $proj = $(this).parents('.project');
  $proj.remove();
});

function cloneProj() {
  counter1 += 1;
  $('#projectClone').append($('.project:eq(0)').clone(true));
  $(".project:last").show();
  $(".project:last").find('[id]').each(function () {
    var id = $(this).attr('id');
    var id1 = $(this).attr('id') + counter1;
    $(this).attr('id', id).attr('name', id1);
  });
  // console.log(counter);
  $('#projectClone').find('#dummy1').attr('value', counter1);
}  
//---------------------


//--------------------
var counter2 = 1;
$(document).on('click', '#addCerti', function() {
  cloneCerti();
});

$(document).on('click', '#removeCerti', function() {
  var $certi = $(this).parents('.certification');
  $certi.remove();
});

function cloneCerti() {
  counter2 += 1;
  $('#certificationClone').append($('.certification:eq(0)').clone(true));
  $(".certification:last").show();
  $(".certification:last").find('[id]').each(function () {
    var id = $(this).attr('id');
    var id1 = $(this).attr('id') + counter2;
    $(this).attr('id', id).attr('name', id1);
  });
  // console.log(counter);
  $('#certificationClone').find('#dummy2').attr('value', counter2);
}  
//---------------------


//--------------------
var counter3 = 1;
$(document).on('click', '#addRespo', function() {
  cloneRespo();
});

$(document).on('click', '#removeRespo', function() {
  var $respo = $(this).parents('.responsibility');
  $respo.remove();
});

function cloneRespo() {
  counter3 += 1;
  $('#responsibilityClone').append($('.responsibility:eq(0)').clone(true));
  $(".responsibility:last").show();
  $(".responsibility:last").find('[id]').each(function () {
    var id = $(this).attr('id');
    var id1 = $(this).attr('id') + counter3;
    $(this).attr('id', id).attr('name', id1);
  });
  // console.log(counter);
  $('#responsibilityClone').find('#dummy3').attr('value', counter3);
}  
//---------------------


//--------------------
var counter4 = 1;
$(document).on('click', '#addCourse', function() {
  cloneCourse();
});

$(document).on('click', '#removeCourse', function() {
  var $course = $(this).parents('.courses');
  $course.remove();
});

function cloneCourse() {
  counter4 += 1;
  $('#coursesClone').append($('.courses:eq(0)').clone(true));
  $(".courses:last").show();
  $(".courses:last").find('[id]').each(function () {
    var id = $(this).attr('id');
    var id1 = $(this).attr('id') + counter4;
    $(this).attr('id', id).attr('name', id1);
  });
  // console.log(counter);
  $('#coursesClone').find('#dummy4').attr('value', counter4);
}  
//---------------------


//--------------------
var counter5 = 1;
$(document).on('click', '#addIntern', function() {
  cloneIntern();
});

$(document).on('click', '#removeIntern', function() {
  var $intern = $(this).parents('.internship');
  $intern.remove();
});

function cloneIntern() {
  counter5 += 1;
  $('#internshipClone').append($('.internship:eq(0)').clone(true));
  $(".internship:last").show();
  $(".internship:last").find('[id]').each(function () {
    var id = $(this).attr('id');
    var id1 = $(this).attr('id') + counter5;
    $(this).attr('id', id).attr('name', id1);
  });
  // console.log(counter);
  $('#internshipClone').find('#dummy5').attr('value', counter5);
}  
//---------------------


//--------------------
var counter6 = 1;
$(document).on('click', '#addTrain', function() {
  cloneTrain();
});

$(document).on('click', '#removeTrain', function() {
  var $train = $(this).parents('.training');
  $train.remove();
});

function cloneTrain() {
  counter6 += 1;
  $('#trainingClone').append($('.training:eq(0)').clone(true));
  $(".training:last").show();
  $(".training:last").find('[id]').each(function () {
    var id = $(this).attr('id');
    var id1 = $(this).attr('id') + counter6;
    $(this).attr('id', id).attr('name', id1);
  });
  // console.log(counter);
  $('#trainingClone').find('#dummy6').attr('value', counter6);
}  
//---------------------


//--------------------
var counter7 = 1;
$(document).on('click', '#addPublic', function() {
  clonePublic();
});

$(document).on('click', '#removePublic', function() {
  var $public = $(this).parents('.publication');
  $public.remove();
});

function clonePublic() {
  counter7 += 1;
  $('#publicationClone').append($('.publication:eq(0)').clone(true));
  $(".publication:last").show();
  $(".publication:last").find('[id]').each(function () {
    var id = $(this).attr('id');
    var id1 = $(this).attr('id') + counter7;
    $(this).attr('id', id).attr('name', id1);
  });
  // console.log(counter);
  $('#publicationClone').find('#dummy7').attr('value', counter7);
}  
//---------------------


//--------------------
var counter8 = 1;
$(document).on('click', '#addPatent', function() {
  clonePatent();
});

$(document).on('click', '#removePatent', function() {
  var $patent = $(this).parents('.patent');
  $patent.remove();
});

function clonePatent() {
  counter8 += 1;
  $('#patentClone').append($('.patent:eq(0)').clone(true));
  $(".patent:last").show();
  $(".patent:last").find('[id]').each(function () {
    var id = $(this).attr('id');
    var id1 = $(this).attr('id') + counter8;
    $(this).attr('id', id).attr('name', id1);
  });
  // console.log(counter);
  $('#patentClone').find('#dummy8').attr('value', counter8);

}  
//---------------------


//--------------------
var counter9 = 1;
$(document).on('click', '#addAchieve', function() {
  cloneAchieve();
});

$(document).on('click', '#removeAchieve', function() {
  var $achieve = $(this).parents('.achievement');
  $achieve.remove();
});

function cloneAchieve() {
  counter9 += 1;
  $('#achievementClone').append($('.achievement:eq(0)').clone(true));
  $(".achievement:last").show();
  $(".achievement:last").find('[id]').each(function () {
    var id = $(this).attr('id');
    var id1 = $(this).attr('id') + counter9;
    $(this).attr('id', id).attr('name', id1);
  });
  // console.log(counter);
  $('#achievementClone').find('#dummy9').attr('value', counter9);
}  
//---------------------

//--------------------
var counter10 = 1;
$(document).on('click', '#addInterest', function() {
  cloneInterest();
});

$(document).on('click', '#removeInterest', function() {
  var $interest = $(this).parents('.interests');
  $interest.remove();
});

function cloneInterest() {
  counter10 += 1;
  $('#interestClone').append($('.interests:eq(0)').clone(true));
  $(".interests:last").show();
  $(".interests:last").find('[id]').each(function () {
    var id = $(this).attr('id');
    var id1 = $(this).attr('id') + counter10;
    $(this).attr('id', id).attr('name', id1);
  });
  // console.log(counter);
  $('#interestClone').find('#dummy10').attr('value', counter10);
}  
//---------------------

//--------------------
var counter11 = 1;
$(document).on('click', '#addSkill', function() {
  cloneSkill();
});

$(document).on('click', '#removeSkill', function() {
  var $skill = $(this).parents('.skills');
  $skill.remove();
});

function cloneSkill() {
  counter11 += 1;
  $('#skillClone').append($('.skills:eq(0)').clone(true));
  $(".skills:last").show();
  $(".skills:last").find('[id]').each(function () {
    var id = $(this).attr('id');
    var id1 = $(this).attr('id') + counter11;
    $(this).attr('id', id).attr('name', id1);
  });
  // console.log(counter);
  $('#skillClone').find('#dummy11').attr('value', counter11);
}  
//---------------------


