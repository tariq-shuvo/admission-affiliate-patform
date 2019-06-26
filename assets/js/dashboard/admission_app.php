<script>

    $(document).ready(function () {
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label"
        });

        $( "#joinDate" ).datepicker({ dateFormat: 'dd-mm-yy' });
        $( "#birthdayDate" ).datepicker({ dateFormat: 'dd-mm-yy' });

        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });


        $(document).on('keyup','#paidAmount,#courseFee',function () {
           var course_fee=parseFloat($('#courseFee').val());
           var course_paid=parseFloat($('#paidAmount').val());
           var due;

           if(isNaN(course_fee) || isNaN(course_paid))
           {
               if(isNaN(course_fee))
               {
                   course_fee=0;
                   $('#courseFee').css('border','1px solid red');
               }

               if(isNaN(course_paid))
               {
                   course_paid=0;
                   $('#paidAmount').css('border','1px solid red');
               }


               due = course_fee-course_paid;
               $("#dueAmount").val(due);


           }else{
               due = course_fee-course_paid;
               if(isNaN(due))
               {
                   $("#dueAmount").val(0);
               }else{
                   $('#courseFee').css('border','1px solid lightgray');
                   $('#paidAmount').css('border','1px solid lightgray');
                   $("#dueAmount").val(due);
               }

           }
        });

        $(document).on('change','#batchName',function () {
            var course_id=$('#batchName option:selected').data('id');

            if(parseInt(course_id)>0) {
                $.ajax({

                    url: '<?php echo base_url('dashboard/course_info');?>',
                    type: 'POST',
                    data: {'course_id': course_id, 'admin_auth': 'base'},
                    dataType: 'json',
                    success: function (data) {
                        if (parseInt(data[0].course_type) === 1) {
                            $("#courseType").html('<option value="0">Select Course Type</option> <option value="1" selected>online</option> <option value="2">offline</option>');
                        } else {
                            $("#courseType").html('<option value="0">Select Course Type</option> <option value="1">online</option> <option value="2" selected>offline</option>');
                        }

                        $("#courseDuration").val(data[0].duration);
                        $("#mentorName").val(data[0].mentor_name);
                        $("#courseName").val(data[0].batch_title);


                    },
                    error: function (request, error) {
                        alert("Request: " + JSON.stringify(request));
                    }
                });
            }else{
                $("#courseType").html('<option value="0" selected>Select Course Type</option> <option value="1">online</option> <option value="2">offline</option>');
                $("#courseDuration").val("");
                $("#mentorName").val("");
                $("#courseName").val("");
            }


        });

        $(document).on('click','.next_btn_student_info',function () {
            var errorFlag = 0;

            var fullName=$("#fullName").val();
            var emailAddress=$("#emailAddress").val();
            var contactNumber=$("#contactNumber").val();
            var fathersName=$("#fathersName").val();
            var mothersName=$("#mothersName").val();
            var birthdayDate=$("#birthdayDate").val();
            var nationalId=$("#nationalId").val();
            var address=$("#address").val();
            var stateName=$("#stateName").val();
            var countryName=$("#countryName").val();
            var gender=$("#gender option:selected").val();

            if(fullName===""){
                $("#fullName").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#fullName").css('border','1px solid lightgray');
            }

            if(emailAddress===""){
                $("#emailAddress").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#emailAddress").css('border','1px solid lightgray');
            }

            if(contactNumber===""){
                $("#contactNumber").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#contactNumber").css('border','1px solid lightgray');
            }

            if(fathersName===""){
                $("#fathersName").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#fathersName").css('border','1px solid lightgray');
            }

            if(mothersName===""){
                $("#mothersName").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#mothersName").css('border','1px solid lightgray');
            }

            if(birthdayDate===""){
                $("#birthdayDate").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#birthdayDate").css('border','1px solid lightgray');
            }

            if(nationalId===""){
                $("#nationalId").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#nationalId").css('border','1px solid lightgray');
            }

            if(address===""){
                $("#address").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#address").css('border','1px solid lightgray');
            }

            if(countryName===""){
                $("#countryName").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#countryName").css('border','1px solid lightgray');
            }

            if(stateName===""){
                $("#stateName").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#stateName").css('border','1px solid lightgray');
            }

            if(parseInt(gender)===0){
                $("#gender").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#gender").css('border','1px solid lightgray');
            }

            if(errorFlag===0)
            {
                $(".admission_page_1").hide();
                $(".admission_page_3").hide();
                $(".admission_page_2").show();
            }

        });

        $(document).on('click','.next_btn_course_info',function () {
            var errorFlag = 0;

            var joinDate=$("#joinDate").val();
            var courseFee=$("#courseFee").val();
            var paidAmount=$("#paidAmount").val();
            var invoiceNumber=$("#invoiceNumber").val();
            var batchName=$("#batchName option:selected").val();
            var courseStatus=$("#courseStatus option:selected").val();
            var certification=$("#certification option:selected").val();

            if(joinDate===""){
                $("#joinDate").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#joinDate").css('border','1px solid lightgray');
            }

            if(courseFee===""){
                $("#courseFee").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#courseFee").css('border','1px solid lightgray');
            }

            if(paidAmount===""){
                $("#paidAmount").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#paidAmount").css('border','1px solid lightgray');

            }

            if(invoiceNumber===""){
                $("#invoiceNumber").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#invoiceNumber").css('border','1px solid lightgray');
            }

            if(parseInt(batchName)===0){
                $("#batchName").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#batchName").css('border','1px solid lightgray');
            }

            if(parseInt(courseStatus)===0){
                $("#courseStatus").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#courseStatus").css('border','1px solid lightgray');
            }

            if(parseInt(certification)===0){
                $("#certification").css('border','1px solid red');
                errorFlag=1;
            }else{
                $("#certification").css('border','1px solid lightgray');
            }




            if(errorFlag==0)
            {
                $(".admission_page_1").hide();
                $(".admission_page_2").hide();
                $(".admission_page_3").show();
            }


        });

        $(document).on('click','#facebookLinkPlaceholder',function () {
           $(this).prop('contenteditable','true');
           $(this).css({
            border: '1px solid black',
            padding: '1px 5px'
           });
            $(this).text('');
            $(this).focus();
        });

        $(document).on('blur','#facebookLinkPlaceholder',function () {
            if($(this).text()=="")
            {
                $(this).text('Facebook Profile URL');
                $(this).prop('contenteditable',false);
                $('#facebookConnect').prop('checked',false);
                $('#facebookLink').val('');
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }else{
                $(this).prop('contenteditable',false);
                $('#facebookConnect').prop('checked',true);
                $('#facebookLink').val($(this).text());
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }

        });


        $(document).on('click','#linkedinPlaceholder',function () {
            $(this).prop('contenteditable','true');
            $(this).css({
                border: '1px solid black',
                padding: '1px 5px'
            });
            $(this).text('');
            $(this).focus();
        });

        $(document).on('blur','#linkedinPlaceholder',function () {
            if($(this).text()=="")
            {
                $(this).text('Linkedin Profile URL');
                $(this).prop('contenteditable',false);
                $('#linkedinConnect').prop('checked',false);
                $('#linkedinLink').val('');
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }else{
                $(this).prop('contenteditable',false);
                $('#linkedinConnect').prop('checked',true);
                $('#linkedinLink').val($(this).text());
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }

        });


        $(document).on('click','#twitterPlaceholder',function () {
            $(this).prop('contenteditable','true');
            $(this).css({
                border: '1px solid black',
                padding: '1px 5px'
            });
            $(this).text('');
            $(this).focus();
        });

        $(document).on('blur','#twitterPlaceholder',function () {
            if($(this).text()=="")
            {
                $(this).text('Twitter Profile URL');
                $(this).prop('contenteditable',false);
                $('#twitterConnect').prop('checked',false);
                $('#twitterLink').val('');
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }else{
                $(this).prop('contenteditable',false);
                $('#twitterConnect').prop('checked',true);
                $('#twitterLink').val($(this).text());
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }

        });

        $(document).on('click','#youtubePlaceholder',function () {
            $(this).prop('contenteditable','true');
            $(this).css({
                border: '1px solid black',
                padding: '1px 5px'
            });
            $(this).text('');
            $(this).focus();
        });

        $(document).on('blur','#youtubePlaceholder',function () {
            if($(this).text()=="")
            {
                $(this).text('Youtube Profile URL');
                $(this).prop('contenteditable',false);
                $('#youtubeConnect').prop('checked',false);
                $('#youtubeLink').val('');
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }else{
                $(this).prop('contenteditable',false);
                $('#youtubeConnect').prop('checked',true);
                $('#youtubeLink').val($(this).text());
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }

        });

        $(document).on('click','#dribblePlaceholder',function () {
            $(this).prop('contenteditable','true');
            $(this).css({
                border: '1px solid black',
                padding: '1px 5px'
            });
            $(this).text('');
            $(this).focus();
        });

        $(document).on('blur','#dribblePlaceholder',function () {
            if($(this).text()=="")
            {
                $(this).text('Dribble Profile URL');
                $(this).prop('contenteditable',false);
                $('#dribbleConnect').prop('checked',false);
                $('#dribbleLink').val('');
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }else{
                $(this).prop('contenteditable',false);
                $('#dribbleConnect').prop('checked',true);
                $('#dribbleLink').val($(this).text());
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }

        });

        $(document).on('click','#behancePlaceholder',function () {
            $(this).prop('contenteditable','true');
            $(this).css({
                border: '1px solid black',
                padding: '1px 5px'
            });
            $(this).text('');
            $(this).focus();
        });

        $(document).on('blur','#behancePlaceholder',function () {
            if($(this).text()=="")
            {
                $(this).text('Dribble Profile URL');
                $(this).prop('contenteditable',false);
                $('#behanceConnect').prop('checked',false);
                $('#behanceLink').val('');
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }else{
                $(this).prop('contenteditable',false);
                $('#behanceConnect').prop('checked',true);
                $('#behanceLink').val($(this).text());
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }

        });

        $(document).on('click','#websitePlaceholder',function () {
            $(this).prop('contenteditable','true');
            $(this).css({
                border: '1px solid black',
                padding: '1px 5px'
            });
            $(this).text('');
            $(this).focus();
        });

        $(document).on('blur','#websitePlaceholder',function () {
            if($(this).text()=="")
            {
                $(this).text('Website Profile URL');
                $(this).prop('contenteditable',false);
                $('#websiteConnect').prop('checked',false);
                $('#websiteLink').val('');
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }else{
                $(this).prop('contenteditable',false);
                $('#websiteConnect').prop('checked',true);
                $('#websiteLink').val($(this).text());
                $(this).css({
                    border: '0px solid black',
                    padding: '0px'
                });
            }

        });


        $(document).on('click','.previous_btn_1',function () {
            $(".admission_page_2").hide();
            $(".admission_page_3").hide();
            $(".admission_page_1").show();
        });

        $(document).on('click','.previous_btn_2',function () {
            $(".admission_page_1").hide();
            $(".admission_page_3").hide();
            $(".admission_page_2").show();
        });


        // Variable to store your files
        var profile_image;

        // Add events
        $('#image-upload').on('change', prepareUpload);

        // Grab the files and set them to our variable
        function prepareUpload(event)
        {
            files = event.target.files;
        }

        // Edit Courses
        $(document).on('click','.edit_course_btn',function (e) {
           e.preventDefault();
           var edit_id=$(this).data('id');

            $.ajax({

                url : '<?php echo base_url('administrator/edit_course');?>',
                type : 'POST',
                data : {'edit_id':edit_id,'admin_auth':'base'},
                success : function(data) {
                    $("#edit_course_content").html(data);

                },
                error : function(request,error)
                {
                    alert("Request: "+JSON.stringify(request));
                }
            });

        });

        // Delete Courses
        $(document).on('click','.delete_course_btn',function (e) {
            e.preventDefault();
            var confirm_id=$(this).data('id');
            $("#deleteConfirmBtn").attr("href", "<?php echo base_url('administrator/course_delete/'); ?>"+confirm_id);

        });

        // Delete Student
        $(document).on('click','.delete_students_btn',function (e) {
            e.preventDefault();
            var confirm_id=$(this).data('id');
            $("#deleteConfirmBtn").attr("href", "<?php echo base_url('students/delete/'); ?>"+confirm_id);

        });

