(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_dashboard_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _leads_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./leads.vue */ "./resources/js/Pages/components/leads.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
// import Columns from './components/columns.vue'

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'Boards',
  components: {
    Leads: _leads_vue__WEBPACK_IMPORTED_MODULE_0__.default
  },
  props: ['item', 'col_index'],
  computed: {},
  methods: {
    focusouteditBoard: function focusouteditBoard(item) {
      this.$store.dispatch('editBoard', {
        item: item,
        value: this.$refs.boardtitle.value
      });
      var url = "http://localhost:8000/api/update_boards/".concat(colid, "/").concat(this.$refs.area.value);
      var config = {
        'headers': {}
      };
      axios.put(url, config);
    },
    boardDelete: function boardDelete(colidx, item) {
      this.$store.dispatch('boardDelete', {
        colidx: colidx,
        item: item
      });
    },
    leadAdd: function leadAdd(colidx) {
      this.$store.state.leadadding = true;
      this.$store.state.modifyinleadcolID = colidx;
    },
    focusoutcreateLead: function focusoutcreateLead(colidx, item) {
      console.log('nice');
      this.$store.dispatch('createLead', {
        colidx: colidx,
        item: item,
        value: this.$refs.newleadtextarea.value
      });
      this.$store.state.leadadding = false;
      this.$store.state.modifyinleadcolID = -1;
      this.$refs.newleadtextarea.value = ''; // console.log(colidx, colid)
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
    firstClick: function firstClick() {
      if (this.$store.state.clicks === 0) {
        this.$store.state.isediting = false;
      } else {
        this.$store.state.isdraggable = true;
        this.$store.state.isediting = true;
      }
    },
    startDrag: function startDrag(evt, item) {
      this.$store.state.clicks++;
      evt.dataTransfer.dropEffect = 'move';
      evt.dataTransfer.effectAllowed = 'move';
      evt.dataTransfer.setData('itemid', item.id);
      this.$store.state.clicks = 0;
      this.$store.state.cold = true;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'Leads',
  components: {},
  props: ['lead', 'col_index', 'index', 'colid'],
  computed: {
    fhstyles: function fhstyles() {
      return this.loadFhstyles(this.index);
    },
    shstyles: function shstyles() {
      return this.loadShstyles(this.index);
    } // textform: function() {
    // }

  },
  methods: {
    leadsdelete: function leadsdelete(colidx, leadidx, lead) {
      this.$store.dispatch('deleteLead', {
        colidx: colidx,
        leadidx: leadidx,
        lead: lead
      });
    },
    editLead: function editLead() {
      console.log(this.col_index, this.$store.state.modifyinleadcolID);
      if (this.$store.state.modifyinleadcolID == -1) this.$store.state.modifyinleadcolID = this.col_index;else this.$store.state.modifyinleadcolID = -1;
      console.log(this.$store.state.modifyinleadcolID);
      if (this.$store.state.modifyingleadID == -1) this.$store.state.modifyingleadID = this.index;else this.$store.state.modifyingleadID = -1;
    },
    saveLead: function saveLead(colidx, lead) {
      this.editLead();
      this.$store.dispatch('saveLead', {
        colidx: colidx,
        lead: lead,
        value: this.$refs.formdesc.innerText
      });
    },
    startDrag1: function startDrag1(evt, item) {
      evt.dataTransfer.dropEffect = 'move';
      evt.dataTransfer.effectAllowed = 'move';
      evt.dataTransfer.setData('item', item);
    },
    onDrop1: function onDrop1(evt, item, ident) {
      // const itemID = 
      // const columnID = evt.dataTransfer.getData('columnID')
      // const leadIndex = evt.dataTransfer.getData('leadIndex')
      this.$store.dispatch('moveLead', {
        item_target: evt.dataTransfer.getData('item'),
        item: item,
        ident: ident
      }); // // var lead = item.leads.find(item => item.id == list)
      // if(ident == 0)
      //   if(typeof this.$store.state.dashboard.items[this.col_index].leads[index-1] != undefined && 'order' in this.$store.state.dashboard.items[this.col_index].leads[index-1])
      //       order = this.$store.state.dashboard.items[this.col_index].leads[index-1].order
      // else
      //   if(typeof this.$store.state.dashboard.items[this.col_index].leads[index+1] != undefined && 'order' in this.$store.state.dashboard.items[this.col_index].leads[index+1])
      //     order = this.$store.state.dashboard.items[this.col_index].leads[index+1].order
      // console.log(order)
      // var item = this.$store.state.dashboard.items.find(item => item.id == columnID)
      // var lead = item.leads.find(item => item.id == itemID)
      // // var item2 = this.$store.state.dashboard.items.find(item => item.id == colid)
      // // lead.id += item2.leads[item2.leads.length-1].id+1
      // var url = `http://localhost:8001/api/update_boards/${columnID}/${colid}/${this.lead.id}/${order}`;
      // let config = {'headers': {}}
      // axios.put(url, config);
      // // if(ident==1)
      // // index+=1
      // item2.leads.splice(index, 0, lead)
      // item2.leads.join()
      // this.$delete(item.leads, leadIndex)
    },
    loadFhstyles: function loadFhstyles() {
      try {
        if (this.$store.state.loaded) return {
          height: this.$refs.innercontext.clientHeight / 2 + 10 + 'px',
          margin: '-9px 5px 0 -13px'
        };
      } catch (error) {
        return;
      }

      return;
    },
    loadShstyles: function loadShstyles() {
      try {
        if (this.$store.state.loaded) return {
          height: this.$refs.innercontext.clientHeight / 2.1 + 'px',
          margin: '0px 5px 0 -13px'
        };
      } catch (error) {
        return;
      }

      return;
    }
  },
  mounted: function mounted() {
    this.$nextTick(function () {
      this.$store.state.loaded = true; // For invoking property from child element
      // // this.$store.state.fhStyles[thi= []
      // this.$store.state.fhStyles[this.index1] = [0, 1]
      // var arr =  []
      // this.$store.state.dashboard.items[this.index1].leads.forEach((element, id) => {
      //     arr.push( {height: this.$refs.innercontext.clientHeight/1.7+'px', margin:'-10px 0 0 -13px ' })
      //   });
      //   this.$store.state.fhStyles[this.index1] = arr
      //     this.$store.state.loaded = true
      //     console.log(5555555555555)
      //     console.log(5555555555555)
      //     console.log(5555555555555)
      //     console.log(5555555555555)
    });
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _components_boards_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/boards.vue */ "./resources/js/Pages/components/boards.vue");
var _data$props$sockets$c;

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_data$props$sockets$c = {
  data: function data() {
    return {
      dashboard: this.$store.state.dashboard
    };
  },
  props: {},
  sockets: {
    connection: function connection() {
      console.log('socket connected!!');
    },
    users: function users(socketname) {
      var _this = this;

      this.sockets.subscribe(socketname, function (data) {
        if (data.last_update != _this.$store.state.lastupdate) {
          var switchOptions = function switchOptions(option, details) {
            switch (option) {
              case 0:
                _this.$store.dispatch('boardCreateUpdates', details);

                break;

              case 1:
                _this.$store.dispatch('boardUpdateUpdates', details);

                break;

              case 2:
                _this.$store.dispatch('boardDeleteUpdates', details);

                break;

              case 10:
                _this.$store.dispatch('leadCreateUpdates', details);

                break;

              case 11:
                _this.$store.dispatch('leadUpdateUpdates', details);

                break;

              case 12:
                _this.$store.dispatch('leadDeleteUpdates', details);

                break;
            }
          };

          data.data.forEach(function (event) {
            if (event.details[0] != null) {
              event.details.forEach(function (detail) {
                switchOptions(event.event, detail);
              });
            }
          });
        }
      });
    }
  },
  components: {
    Boards: _components_boards_vue__WEBPACK_IMPORTED_MODULE_0__.default
  },
  computed: {}
}, _defineProperty(_data$props$sockets$c, "sockets", {
  connection: function connection() {
    console.log('socket connected!!');
  },
  users: function users(socketname) {}
}), _defineProperty(_data$props$sockets$c, "methods", {
  boardAddEvent: function boardAddEvent() {
    this.$store.state.addingboard = true;
  },
  boardCreate: function boardCreate(evt) {
    this.$store.dispatch('boardCreate', this.$refs.newboardtextarea.value);
    this.$store.state.addingboard = false;
  },
  onDrop: function onDrop(evt, itemid2) {
    if (this.$store.state.cold) {
      var itemid = evt.dataTransfer.getData('itemid');
      this.$store.dispatch('swapBoards', {
        itemid: itemid,
        itemid2: itemid2
      });
      this.$store.state.cold = false;
      this.$store.state.isediting = true;
    }
  }
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

}), _defineProperty(_data$props$sockets$c, "mounted", function mounted() {
  this.$store.dispatch('fetchDashboard', this.sockets);
  var name = 'TOM'; // this.$store.dispatch('fetchSockets');
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
}), _defineProperty(_data$props$sockets$c, "created", function created() {// this.$socket.emit('loaded', {token: this.$store.state.dashboard.token})
}), _data$props$sockets$c);

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.column-container[data-v-23caf62d] {\n  display: inline-block;\n  vertical-align: top;\n  width: 272px;\n  margin:0 4px;\n  background-color:#EBEBEB;\n  overflow: visible;\n}\n.column-container[data-v-23caf62d] {\n  position: relative;\n  display: block;\n  width: 242px;\n  margin:0 auto;\n}\n.titlearea[data-v-23caf62d] {\n  position: relative;\n  width: 100%;\n  margin: 5px 0 8px;\n  height: 27px;\n  line-height: 27px;\n}\n.titlearea textarea[data-v-23caf62d] {\n  height: 27px;\n  line-height: 27px;\n  overflow: hidden; \n  overflow: none;\n  outline: none;\n  border:none;\n  resize: none;\n  cursor: pointer;\n  line-height: normal;\n}\n.titlearea textarea[data-v-23caf62d]:focus {\n  outline: none;\n  cursor:default;\n    user-select: none; /* standard syntax */\n  -webkit-user-select: none; /* webkit (safari, chrome) browsers */\n  -moz-user-select: none; /* mozilla browsers */\n  -khtml-user-select: none; /* webkit (konqueror) browsers */\n  -ms-user-select: none; /* IE10+ */\n}\n/* .titlearea textarea{  \n  padding-left:10px;\n  position: absolute;\n  overflow: hidden;\n  overflow-wrap: break-word;\n  line-height:23px;\n  height: 23px;\n  width:230px;\n  background: transparent;\n  border-radius: 3px;\n  box-shadow: none;\n  resize: none;\n  border: none;\n}\n.titlearea textarea :focus {\n    box-shadow: inset 0 0 0 2px #0079bf;\n    outline: none;\n    transition:.2s ease;\n    background-color:#fff;\n}     */\n.column-container textarea[data-v-23caf62d]:active {\n  background-color: #fff;\n  border:none;\n}\n.boardnav[data-v-23caf62d] {\n  display: inline-block;\n  position: relative;\n  width: 100%;\n  /* height: 35px; */\n}\n.btn-main-card[data-v-23caf62d] {\n  margin:5px 0 5px 0;\n  display: block;\n  position: relative;\n  float: left;\n  /* position: relative; */\n  /* display: flex; */\n  /* justify-content: flex-end; */\n  /* flex-direction: column; */\n  cursor: pointer;/* display: inline-block;\n  \n  border-radius: 3px;\n  font-size: 14px;\n  padding:5px 15px;\n  height: 32px; \n  line-height: 32px; */\n}\n.btn-main-card-text[data-v-23caf62d] {\n  display: block;\n  /* height:40px; */\n  /* width:40px; */\n  margin-left:12px;\n  padding: 2px 3px;\n  border: .1px solid black;\n  /* position: relative; */\n  /* display: block; */\n  /* margin: 0 auto; */\n  /* line-height: 15px; */\n}\n.btn-main-card[data-v-23caf62d]:hover {\n  background-color:#f2f2f22d;\n}\n.newleadcontent[data-v-23caf62d] {\n  margin:5px 0 5px 0;\n  position: relative;\n  display: block;\n  clear:both;\n  padding: 2px 3px;\n}\n.newleadcontent textarea[data-v-23caf62d] {\n  min-height: 50px;\n  width: 100%;\n  height: 60px;\n  resize: none;\n}\n.leadsadd[data-v-23caf62d] {\n  margin:5px 0 5px 0;\n  display: block;\n  position: relative;\n  float: right;\n  cursor: pointer;\n}\n.leadsadd span[data-v-23caf62d] {\n   display: block;\n  margin-right:12px;\n  padding: 2px 3px;\n  border: .1px solid black;\n}\n\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.leads-inner-context[data-v-744cfee7]{\n  box-shadow: 0 .5px 1px .5px rgba(9,30,66,.25);\n\n  display: block;\n  position: relative;\n  word-wrap: break-word;\n  margin-bottom: 8px;\n  /* box-shadow: .1px .2px black; */\n}\n.leads-outer-outline[data-v-744cfee7] {\n  position:absolute;\n  z-index: 11;\n  /* background-color:blue; */\n  width:100%;\n  height:100%;\n}\n.leads-outer-context-fh[data-v-744cfee7] {\n  position: absolute;\n  opacity: 0%;\n  position: relative;\n  display: block;\n  width: 117.5%;\n  background-color: red!important;\n  display: none;\n}\n.leads-outer-context-sh[data-v-744cfee7] {\n  position: absolute;\n  opacity: 0%;\n  position: relative;\n  display: block;\n  width: 117.5%;\n  background-color: blue!important;\n  /* display: none; */\n}\n.leads-container[data-v-744cfee7] {\n  position: relative;\n  display: block;\n  overflow: auto;\n  width: 90%;\n  margin:0 auto;\n}\n.leads-content[data-v-744cfee7] {\n  display:block;\n  position: relative;\n  float: left;\n  text-align: left;\n  max-width: 280px;\n  height: auto;\n  padding-left:5px ;\n  width: 80%;\n\n  /* padding:5px 3px 5px 5px; */\n  /* padding:0 0 0 5px; */\n}\n.leads-content span[data-v-744cfee7]{\n}\n.btn-wrapper-node-modify[data-v-744cfee7] {\n  display:block;\n  float: right;\n  position: relative;\n  height: 25px;\n  /* position: relative; */\n  /* vertical-align:top; */\n  /* padding:5px; */\n  /* margin-top: 15px; */\n  /* float: left; */\n}\n.btn-wrapper-node-modify a[data-v-744cfee7] {\n  /* display: block; */\n  /* justify-content: center; */\n  /* align-items: center; */\n  z-index: 15;\n  position: absolute;\n  right: 0;\n  top:0;\n}\n.btn-wrapper-node-modify a span[data-v-744cfee7]{\n  /* display: block; */\n}\n.leads-content-row[data-v-744cfee7] {\n  margin-top: 10px;\n  min-height: 40px;\n  /* height: 40px; */\n  /* box-shadow: .5px .5px 1px .5px rgba(9,30,66,.25); */\n}\n.btn-wrapper-node-modify a[data-v-744cfee7]:hover {\n  cursor: pointer;\n  text-decoration: underline;\n}\n.svginverted[data-v-744cfee7] {\n  filter: invert(40%);\n}\n.btn-wrapper-node-delete[data-v-744cfee7] {\n  position: relative;\n  display: block;\n  clear: both;\n  float: right;\n  margin-bottom: 5px;\n  height: 15px;\n}\n.btn-wrapper-node-delete a[data-v-744cfee7]{\n  position: absolute;\n  z-index: 15;\n  bottom: 0;\n  right:0;\n}\n.btn-node-delete[data-v-744cfee7] {\n  font-size: 16px;\n  font-weight:500;\n  cursor: pointer;\n}\n.btn-node-delete[data-v-744cfee7]:active {\n  color: rgb(194, 99, 99);\n}\n.popup-context[data-v-744cfee7] {\n\n  text-align: left;\n  display: absolute;\n  width: 100%;\n  height: 100%;\n  z-index: 99;\n}\n.popup-container[data-v-744cfee7] {\n  position: relative;\n}\n.popup-context[data-v-744cfee7] {\n}\n.popup-text-container[data-v-744cfee7] {\n  border: 7px;\n  height:auto;\n  display:block;\n  float: left;\n  width: 80%;\n}\n.popup-text-container span[data-v-744cfee7]  {\n  display: block;\n\n  border-bottom: 1px dotted blue;\n  position: absolute;\n  z-index: 15;\n  top: -4px;\n  height: 100%;\n  padding:0 5px 0 5px ;\n  background-color: #fffeee;\n  text-align: start;\n  /* width: 100%;  */\n  min-height: 40px;\n  height: auto;\n  overflow: hidden;\n  outline: none;\n  border: none;\n}\n.popup-btn-save[data-v-744cfee7]{\n  position: relative;\n  display:block;\n  float: right;\n  cursor: pointer;\n}\n.popup-btn-save a[data-v-744cfee7]{\n  position: absolute;\n  right:0;\n  z-index: 15;\n}\n\n\n\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=style&index=0&id=4c471d4a&scoped=true&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=style&index=0&id=4c471d4a&scoped=true&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.container[data-v-4c471d4a] {\n    position: relative;\n    min-width: 1360px;\n    max-width: 1600px;\n    /* display: block; */ \n    /* justify-content: center; */\n    margin: 0 auto;\n    border: 1.2px solid;\n}\n.board-context[data-v-4c471d4a] {\n    display: inline-block;\n    vertical-align: top;\n    width: 272px;\n    margin:0 4px;\n    background-color:#EBEBEB;\n}\n.boards-append[data-v-4c471d4a] {\n    position: relative;\n    display: inline-block;\n    min-width: 80px;\n    width:80px ;\n    background-color: azure;\n    border-radius: 14px;\n}\n.boards-append-adding-form[data-v-4c471d4a] {\n    position: relative;\n    min-height: 70px;\n    display: block;\n    margin: 0 auto;\n    min-width: 70px;\n    width: 100%;\n}\n.boards-append-adding-form  textarea[data-v-4c471d4a] {\n    height: 27px;\n    line-height: 27px;\n    width:auto;\n    max-width: 120px;\n    overflow: hidden; \n    overflow: none;\n    outline: none;\n    border:none;\n    resize: none;\n    cursor: pointer;\n    line-height: normal;\n\n  /* box-sizing: border-box;\n  resize: none;\n  position: absolute;\n  width: 100%;\n  height: 100%;  */\n}\n.boards-append-adding-form  textarea [type=text][data-v-4c471d4a] {\n    width: 90px;\n    height: auto;\n    word-wrap: break-word;\n    word-break: break-all;\n    display: block;\n    margin: 0 auto;\n}\n.btn-boards-append[data-v-4c471d4a]:hover {\n    text-decoration: underline;\n    cursor: pointer;\n}\n.boards-append-adding-card[data-v-4c471d4a] {\n    height: 125px;\n    transition:1.6s;\n}\n.boards-append-adding-card .btn-boards-append[data-v-4c471d4a] {\n    display: none;\n}\n.boards-append-adding-btn[data-v-4c471d4a] {\n    position: absolute;\n    visibility: hidden;\n    opacity: 0;\n}\n/* boards-append boards-append-adding-card */\n.boards-append-adding-btn[data-v-4c471d4a]:hover {\n    text-decoration: none;\n    cursor:none;\n}\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=style&index=1&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=style&index=1&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n#app {\r\n  font-family: Avenir, Helvetica, Arial, sans-serif;\r\n  -webkit-font-smoothing: antialiased;\r\n  -moz-osx-font-smoothing: grayscale;\r\n  text-align: center;\r\n  color: #2c3e50;\r\n  margin-top: 60px;\n}\nh1, h2, h3, h4, h5 {\r\n   margin:0;\r\n   padding:0;\n}\ndiv {\r\n  margin: 0;\r\n  padding:0;\n}\r\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_style_index_0_id_23caf62d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_style_index_0_id_23caf62d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_style_index_0_id_23caf62d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_style_index_0_id_744cfee7_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_style_index_0_id_744cfee7_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_style_index_0_id_744cfee7_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=style&index=0&id=4c471d4a&scoped=true&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=style&index=0&id=4c471d4a&scoped=true&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_style_index_0_id_4c471d4a_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./dashboard.vue?vue&type=style&index=0&id=4c471d4a&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=style&index=0&id=4c471d4a&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_style_index_0_id_4c471d4a_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_style_index_0_id_4c471d4a_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=style&index=1&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=style&index=1&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./dashboard.vue?vue&type=style&index=1&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=style&index=1&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

/***/ }),

/***/ "./resources/js/Pages/components/boards.vue":
/*!**************************************************!*\
  !*** ./resources/js/Pages/components/boards.vue ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _boards_vue_vue_type_template_id_23caf62d_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./boards.vue?vue&type=template&id=23caf62d&scoped=true& */ "./resources/js/Pages/components/boards.vue?vue&type=template&id=23caf62d&scoped=true&");
/* harmony import */ var _boards_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./boards.vue?vue&type=script&lang=js& */ "./resources/js/Pages/components/boards.vue?vue&type=script&lang=js&");
/* harmony import */ var _boards_vue_vue_type_style_index_0_id_23caf62d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css& */ "./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__.default)(
  _boards_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _boards_vue_vue_type_template_id_23caf62d_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _boards_vue_vue_type_template_id_23caf62d_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "23caf62d",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/components/boards.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/components/leads.vue":
