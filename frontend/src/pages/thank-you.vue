<script>

import Header from "../components/header.vue";

export default {

  components: {
    Header
  }

}
</script>

<template>

  <Header></Header>

  <p style="margin-top: 25px">
    Takk for din registrering.
  </p>
  <p>
    Du kan se alle resultater på <a href="https://f-b.no">Fredrikstad Blad</a>
  </p>

  <van-action-bar style="margin-bottom: 15px;">

    <van-action-bar-button type="primary" color="#2D76A2" text="Registrer ny deltager" to="/registrer-deg" />
  </van-action-bar>



</template>

<style scoped>

</style>