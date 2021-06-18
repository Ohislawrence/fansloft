document.addEventListener('DOMContentLoaded', function(e) {
    FormValidation.formValidation(
        document.getElementById('platform'),
        {
            fields: {
                followers: {
                    validators: {
                        notEmpty: {
                            message: 'Number of followers is required'
                        },
                        numeric: {
                        message: 'It must be a number'
                        }
                    }
                },
                following: {
                    validators: {
                        notEmpty: {
                            message: 'How many people follow you?'
                        },
                        numeric: {
                        message: 'It must be a number'
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
                username: {
                    validators: {
                        notEmpty: {
                            message: 'A username is required'
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