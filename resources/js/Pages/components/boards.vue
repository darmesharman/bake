// addingboard
// newleaddescription
// medifylead
// newcoltitle
// modifyingleadID
// modifyinleadcolID
// loaded
// clicks
// cold
// isediting
// isdraggable
// leadadding
// newleadcontent
// lastupdate
<template>
  <div>
      <div class="column-container">
        
        <div class="titlearea" :draggable="!this.$store.state.isdraggable" @click="firstClick($event)"  @dragstart='startDrag($event, item)'>
          <textarea :value=item.title v-on:blur="focusouteditBoard(item)"  ref="boardtitle" name="" id=""  aria-label="grgr" v-bind:class="{'is-editing': this.$store.state.isediting}" :readonly="this.$store.state.isediting" >
          </textarea> 
        </div>

        <div v-for="(lead, index) in item.leads"  v-bind:key="lead.id">
          <Leads v-bind:lead="lead"  v-bind:col_index="col_index"  v-bind:colid=item.id   v-bind:index="index"  /> 
          <!-- //v-on:purge-lead="leadsdelete(index)" -->

        </div>

      <div class="boardnav">

        <div v-if="this.$store.state.modifyinleadcolID==col_index" :class="{'newleadcontent': this.$store.state.leadadding}" hidden>
          <textarea ref="newleadtextarea" v-on:blur="focusoutcreateLead(col_index, item)" name="" id=""  >
          </textarea>
        </div>

        <div class="btn-main-card" @click="boardDelete(col_index, item)">
          <span class="btn-main-card-text">
          delete board
          </span>
        </div>
        
        <div type="button" class="leadsadd" @click="leadAdd(col_index)">
          <span>
            new lead
          </span>
        </div>
      </div>

    </div>
  </div>
</template>

<script>

// import Columns from './components/columns.vue'
import Leads from './leads.vue'

export default {
  name: 'Boards',
  components: { Leads },
  props: [ 'item', 'col_index'],
  computed: {

  },
  methods: {
    focusouteditBoard(item) {
        this.$store.dispatch('editBoard', {item: item, value: this.$refs.boardtitle.value });

        // var url = `http://localhost:8001/api/update_boards/${colid}/${this.$refs.area.value}`;
        // let config = {'headers': {}}
        // axios.put(url, config);
    },
    boardDelete (colidx, item) {
        this.$store.dispatch('boardDelete', {colidx:colidx, item:item});
    },
    leadAdd(colidx) {
        this.$store.state.leadadding = true
        this.$store.state.modifyinleadcolID = colidx
    },
    focusoutcreateLead(colidx, item) {
      console.log('nice')
        this.$store.dispatch('createLead', {colidx: colidx, item:item, value:this.$refs.newleadtextarea.value});
        this.$store.state.leadadding = false
        this.$store.state.modifyinleadcolID = -1
        this.$refs.newleadtextarea.value=''

        // console.log(colidx, colid)
        // var id, lastidx, order;
        // if(this.data.items[colidx].leads.length>0){
        //   lastidx = this.data.items[colidx].leads.length-1;
        //   id = this.data.items[colidx].leads[lastidx].id + 1;
        //   order = this.data.items[colidx].leads[lastidx].order;
        // }
        // else {
        //   id = 0;
        //   order=0;
        //   lastidx=0;
        // }
        // var description = this.$refs.newleadtextarea.value;

        // var url = `http://localhost:8001/api/update_boards/${description}/${colid}/${order}`;
        // let config = {'headers': {}}
        // axios.get(url, config);

        // this.this.$store.state.leadadding = false
        // this.data.items[colidx].leads.push({id:99, board_id:colidx, description: this.$refs.newleadtextarea.value})
        // this.$refs.newleadtextarea.value=''
    },
    firstClick() {
        if(this.$store.state.clicks === 0) {
          this.$store.state.isediting = false;
        }else { 
          this.$store.state.isdraggable=true
          this.$store.state.isediting = true;
        }
    },
    startDrag (evt, item) {
        this.$store.state.clicks++ 
        evt.dataTransfer.dropEffect = 'move'
        evt.dataTransfer.effectAllowed = 'move'
        evt.dataTransfer.setData('itemid', item.id) 
        this.$store.state.clicks=0;
        this.$store.state.cold = true;
      },
    },
  
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
    width: 100%;
    margin: 5px 0 8px;
    height: 27px;
    line-height: 27px;
  }
  .titlearea textarea {
    height: 27px;
    line-height: 27px;
    overflow: hidden; 
    overflow: none;
    outline: none;
    border:none;
    resize: none;
    cursor: pointer;
    line-height: normal;
  }
  .titlearea textarea:focus {
    outline: none;
    cursor:default;
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

  .boardnav {
    display: inline-block;
    position: relative;
    width: 100%;
    /* height: 35px; */
  }
  .btn-main-card {
    margin:5px 0 5px 0;
    display: block;
    position: relative;
    float: left;
    /* position: relative; */
    /* display: flex; */
    /* justify-content: flex-end; */
    /* flex-direction: column; */
    cursor: pointer;/* display: inline-block;
    
    border-radius: 3px;
    font-size: 14px;
    padding:5px 15px;
    height: 32px; 
    line-height: 32px; */
  }
  
  .btn-main-card-text {
    display: block;
    /* height:40px; */
    /* width:40px; */
    margin-left:12px;
    padding: 2px 3px;
    border: .1px solid black;
    /* position: relative; */
    /* display: block; */
    /* margin: 0 auto; */
    /* line-height: 15px; */
  }
  .btn-main-card:hover {
    background-color:#f2f2f22d;
  }
  .newleadcontent {
    margin:5px 0 5px 0;
    position: relative;
    display: block;
    clear:both;
    padding: 2px 3px;
  }
  .newleadcontent textarea {
    min-height: 50px;
    width: 100%;
    height: 60px;
    resize: none;
  }
  .leadsadd {
    margin:5px 0 5px 0;
    display: block;
    position: relative;
    float: right;
    cursor: pointer;
  }
  .leadsadd span {
     display: block;
    margin-right:12px;
    padding: 2px 3px;
    border: .1px solid black;
  }
  
</style>