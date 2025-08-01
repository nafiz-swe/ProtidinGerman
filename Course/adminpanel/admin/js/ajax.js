// Admin Log in
$(document).on("submit","#adminLoginFrm", function(){
   $.post("query/loginExe.php", $(this).serialize(), function(data){
      if(data.res == "invalid")
      {
        Swal.fire(
          'Invalid',
          'Please input valid username / password',
          'error'
        )
      }
      else if(data.res == "success")
      {
        $('body').fadeOut();
        window.location.href='home.php';
      }
   },'json');

   return false;
});



// Add Course
$(document).on("submit","#addCourseFrm", function(){
  $.post("query/addCourseExe.php", $(this).serialize(), function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Success',
            'Batch has been successfully added!',
            'success'
          );
          refreshDiv(); // Refresh the div or perform any other actions after success
     } 
     else if(data.res == "exist") {
        Swal.fire(
            'Error',
            'Batch already exists!',
            'error'
        );
     } 
     else {
        Swal.fire(
            'Failed',
            'An error occurred. Please try again.',
            'error'
        );
     }
  }, 'json');
  return false;
});



// Add Class Record
// Add Class Record
$(document).on("submit", "#addClassRecordFrm", function (e) {
  e.preventDefault(); // ফর্ম সাবমিট ডিফল্ট আচরণ বন্ধ করা

  // FormData অবজেক্ট তৈরি (ফাইল এবং অন্যান্য ডেটা পাঠানোর জন্য)
  let formData = new FormData(this);

  // Ajax অনুরোধ পাঠানো
  $.ajax({
      url: "query/addClassRrecord.php", // পিএইচপি ফাইলের লিংক
      type: "POST",
      data: formData,
      contentType: false, // কনটেন্ট টাইপ স্বয়ংক্রিয় সেট করতে
      processData: false, // ডেটা প্রসেসিং অক্ষম করতে
      success: function (response) {
          if (response.includes("সফলভাবে")) {
              Swal.fire(
                  'সফল!',
                  'ক্লাস রেকর্ড সফলভাবে সংরক্ষিত হয়েছে।',
                  'success'
              );
              $('#addClassRecordFrm')[0].reset(); // ফর্ম রিসেট
          } else if (response.includes("ত্রুটি")) {
              Swal.fire(
                  'ত্রুটি!',
                  response,
                  'error'
              );
          } else {
              Swal.fire(
                  'ব্যর্থ!',
                  'ডেটা সংরক্ষণ করতে সমস্যা হয়েছে।',
                  'error'
              );
          }
      },
      error: function () {
          Swal.fire(
              'ব্যর্থ!',
              'Ajax অনুরোধে সমস্যা হয়েছে।',
              'error'
          );
      }
  });
});






// $(document).on("submit","#addCourseFrm" , function(){
//   $.post("query/addCourseExe.php", $(this).serialize() , function(data){
//   	if(data.res == "exist")
//   	{
//   		Swal.fire(
//   			'Already Exist',
//   			data.add_batch.toUpperCase() + ' Already Exist',
//   			'error'
//   		)
//   	}
//   	else if(data.res == "success")
//   	{
//   		Swal.fire(
//   			'Success',
//   			data.add_batch.toUpperCase() + ' Successfully Added',
//   			'success'
//   		)
//           // $('#add_batch').val("");
//           refreshDiv();
//             setTimeout(function(){ 
//                 $('#body').load(document.URL);
//              }, 2000);
//   	}
//   },'json')
//   return false;
// });
















