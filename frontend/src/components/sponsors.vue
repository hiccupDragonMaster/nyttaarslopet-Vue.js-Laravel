<script>
import {Image as VanImage} from "vant/lib/image/index.js";

export default {
  name: "sponsors",
  components: {
    VanImage
  }
}
</script>

<template>

  <van-row gutter="20" style="margin-bottom: 20px;" justify="center" class="first-row">
    <van-col><VanImage src="/sponsors/sparebank1.png" /></van-col>
    <van-col><VanImage src="/sponsors/idyll.png" /></van-col>
  </van-row>

  <van-row gutter="20" style="margin-bottom: 20px;" justify="center">
    <van-col :span="12"><VanImage src="/sponsors/ds.png" /></van-col>
    <van-col :span="12"><VanImage src="/sponsors/smart-energi.png" /></van-col>
  </van-row>

  <van-row gutter="20" style="margin-bottom: 20px;" justify="center">
    <van-col :span="12"><VanImage src="/sponsors/family.png" /></van-col>
    <van-col :span="12"><VanImage src="/sponsors/q-security.png" /></van-col>
  </van-row>

  <van-row gutter="20" style="margin-bottom: 20px;">
    <van-col :span="12"><VanImage src="/sponsors/craft.png" /></van-col>
    <van-col :span="12"><VanImage src="/sponsors/boomerang.png" /></van-col>
  </van-row>

</template>

<style scoped>
  @media screen and (max-height: 740px) {
    .first-row > .van-col {
      width: 50%;
    }
  }
</style>