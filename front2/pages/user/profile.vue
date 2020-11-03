<template>
    <div>
        <div class="profile-container">
            <div class="profile-tabs">
                <div @click="() => selected_tab = `basic` "
                    :class="{'selected' : selected_tab == `basic`}" >
                    Basic 
                </div>
                <div @click="() => selected_tab = `security` "
                    :class="{'selected' : selected_tab == `security`}">
                    Security
                </div>
                <div @click="() => selected_tab = `avatar` "
                    :class="{'selected' : selected_tab == `avatar`}">
                    Avatar
                </div>
            </div>
            <div class="form-container" v-show="selected_tab == `basic` ">
            
                <div class="form-row">
                    <div>
                        <label for="">Name</label>
                    </div>
                    <div>
                        <input type="text" v-model="form_data.name">
                    </div>
                </div>

                <div class="form-row">
                    <div>
                        <label for="">Email</label>
                    </div>
                    <div>
                        <input type="text" v-model="form_data.email" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div>
                        <label for="">Phone No.</label>
                    </div>
                    <div>
                        <input type="text" v-model="form_data.phone_no">
                    </div>
                </div>

                <div class="form-row">
                    <div>
                        <label for="">Address</label>
                    </div>
                    <div>
                        <input type="text" v-model="form_data.address">
                    </div>
                </div>

                <div >
                    <button @click="submitDetail"> Save </button>
                </div>    
        
        
        
            </div>
            <div class="form-container" v-show="selected_tab == `security` ">
                <!-- <div class="form-row">
                    <div>
                        <label for="">Old Password</label>
                    </div>
                    <div>
                        <input type="password" v-model="form_data.old_password">
                    </div>
                </div>             -->
                <div class="form-row">
                    <div>
                        <label for="">New Password</label>
                    </div>
                    <div>
                        <input type="password" v-model="form_data.new_password">
                    </div>
                </div>            
                <div class="form-row">
                    <div>
                        <label for="">Type Again </label>
                    </div>
                    <div>
                        <input type="password" v-model="form_data.password_again">
                    </div>
                </div>   
                <div>
                    <button @click="submitPass">Save</button>
                </div>         
            </div>   
            <div class="form-container" v-show="selected_tab == `avatar` ">
                <div class="form-data">
                    
                    <img v-if="form_data.media" :src="form_data.media.path" style="height:100px"/>
                    <span v-else>
                        <p>No avater is currently set </p>
                    </span>

                </div>
                <div class="form-data">

                    <input type="file"
                           accept="image/x-png,image/gif,image/jpeg" 
                           @change="(event) => form_data.avatar = event.target.files">
                </div>
                <div>
                    <button @click="submitAvatar">Save</button>
                </div>  
            </div>
            <div  style="margin-top:6%" v-show="errors.length">
                <div class="alert alert-danger" role="alert">
                    <p v-for="(v,k) in errors" :key="k">
                        {{ v}}
                    </p>
                </div>
            </div>
        </div>

    </div>
</template>
<script>
import axios from "axios"
export default {
    layout : 'layout1' ,
    name : 'UserProfile' ,
    data() {
        return{

            errors : [] ,

            selected_tab : `basic` ,
            
            failure_alert : false ,

            form_data :{
                phone_no : `` ,
                address  : `` ,
                old_password : `` ,
                new_password : `` ,
                password_again : `` ,
                avatar : [] ,
                media:``,
            },
        }
    },
    mounted(){
        this.getProfile()
    },
    methods : {
        async getProfile () {

            try{

                let res = await this.$axios.get(`api/profile`)
                this.form_data = res.data  

            }catch(e){
                this.setErrors(e)
            }
        },
        async submitDetail(type){
            // validatioin 
            this.errors = [] 
            // submit 
            let form_data = {
                name : this.form_data.name ,
                phone_no : this.form_data.phone_no ,
                address  : this.form_data.address , 
            }
            try {

                await this.$axios.put(`api/profile`,form_data)
            
            }catch(e){

                this.setErrors(e)
            }
        },
        async submitPass(){
            this.errors = [] 
            let form_data = {
                old_password : this.form_data.old_password ,
                new_password : this.form_data.new_password ,
                password_again : this.form_data.password_again ,
            }
            try {
                await this.$axios.put(`api/profile/security`,form_data) 
            }catch(e){
                this.setErrors(e)
            }
        },

        async submitAvatar() {
            this.errors = [] 
            if(!this.form_data.avatar.length) return 
            let form_data = new FormData()
            form_data.append('file',this.form_data.avatar[0])
            form_data.append('title',`${this.form_data.name}_patient_profile_pic`)

            try {

                let res = await this.$axios.post(`api/profile/avatar`,form_data,{
                
                    headers:{'Content-Type': 'multipart/form-data'}
                })
                this.form_data.media = res.data 
            }catch(e){
                this.setErrors(e)
            }
        
        },
        setErrors(e){
            this.errors = []
            let keys = Object.keys(e.response.data.errors)
            for(const key of keys){
                this.errors = [...this.errors, ...e.response.data.errors[key] ]
            }
            this.failure_alert = true 
        }

    } ,
}
</script>

<style scoped>
.profile-container{
    height:75vh;
    margin:10%;
    margin-top:2%;
    border : 2px solid lightgrey ;
    
}
.profile-tabs{
    display:flex ;
    flex-direction: row;
    border : 1px solid ;
    text-align: center;
    font-size : 2.5vh;
}
.profile-tabs > div {
    border : 1px solid lightgrey ;
    width : 200px;
    cursor: pointer ;
    
}
.profile-tabs > div:hover{
    /* background-color: lightgreen;
    transition-delay: 200ms;
    transition-duration: 500ms; */
}
.selected {
    background-color: lightgreen;
}
input {
    border : 2px solid lightgrey ;
    width : 100%;
}
.form-row{
    margin-top:5%;
    /* border : 1px solid red ; */
    display: flex;
    justify-content: stretch;
}
.form-row>div:nth-child(1){
    width: 120px;
    margin-left: 4%;    
}
.form-row>div:nth-child(2){
    width:80% ;
    margin-right: 20px;
}
button{
    float: right;
    margin-right: 61px;
    border: 1px solid;
    width: 187px;
    margin-top: 20px;
    background-color: #95f795;
}
</style>