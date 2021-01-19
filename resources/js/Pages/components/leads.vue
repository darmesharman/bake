<template>

    <div class="leads-inner-context" ref="innercontext" draggable @dragstart='startDrag1($event, lead, colid, index)' >

      <div class="leads-outer-outline">
        <div>
          <div class="leads-outer-context-fh" :style="fhstyles"  @drop='onDrop1($event, lead.order, colid, index, 0)'  
          @dragover.prevent @dragenter.prevent >
          </div>
          <div class="leads-outer-context-sh" :style="shstyles" @drop='onDrop1($event, lead.order, colid, index, 1)'  
          @dragover.prevent @dragenter.prevent >
          </div>
        </div>
      </div> 

      <div class="leads-container" >

        <div v-if="data.modifyingleadID==index && col_index==data.modifyinleadcolID"  class="popup-context">
          <div class="popup-container">

            <div  class="leads-content-row popup-text-container" >
                <span  class="textarea" ref="formdesc" role="textbox" contenteditable>{{lead.description}}
                </span>
            </div>

            <div class="leads-content-row popup-btn-save" @click="sendForm" >
              <a>save</a>
            </div>

          </div>
        </div>
 
        <div v-else>
          <!-- v-else -->
          <div class="leads-content-row leads-content">
            <span>
              {{lead.description}} 
              <!-- some basic leads with bigg and long text is writen in here -->
            </span>
          </div>
        
          <div  class="leads-content-row btn-wrapper-node-modify">
            <a @click="modifyingleadtoggle">
              <span style="display: block; margin: auto;">
                <svg id="Icons" viewBox="0 0 74 74" style="height: 25px; line-height: 25px;" xmlns="http://www.w3.org/2000/svg"><path d="m43.369 40.51a.986.986 0 0 1 -.489-.129 1 1 0 0 1 -.38-1.361l3.06-5.44a1 1 0 0 1 1.744.98l-3.062 5.44a1 1 0 0 1 -.873.51z"/><path d="m31.789 61.09a.986.986 0 0 1 -.489-.129l-15.18-8.54a1 1 0 0 1 -.381-1.361l26.689-47.44a3.169 3.169 0 0 1 4.322-1.212l11.391 6.41a3.187 3.187 0 0 1 1.212 4.322l-9.6 17.07a1 1 0 1 1 -1.742-.98l9.6-17.07a1.179 1.179 0 0 0 -.451-1.6l-11.39-6.409a1.174 1.174 0 0 0 -1.6.449l-26.2 46.568 13.436 7.56 3.13-5.559a1 1 0 0 1 1.742.982l-3.62 6.43a1 1 0 0 1 -.869.509z"/><path d="m37.859 50.3a1 1 0 0 1 -.87-1.491l3.06-5.43a1 1 0 1 1 1.742.982l-3.06 5.43a1 1 0 0 1 -.872.509z"/><path d="m15.659 72a1 1 0 0 1 -1-1.049l.951-19.451a1 1 0 0 1 1.49-.822l15.179 8.54a1 1 0 0 1 .071 1.7l-16.13 10.91a1 1 0 0 1 -.561.172zm1.87-18.786-.773 15.837 13.133-8.883z"/><path d="m52.606 24.088a1 1 0 0 1 -.489-.128l-15.18-8.541a1 1 0 0 1 .98-1.743l15.183 8.541a1 1 0 0 1 -.492 1.871z"/><path d="m29 48.281a.986.986 0 0 1 -.489-.129 1 1 0 0 1 -.381-1.361l11.212-19.924a1 1 0 1 1 1.742.98l-11.209 19.924a1 1 0 0 1 -.875.51z"/><path d="m24.309 66.149a.993.993 0 0 1 -.76-.35 12.777 12.777 0 0 0 -7.541-4.242 1 1 0 1 1 .322-1.974 14.751 14.751 0 0 1 8.738 4.917 1 1 0 0 1 -.759 1.649z"/><path d="m52.208 72h-29a1 1 0 0 1 0-2h29a1 1 0 0 1 0 2z"/></svg>
              </span>
            </a>
          </div>
        </div>
        
        <div class="btn-wrapper-node-delete">
            <a class="btn-node-delete" @click="$emit('purge-lead', lead.id)">Purge</a>
        </div>
          
      </div>

    </div>
  