/*!*************************************************!*\
  !*** ./resources/js/Pages/components/leads.vue ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _leads_vue_vue_type_template_id_744cfee7_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./leads.vue?vue&type=template&id=744cfee7&scoped=true& */ "./resources/js/Pages/components/leads.vue?vue&type=template&id=744cfee7&scoped=true&");
/* harmony import */ var _leads_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./leads.vue?vue&type=script&lang=js& */ "./resources/js/Pages/components/leads.vue?vue&type=script&lang=js&");
/* harmony import */ var _leads_vue_vue_type_style_index_0_id_744cfee7_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css& */ "./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__.default)(
  _leads_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _leads_vue_vue_type_template_id_744cfee7_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _leads_vue_vue_type_template_id_744cfee7_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "744cfee7",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/components/leads.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/dashboard.vue":
/*!******************************************!*\
  !*** ./resources/js/Pages/dashboard.vue ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _dashboard_vue_vue_type_template_id_4c471d4a_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./dashboard.vue?vue&type=template&id=4c471d4a&scoped=true& */ "./resources/js/Pages/dashboard.vue?vue&type=template&id=4c471d4a&scoped=true&");
/* harmony import */ var _dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./dashboard.vue?vue&type=script&lang=js& */ "./resources/js/Pages/dashboard.vue?vue&type=script&lang=js&");
/* harmony import */ var _dashboard_vue_vue_type_style_index_0_id_4c471d4a_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./dashboard.vue?vue&type=style&index=0&id=4c471d4a&scoped=true&lang=css& */ "./resources/js/Pages/dashboard.vue?vue&type=style&index=0&id=4c471d4a&scoped=true&lang=css&");
/* harmony import */ var _dashboard_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./dashboard.vue?vue&type=style&index=1&lang=css& */ "./resources/js/Pages/dashboard.vue?vue&type=style&index=1&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;



