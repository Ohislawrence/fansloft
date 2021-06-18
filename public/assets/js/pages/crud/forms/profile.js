document.addEventListener('DOMContentLoaded', function(e) {
    FormValidation.formValidation(
        document.getElementById('profile'),
        {
            fields: {
                bio: {
                    validators: {
                        
                        stringLength: {
                            min: 100,
                            max: 300,
                            message: 'Your bio must be more than 100 and less than 300 characters long'
                        },
                        
                    }
                },
                mobilenumber: {
                    validators: {
                        
                        numeric: {
                        message: 'Your Phone number should be a number'
                        }
                    }
                },
                acc_number: {
                    validators: {
                        
                        numeric: {
                        message: 'Your account number should be a number'
                        }
                    }
                },
                
                availability: {
                    validators: {
                        notEmpty: {
                            message: 'The availability option is required'
                        }
                    }
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                icon: new FormValidation.plugins.Icon({
                    valid: 'fa fa-check',
                    invalid: 'fa fa-times',
                    validating: 'fa fa-refresh'
                }),
            },
        }
    );
});