//ok
//ok
// Update Course
$(document).on("submit","#updateCourseFrm" , function(){
  $.post("query/updateCourseExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Success',
            'Batch has been successfully updated!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


// Delete Batch
// $(document).on("click", "#deleteCourse", function(e){
//     e.preventDefault();
//     var id = $(this).data("id");
//      $.ajax({
//       type : "post",
//       url : "query/deleteCourseExe.php",
//       dataType : "json",  
//       data : {id:id},
//       cache : false,
//       success : function(data){
//         if(data.res == "success")
//         {
//           Swal.fire(
//             'Success',
//             'Selected Batch successfully deleted',
//             'success'
//           )
//           refreshDiv();
//         }
//       },
//       error : function(xhr, ErrorStatus, error){
//         console.log(status.error);
//       }

//     });
//     return false;
//   });




// Delete Exam
// $(document).on("click", "#deleteExam", function(e){
//     e.preventDefault();
//     var id = $(this).data("id");
//      $.ajax({
//       type : "post",
//       url : "query/deleteExamExe.php",
//       dataType : "json",  
//       data : {id:id},
//       cache : false,
//       success : function(data){
//         if(data.res == "success")
//         {
//           Swal.fire(
//             'Success',
//             'Selected Course successfully deleted',
//             'success'
//           )
//           refreshDiv();
//         }
//       },
//       error : function(xhr, ErrorStatus, error){
//         console.log(status.error);
//       }

//     });
//     return false;
//   });



// Add Exam 
$(document).on("submit","#addExamFrm" , function(){
  $.post("query/addExamExe.php", $(this).serialize() , function(data){
    if(data.res == "noSelectedCourse")
   {
      Swal.fire(
          'No Course',
          'Please select course',
          'error'
       )
    }
    if(data.res == "noSelectedTime")
   {
      Swal.fire(
          'No Time Limit',
          'Please select time limit',
          'error'
       )
    }
    if(data.res == "noDisplayLimit")
   {
      Swal.fire(
          'No Display Limit',
          'Please input question display limit',
          'error'
       )
    }

     else if(data.res == "exist")
    {
      Swal.fire(
        'Already Exist',
        data.examTitle.toUpperCase() + '<br>Already Exist',
        'error'
      )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Success',
        data.examTitle.toUpperCase() + '<br>Successfully Added',
        'success'
      )
          $('#addExamFrm')[0].reset();
          $('#add_batch').val("");
          refreshDiv();
    }
  },'json')
  return false;
});



// Update Exam 
$(document).on("submit","#updateExamFrm" , function(){
  $.post("query/updateExamExe.php", $(this).serialize() , function(data){
    if(data.res == "success")
    {
      Swal.fire(
          'Update Successfully',
          data.msg + ' <br>are now successfully updated',
          'success'
       )
          refreshDiv();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
        "Something's went wrong!",
         'Somethings went wrong',
        'error'
      )
    }
   
  },'json')
  return false;
});

// Update Question
$(document).on("submit","#updateQuestionFrm" , function(){
  $.post("query/updateQuestionExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Success',
            'Selected question has been successfully updated!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


// Delete Question
$(document).on("click", "#deleteQuestion", function(e){
    e.preventDefault();
    var id = $(this).data("id");
     $.ajax({
      type : "post",
      url : "query/deleteQuestionExe.php",
      dataType : "json",  
      data : {id:id},
      cache : false,
      success : function(data){
        if(data.res == "success")
        {
          Swal.fire(
            'Deleted Success',
            'Selected question successfully deleted',
            'success'
          )
          refreshDiv();
        }
      },
      error : function(xhr, ErrorStatus, error){
        console.log(status.error);
      }

    });
    
   

    return false;
  });


// Add Question 
$(document).on("submit","#addQuestionFrm" , function(){
  $.post("query/addQuestionExe.php", $(this).serialize() , function(data){
    if(data.res == "exist")
    {
      Swal.fire(
          'Already Exist',
          data.msg + ' question <br>already exist in this exam',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
        'Success',
         data.msg + ' question <br>Successfully added',
        'success'
      )
        $('#addQuestionFrm')[0].reset();
        refreshDiv();
    }
   
  },'json')
  return false;
});


// Add Examinee
$(document).on("submit","#addExamineeFrm" , function(){
  $.post("query/addExamineeExe.php", $(this).serialize() , function(data){
    if(data.res == "fullnameExist")
    {
      Swal.fire(
          'Fullname Already Exist',
          data.msg + ' are already exist',
          'error'
       )
    }
    else if(data.res == "noGender")
    {
      Swal.fire(
          'Gender Empty',
          'Please select gender',
          'error'
       )
    }
    else if(data.res == "noCourseLevel")
    {
      Swal.fire(
          'Course Empty',
          'Please select Course',
          'error'
       )
    }
    else if(data.res == "noBatch")
    {
      Swal.fire(
          'Batch Empty',
          'Please select Batch',
          'error'
       )
    }
    else if(data.res == "emailExist")
    {
      Swal.fire(
          'Email Already Exist',
          data.msg + ' are already exist',
          'error'
       )
    }
    else if(data.res == "noPhnnumber")
    {
      Swal.fire(
          'Number Empty',
          'Please enter Number',
          'error'
       )
    }
    else if(data.res == "noStatus")
    {
      Swal.fire(
          'Status Empty',
          'Please select Status',
          'error'
       )
    }
    else if(data.res == "success")
    {
      Swal.fire(
          'Success',
          data.msg + ' are now successfully added',
          'success'
       )
        refreshDiv();
        $('#addExamineeFrm')[0].reset();
    }
    else if(data.res == "failed")
    {
      Swal.fire(
          "Something's Went Wrong",
          '',
          'error'
       )
    }


    
  },'json')
  return false;
});



// Update Examinee
$(document).on("submit","#updateExamineeFrm" , function(){
  $.post("query/updateExamineeExe.php", $(this).serialize() , function(data){
     if(data.res == "success")
     {
        Swal.fire(
            'Success',
            data.exFullname + ' <br>has been successfully updated!',
            'success'
          )
          refreshDiv();
     }
  },'json')
  return false;
});


function refreshDiv()
{
  $('#tableList').load(document.URL +  ' #tableList');
  $('#refreshData').load(document.URL +  ' #refreshData');

}


