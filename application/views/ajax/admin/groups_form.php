
<?php echo form_open('admin/groups/doSave/'.$info->id,'class="smart-form" id="groups-form"');?>
    <input type="hidden" name="group_id" id="group_id" value="<?php echo $info->id;?>">
    <section>
        <label class="label">Name</label>
        <label class="input">
            <i class="icon-append fa fa-tag"></i>
            <input type="text" name="name" id="name" value="<?php echo $info->name;?>">
        </label>
    </section>
    <section>
        <label class="label">Description</label>
        <label class="textarea">
            <i class="icon-append fa fa-pencil"></i>
            <textarea rows="4" name="description" id="description"><?php echo $info->description;?></textarea>
        </label>
    </section>
    <div class="row">
        <section class="col col-6">
            <label class="select">
                <?php 
                $types = array(
                    '' => 'Select type', 
                    'public' => 'Public',
                    'private' => 'Private'
                );
                echo form_dropdown('type',$types, $info->type,'id="type"'); ?>
                <i></i> </label>
        </section>

         <section class="col col-6">
            <label class="select">
                <?php 
                $statuses = array(
                    '' => 'Select status', 
                    '0' => 'Enable',
                    '1' => 'Disabled'
                );
                echo form_dropdown('status',$statuses, $info->status,'id="status"'); ?>
                <i></i> </label>
        </section>

    </div>
   
    <hr>
    <button type="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
</form>
  
<script type="text/javascript">
    //runAllForms();

    var validatefunction = function() {

        $("#groups-form").validate({
            
            rules : {
                name : {
                    required : true,
                    maxlength: 50,
                    onfocusout: false,
                    remote: {
                        url: BASE_URL+'admin/groups/checkexistgroup',
                        type: "post",
                        data: {
                            name: function(){ 
                                return $("#name").val();
                            },
                            id: $("#group_id").val()
                        }
                    }
                },
                description : {
                    required : true,
                    maxlength: 1500
                },
                type : {
                    required : true
                },
                status : {
                    required : true
                },  
            },

            // Messages for form validation
            messages : {
                name : {
                    required : '<i class="fa fa-times-circle"></i> Please enter your group name',
                    maxlength: '<i class="fa fa-times-circle"></i> The group name can not exceed 50 characters in length.',
                    remote: '<i class="fa fa-times-circle"></i> The group name already in use.'
                },
                description : {
                    required : '<i class="fa fa-times-circle"></i> Please add your group description',
                    maxlength: '<i class="fa fa-times-circle"></i> The group description can not exceed 1500 characters in length.'
                },
                type : {
                    required : '<i class="fa fa-times-circle"></i> Please select your group type'
                },
                status : {
                    required : '<i class="fa fa-times-circle"></i> Please select your group status'
                },
            },
            highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            errorElement: 'span',
            errorClass: 'text-danger',
            errorPlacement: function(error, element) {
                if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                }else{
                    error.insertAfter(element);
                }
            },
            // Ajax form submition
            submitHandler : function(form) {
                
                $(form).ajaxSubmit({
                    beforeSend: function () {
                        $('#submit').html('Please wait...');
                        $('#submit').attr("disabled", "disabled");
                    },
                    success:function(response)
                    {
                        if(response.success)
                        {
                            $.smallBox({
                                title : "Success",
                                content : response.message,
                                color : "#739E73",
                                iconSmall : "fa fa-check",
                                timeout : 3000
                            });
                            $('.bootbox-close-button').trigger('click');
                            checkURL();
                        }
                        else
                        {
                            $.smallBox({
                                title : "Error",
                                content : response.message,
                                color : "#C46A69",
                                iconSmall : "fa fa-warning shake animated",
                                timeout : 3000
                            });
                            
                        }                   
                        $('#submit').text('Submit');
                        $('#submit').removeAttr("disabled");
                    },
                    dataType:'json'
                });
            }
        });
    }
    loadScript(BASE_URL+"js/plugin/jquery-validate/jquery.validate.min.js", function(){
        loadScript(BASE_URL+"js/plugin/jquery-form/jquery-form.min.js", validatefunction);
    });
</script>