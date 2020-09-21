<template>
    <div>
        <vx-card title="Hospital Profile Setting">
            <vs-tabs>
                <vs-tab label="Primary">
                    <div class="">
                        <vs-input label="Phone No." placeholder="Phone No." v-model="form_data.phone_no"/>
                        <vs-input label="Name " placeholder="Hospital Name" v-model="form_data.name" style="width:50vw"/>
                        <vs-textarea label="Address" placeholder="Hospital Address" v-model="form_data.address" style="margin-top:20px"/>
                        <vs-button color="#5f845f"  @click="submitProfile">Save</vs-button>
                    </div>
                </vs-tab>
                <vs-tab label="Security">
                        <vs-input type="password" label="Password" placeholder="Disabled" v-model="form_data.password"/>
                        <vs-button color="#5f845f" style="margin-top:20px"  @click="submitPass">Save</vs-button>
                </vs-tab>
                <vs-tab label="Avatar">
                    <vs-upload></vs-upload>
                    <vs-button color="#5f845f" @click="getProfile">Save</vs-button>
                </vs-tab>
            </vs-tabs>

        </vx-card>
    </div>
</template>
<script>
import axios from "axios"
export default {
    name : 'HospitalProfileSetting' ,
    data(){
        return {
            form_data : {
                name: '',
                phone_no: '',
                address : '' ,
                password : '' ,
            }

        }   
    },  
    mounted (){
        // on mounted get details 
         this.getProfile()   
    },

    methods : {
        async getProfile() {
            this.$vs.loading()
            try{

                let response = await axios.get(`api/profile`)
                console.log(response.data)
                this.form_data.name = response.data.name
                this.form_data.address = response.data.address
                this.form_data.phone_no = response.data.phone_no
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