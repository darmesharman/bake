<template>
<div id="app">
<div class="container" >
<!-- {{data}} -->
    <div class="board-context"  v-for="(item, index) in data.items"  v-bind:key="item.id" 
    @drop='onDrop($event, item.id)' @dragover.prevent @dragenter.prevent>
      <Boards ref="col" v-bind:data="data" v-bind:col_index="index" v-bind:item="item" />
        
    </div>

    <div class="boards-append">
      <div  v-bind:class="{'boards-append-adding-form': data.addingboard}"  hidden >
        <textarea name="" id="" cols="30"  v-model='data.newcoltitle' rows="10"></textarea>
        <input type="button"  value="save board" @click="boardPush($event)" >
      </div>

      <div class="btn-boards-append" v-bind:class="{'boards-append-adding-btn': data.addingboard}" @click="boardadd">
        <div v-if="!data.addingboard">
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
    // import AppLayout from '@/Layouts/AppLayout'
    export default {
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
            nice1: String,
            boards: Array,
            last_update:String,
            max_board_order: String
        },
        components: { 
            Boards
        },
        methods: {
          boardadd() {
            this.data.addingboard = true
          },
          GET_BOARDS(response) {
            var data = response.data[1]["00"];
            this.lastupdate = response.data[0];
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
            this.lastupdate = response.data[0];
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
          },
          getUpdates() {
            var url = "http://localhost:8001/api/update_boards/"+this.lastupdate;
            let config = {'headers': {}}
            axios.get(url, config)
                .then(response => {
                  this.GET_BOARDS(response);
                  this.GET_LEADS(response);
                })
          },
          countdown() {
            this.getUpdates();
            setTimeout(this.countdown, 5000);
          },
          boardPush() {

            var id = this.data.items[this.data.items.length-1].id+1;
            var order = this.data.items[this.data.items.length-1].order;
            var title = this.data.newcoltitle;
            
            console.log(order, id, title)
            
            var url = `http://localhost:8001/api/update_boards/${title}/${order}`;
            
            let config = {'headers': {}}
            axios.get(url, config);
            this.data.items.push({id:id, title: title, leads:[]})
          },
          onDrop(evt, list) {

            if(this.data.cold) {
                const itemID = evt.dataTransfer.getData('itemID')
                // console.log(list, itemID);
                var item = this.data.items.find(item => item.id == itemID)
                var item2 = this.data.items.find(item => item.id == list)

                var buff = item.leads;
                item.leads = item2.leads; 
                item2.leads = buff; 

                buff = item.id;
                item.id = item2.id; 
                item2.id = buff;

                buff = item.title;
                item.title = item2.title; 
                item2.title = buff;
                this.data.cold = false;
                this.data.isediting=true

            }
        },
      },
  mounted(){
      this.lastupdate = this.last_update;
      setTimeout(this.countdown, 5000);
  },
  data() {
    return {
      data:{
        items: this.boards,
        addingboard:false,
        newleaddescription:'none',
        medifylead: [],
        newcoltitle:'n',
        modifyingleadID:-1,
        modifyinleadcolID:-1,
        loaded: false,
        clicks:0,
        cold:false,
        isediting:true,
        timer:null,
        isdraggable:false,
        leadadding: false,
        newleadcontent:'',
        lastupdate:''
            
        }
      }
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