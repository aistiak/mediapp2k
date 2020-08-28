<template>
    <div class="mediapp-container">
        <div class="mediapp-nav">
            <!-- this is nav -->
            <div class="logo" >
                logo
            </div>
            <div >
                <div v-if="loggedin"> 
                    <div class="user" @click=" () => show_menu = !show_menu">
                        user 
                    </div>
                    <div class="user-menu" v-show="show_menu">
                        <ul>
                            <li>profile</li>
                            <li>appointments</li>
                            <li @click="() => loggedin = false">logout</li>
                        </ul>
                    </div>
                </div>
                <div  v-else @click="() => loggedin = true" style="margin-right:25px;cursor:pointer">
                    login
                </div>
            </div>
        </div>
        <div>
            <nuxt/>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            show_menu : false ,
            loggedin : false ,
        }
    }
}
</script>
<style scoped>
body{
    overflow:hidden ;
}
.mediapp-container {
    
}
.mediapp-nav{
    position: sticky;
    top : 0 ;
    z-index: 100;
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    height: 45px;
    background-color: #2F3B59;
}
.mediapp-nav > div {
  color : white ;
}
.mediapp-nav .logo {
    margin-left: 25px;
}
.mediapp-nav .user{
    cursor: pointer ;
    margin-right: 25px;
    background-color: cadetblue;
    padding : 7px;
    border-radius: 50%;
}
.user-menu {
position: absolute;
    background-color: rgb(136 115 115);
    text-align: center;
    width: 15vw;
    right: 1%;
    top: 102%;
    border: 1px solid grey;
    min-width: 200px;
    border-radius: 4px;
    box-shadow: 1px 1px 1px 1px #222;
}
ul > li:hover {
    cursor : pointer ;
    color : rgb(170, 216, 164) ;
}
</style>