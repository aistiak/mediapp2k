<template>
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
                    <input type="text">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="">Email</label>
                </div>
                <div>
                    <input type="text">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="">Phone No.</label>
                </div>
                <div>
                    <input type="text">
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="">Address</label>
                </div>
                <div>
                    <input type="text">
                </div>
            </div>

            <div >
                <button> Save </button>
            </div>    
       
       
       
        </div>
        <div class="form-container" v-show="selected_tab == `security` ">
            <div class="form-row">
                <div>
                    <label for="">Old Password</label>
                </div>
                <div>
                    <input type="password">
                </div>
            </div>            
            <div class="form-row">
                <div>
                    <label for="">New Password</label>
                </div>
                <div>
                    <input type="password">
                </div>
            </div>            
            <div class="form-row">
                <div>
                    <label for="">Type Again </label>
                </div>
                <div>
                    <input type="password">
                </div>
            </div>   
            <div>
                <button>Save</button>
            </div>         
        </div>    
    </div>
</template>
<script>
export default {
    layout : 'layout1' ,
    data() {
        return{
            selected_tab : `basic` 
        }
    }
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