</template>

<script>


export default {
  name: 'Leads',
  components: {  },
  props: ['lead', 'data', 'col_index', 'index', 'colid'],
  computed: {
    fhstyles: function() {
      return this.loadFhstyles(this.index) 
    },
    shstyles: function() {
      return this.loadShstyles(this.index) 
    },
    // textform: function() {
      
    // }
  },
  methods: {
    modifyingleadtoggle () {
      // console.log(this.col_index)
      // this.data.modifyinleadcolID
      
      console.log(this.col_index, this.data.modifyinleadcolID)
      
      if(this.data.modifyinleadcolID==-1)
        this.data.modifyinleadcolID = this.col_index
      else
        this.data.modifyinleadcolID= -1

      console.log(this.data.modifyinleadcolID)

      if(this.data.modifyingleadID==-1)
        this.data.modifyingleadID = this.index
      else
        this.data.modifyingleadID= -1

    },
    sendForm: function(e) {
      this.modifyingleadtoggle()
      this.lead.description = this.$refs.formdesc.innerText   //this.description
      e.preventDefault();
    },
    startDrag1 (evt, item, colid, index)  {
        evt.dataTransfer.dropEffect = 'move'
        evt.dataTransfer.effectAllowed = 'move'
        evt.dataTransfer.setData('itemID', item.id)
        evt.dataTransfer.setData('columnID', colid)
        evt.dataTransfer.setData('leadIndex', index)
    },
    onDrop1(evt, order, colid, index, ident) {
        const itemID = evt.dataTransfer.getData('itemID')
        const columnID = evt.dataTransfer.getData('columnID')
        const leadIndex = evt.dataTransfer.getData('leadIndex')

        var item2 = this.data.items.find(item => item.id == colid)
        // var lead = item.leads.find(item => item.id == list)
        console.log(order)
        console.log(this.data.items[this.col_index].leads[index-1])
        console.log(this.data.items[this.col_index].leads[index])
        console.log(this.data.items[this.col_index].leads[index+1])

        if(ident == 0)
          if(typeof this.data.items[this.col_index].leads[index-1] != undefined && 'order' in this.data.items[this.col_index].leads[index-1])
              order = this.data.items[this.col_index].leads[index-1].order
        else
          if(typeof this.data.items[this.col_index].leads[index+1] != undefined && 'order' in this.data.items[this.col_index].leads[index+1])
            order = this.data.items[this.col_index].leads[index+1].order


        console.log(order)
        var item = this.data.items.find(item => item.id == columnID)
        var lead = item.leads.find(item => item.id == itemID)

        // var item2 = this.data.items.find(item => item.id == colid)
        
        // lead.id += item2.leads[item2.leads.length-1].id+1
        var url = `http://localhost:8001/api/update_boards/${columnID}/${colid}/${this.lead.id}/${order}`;
        let config = {'headers': {}}
        axios.put(url, config);
        

        if(ident==1)
        index+=1
        item2.leads.splice(index, 0, lead)
        item2.leads.join()
        this.$delete(item.leads, leadIndex)
    },
    loadFhstyles() {
        try {
          if(this.data.loaded)
            return {height:this.$refs.innercontext.clientHeight/2+10+'px', margin:'-9px 5px 0 -13px'}
          }
          catch(error) {
            return 
          }
          return 
          },
        loadShstyles() {
          try {
            if(this.data.loaded)
              return {height:this.$refs.innercontext.clientHeight/2.1+'px', margin:'0px 5px 0 -13px'}
          }
          catch(error) {
            return 
          }
          return 
      },

  },mounted(){
    this.$nextTick(function () {
    this.data.loaded = true

    // For invoking property from child element
    // // this.data.fhStyles[thi= []
    // this.data.fhStyles[this.index1] = [0, 1]
    // var arr =  []
    // this.data.items[this.index1].leads.forEach((element, id) => {
    //     arr.push( {height: this.$refs.innercontext.clientHeight/1.7+'px', margin:'-10px 0 0 -13px ' })
    //   });
    //   this.data.fhStyles[this.index1] = arr
    //     this.data.loaded = true
    //     console.log(5555555555555)
    //     console.log(5555555555555)
    //     console.log(5555555555555)
    //     console.log(5555555555555)

    })
  }

}

