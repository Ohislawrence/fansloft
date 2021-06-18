document.addEventListener('DOMContentLoaded', function(e) {
    FormValidation.formValidation(
        document.getElementById('proposal'),
        {
            fields: {
                proposal: {
                    validators: {
                        notEmpty: {
                            message: 'Proposal is required'
                        },
                        stringLength: {
                            min: 100,
                            max: 6000,
                            message: 'Your proposal must be more than 700 and less than 6000 characters long'
                        },
                        
                    }
                },
                bid: {
                    validators: {
                        notEmpty: {
                            message: 'The amount is required'
                        },
                        stringLength: {
                        min: 4,
                        message: 'The minimum amount is 1000 NGN'
                        },
                        numeric: {
                        message: 'The amount must be a number'
                        }
                    }
                },
                'size[]': {
                    validators: {
                        notEmpty: {
                            message: 'The size is required'
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