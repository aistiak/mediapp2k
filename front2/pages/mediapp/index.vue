<template>
    <div>
        <div class="medi-map">
            <Map/>
        </div>
        <div class="medi-search">
           <SearchBar/>
           <Hospitals/>
        </div>
        <div class="others">

        </div>
    </div>
</template>
<script>    
import Map from "~/components/Map";
import Hospitals from "~/components/Hospitals";
import SearchBar from "~/components/SearchBar";
export default {
    layout : 'layout1' ,
    components:{
        Map , 
        Hospitals ,
        SearchBar ,
    },
    data(){
        return {

        }
    },
}
</script>

<style scoped>
.medi-map{
   position:fixed ;
   top : 0 ;
   right : 0 ;
   width : 50%;
   height : 102vh ;
   /* background-color: red; */
   border : 2px solid lightgrey ;
   z-index: -1;
}
.medi-search{
  width: 50%;
  height: 200vh;
  /* background-color: grey;   */
  z-index: -2;
  position : relative ;
}
.others{
    width : 100% ;
    height : 25vh ;
    background-color: blue;
    z-index: 10;

}
/* when mobile map on top search on bottom  */
@media only screen and (max-width : 780px){
   .medi-map{
   position:relative ;
   /* top : 0 ; */
   /* right : 0 ; */
    width : 100%;
   /* height : 102vh ; */
   /* background-color: red; */
   /* border : 2px solid lightgrey ; */
   /* z-index: -1; */
}
}
</style>