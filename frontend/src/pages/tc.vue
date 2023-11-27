<script>

import Header from "../components/header.vue";
export default {
  name: "tc",

  components: {
    Header
  }
}
</script>

<template>

  <Header></Header>

  <h2>Vilkår</h2>

  <p>Jeg godtar at min informasjon publiseres på f-b.no, jeg godttar også at mitt telefonnummer kan lagres for fremtidig bruk av Idyllfestivalen mtp promotering</p>

  <van-action-bar style="margin-bottom: 15px;">

    <van-action-bar-button type="primary" color="#2D76A2" text="Registrer ny deltager" to="/registrer-de" />
  </van-action-bar>


</template>

<style scoped>

</style>