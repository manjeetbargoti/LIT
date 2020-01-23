'use strict';
$(document).ready(function() {
    $('#popup-validation').validationEngine();
    Admire.formValidation();
    $(".error_color").append('<br/>');
    $(".form_val_popup_dp1").datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true
    });
    $(".form_val_popup_dp2").datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true
    });
    $('.form_val_popup_dp3').datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true
    }).on("changeDate", function() {
        $('#form_block_validator').bootstrapValidator('revalidateField', 'date_inline');
    });
    $('.form_val_popup_dp4').datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        autoclose: true
    }).on("changeDate", function() {
        $('#form_inline_validator').bootstrapValidator('revalidateField', 'birthday');
    });
    $(':contains(* Invalid email address)').remove('.formErrorContent');
    $('#form_block_validator').bootstrapValidator({
        fields: {
            business_name: {
                validators: {
                    notEmpty: {
                        message: 'Enter business name'
                    }
                }
            },
            business_id: {
                validators: {
                    notEmpty: {
                        message: 'Please Select your Company'
                    }
                }
            },
            project_name: {
                validators: {
                    notEmpty: {
                        message: 'Enter project name'
                    }
                }
            },  
            company_background: {
                validators: {
                    notEmpty: {
                        message: 'Write something about your company'
                    }
                }
            },  
            project_description: {
                validators: {
                    notEmpty: {
                        message: 'Write something about this project'
                    }
                }
            },
            project_goals: {
                validators: {
                    notEmpty: {
                        message: 'Please write Project goals'
                    }
                }
            },
            budget: {
                validators: {
                    notEmpty: {
                        message: 'Please enter project budget'
                    }
                }
            },
            project_timeline: {
                validators: {
                    notEmpty: {
                        message: 'Please enter project duration'
                    }
                }
            },
            business_description: {
                validators: {
                    notEmpty: {
                        message: 'Enter business description'
                    }
                }
            },
            priority_sdg: {
                validators: {
                    notEmpty: {
                        message: 'Please Select Priority SDGs'
                    }
                }
            },
            contact_person_name: {
                validators: {
                    notEmpty: {
                        message: 'Please type contact person name'
                    }
                }
            },
            email: {
                validators: {
                    regexp: {
                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
                        message: 'The is not a valid email address.'
                    },
                    notEmpty: {
                        message: 'Enter contact person email address'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'Enter phone of contact person'
                    }
                }
            },
            country: {
                validators: {
                    notEmpty: {
                        message: 'Select your business country'
                    }
                }
            },
            sdg_name: {
                validators: {
                    notEmpty: {
                        message: 'Enter SDG Name'
                    }
                }
            },
            Email2: {
                validators: {
                    regexp: {
                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
                        message: 'The input is not a valid email address.'
                    },
                    notEmpty: {
                        message: 'The email address is required'
                    }
                }
            },
            Password2: {
                validators: {
                    notEmpty: {
                        message: 'Please provide a password'
                    }
                }
            },
            Confirmpassword2: {
                validators: {
                    notEmpty: {
                        message: 'Confirm the password.'
                    },
                    identical: {
                        field: 'Password2',
                        message: 'Please enter the same password as above'
                    }
                }
            },
            date_inline: {
                validators: {
                    notEmpty: {
                        message: 'Date is required and can not be empty'
                    }
                }
            },
            Url2: {
                validators: {
                    notEmpty: {
                        message: 'Enter valid url.'
                    }
                }
            },
            digits_only: {
                validators: {
                    notEmpty: {
                        message: 'This field is required.'
                    },
                    regexp: {
                        regexp: /^\d+$/,
                        message: 'Contains digits only.'
                    }
                }
            },
            Range: {
                validators: {
                    notEmpty: {
                        message: 'Enter digits between 5 to 16.'
                    },
                    between: {
                        min: 5,
                        max: 16,
                        message: 'Please enter a value between 5 and 16.'
                    },
                    regexp: {
                        regexp: /^\d+$/,
                        message: 'The value is not an integer'
                    }
                }
            },
            activate: {
                validators: {
                    notEmpty: {
                        message: 'You have to accept the terms and conditions'
                    }
                }
            }
        }
    });
    $('#form_inline_validator').bootstrapValidator({
        framework: 'bootstrap',
        fields: {
            roles: {
                validators: {
                    notEmpty: {
                        message: 'Please select a role'
                    }
                }
            },
            title: {
                validators: {
                    notEmpty: {
                        message: 'Please select title'
                    }
                }
            },
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'Enter your first name'
                    }
                }
            },
            username: {
                validators: {
                    notEmpty: {
                        message: 'Enter your username'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'The phone number is required'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    regexp: {
                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
                        message: 'The input is not a valid email address.'
                    }
                }
            },
            confemail: {
                validators: {
                    notEmpty: {
                        message: 'The confirm email address is required'
                    },
                    regexp: {
                        regexp: /^\S+@\S{1,}\.\S{1,}$/,
                        message: 'The input is not a valid email address.'
                    },
                    identical: {
                        field: 'email',
                        message: 'Please enter the same email as above'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Please provide a password'
                    }
                }
            },
            confirmpassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and can\'t be empty.'
                    },
                    identical: {
                        field: 'password',
                        message: 'Please enter the same password as above'
                    }
                }
            },

            Url3: {
                validators: {
                    notEmpty: {
                        message: 'Enter valid url.'
                    }
                }
            },
            Minsize3: {
                validators: {
                    notEmpty: {
                        message: 'Enter min 3 characters.'
                    },
                    regexp: {
                        regexp: /^\S.{2,}$/,
                        message: 'Please enter at least 3 characters and should not start with space.'
                    }
                }
            },
            Maxsize3: {
                validators: {
                    notEmpty: {
                        message: 'Enter max 6 characters'
                    },
                    regexp: {
                        regexp: /^\S.{0,5}$/,
                        message: 'Should not be more than 6 characters and should not start with space.'
                    }
                }
            },

            MinNum: {
                validators: {
                    notEmpty: {
                        message: 'Enter the minimum number 3.'
                    },
                    greaterThan: {
                        value: 3,
                        message: 'Please enter a value greater than or equal to 3.'
                    },
                    regexp: {
                        regexp: /^\d+$/,
                        message: 'The value is not an integer'
                    }
                }
            },
            maxNum: {
                validators: {
                    notEmpty: {
                        message: 'Enter maximum number 16.'
                    },
                    lessThan: {
                        value: 16,
                        message: 'Please enter a value less than or equal to 16.'
                    },
                    regexp: {
                        regexp: /^\d+$/,
                        message: 'The value is not an integer'
                    }

                }
            },
            birthday: {
                validators: {
                    notEmpty: {
                        message: 'Date is required and can not be empty'
                    }
                }
            }
        }
    });
});
