<template>
    <div>
        <!-- <button @click="() => showMap=!showMap">show/hide</button> -->
        <div id="map-wrap"  v-show="showMap">
            <no-ssr>
                <l-map :zoom=8 :center="[23.9464418,90.1277591]">
                    <l-tile-layer url="http://{s}.tile.osm.org/{z}/{x}/{y}.png"></l-tile-layer>
                    <l-marker :lat-lng="[23.9464418,90.1277591]"></l-marker>
                </l-map>
            </no-ssr>
        </div>
    </div>  
</template>
<script>
export default {
    name : 'OpenMap' ,
    data(){
        return {
            showMap : true ,
        }
    }
}
</script>
<style >
    #map-wrap{
        margin-top : 8% ;
        border: 2px solid ;
        height: 100vh ;
    }

    @media only screen and (max-width: 780px) {
        #map-wrap {
            margin-top : 0% ;
            height: 85vh;
        }
    }
</style>