/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_4__.default)(
  _dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _dashboard_vue_vue_type_template_id_4c471d4a_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _dashboard_vue_vue_type_template_id_4c471d4a_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "4c471d4a",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/dashboard.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/components/boards.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/Pages/components/boards.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./boards.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/components/leads.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/Pages/components/leads.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./leads.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/dashboard.vue?vue&type=script&lang=js&":
/*!*******************************************************************!*\
  !*** ./resources/js/Pages/dashboard.vue?vue&type=script&lang=js& ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./dashboard.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css&":
/*!***********************************************************************************************************!*\
  !*** ./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css& ***!
  \***********************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_style_index_0_id_23caf62d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css&");


/***/ }),

/***/ "./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css&":
/*!**********************************************************************************************************!*\
  !*** ./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css& ***!
  \**********************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_style_index_0_id_744cfee7_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css&");


/***/ }),

/***/ "./resources/js/Pages/dashboard.vue?vue&type=style&index=0&id=4c471d4a&scoped=true&lang=css&":
/*!***************************************************************************************************!*\
  !*** ./resources/js/Pages/dashboard.vue?vue&type=style&index=0&id=4c471d4a&scoped=true&lang=css& ***!
  \***************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_style_index_0_id_4c471d4a_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader/dist/cjs.js!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./dashboard.vue?vue&type=style&index=0&id=4c471d4a&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=style&index=0&id=4c471d4a&scoped=true&lang=css&");


/***/ }),

