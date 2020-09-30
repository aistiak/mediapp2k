<template>
    <div class="doctor-form">
        <div>
            <label for="">Accout User Information</label>
            <input v-model="hospital_form.name" type="text" placeholder="username">
            <input v-model="hospital_form.email" type="text" placeholder="email">
            <input v-model="hospital_form.password" type="text" placeholder="password">
            <input type="text" placeholder="type again">
        </div>
        <div>
            <label for="">Hospital Information</label>
            <input v-model="hospital_form.hospital_name" type="text" placeholder="hospital name " name="" id="">
            <input v-model="hospital_form.hospital_address" type="text" placeholder="hospital address " name="" id="">

        </div>
        <div class="mb-3">
            
            <label for=""> Location Information </label>
            <div >
                 <div>
                     Division 
                    <select class="custom-select" id="inputGroupSelect01" v-model="selected_division" >
                        <!-- <option selected>Divsion...</option> -->
                        <option v-for="(v,idx) in divisions" :key="idx" :value="v.id" >{{v.division_name_eng}}</option>
                    </select>
                 </div>   
                 <div>
                     District
                     <select class="custom-select" id="inputGroupSelect01" v-model="selected_district">
                        <!-- <option selected>District...</option> -->
                        <option v-for="(v,idx) in districts" :key="idx" :value="v.id" >{{v.district_name_eng}}</option>
                    </select>
                 </div>   
                 <div>
                     Upazila 
                    <select class="custom-select" id="inputGroupSelect01" v-model="selected_upazila" >
                        <!-- <option selected>Subdistrict...</option> -->
                        <option v-for="(v,idx) in upazilas" :key="idx" :value="v.id" >{{v.upazila_name_eng}}</option>
                    </select> 
                 </div>   
            </div>

        </div>
        <button @click="submit" >Submit</button>

        <div class="alert alert-success" role="alert" v-show="success_alert">
            <span>
                account has been created  
                <nuxt-link to="/login">
                    login
                </nuxt-link>
            </span>
        </div>
        <div v-show="failure_alert">
            <div v-for="(error,key) in errors" :key="key">
                <div class="alert alert-danger" role="alert">
                    {{ error }}
                </div>
            </div>
        </div>

    </div>
</template>
<script>
import axios from "axios"
import {mapGetters , mapActions} from "vuex"
export default {
    name: 'HospialForm' ,
    data(){
        return {
            success_alert : false ,
            failure_alert : false ,
            errors: [] ,
            divisions : [] ,
            selected_division : 'Divsion...' ,
            districts : [] ,
            selected_district : 'District...' ,
            upazilas : [] ,
            selected_upazila : 'Subdistrict...' ,            
            hospital_form : {
                type : 'hospital' ,
                name : '' , // user name 
                email : '' , 
                password : '' , 
                hospital_name : '' ,
                hospital_address : '' ,

            }
        }
    },
    mounted(){
        this.getDivisions()
    },
    computed: { ...mapGetters([`getDemo`]) },
    watch:{
        selected_division(id){
            this.selected_district = 'District...' ,
            this.getDistricts() 
            this.hospital_form['division_id'] = id 
        },
        selected_district(id){
            this.selected_upazila = 'Subdistrict...' ,
            this.getUpazilas()
            this.hospital_form['district_id'] = id 
        },
        selected_upazila(id) {
            this.hospital_form['upazila_id'] = id 
        },   
    },
    methods :{



        submit : async function() {
            this.success_alert = false 
            this.failure_alert = false
            try{
                await this.$axios.post(`api/register`,this.hospital_form)
                this.clearData() 
                this.success_alert = true 
            }catch(e){

                this.errors = []
                let keys = Object.keys(e.response.data.errors)
                for(const key of keys){
                    this.errors = [...this.errors, ...e.response.data.errors[key] ]
                }
                this.failure_alert = true                 
            }
        },
        clearData(){
            failure_alert = false ,
            success_alert = false ,
            errors= [] ,
            divisions = [] ,
            selected_division = 'Divsion...' ,
            districts = [] ,
            selected_district = 'District...' ,
            upazilas = [] ,
            selected_upazila = 'Subdistrict...' ,            
            hospital_form = {
                type : 'hospital' ,
                name : '' , // user name 
                email : '' , 
                password : '' , 
                hospital_name : '' ,
                hospital_address : '' ,

            }           
        },
        getDivisions(){
            this.$axios.get(`api/frontend/location/`).then( response => {
                this.divisions = response.data?.data?.divisions
                // this.selected_division = this.divisions[0]
            }).catch( error => {
                alert(`error in division`)
            })
        },
        getDistricts(){

            this.$axios.get(`api/frontend/location/?division_id=${this.selected_division}`).then( response => {
                this.districts = response.data?.data?.districts
                // this.selected_division = this.divisions[0]
            }).catch( error => {
                alert(`error is district`)
            })
        },
        getUpazilas(){

            this.$axios.get(`api/frontend/location/?district_id=${this.selected_district}`).then( response => {
                this.upazilas = response.data?.data?.upazilas
                // this.selected_division = this.divisions[0]
            }).catch( error => {
                alert(`error in upazila`)
            })
        },


    },
}
</script>
<style scoped>
.doctor-form {
    display: flex ;
    flex-direction: column;
    justify-content: space-around;
    align-content: space-around;
}
button{
    padding : 5px ;
    width: 100% ;
    border : 1px solid lightgray ,

}
button:hover {
    background-color: lightgreen;
    transition-delay: 200ms;
    transition-duration: 500ms;
}
input[type="text"]{
    border-bottom: 1px solid lightgray;
}
input[type="text"]:focus{
    border-bottom: 2px solid lightgray;
    transition-delay: 200ms;
    transition-duration: 500ms;
}
label{
    width : 100% ;
    text-align: center; 
    
}
select {
    border : 1px solid lightgrey ;
}

</style>