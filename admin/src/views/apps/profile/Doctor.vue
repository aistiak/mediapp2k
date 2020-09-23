<template>
    <div>
        <vx-card title="Doctor Profile Setting">
            <vs-tabs>
                <vs-tab label="Primary">
                    <div class="">
                        <vs-input label="Phone No." placeholder="Phone No." v-model="form_data.phone_no"/>
                        <vs-input label="Name " placeholder="Doctor Name" v-model="form_data.name" style="width:50vw"/>
                        <vs-input label="Name " placeholder="Doctor Title" v-model="form_data.title" style="width:50vw"/>
                        <!-- <vs-textarea label="Address" placeholder="Hospital Address" v-model="form_data.address" style="margin-top:20px"/> -->
                        <vs-button color="#5f845f"  @click="submitProfile">Save</vs-button>
                    </div>
                </vs-tab>
                <vs-tab label="Security">
                        <vs-input type="password" label="Password" placeholder="Disabled" v-model="form_data.password"/>
                        <vs-button color="#5f845f" style="margin-top:20px"  @click="submitPass">Save</vs-button>
                </vs-tab>
                <vs-tab label="Avatar">
                    <!-- <vs-upload action="http://127.0.0.1:8000/api/contentmanager/store">

                    </vs-upload> -->
                    <input type="file" @change="avatarChanged">
                    <!-- {{avatar_path}} -->
                    <div v-if="avatar_path" style="padding:10px">
                        <img :src="avatar_path" alt="" style="width:15vw;height:20vh;">
                    </div>
                    <vs-button color="#5f845f" @click="changeAvatar">Change</vs-button>
                </vs-tab>
            </vs-tabs>

        </vx-card>
    </div>
</template>
<script>
import axios from "axios"
export default {
    name : 'DoctorProfileSetting' ,
    data(){
        return {
            form_data : {
                name: '',
                phone_no: '',
                title : '' ,
                password : '' ,
                media : {
                   path : '' ,      
                },
            },
            avatar : `` ,

        }   
    },  
    mounted (){
        // on mounted get details 
         this.getProfile()   
    },
    computed :{
        avatar_path () {
            return  this.form_data.media.path 
        }
    },
    methods : {
        async avatarChanged(e){
            this.avatar = e.target.files 
        },
        async changeAvatar(){
            let files = this.avatar 
            if(!files.length ) return 
            let formData = new FormData()
            formData.append("file",files[0])
            formData.append("title",'demo')
            try{
                let res = await axios.post(`api/profile/avatar`,formData,
                {headers:{'Content-Type': 'multipart/form-data'}})
                this.form_data.media = res.data 
            }catch(e) {console.log(e)}

        },
        async getProfile() {
            this.$vs.loading()
            try{

                let response = await axios.get(`api/profile`)
                console.log(response.data)
                this.form_data.name = response.data.name
                this.form_data.address = response.data.address
                this.form_data.phone_no = response.data.phone_no
                this.form_data.media = response.data.media || this.form_data.media 
            }catch(e){console.log(e)}
            this.$vs.loading.close()
        },
         submitProfile : async function(){
           this.$vs.loading()
           try{
               let response = await axios.put(`api/profile`,this.form_data)
               this.form_data = { ...response.data }
           }catch(e){}
           this.$vs.loading.close()
            // console.log(response.data)
        },
        async submitPass() {
            // validate password len and charecters 
            if(this.form_data.password == '') return 
            this.$vs.loading()
            try {
                await axios.put(`api/profile/security`,this.form_data)
            }catch(e){}
            this.$vs.loading.close()
        }
    },
}
</script>
<style scoped>

</style>