/***/ "./resources/js/Pages/dashboard.vue?vue&type=style&index=1&lang=css&":
/*!***************************************************************************!*\
  !*** ./resources/js/Pages/dashboard.vue?vue&type=style&index=1&lang=css& ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_10_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_style_index_1_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader/dist/cjs.js!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./dashboard.vue?vue&type=style&index=1&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=style&index=1&lang=css&");


/***/ }),

/***/ "./resources/js/Pages/components/boards.vue?vue&type=template&id=23caf62d&scoped=true&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/Pages/components/boards.vue?vue&type=template&id=23caf62d&scoped=true& ***!
  \*********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_template_id_23caf62d_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
/* harmony export */   "staticRenderFns": () => /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_template_id_23caf62d_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_template_id_23caf62d_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./boards.vue?vue&type=template&id=23caf62d&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=template&id=23caf62d&scoped=true&");


/***/ }),

/***/ "./resources/js/Pages/components/leads.vue?vue&type=template&id=744cfee7&scoped=true&":
/*!********************************************************************************************!*\
  !*** ./resources/js/Pages/components/leads.vue?vue&type=template&id=744cfee7&scoped=true& ***!
  \********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_template_id_744cfee7_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
/* harmony export */   "staticRenderFns": () => /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_template_id_744cfee7_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_template_id_744cfee7_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./leads.vue?vue&type=template&id=744cfee7&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=template&id=744cfee7&scoped=true&");


