<template>
    <div>
        <form>
            <div class="login-form"><!-- Login Form -->
                <div class="row">
                    <div class="col-3 col-s-3 my-auto"><!--Logo-->
                        <img src="/images/caclogo_big.png" width="120" height="120" class="rounded" alt="Rounded Image" />
                    </div>
                    <div class="col-9 col-s-9">
                        <div class="row">
                        <div class="col-12" align="left"><!--Sign In-->
                            <h3 class="text-center text-secondary"><strong>Feedback Portal - Admin</strong></h3>
                        </div>
                        </div>
                        <div class="row"> 
                            <div class="col-12 col-s-12"><!--Sign In-->
                                <h5 class="text-center" style="color: #8FBC8F"><strong>Sign In</strong></h5>
                            </div>
                        </div> 
                            <input type="hidden" name="_token" :value="csrf"> 
                            <div class="row"> 
                                <div class="col-12 col-s-12"><!--Username-->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <span class="fa fa-user" style="color: #8FBC8F"></span>
                                            </span>                    
                                            <input type="text" class="form-control" placeholder="Username" name="username" v-model="username">
                                        </div>
                                        <span v-if="username_" class="text-danger small">Username required</span>
                                    </div>
                                
                                </div><!--End Username-->
                            </div>
                            
                            <div class="row">
                                <div class="col-12 col-s-12"><!--Password-->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i class="fa fa-lock" style="color: #8FBC8F"></i>
                                            </span>                    
                                            <input type="password" class="form-control" placeholder="Password" name="password" v-model="password">
                                        </div>
                                        <span v-if="password_" class="text-danger small">Password required</span>
                                    </div>
                                </div><!--End Password-->
                            </div>
                            
                            <div class="row">
                                <div class="col-12 col-s-12"><!--Button-->
                                    <div class="form-group d-grid gap-2">
                                        <button :disabled="freeze" v-on:click.prevent="Login" type="submit" value="Submit" class="btn btn-success btn-block" name="btn_submit">
                                            <span>Login</span>
                                            <span v-html="rotor"></span>
                                        </button> 
                                    </div>
                                </div><!--End Button-->
                            </div>
                            <div class="row">
                                <div class="col-12 col-s-12">
                                    <span v-html="status"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 col-s-5"><!--Forgot Password-->
                                    <small class="text-center medium" ><a class="text-success" href="/forgot-password">Forgot Password?</a></small>
                                </div>
                                <div class="col-7 col-s-7"><!--Sign Up-->
                                    <small class="text-center medium">New user Account? <a class="text-success" href="/signup">Sign up here</a></small>
                                </div>
                            </div>
                    </div>
                </div>
            </div><!-- Login Form -->
        </form>
    </div>
</template>

<script>
import axios from 'axios'
    export default {
    name: 'app',
        data() {
            return{
                errors: [],
                username: null,
                password: null,
                username_: null,
                password_: null,
                freeze: false,
                status: null,
                rotor: '&nbsp;<i class="fas fa-sign-in-alt"></i>',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                user: {}
            }
        },

        methods:{
            checkForm(e){
                this.status = "";
                if (this.username && this.password) {
                    return true;
                }

                this.errors = [];

                if (!this.username) {
                    this.errors.push('Password required.');
                    this.username_=true;
                }
                if (!this.password) {
                    this.errors.push('Password required.');
                    this.password_=true;
                }
                e.preventDefault();
            },
            Login(){
                this.checkForm();
                this.rotor = '&nbsp;<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>';
                this.freeze = true;
                var postData = {
                    "email": this.username,
                    "password": this.password
                }
                try{
                    axios.post("http://127.0.0.1:8000/api/login", postData)
                    .then(response =>{
                        if(response.data["status"] == "success"){
                            this.status='<div class="alert alert-success text-justify"><center>Success!</center></label>';
                            this.$session.start();
                            this.$session.set('username', this.username);
                            this.$session.set('role', response.data["role"]);
                            this.$session.set('token', response.data["token"]);
                            this.$router.push({ name: 'Dashboard' });
                        }
                        else{
                            this.status='<div class="alert alert-danger text-danger"><center>Login attempt failed.</center></label>';
                            this.rotor = '&nbsp;<i class="fas fa-sign-in-alt"></i>';
                             this.freeze = false;
                        }
                    })
                }catch(err){    
                    console.log(err)
                }
            }
        }
    }
</script>

<style>
    .error-boarder {
        border-color: red;
    }
</style>
