<template>
    <div >
        <div class="medi-map">
            <Map/>
        </div>
        <div class="medi-search">
           <!-- <SearchBar/> -->
           <NewSearchBar/>
           <!-- <SearchResult/> -->
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
// import NewSearchBar from "~/components/new/SearchBar";
// import SearchResult from "~/components/new/SearchResult";

export default {
    layout : 'layout1' ,
    components:{
        Map , 
        Hospitals ,
        SearchBar ,
        NewSearchBar : () => import("~/components/new/SearchBar"),
        SearchResult : () => import("~/components/new/SearchResult"),
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
   width : 45%;
   height : 102vh ;
   /* background-color: red; */
   border : 2px solid lightgrey ;
   z-index: -1;
}
.medi-search{
  width: 55%;
  min-height: 200vh;
  /* background-color: grey;   */
  position : relative ;
  padding:20px;
  margin:20px;
  margin-right:20px;
}
.others{
    width : 100% ;
    height : 50vh ;
    background-color: #3EAAFD;
    z-index: 10;

}
/* when mobile map on top search on bottom  */
@media only screen and (max-width : 780px){
   .medi-map{
     position:relative ;
     width : 100%;
     z-index : 2 ;
   }
   .medi-search{
       width: 100%;
   }
   .flex-container{
       background-color:lightgreen;
      display:flex ;
      flex-direction: column;
      flex-wrap: wrap;
      justify-content: space-around;
    }
}
</style>