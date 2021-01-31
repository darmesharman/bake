
<template>
    <div>
{{this.dashboard.items }}
{{this.dashboard.token }}
        <div class="container">
        <!-- {{data}} -->
            <div class="board-context"  v-for="(item, index) in dashboard.items"  v-bind:key="item.id" 
            @drop='onDrop($event, item.id)' @dragover.prevent @dragenter.prevent>

            <Boards ref="col" v-bind:col_index="index" v-bind:item="item" />
                
            </div>

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
          },
          users (socketname) {

            this.sockets.subscribe(socketname, (data) => {

              if(data.last_update != this.$store.state.lastupdate) {

                
                let switchOptions = (option, details)=> {

                  switch (option) {
                    case 0:
                      this.$store.dispatch('boardCreateUpdates', details);
                    break;
                    case 1:
                      this.$store.dispatch('boardUpdateUpdates', details);
                    break;
                    case 2:
                      this.$store.dispatch('boardDeleteUpdates', details);
                    break; 
                    case 10:
                      this.$store.dispatch('leadCreateUpdates', details);
                    break;
                    case 11:
                      this.$store.dispatch('leadUpdateUpdates', details);
                    break;
                    case 12:
                      this.$store.dispatch('leadDeleteUpdates', details);
                    break;
                  } 
                }
                data.data.forEach(event => {
                  
                    if(event.details[0] != null){
                        event.details.forEach(detail => {
                          switchOptions(event.event, detail )
                        });
                    }

                });
              }


          })

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

            //   this.sockets.subscribe(socketname, (data) => {

              
              
            //   console.log(data.last_update)
            //     if(data.last_update != this.$store.state.lastupdate)
            //     {
            //       console.log('data', data.data)
            //       this.$store.state.lastupdate = data.last_update

            //     let switchOptions = (option, details)=> {

            //       switch (option) {
            //         case 0:
            //           this.$store.dispatch('boardCreateUpdates', details);
            //           break;
            //         case 1:
            //           this.$store.dispatch('boardUpdateUpdates', details);
            //           break;
            //           case 2:
            //           this.$store.dispatch('boardDeleteUpdates', details);
            //           break; 
            //         case 10:
            //           this.$store.dispatch('leadCreateUpdates', details);
            //           break;
            //         case 11:
            //           this.$store.dispatch('leadUpdateUpdates', details);
            //           break;
            //         case 12:
            //           this.$store.dispatch('leadDeleteUpdates', details);
            //           break;
                  
            //         // default:
            //           // break;
            //       } 
            //     }

            //       data.data.forEach(event => {
                    
            //         if(event.details[0] != null)
            //           // if(event.details.length > 1)
            //             event.details.forEach(detail => {
            //               switchOptions(event.event, detail )
            //             });
            //           // else
            //             // switchOptions(event.event, event.details[0])



            //       });

            //     }

              
            // })

          }
      },
      methods: {
          boardAddEvent() {
            this.$store.state.addingboard = true
          },
          boardCreate(evt) {
            this.$store.dispatch('boardCreate', this.$refs.newboardtextarea.value);
            this.$store.state.addingboard = false
        
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