document.addEventListener('DOMContentLoaded', function(e) {
    FormValidation.formValidation(
        document.getElementById('addservices'),
        {
            fields: {
                price: {
                    validators: {
                        notEmpty: {
                            message: 'A price is required'
                        },
                        numeric: {
                        message: 'It must be a number'
                        }
                    }
                },
                description: {
                    validators: {
                        notEmpty: {
                            message: 'A service description is required'
                        },
                        stringLength: {
                            max: 100,
                            message: 'Max characters is 100'
                        },
                    }
                },
            },
            plugins: {
                declarative: new FormValidation.plugins.Declarative({
                    html5Input: true,
                }),
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