<template>
    <section class="body-content" id="loading">
        <loading v-if="isLoading === true"></loading>
        <parallax-Header
                :title-parallax="'Login Registration'"
                v-on:done-loading="loaded"
        >
            <img slot="page-image" src="images/backgrounds/GowMacParallax/gow-mac-login.png" class="parallax-page-image-container "/>
        </parallax-Header>
        <section class="body-content">

            <overlord_container data_top='false' data_bottom='false' background-color="transparent">
                <div class="row Panel-Color-Gradient">
                    <div v-if="isSubmitted == false" class="col-md-6 col-md-offset-3">
                        <dl class="accordion login-accordion" style="margin-top: 30px !important;">
                            <dt class="OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted">
                                <a href="javascript:void(0)">Login your account</a>
                            </dt>
                            <dd>
                                <div class="login register">
                                    <div class="btn-rounded">

                                        <div class="form-group">
                                            <div v-if="loginForm.email.isFailed !== false" class="error-text">{{loginForm.email.error}}</div>
                                            <input type="email"
                                                   name="email"
                                                   class="form-control"
                                                   :class="{OverlordFailedBorder: loginForm.email.isFailed}"
                                                   v-model="loginForm.email.text"
                                                   placeholder="Email"
                                                   required autofocus>
                                        </div>

                                        <div class="form-group">
                                            <div v-if="loginForm.password.isFailed !== false" class="error-text">{{loginForm.password.error}}</div>
                                            <input
                                                    type="password"
                                                    name="password"
                                                    :class="{OverlordFailedBorder: loginForm.password.isFailed}"
                                                    v-model="loginForm.password.text"
                                                    class="form-control"
                                                    placeholder="Password"
                                                    required>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-small btn-dark-solid full-width" @click="loginButton">Login</button>
                                        </div>

                                        <div class="form-group">
                                            <input type="checkbox" name="remember" value="remember-me" id="checkbox1">
                                            <label for="checkbox1">Remember me</label>
                                            <a class="pull-right" data-toggle="modal" href=""> Forgot Password?</a>
                                        </div>


                                    </div>

                                </div>
                            </dd>
                            <dt class="OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted">
                                <a href="javascript:void(0)">not a member yet? register now</a>
                            </dt>
                            <dd>
                                <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           placeholder="Name"
                                           name="name"
                                           :class="{OverlordFailedBorder: registrationForm.name.alerts.failed, OverlordSuccessBorder: registrationForm.name.alerts.success}"
                                           v-model="registrationForm.name.text"
                                           required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           placeholder="Email"
                                           name="email"
                                           :class="{OverlordFailedBorder: registrationForm.email.alerts.failed, OverlordSuccessBorder: registrationForm.email.alerts.success}"
                                           v-model="registrationForm.email.text"
                                           required>
                                </div>
                                <!--
                                <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           placeholder="User Name"
                                           name="username"
                                           :class="{OverlordFailedBorder: registrationForm.username.alerts.failed, OverlordSuccessBorder: registrationForm.username.alerts.success}"
                                           v-model="registrationForm.username.text"
                                           required>
                                </div>
                                -->
                                <!--
                                <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           placeholder="Organization"
                                           name="organization"
                                           :class="{OverlordFailedBorder: registrationForm.organization.alerts.failed, OverlordSuccessBorder: registrationForm.organization.alerts.success}"
                                           v-model="registrationForm.organization.text"
                                    >
                                </div>
                                -->
                                <!--
                                <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           placeholder="Phone"
                                           name="phone"
                                           :class="{OverlordFailedBorder: registrationForm.phone.alerts.failed, OverlordSuccessBorder: registrationForm.phone.alerts.success}"
                                           v-model="registrationForm.phone.text"
                                    >
                                </div>
                                -->
                                <div class="form-group">
                                    <input type="password"
                                           class="form-control"
                                           placeholder="Choose Password"
                                           name="password"
                                           :class="{OverlordFailedBorder: registrationForm.password.alerts.failed, OverlordSuccessBorder: registrationForm.password.alerts.success}"
                                           v-model="registrationForm.password.text"
                                           required>
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                           class="form-control"
                                           placeholder="Confirm Password"
                                           name="password_confirmation"
                                           :class="{OverlordFailedBorder: registrationForm.passwordConfirmation.alerts.failed, OverlordSuccessBorder: registrationForm.passwordConfirmation.alerts.success}"
                                           v-model="registrationForm.passwordConfirmation.text"
                                           required>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-small btn-dark-solid full-width " @click="submitRegistration" value="login">Register</button>
                                </div>
                            </dd>

                        </dl>
                    </div>
                    <div v-if="isSubmitted == true">

                    </div>
                </div>
            </overlord_container>

        </section>
        <footer-main v-on:done-loading="loaded"></footer-main>
    </section>