/***/ }),

/***/ "./resources/js/Pages/dashboard.vue?vue&type=template&id=4c471d4a&scoped=true&":
/*!*************************************************************************************!*\
  !*** ./resources/js/Pages/dashboard.vue?vue&type=template&id=4c471d4a&scoped=true& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_template_id_4c471d4a_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
/* harmony export */   "staticRenderFns": () => /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_template_id_4c471d4a_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_dashboard_vue_vue_type_template_id_4c471d4a_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./dashboard.vue?vue&type=template&id=4c471d4a&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=template&id=4c471d4a&scoped=true&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=template&id=23caf62d&scoped=true&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=template&id=23caf62d&scoped=true& ***!
  \************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => /* binding */ render,
/* harmony export */   "staticRenderFns": () => /* binding */ staticRenderFns
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c(
      "div",
      { staticClass: "column-container" },
      [
        _c(
          "div",
          {
            staticClass: "titlearea",
            attrs: { draggable: !this.$store.state.isdraggable },
            on: {
              click: function($event) {
                return _vm.firstClick($event)
              },
              dragstart: function($event) {
                return _vm.startDrag($event, _vm.item)
              }
            }
          },
          [
            _c("textarea", {
              ref: "boardtitle",
              class: { "is-editing": this.$store.state.isediting },
              attrs: {
                name: "",
                id: "",
                "aria-label": "grgr",
                readonly: this.$store.state.isediting
              },
              domProps: { value: _vm.item.title },
              on: {
                blur: function($event) {
                  return _vm.focusouteditBoard(_vm.item)
                }
              }
            })
          ]
        ),
        _vm._v(" "),
        _vm._l(_vm.item.leads, function(lead, index) {
          return _c(
            "div",
            { key: lead.id },
            [
              _c("Leads", {
                attrs: {
                  lead: lead,
                  col_index: _vm.col_index,
                  colid: _vm.item.id,
                  index: index
                }
              })
            ],
            1
          )
        }),
        _vm._v(" "),
        _c("div", { staticClass: "boardnav" }, [
          this.$store.state.modifyinleadcolID == _vm.col_index
            ? _c(
                "div",
                {
                  class: { newleadcontent: this.$store.state.leadadding },
                  attrs: { hidden: "" }
                },
                [
                  _c("textarea", {
                    ref: "newleadtextarea",
                    attrs: { name: "", id: "" },
                    on: {
                      blur: function($event) {
                        return _vm.focusoutcreateLead(_vm.col_index, _vm.item)
                      }
                    }
                  })
                ]
              )
            : _vm._e(),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "btn-main-card",
              on: {
                click: function($event) {
                  return _vm.boardDelete(_vm.col_index, _vm.item)
                }
              }
            },
            [
              _c("span", { staticClass: "btn-main-card-text" }, [
                _vm._v("\n        delete board\n        ")
              ])
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "leadsadd",
              attrs: { type: "button" },
              on: {
                click: function($event) {
                  return _vm.leadAdd(_vm.col_index)
                }
              }
            },
            [_c("span", [_vm._v("\n          new lead\n        ")])]
          )
        ])
      ],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=template&id=744cfee7&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=template&id=744cfee7&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => /* binding */ render,
