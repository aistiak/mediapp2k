<template>
    <div class="container">
        <vs-alert title="form submission error" color="rgb(231, 154, 23)" :active="form_errors.length != 0 ">
            <div v-for="(error,k) in form_errors" :key="k">
                <span>  {{ error }} </span>
            </div>
        </vs-alert>
        <vx-input-group class="mb-6">
            <!-- <template slot="prepend">
                <div class="prepend-text bg-primary">
                <span>Name</span>
                </div>
            </template> -->

            <vs-input label="Name" v-model="form_data.name" placeholder="" />
        </vx-input-group>
        <vx-input-group class="mb-6">
            <!-- <template slot="prepend">
                <div class="prepend-text bg-primary">
                <span>Title</span>
                </div>
            </template> -->

            <vs-input label="title" v-model="form_data.title" placeholder="" />
        </vx-input-group>
        <vs-row>
            <vs-col vs-w="6" class=""> 
                <vx-input-group class="mb-6">
                    <!-- <template slot="prepend">
                        <div class="prepend-text bg-primary">
                        <span>Email</span>
                        </div>
                    </template> -->

                    <vs-input label="email" v-model="form_data.email" placeholder="" />
                </vx-input-group>
            </vs-col>
            
            <vs-col vs-w="6" class="">
                <vx-input-group class="mb-6">
                    <!-- <template slot="prepend">
                        <div class="prepend-text bg-primary">
                        <span>Phone No.</span>
                        </div>
                    </template> -->

                    <vs-input label="Phone No." v-model="form_data.phone_no" placeholder="" />
                </vx-input-group>
            </vs-col>
         
        </vs-row>

        <vs-row class="mb-6">
            <vs-col vs-w="6">
                <vx-input-group>
                    <!-- <template slot="prepend"> 
                        <div class="prepend-text bg-primary">
                            <span>Password</span>
                        </div>
                    </template> -->
                    <vs-input label="password" type="password" v-model="form_data.password"> </vs-input>
                </vx-input-group>
            </vs-col>
            <vs-col vs-w="6">
                <vx-input-group>
                    <!-- <template slot="prepend">
                        <div class="prepend-text bg-primary">
                            <span> Type Again</span>
                        </div>
                    </template> -->
                    <vs-input label="type again" type="password" v-model="form_data.password2"> </vs-input>
                </vx-input-group>
            </vs-col>
        </vs-row>
        <vs-button @click="submit_form">Submit</vs-button>

    </div>
</template>
<script>
import axios from "axios"
export default {
    data(){
        return {
            form_errors : [] ,
            show_errors : false ,
            form_data : {
                name : '' ,
                title : '' ,
                phone_no :  '' ,
                email : '' ,
                password: `` ,
                password2 : `` ,
            }
        }
    },

    methods : {
        async submit_form (){
            try {
                // this.$vs.loading()
                this.form_errors = [] 
                await axios.post(`/hospital/add/doctor`,this.form_data) ;
            }catch(e) {
                console.log(e.response)
                this.form_errors = [].concat.apply([], Object.values( e.response.data.errors ) )
                // this.$vs.loading.close()
            }
        }
    }
}
</script>

<style scoped>
.container{
    /* border : 1px solid red ; */
}
</style>