//        $(document).on('keyup','#searchData',function (e) {
//           e.preventDefault();
//            var search_value=$(this).val();
//            if(search_value!="")
//            {
//                $("#id_search").attr("href", "<?php //echo base_url('students/search/id/'); ?>//"+search_value);
//                $("#batch_search").attr("href", "<?php //echo base_url('students/search/batch/'); ?>//"+search_value.toUpperCase());
//                $("#phone_search").attr("href", "<?php //echo base_url('students/search/phone/'); ?>//"+search_value);
//            }else{
//                $("#id_search").attr("href", "#");
//                $("#batch_search").attr("href", "#");
//                $("#phone_search").attr("href", "#");
//            }
//
//        });

//        $(document).on('keyup','#courseSearch',function (e) {
//            e.preventDefault();
//            var search_value=$(this).val();
//            if(search_value!="")
//            {
//                $("#batch_search").attr("href", "<?php //echo base_url('administrator/search_course/batch/'); ?>//"+search_value);
//                $("#mentor_search").attr("href", "<?php //echo base_url('administrator/search_course/mentor/'); ?>//"+search_value);
//            }else{
//                $("#batch_search").attr("href", "#");
//                $("#mentor_search").attr("href", "#");
//            }
//
//        });




        $(document).on('change','#searchData',function (e) {
            e.preventDefault();
            var search_value= $('#searchData').val();
            var identification= $('#searchData').data('id');
            var buttonData= $('#dropdownMenuButton').text();

            var data={
                'buttonText':buttonData,
                'dataID':identification
            };

            if(search_value!="") {
                if (identification === 'batch') {
                    $.ajax({

                        url: "<?php echo base_url('students/search/batch/'); ?>" + search_value,
                        type: 'POST',
                        data: data,
                        success: function (data) {
                            $("#content").html(data);
                        },
                        error: function (request, error) {
                            alert("Request: " + JSON.stringify(request));
                        }
                    });
                } else if (identification === 'phone') {
                    $.ajax({

                        url: "<?php echo base_url('students/search/phone/'); ?>" + search_value,
                        type: 'POST',
                        data: data,
                        success: function (data) {
                            $("#content").html(data);

                        },
                        error: function (request, error) {
                            alert("Request: " + JSON.stringify(request));
                        }
                    });
                } else if (identification === 'id') {
                    $.ajax({

                        url: "<?php echo base_url('students/search/id/'); ?>" + search_value,
                        type: 'POST',
                        data: data,
                        success: function (data) {
                            $("#content").html(data);
                        },
                        error: function (request, error) {
                            alert("Request: " + JSON.stringify(request));
                        }
                    });
                } else {

                }
            }else{
                $.ajax({

                    url: "<?php echo base_url('students/data/'); ?>",
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        $("#content").html(data);
                        $('#searchData').focus();
                    },
                    error: function (request, error) {
                        alert("Request: " + JSON.stringify(request));
                    }
                });
            }

        });



        $(document).on('click','#ui-id-1 li',function (e) {
            $('#dropdownMenuButtonCourse').focus();
            $('#dropdownMenuButton').focus();
        });

        $(document).on('change','#courseSearch',function (e) {
            e.preventDefault();
            var search_value= $('#courseSearch').val();
            var identification= $('#courseSearch').data('id');
            var buttonData= $('#dropdownMenuButtonCourse').text();

            var data={
                'buttonText':buttonData,
                'dataID':identification
            };

            if(search_value!="") {
                if (identification === 'course_batch') {
                    $.ajax({

                        url: "<?php echo base_url('administrator/search_course/batch/'); ?>" + search_value,
                        type: 'POST',
                        data: data,
                        success: function (data) {
                            $("#content").html(data);
                        },
                        error: function (request, error) {
                            alert("Request: " + JSON.stringify(request));
                        }
                    });
                } else if (identification === 'course_mentor') {
                    $.ajax({

                        url: "<?php echo base_url('administrator/search_course/mentor/'); ?>" + search_value,
                        type: 'POST',
                        data: data,
                        success: function (data) {
                            $("#content").html(data);

                        },
                        error: function (request, error) {
                            alert("Request: " + JSON.stringify(request));
                        }
                    });
                } else {

                }
            }else{
                $.ajax({

                    url: "<?php echo base_url('administrator/course_page/1'); ?>",
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        $("#content").html(data);
                        $('#courseSearch').focus();
                    },
                    error: function (request, error) {
                        alert("Request: " + JSON.stringify(request));
                    }
                });
            }

        });

        $(document).on('click','.students-item',function (e) {
            e.preventDefault();
            $('.students-item').show();
            $(this).hide();
            $('#dropdownMenuButton').text($(this).text());
            $('#searchData').data('id',$(this).data('id'));

            var search_data_id=$(this).data('id');

            if(search_data_id==='phone'){
                $.ajax({

                    url: "<?php echo base_url('students/auto_complete_phone'); ?>",
                    type: 'GET',
                    success: function (data) {
                        var availableTags = jQuery.parseJSON(data);
                        $( "#searchData" ).autocomplete({
                            source: availableTags
                        });
                    },
                    error: function (request, error) {
                        alert("Request: " + JSON.stringify(request));
                    }
                });
            }else if(search_data_id==='batch'){
                $.ajax({

                    url: "<?php echo base_url('students/auto_complete_batch'); ?>",
                    type: 'GET',
                    success: function (data) {
                        var availableTags = jQuery.parseJSON(data);
                        $( "#searchData" ).autocomplete({
                            source: availableTags
                        });
                    },
                    error: function (request, error) {
                        alert("Request: " + JSON.stringify(request));
                    }
                });
            }else if(search_data_id==='id'){
                $.ajax({

                    url: "<?php echo base_url('students/auto_complete_id'); ?>",
                    type: 'GET',
                    success: function (data) {
                        var availableTags = jQuery.parseJSON(data);
                        $( "#searchData" ).autocomplete({
                            source: availableTags
                        });
                    },
                    error: function (request, error) {
                        alert("Request: " + JSON.stringify(request));
                    }
                });
            }else{
                var availableTags = [];
                $( "#searchData" ).autocomplete({
                    source: availableTags
                });
            }


        });

        $(document).on('click','.course-item',function (e) {
            e.preventDefault();
            $('.course-item').show();
            $(this).hide();
            $('#dropdownMenuButtonCourse').text($(this).text());
            $('#courseSearch').data('id',$(this).data('id'));

            var search_data_id=$(this).data('id');

            if(search_data_id==='course_batch'){
                $.ajax({

                    url: "<?php echo base_url('students/auto_complete_course'); ?>",
                    type: 'GET',
                    success: function (data) {
                        var availableTags = jQuery.parseJSON(data);
                        $( "#courseSearch" ).autocomplete({
                            source: availableTags
                        });
                    },
                    error: function (request, error) {
                        alert("Request: " + JSON.stringify(request));
                    }
                });
            }else if(search_data_id==='course_mentor'){
                $.ajax({

                    url: "<?php echo base_url('students/auto_complete_mentor'); ?>",
                    type: 'GET',
                    success: function (data) {
                        var availableTags = jQuery.parseJSON(data);
                        $( "#courseSearch" ).autocomplete({
                            source: availableTags
                        });
                    },
                    error: function (request, error) {
                        alert("Request: " + JSON.stringify(request));
                    }
                });
            }else{
                var availableTags = [];
                $( "#courseSearch" ).autocomplete({
                    source: availableTags
                });
            }

            $('#courseSearch').focus();


        });

        $(document).on('click','.page-item',function (e) {
            e.preventDefault();
            $('.page-item').removeClass('active');
            $(this).addClass('active');
        });

        $(document).on('click','.page-item a',function (e) {
           e.preventDefault();

           var url=$(this).attr('href');

            $.ajax({

                url : url,
                type : 'GET',
                success : function(data) {
                    $("#content").html(data);

                    console.log(data);
                },
                error : function(request,error)
                {
                    alert("Request: "+JSON.stringify(request));
                }
            });

        });


        $.ajax({

            url: "<?php echo base_url('affiliate/auto_complete_affiliate'); ?>",
            type: 'GET',
            success: function (data) {
                var availableTags = jQuery.parseJSON(data);
                $( "#affiliateName" ).autocomplete({
                    source: availableTags
                });
            },
            error: function (request, error) {
                alert("Request: " + JSON.stringify(request));
            }
        });

        $(document).on('focusout','#affiliateName',function () {
            var affiliate_phone= $(this).val();
            $.ajax({

                url: "<?php echo base_url('affiliate/affiliate_id'); ?>",
                type: 'POST',
                data: {
                    'affiliate_phone':affiliate_phone
                },
                success: function (data) {
                    $("#affiliateID").val(data);
                },
                error: function (request, error) {
                    alert("Request: " + JSON.stringify(request));
                }
            });
        });

        $(document).on('submit','#month_data',function (e) {
            e.preventDefault();
            var month=$("#month").val();
            var year=$("#year").val();

            $.ajax({

                url: "<?php echo base_url('affiliate/earnings_details_ajax'); ?>",
                type: 'POST',
                data: {
                    'month':month,
                    'year':year
                },
                success: function (data) {
                    $("#content").html(data);
                },
                error: function (request, error) {
                    alert("Request: " + JSON.stringify(request));
                }
            });

        });

    });
</script>
