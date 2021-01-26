
<template>
<div id="app">
<div class="container" >
<!-- {{data}} -->
    <div class="board-context"  v-for="(item, index) in this.$store.state.items"  v-bind:key="item.id"
    @drop='onDrop($event, item.id)' @dragover.prevent @dragenter.prevent>

      <Boards ref="col" v-bind:col_index="index" v-bind:item="item" />

    </div>
  <!-- {{$store.state.items}} -->
    <div class="boards-append">
      <div  v-bind:class="{'boards-append-adding-form': this.$store.state.addingboard}"  hidden >
        <textarea ref="newboardtextarea" name="" id="" cols="30"  rows="10"></textarea>
        <input type="button"  value="save board" @click="boardCreate($event)" >
      </div>

      <div class="btn-boards-append" v-bind:class="{'boards-append-adding-btn': this.$store.state.addingboard}" @click="boardAddEvent">
        <div v-if="!this.$store.state.addingboard">
          add board
        </div>
      </div>


    </div>

  </div>


  </div>

</template>


<script>
import Boards from './components/boards.vue'
import axios from 'axios'

    export default {
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
            nice1: String,
            boards: Array,
            last_update:Array ,
            max_board_order: String
        },
        components: {
            Boards
        },
        sockets: {
            connection () {
                console.log('socket connected!!')
            },
             users (socketname) {
               var x =4;
            // users(socketname){

            //  (async  () => {
                  // the rest of the code


                this.sockets.subscribe(socketname, (data) => {



                console.log(data.last_update)
                // console.log(this.$store.state.lastupdate)
                // if(data.last_update != this.$store.state.lastupdate) {
                //   if(data.last_update != this.$store.state.lastupdate)
                //   {
                //     console.log('data', data.data)
                //     this.$store.state.lastupdate = data.last_update
                //     // console.log('newdata date is: ', data.last_update)
                //     // console.log('newdata is: ', data.data[0])
                //     // console.log('newdata is: ', data.data[1].details[0]==null)

                //   let switchOptions = (option, details)=> {
                //       // console.log('details')
                //       // console.log(option)
                //       // console.log(i)
                //       console.log(details)
                //      switch (option) {
                //       case 0:
                //         this.$store.dispatch('boardCreateUpdates', details);
                //         break;
                //       case 1:
                //         this.$store.dispatch('boardUpdateUpdates', details);
                //         break;
                //        case 2:
                //         this.$store.dispatch('boardDeleteUpdates', details);
                //         break;
                //       case 10:
                //         this.$store.dispatch('leadCreateUpdates', details);
                //         break;
                //       case 11:
                //         this.$store.dispatch('leadUpdateUpdates', details);
                //         break;
                //       case 12:
                //         this.$store.dispatch('leadDeleteUpdates', details);
                //         break;

                //       // default:
                //         // break;
                //     }
                //   }

                //     data.data.forEach(event => {

                //       if(event.details[0] != null)
                //         // if(event.details.length > 1)
                //           event.details.forEach(detail => {
                //             switchOptions(event.event, detail )
                //           });
                //         // else
                //           // switchOptions(event.event, event.details[0])



                //     });

                //   }

                  // this.$store.lastupdate = data.last_update
                  // console.log(this.$store.state.updates)
                // }
                // this.$store.state.lastupdate = data.last_update

                // var x = data.data[0].list.split('},{')
                // x.forEach((e, i)=>{
                //     if(i!=0)
                //         x[i] = '{' + x[i]
                //     if(i!=x.length-1)
                //     x[i] = x[i]+'}'
                // })
                // console.log(x)
                // console.log(x)
                // console.log(JSON.parse(x))
                // console.log(JSON.parse(new Object()))

                // JSON.parse("[" + string + "]");

                // this.sockets.unsubscribe('EVENT_NAME');
              })

              // })();
            }

        },
        methods: {
          boardAddEvent() {
            this.$store.state.addingboard = true
          },
          boardCreate(evt) {
            this.$store.dispatch('boardCreate', this.$refs.newboardtextarea.value);
            this.$store.state.addingboard = false


            // var id = this.$store.state.items[this.$store.state.items.length-1].id+1;
            // var order = this.$store.state.items[this.$store.state.items.length-1].order;
            // var title = this.$store.state.newcoltitle;

            // console.log(order, id, title)

            // var url = `http://localhost:8001/api/update_boards/${title}/${order}`;

            // let config = {'headers': {}}
            // axios.get(url, config);
            // this.$store.state.items.push({id:id, title: title, leads:[]})
          },
          onDrop(evt, itemid2) {

            if(this.$store.state.cold) {
                const itemid = evt.dataTransfer.getData('itemid')

                this.$store.dispatch('swapBoards', {itemid:itemid, itemid2: itemid2});

                this.$store.state.cold = false;
                this.$store.state.isediting=true

            }
        },
          /*GET_BOARDS(response) {
            var data = response.data[1]["00"];
            this.$store.state.lastupdate = response.data[0];
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
            this.$store.state.lastupdate = response.data[0];
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
            var url = "http://localhost:8001/api/update_boards/"+this.$store.state.lastupdate;
            let config = {'headers': {}}
            axios.get(url, config)
                .then(response => {
                  this.GET_BOARDS(response);
                  this.GET_LEADS(response);
                })
          }, */
      },
  mounted() {

      this.$store.state.items = this.boards

      // console.log(this.last_update)
      // this.$store.state.lastupdate = this.last_update;
      var name = 'TOM';
      // let x =this.last_update[0].updated_at
      // if('updated_at' in this.last_update[0])
        // this.$store.state.lastupdate = x

      // console.log(this.last_update[0].updated_at)

      this.$socket.emit('loaded', {username:name, last_update:this.$store.state.lastupdate})

      // this.sockets.listener.subscribe("users", (data) => {
          // console.log("users", data);
      // });

  }
}
</script>

<style scoped>

  .container {
    position: relative;
    min-width: 1360px;
    max-width: 1600px;
    /* display: block; */
    /* justify-content: center; */
    margin: 0 auto;
    border: 1.2px solid;
  }
  .board-context {
    display: inline-block;
    vertical-align: top;
    width: 272px;
    margin:0 4px;
    background-color:#EBEBEB;
  }
   .boards-append {
    position: relative;
    display: inline-block;
    min-width: 80px;
    width:80px ;
    background-color: azure;
    border-radius: 14px;
  }

  .boards-append-adding-form {
    position: relative;
    min-height: 70px;
    display: block;
    margin: 0 auto;
    min-width: 70px;
    width: 100%;
  }
  .boards-append-adding-form  textarea {
    height: 27px;
    line-height: 27px;
    width:auto;
    max-width: 120px;
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
    width: 90px;
    height: auto;
    word-wrap: break-word;
    word-break: break-all;
    display: block;
    margin: 0 auto;
  }

  .btn-boards-append:hover {
    text-decoration: underline;
    cursor: pointer;
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
