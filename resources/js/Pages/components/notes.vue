<template>

    <div class="notes-inner-context" ref="innercontext" >
      <div class="notes-outer-outline">
        <div class="notes-outer-context-fh" :style="fhstyles">
        </div>
        <div class="notes-outer-context-sh" :style="shstyles">
        </div>
      </div> 

      <div class="notes-container" >

        <div v-if="data.modifyingnoteID==index && col_index==data.modifyinnotecolID" class="popup-context"  >

          <div class="popup-container">

            <div  class="popup-text-container" >
              <p>
                <span  class="textarea" ref="formdesc" role="textbox" contenteditable>{{note.description}}
                </span>
              </p>
            </div>

            <div class="popup-btn-save" @click="sendForm" >
              <a>save note</a>
            </div>

          </div>
          
        </div>

        <div v-else >
          <div  class="notes-text">
            <p style="text-align:left;">
              {{note.description}} 
              <!-- some basic notes with bigg and long text is writen in here -->
            </p>
          </div>
        
          <div class="btn-wrapper-node-modify">
            <a @click="modifyingnotetoggle">
              <span style="display: block; margin: auto;">
                <svg id="Icons" viewBox="0 0 74 74" style="height: 25px; line-height: 25px;" xmlns="http://www.w3.org/2000/svg"><path d="m43.369 40.51a.986.986 0 0 1 -.489-.129 1 1 0 0 1 -.38-1.361l3.06-5.44a1 1 0 0 1 1.744.98l-3.062 5.44a1 1 0 0 1 -.873.51z"/><path d="m31.789 61.09a.986.986 0 0 1 -.489-.129l-15.18-8.54a1 1 0 0 1 -.381-1.361l26.689-47.44a3.169 3.169 0 0 1 4.322-1.212l11.391 6.41a3.187 3.187 0 0 1 1.212 4.322l-9.6 17.07a1 1 0 1 1 -1.742-.98l9.6-17.07a1.179 1.179 0 0 0 -.451-1.6l-11.39-6.409a1.174 1.174 0 0 0 -1.6.449l-26.2 46.568 13.436 7.56 3.13-5.559a1 1 0 0 1 1.742.982l-3.62 6.43a1 1 0 0 1 -.869.509z"/><path d="m37.859 50.3a1 1 0 0 1 -.87-1.491l3.06-5.43a1 1 0 1 1 1.742.982l-3.06 5.43a1 1 0 0 1 -.872.509z"/><path d="m15.659 72a1 1 0 0 1 -1-1.049l.951-19.451a1 1 0 0 1 1.49-.822l15.179 8.54a1 1 0 0 1 .071 1.7l-16.13 10.91a1 1 0 0 1 -.561.172zm1.87-18.786-.773 15.837 13.133-8.883z"/><path d="m52.606 24.088a1 1 0 0 1 -.489-.128l-15.18-8.541a1 1 0 0 1 .98-1.743l15.183 8.541a1 1 0 0 1 -.492 1.871z"/><path d="m29 48.281a.986.986 0 0 1 -.489-.129 1 1 0 0 1 -.381-1.361l11.212-19.924a1 1 0 1 1 1.742.98l-11.209 19.924a1 1 0 0 1 -.875.51z"/><path d="m24.309 66.149a.993.993 0 0 1 -.76-.35 12.777 12.777 0 0 0 -7.541-4.242 1 1 0 1 1 .322-1.974 14.751 14.751 0 0 1 8.738 4.917 1 1 0 0 1 -.759 1.649z"/><path d="m52.208 72h-29a1 1 0 0 1 0-2h29a1 1 0 0 1 0 2z"/></svg>
              </span>
            </a>
          </div>
        </div>

        <div class="btn-wrapper-node-delete">
          <a class="btn-node-delete" @click="$emit('purge-note', note.id)">Purge</a>
        </div>
          
      </div>

    </div>
  
</template>

<script>


