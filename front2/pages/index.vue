<template>
    <div >
        <div class="medi-map">
            <OpenMap/>
            <!-- <Map/> -->
        </div>
        <div class="medi-search">
           <!-- <SearchBar/> -->
           <!-- <button @click="foo" >test</button> -->
           <NewSearchBar/>
           <!-- <SearchResult/> -->
           <Hospitals/>
        </div>
        <div class="others">
            <div v-if="observer">
                <Services :observer="observer" />
            </div>
        </div>
        <!-- <TeamMediapp/> -->
    </div>
</template>
<script>    
import Map from "~/components/Map";
import Hospitals from "~/components/Hospitals";
import SearchBar from "~/components/SearchBar";
import TeamMediapp from "~/components/TeamMediapp";
// import NewSearchBar from "~/components/new/SearchBar";
// import SearchResult from "~/components/new/SearchResult";

export default {
    layout : 'layout1' ,
    components:{
        Map , 
        Hospitals ,
        SearchBar ,
        TeamMediapp ,
        NewSearchBar : () => import("~/components/new/SearchBar"),
        SearchResult : () => import("~/components/new/SearchResult"),
        Services : () => import("~/components/new/Benefits") ,
        OpenMap  : () => import("~/components/map/OpenMap") , 
    },
    data(){
        return {
            observer : null ,
        }
    },
    mounted() {
        this.initObserver()
    } ,
    methods:{
        foo(){
            console.log(this.$axios)
        },  
        initObserver(){
          console.log('call init observer ')  
          let options = {
            root : null ,
            rootMargin : '0px' ,
            threshold : 0 ,
          }
          let callback = element => {
            element.forEach(v => {
              v.isIntersecting ?
                document.querySelector(".medi-map").style.zIndex = "-1" :
                document.querySelector(".medi-map").style.zIndex = "2"
            });
          }
          this.observer = new IntersectionObserver(callback,options)

        }        
    }
}
</script>

<style scoped>
.medi-map{
   position:fixed ;
   top : 0 ;
   right : 0 ;
   width : 45%;
   height : 10vh ;
   /* background-color: red; */
   border : 2px solid lightgrey ;
   z-index: 2;
   padding-right: 1%;
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
    height : 50% ;
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
       margin-top: 133%;
       
   }
   .flex-container{
       background-color:lightgreen;
      display:flex ;
      flex-direction: column;
      flex-wrap: wrap;
      justify-content: space-around;
    }
    .others {
        height : 100%;
    }
}
</style>