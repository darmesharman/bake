<template>
    <div >
      {{canLogin}}<br>
      {{canRegister}}<br>
      {{laravelVersion}} <br>
      {{phpVersion}}
      
    </div>
</template>

<style scoped>
  
</style>

<script>
    export default {
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    }
</script>
