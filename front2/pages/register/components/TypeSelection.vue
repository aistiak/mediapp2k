<template>
    <div>
        <div    @click="manage_select"
                class="type-selection-container">
                <div class="user" >
                    User
                </div>
                <div class="doctor">
                    Doctor
                </div>
                <div class="hospital">
                    Hospital
                </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {

        }
    },
    methods : {
        manage_select(event) {
            let name = event.target.className
            if(name == 'type-selection-container' || name == '' ) return  
            this.$parent.type = name  
            // capitize first letter then push 
            this.$parent.crum_list.push( name.charAt(0).toUpperCase() + name.slice(1) )
        }
    } ,
}
</script>

<style scoped>
.type-selection-container {
    display : flex ;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.type-selection-container > div {
    cursor: pointer;
    border : 1px solid lightgrey ;
    margin : 20px;
    width: 30vw;
    min-width: 250px;
    height: 10vh;
    text-align: center;
    font-size: 4vh;
    background-color: lightslategray;
    border-radius: 5px;
}
.type-selection-container>div:hover{
    background-color: rgb(122, 206, 122);
}
</style>