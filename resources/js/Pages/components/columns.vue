<template>
  <div>
      <div class="column-container">
        <div class="titlearea" :draggable="!data.isdraggable" @click="oneclick($event)"  @dragstart='startDrag($event, item)'>
          <textarea ref="area" name="" id=""  aria-label="grgr" v-bind:class="{'is-editing': data.isediting}" v-model=item.title :readonly="data.isediting" >
          </textarea> 
        </div>
        <div v-for="(note, index) in item.notes"  v-bind:key="note.id">
          <Notes v-bind:note="note" v-bind:data="data" v-bind:col_index="col_index"   v-bind:index="index" v-on:purge-note="notesdelete(index)" />

        </div>

      </div>

      <a class="btn-main-card" type="button" @click="columndelete(col_index)">
        <span class="btn-main-card-text">
         delete column
        </span>
      </a>
    
  </div>
</template>

<script>

// import Columns from './components/columns.vue'
import Notes from './notes.vue'

export default {
  name: 'Columns',
  components: { Notes },
  props: ['data', 'item', 'col_index'],
  computed: {

  },
  methods: {
   
    columndelete (index) {
        // console.log(this.data.items)
        this.$delete(this.data.items, index)
        // console.log(this.items)
    },
    notesdelete(index) {
        this.$delete(this.item.notes, index)
    },
    oneclick() {
      console.log(5)
      if(this.data.clicks === 0) {
        this.data.isediting = false;
      }else { 
        this.data.isdraggable=true
        this.data.isediting = true;
      }
    },
    startDrag (evt, item) {
        this.data.clicks++ 
        var self = this.data
      // if(this.data.clicks===1)
      //     self.timer = setTimeout(function() {
      //         self.isediting = true;
      //         self.cold= true;
      //         self.clicks = 0
      //     }, 1000);
      //   else {
      // self.isediting = false;
      // this.data.true=false
      // clearTimeout(this.data.timer);  
      // }
        evt.dataTransfer.dropEffect = 'move'
        evt.dataTransfer.effectAllowed = 'move'
        evt.dataTransfer.setData('itemID', item.id) 
        this.data.clicks=0;
        this.data.cold = true;
        },
    },
    mounted(){
    
    }
}

</script>


<style scoped>

  .column-container {
    display: inline-block;
    vertical-align: top;
    width: 272px;
    margin:0 4px;
    background-color:#EBEBEB;
    overflow: visible;
  }
  .column-container {
    position: relative;
    display: block;
    width: 242px;
    margin:0 auto;
  }
  .titlearea {
    position: relative;
    display: block;
    text-align: start;
    width: 100%;
    height: 27px;
  }
  .titlearea textarea {
      outline: none;
      border:none;
      resize: none;
      user-select: none; /* standard syntax */
    -webkit-user-select: none; /* webkit (safari, chrome) browsers */
    -moz-user-select: none; /* mozilla browsers */
    -khtml-user-select: none; /* webkit (konqueror) browsers */
    -ms-user-select: none; /* IE10+ */
  }
  .titlearea textarea:focus {
      outline: none;
      user-select: none; /* standard syntax */
    -webkit-user-select: none; /* webkit (safari, chrome) browsers */
    -moz-user-select: none; /* mozilla browsers */
    -khtml-user-select: none; /* webkit (konqueror) browsers */
    -ms-user-select: none; /* IE10+ */

    
  }
  /* .titlearea textarea{  
    padding-left:10px;
    position: absolute;
    overflow: hidden;
    overflow-wrap: break-word;
    line-height:23px;
    height: 23px;
    width:230px;
    background: transparent;
    border-radius: 3px;
    box-shadow: none;
    resize: none;
    border: none;
  }
  .titlearea textarea :focus {
      box-shadow: inset 0 0 0 2px #0079bf;
      outline: none;
      transition:.2s ease;
      background-color:#fff;
  }     */
  .column-container textarea:active {
    background-color: #fff;
    border:none;
  } 


  .btn-main-card {
    cursor: pointer;
    border-radius: 3px;
    background-color:#ffffff3d;
    font-size: 14px;
    padding:5px 15px;
    width: 100%;
    height: 32px;
    line-height: 32px;
  }
  
  .btn-main-card-text {
    color:#fffffa;
    line-height: 15px;
  }
  .btn-main-card:hover {
    background-color:#f2f2f22d;
  }
  

   /* 
   .btn-append:hover {
    text-decoration: underline;
    cursor: pointer;
  } */
  
</style>