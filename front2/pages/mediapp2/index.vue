<template>
    <div>

        <div class="flex-container">
            <div class="medi-search">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia reprehenderit dolorem quibusdam odit aliquam natus sunt ullam aliquid distinctio sit! 
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia reprehenderit dolorem quibusdam odit aliquam natus sunt ullam aliquid distinctio sit! 
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia reprehenderit dolorem quibusdam odit aliquam natus sunt ullam aliquid distinctio sit! 
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia reprehenderit dolorem quibusdam odit aliquam natus sunt ullam aliquid distinctio sit! 
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia reprehenderit dolorem quibusdam odit aliquam natus sunt ullam aliquid distinctio sit! 
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia reprehenderit dolorem quibusdam odit aliquam natus sunt ullam aliquid distinctio sit! 
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia reprehenderit dolorem quibusdam odit aliquam natus sunt ullam aliquid distinctio sit! 
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia reprehenderit dolorem quibusdam odit aliquam natus sunt ullam aliquid distinctio sit! 
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia reprehenderit dolorem quibusdam odit aliquam natus sunt ullam aliquid distinctio sit! 
            </div>       
            <div class="medi-map">
                <Map/>
            </div>

        </div>

        <div class="others">

        </div>
    
    </div>
</template>
<script>    
import Map from "~/components/Map";
export default {
    layout : 'layout1' ,
    components:{
        Map , 
    },
    data(){
        return {

        }
    },
}
</script>

<style scoped>
.flex-container{
    display: flex;
    
}
.flex-container > div{
    border : 1px solid red ;

}
.medi-map {
    min-width: 50%;
    min-height: 100px;
    position : fixed ;
    top:0 ;
    right : 0 ;
}
</style>