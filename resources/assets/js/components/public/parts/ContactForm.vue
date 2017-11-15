<template>
    <overlord_container data_top='false' data_bottom='false' background-color="transparent">
        <div class="heading-title-alt border-short-bottom text-center ">
            <h3 v-if="submit.submitted == false" class="text-uppercase OL-White-Title">
                Contact Us!
            </h3>
            <h3 v-if="submit.submitted == true" class="text-uppercase OL-White-Title">
                Thank you for your comments
            </h3>
            <div class="half-txt">
                <span v-if="submit.submitted == false" style="color:#ffffff;">Tell us what you think! If you're looking for a specific type of Instrument or you have an inquiry, leave a message and we'll get back to you.</span>
                <span v-if="submit.submitted == true" style="color:#ffffff;">We appreciate your support and we hope you enjoy our Products!</span>
            </div>
        </div>


        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <form v-if="submit.submitted === false" class="contact-comments" action="" method="post">
                    <div class="row">

                        <div class="col-md-6 ">

                            <div class="form-group">
                                <!-- Name -->
                                <input type="text"
                                       name="name"
                                       id="name"
                                       class="form-control form-text-box Overlord-TextBox"
                                       placeholder="Name *"
                                       maxlength="100"
                                       v-model="form.name.text"
                                       @blur="validate('name', form.name.text)"
                                       required=""
                                >
                            </div>
                            <div class="form-group">
                                <!-- Email -->
                                <input type="email"
                                       name="email"
                                       id="email"
                                       class="form-control form-text-box Overlord-TextBox"
                                       placeholder="Email *"
                                       maxlength="100"
                                       v-model="form.email.text"
                                       @blur="validate('email', form.email.text)"
                                       required=""
                                >
                            </div>
                            <div class="form-group">
                                <!-- Phone -->
                                <input type="text"
                                       name="phone"
                                       id="phone"
                                       class="form-control form-text-box Overlord-TextBox"
                                       placeholder="Phone"
                                       maxlength="100"
                                       v-model="form.phone.text"
                                       @blur="validate('phone', form.phone.text)"
                                       required=""
                                >
                            </div>
                            <div class="form-group">
                                <!-- Address -->
                                <input type="text"
                                       name="address"
                                       id="address"
                                       class="form-control form-text-box Overlord-TextBox"
                                       placeholder="Address"
                                       maxlength="100"
                                       v-model="form.address.text"
                                       @blur="validate('address', form.address.text)"
                                       required=""
                                >
                            </div>
                            <div class="form-group">
                                <!-- Subject -->
                                <input type="text"
                                       name="subject"
                                       id="subject"
                                       class="form-control form-text-box Overlord-TextBox"
                                       placeholder="Subject"
                                       maxlength="100"
                                       v-model="form.subject.text"
                                       @blur="validate('subject', form.subject.text)"
                                >
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <div class="form-group">
                                <!-- Company -->
                                <input type="text"
                                       name="company"
                                       id="company"
                                       class="form-control form-text-box Overlord-TextBox"
                                       placeholder="Company"
                                       maxlength="100"
                                       v-model="form.company.text"
                                       @blur="validate('company', form.company.text)"
                                >
                            </div>
                            <div class="form-group">
                                <!-- Department -->
                                <input type="text"
                                       name="department"
                                       id="department"
                                       class="form-control form-text-box Overlord-TextBox"
                                       placeholder="Department"
                                       maxlength="100"
                                       v-model="form.department.text"
                                       @blur="validate('department', form.department.text)"
                                >
                            </div>
                            <div class="form-group">
                                <!-- Fax -->
                                <input type="text"
                                       name="fax"
                                       id="fax"
                                       class="form-control form-text-box Overlord-TextBox"
                                       placeholder="Fax"
                                       maxlength="100"
                                       v-model="form.fax.text"
                                       @blur="validate('fax', form.fax.text)"
                                       required=""
                                >
                            </div>
                            <div class="form-group">
                                <!-- Comment -->
                                <textarea
                                        name="body"
                                        id="body"
                                        class="cmnt-text form-control form-text-box Overlord-TextBox"
                                        placeholder="Comments"
                                        maxlength="400"
                                        v-model="form.body.text"
                                        @blur="validate('body', form.body.text)"
                                ></textarea>
                            </div>
                            <div class="form-group full-width">
                                <button v-if="isReadyToSubmit === true" type="submit"  @click.prevent="sendForm" class="btn btn-small btn-dark-solid sendmail">
                                    Send Message
                                </button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </overlord_container>
</template>