export default {
  name: 'Notes',
  components: {  },
  props: ['note', 'data', 'col_index', 'index'],
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
    modifyingnotetoggle () {
      // console.log(this.col_index)
      // this.data.modifyinnotecolID
      
      console.log(this.col_index, this.data.modifyinnotecolID)
      
      if(this.data.modifyinnotecolID==-1)
        this.data.modifyinnotecolID = this.col_index
      else
        this.data.modifyinnotecolID= -1

      console.log(this.data.modifyinnotecolID)

      if(this.data.modifyingnoteID==-1)
      this.data.modifyingnoteID = this.index
      else
        this.data.modifyingnoteID= -1

    },
    sendForm: function(e) {
      this.modifyingnotetoggle()
      this.note.description = this.$refs.formdesc.innerText   //this.description
      e.preventDefault();
    },
    startDrag (evt, item, colid)  {
        evt.dataTransfer.dropEffect = 'move'
        evt.dataTransfer.effectAllowed = 'move'
        evt.dataTransfer.setData('itemID', item.id)
        evt.dataTransfer.setData('columnID', colid)
    },
    onDrop(evt, list, colid) {
        const itemID = evt.dataTransfer.getData('itemID')
        const columnID = evt.dataTransfer.getData('columnID')
        
        var item = this.columns.find(item => item.id == colid)
        var note = item.notes.find(item => item.id == list)
        
        var item2 = this.columns.find(item => item.id == columnID)
        var note2 = item2.notes.find(item => item.id == itemID)
        
        var buff = note.description
        note.description = note2.description
        note2.description = buff
        
        buff = note.id
        note.id = note2.id
        note2.id = buff
    },
     loadFhstyles() {
      if(this.data.loaded)
        return {height:this.$refs.innercontext.clientHeight/2+10+'px', margin:'-9px 5px 0 -13px'}
      
      return 
    },
    loadShstyles() {
      if(this.data.loaded)
        return {height:this.$refs.innercontext.clientHeight/2.1+'px', margin:'0px 5px 0 -13px'}
      
      return 
    },

  },mounted(){
    this.$nextTick(function () {
    this.data.loaded = true

    // For invoking property from child element
    // // this.data.fhStyles[thi= []
    // this.data.fhStyles[this.index1] = [0, 1]
    // var arr =  []
    // this.data.items[this.index1].notes.forEach((element, id) => {
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
  .notes-inner-context{
    box-shadow: 0 .5px 1px .5px rgba(9,30,66,.25);

    display: block;
    position: relative;
    word-wrap: break-word;
    margin-bottom: 8px;
    /* box-shadow: .1px .2px black; */
    
  }
  .notes-outer-outline {
    position:absolute;
    background-color:blue;
    opacity:30%;
    width:100%;
    height:100%;
  }
  .notes-outer-context-fh {
    position: absolute;
    position: relative;
    display: block;
    width: 117.5%;
    background-color: red!important;
    opacity: 40%;
    display: none;
  }
  .notes-outer-context-sh {
    position: absolute;
    position: relative;
    display: block;
    width: 117.5%;
    background-color: blue!important;
    opacity: 30%;
    display: none;
  }
  .notes-container {
    position: relative;
    display: block;
    overflow: auto;
    width: 90%;
    margin:0 auto;
  }
  .notes-text {
    display:block;
    float: left;
    max-width: 280px;
    /* width:160px; */
    width: 75%;
    padding:5px 3px 5px 5px;
    /* padding:0 0 0 5px; */
  }
  .popup-context {
    display: relative;
    width: 100%;
    margin: 0;
  }
  .popup-container {
    position: relative;
  }
  .popup-context {
    display:block;
    float: left;
    max-width: 280px;
  }
  .popup-text-container {
    display:inline-block;
    width: 70%;
  }
  .popup-btn-save{
    width: 20%;
    margin-top: 15px;
    display:inline-block;
    vertical-align:top;
    text-align: right;
    
    padding:0 5px 5px;
    cursor: pointer;
  }

  .popup-text-container .textarea  {
    text-align: start;
    resize: none;
    display: inline-block;
    width: 100%;
    overflow: hidden;
    box-shadow: inset 0 0 .1px .2px black;
    outline: none;
    border: none;
    padding:5px 3px 5px 5px;
    /* line-height: 45px; */
  }
  .textarea {
    border: 1px solid #ccc;
    font-family: inherit;
    font-size: inherit;
    padding: 1px 6px;
  }
  .btn-wrapper-node-modify {
    display:inline-block;
    vertical-align:top;
    padding:5px;
    margin-top: 15px;
    /* float: left; */
  }
  .btn-wrapper-node-modify a {
    display: flex;
    justify-content: center;
    align-items: center;
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
    display: block;
    float: left;
    margin-bottom: 5px;
  
  }
  .btn-node-delete {
    font-size: 16px;
    font-weight:500;
    cursor: pointer;
  }
  .btn-node-delete:active {
    color: rgb(194, 99, 99);
  }
  
</style>