<template>
  <div>
    <v-card  max-width="200" >
      <v-img
        v-if="hospital.avatar"
        class="white--text align-end"
        height="150px"
        :src="hospital.avatar.path">
        <!-- <v-card-title>Top 10 Australian beaches</v-card-title> -->
      </v-img>
      <v-img
        v-else
        class="white--text align-end"
        height="150px"
        src="/assets/images/team/team-1.jpg">
        <!-- <v-card-title>Top 10 Australian beaches</v-card-title> -->
      </v-img>

      <v-card-subtitle class="pb-0"> {{ hospital.name}} </v-card-subtitle>

      <v-card-text class="text--primary">
        <!-- <div>Whitehaven Beach</div> -->

        <div> {{ hospital.address }} </div>
      </v-card-text>

      <v-card-actions>
        <v-btn color="orange" text> Detail </v-btn>

        <!-- <v-btn color="orange" text> Explore </v-btn> -->
      </v-card-actions>
    </v-card>
  </div>
</template>
<script>
export default {
  name : 'HospitalCard' ,
  props : {
      hospital : { type : Object , default : Object }
  } ,  
  data() {
    return {};
  },
};
</script>