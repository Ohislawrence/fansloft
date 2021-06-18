
<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>@section('title')
        | Fansloft
        @show </title>
        <meta name="description" content=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->


                    <!--begin::Page Custom Styles(used by this page)-->
                             <link href="{{ url('public/assets/css/pages/login/classic/login-4.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
                        <!--end::Page Custom Styles-->

        <!--begin::Global Theme Styles(used by all pages)-->
                    <link href="{{ url('public/assets/plugins/global/plugins.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
                    <link href="{{ url('public/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
                    <link href="{{ url('public/assets/css/style.bundle.css?v=7.0.6')}}" rel="stylesheet" type="text/css"/>
                <!--end::Global Theme Styles-->

        <!--begin::Layout Themes(used by all pages)-->
                <!--end::Layout Themes-->

        <link rel="shortcut icon" href="{{ url('public/ag/assets/images/logof.png')}}"/>
@yield("head")
            </head>
    <!--end::Head-->

    <!--begin::Body-->
    <body  id="kt_body" style="background-image: url({{ url('public/assets/media/bg/bg-10.jpg')}})"  class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading"  >

        <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
    <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('{{ url('public/assets/media/bg/bg-3.jpg')}}');">
        <div class="login-form text-center p-7 position-relative overflow-hidden">
            <!--begin::Login Header-->
            <div class="d-flex flex-center mb-15">
                <a href="{{url('/')}}">
                    <img src="{{ url('public/ag/assets/images/logof.png')}}" class="max-h-75px" alt=""/>
                </a>
            </div>
            <!--end::Login Header-->
        
                        @yield("content")
                   
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <!--end::Login-->
    </div>
<!--end::Main-->


        


@yield("footer")
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1200
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#6993FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#F3F6F9",
                "dark": "#212121"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1E9FF",
                "secondary": "#ECF0F3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#212121",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#ECF0F3",
            "gray-300": "#E5EAEE",
            "gray-400": "#D6D6E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#80808F",
            "gray-700": "#464E5F",
            "gray-800": "#1B283F",
            "gray-900": "#212121"
        }
    },
    "font-family": "Poppins"
};
        </script>
        <!--end::Global Config-->

        <!--begin::Global Theme Bundle(used by all pages)-->
                   <script src="{{ url('public/assets/plugins/global/plugins.bundle.js?v=7.0.6')}}"></script>
                   <script src="{{ url('public/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6')}}"></script>
                   <script src="{{ url('public/assets/js/scripts.bundle.js?v=7.0.6')}}"></script>
                <!--end::Global Theme Bundle-->


                    <!--begin::Page Scripts(used by this page)-->
                            
                        <!--end::Page Scripts-->
                        <script>
document.addEventListener('DOMContentLoaded', function(e) {
    const demoForm = document.getElementById('reg');
    const fv = FormValidation.formValidation(reg, {
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Your full name is required'
                    }
                }
            },
            lastName: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required'
                    }
                }
            },
            brandname: {
                validators: {
                    notEmpty: {
                        message: 'A username is required'
                    },
                    stringLength: {
                        min: 5,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'Your input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must have at least 8 characters'
                    },
                    different: {
                        message: 'The password cannot be the same as username',
                        compare: () => {
                            return form.querySelector('[name="brandname"]').value;
                        }
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            agree: {
                validators: {
                    notEmpty: {
                        message: 'You must agree with the terms and conditions'
                    }
                }
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            tachyons: new FormValidation.plugins.Tachyons(),
            submitButton: new FormValidation.plugins.SubmitButton(),
            icon: new FormValidation.plugins.Icon({
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh',
            }),
        },
    });
});
</script>
            </body>
    <!--end::Body-->
</html>