/* harmony export */   "staticRenderFns": () => /* binding */ staticRenderFns
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      ref: "innercontext",
      staticClass: "leads-inner-context",
      attrs: { draggable: "" },
      on: {
        dragstart: function($event) {
          return _vm.startDrag1($event, _vm.lead, _vm.colid, _vm.index)
        }
      }
    },
    [
      _c("div", { staticClass: "leads-outer-outline" }, [
        _c("div", [
          _c("div", {
            staticClass: "leads-outer-context-fh",
            style: _vm.fhstyles,
            on: {
              drop: function($event) {
                return _vm.onDrop1($event, _vm.colid, 0)
              },
              dragover: function($event) {
                $event.preventDefault()
              },
              dragenter: function($event) {
                $event.preventDefault()
              }
            }
          }),
          _vm._v(" "),
          _c("div", {
            staticClass: "leads-outer-context-sh",
            style: _vm.shstyles,
            on: {
              drop: function($event) {
                return _vm.onDrop1($event, _vm.colid, 1)
              },
              dragover: function($event) {
                $event.preventDefault()
              },
              dragenter: function($event) {
                $event.preventDefault()
              }
            }
          })
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "leads-container" }, [
        this.$store.state.modifyingleadID == _vm.index &&
        _vm.col_index == this.$store.state.modifyinleadcolID
          ? _c("div", { staticClass: "popup-context" }, [
              _c("div", { staticClass: "popup-container" }, [
                _c(
                  "div",
                  { staticClass: "leads-content-row popup-text-container" },
                  [
                    _c(
                      "span",
                      {
                        ref: "formdesc",
                        staticClass: "textarea",
                        attrs: { role: "textbox", contenteditable: "" }
                      },
                      [_vm._v(_vm._s(_vm.lead.description) + "\n            ")]
                    )
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass: "leads-content-row popup-btn-save",
                    on: {
                      click: function($event) {
                        return _vm.saveLead(_vm.col_index, _vm.lead)
                      }
                    }
                  },
                  [_c("a", [_vm._v("save")])]
                )
              ])
            ])
          : _c("div", [
              _c("div", { staticClass: "leads-content-row leads-content" }, [
                _c("span", [
                  _vm._v(
                    "\n          " +
                      _vm._s(_vm.lead.description) +
                      " \n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "leads-content-row btn-wrapper-node-modify" },
                [
                  _c("a", { on: { click: _vm.editLead } }, [
                    _c(
                      "span",
                      { staticStyle: { display: "block", margin: "auto" } },
                      [
                        _c(
                          "svg",
                          {
                            staticStyle: {
                              height: "25px",
                              "line-height": "25px"
                            },
                            attrs: {
                              id: "Icons",
                              viewBox: "0 0 74 74",
                              xmlns: "http://www.w3.org/2000/svg"
                            }
                          },
                          [
                            _c("path", {
                              attrs: {
                                d:
                                  "m43.369 40.51a.986.986 0 0 1 -.489-.129 1 1 0 0 1 -.38-1.361l3.06-5.44a1 1 0 0 1 1.744.98l-3.062 5.44a1 1 0 0 1 -.873.51z"
                              }
                            }),
                            _c("path", {
                              attrs: {
                                d:
                                  "m31.789 61.09a.986.986 0 0 1 -.489-.129l-15.18-8.54a1 1 0 0 1 -.381-1.361l26.689-47.44a3.169 3.169 0 0 1 4.322-1.212l11.391 6.41a3.187 3.187 0 0 1 1.212 4.322l-9.6 17.07a1 1 0 1 1 -1.742-.98l9.6-17.07a1.179 1.179 0 0 0 -.451-1.6l-11.39-6.409a1.174 1.174 0 0 0 -1.6.449l-26.2 46.568 13.436 7.56 3.13-5.559a1 1 0 0 1 1.742.982l-3.62 6.43a1 1 0 0 1 -.869.509z"
                              }
                            }),
                            _c("path", {
                              attrs: {
                                d:
                                  "m37.859 50.3a1 1 0 0 1 -.87-1.491l3.06-5.43a1 1 0 1 1 1.742.982l-3.06 5.43a1 1 0 0 1 -.872.509z"
                              }
                            }),
                            _c("path", {
                              attrs: {
                                d:
                                  "m15.659 72a1 1 0 0 1 -1-1.049l.951-19.451a1 1 0 0 1 1.49-.822l15.179 8.54a1 1 0 0 1 .071 1.7l-16.13 10.91a1 1 0 0 1 -.561.172zm1.87-18.786-.773 15.837 13.133-8.883z"
                              }
                            }),
                            _c("path", {
                              attrs: {
                                d:
                                  "m52.606 24.088a1 1 0 0 1 -.489-.128l-15.18-8.541a1 1 0 0 1 .98-1.743l15.183 8.541a1 1 0 0 1 -.492 1.871z"
                              }
                            }),
                            _c("path", {
                              attrs: {
                                d:
                                  "m29 48.281a.986.986 0 0 1 -.489-.129 1 1 0 0 1 -.381-1.361l11.212-19.924a1 1 0 1 1 1.742.98l-11.209 19.924a1 1 0 0 1 -.875.51z"
                              }
                            }),
                            _c("path", {
                              attrs: {
                                d:
                                  "m24.309 66.149a.993.993 0 0 1 -.76-.35 12.777 12.777 0 0 0 -7.541-4.242 1 1 0 1 1 .322-1.974 14.751 14.751 0 0 1 8.738 4.917 1 1 0 0 1 -.759 1.649z"
                              }
                            }),
                            _c("path", {
                              attrs: {
                                d:
                                  "m52.208 72h-29a1 1 0 0 1 0-2h29a1 1 0 0 1 0 2z"
                              }
                            })
                          ]
                        )
                      ]
                    )
                  ])
                ]
              )
            ]),
        _vm._v(" "),
        _c("div", { staticClass: "btn-wrapper-node-delete" }, [
          _c(
            "a",
            {
              staticClass: "btn-node-delete",
              on: {
                click: function($event) {
                  return _vm.leadsdelete(_vm.col_index, _vm.index, _vm.lead)
                }
              }
            },
            [_vm._v("Purge")]
          )
        ])
      ])
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=template&id=4c471d4a&scoped=true&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/dashboard.vue?vue&type=template&id=4c471d4a&scoped=true& ***!
  \****************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => /* binding */ render,
/* harmony export */   "staticRenderFns": () => /* binding */ staticRenderFns
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _vm._v("\n" + _vm._s(this.dashboard.token) + "\n        "),
    _c(
      "div",
      { staticClass: "container" },
      [
        _vm._l(_vm.dashboard.items, function(item, index) {
          return _c(
            "div",
            {
              key: item.id,
              staticClass: "board-context",
              on: {
                drop: function($event) {
                  return _vm.onDrop($event, item.id)
                },
                dragover: function($event) {
                  $event.preventDefault()
                },
                dragenter: function($event) {
                  $event.preventDefault()
                }
              }
            },
            [
              _c("Boards", {
                ref: "col",
                refInFor: true,
                attrs: { col_index: index, item: item }
              })
            ],
            1
          )
        }),
        _vm._v(" "),
        _c("div", { staticClass: "boards-append" }, [
          _c(
            "div",
            {
              class: {
                "boards-append-adding-form": this.$store.state.addingboard
              },
              attrs: { hidden: "" }
            },
            [
              _c("textarea", {
                ref: "newboardtextarea",
                attrs: { name: "", id: "", cols: "30", rows: "10" }
              }),
              _vm._v(" "),
              _c("input", {
                attrs: { type: "button", value: "save board" },
                on: {
                  click: function($event) {
                    return _vm.boardCreate($event)
                  }
                }
              })
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "btn-boards-append",
              class: {
                "boards-append-adding-btn": this.$store.state.addingboard
              },
              on: { click: _vm.boardAddEvent }
            },
            [
              !this.$store.state.addingboard
                ? _c("div", [
                    _vm._v(
                      "\n                    add board\n                    "
                    )
                  ])
                : _vm._e()
            ]
          )
        ])
      ],
      2
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);