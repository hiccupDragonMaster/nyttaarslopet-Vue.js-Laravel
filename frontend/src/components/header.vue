<script>
export default {
  name: "header"
}
</script>

<template>
  <div class="header">
    <div class="brand">
      <VanImage src="/sponsors/fredrikstad-blad.png" height="30"/>
    </div>
    <div class="content">
      <h1>Nyttårsløpet</h1>
      <h2>2023</h2>
      <h3>I samarbeid med IDYLL Festivalen</h3>
    </div>
  </div>
</template>

<style scoped>
.header {
  
}

.header .brand {
  padding: 15px;
  height: 25px;
}

.header .content {
  padding: 15px;
  background-color: #2D76A2;
  color: #fff;

}

.header h1 {
  margin-top: 5px;
}

.header .subtitle {
  margin-top: 15px;
  margin-bottom: 15px;
  font-size: 2.3em;
}


</style>