</script>

<style scoped>
  .leads-inner-context{
    box-shadow: 0 .5px 1px .5px rgba(9,30,66,.25);

    display: block;
    position: relative;
    word-wrap: break-word;
    margin-bottom: 8px;
    /* box-shadow: .1px .2px black; */
    
  }
  .leads-outer-outline {
    position:absolute;
    z-index: 11;
    /* background-color:blue; */
    width:100%;
    height:100%;
  }
  .leads-outer-context-fh {
    position: absolute;
    opacity: 0%;
    position: relative;
    display: block;
    width: 117.5%;
    background-color: red!important;
    /* display: none; */
  }
  .leads-outer-context-sh {
    position: absolute;
    opacity: 0%;
    position: relative;
    display: block;
    width: 117.5%;
    background-color: blue!important;
    /* display: none; */
  }
  .leads-container {
    position: relative;
    display: block;
    overflow: auto;
    width: 90%;
    margin:0 auto;
  }
  .leads-content {
    display:block;
    position: relative;
    float: left;
    text-align: left;
    max-width: 280px;
    height: auto;
    padding-left:5px ;
    width: 80%;

    /* padding:5px 3px 5px 5px; */
    /* padding:0 0 0 5px; */
  }
  .leads-content span{
  }

  .btn-wrapper-node-modify {
    display:block;
    float: right;
    position: relative;
    height: 25px;
    /* position: relative; */
    /* vertical-align:top; */
    /* padding:5px; */
    /* margin-top: 15px; */
    /* float: left; */
  }
   .btn-wrapper-node-modify a {
    /* display: block; */
    /* justify-content: center; */
    /* align-items: center; */
    z-index: 15;
    position: absolute;
    right: 0;
    top:0;
  }
  .btn-wrapper-node-modify a span{
    /* display: block; */
  }
 

  .leads-content-row {
    margin-top: 10px;
    min-height: 40px;
    /* height: 40px; */
    /* box-shadow: .5px .5px 1px .5px rgba(9,30,66,.25); */
    
  } 
  .btn-wrapper-node-modify a:hover {
    cursor: pointer;
    text-decoration: underline;
  } 
  .svginverted {
    -webkit-filter: invert(40%);
    filter: invert(40%);
  }

  .btn-wrapper-node-delete {
    position: relative;
    display: block;
    clear: both;
    float: right;
    margin-bottom: 5px;
    height: 15px;
  }
  .btn-wrapper-node-delete a{
    position: absolute;
    z-index: 15;
    bottom: 0;
    right:0;
  }
  .btn-node-delete {
    font-size: 16px;
    font-weight:500;
    cursor: pointer;
  }
  .btn-node-delete:active {
    color: rgb(194, 99, 99);
  }


  .popup-context {

    text-align: left;
    display: absolute;
    width: 100%;
    height: 100%;
    z-index: 99;
  }
  .popup-container {
    position: relative;
  }
  .popup-context {
  }
  .popup-text-container {
    border: 7px;
    height:auto;
    display:block;
    float: left;
    width: 80%;
  }

  .popup-text-container span  {
    display: block;

    border-bottom: 1px dotted blue;
    position: absolute;
    z-index: 15;
    top: -4px;
    height: 100%;
    padding:0 5px 0 5px ;
    background-color: #fffeee;
    text-align: start;
    /* width: 100%;  */
    min-height: 40px;
    height: auto;
    overflow: hidden;
    outline: none;
    border: none;
  }
  .popup-btn-save{
    position: relative;
    display:block;
    float: right;
    cursor: pointer;
  }
  .popup-btn-save a{
    position: absolute;
    right:0;
    z-index: 15;
  }
  
 
  
</style>