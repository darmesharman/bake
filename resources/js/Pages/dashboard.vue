
<template>
    <div>
        <div class="container">
            <div class="board-context"  v-for="(item, index) in dashboard.items"  v-bind:key="item.id" 
            @drop='onDrop($event, item.id)' @dragover.prevent @dragenter.prevent>

            <Boards ref="col" v-bind:col_index="index" v-bind:item="item" />
                
            </div>

            <div class="boards-append">
                <div  v-bind:class="{'boards-append-adding-form': this.$store.state.dashboard.addingboard}"  hidden >
                    <textarea ref="newboardtextarea" name="" id="" cols="30"  rows="10"></textarea>
                    <input type="button"  value="save board" @click="boardCreate($event)" >
                </div>

                <div v-if="!this.dashboard.addingboard" class="boards-append-area" v-bind:class="{'boards-append-adding-btn': this.dashboard.addingboard}" @click="boardAddEvent">
                    <a style="cursor:pointer;width:70px;display:block; margin:0 auto;">
                    add board
                    </a>
                    
                    
                </div>


            </div>

        </div>


  </div>

</template>


<script>
import Boards from './components/boards.vue'

  export default {
      data:function() {
          return {
                dashboard: this.$store.state.dashboard
          }
      },
      props: {

      },
      sockets: {
          connection () {
              console.log('socket connected!!')
          }
          
      },
      components: { 
          Boards
      },
      computed: {
      },
      sockets: {
          connection () {
              console.log('socket connected!!')
          },
          users (socketname) {

          

          }
      },
      methods: {
          boardAddEvent() {
            this.$store.state.dashboard.addingboard = true
          },
          boardCreate(evt) {
            this.$store.dispatch('boardCreate', this.$refs.newboardtextarea.value);
            this.$store.state.dashboard.addingboard = false
        
          },
          onDrop(evt, itemid2) {

            if(this.$store.state.dashboard.cold) {
                const itemid = evt.dataTransfer.getData('itemid')

                this.$store.dispatch('swapBoards', {itemid:itemid, itemid2: itemid2});

                this.$store.state.dashboard.cold = false;
                this.$store.state.dashboard.isediting=true

            }
        },
          /*GET_BOARDS(response) {
            var data = response.data[1]["00"];
            this.$store.state.dashboard.lastupdate = response.data[0];
            // console.log(response.data);
            if(data.length >= 1)
              for (var idx = 0; idx < data.length; idx++) {
                console.log(data[idx])
                if("id" in data[idx])
                  this.data.items.push({id:data[idx].id, title: data[idx].title, order: data[idx].order, leads:[]})
              }
          },
          GET_LEADS(response) {
            var data = response.data[1]["01"];
            this.$store.state.dashboard.lastupdate = response.data[0];
            console.log(response.data[1]["01"])
            if(data.length >= 1)
              for (var idx = 0; idx < data.length; idx++) {
                for (var idy = 0; idy < this.data.items.length; idy++) {
                  if(this.data.items[idy].id == data[idx].board_id) {
                    this.data.items[idy].leads.push({id: data[idx].id, board_id: data[idx].board_id, description: data[idx].description, order: data[idx].order})
                    break;
                  }
                }
              }
          },   */
          /* getUpdates() {
            var url = "http://localhost:8001/api/update_boards/"+this.$store.state.dashboard.lastupdate;
            let config = {'headers': {}}
            axios.get(url, config)
                .then(response => {
                  this.GET_BOARDS(response);
                  this.GET_LEADS(response);
                })
          }, */
      },
    mounted() {
        
        this.$store.dispatch('fetchDashboard', this.sockets);
        var name = 'TOM';

        // this.$store.dispatch('fetchSockets');
        // while(true) {
        //   if(this.dashboard.token!=null)
        //   break
        // }
        // console.log(this.$store.state.dashboard.token)
         
        // setTimeout(function() {
        //   console.log('subed to: ', this.$store.state.dashboard.token)
          // this.dashboard.token
        
          // this.sockets.subscribe(this.$store.state.dashboard.token, (data) => {
          //   console.log(data);
          //   console.log('wtfhithat');
          // });
        // }, 3000)

        
    },
    created() {

        // this.$socket.emit('loaded', {token: this.$store.state.dashboard.token})


    }
}
</script>

<style scoped>

  .container {
    position: relative;
    display: flex;
    min-width: 1360px;
    width: 1360px;
    margin: 0 auto;
    overflow: scroll;
  }
  .board-context {
    display: inline-block;
    vertical-align: top;
    width: 272px;
    margin:0 4px;
    background-color:#EBEBEB;
  }
   .boards-append {
    display: inline-block;
    position: relative;
    /* justify-content: center; */
    width: 272px;
    margin:0 4px;
    margin: 0 auto;
    /* background-color: azure; */
    /* border-radius: 14px; */
  }
  .boards-append-area {
    display: inline-block;
    position: relative;
    width: 172px;
    margin:0 4px;
  }
  .boards-append-area a:hover {
    text-decoration: underline;
  }

  .boards-append-adding-form {
    position: relative;
    display: block;
    margin: 0 auto;
    width: 100%;
  }
  .boards-append-adding-form input {
    padding: 2px 5px;
    letter-spacing: .3px;
    box-shadow: inset 0 0 0 .2px #0079bf;
  }
  .boards-append-adding-form input:hover {
    background-color: azure;
    transition:.8s;
  }
  .boards-append-adding-form  textarea {
    height: 27px;
    line-height: 27px;
    width:auto;
    overflow: hidden; 
    overflow: none;
    outline: none;
    border:none;
    resize: none;
    cursor: pointer;
    line-height: normal;

  /* box-sizing: border-box;
  resize: none;
  position: absolute;
  width: 100%;
  height: 100%;  */
  }
 
   .boards-append-adding-form  textarea [type=text] {
    height: auto;
    word-wrap: break-word;
    word-break: break-all;
    display: block;
    margin: 0 auto;
  }
  
  .btn-boards-append:hover {
    text-decoration: underline;
    cursor: pointer;
    width: 100%;
  }
  .boards-append-adding-card {
    height: 125px;
    transition:1.6s;
  }
  .boards-append-adding-card .btn-boards-append {
    display: none;
  }
  .boards-append-adding-btn {
    position: absolute;
    visibility: hidden;
    opacity: 0;
  }
/* boards-append boards-append-adding-card */
  .boards-append-adding-btn:hover {
    text-decoration: none;
    cursor:none;
  }
</style>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
h1, h2, h3, h4, h5 {
   margin:0;
   padding:0; 
}
div {
  margin: 0;
  padding:0;
}
</style>