<script>

    export default {
        props: [

        ],
        watch:{
        },

        data(){
            return {
                submit:{
                    isReady: false,
                    submitted: false
                },
                form:{
                    name:{
                        alerts:{
                            failed: false,
                            success: false,
                            neutral: true,
                        },
                        text:''
                    },
                    email:{
                        alerts:{
                            failed: false,
                            success: false,
                            neutral: true,
                        },
                        text:''
                    },
                    phone:{
                        alerts:{
                            failed: false,
                            success: false,
                            neutral: true,
                        },
                        text:''
                    },
                    address:{
                        alerts:{
                            failed: false,
                            success: false,
                            neutral: true,
                        },
                        text:''
                    },
                    subject:{
                        alerts:{
                            failed: false,
                            success: false,
                            neutral: true,
                        },
                        text:''
                    },
                    company:{
                        alerts:{
                            failed: false,
                            success: false,
                            neutral: true,
                        },
                        text:''
                    },
                    fax:{
                        alerts:{
                            failed: false,
                            success: false,
                            neutral: true,
                        },
                        text:''
                    },
                    department:{
                        alerts:{
                            failed: false,
                            success: false,
                            neutral: true,
                        },
                        text:''
                    },
                    body:{
                        alerts:{
                            failed: false,
                            success: false,
                            neutral: true,
                        },
                        text:''
                    }
                }

            }
        },
        computed:{
            isReadyToSubmit:function(){
                let count = 0;
                if (this.form.name.alerts.success === true){count ++;}
                if (this.form.email.alerts.success === true){count ++;}
                if (this.form.subject.alerts.success === true){count ++;}
                if (this.form.body.alerts.success === true){count ++;}
                if(count === 4){
                    return true;
                }

                return false;

            }

        },


        mounted(){
            let self = this;
            $("#loading-progress").imagesLoaded(function(){
                self.$emit('done-loading');
            });


        },

        methods:{
            sendForm(){
                let self = this;
                let data = {
                    'submit': true,
                    'name': self.form.name.text,
                    'email': self.form.email.text,
                    'address': self.form.address.text,
                    'subject': self.form.subject.text,
                    'phone': self.form.phone.text,
                    'fax': self.form.fax.text,
                    'department': self.form.department.text,
                    'company': self.form.company.text,
                    'body': self.form.body.text,
                };
                axios.post('admin/contact', data)
                    .then(function(response){
                        if(response.data.status === 'success'){
                            self.submit.submitted = true;
                        }

                        console.log(response.data);
                    });
            },
            validate(field, text){
                let self = this;
                let data = {
                    submit: false,
                    field: field,
                    text: text,
                };
                axios.post('admin/contact', data)
                    .then(function(response){
                        console.log(response.data);
                        if(response.data.status === 'success'){
                            switch(response.data.name){
                                case 'name':
                                    self.form.name.alerts.success = true;
                                    self.form.name.alerts.failed = self.form.name.alerts.neutral = false;
                                    break;
                                case 'subject':
                                    self.form.subject.alerts.success = true;
                                    self.form.subject.alerts.failed = self.form.subject.alerts.neutral = false;
                                    break;
                                case 'company':
                                    self.form.company.alerts.success = true;
                                    self.form.company.alerts.failed = self.form.company.alerts.neutral = false;
                                    break;
                                case 'phone':
                                    self.form.phone.alerts.success = true;
                                    self.form.phone.alerts.failed = self.form.phone.alerts.neutral = false;
                                    break;
                                case 'fax':
                                    self.form.fax.alerts.success = true;
                                    self.form.fax.alerts.failed = self.form.fax.alerts.neutral = false;
                                    break;
                                case 'department':
                                    self.form.department.alerts.success = true;
                                    self.form.department.alerts.failed = self.form.department.alerts.neutral = false;
                                    break;
                                case 'email':
                                    self.form.email.alerts.success = true;
                                    self.form.email.alerts.failed = self.form.email.alerts.neutral = false;
                                    break;
                                case 'address':
                                    self.form.address.alerts.success = true;
                                    self.form.address.alerts.failed = self.form.address.alerts.neutral = false;
                                    break;
                                case 'body':
                                    self.form.body.alerts.success = true;
                                    self.form.body.alerts.failed = self.form.body.alerts.neutral = false;
                                    break;
                            }
                        }
                        else if(response.data.status === 'failed'){
                            switch(response.data.name){
                                case 'name':
                                    self.form.name.alerts.failed = true;
                                    self.form.name.alerts.success = self.form.name.alerts.neutral = false;
                                    break;
                                case 'subject':
                                    self.form.subject.alerts.failed = true;
                                    self.form.subject.alerts.success = self.form.subject.alerts.neutral = false;
                                    break;
                                case 'company':
                                    self.form.company.alerts.failed = true;
                                    self.form.company.alerts.success = self.form.company.alerts.neutral = false;
                                    break;
                                case 'department':
                                    self.form.department.alerts.failed = true;
                                    self.form.department.alerts.success = self.form.department.alerts.neutral = false;
                                    break;
                                case 'phone':
                                    self.form.phone.alerts.failed = true;
                                    self.form.phone.alerts.success = self.form.phone.alerts.neutral = false;
                                    break;
                                case 'fax':
                                    self.form.fax.alerts.failed = true;
                                    self.form.fax.alerts.success = self.form.fax.alerts.neutral = false;
                                    break;
                                case 'email':
                                    self.form.email.alerts.failed = true;
                                    self.form.email.alerts.success = self.form.email.alerts.neutral = false;
                                    break;
                                case 'address':
                                    self.form.address.alerts.failed = true;
                                    self.form.address.alerts.success = self.form.address.alerts.neutral = false;
                                    break;
                                case 'body':
                                    self.form.body.alerts.failed = true;
                                    self.form.body.alerts.success = self.form.body.alerts.neutral = false;

                                    break;
                            }

                        }
                    })
            },



        }
    }
</script>