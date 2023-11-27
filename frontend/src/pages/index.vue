<script>
import { Button } from 'vant';
import Sponsors from "../components/sponsors.vue";
import Header from "../components/header.vue";
import { ActionBar, ActionBarIcon, ActionBarButton } from 'vant';

export default {
  name: "index",

  components: {
    Sponsors,
    Header,
    Button,
    ActionBar,
    ActionBarIcon,
    ActionBarButton
  }
}
</script>

<template>

  <Header></Header>

  <div class="content">
    <sponsors></sponsors>

  </div>


  <van-action-bar style="margin-bottom: 15px; justify-content: center;">

    <van-action-bar-button type="primary" color="#2D76A2" text="Registrer ditt løp" to="/registrer-deg" style="max-width: 425px;"/>
  </van-action-bar>

</template>

<style scoped>



</style>