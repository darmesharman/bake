(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_main_vue"],{

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
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

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
    startDrag1: function startDrag1(evt, item, colid, index) {
      evt.dataTransfer.dropEffect = 'move';
      evt.dataTransfer.effectAllowed = 'move';
      evt.dataTransfer.setData('itemID', item.id);
      evt.dataTransfer.setData('columnID', colid);
      evt.dataTransfer.setData('leadIndex', index);
    },
    onDrop1: function onDrop1(evt, order, colid, index, ident) {
      var itemID = evt.dataTransfer.getData('itemID');
      var columnID = evt.dataTransfer.getData('columnID');
      var leadIndex = evt.dataTransfer.getData('leadIndex');
      var item2 = this.$store.state.items.find(function (item) {
        return item.id == colid;
      }); // var lead = item.leads.find(item => item.id == list)

      console.log(order);
      console.log(this.$store.state.items[this.col_index].leads[index - 1]);
      console.log(this.$store.state.items[this.col_index].leads[index]);
      console.log(this.$store.state.items[this.col_index].leads[index + 1]);
      if (ident == 0) if (_typeof(this.$store.state.items[this.col_index].leads[index - 1]) != undefined && 'order' in this.$store.state.items[this.col_index].leads[index - 1]) order = this.$store.state.items[this.col_index].leads[index - 1].order;else if (_typeof(this.$store.state.items[this.col_index].leads[index + 1]) != undefined && 'order' in this.$store.state.items[this.col_index].leads[index + 1]) order = this.$store.state.items[this.col_index].leads[index + 1].order;
      console.log(order);
      var item = this.$store.state.items.find(function (item) {
        return item.id == columnID;
      });
      var lead = item.leads.find(function (item) {
        return item.id == itemID;
      }); // var item2 = this.$store.state.items.find(item => item.id == colid)
      // lead.id += item2.leads[item2.leads.length-1].id+1

      var url = "http://localhost:8001/api/update_boards/".concat(columnID, "/").concat(colid, "/").concat(this.lead.id, "/").concat(order);
      var config = {
        'headers': {}
      };
      axios.put(url, config);
      if (ident == 1) index += 1;
      item2.leads.splice(index, 0, lead);
      item2.leads.join();
      this.$delete(item.leads, leadIndex);
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
      // this.$store.state.items[this.index1].leads.forEach((element, id) => {
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

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/main.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/main.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _components_boards_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/boards.vue */ "./resources/js/Pages/components/boards.vue");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
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
  props: {},
  components: {
    Boards: _components_boards_vue__WEBPACK_IMPORTED_MODULE_0__.default
  },
  sockets: {
    connection: function connection() {},
    users: function users(socketname) {}
  },
  methods: {},
  mounted: function mounted() {}
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
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

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
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
___CSS_LOADER_EXPORT___.push([module.id, "\n.leads-inner-context[data-v-744cfee7]{\n  box-shadow: 0 .5px 1px .5px rgba(9,30,66,.25);\n\n  display: block;\n  position: relative;\n  word-wrap: break-word;\n  margin-bottom: 8px;\n  /* box-shadow: .1px .2px black; */\n}\n.leads-outer-outline[data-v-744cfee7] {\n  position:absolute;\n  z-index: 11;\n  /* background-color:blue; */\n  width:100%;\n  height:100%;\n}\n.leads-outer-context-fh[data-v-744cfee7] {\n  position: absolute;\n  opacity: 0%;\n  position: relative;\n  display: block;\n  width: 117.5%;\n  background-color: red!important;\n  /* display: none; */\n}\n.leads-outer-context-sh[data-v-744cfee7] {\n  position: absolute;\n  opacity: 0%;\n  position: relative;\n  display: block;\n  width: 117.5%;\n  background-color: blue!important;\n  /* display: none; */\n}\n.leads-container[data-v-744cfee7] {\n  position: relative;\n  display: block;\n  overflow: auto;\n  width: 90%;\n  margin:0 auto;\n}\n.leads-content[data-v-744cfee7] {\n  display:block;\n  position: relative;\n  float: left;\n  text-align: left;\n  max-width: 280px;\n  height: auto;\n  padding-left:5px ;\n  width: 80%;\n\n  /* padding:5px 3px 5px 5px; */\n  /* padding:0 0 0 5px; */\n}\n.leads-content span[data-v-744cfee7]{\n}\n.btn-wrapper-node-modify[data-v-744cfee7] {\n  display:block;\n  float: right;\n  position: relative;\n  height: 25px;\n  /* position: relative; */\n  /* vertical-align:top; */\n  /* padding:5px; */\n  /* margin-top: 15px; */\n  /* float: left; */\n}\n.btn-wrapper-node-modify a[data-v-744cfee7] {\n  /* display: block; */\n  /* justify-content: center; */\n  /* align-items: center; */\n  z-index: 15;\n  position: absolute;\n  right: 0;\n  top:0;\n}\n.btn-wrapper-node-modify a span[data-v-744cfee7]{\n  /* display: block; */\n}\n.leads-content-row[data-v-744cfee7] {\n  margin-top: 10px;\n  min-height: 40px;\n  /* height: 40px; */\n  /* box-shadow: .5px .5px 1px .5px rgba(9,30,66,.25); */\n}\n.btn-wrapper-node-modify a[data-v-744cfee7]:hover {\n  cursor: pointer;\n  text-decoration: underline;\n}\n.svginverted[data-v-744cfee7] {\n  filter: invert(40%);\n}\n.btn-wrapper-node-delete[data-v-744cfee7] {\n  position: relative;\n  display: block;\n  clear: both;\n  float: right;\n  margin-bottom: 5px;\n  height: 15px;\n}\n.btn-wrapper-node-delete a[data-v-744cfee7]{\n  position: absolute;\n  z-index: 15;\n  bottom: 0;\n  right:0;\n}\n.btn-node-delete[data-v-744cfee7] {\n  font-size: 16px;\n  font-weight:500;\n  cursor: pointer;\n}\n.btn-node-delete[data-v-744cfee7]:active {\n  color: rgb(194, 99, 99);\n}\n.popup-context[data-v-744cfee7] {\n\n  text-align: left;\n  display: absolute;\n  width: 100%;\n  height: 100%;\n  z-index: 99;\n}\n.popup-container[data-v-744cfee7] {\n  position: relative;\n}\n.popup-context[data-v-744cfee7] {\n}\n.popup-text-container[data-v-744cfee7] {\n  border: 7px;\n  height:auto;\n  display:block;\n  float: left;\n  width: 80%;\n}\n.popup-text-container span[data-v-744cfee7]  {\n  display: block;\n\n  border-bottom: 1px dotted blue;\n  position: absolute;\n  z-index: 15;\n  top: -4px;\n  height: 100%;\n  padding:0 5px 0 5px ;\n  background-color: #fffeee;\n  text-align: start;\n  /* width: 100%;  */\n  min-height: 40px;\n  height: auto;\n  overflow: hidden;\n  outline: none;\n  border: none;\n}\n.popup-btn-save[data-v-744cfee7]{\n  position: relative;\n  display:block;\n  float: right;\n  cursor: pointer;\n}\n.popup-btn-save a[data-v-744cfee7]{\n  position: absolute;\n  right:0;\n  z-index: 15;\n}\n\n\n\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/runtime/api.js":
/*!*****************************************************!*\
  !*** ./node_modules/css-loader/dist/runtime/api.js ***!
  \*****************************************************/
/***/ ((module) => {

"use strict";


/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
// eslint-disable-next-line func-names
module.exports = function (cssWithMappingToString) {
  var list = []; // return the list of modules as css string

  list.toString = function toString() {
    return this.map(function (item) {
      var content = cssWithMappingToString(item);

      if (item[2]) {
        return "@media ".concat(item[2], " {").concat(content, "}");
      }

      return content;
    }).join('');
  }; // import a list of modules into the list
  // eslint-disable-next-line func-names


  list.i = function (modules, mediaQuery, dedupe) {
    if (typeof modules === 'string') {
      // eslint-disable-next-line no-param-reassign
      modules = [[null, modules, '']];
    }

    var alreadyImportedModules = {};

    if (dedupe) {
      for (var i = 0; i < this.length; i++) {
        // eslint-disable-next-line prefer-destructuring
        var id = this[i][0];

        if (id != null) {
          alreadyImportedModules[id] = true;
        }
      }
    }

    for (var _i = 0; _i < modules.length; _i++) {
      var item = [].concat(modules[_i]);

      if (dedupe && alreadyImportedModules[item[0]]) {
        // eslint-disable-next-line no-continue
        continue;
      }

      if (mediaQuery) {
        if (!item[2]) {
          item[2] = mediaQuery;
        } else {
          item[2] = "".concat(mediaQuery, " and ").concat(item[2]);
        }
      }

      list.push(item);
    }
  };

  return list;
};

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_style_index_0_id_23caf62d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_style_index_0_id_23caf62d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_style_index_0_id_23caf62d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_style_index_0_id_744cfee7_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_style_index_0_id_744cfee7_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_style_index_0_id_744cfee7_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":
/*!****************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js ***!
  \****************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

"use strict";


var isOldIE = function isOldIE() {
  var memo;
  return function memorize() {
    if (typeof memo === 'undefined') {
      // Test for IE <= 9 as proposed by Browserhacks
      // @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
      // Tests for existence of standard globals is to allow style-loader
      // to operate correctly into non-standard environments
      // @see https://github.com/webpack-contrib/style-loader/issues/177
      memo = Boolean(window && document && document.all && !window.atob);
    }

    return memo;
  };
}();

var getTarget = function getTarget() {
  var memo = {};
  return function memorize(target) {
    if (typeof memo[target] === 'undefined') {
      var styleTarget = document.querySelector(target); // Special case to return head of iframe instead of iframe itself

      if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
        try {
          // This will throw an exception if access to iframe is blocked
          // due to cross-origin restrictions
          styleTarget = styleTarget.contentDocument.head;
        } catch (e) {
          // istanbul ignore next
          styleTarget = null;
        }
      }

      memo[target] = styleTarget;
    }

    return memo[target];
  };
}();

var stylesInDom = [];

function getIndexByIdentifier(identifier) {
  var result = -1;

  for (var i = 0; i < stylesInDom.length; i++) {
    if (stylesInDom[i].identifier === identifier) {
      result = i;
      break;
    }
  }

  return result;
}

function modulesToDom(list, options) {
  var idCountMap = {};
  var identifiers = [];

  for (var i = 0; i < list.length; i++) {
    var item = list[i];
    var id = options.base ? item[0] + options.base : item[0];
    var count = idCountMap[id] || 0;
    var identifier = "".concat(id, " ").concat(count);
    idCountMap[id] = count + 1;
    var index = getIndexByIdentifier(identifier);
    var obj = {
      css: item[1],
      media: item[2],
      sourceMap: item[3]
    };

    if (index !== -1) {
      stylesInDom[index].references++;
      stylesInDom[index].updater(obj);
    } else {
      stylesInDom.push({
        identifier: identifier,
        updater: addStyle(obj, options),
        references: 1
      });
    }

    identifiers.push(identifier);
  }

  return identifiers;
}

function insertStyleElement(options) {
  var style = document.createElement('style');
  var attributes = options.attributes || {};

  if (typeof attributes.nonce === 'undefined') {
    var nonce =  true ? __webpack_require__.nc : 0;

    if (nonce) {
      attributes.nonce = nonce;
    }
  }

  Object.keys(attributes).forEach(function (key) {
    style.setAttribute(key, attributes[key]);
  });

  if (typeof options.insert === 'function') {
    options.insert(style);
  } else {
    var target = getTarget(options.insert || 'head');

    if (!target) {
      throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");
    }

    target.appendChild(style);
  }

  return style;
}

function removeStyleElement(style) {
  // istanbul ignore if
  if (style.parentNode === null) {
    return false;
  }

  style.parentNode.removeChild(style);
}
/* istanbul ignore next  */


var replaceText = function replaceText() {
  var textStore = [];
  return function replace(index, replacement) {
    textStore[index] = replacement;
    return textStore.filter(Boolean).join('\n');
  };
}();

function applyToSingletonTag(style, index, remove, obj) {
  var css = remove ? '' : obj.media ? "@media ".concat(obj.media, " {").concat(obj.css, "}") : obj.css; // For old IE

  /* istanbul ignore if  */

  if (style.styleSheet) {
    style.styleSheet.cssText = replaceText(index, css);
  } else {
    var cssNode = document.createTextNode(css);
    var childNodes = style.childNodes;

    if (childNodes[index]) {
      style.removeChild(childNodes[index]);
    }

    if (childNodes.length) {
      style.insertBefore(cssNode, childNodes[index]);
    } else {
      style.appendChild(cssNode);
    }
  }
}

function applyToTag(style, options, obj) {
  var css = obj.css;
  var media = obj.media;
  var sourceMap = obj.sourceMap;

  if (media) {
    style.setAttribute('media', media);
  } else {
    style.removeAttribute('media');
  }

  if (sourceMap && typeof btoa !== 'undefined') {
    css += "\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))), " */");
  } // For old IE

  /* istanbul ignore if  */


  if (style.styleSheet) {
    style.styleSheet.cssText = css;
  } else {
    while (style.firstChild) {
      style.removeChild(style.firstChild);
    }

    style.appendChild(document.createTextNode(css));
  }
}

var singleton = null;
var singletonCounter = 0;

function addStyle(obj, options) {
  var style;
  var update;
  var remove;

  if (options.singleton) {
    var styleIndex = singletonCounter++;
    style = singleton || (singleton = insertStyleElement(options));
    update = applyToSingletonTag.bind(null, style, styleIndex, false);
    remove = applyToSingletonTag.bind(null, style, styleIndex, true);
  } else {
    style = insertStyleElement(options);
    update = applyToTag.bind(null, style, options);

    remove = function remove() {
      removeStyleElement(style);
    };
  }

  update(obj);
  return function updateStyle(newObj) {
    if (newObj) {
      if (newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap) {
        return;
      }

      update(obj = newObj);
    } else {
      remove();
    }
  };
}

module.exports = function (list, options) {
  options = options || {}; // Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
  // tags it will allow on a page

  if (!options.singleton && typeof options.singleton !== 'boolean') {
    options.singleton = isOldIE();
  }

  list = list || [];
  var lastIdentifiers = modulesToDom(list, options);
  return function update(newList) {
    newList = newList || [];

    if (Object.prototype.toString.call(newList) !== '[object Array]') {
      return;
    }

    for (var i = 0; i < lastIdentifiers.length; i++) {
      var identifier = lastIdentifiers[i];
      var index = getIndexByIdentifier(identifier);
      stylesInDom[index].references--;
    }

    var newLastIdentifiers = modulesToDom(newList, options);

    for (var _i = 0; _i < lastIdentifiers.length; _i++) {
      var _identifier = lastIdentifiers[_i];

      var _index = getIndexByIdentifier(_identifier);

      if (stylesInDom[_index].references === 0) {
        stylesInDom[_index].updater();

        stylesInDom.splice(_index, 1);
      }
    }

    lastIdentifiers = newLastIdentifiers;
  };
};

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

/***/ "./resources/js/Pages/main.vue":
/*!*************************************!*\
  !*** ./resources/js/Pages/main.vue ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _main_vue_vue_type_template_id_f9f8d77c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./main.vue?vue&type=template&id=f9f8d77c&scoped=true& */ "./resources/js/Pages/main.vue?vue&type=template&id=f9f8d77c&scoped=true&");
/* harmony import */ var _main_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./main.vue?vue&type=script&lang=js& */ "./resources/js/Pages/main.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _main_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _main_vue_vue_type_template_id_f9f8d77c_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _main_vue_vue_type_template_id_f9f8d77c_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "f9f8d77c",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/main.vue"
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

/***/ "./resources/js/Pages/main.vue?vue&type=script&lang=js&":
/*!**************************************************************!*\
  !*** ./resources/js/Pages/main.vue?vue&type=script&lang=js& ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => __WEBPACK_DEFAULT_EXPORT__
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_main_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./main.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/main.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_main_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css&":
/*!***********************************************************************************************************!*\
  !*** ./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css& ***!
  \***********************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_boards_vue_vue_type_style_index_0_id_23caf62d_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/boards.vue?vue&type=style&index=0&id=23caf62d&scoped=true&lang=css&");


/***/ }),

/***/ "./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css&":
/*!**********************************************************************************************************!*\
  !*** ./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css& ***!
  \**********************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_leads_vue_vue_type_style_index_0_id_744cfee7_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/components/leads.vue?vue&type=style&index=0&id=744cfee7&scoped=true&lang=css&");


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

/***/ "./resources/js/Pages/main.vue?vue&type=template&id=f9f8d77c&scoped=true&":
/*!********************************************************************************!*\
  !*** ./resources/js/Pages/main.vue?vue&type=template&id=f9f8d77c&scoped=true& ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_main_vue_vue_type_template_id_f9f8d77c_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
/* harmony export */   "staticRenderFns": () => /* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_main_vue_vue_type_template_id_f9f8d77c_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_main_vue_vue_type_template_id_f9f8d77c_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./main.vue?vue&type=template&id=f9f8d77c&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/main.vue?vue&type=template&id=f9f8d77c&scoped=true&");


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
                return _vm.onDrop1(
                  $event,
                  _vm.lead.order,
                  _vm.colid,
                  _vm.index,
                  0
                )
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
                return _vm.onDrop1(
                  $event,
                  _vm.lead.order,
                  _vm.colid,
                  _vm.index,
                  1
                )
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/main.vue?vue&type=template&id=f9f8d77c&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/Pages/main.vue?vue&type=template&id=f9f8d77c&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************/
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
    [
      _vm._v("\r\ngt\r\n"),
      _c(
        "router-link",
        { staticClass: "mr-4", attrs: { to: "/2", exact: "" } },
        [_vm._v("2 go")]
      ),
      _vm._v(" "),
      _c(
        "button",
        {
          on: {
            click: function($event) {
              return _vm.to_push()
            }
          }
        },
        [_vm._v("2 go push")]
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);