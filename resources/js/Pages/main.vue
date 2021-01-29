
<template>
<div >
gt
<router-link class="mr-4" to='/2' exact>2 go</router-link>
  <button v-on:click="to_push()" >2 go push</button>
  </div>
  

</template>


<script>
import Boards from './components/boards.vue'
import axios from 'axios'

    export default {
        props: {
          
        },
        components: {
            Boards
        },
        sockets: {
            connection () {
            },
             users (socketname) {
            }

        },
        methods: {
      },
  mounted() {
  }
}
</script>

<style scoped>
</style >
