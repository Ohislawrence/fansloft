document.addEventListener('DOMContentLoaded', function(e) {
    FormValidation.formValidation(
        document.getElementById('demoForm'),
        {
            fields: {
                
                amount: {
                    validators: {
                        notEmpty: {
                            message: 'The amount is required'
                        },
                        stringLength: {
                        min: 3,
                        message: 'The minimum amount is 100 NGN'
                    },
                        numeric: {
                            message: 'The amount must be a number'
                        }
                    }
                },
                
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                // Validate fields when clicking the Submit button
            submitButton: new FormValidation.plugins.SubmitButton(),

            // Submit the form when all fields are valid
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