</template>

<script>
    import parallaxHeader from '../hud/ParallaxHeader.vue';
    import Loading from '../hud/Loading.vue';
    import FooterMain from '../hud/Footer.vue';
    export default{
        props:[],
        components:{
            'parallax-Header':parallaxHeader,
            Loading,
            FooterMain

        },
        watch: {
            loadingCount:function(val){
                if (this.loadingCount >= 3){
                    this.isLoading = false;
                }
            }
        },

        data(){
            return {
                id:'login',
                isLoading: true,
                loadingCount : 0,
                isSubmitted: false,
                loginForm:{
                    email: {error:null, text: '', isFailed: false,},
                    password:{error:null, text: '', isFailed: false,}
                },
                registrationForm:{
                    email: {error:null, text: '', alerts:{success: false, failed: false,}},
                    password:{error:null, text: '', alerts:{success: false, failed: false,}},
                    passwordConfirmation:{error:null, text: '', alerts:{success: false, failed: false,}},
                    name:{error:null, text: '', alerts:{success: false, failed: false,}},
                    //phone:{error:null, text: '', alerts:{success: false, failed: false,}},
                    //organization:{error:null, text: '', alerts:{success: false, failed: false,}},
                    //username:{error:null, text: '', alerts:{success: false, failed: false,}},
                }


            };
        },
        mounted(){
            let $window, $document, $body;
            let self = this;
            $window = $(window);
            $document = $(document);
            $body = $("body");
            this.initAccordion();

            $("#loading").imagesLoaded(function(){
                self.loadingCount ++;
            });
        },
        methods: {
            loaded(){
                this.loadingCount ++;
            },
            initAccordion(){
                /*==============================================
                Accordion init
            ===============================================*/
                let allPanels = $(".accordion > dd").hide();
                allPanels.first().slideDown("easeOutExpo");
                $(".accordion").each(function () {
                    $(this).find("dt > a").first().addClass("active").parent().next().css({display: "block"});
                });

                $(".accordion > dt > a").click(function () {

                    let current = $(this).parent().next("dd");
                    $(this).parents(".accordion").find("dt > a").removeClass("active");
                    $(this).addClass("active");
                    $(this).parents(".accordion").find("dd").slideUp("easeInExpo");
                    $(this).parent().next().slideDown("easeOutExpo");

                    return false;

                });
            },
            loginButton(){
                let self = this;
                this.isLoading = true;
                let loginInformation = {
                    'email': this.loginForm.email.text,
                    'password': this.loginForm.password.text
                };
                axios.post('login', loginInformation).then(function(response){
                    if(response.data.user === null){
                        // Error message goes here.
                        self.isSubmitted = true;
                        self.isLoading = false;
                    }else{
                        self.$emit('login', response.data.user);
                    }
                }).catch(function (error){
                    let errors = error.response;
                    if(errors.statusText === 'Unprocessable Entity'){
                        if(errors.data){
                            if(errors.data.email){
                                self.loginForm.email.isFailed = true;
                                self.loginForm.email.error = _.isArray(errors.data.email) ? errors.data.email[0]: errors.data.email;
                            }
                            if(errors.data.password){
                                self.loginForm.password.isFailed = true;
                                self.loginForm.password.error = _.isArray(errors.data.password) ? errors.data.password[0] : errors.data.password
                            }
                        }
                        self.isLoading = false;
                    }
                })
            },
            submitRegistration(){
                let self = this;
                self.isLoading = true;
                let form = {
                    'email': self.registrationForm.email.text,
                    'password': self.registrationForm.password.text,
                    'password_confirmation': self.registrationForm.passwordConfirmation.text,
                    'name': self.registrationForm.name.text,
                };
                axios.post('register', form).then(function(response){
                    self.$emit('login', response.data.user);
                }).catch(function (error) {
                    let errors = error.response;
                    if(errors.statusText === 'Unprocessable Entity'){
                        if(errors.data){
                            if(errors.data.name){
                                self.registrationForm.name.alerts.failed = true;
                                self.registrationForm.name.error = _.isArray(errors.data.name) ? errors.data.name[0]: errors.data.name;
                            }
                            if(errors.data.email){
                                self.registrationForm.email.alerts.failed = true;
                                self.registrationForm.email.error = _.isArray(errors.data.email) ? errors.data.email[0]: errors.data.email;
                            }
                            if(errors.data.password){
                                self.registrationForm.password.alerts.failed = true;
                                self.registrationForm.password.error = _.isArray(errors.data.password) ? errors.data.password[0]: errors.data.password;
                            }
                        }
                        self.isLoading = false;
                    }
                });
            }
        }

    }
</script>