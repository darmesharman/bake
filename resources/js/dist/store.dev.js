"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _vue = _interopRequireDefault(require("vue"));

var _vuex = _interopRequireDefault(require("vuex"));

var _axios = _interopRequireDefault(require("axios"));

var _formData = _interopRequireDefault(require("form-data"));

var _axiosCookiejarSupport = _interopRequireDefault(require("axios-cookiejar-support"));

var _toughCookie = _interopRequireDefault(require("tough-cookie"));

var _repository = _interopRequireDefault(require("./repository"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

(0, _axiosCookiejarSupport["default"])(_axios["default"]);

_vue["default"].use(_vuex["default"]);

/* 
login: moduleB,
home: moduleE,
companies: moduleF,
dashboard: moduleG,
 */
var moduleB = {
  state: {
    user: sessionStorage.user ? JSON.parse(sessionStorage.getItem('user')) : null
  },
  mutations: {
    SET_USER: function SET_USER(state, user) {
      state.user = user;
    }
  },
  actions: {
    login: function login(context, user) {
      var config, url, cookieJar, instance;
      return regeneratorRuntime.async(function login$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              config = {
                'headers': {
                  'Accept': 'application/json',
                  'Content-Type': 'multipart/form-data'
                }
              };
              url = 'http://localhost:8000/sanctum/csrf-cookie';
              _context.next = 4;
              return regeneratorRuntime.awrap(_axios["default"].get(url, {}).then(function (response) {
                config.headers["X-XSRF-TOKEN"] = response.config.headers['X-XSRF-TOKEN'];
              }));

            case 4:
              cookieJar = new _toughCookie["default"].CookieJar();
              instance = _axios["default"].create({
                jar: cookieJar,
                withCredentials: true
              });
              instance.defaults.headers['X-CSRF-TOKEN'] = config.headers["X-XSRF-TOKEN"];
              instance.defaults.headers['Accept'] = 'application/json';
              instance.post('http://localhost:8000/auth', user).then(function (response) {
                console.log(response);
              });
              context.commit('SET_USER', user);
              sessionStorage.user = JSON.stringify(user);

            case 11:
            case "end":
              return _context.stop();
          }
        }
      });
    }
  }
};
var moduleE = {
  state: {
    searchForm: {
      cityID: -1,
      destrictID: -1,
      categoryID: -1
    },
    companies: [],
    categories: [],
    cities: [],
    districts: [],
    blogs: [],
    hashome_data: false
  },
  mutations: {
    FETCH_HOME: function FETCH_HOME(state, data) {
      state.hashome_data = true;
      state.companies = data.companies;
      state.categories = data.companies;
      state.cities = data.cities;
      state.districts = data.districts;
      state.blogs = data.blogs;
    }
  },
  actions: {
    fetchHome: function fetchHome(context) {
      var url = "http://localhost:8000/api/home";
      var config = {
        'headers': {}
      };
      var data = {};

      _axios["default"].get(url, data, config).then(function (response) {
        context.commit('FETCH_HOME', response.data);
      });
    }
  }
};
var moduleF = {
  state: {
    hascompanies_data: false,
    data: [],
    currentcompany: null
  },
  mutations: {
    FETCH_COMPANIES: function FETCH_COMPANIES(state, data) {
      state.hascompanies_data = true;
      state.data = data.companies;
    },
    FETCH_COMPANY: function FETCH_COMPANY(state, data) {
      state.currentcompany = data.company;
    }
  },
  actions: {
    fetchCompanies: function fetchCompanies(context) {
      var config = {
        'headers': {}
      };
      var url = "http://localhost:8000/api/companies";

      _axios["default"].get(url, config).then(function (response) {
        console.log(response.data);
        context.commit('FETCH_COMPANIES', response.data);
      });
    },
    fetchCompany: function fetchCompany(context, id) {
      var config, url;
      return regeneratorRuntime.async(function fetchCompany$(_context2) {
        while (1) {
          switch (_context2.prev = _context2.next) {
            case 0:
              config = {
                'headers': {}
              };
              url = "http://localhost:8000/api/companies/".concat(id);
              _context2.next = 4;
              return regeneratorRuntime.awrap(_axios["default"].get(url, config).then(function (response) {
                console.log(response.data);
                context.commit('FETCH_COMPANY', response.data);
              }));

            case 4:
            case "end":
              return _context2.stop();
          }
        }
      });
    }
  }
};
var moduleG = {
  state: {
    connect: false,
    message: null,
    socketid: null,
    lastupdate: null,
    items: [],
    addingboard: false,
    newleaddescription: 'none',
    medifylead: [],
    newcoltitle: 'n',
    modifyingleadID: -1,
    modifyinleadcolID: -1,
    loaded: false,
    clicks: 0,
    cold: false,
    isediting: true,
    timer: null,
    isdraggable: false,
    leadadding: false,
    newleadcontent: '',
    token: null,
    updates: null
  },
  mutations: {
    SOCKET_CONNECT: function SOCKET_CONNECT(state, status) {
      state;
      status;
      state.connect = true;
    },
    SOCKET_USER_MESSAGE: function SOCKET_USER_MESSAGE(state, message) {
      state.message = message;
      state;
      status;
    },
    CREATE_LEAD: function CREATE_LEAD(state, data) {
      state.items[data.colidx].leads.push({
        id: data.id,
        board_id: data.item.id,
        description: data.value,
        created_at: data.created_at,
        updated_at: data.updated_at
      });
    },
    REMOVE_LEAD: function REMOVE_LEAD(state, data) {
      // state.items
      // let index = state.items[data.colidx].leads[data.leadidx]
      state.items[data.colidx].leads.splice(data.leadidx, 1);
    },
    UPDATE_LEAD: function UPDATE_LEAD(state, data) {
      var index = state.items[data.colidx].leads.findIndex(function (y) {
        return y.id == data.lead.id;
      });
      state.items[data.colidx].leads[index].description = data.value;
    },
    CREATE_BOARD: function CREATE_BOARD(state, data) {
      console.log(data);
      state.items.push({
        id: data.id,
        title: data.title,
        order: data.order,
        leads: [],
        created_at: data.created_at,
        updated_at: data.updated_at
      });
    },
    REMOVE_BOARD: function REMOVE_BOARD(state, item) {
      var index = state.items.findIndex(function (y) {
        return y.id == item.id;
      });
      state.items.splice(index, 1);
    },
    UPDATE_BOARD: function UPDATE_BOARD(state, data) {
      var index = state.items.findIndex(function (y) {
        return y.id == data.item.id;
      });
      state.items[index].title = data.value;
    },
    SWAP_BOARDS: function SWAP_BOARDS(state, data) {
      var index = state.items.findIndex(function (item) {
        return item.id == data.itemid;
      });
      var index2 = state.items.findIndex(function (item) {
        return item.id == data.itemid2;
      });
      var rows = [state.items[index], state.items[index2]];
      state.items.splice(index2, 1, rows[0]);
      state.items.splice(index, 1, rows[1]);
    },
    CREATE_BOARD_UPDATE: function CREATE_BOARD_UPDATE(state, details) {
      // let index = state.items.findIndex(y => y.id == data.item.id)
      if (!state.items.some(function (e) {
        return e.id == details.id;
      })) state.items.push({
        id: details.id,
        order: details.order,
        title: details.title,
        created_at: details.created_at,
        updated_at: details.updated_at,
        leads: []
      });
    },
    UPDATE_BOARD_UPDATE: function UPDATE_BOARD_UPDATE(state, details) {
      var index = state.items.findIndex(function (y) {
        return y.id == details.id;
      });
      state.items[index].order = details.order;
      state.items[index].title = details.title;
      state.items[index].updated_at = details.updated_at;
    },
    DELETE_BOARD_UPDATE: function DELETE_BOARD_UPDATE(state, details) {
      console.log();

      if (state.items.some(function (e) {
        return e.id == details.id;
      })) {
        var index = state.items.findIndex(function (y) {
          return y.id == details.id;
        });
        state.items.splice(index, 1); // state.items.push({ id:details.id,
        // title:details.title, order:details.order, updated_at:details.updated_at})
      }
    },
    CREATE_LEAD_UPDATE: function CREATE_LEAD_UPDATE(state, details) {
      var index = state.items.findIndex(function (y) {
        return y.id == details.board_id;
      });
      if (!state.items[index].leads.some(function (e) {
        return e.id == details.id;
      })) state.items[index].leads.push({
        id: details.id,
        board_id: details.board_id,
        description: details.description,
        created_at: details.created_at,
        updated_at: details.updated_at
      });
    },
    UPDATE_LEAD_UPDATE: function UPDATE_LEAD_UPDATE(state, details) {
      var index = state.items.findIndex(function (y) {
        return y.id == details.board_id;
      });
      var idx = state.items[index].leads.findIndex(function (y) {
        return y.id == details.id;
      });
      state.items[index].leads[idx].description = details.description;
      updated_at = details.updated_at;
    },
    MOVE_LEAD_UPDATE: function MOVE_LEAD_UPDATE(state, details) {
      return regeneratorRuntime.async(function MOVE_LEAD_UPDATE$(_context3) {
        while (1) {
          switch (_context3.prev = _context3.next) {
            case 0:
              console.log('omggg');
              _context3.next = 3;
              return regeneratorRuntime.awrap(function () {
                var index = state.items.findIndex(function (item) {
                  return item.id == details.board_id;
                });
                var idx = state.items[index].leads.findIndex(function (item) {
                  return item.order < details.order;
                });
                if (idx == -1) state.items[index].leads.push(details);else {
                  state.items[index].leads.splice(idx, 0, details);
                }
              }());

            case 3:
              _context3.next = 5;
              return regeneratorRuntime.awrap(function () {
                var index = state.items.findIndex(function (item) {
                  return item.id == details.old_board_id;
                });
                var idx = state.items[index].leads.findIndex(function (item) {
                  return item.id == details.id;
                });
                state.items[index].leads.splice(idx, 1);
              }());

            case 5:
            case "end":
              return _context3.stop();
          }
        }
      });
    },
    DELETE_LEAD_UPDATE: function DELETE_LEAD_UPDATE(state, details) {
      var index = state.items.findIndex(function (y) {
        return y.id == details.board_id;
      });

      if (state.items[index].leads.some(function (e) {
        return e.id == details.id;
      })) {
        var idx = state.items[index].leads.findIndex(function (y) {
          return y.id == details.id;
        });
        console.log(idx);
        state.items[index].leads.splice(idx, 1);
      }
    },
    FETCH_HOME: function FETCH_HOME(state, data) {
      state.hashome_data = true;
      state.companies = data.companies;
      state.categories = data.companies;
      state.cities = data.cities;
      state.districts = data.districts;
      state.blogs = data.blogs;
    },
    FETCH_SEARCH_HOME: function FETCH_SEARCH_HOME(state, data) {
      data;
    },
    FETCH_DASHBOARD: function FETCH_DASHBOARD(state, data) {
      state.hasdashboard_data = true;
      data.boards.forEach(function (element) {
        element = element.value;
      });
      state.items = data.boards;
      state.token = data.token; // console.log(state.data )
    },
    MOVE_LEAD: function MOVE_LEAD(state, _ref) {
      var response_data, lead_id, boardID, lead, ident;
      return regeneratorRuntime.async(function MOVE_LEAD$(_context4) {
        while (1) {
          switch (_context4.prev = _context4.next) {
            case 0:
              response_data = _ref.response_data, lead_id = _ref.lead_id, boardID = _ref.boardID, lead = _ref.lead, ident = _ref.ident;
              _context4.next = 3;
              return regeneratorRuntime.awrap(function () {
                var index = state.items.findIndex(function (item) {
                  return item.id == response_data.lead.board_id;
                });
                var idx = state.items[index].leads.findIndex(function (item) {
                  return item.id == response_data.lead_id;
                });

                if (ident == 0) {
                  state.items[index].leads.splice(idx, 0, response_data.lead);
                } else {
                  state.items[index].leads.splice(idx + 1, 0, response_data.lead);
                }
              }());

            case 3:
              _context4.next = 5;
              return regeneratorRuntime.awrap(function () {
                var index = state.items.findIndex(function (item) {
                  return item.id == boardID;
                });
                var idx = state.items[index].leads.findIndex(function (item) {
                  return item.id == lead_id;
                });
                state.items[index].leads.splice(idx, 1);
              }());

            case 5:
            case "end":
              return _context4.stop();
          }
        }
      });
    },
    SET_USER: function SET_USER(state, user) {
      state.user = user;
    }
  },
  actions: {
    fetchDashboardUpdates: function fetchDashboardUpdates(_ref2, data) {
      var context = _ref2.context,
          dispatch = _ref2.dispatch;

      var switchOptions = function switchOptions(option, details) {
        switch (option) {
          case 0:
            dispatch('boardCreateUpdates', details);
            break;

          case 1:
            dispatch('boardUpdateUpdates', details);
            break;

          case 2:
            dispatch('boardDeleteUpdates', details);
            break;

          case 10:
            dispatch('leadCreateUpdates', details);
            break;

          case 11:
            dispatch('leadUpdateUpdates', details);
            break;

          case 12:
            dispatch('leadDeleteUpdates', details);
            break;

          case 13:
            dispatch('leadMoveUpdates', details);
            break;
          // default:
          // break;
        }
      };

      data.forEach(function (element) {
        try {
          var details = JSON.parse("[" + element.data + "]");
          if (element.data != null) details.forEach(function (detail) {
            // console.log(detail)
            switchOptions(element.event, detail);
          });
        } catch (error) {}
      }); // context.commit('FETCH_DASHBOARD_UPDATES', data)
    },
    moveLead: function moveLead(context, _ref3) {
      var target_item_id, boardID, lead, ident, url, config, data1;
      return regeneratorRuntime.async(function moveLead$(_context5) {
        while (1) {
          switch (_context5.prev = _context5.next) {
            case 0:
              target_item_id = _ref3.target_item_id, boardID = _ref3.boardID, lead = _ref3.lead, ident = _ref3.ident;
              console.log(target_item_id, lead.board_id, lead.id, lead.order, ident);
              url = "http://localhost:8000/api/update_boards/movelead/".concat(target_item_id, "/").concat(lead.board_id, "/").concat(lead.id, "/").concat(lead.order, "/").concat(ident);
              config = {
                'headers': {}
              };
              data1 = {};
              _context5.next = 7;
              return regeneratorRuntime.awrap(_axios["default"].put(url, data1, config).then(function (response) {
                context.commit('MOVE_LEAD', {
                  response_data: response.data,
                  lead_id: target_item_id,
                  boardID: boardID,
                  lead: lead,
                  ident: ident
                });
              }));

            case 7:
            case "end":
              return _context5.stop();
          }
        }
      });
    },
    fetchDashboard: function fetchDashboard(context, sockets) {
      var config = {
        'headers': {}
      };
      var url = "http://localhost:8000/api/dashboard";

      _axios["default"].get(url, config).then(function (response) {
        console.log(response.data.token);
        sockets.subscribe(response.data.token, function (data) {
          // console.log(data);
          context.dispatch('fetchDashboardUpdates', data.updates);
          console.log('wtfhithat');
        });
        context.commit('FETCH_DASHBOARD', response.data);
      });
    },
    login: function login(context, user) {
      var config, url, cookieJar, instance;
      return regeneratorRuntime.async(function login$(_context6) {
        while (1) {
          switch (_context6.prev = _context6.next) {
            case 0:
              config = {
                'headers': {
                  'Accept': 'application/json',
                  'Content-Type': 'multipart/form-data'
                }
              };
              url = 'http://localhost:8000/sanctum/csrf-cookie';
              _context6.next = 4;
              return regeneratorRuntime.awrap(_axios["default"].get(url, {}).then(function (response) {
                config.headers["X-XSRF-TOKEN"] = response.config.headers['X-XSRF-TOKEN']; // config.headers["X-XSRF-TOKEN"] =
              }));

            case 4:
              // var data = new FormData();
              // data.append('phone_number', '77026651625');
              // data.append('password', 'password');
              // config = {
              //     method: 'put',
              //     url: 'http://localhost:8000/api/auth',
              //     headers: { 
              //         // 'X-Requested-With': 'XMLHttpRequest',
              //      "X-CSRF-TOKEN": config.headers["X-XSRF-TOKEN"],
              //      'Accept': 'application/json',
              //      'Content-Type': 'application/json;charset=utf-8',
              //      'Access-Control-Allow-Origin' : '*'
              //     //   'Cookie': 'laravel_session=Mb6avHg3H8jxyspOxTozypGhzy24MPUu8NatZXAh'
              //     //   ...data.getHeaders()
              //     },
              //     data : data
              //   };
              // // axios.defaults.withCredentials = true;
              // axios(config).then(response=> {
              //     console.log(response)
              // }).catch(function (error) {
              //     // handle error
              //     console.log(error);
              //   })
              cookieJar = new _toughCookie["default"].CookieJar();
              instance = _axios["default"].create({
                jar: cookieJar,
                withCredentials: true // httpsAgent: new https.Agent({ rejectUnauthorized: false, requestCert: true, keepAlive: true})

              });
              instance.defaults.headers['X-CSRF-TOKEN'] = config.headers["X-XSRF-TOKEN"];
              instance.defaults.headers['Accept'] = 'application/json';
              instance.post('http://localhost:8000/auth', user).then(function (response) {
                console.log(response);
              });
              context.commit('SET_USER', user);
              sessionStorage.user = JSON.stringify(user);

            case 11:
            case "end":
              return _context6.stop();
          }
        }
      });
    },
    fetchHome: function fetchHome(context) {
      var url = "http://localhost:8000/api/home";
      var config = {
        'headers': {}
      };
      var data = {};

      _axios["default"].get(url, data, config).then(function (response) {
        context.commit('FETCH_HOME', response.data);
      });
    },
    fetchSearchHome: function fetchSearchHome(context) {
      var url = "http://localhost:8000/api/home";
      var config = {
        'headers': {}
      };
      var data = {
        cityID: home.searchForm.cityID,
        destrictID: home.searchForm.destrictID,
        categoryID: home.searchForm.categoryID
      };

      _axios["default"].get(url, data, config).then(function (response) {
        context.commit('FETCH_SEARCH_HOME', response.data);
      });
    },
    boardCreateUpdates: function boardCreateUpdates(context, details) {
      context.commit('CREATE_BOARD_UPDATE', details);
    },
    boardUpdateUpdates: function boardUpdateUpdates(context, details) {
      context.commit('UPDATE_BOARD_UPDATE', details);
    },
    boardDeleteUpdates: function boardDeleteUpdates(context, details) {
      context.commit('DELETE_BOARD_UPDATE', details);
    },
    leadCreateUpdates: function leadCreateUpdates(context, details) {
      console.log('lead create');
      context.commit('CREATE_LEAD_UPDATE', details);
    },
    leadUpdateUpdates: function leadUpdateUpdates(context, details) {
      context.commit('UPDATE_LEAD_UPDATE', details);
    },
    leadDeleteUpdates: function leadDeleteUpdates(context, details) {
      context.commit('DELETE_LEAD_UPDATE', details);
    },
    leadMoveUpdates: function leadMoveUpdates(context, details) {
      context.commit('MOVE_LEAD_UPDATE', details);
    },
    swapBoards: function swapBoards(context, data) {
      context.commit('SWAP_BOARDS', data);
    },
    editBoard: function editBoard(context, data) {
      var config = {
        'headers': {}
      };
      var url = "http://localhost:8000/api/update_boards/updateboard/".concat(data.item.id, "/newtitle/").concat(data.value);

      _axios["default"].put(url, config).then(function (response) {
        console.log(response.data);
        context.commit('UPDATE_BOARD', data);
      });
    },
    boardCreate: function boardCreate(context, title) {
      var config = {
        'headers': {
          'Accept': 'application/json'
        }
      }; // console.log(`http://localhost:8000/api/update_boards/newboard=${title}`)

      var url = "http://localhost:8000/api/update_boards/newboard/".concat(title);

      _axios["default"].get(url, config).then(function (response) {
        if (response.status == 200) context.commit('CREATE_BOARD', response.data); // console.log(response.data)
      });
    },
    boardDelete: function boardDelete(context, data) {
      var config = {
        'headers': {
          'Accept': 'application/json'
        }
      }; // console.log(`http://localhost:8000/api/update_boards/newboard=${title}`)

      var url = "http://localhost:8000/api/update_boards/removeboard/".concat(data.item.id);

      _axios["default"].put(url, config).then(function (response) {
        if (response.status == 200) context.commit('REMOVE_BOARD', data.item);
      });
    },
    createLead: function createLead(context, data) {
      var config = {
        'headers': {
          'Accept': 'application/json'
        }
      };
      var url = "http://localhost:8000/api/update_boards/createlead/".concat(data.item.id, "/newleaddescription/").concat(data.value);

      _axios["default"].get(url, config).then(function (response) {
        if (response.status == 200) data.id = response.data.id;
        data.created_at = response.data.created_at;
        data.updated_at = response.data.updated_at;
        context.commit('CREATE_LEAD', data);
      });
    },
    deleteLead: function deleteLead(context, data) {
      var config = {
        'headers': {
          'Accept': 'application/json'
        }
      };
      var url = "http://localhost:8000/api/update_boards/removelead/".concat(data.lead.id); // console.log(url)

      _axios["default"].put(url, config).then(function (response) {
        if (response.status == 200) context.commit('REMOVE_LEAD', data);
      });
    },
    saveLead: function saveLead(context, data) {
      var config = {
        'headers': {
          'Accept': 'application/json'
        }
      };
      var url = "http://localhost:8000/api/update_boards/updatelead/".concat(data.lead.id, "/description/").concat(data.value); // console.log(url)

      _axios["default"].put(url, config).then(function (response) {
        if (response.status == 200) context.commit('UPDATE_LEAD', data);
      });
    },
    otherAction: function otherAction(context, type) {
      context;
      type;
      return true;
    },
    socket_userMessage: function socket_userMessage(context, message) {
      context.dispatch('newMessage', message);
      context.commit('NEW_MESSAGE_RECEIVED', message);

      if (message.is_important) {
        context.dispatch('alertImportantMessage', message);
      }
    }
  }
};

var _default = new _vuex["default"].Store({
  modules: {
    login: moduleB,
    home: moduleE,
    companies: moduleF,
    dashboard: moduleG
  }
});

exports["default"] = _default;