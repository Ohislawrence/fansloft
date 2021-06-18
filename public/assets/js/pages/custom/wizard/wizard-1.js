"use strict";

// Class definition
var KTWizard1 = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizard;
	var _validations = [];

	// Private functions
	var initWizard = function () {
		// Initialize form wizard
		_wizard = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

		// Validation before going to next page
		_wizard.on('beforeNext', function (wizard) {
			// Don't go to the next step yet
			_wizard.stop();

			// Validate form
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
			validator.validate().then(function (status) {
				if (status == 'Valid') {
					_wizard.goNext();
					KTUtil.scrollTop();
				} else {
					Swal.fire({
						text: "Sorry, check to be sure that you have entered the correct information.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});
		});

		// Change event
		_wizard.on('change', function (wizard) {
			KTUtil.scrollTop();
		});
	}

	var initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					campaign_name: {
						validators: {
							notEmpty: {
								message: 'A campaign Name is required'
							}
						}
					},
					desc: {
						validators: {
							notEmpty: {
								message: 'A description is required'
							}
						}
					},
					interest: {
						validators: {
							notEmpty: {
								message: 'Add some interests to this campaign'
							}
						}
					},
					url: {
                    validators: {
                        uri: {
                            message: 'The website address must be valid'
                        }
                    }
                },
					category: {
						validators: {
							notEmpty: {
								message: 'Category is required'
							}
						}
					},
					image: {
						validators: {
							notEmpty: {
								message: 'Image is required'
							}
						}
					},
					
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					cta: {
						validators: {
							notEmpty: {
								message: 'Enter a Call To Action'
							}
						}
					},
					details: {
						validators: {
							notEmpty: {
								message: 'A campaign brief is required'
							},
						}
					},
					tags: {
						validators: {
							notEmpty: {
								message: 'campaign tag is required'
							},
						}
					},
					quotes: {
						validators: {
							notEmpty: {
								message: 'campaign quote is required'
							},
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					budget: {
						validators: {
							notEmpty: {
								message: 'A budget is required'
							},
	                    stringLength: {
	                        min: 5,
	                        max: 30,
	                        message: 'Minimun budget is 10,000 NGN'
	                    			}
							}
						},
					freq: {
						validators: {
							notEmpty: {
								message: 'A frequency required'
							}
						}
					},
					
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap(),
					// Validate fields when clicking the Submit button
            		submitButton: new FormValidation.plugins.SubmitButton(),

            		// Submit the form when all fields are valid
            		defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
				}
			}
		));

		
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard_v1');
			_formEl = KTUtil.getById('kt_form');

			initWizard();
			initValidation();
		}
	};
}();

jQuery(document).ready(function () {
	KTWizard1.init();
});
